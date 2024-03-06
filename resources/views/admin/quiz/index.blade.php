@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quiz') }}</div>
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
							$isCorrect = session('results')[$loop->index]['is_correct'] ?? false;
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
							<div class="text-sccuess">Correct Ans: {{ str_replace("option_","",$correctAnswer) }}</div>
							@endif
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	@if(session('results'))
    <div class="row justify-content-center mt-3">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Results</div>
				<div class="card-body">
					<h2>Your Score: {{ session('score')['totalCorrect'] }}</h2>
					<h4>Correct Answer : {{ session('score')['totalCorrect'] }} | Incorrect Answer : {{ session('score')['totalIncorrect'] }}</h4>
					<p>Here are the answers:</p>
					<div class="list-group">
						@foreach(session('results') as $result)
						<div class="list-group-item list-group-item-action flex-column align-items-start">
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1">Question: {{ $result['question'] }}</h5>
								<small>Your Answer: {{ $result['user_answer'] }}</small>
							</div>
							<p class="mb-1">Correct Answer: {{ $result['correct_answer'] }}</p>
							@if($result['is_correct'])
								<small class="text-success">Correct</small>
							@else
								<small class="text-danger">Incorrect</small>
							@endif
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
    @endif
</div>
@endsection
