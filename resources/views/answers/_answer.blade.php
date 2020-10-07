<div class="media post">
    @include('shared._vote',['model' => $answer])
    <div class="media-body">
        <p>{!! $answer->body !!}</p>
        <div class="row">
            <div class="col-4">
                <div class="ml-auto">
                    @can('update',$answer)
                    <a href="{{ route('questions.answers.edit',[$question->id,$answer->id]) }}"
                        class="btn btn-sm btn-outline-info">
                        edit
                    </a>
                    @endcan
                    @can('delete',$answer)
                    <form class="d-inline" action="{{ route('questions.answers.destroy',[$question->id,$answer->id]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Are you sure ?')">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                @include('shared._author',['model' => $answer,'label' => 'answered'])
            </div>
        </div>
    </div>
</div>