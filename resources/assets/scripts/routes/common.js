import {WOW} from 'wowjs';
import Rellax from 'rellax';

export default {
  init() {
    // JavaScript to be fired on all pages
    let wow = new WOW({
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 0,
      mobile: false,
    });
    wow.init();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    jQuery(window).load(() => {
      if (jQuery('.rellax').length) {
        let parallax = new Rellax('.rellax', {
          wrapper: '.rellax-wrapper',
          relativeToWrapper: true,
          speed: 2,
          center: true,
          zIndex: 0,
        });
        
        window.addEventListener('scroll', function () {
          parallax.refresh()
        })
      }
      
      jQuery('.loader').fadeOut(500, function() {});
      
      jQuery(document).scroll(() => {
        jQuery('body').toggleClass('bodyscrolled', jQuery(document).scrollTop() >= 150);
      });
      
      this.changeNavbar();
      
      jQuery(window).scroll(() =>{
        this.changeNavbar();
      });
      
      this.adjustIframe();
      
      if (jQuery('.owl-carousel--content-featured').length) {
        jQuery('.owl-carousel--content-featured').owlCarousel({
          loop: false,
          nav: false,
          dots: false,
          margin:28,
          responsive:{
            0:{
              items: 1,
            },
            768:{
              items: 2,
            },
            992:{
              items: 4,
            },
          },
        });
      }
      
      if (jQuery('.project-cases_owl-carousel').length) {
        let classPage = jQuery('body').attr('class').split(/\s+/);
        $.each(classPage, function(index, item) {
          if (item === 'sonorizacao' || item === 'plataformas' || item === 'audio-lab') {
            jQuery('#pills-' + item + '-tab').trigger('click');
          }
        });
        jQuery('.project-cases_owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:false,
          navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
          ],
          responsive:{
            0:{
              items:1,
              dots: true,
            },
            768:{
              items:2,
              dots: true,
            },
            992:{
              items:3,
              dots: false,
              nav:true,
            },
          },
        });
        jQuery('.project-cases_tabs-container_tab-contents').css({minHeight: jQuery('.project-cases_owl-carousel .item').outerHeight() + 'px'})
      }
      
      if (jQuery('.module-jobs_carousel').length) {
        jQuery('.module-jobs_carousel').owlCarousel({
          margin:10,
          nav:false,
          navText: [
            '<span class="arrow arrowLeftYellow"></span>',
            '<span class="arrow arrowRightYellow"></span>',
          ],
          responsive:{
            0:{
              items:1,
              dots: true,
            },
            768:{
              items:2,
              dots: true,
            },
            1100:{
              items:3,
              dots: false,
              nav: true,
            },
          },
        });
        jQuery('.custom-file .form-group').append('<span class="check-file"></span>');
      }
      
      jQuery('#go-top').click(function(){
        jQuery('html, body').animate({scrollTop:0}, 'slow');
        return false;
      });
      
      jQuery('#go-bottom').click(function() {
        var cls = jQuery(this).closest('section').next().offset().top;
        cls -= jQuery('.navbar').outerHeight();
        jQuery('html, body').animate({scrollTop: cls}, 'slow');
      });

      jQuery('li.hash-link a').on('click', function(event) {
        var target = this.getAttribute('href')
        target = target.split('#');
        target = '#' + target[1];
        target = jQuery(target);
        if( target.length ) {
          event.preventDefault();
          jQuery('html, body').stop().animate({
            scrollTop: target.offset().top -= (jQuery('.navbar').outerHeight() + 30),
          }, 1000);
        }
      });

      if (window.location.pathname.match(/trabalhe-conosco/g)) {
        let path = window.location.pathname.match(/trabalhe-conosco/g);
        if (path.length && path == 'trabalhe-conosco') {
          let target = '#' + path;
          target = jQuery(target);
          if( target.length ) {
            event.preventDefault();
            jQuery('html, body').stop().animate({
              scrollTop: target.offset().top -= (jQuery('.navbar').outerHeight() + 30),
            }, 1000);
          }
        }
      }
    });
    
    jQuery(window).resize(() => {
      this.adjustIframe();

      if (jQuery('.project-cases_owl-carousel').length) {
        jQuery('.project-cases_tabs-container_tab-contents').css({minHeight: jQuery('.project-cases_owl-carousel .item').outerHeight() + 'px'})
      }
    });
    
    jQuery(document).ready(() => {
    });
  },
  adjustIframe() {
    let aspectRatio = 16 / 9;
    let width = jQuery('.title-video-3-columns-v1_video').width();
    let newHeight = ( width / aspectRatio );
    jQuery('.title-video-3-columns-v1_video-container, .title-video-3-columns-v1_video-container iframe').height(newHeight);
  },
  changeNavbar() {
    if(!jQuery('body.single-cases').length){
      if(jQuery('.navbar--custom').length){
        if(jQuery('.navbar--custom').offset().top > 100) {
          jQuery('.navbar--custom').removeClass('navbar--big');
        }else{
          jQuery('.navbar--custom').addClass('navbar--big');
        }
      }
    }
  },
};
  