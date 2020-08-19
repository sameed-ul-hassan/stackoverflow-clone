@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('All Questions') }}</h2>
                        <div class="ml-auto">
                            <a class="btn btn-outline-secondary" href="{{ route("questions.create") }}">
                                Ask Question
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    @foreach ($questions as $que)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{ $que->votes }}</strong>{{ \Illuminate\Support\Str::plural('vote',$que->votes) }}
                            </div>
                            <div class="status {{ $que->status }}">
                                <strong>{{ $que->answers }}</strong>{{ \Illuminate\Support\Str::plural('answer',$que->answers) }}
                            </div>
                            <div class="view">
                                {{ $que->views ." ".\Illuminate\Support\Str::plural('view',$que->views) }}
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0">
                                    <a href="{{$que->url }}">
                                        {{ $que->title }}
                                    </a>
                                </h3>
                                <div class="ml-auto">
                                    <a href="{{ route('questions.edit',$que->id) }}"
                                        class="btn btn-sm btn-outline-info">
                                        edit
                                    </a>
                                    <form class="d-inline" action="{{ route('questions.destroy',$que->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure ?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <p class="lead">
                                Asked by <a href="{{$que->user->url }}">{{ $que->user->name }}</a>
                                <small class="text-muted">{{ $que->created_date }}</small>
                            </p>
                            {{ \Illuminate\Support\Str::limit($que->body,250) }}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection