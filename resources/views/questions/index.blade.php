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
                    @forelse ($questions as $que)
                    @include('questions._excerpt')
                    @empty
                    <div class="alert alert-warning">
                        <strong>Sorry </strong>There are no questions available.
                    </div>
                    @endforelse
                    <div class="d-flex justify-content-center mt-4">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection