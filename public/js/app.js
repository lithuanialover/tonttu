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

//----------------------------------------------------------------------------------------
// Jump To Top
$(function(){
  var pagetop = $('#page_top');
  // ボタン非表示
  pagetop.hide();

  // 100px スクロールしたらボタン表示
  $(window).scroll(function () {
     if ($(this).scrollTop() > 100) {
          pagetop.fadeIn();
     } else {
          pagetop.fadeOut();
     }
  });
  pagetop.click(function () {
     $('body, html').animate({ scrollTop: 0 }, 500);
     return false;
  });
});

//----------------------------------------------------------------------------------------

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

//----------------------------------------------------------------------------------------

// QR Reader × Ajax for attendance.blade.php and leave.blade.php
$(window).on('load',function(){

let scanner = new Instascan.Scanner({ video: document.getElementById('preview') }); //preview: ビデオタグの要素
scanner.addListener('scan', function (id) { //content: 読み取ったQRコードの情報が「content」に格納されている

  // alert(content);
  // $(".output1").text(id);//読み取ったQRコードの情報をpタグ(class="output1")に表示できた
  // $("#yourInputFieldId").val(id); // Pass the scanned content value to an input field

  // ajax処理スタート
  $.ajax({
    type: "get", //HTTP通信の種類
    url: `/attendance/${id}`, //通信したいURL
    dataType: 'json'
  })
  //通信が成功したとき
  .done((res)=>{// resの部分にコントローラーから返ってきた値 $studentKana が入る

    $("#kana").text(res.qrResult.student_kana); // Pass the scanned content value to an input field
    $("#studentId").val(res.qrResult.id); // Pass the scanned content value to an input field

    console.log(res);
  })
  //通信が失敗したとき
  .fail((error)=>{
    console.log(error.statusText);
  })

});

//reference: json形式 https://qiita.com/si-ma/items/6931ecc0b8562e96733e

Instascan.Camera.getCameras().then(function (cameras) {
  if (cameras.length > 0) {
    scanner.start(cameras[0]);//カメラのデバイス情報を指定して読み取りを開始
  } else {
    console.error('No cameras found.');
  }
}).catch(function (e) {
  console.error(e);
});

})

//----------------------------------------------------------------------------------------
// success & error: 時間経つと非表示になる
$(document).ready(function() {
  $("#fadeInOut").fadeIn().queue(function() {
  setTimeout(function(){$("#fadeInOut").dequeue();
  }, 3000);
  });
  $("#fadeInOut").fadeOut();
  });
