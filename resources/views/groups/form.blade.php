<div class="form-group">
    {{Form::label('group_name', 'Название группы:')}}<br>
    {{Form::text('group_name',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('group_start', 'Дата начала:')}}<br>
    {{Form::date('group_start',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('group_end', 'Дата окончания:')}}<br>
    {{Form::date('group_end',null,['class' => 'form-control','required'])}}
</div>