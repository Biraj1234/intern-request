
<!--Name-->
<div class="form-group">
    {!! Form::label('name','Name',['class'=>'control-label']) !!}

    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
@error('name')
<p class="text text-danger">{{$message}}</p>
@enderror

<!--Username-->
<div class="form-group">
    {!! Form::label('username','Username',['class'=>'control-label']) !!}

    {!! Form::text('username',null,['class'=>'form-control']) !!}
</div>
@error('username')
<p class="text text-danger">{{$message}}</p>
@enderror

<!--Email-->
<div class="form-group">
    {!! Form::label('email','Email',['class'=>'control-label']) !!}

    {!! Form::email('email',null,['class'=>'form-control']) !!}
</div>
@error('email')
<p class="text text-danger">{{$message}}</p>
@enderror

<!--Phone No.-->
<div class="form-group">
    {!! Form::label('contact_number','Phone No.',['class'=>'control-label']) !!}

    {!! Form::number('contact_number',null,['class'=>'form-control']) !!}
</div>
@error('contact_number')
<p class="text text-danger">{{$message}}</p>
@enderror

<!--Password-->
<div class="form-group">
    {!! Form::label('password','Password',['class'=>'control-label']) !!}

    {!! Form::password('password',['class'=>'form-control']) !!}
</div>
@error('password')
<p class="text text-danger">{{$message}}</p>
@enderror

<!--Confirm Password-->
<div class="form-group">
    {!! Form::label('cpassword','Confirm Password',['class'=>'control-label']) !!}

    {!! Form::password('cpassword',['class'=>'form-control']) !!}
</div>
@error('cpassword')
<p class="text text-danger">Password didn't match</p>
@enderror



<!--Profile Picture-->
<div class="form-group">
    {!! Form::label('profile_name','Profile Picture',['class'=>'control-label']) !!}

    {!! Form::file('profile_name',['class'=>'form-control']) !!}
</div>
@error('profile_name')
<p class="text text-danger">{{$message}}</p>
@enderror


