@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h5>Список проектов:</h5>
        <hr>
        <ul class="list-group">
            @forelse($project as $projects)
                <li class="list-group-item">
                    {!! Form::open(['route' => ['project.destroy',$projects->id], 'method' => 'delete']) !!}
                    {{Form::submit('Удалить',['class'=>'btn btn-sm btn-danger pull-right'])}}
                    {!! Form::close() !!}
                    <a href="{{ route('project.edit', $projects->id) }}" class="btn btn-sm btn-info pull-right">Изменить</a>

                    <a href="{{route('project.show',[$projects->id])}}">
                        {{($projects->title)}}
                    </a>

                    <div class="clearfix"></div>
                </li>
            @empty
                <div class="alert alert-success">Список пуст</div>
            @endforelse
        </ul>
        <a href="{{route('project.create')}}" class="btn btn-success">Создать</a>
    </div>
</div>
@endsection