@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-8">

        <h5>Список студентов:</h5>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th>Студент</th>
                <th>Дата создания</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
         @foreach($student as $students)
                <tr>
                    <td> <a href="{{route('student.show',[$students->id])}}">{{($students->surname)}}
                            {{($students->name)}}
                        </a>
                    </td>
                    <td>
                        {{ $students->created_at->diffForHumans() }}
                    </td>
                    <td>
                        {!! Form::open(['route' => ['student.destroy',$students->id], 'method' => 'delete']) !!}
                        {{Form::submit('Удалить',['class'=>'btn btn-sm btn-danger pull-right'])}}
                        {!! Form::close() !!}
                        <a href="{{ route('student.edit', $students->id) }}" class="btn btn-sm btn-info pull-right">Изменить</a>
                    </td>
                </tr>
         @endforeach
            </tbody>
        </table>
        <a href="{{route('student.create')}}" class="btn btn-success">Создать</a>
    </div>
</div>
@endsection