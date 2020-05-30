@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-5">
        <h5>Новая группа</h5>
        <hr>
        {!! Form::open(['route' => 'group.store', 'method' => 'post']) !!}
        @include('groups.form')
        <div class="form-group">
            {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection