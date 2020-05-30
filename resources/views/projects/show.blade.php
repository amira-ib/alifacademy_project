@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h5>Информация о проекте:</h5>
        <hr>
        <div class="list-group" >
            <div class="list-group-item">
                <b>Заголовок:</b>  {{ucfirst($project->title)}}
            </div>

            <div class="list-group-item">
                <b>Cсылка:</b><a href="#"></a>{{ucfirst($project->link)}}
            </div>

            <div class="list-group-item">
                <b>Описание:</b> {{ucfirst($project->description)}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class=" alert alert-info">
            <h5>Навыки</h5>
            {{--skill used in project--}}
            <div class="list-group">
            @forelse($project->skills as $skill)
                    <div class="list-group-item">
                        {!! Form::open(['route' => ['project.destroySkill','project_id'=>$project->id, 'skill_id' => $skill->id],'method'=>'delete']) !!}
                        {{Form::submit('Удалить',['class'=>'btn btn-sm btn-danger pull-right'])}}
                        {!! Form::close() !!}
                        {{$skill->skill_name}}
                        <div class="clearfix"></div>
                    </div>
                @empty
                    <div class="alert alert-danger">Список навыков пуст</div>
                @endforelse
            </div>
            @if(count($skills)>0)
            <hr>
            {{--add skill in project form--}}
            {!! Form::open(['route' => ['project.addskill', $project->id], 'method' => 'post']) !!}
            <div class="form-group">
                <select name ="skill_id" class="form-control">
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}">{{$skill->skill_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
            </div>
            {!! Form::close() !!}
            @else
                <div class="alert alert-danger">Увы, навыки закончились</div>
            @endif
        </div>
    </div>
<div class="col-md-6">
        <div class=" alert alert-info">

            <h5>Студенты</h5>
            {{--list of students in project--}}
            <div class="list-group">
                @forelse($project->students as $student)
                    <div class="list-group-item">
                        {!! Form::open(['route' => ['project.destroyStudent', 'project_id' => $project->id, 'student_id' => $student->id],'method'=>'delete']) !!}
                        {{Form::submit('Удалить',['class'=>'btn btn-sm btn-danger pull-right'])}}
                        {!! Form::close() !!}
                        {{$student->surname}} {{$student->name}}
                        <div class="clearfix"></div>
                    </div>
                @empty
                    <div class="alert alert-danger">Список студентов пуст</div>
                @endforelse
            </div>
            @if(count($students)>0)
            <hr>
            {{--add student in project form--}}
            {!! Form::open(['route' => ['project.addstudent', $project->id], 'method' => 'post']) !!}
            <div class="form-group">
                <select name ="student_id" class="form-control">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{$student->surname}} {{$student->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
            </div>
            {!! Form::close() !!}
            @else
                <div class="alert alert-danger">Увы, студенты закончились</div>
            @endif
        </div>
    </div>
</div>
@endsection