<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Exception;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // To get query log
        // \DB::enableQueryLog();
        $questions = Question::with('user')->latest()->paginate(5);
        // For displaying query log
        // view('questions.index',compact('questions'))->render();
        // dd(\DB::getQueryLog());
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        try {
            $request->user()->questions()->create($request->all());
            return redirect()->route('questions.index')->with('success', 'Your question has been submitted');
        } catch (Exception $e) {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        if (\Gate::allows('update-question', $question)) {
            return view('questions.edit', compact('question'));
        }
        abort(403, 'Access denied');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        // if (\Gate::allows('update-question', $question)) {
        //     try {
        //         $question->update($request->all());
        //         return redirect()->route('questions.index')->with('success', 'Your question has been updated');
        //     } catch (Exception $e) {
        //     }
        // }
        // abort(403, 'Access denied');
        try {
            $this->authorize('update', $question);
            $question->update($request->all());
            return redirect()->route('questions.index')->with('success', 'Your question has been updated');
        } catch (Exception $e) {
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        // if (\Gate::allows('delete-question', $question)) {
        //     try {
        //         $question->delete();
        //         return redirect()->route('questions.index')->with('success', 'Your question has been deleted');
        //     } catch (Exception $e) {
        //     }
        // }
        // abort(403, 'Access denied');
        $this->authorize('delete', $question);
        try {
            $question->delete();
            return redirect()->route('questions.index')->with('success', 'Your question has been deleted');
        } catch (Exception $e) {
        }
    }
}