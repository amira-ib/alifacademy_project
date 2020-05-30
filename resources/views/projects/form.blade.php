<div class="form-group">
    {{Form::label('title', 'Заголовок:')}}<br>
    {{Form::text('title',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('link', 'Ссылка:')}}<br>
    {{Form::text('link',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('description', 'Описание:')}}<br>
    {{Form::textarea('description',null,['class' => 'form-control','required'])}}
</div>