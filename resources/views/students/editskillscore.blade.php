@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="alert alert-dismissible">
                {!! Form::model($studentskill,['route' => ['student.update_skill_score', $studentskill->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {{Form::label('score', 'Оценка:')}}<br>
                    {{Form::text('score',null,['class' => 'form-control','required'])}}
                </div>
                <div class="form-group">
                    {{Form::submit('Изменить',['class'=>'btn btn-success'])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection