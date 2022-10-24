(function($){
	"use strict";
    $(document).ready(function() {
        $('.mobile-toggle .open-menu').on( 'click', function() {
            $(this).toggleClass('active');
            $('.site-nav-wrap').toggleClass('active');
        });
        
        $('.primary-menu li .toggle').on( 'click', function(e) {
            e.preventDefault();
            $(this).closest('li').toggleClass('active');
            var $parent_id = $(this).closest('li').attr('id');
            $(this).closest('li').find( 'li' ).removeClass( 'active' );
            $(this).closest('li').parent().find( '>li' ).not( $ ('#' + $parent_id ) ).removeClass( 'active' );
        });
        
        $('.primary-menu').children().last().focusout( function() {
            $('.site-nav-wrap').removeClass('active').removeAttr('style');
            $('.mobile-toggle .open-menu').removeClass('active');
        } );
        
        $('.search-toggle').on('click', function(e){
            e.preventDefault();
            $(this).closest('.search-wrap').find('.searchform').toggleClass('active');
        });
        
        function rebeccafashion_hide_nav_menu() {
            $(document).mouseup( function(e) {
                var $nav_menu = $('.nav-wrap');
                if ( ! $nav_menu.is( e.target ) && $nav_menu.has( e.target ).length === 0 ) {
                    $nav_menu.find('.primary-menu li').removeClass('active');
                    if ( $(window).width() < 992 && $('.nav-menu').length ) {
                        $('.nav-menu').removeClass('active').removeAttr('style');
                        $('.mobile-toggle .open-menu').removeClass('active');
                    }
                }
            });
        }
        
        rebeccafashion_hide_nav_menu();
        $(window).resize( function() {
            rebeccafashion_hide_nav_menu();
        } );
    });
})(jQuery);
