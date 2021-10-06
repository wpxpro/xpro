/** ==================
 * File theme.js
====================== */

jQuery(function ($) {

    /**
     * Helper class for frontend theme logic.
     *
     * @since 1.0
     * @class Xpro
     */

    "use strict";

    var Xpro_Function = {

        /**
         * Initializes all frontend theme logic.
         *
         * @since 1.0
         * @method init
         */
        init: function () {
            this._bind();
        },

        /**
         * Initializes and binds all frontend events.
         *
         * @since 1.0
         * @access private
         * @method _bind
         */
        _bind: function () {

            this._onLoad();
            this._navbarSticky();
            this._scrollTop();
            this._titleWrapper();
            this._setupDropDowns();
            this._commentValidation();

        },

        _onLoad: function() {

            $( document ).ready(function() {

                setTimeout(function(){
                    $('.xpro-loader-wrapper').fadeOut('slow');
                }, 500);

            });
        },

        _navbarSticky: function() {

            $( document ).ready(function() {

                if($('.xpro-header-sticky').length){
                    $(window).on('scroll', function () {
                        if ($(this).scrollTop() > 220) { // Set position from top to add class
                            $('.xpro-header-sticky').addClass('xpro-appear');
                        }
                        else {
                            $('.xpro-header-sticky').removeClass('xpro-appear');
                        }
                    });
                }

            });
        },

        _scrollTop: function(){

            if($('.xpro-scroll-top-btn').length){

                //scroll to appear
                $(window).on('scroll', function () {

                    if ($(this).scrollTop() > 500)
                        $('.xpro-scroll-top-btn').fadeIn('300');
                    else
                        $('.xpro-scroll-top-btn').fadeOut('300');
                });

                //Click event to scroll to top
                $(document).on('click', '.xpro-scroll-top-btn', function () {
                    $('html, body').animate({scrollTop: 0}, 500);
                    return false;
                });

            }

        },

        _titleWrapper: function(){

            if($('.xpro-header-sticky').length){

                var top_space_height = $('.xpro-header-sticky .xpro-navbar-primary').outerHeight();

                $('.xpro-top-area-space').css('padding-top', top_space_height + "px");

            }

        },

        _setupDropDowns: function() {
            $('.xpro-navbar-primary .xpro-navbar-nav li.dropdown').hover(function () {

                $(this).addClass("show");

                if ($('ul', this).length) {
                    var elm = $('ul:first', this);
                    var off = elm.offset();
                    var l = off.left;
                    var w = elm.width();
                    var docW = $(window).width();

                    var isEntirelyVisible = (l + w <= docW);

                    if (!isEntirelyVisible) {
                        $(this).addClass('edge');
                    }
                }

            }, function () {
                $(this).removeClass("show");
                $(this).removeClass('edge');
            });


            $('.xpro-navbar-primary .xi-chevron-down').on('click',function (e){

                e.preventDefault();
                e.stopPropagation();

                $(this).toggleClass('active');

                $(this).parent().parent().find('.xpro-dropdown-menu:first').toggleClass('show');

            });

            $('.xpro-navbar-primary .xpro-navbar-toggle').on('click',function (){

                $(this).toggleClass('active');
                $('.xpro-navbar-primary .xpro-navbar-nav').toggleClass('active');
                $('.xpro-navbar-primary .xpro-dropdown-menu').removeClass('show');
                $('.xpro-navbar-primary .xi-chevron-down').removeClass('active');

            });

            //Widget DropDown
            $('.xpro-widget').find('.menu-item-has-children > a, .page_item_has_children > a').after('<i class="xi xi-chevron-down"></i>');

            $('.xpro-widget').on('click', '.xi-chevron-down', function () {

                $(this).closest('li').find('ul.sub-menu:first, ul.children:first').slideToggle('fast').parent().toggleClass('active');

            });

        },

        _commentValidation: function(){

            if($('#commentform').length){

                $(".xpro-comments-area #submit").on("click", function () {
                    var fields = "";
                    if ($(this).parent().parent().find('#author').length == 1) {
                        if ($(".comment-form").find("#author").val().length == 0 || $(".comment-form").find("#author").val().value == '') {
                            fields = '1';
                            $(".comment-form").find("#author").addClass("inputerror");
                        }
                    }
                    if ($(this).parent().parent().find('#comment').length == 1) {
                        if ($(".comment-form").find("#comment").val().length == 0 || $(".comment-form").find("#comment").val().value == '') {
                            fields = '1';
                            $(".comment-form").find("#comment").addClass("inputerror");
                        }
                    }
                    if ($(this).parent().parent().find('#email').length == 1) {
                        if ($(".comment-form").find("#email").val().length == 0 || $(".comment-form").find("#email").val().length == '') {
                            fields = '1';
                            $(".comment-form").find("#email").addClass("inputerror");
                        } else {
                            var re = new RegExp();
                            re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                            var sinput;
                            sinput = "";
                            sinput = $(".comment-form").find("#email").val();
                            if (!re.test(sinput)) {
                                fields = '1';
                                $(".comment-form").find("#email").addClass("inputerror");
                            }
                        }
                    }
                    if (fields != "") {
                        return false;
                    } else {
                        return true;
                    }
                });

                //On Focus
                $('.xpro-comments-area .comment-fields').on('focus', function () {

                    $(this).removeClass('inputerror');

                });

            }

        },

    }

    $(function(){
        Xpro_Function.init();
    });

});
