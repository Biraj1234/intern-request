<!--Title-->
<div class="form-group">
    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}


    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select a category']) !!}
</div>
@error('title')
    <p class="text text-danger">{{ $message }}</p>
@enderror


<!--Title-->
<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}

    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
@error('title')
    <p class="text text-danger">{{ $message }}</p>
@enderror

<!--Description-->
<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}

    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
@error('description')
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

<!--Image-->
<div class="form-group">
    {!! Form::label('image_file', 'Image', ['class' => 'control-label']) !!}

    {!! Form::file('image_file', null, ['class' => 'form-control']) !!}
</div>
@error('image_file')
    <p class="text text-danger">{{ $message }}</p>
@enderror


<div class="form-group">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::radio('status', 1) !!}Active
    {!! Form::radio('status', 0, true) !!}Inactive
</div>
