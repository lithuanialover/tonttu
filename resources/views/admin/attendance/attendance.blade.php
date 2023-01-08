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
                                {{-- <img src="{{ asset('img/kids5.jpg') }}" alt="child photo"> --}}
                                {{-- <p>Jone<span class="small-p">さんですか？</span></p> --}}
                                <p id= "studentKana"></p>
                            </div>
                            <div class="flex attendance-btn">
                                <div class="yes">
                                    <a href="{{ route('attendance') }}">はい</a>
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

