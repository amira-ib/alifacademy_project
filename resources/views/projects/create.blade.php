@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-5">
        <h5>Информация о проекте:</h5>
        <hr>
        {!! Form::open(['route' => 'project.store', 'method' => 'post']) !!}
        @include('projects.form')
        <div class="form-group">
            {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection