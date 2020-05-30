@extends('layouts.home')


@section('content')
<div class="row">
    <div class="col-md-5">
        <h5>Анкета студента</h5>
        <hr>
        {!! Form::open(['route' => 'student.store', 'method' => 'post','enctype' => 'multipart/form-data']) !!}
        @include('students.form')
        <div class="form-group">
            {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection