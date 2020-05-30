@extends('layouts.home')

@section('content')
<div class="row">
    <h5>Информация о группе:</h5>
    <hr>
    <div class="col-md-5">

        <div class="list-group" >
            <div class="list-group-item">
                <b>Название:</b>  {{($group->group_name)}}
            </div>

            <div class="list-group-item">
                <b>Дата начала:</b>  {{ Carbon\Carbon::parse($group->group_start)->format('d/m/Y') }}
            </div>

            <div class="list-group-item">
                <b>Дата окончания:</b>  {{ Carbon\Carbon::parse($group->group_end)->format('d/m/Y') }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
    <div class="alert alert-info">
        {{--list of students in group--}}

        <h5>Студенты</h5>
        <div class="list-group">
            @forelse($group->students as $students)
                <div class="list-group-item">
                    {!! Form::open(['route' => ['group.destroyStudent','group_id'=>$group->id, 'student_id' => $students->id],'method'=>'delete']) !!}
                    {{Form::submit('Удалить',['class'=>'btn btn-sm btn-danger pull-right'])}}
                    {!! Form::close() !!}
                    {{$students->surname}} {{$students->name}}
                    <div class="clearfix"></div>
                </div>
             @empty
                <div class="alert alert-danger"> Список студентов пуст</div>
            @endforelse
        </div>
        @if(count($student) > 0)
        <hr>
            {{--add student in group form--}}
        {!! Form::open(['route' => ['group.addstudent',$group->id], 'method' => 'post']) !!}
        <div class="form-group">
            <select name ="student_id" class="form-control">
                @foreach ($student as $students) {
                <option value="{{ $students['id'] }}">{{$students['surname']}} {{$students['name']}}</option>}
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
        </div>
        {!! Form::close() !!}
        </div>
        @else
            <div class="alert alert-danger">Увы, студенты закончились</div>
        @endif
    </div>

</div>
@endsection