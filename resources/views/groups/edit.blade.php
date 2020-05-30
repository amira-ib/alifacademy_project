@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h5>Информация о группе</h5>
        <hr>
        {!! Form::model($group,['route' => ['group.update',$group->id], 'method' => 'put']) !!}
        @include('groups.form')
        <div class="form-group">
            {{Form::submit('Изменить',['class'=>'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection