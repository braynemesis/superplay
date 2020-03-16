<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function getID()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return $home;
            }
            return get_the_ID();
        }
        return get_the_ID();
    }

    public static function getTags()
    {
        return (is_single()) ? get_the_tags(App::getID()) : get_tags();
    }

    public static function getColor()
    {
        $id = App::getID();
        $categories = get_the_category($id);
        if(is_single()) {
            $color = get_field('cor', 'category_'. $categories[0]->term_id);
            return $color;
        } else {
            return get_field('cor_da_pagina', $id);
        }
    }

    public static function getAcfModule($module)
    {
        $modulos = get_fields(App::getID())['modulos'];
        if (!empty($modulos)) {
            $returnModule = array_filter($modulos, function($item) use ($module) { 
                return $item['acf_fc_layout'] == $module; 
            });
            return current($returnModule);
        } else {
            return null;
        }
    }
}
