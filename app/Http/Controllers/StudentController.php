<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; #外部キー: user_idのバリデーション
use App\Http\Requests\StudentRequest; #Validation for the students table
use SimpleSoftwareIO\QrCode\Facades\QrCode; //QRコード用

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 「\Auth::user()->students」ログインユーザーのデータのみ取得
        $students = \Auth::user()->students; #Ignore an error「Undefined type 'Auth'」 because it does not effect the functions of CRUD.

        return view('auth.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        // アップロードされたファイルの取得
        $image = $request->file('student_image');

        // ファイルの保存とパスの取得
        $path = isset($image) ? $image->store('students', 'public') : '';

        // 商品をデータベースに登録
        Student::create([
            'student_name' => $request->student_name,
            'student_kana' => $request->student_kana,
            'student_gender' => $request->student_gender,
            'student_image'=> $path,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('students.index')
                        ->with('success','新規作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('auth.student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('auth.student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {

        // 画像ファイルインスタンス取得
        $image = $request->file('student_image');

        // 現在の画像へのパスをセット
        $path = $student->image;
        if (isset($image)) {

            #104をコメントアウトしたら更新できた【ERROR】:League\Flysystem\Filesystem::delete(): Argument #1 ($location) must be of type string, null given, called in
            // 現在の画像ファイルの削除
            // \Storage::disk('public')->delete($path);

            // 選択された画像ファイルを保存してパスをセット
            $path = $image->store('students', 'public');
        }

        // 商品をデータベースに登録
        $student->update([
            'student_name' => $request->student_name,
            'student_kana' => $request->student_kana,
            'student_gender' => $request->student_gender,
            'student_image'=> $path,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('students.index')
                        ->with('success','更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                        ->with('success','削除しました。');
    }

    public function generate ($id)
    {
        $path = 'http://127.0.0.1:8000';

        $route = '/attendance/';

        $student = Student::findOrFail($id);

        // $qrcode = QrCode::size(400)->generate($student->id);//student IDでQR作成 #ideal: insert multiple data

        $qrcode = QrCode::size(400)->generate($path.$route.$student->id);//URL組み込んだQRコード

        return view('auth.student.qrcode',['student' => $student],compact('qrcode'));
    }

    public function pdf ($id)
    {
        $student = Student::findOrFail($id);

        $path = 'http://127.0.0.1:8000';//URL付きQRのために追記 + compact('url')
        $route = '/attendance/';//URL付きQRのために追記 + compact('url')
        $url = $path.$route;//URL付きQRのために追記 + compact('url')

        $pdf = \PDF::loadView('auth.student.pdf', ['student' => $student],compact('url')); # PDF前の「\」は必要

        $pdf->setPaper('A4');

        return $pdf->stream();
    }
}
