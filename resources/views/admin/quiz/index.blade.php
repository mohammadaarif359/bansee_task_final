@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{ __('Atempt the Quiz') }}</b></div>
                <div class="card-body">
					@error('answer')
						<div class="alert alert-danger">
							{{$message}}
						</div>
					@enderror
					<form action="{{ route('admin.quiz.score') }}" method="POST">
                        @csrf
                        @foreach($questions as $q=>$question)
						@php
							$userAnswer = session('results')[$q]['user_answer'] ?? '';
							$correctAnswer = session('results')[$q]['correct_answer'] ?? '';
							$isCorrect = session('results')[$q]['is_correct'] ?? false;
						@endphp
                        <div class="mb-3">
                            <p>{{$q+1 }} : {{ $question->question_text }}</p>
							@foreach(['option_a', 'option_b', 'option_c', 'option_d'] as $option)
                            <div class="form-check">
								<input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" value="{{ $option }}" 
									@if(old('answer.'.$question->id) === $option || $userAnswer === $option) checked @endif
								>
                                <label class="form-check-label @if($userAnswer === $option && $isCorrect) text-success @elseif($userAnswer === $option && !$isCorrect) text-danger @endif" for="{{$option}}">{{ $question[$option] }}</label>
                            </div>
							@endforeach
							
							@if(session('results'))
							<div class="text-sccuess"><b>Correct Ans: {{ str_replace("option_","",$correctAnswer) }}</b></div>
							@endif
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
