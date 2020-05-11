(function($) {

    "use strict";

    jQuery(document).ready(function($){

      //Custom kidzoo scripts

        /* Init functions */
        revealPosts();

        /* variable declarations */
        var last_scroll = 0;

        /* carousel functions */
        $(document).on('click', '.kidzoo-carousel-thumb', function(){
            var id = $("#" + $(this).attr("id"));
            $(id).on('slid.bs.carousel', function(){
                kidzoo_get_bs_thumbs( id );
            });
        });
        $(document).on('mouseenter', '.kidzoo-carousel-thumb', function(){
            var id = $("#" + $(this).attr("id"));
            kidzoo_get_bs_thumbs( id );
        });

        function kidzoo_get_bs_thumbs( id ){

            var nextThumb = $(id).find('.item.active').find('.next-image-preview').data('image');
            var prevThumb = $(id).find('.item.active').find('.prev-image-preview').data('image');
            $(id).find('.carousel-control.right').find('.thumbnail-container').css({ 'background-image' : 'url('+nextThumb+')' });
            $(id).find('.carousel-control.left').find('.thumbnail-container').css({ 'background-image' : 'url('+prevThumb+')' });
        }

        /* Helper Functions */
        function revealPosts() {

            $('[data-toggle="tooltip"]').tooltip();

            $('[data-toggle="popover"]').popover();

            var posts = $('article:not(.reveal)');
            var i = 0;

            setInterval(function(){

                if( i >= posts.length ) return false;

                var el = posts[i];
                $(el).addClass('reveal').find('.kidzoo-carousel-thumb').carousel();
                i++;

            }, 200);

        }

        /* Sidebar functions */

        $(document).on('click', '.js-toggleSidebar', function(){

            $('.kidzoo-sidebar').toggleClass('sidebar-closed');
            $('.sidebar-overlay').fadeToggle( 320 );
            $('body').toggleClass('no-scroll');
        });
        $(document).on('click', '.home4-js-toggleSidebar', function(){

            $('.home-4-sidebar-content-area').toggleClass('sidebar-reveal');
            $('.home-4-main-content-area').toggleClass('col-lg-10 col-lg-12').toggleClass('col-md-9 col-md-9').toggleClass('col-sm-9 col-sm-12');
            $(this).find('i').toggleClass('fa-close fa-bars');
            $(this).toggleClass('iconleft');

        });

        var height = $('.home-4-main-content-area').height();

        $('.home-4-sidebar-content-area').height(height);

        function fixButtonHeights() {
        	var heights = new Array();

        	// Loop to get all element heights
        	$('.kidzoo-blog-colums .post').each(function() {
        		// Need to let sizes be whatever they want so no overflow on resize
        		$(this).css('min-height', '0');
        		$(this).css('max-height', 'none');
        		$(this).css('height', 'auto');

        		// Then add size (no units) to array
         		heights.push($(this).height());
        	});

        	// Find max height of all elements
        	var max = Math.max.apply( Math, heights );

        	// Set all heights to max height
        	$('.kidzoo-blog-colums .post').each(function() {
        		$(this).css('height', max + 'px');
                // Note: IF box-sizing is border-box, would need to manually add border and padding to height (or tallest element will overflow by amount of vertical border + vertical padding)
        	});
        }

        $(window).load(function() {
        	// Fix heights on page load
        	fixButtonHeights();

        	// Fix heights on window resize
        	$(window).resize(function() {
        		// Needs to be a timeout function so it doesn't fire every ms of resize
        		setTimeout(function() {
              		fixButtonHeights();
        		}, 120);
        	});
        });

        /* Theme customizing functions */
        // Back to top
        $('#back-to-top').on('click', function(){
          $("html, body").animate({scrollTop: 0}, 500);
          return false;
        });

        // Search expand in header
        $(".search-expand").hide();
        $(document).on('click', '.toggle-search', function(){
            $('.search-expand').slideToggle( 320 );
            $('.toggle-search i').toggleClass('fa-search fa-times');
        });

        // pre loader
     // 	$(window).on('load', function () {
        //  $('#preloader').fadeOut('slow',function(){
     // 			$(this).remove();
     // 		});
     //  	});

    });

})(jQuery);
