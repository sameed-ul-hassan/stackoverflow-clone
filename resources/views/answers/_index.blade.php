<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount. " ".\Illuminate\Support\Str::plural('Answer',$answersCount) }}
                    </h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach ($answers as $answer)
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