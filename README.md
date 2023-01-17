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
・users(保護者)tableのid「1~5」に各2つずつstudentsのデータを格納。  
・students(園児)tableのid「1~9」にattendances(登園/降園)tableのデータを紐づけ。  
  よって、シーディングした日付の「登園/降園」の情報をDBに格納。
・students(園児)tableのid「10」にabsences(欠席)tableのデータを紐づけ。  
  よって、シーディングした日付の「欠席」の情報をDBに格納。

## Git Cloneからphp artisan serveまでの手順
1. git cloneをする
2. PHPとLaravelに拡張機能を導入
3. DB接続
4. DBにSQLファイル「students.sql」をインポートする
5. マイグレーション実行
    ```
    php artisan migrate
    ```
7. シーダー実行
    ```
    php artisan db:seed
    ```
9. サーバー立ち上げ
    ```
    php artisan serve
    ```
11. 管理者ページにログイン
    ```
    email: admin@gmail.com
    pw: password
    ```
13. 保護者ページにログイン
    ```
    email: james@example.com
    pw: password
    ```
注意点などがあれば書く


## 文責

作成情報を列挙する

* 作成者
* 所属
* E-mail
* [@twitter_username](https://twitter.com/twitter_username)


## ライセンス

ライセンスを明示する

"リポジトリ名" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).


## 参考文献

参考にした情報源（サイト・論文）などの情報、リンク
