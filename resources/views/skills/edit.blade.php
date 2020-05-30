@extends('layouts.home')


@section('content')
<div class="row">
    <div class="col-md-6">
        <h5>Навык:</h5>
        <hr>
        {!! Form::model($skill,['route' => ['skill.update',$skill->id], 'method' => 'put']) !!}

        <div class="form-group">
            {{Form::label('skill_name', 'Название:')}}<br>
            {{Form::text('skill_name', null, ['class' => 'form-control','required'])}}
        </div>

        <div class="form-group">
            {{Form::submit('Изменить',['class'=>'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection