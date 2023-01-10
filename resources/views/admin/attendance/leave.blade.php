@extends('layouts.attendance')

@section('main')
    <div class="cnt-position">
        <div class="attendance-width cnt-mg-top">
            <div class="flex">
                <div id="attendance-cnt">
                    @if($message = Session::get('success'))
                        <div class="alert-success">
                            {{ $message }}
                        </div>
                    @endif
                    <div>
                        <h2 class="attendance-ttl">さようなら。</h2>
                        <div class="attendance-card">
                            <div class="attendance-img">
                                <p><span id="kana"><!-- ここに集合場所が入る --></span></p>
                                <p style="font-size: 20px">さんですか？</p>
                            </div>
                            <div class="flex attendance-btn">
                                <div class="yes">
                                    <form method="post" action="{{ route('punchOut') }}">
                                        @csrf
                                        <input type='hidden' id='studentId' name="student_id"/>
                                        {{-- <a href="{{ route('attendance') }}">はい</a> --}}
                                        <button type="submit">はい</button>
                                    </form>
                                </div>
                                <div class="no">
                                    <a href="{{ route('attendance') }}">いいえ</a>
                                </div>
                            </div>
                        </div>
                        <small>*「はい」をクリックすると、降園報告ができます。</small>
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

