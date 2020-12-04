var $ = jQuery.noConflict();/** * Generic function checks if element is in viewport */function isElementVisible(el) {    var rect = el.getBoundingClientRect(),        vWidth = window.innerWidth || doc.documentElement.clientWidth,        vHeight = window.innerHeight || doc.documentElement.clientHeight,        efp = function (x, y) {            return document.elementFromPoint(x, y)        };    // Return false if it's not in the viewport    if (rect.right < 0 || rect.bottom < 0        || rect.left > vWidth || rect.top > vHeight)        return false;    // Return true if any of its four corners are visible    return (        el.contains(efp(rect.left, rect.top))        || el.contains(efp(rect.right, rect.top))        || el.contains(efp(rect.right, rect.bottom))        || el.contains(efp(rect.left, rect.bottom))    );}/** * Menu */$(document).ready(function () {    // our function that decides whether the navigation bar should have "fixed" css position or not.    var headerHeight = $("#masthead").height();    var sticky_navigation = function () {        var scroll_top = $(window).scrollTop(); // our current vertical position from the top        // calculate window width, only use sticky header on tablet/mobile        var windowwidth = $(window).width() + 18;		// take 18 pixels for the scrollbar        var ems = windowwidth / parseFloat($("body").css("font-size"));        // if we've scrolled more than the navigation, change its position to fixed to stick to top (class=scroll),        if (ems <= 56.875) {            // Tablet or Mobile version            $('.site-header').removeClass('scroll');            $('.site').css({'padding-top': 0});        } else if (scroll_top > 0) {            $('.site-header').addClass('scroll');            $('.site').css({'padding-top': (headerHeight > 0)?120:0});        } else {            $('.site-header').removeClass('scroll');            $('.site').css({'padding-top': headerHeight});        }    };    // run our function on load    sticky_navigation();    $(window).on('scroll resize', function () {        sticky_navigation();    });});