<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('id', 'desc')->paginate(20);
        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:50',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $quiz = Quiz::create($request->all());

        if($quiz) {
            return redirect('/admin/quizzes')->withStatus('Quiz successfully created.');
        }else {
            return redirect('/admin/quizzes/create')->withStatus('Something wrong, Try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show',compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $rules = [
            'name' => 'required|min:3|max:50',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if($quiz->update($request->all())) {
            return redirect('/admin/quizzes')->withStatus('Quiz successfully updated.');
        }else {
            return redirect('/admin/quizzes/'.$quiz->id.'/edit')->withStatus('Something wrong, Try again');
        }
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect('/admin/quizzes')->withStatus('Quiz successfully deleted.');
    }
}
