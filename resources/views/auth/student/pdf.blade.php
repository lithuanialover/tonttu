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
        {{ QrCode::size(400)->generate($student->id) }}
        {{-- <img class="rounded-circle" src="{{asset('storage/' . $student->student_image)}}"> --}} <!--読み込みに時間がかかって表示できなかった-->
    </body>
</html>