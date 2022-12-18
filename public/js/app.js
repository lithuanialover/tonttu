'use strict';

// Header　スクールして背景色変更
$(function () {
    $(window).on('scroll', function () {
        if ($('.firstview').height()  < $(this).scrollTop()) {
            $('.js-header').addClass('change-color');
        } else {
            $('.js-header').removeClass('change-color');
        }
    });
});