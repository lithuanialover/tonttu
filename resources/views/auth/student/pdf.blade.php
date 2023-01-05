<html lang="ja">
    <head>
        <title>PDF印刷用</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face{
                font-family: migmix;
                font-style: normal;
                font-weight: normal;
                src: url("{{ storage_path('fonts/migmix-2p-regular.ttf')}}") format('truetype');
            }
            @font-face{
                font-family: migmix;
                font-style: bold;
                font-weight: bold;
                src: url("{{ storage_path('fonts/migmix-2p-bold.ttf')}}") format('truetype');
            }
            body {
                font-family: migmix;
                line-height: 80%;
            }

            .pdfTtl{
                text-align: center;
            }

            .studentTable {
                border: 1px solid #000;
                border-collapse: collapse;
                width: 50%;
            }
            .studentTable tr th{
                background: #87cefa;
                padding: 5px;
                border: 1px solid #000;
            }
            .studentTable tr td{
                padding: 5px;
                border: 1px solid #000;
            }

        </style>
    </head>
    <body>
        <h2 class="pdfTtl" style="font-weight:bold">お子様のQRコード</h2>
        {{-- <img src="data:image/png;base64,$image"> --}}
        <table class="studentTable">
            <tr>
                <th>名前</th>
                <th>ふりがな</th>
                <th>性別</th>
            </tr>
            <tr>
                <td><p>{{ $student->student_name }}</p></td>
                <td><p>{{ $student->student_kana }}</p></td>
                <td><p>{{ $student->student_gender }}</p></td>
            </tr>
        </table>
        <p>-------------きりとり線-------------</p>
        <p>登園降園の管理でQRコードを使います。</p>
        <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate($url.$student->id)) }} "> <!--これなら成功-->
        {{-- <p>only student id</p>
        <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate($student->id)) }} "> <!--これなら成功-->
        <p>demo qr code</p>
        <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) }} "> <!--これなら成功--> --}}
    </body>
</html>