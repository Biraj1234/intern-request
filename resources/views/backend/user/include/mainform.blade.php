<!--Name-->
<div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}

    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@error('name')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Bio-->
<div class="form-group">
    {!! Form::label('bio', 'Bio', ['class' => 'control-label']) !!}

    {!! Form::text('bio', null, ['class' => 'form-control']) !!}
</div>
@error('bio')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Email-->
<div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}

    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
@error('email')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Phone No.-->
<div class="form-group">
    {!! Form::label('age', 'Age', ['class' => 'control-label']) !!}

    {!! Form::number('age', null, ['class' => 'form-control']) !!}
</div>
@error('age')
    <p class="text text-danger">{{ $message }}</p>
@enderror






<!--Profile Picture-->
<div class="form-group">
    {!! Form::label('profile_name', 'Profile Picture', ['class' => 'control-label']) !!}

    {!! Form::file('profile_name', ['class' => 'form-control']) !!}
</div>
@error('profile_name')
    <p class="text text-danger">{{ $message }}</p>
@enderror
