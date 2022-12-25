<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of "students" related to "user_id".
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // with('user') usersテーブルのid(user_id)に対応するstudentsデータを全権取得
        // $data = Student::with('user')->latest()->paginate(5);
        $data = Student::latest()->paginate(5); #オリジナル

        return view('auth.student.index', compact('data'))->with('i', (request()->input('page', 1 ) - 1) *5);
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
    public function store(Request $request)
    {
        // バリデーションエラーはキャッチ不要
        $this->validate($request, $this->validationRuleForCreate);

        $request->validate([
            'student_name' => 'required',
            'student_kana'=> 'required',
            'student_gender'=> 'required',
            'student_image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);

        try{

            // トランザクションの開始
            DB::beginTransaction();

            $file_name = time() . '.' . request()->student_image->getClientOriginalExtension();

            request()->student_image->move(public_path('images'), $file_name);

            $student = new Student();//インスタンスの生成 #()をStudentのあとに追記 pm1 12:25

            $student->user_id = Auth::id();//投稿する際に、ログインしている人のIDが保存されるようにします。
            $student->student_name = $request->student_name;
            $student->student_kana = $request->student_kana;
            $student->student_gender = $request->student_gender;
            $student->student_image = $file_name;

            // 作成したデータをDBに保存 失敗したら例外を返す
            $student->saveOrFail();

            // 全ての保存処理が成功したので処理を確定する
            DB::commit();

            return redirect()->route('user.students.index')->with('success', 'お子様を登録できました。');
        }catch(\Throwable $e){

            // 例外が起きたらロールバックを行う
            DB::rollback();

            // 失敗した原因をログに残す
            Log::error($e);

            // フロントにエラーを通知
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}