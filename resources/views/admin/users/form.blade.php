<div class="form-group">
    <label>Username *</label>
    {!! Form::text("name", null, ['class' => $errors->has("name") ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Enter name']) !!}
    {!! $errors->first("name", '<p class="small text-danger">:message</p>') !!}
</div>
<div class="form-group mt-3">
    <label>Phone *</label>
    {!! Form::text("phone", null, ['class' => $errors->has("phone") ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Enter phone']) !!}
    {!! $errors->first("phone", '<p class="small text-danger">:message</p>') !!}
</div>
<div class="mt-3">
    <a href="{{ $back }}" class="btn btn-light" title="Back">Назад</a>
    <button type="submit" class="btn btn-primary">{{$submitButtonText}}</button>
</div>
