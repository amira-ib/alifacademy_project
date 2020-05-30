@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h5>Список групп:</h5>
        <hr>
        <ul class="list-group">
            @forelse($group as $groups)
                <li class="list-group-item">
                    {!! Form::open(['route' => ['group.destroy',$groups->id], 'method' => 'delete']) !!}
                    {{Form::submit('Удалить',['class'=>'btn btn-sm btn-danger pull-right'])}}
                    {!! Form::close() !!}
                    <a href="{{ route('group.edit', $groups->id) }}" class="btn btn-sm btn-info pull-right">Изменить</a>

                    <a href="{{route('group.show',[$groups->id])}}">{{($groups->group_name)}}</a>

                    <div class="clearfix"></div>
                </li>
            @empty
                <div class="alert alert-success">Список пуст</div>
            @endforelse
        </ul>
        <a href="{{route('group.create')}}" class="btn btn-success">Создать</a>
    </div>
</div>
@endsection