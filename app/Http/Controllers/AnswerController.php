<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Exception;
use Illuminate\Http\Request;

class AnswerController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        // try {
        $question->answers()->create(
            $request->validate([
                'body' => 'required'
            ]) + ['user_id' => \Auth::id()]
        );

        return back()->with('success', "Your answer has been submitted successfully");
        // } catch (Exception $e) {
        //     return back()->with('failed', "Something went wrong");
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}