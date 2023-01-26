@extends('layouts.admin')

@section('main')
<div class="cnt-position">
    <div class="cnt-width cnt-mg-top auth-flame">
        <div class="flex" style="justify-content: space-between;">
            <div style="width: 75%;">
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
            <div style="width;20%;">
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
        </div>
        <div class="flex" style="justify-content: center;"> 
            <div style="margin-bottom: 30px; width: 60%;">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        {{-- <div class="flex" style="justify-content: space-between;  margin-bottom: 50px;">
            <div class="table" style="width: 30%;">
                <table>
                    <tr class="table-bloke">
                        <th>参加者</th>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="table" style="width: 30%;">
                <table>
                    <tr class="table-bloke">
                        <th>欠席者</th>
                    </tr>
                    <tr>
                        <td>aa</td>
                    </tr>
                </table>
            </div>
            <div class="table" style="width: 30%;">
                <table>
                    <tr class="table-bloke">
                        <th>未回答者</th>
                    </tr>
                    <tr>
                        <td>aa</td>
                    </tr>
                </table>
            </div>
        </div> --}}
        <div class="flex table-btn-position" style="margin-bottom: 100px; justify-content: center;">
            <div class="register show-btn" style="width:200px;">
                <a href="{{ route('meetingList') }}">もどる</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["参加", "欠席", "未回答"],
            datasets: [{
                backgroundColor: [
                    "#BB5179",
                    "#FAFF67",
                    "#58A27C"
                ],
                data: [{{ $countAttend }}, {{ $countAbsent }}, {{ $countNotYet }}]
            }]
        },
        options: {
            title: {
                display: true,
                text: '回答状況の円グラフ'
            }
        }
    });
    </script>
@endsection
