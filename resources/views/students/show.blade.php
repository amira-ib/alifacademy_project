@extends('layouts.home')

@section('content')
    <h5>Информация о студенте:</h5>
    <hr>
<div class="row">
    <div class="col-md-6">
        {{--student photo--}}
        <div style="background-color: green;height: 150px;text-align: center">
            <img src="/{{$students->image}}" alt="Profile photo" style="border-radius: 100px;height: 120px; width: 120px;padding: 10px;">
            <h5 style="color:white">{{ucfirst($students->nickname)}}</h5>
        </div>
        {{--student info--}}
        <div class="list-group" >
            <div class="list-group-item">
                <b>Имя:</b>  {{($students->name)}}
            </div>

            <div class="list-group-item">
               <b>Фамилия:</b>  {{($students->surname)}}
            </div>

            <div class="list-group-item">
               <b>Отчество:</b>  {{($students->patronymic)}}
            </div>

            <div class="list-group-item">
                <b>День рождения:</b>  {{ Carbon\Carbon::parse($students->birthday)->format('d/m/Y') }}
            </div>

            <div class="list-group-item">
                <b>Номер телефона:</b>  {{$students->number}}
            </div>

            <div class="list-group-item">
                <b>E-mail:</b>  {{$students->email}}
            </div>

            <div class="list-group-item">
                <b>Мой Telegram:</b>  {{$students->telegram}}
            </div>
            <div class="list-group-item">
                <b>Группа:</b>
                    @foreach($students->groups as $groups)
                    {{ $groups->group_name }}
                    @endforeach
            </div>

            <div class="list-group-item">
                <b>Я думаю, что Я:</b>  {{$students->about}}
            </div>
        </div>
    </div>
        {{--table with student skills--}}
    <div class="col-md-6">
        <div>
            @if (count($students->skills) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Навыки</th>
                        <th>Оценка</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students->skills as $skill)
                    <tr>
                        <td>{{$skill->skill_name}}</td>
                        <td>{{ $skill->pivot->score }}</td>
                       <td>
                           {!! Form::open(['route' => ['student.destroy_skill','student_id'=> $students->id,'skill_id'=>$skill->id], 'method' => 'delete']) !!}
                           {{Form::submit('Удалить',['class'=>'btn btn-sm btn-danger pull-right'])}}
                           {!! Form::close() !!}
                           <a href="{{ route('student.edit_skill_score',$skill->pivot->id) }}" class="btn btn-sm btn-info pull-right">Изменить</a>
                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-danger"> Список навыков пуст</div>
            @endif
        </div>
        {{--add skill form--}}
        @if(count($skills)>0)
        <div class="alert alert-info">
            {!! Form::open(['route' =>['student.addskill',$students->id], 'method' => 'post']) !!}
           {{--dropdownlist of skills--}}
            <div class="form-group">
                <select name ="skill_id" class="form-control">
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}">{{$skill->skill_name}}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="student_id" value="{{$students->id}}">

            <div class="form-group">
                <select name ="score" class="form-control">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                </select>
            </div>

            <div class="form-group">
                {{Form::submit('Добавить',['class'=>'btn btn-success'])}}
            </div>
            {!! Form::close() !!}
        </div>
        @else
            <div class="alert alert-success"> {{$students->name}} гений, знает все навыки</div>
        @endif
    </div>
</div>


@endsection