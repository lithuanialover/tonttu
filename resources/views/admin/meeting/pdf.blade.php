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

            .flex{
                display: flex;
                justify-content: space-between;
            }

            .attend,
            .absent,
            .nonResponder{
                width: 30%;
            }

            .table{
                margin-bottom: 40px;
            }
                table{
                width: 100%;
            }

            tr{
                border: 2px solid #80000074;
            }

            th,
            td{
                border: 1.5px solid #8000003f;
            }

            th{
                background-color: rgb(128 0 0 / 85%);
                color: #fff;
                text-align: center;
            }

            td{
                text-align:left;
            }

            li{
                list-style: none;
                text-align: center;
            }

            .td-status,
            .td-time{
                width: 45%;
            }

            .td-checkbox{
                width: 10%;
                transform: scale(2);
                margin-right: 11px;
            }

        </style>
    </head>
    <body>
        <h2 class="pdfTtl" style="font-weight:bold">イベント出欠確認</h2>
        <div class="auth-flame">
                <h2 class="form-ttl">イベントの詳細</h2>
                <div class="table">
                    <table style="width: 100%;">
                        <tr class="table-bloke">
                            <th>項目</th>
                            <th>内容</th>
                        </tr>
                        <tr class="table-bloke">
                            <td>イベント名</td>
                            <td>{{ $meeting->name }}</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>開催日</td>
                            <td>{{ $meeting->eventDay }}</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>開催時間</td>
                            <td>{{ $meeting->startTime }}～{{ $meeting->endTime }}</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>イベント詳細</td>
                            <td>{{ $meeting->description }}</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>回答期日</td>
                            <td>{{ $meeting->deadline }}</td>
                        </tr>
                    </table>
                </div>
        </div>
            <div class="auth-flame">
                <h2 class="form-ttl">回答状況</h2>
                <div class="table">
                    <table style="width: 100%;">
                        <tr class="table-bloke">
                            <th>項目</th>
                            <th>数値</th>
                        </tr>
                        <tr class="table-bloke">
                            <td>会員数</td>
                            <td>{{ $countUser }}人</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>参加</td>
                            <td>{{ $countAttend }}人</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>欠席</td>
                            <td>{{ $countAbsent }}人</td>
                        </tr>
                        <tr class="table-bloke">
                            <td>未回答</td>
                            <td>{{ $countNotYet }}人</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="flex">
                <div class="attend">
                    <h2 class="form-ttl">参加者</h2>
                    <div class="table">
                        <table style="width: 100%;">
                            <tr class="table-bloke">
                                <th>名簿</th>
                            </tr>
                            @foreach($participants as $participant)
                            <tr class="table-bloke">
                                <td>{{ $participant->user->name }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="absent">
                    <h2 class="form-ttl">欠席者</h2>
                    <div class="table">
                        <table style="width: 100%;">
                            <tr class="table-bloke">
                                <th>名簿</th>
                            </tr>
                            @foreach($absentees as $absentee)
                            <tr class="table-bloke">
                                <td>{{ $absentee->user->name }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="nonResponder">
                    <h2 class="form-ttl">未回答者</h2>
                    <div class="table">
                        <table style="width: 100%;">
                            <tr class="table-bloke">
                                <th>名簿</th>
                            </tr>
                            @foreach($nonResponders as $nonResponder)
                            <tr class="table-bloke">
                                <td>{{ $nonResponder->user->name }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>