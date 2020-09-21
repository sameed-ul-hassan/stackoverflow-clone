@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h2>{{ $question->title }}</h2>
                            <div class="ml-auto">
                                <a class="btn btn-outline-secondary" href="{{ route("questions.index") }}">
                                    Back to all Questions
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a class="vote-up" title="This question is useful">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <span class="vote-count">1230</span>
                            <a class="vote-down off" title="This question is not useful">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <a title="Click to mark as favorite (click again to undo)" class="favorite mt-2 favorited">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorite-count">123</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">
                                    Answerd {{ $question->created_date }}
                                </span>
                                <div class="media mt-2 d-flex align-items-center">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count. " ".\Illuminate\Support\Str::plural('Answer',$question->answer_count) }}
                        </h2>
                    </div>
                    <hr>
                    @foreach ($question->answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a class="vote-up" title="This answer is useful">
                                <i class="fas fa-caret-up fa-2x"></i>
                            </a>
                            <span class="vote-count">1230</span>
                            <a class="vote-down off" title="This answer is not useful">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>
                            <a title="Mark this answer as best answer" class="vote-accepted mt-2">
                                <i class="fas fa-check fa-2x"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <p>{!! $answer->body !!}</p>
                            <div class="float-right">
                                <span class="text-muted">
                                    Answerd {{ $answer->created_date }}
                                </span>
                                <div class="media mt-2 d-flex align-items-center">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection