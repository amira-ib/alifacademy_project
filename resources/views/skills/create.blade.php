@extends('layouts.home')


@section('content')
<div class="row">
    <div class="col-md-5">
        <h5>Навыки:</h5>
        <hr>
        {!! Form::open(['route' => 'skill.store', 'method' => 'post']) !!}

        <div class="form-group">
            {{Form::label('skill_name', 'Название:')}}<br>
            {{Form::text('skill_name', null, ['class' => 'form-control','required'])}}
        </div>

        <div class="form-group">
            {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection