<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
		'resources/views',
		'resources/views/acf'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

function is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

function imageToBase64($image) {
	$mime = wp_check_filetype($image);
	return 'data:'.$mime['type'].';base64,'.base64_encode(file_get_contents($image));
}

function get_customlogo_src() {
	$image = wp_get_attachment_image_src(get_theme_mod('custom_logo'),'full');
	return $image[0];
}

if ( ! class_exists('Theme_View') ) {
	class Theme_View{
		private $args;
		private $file;
		public function __get($name) {
			return $this->args[$name];
		}
		public function __construct($file, $args = array()) {
			$this->file = $file;
			$this->args = $args;
		}
		public function __isset($name){
			return isset( $this->args[$name] );
		}
		public function render() {
			if( locate_template($this->file) ){
                return sage('blade')->render(locate_template($this->file), $this->args);
			}
		}
	}
}

function get_template_part($file, $args = array()){
    $template = new Theme_View($file, $args);
    return $template->render();
}

function get_acf_content() {
    $data = '';
    while(have_rows('modulos')) {
        the_row();
        $content = get_row(true);
        $data .= get_template_part('resources/views/partials/acf/'.get_row_layout().'.blade.php', $content);
    }
    return $data;
}

function the_navbar_brand($blog_id = 0) {
	echo get_navbar_brand($blog_id);
}

function get_navbar_brand($blog_id = 0) {
	$html = '';
	$switched_blog = false;
	if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
		switch_to_blog( $blog_id );
		$switched_blog = true;
	}
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	// We have a logo. Logo is go.
	if ( $custom_logo_id ) {
		$custom_logo_attr = array(
			'class' => '',
			'itemprop' => 'logo',
		);
		/*
		 * If the logo alt attribute is empty, get the site title and explicitly
		 * pass it to the attributes used by wp_get_attachment_image().
		 */
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}
		/*
		 * If the alt attribute is not empty, there's no need to explicitly pass
		 * it because wp_get_attachment_image() already adds the alt attribute.
		 */
		$html = sprintf( '<a href="%1$s" class="navbar-brand" rel="home" itemprop="url">%2$s</a>',
			esc_url( home_url( '/' ) ),
			wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
		);
	}
	// If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
	elseif ( is_customize_preview() ) {
		$html = sprintf( '<a href="%1$s" class="navbar-brand" style="display:none;"><img class="custom-logo"/></a>',
			esc_url( home_url( '/' ) )
		);
	}
	if ( $switched_blog ) {
		restore_current_blog();
	}
	/**
	 * Filters the custom logo output.
	 *
	 * @since 4.5.0
	 * @since 4.6.0 Added the `$blog_id` parameter.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param int    $blog_id ID of the blog to get the custom logo for.
	 */
	return apply_filters( 'get_navbar_brand', $html, $blog_id );
}

function pagination_number($query = false) {
	global $wp_query;
	$big = 9999999;
	echo paginate_links(array(
		'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'prev_next' => false,
		'type' => 'list',
		'total' => ($query) ? $query->max_num_pages : $wp_query->max_num_pages));
}