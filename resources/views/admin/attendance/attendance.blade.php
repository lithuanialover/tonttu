@extends('layouts.attendance')

@section('main')
    <div class="cnt-position">
        <div class="attendance-width cnt-mg-top">
            <div class="flex">
                <div id="attendance-cnt">
                    <div>
                        <h2 class="attendance-ttl">おはようございます。</h2>
                        <div class="attendance-card">
                            <div class="attendance-img">
                                <p><span id="kana"><!-- ここに集合場所が入る --></span></p>
                                <p style="font-size: 20px">さんですか？</p>
                            </div>
                            <input type='text' id='yourInputFieldId' name="student_id"/>
                            {{-- <input type='text' id='studentKana' name="student_id"/> --}}
                            <div class="flex attendance-btn">
                                <div class="yes">
                                    <form method="post" action="">
                                        <a href="{{ route('attendance') }}">はい</a>
                                    </form>
                                </div>
                                <div class="no">
                                    <a href="{{ route('leave') }}">いいえ</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="qrreader">
                    <img src="{{ asset('img/flog.png') }}" alt="flog" class="flog">
                    <video id="preview"></video>
                </div>
            </div>
            <div class="back">
                <a href="{{ route('admin.dashboard') }}">もどる</a>
            </div>
        </div>
    </div>
@endsection

