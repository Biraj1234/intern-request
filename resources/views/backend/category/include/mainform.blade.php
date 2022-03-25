<!--Title-->
<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}

    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
@error('title')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Slug-->
<div class="form-group">
    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}

    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
@error('slug')
    <p class="text text-danger">{{ $message }}</p>
@enderror


<!--Position-->
<div class="form-group">
    {!! Form::label('position', 'Position', ['class' => 'control-label']) !!}

    {!! Form::number('position', null, ['class' => 'form-control']) !!}
</div>
@error('position')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<div class="form-group">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::radio('status', 1) !!}Active
    {!! Form::radio('status', 0, true) !!}Inactive
</div>
