@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-6" >
        <h5>Анкета студента</h5>
        <hr>
        {!! Form::model($project,['route' => ['project.update',$project->id], 'method' => 'put']) !!}
        @include('projects.form')
        <div class="form-group">
            {{Form::submit('Изменить',['class'=>'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection