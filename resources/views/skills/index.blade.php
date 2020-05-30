@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h5>Список навыков:</h5>
        <hr>
        <ul class="list-group">
            @forelse($skill as $skills)
                <li class="list-group-item">
                    {!! Form::open(['route' => ['skill.destroy',$skills->id], 'method' => 'delete']) !!}
                    {{Form::submit('Удалить',['class'=>'btn btn-sm btn-danger pull-right'])}}
                    {!! Form::close() !!}
                    <a href="{{ route('skill.edit', $skills->id) }}" class="btn btn-sm btn-info pull-right">Изменить</a>
                    <a href="{{route('skill.show',[$skills->id])}}">
                    {{$skills->skill_name}}
                    </a>

                    <div class="clearfix"></div>
                </li>
            @empty
                <div class="alert alert-success">Список пуст</div>
            @endforelse
        </ul>
        <a href="{{route('skill.create')}}" class="btn btn-success">Создать</a>
    </div>
</div>
@endsection