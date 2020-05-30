@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h5>{{$skill->skill_name}}: </h5>
            <ul class="list-group">
                @forelse($skill->students as $student)
                    <li class="list-group-item">
                        {{$student->name}}
                    </li>
                 @empty
                    <div class="alert alert-info"> Студенты недостаточно обучены по этому навыку</div>
                @endforelse
            </ul>
        </div>
    </div>
@endsection