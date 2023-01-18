# tonttu

幼稚園・保育園の先生の負担を軽減した園児の登降園管理システムを開発する。
園児が登降園を報告できる簡単なシステムにより、先生の確認漏れを防ぐと同時に、リアルタイムで幼稚園・保育園側と
保護者側が登降園を確認できる。園児が欠席する場合、保護者がオンライン上で欠席報告が可能。


## 環境

* Version  
 ・Windows 11  
 ・XAMPP  
 ・Laravel Framework 9.46.0  
 ・PHP 8.1.12  
 ・jQuery 3.5.1.min.js  
   
* Extentions for PHP/XAMPP  
 ・ImageMagick  
 ・imagick  
     URL: How to Install Imagick and ImageMagick for XAMPP on a PC  
     https://phpandmysql.com/extras/install-imagemagick-and-imagick-xampp/  
 ・You may need to change "PHP GD extention"  
    URL: The PHP GD extension is required, but is not installed  
    https://www.youtube.com/watch?v=CDbtKYbm-8Q&ab_channel=programminghub  
      
* Extentions for Laravel  
 ・dompdf  
    URL: How to download dompdf   
    https://github.com/dompdf/dompdf  
    ```
    composer require barryvdh/laravel-dompdf
    ```
    URL: dompdfの日本語設定  
    https://codelikes.com/laravel-dompdf/  
    
 ・シンボリックを使用
    ```
    php artisan storage:link
    ```
 
 
## DB  
* database name   
```
tonttu
```

* Seeder  
1. AdminsTableSeeder  
   管理者用のアカウント  
    ・データ数：1  
2. UsersTableSeeder  
    保護者用のアカウント  
    ・データ数：10  
3. AttendancesTableSeeder
    登園(punchIn)・降園(punchOut)  
    ・データ数：9  
4. AbsencesTableSeeder  
    欠席報告  
    ・データ数：1  
   
* SQLファイル
1. students.sql  
    ・データ数：10  
    ・gitのなかに「students.sql」のファイルを同封しています。    
    「README.md」の下部にあります。
2. phpMyadminを開く
3. studentsテーブルを選択
4. 「SQL」をクリック
5. 下記のSQL文を入力し、実行  
```
    INSERT INTO `students` (`id`, `student_name`, `student_kana`, `student_gender`, `student_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Richard', 'りちゃーど', '男の子', 'students/54W9swvnLollieA4mPFMXp0IyKkCKeOoB39EdjQ8.jpg', 1, '2023-01-17 08:50:48', '2023-01-17 08:50:48'),
(2, 'Susan', 'スーザン', '女の子', 'students/qwIvGqoQUZ4s7MQdgOJcWHPf7E57HAA7GCvnVyAW.jpg', 1, '2023-01-17 08:51:36', '2023-01-17 08:51:36'),
(3, 'Joseph', 'じょぜふ', '男の子', 'students/ikpinNOkTBpc1L4Rk0gE55xWycz2GGfyjQNnGaEB.jpg', 2, '2023-01-17 08:52:48', '2023-01-17 08:52:48'),
(4, 'Thomas', 'とーます', '男の子', 'students/J0dKk41oG6e2whqh3ueyTa6h61e5ATrRG4gQXXhQ.jpg', 2, '2023-01-17 08:53:07', '2023-01-17 08:53:07'),
(5, 'Charles', 'ちゃーるず', '男の子', 'students/aeRnpqbaomq4IEXQmSumM8lW12HDYXuI9UHUWmse.jpg', 3, '2023-01-17 08:53:58', '2023-01-17 08:53:58'),
(6, 'Karen', 'かれん', '女の子', 'students/u2OItZegsZIeaPaIhjjtLn04QnDM8Mm9NUzNvuWz.jpg', 3, '2023-01-17 08:54:18', '2023-01-17 08:54:18'),
(7, 'Lisa', 'りさ', '女の子', 'students/Wh0hEzewG8rmNu5BNhjSXh4bgK5lmBHnuwA8xYKl.jpg', 4, '2023-01-17 08:55:12', '2023-01-17 08:55:12'),
(8, 'Daniel', 'だにえる', '男の子', 'students/7QYhVvvgrnBO5sPx3JfzUEKFVPoomCCaGMYRfXso.jpg', 4, '2023-01-17 08:55:35', '2023-01-17 08:55:35'),
(9, 'Matthew', 'ましゅー', '男の子', 'students/EfHNNWxoIKInjwWcEaMh1PxzA0tPhkN5fFhecgwz.jpg', 5, '2023-01-17 08:57:20', '2023-01-17 08:57:20'),
(10, 'Anthony', 'あんそにー', '男の子', 'students/JOi0rfoEoCYTsRF4BtAj6SBgdOFN2Bg3iUOcJgcn.jpg', 5, '2023-01-17 08:57:37', '2023-01-17 08:57:37');  
```

* SeederとSQLファイル入れた結果  
・users(保護者)tableのid「1～5」に各2つずつstudentsのデータを格納。  
・students(園児)tableのid「1～9」にattendances(登園/降園)tableのデータを紐づけ。  
  よって、シーディングした日付の「登園/降園」の情報をDBに格納。  
・students(園児)tableのid「10」にabsences(欠席)tableのデータを紐づけ。  
  よって、シーディングした日付の「欠席」の情報をDBに格納。

## Git Cloneからphp artisan serveまでの手順
1. git cloneをする
2. PHPとLaravelに拡張機能を導入
3. DB接続
4. マイグレーション実行
    ```
    php artisan migrate
    ```
5. DBにSQLファイル「students.sql」をインポートする
6. シーダー実行
    ```
    php artisan db:seed
    ```
7. サーバー立ち上げ
    ```
    php artisan serve
    ```
8. LPに接続
    URL  
    ```
    /tonttu
    ```
9. 管理者ページにログイン
    ```
    email: admin@gmail.com
    pw: password
    ```
10. 保護者ページにログイン
    ```
    email: james@example.com
    pw: password
    ```


## 知らない技術に挑戦

* 非同期処理（Ajax）  
    QRコードを読み込み、該当するデータをDBから取得し画面に表示する。  
* API連携
    Google Map API  
        LPの「会社概要」の地図をGoogle Mapから取得し、ピン📍を立てた。  
* 出力
    1. PDF出力　　
        保護者ページ：園児のQRコードをPDFで出力
    2. CSV出力
        管理者ページ：過去の登園降園の履歴をCSVで出力


## LP
* header
    - 「会員登録」：保護者用の会員登録に遷移
    - 「ログイン」：保護者用のログインページに遷移
    ![header](https://user-images.githubusercontent.com/90084344/213068212-9d94fee6-cd02-45f1-a798-9517ac19b8e6.png)

* 画面右下の「topボタン」
    - jQueryを使用
    ![top](https://user-images.githubusercontent.com/90084344/213068353-cbb50651-09f8-4b07-9082-fd2bfe647296.png)

* 保護者セクション
    - 保護者ページのメイン機能の解説
    - 「会員登録」：保護者用の会員登録に遷移
    - 「ログイン」：保護者用のログインページに遷移
    ![parentbtn](https://user-images.githubusercontent.com/90084344/213068520-75fafa82-b2e6-4eda-91db-1fb31752943b.png)

* 幼稚園・保育園の先生セクション
    - 管理者ページのメイン機能の解説
    - 「会員登録」：管理者用の会員登録に遷移
    - 「ログイン」：管理者用のログインページに遷移
    ![teacherbtn](https://user-images.githubusercontent.com/90084344/213068581-248fed8f-fe47-4270-8089-0ea928d544bf.png)

* 会社概要
    - Google Map API使用
    - 住所の「東京タワー」に合わせて、Google Mapに赤いピン📍を立てた
    ![company](https://user-images.githubusercontent.com/90084344/213068667-ae9b4b4f-4042-4652-986b-5e5b1ab3cdcc.png)


## 管理者ページ  
* ログイン方法
1. 会員登録
    ![Adminregister](https://user-images.githubusercontent.com/90084344/213057244-fbf11478-31b9-44ed-8eeb-e5defa4854b3.png)
2. ログイン
    ![AdminLogin](https://user-images.githubusercontent.com/90084344/213057354-e7ddb804-a17b-454c-8143-db568001ece9.png)
3. dashboardにアクセス
   ![AdminDashboard](https://user-images.githubusercontent.com/90084344/213062178-9bf37eca-3761-4dbd-a42e-ecd60799d884.png)


* 「登園・降園」一覧を表示  
1. dashboardの「登園・降園の状況」をクリック 
2.  本日の登園・降園を一覧で表示
    - 本日の「登園・降園」をリアルタイムで表示
    - 本日の「欠席」を表示
    - 「未登園数」を「総生徒数-登園済生徒数-当日の欠席数」を元に表示
    ![AdminAttendanceIndex](https://user-images.githubusercontent.com/90084344/213058062-bad72c61-2f5c-45d7-b280-d1f7b88ba68d.png)
3. 「生徒一覧」クリック
    全ての生徒を表示。  
    ![AdminAllStudents](https://user-images.githubusercontent.com/90084344/213058575-34973e04-6952-49b0-86df-991ee0421496.png)

* 過去の「登園・降園」履歴をCSVで出力
1. 「登降園 履歴」クリック
2. 「CSV出力」クリック  
    ![AdminCSV](https://user-images.githubusercontent.com/90084344/213058868-fc25f557-d014-4f04-bf77-e6139ba2e160.png)

* 登園報告
1. 「登園」クリック
    ![AdminAttendance](https://user-images.githubusercontent.com/90084344/213060471-bc86ef8d-977a-4c39-879f-fb336f790bbf.png)
2. 園児のQRコードを読み取り画面(カエルの口の中)にかざす
    - QR Readerは、jQueryを使用
    - 園児が連続でQRコード読み込みを行ったとき、毎回画面をリロードする手間をなくすためにAjaxを使用した。
    ![AdminQRAttendance](https://user-images.githubusercontent.com/90084344/213060564-b042a92c-5a74-4f1b-82cc-00797fc590b8.png)
3.  QRコードに組み込まれた値「student_id」を元に、students tableから student_kanaを取得
    - Ajaxを使用し、DBから取得したデータを画面に表示
    - 園児が連続でQRコード読み込みを行ったとき、毎回画面をリロードする手間をなくすためにAjaxを使用した。
   ![AdminQR](https://user-images.githubusercontent.com/90084344/213060788-265ba3cc-bf22-4c3f-89cc-3164b8ff4c62.png)
4.   「はい」をクリック
5. DBに「登園」のデータが格納される
    - 条件：1日1回だけ「登園」のデータを格納できる。


* 降園報告
1. 「降園」クリック
    ![AdminAttendance](https://user-images.githubusercontent.com/90084344/213060471-bc86ef8d-977a-4c39-879f-fb336f790bbf.png)
2. 園児のQRコードを読み取り画面(カエルの口の中)にかざす
    - QR Readerは、jQueryを使用
    ![AdminLeave](https://user-images.githubusercontent.com/90084344/213061905-1d3757ad-3dc7-4076-b2a3-e5360d053102.png)
3.  QRコードに組み込まれた値「student_id」を元に、students tableから student_kanaを取得
    - Ajaxを使用し、DBから取得したデータを画面に表示
   ![AdminLeavePunchOut](https://user-images.githubusercontent.com/90084344/213062042-b08538c0-9e93-46b7-a798-3ec5889eaa7d.png)
4.   「はい」をクリック
5. DBに「降園」のデータが格納される
    - 条件：1日1回だけ「降園」のデータを格納できる

## 保護者ページ  
* ログイン方法
1. 会員登録  
    ![UserRegister](https://user-images.githubusercontent.com/90084344/213037962-a25f92d6-d3c4-4085-a60a-38077260e71f.png)

2. ログイン  
    ![UserLogin](https://user-images.githubusercontent.com/90084344/213037824-73694fcf-a6ce-4d03-a083-ee94f86dd000.png)

3. dashboardにアクセス
    ![UserDashboard](https://user-images.githubusercontent.com/90084344/213038057-d5d37310-eaa5-439d-b128-4b34ca4aa37b.png)


* 当日の登園/降園を確認
1. dashboardの「登園・降園状況」をクリック  
2. 当日の登園・降園時間をリアルタイムで確認できます。
    「もどる」をクリックするとdashboardに遷移。
    ![UserAttendance](https://user-images.githubusercontent.com/90084344/213038936-61a74b50-a8c4-45cf-8269-39516e48cba5.png)  


* 欠席連絡
1. dashboardの「欠席連絡」をクリック
2. 新規で欠席連絡をする場合
    - 「新規欠席連絡」をクリック
        ![UserAbsent](https://user-images.githubusercontent.com/90084344/213039455-a821e990-fa2c-4c9e-8239-b92d37a6b783.png)
    - ログインユーザーに紐ずく園児(お子様)の名前・欠席日・欠席理由を記入し、送信
        ![UserRegisterAbsent](https://user-images.githubusercontent.com/90084344/213040326-3462e9f8-8c9d-4aae-a3b7-671280c54f2d.png)
    - 登録完了のメッセージが表示される。この文字は3秒後に自動で消える。
        ![UserCompleteAbsent](https://user-images.githubusercontent.com/90084344/213041082-8ba6a59a-55fb-4c7d-84b8-82bafb2e597a.png)
3. 「詳細」クリック
        ![UserAbsentDetails](https://user-images.githubusercontent.com/90084344/213044365-9e2452bc-f975-4559-8a61-c99a2a2e19f2.png)
4. 「編集」クリック  
    欠席日と欠席理由のみ編集が可能。  
        ![UserAbsentEdit](https://user-images.githubusercontent.com/90084344/213046299-4bfe37ac-24a5-47ce-80d5-c30f6c9d6265.png)  
5. 「削除」クリック  
    欠席連絡のデータを削除。


* お子様の新規登録
1. 「新規登録」をクリック
2. 必要事項の情報を入力し、登録する。
    ![UserAddStudent](https://user-images.githubusercontent.com/90084344/213053769-a1604eb9-48e7-448a-a40a-4140fe8afc83.png)
3. 「詳細」クリック
    ![UserStudentShow](https://user-images.githubusercontent.com/90084344/213054213-942dec7d-8707-4534-825a-0fa9f0c2080f.png)
4. 「編集」クリック
    ![UserStudentUpdate](https://user-images.githubusercontent.com/90084344/213054330-be1d121b-3790-4aee-a5ca-381166cd61f5.png)
5. 「削除」クリック 
    ![UserStudentDelete](https://user-images.githubusercontent.com/90084344/213054410-12425124-2f18-4bc6-80ec-1be9be995c02.png)


* 登園・降園の登録に必要なQRコードを出力
1. 「表示」クリック  
    ![UserQR](https://user-images.githubusercontent.com/90084344/213054629-59117752-f1a8-4808-9737-3ffee7e7fe6a.png)
2. 「PDF」クリック
    ![UserPDF](https://user-images.githubusercontent.com/90084344/213054752-8e968765-29f0-4607-a1b2-0b27c436bd61.png)



## 既存システム：ルクミー
* tonttu開発で参考にしたポイント
    - 施設のタブレットから簡単に記録
    - 打刻データをエクセルで出力、印刷も可能
    - 保護者も保育者も使いやすいデザイン
    - リアルタイム時計を画面に表示
* このシステムの改善点を踏まえ、tonttuに反映したこと
    - 保護者が玄関先で打刻をする。
        - 理由：園バスを使う保護者は、幼稚園/保育園先で打刻ができない
        - tonttuに反映した箇所：園児が簡単に報告ができるシステムをQRコードリーダーを元に開発。
        - 理由：タブレットに園児の顔写真があったとしても、押し間違いをする可能性は0ではない。
        - tonttuに反映した箇所：園児が簡単に報告ができるシステムをQRコードリーダーを元に開発。
    - 打刻済リストは、毎回「更新」ボタンを押さないと最新データを取得できない可能性がある。
        - 理由：毎回「更新」ボタンを押すことは、手間
        - tonttuに反映した箇所：随時反映できるようにAttendanceController.phpにSQL文を記入。
* URL: https://lookmee.jp/attendance/

## 既存システム：WEL-KIDS
* tonttu開発で参考にしたポイント
    - 施設のタブレットから簡単に記録
    - 保護者サイトから簡単に欠席報告ができる。
    - QRコードを使った非接触の登降園管理
* このシステムの改善点
    - 保護者が玄関先で打刻をする。
        - 理由：園バスを使う保護者は、幼稚園/保育園先で打刻ができない
     - QRコードを使った非接触の登降園管理。保護者はアプリで施設にあるQRコードを読み込む。
        - 理由：保護者が施設に伺うことが大前提のシステムになる。園バスを使う幼稚園/保育園の場合、このシステムを使えないのでは？
* URL: https://www.wel-kids.com/?gclid=CjwKCAiAheacBhB8EiwAItVO27rSeaKJRNv-htUc3ONEPLKqfSBMmoVt8GBmzaHmKQ_IBPYCusGWwBoCWIIQAvD_BwE


## 今後の追加実装
* 連絡帳
    - 日々の報告をオンライン上で実現できれば、手書きで連絡帳を書く手間を省ける。
        - 機能：リアルタイムチャットを使用すればいいのでは？
    - 参考：https://www.wel-kids.com/hogosha.html#notebook
* バス管理:どこにバスがいるかわかる。(Google Map API)
    - リアルタイムでどこにバスがいるか保護者が把握できれば、園バスを利用する保護者にとって時間管理ができるため便利。
        - 機能：Google Maps JavaScript Api 現在位置を取得するサンプル (Geolocation API)を使用すればいいのでは？
        - Googel Map APIできること https://cloud-ace.jp/column/detail336/
    - 参考：https://www.wel-kids.com/hogosha.html#notebook




