'use strict';

// Header スクールして背景色変更
$(function () {
    $(window).on('scroll', function () {
        if ($('.firstview').height()  < $(this).scrollTop()) {
            $('.js-header').addClass('change-color');
        } else {
            $('.js-header').removeClass('change-color');
        }
    });
});

// リアルタイム時計
$(document).ready(function() {

// Create two variable with the names of the months and days in an array
    var monthNames = ["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月" ];

    var dayNames= ["日曜日","月曜日","火曜日","水曜日","木曜日","金曜日","土曜日"];

    // Create a newDate() object
    var newDate =new Date();

    // Extract the current date from Date object
    newDate.setDate(newDate.getDate());

    // Output the day, date, month and year
    // $('#Date').html(newDate.getFullYear() + "年" + monthNames[newDate.getMonth()] +newDate.getDate() +"日" + dayNames[newDate.getDay()] );
    $('#Date').html(monthNames[newDate.getMonth()] +newDate.getDate() +"日" + dayNames[newDate.getDay()] );


    setInterval(function() {

      // Create a newDate() object and extract the seconds of the current time on the visitor's
        var seconds =new Date().getSeconds();

      // Add a leading zero to seconds value
        $("#sec").html(( seconds < 10 ?"0" :"" ) + seconds);

    },1000);

    setInterval(function() {

      // Create a newDate() object and extract the minutes of the current time on the visitor's
        var minutes =new Date().getMinutes();

      // Add a leading zero to the minutes value
        $("#min").html(( minutes < 10 ?"0" :"" ) + minutes);

    },1000);

    setInterval(function() {

      // Create a newDate() object and extract the hours of the current time on the visitor's
        var hours =new Date().getHours();

      // Add a leading zero to the hours value
        $("#hours").html(( hours < 10 ?"0" :"" ) + hours);
    }, 1000);

});

// QR Reader
let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
scanner.addListener('scan', function (content) {
  alert(content); // content が student_id
});
Instascan.Camera.getCameras().then(function (cameras) {
  if (cameras.length > 0) {
    scanner.start(cameras[0]);
  } else {
    console.error('No cameras found.');
  }
}).catch(function (e) {
  console.error(e);
});

