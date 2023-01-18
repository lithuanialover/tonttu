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


## 管理者ページ  
* 当日の登園/降園を確認
1. ログイン
2. dashboardにアクセス
3. 「登園・降園のリスト」


## 保護者ページ  
* ログイン方法
1. 会員登録  
    ![UserRegister](https://user-images.githubusercontent.com/90084344/213037962-a25f92d6-d3c4-4085-a60a-38077260e71f.png)

2. ログイン  
    ![UserLogin](https://user-images.githubusercontent.com/90084344/213037824-73694fcf-a6ce-4d03-a083-ee94f86dd000.png)

3. dashboardにアクセス
    ![UserDashboard](https://user-images.githubusercontent.com/90084344/213038057-d5d37310-eaa5-439d-b128-4b34ca4aa37b.png)

* 当日の登園/降園を確認
4. dashboardの「登園・降園状況」をクリック  
5. 当日の登園・降園時間をリアルタイムで確認できます。
    「もどる」をクリックするとdashboardに遷移。
    ![UserAttendance](https://user-images.githubusercontent.com/90084344/213038936-61a74b50-a8c4-45cf-8269-39516e48cba5.png)  

* 欠席連絡
5. dashboardの「欠席連絡」をクリック
6. 新規で欠席連絡をする場合
    - 「新規欠席連絡」をクリック
        ![UserAbsent](https://user-images.githubusercontent.com/90084344/213039455-a821e990-fa2c-4c9e-8239-b92d37a6b783.png)
    - ログインユーザーに紐ずく園児(お子様)の名前・欠席日・欠席理由を記入し、送信
        ![UserRegisterAbsent](https://user-images.githubusercontent.com/90084344/213040326-3462e9f8-8c9d-4aae-a3b7-671280c54f2d.png)
    - 登録完了のメッセージが表示される。この文字は3秒後に自動で消える。
        ![UserCompleteAbsent](https://user-images.githubusercontent.com/90084344/213041082-8ba6a59a-55fb-4c7d-84b8-82bafb2e597a.png)
    - 
8. 

* 


## ReadMeに画像を入れる
https://qiita.com/r_midori/items/2c4feb5de05535441bc8
