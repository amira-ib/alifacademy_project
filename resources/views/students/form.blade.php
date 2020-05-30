<div class="form-group">
    {{Form::label('name', 'Имя:')}}<br>
    {{Form::text('name', null, ['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('surname', 'Фамилия:')}}<br>
    {{Form::text('surname',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('patronymic', 'Отчество:')}}<br>
    {{Form::text('patronymic',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('nickname', 'Прозвище(ссылка на вашы данные):')}}<br>
    {{Form::text('nickname',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('birthday', 'Дата рождения:')}}<br>
    {{Form::date('birthday',null,['class' => 'form-control','required'])}}
</div>
<div class="form-group">
    {{Form::label('number', 'Номер телефона:')}}<br>
    {{Form::text('number',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('email', 'E-mail:')}}<br>
    {{Form::email('email',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('telegram', 'Telegram аккаунт:')}}<br>
    {{Form::text('telegram',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('about', 'О себе:')}}<br>
    {{Form::textarea('about',null,['class' => 'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('image', 'Фото:')}}<br>
    {{Form::file('image',null,['class' => 'form-control','required'])}}
</div>