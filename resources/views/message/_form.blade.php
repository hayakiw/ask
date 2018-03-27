<input type="hidden" value="{{ $staff->id }}" name="staff_id">

<div class="row">
  <div class="col-md-offset-1 col-sm-10">
    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
      <label for="input_name">本文</label>
      <textarea  name="body" class="form-control">{{ Request::old('body') }}</textarea>
      @if ($errors->has('body'))
      <span class="help-block"><strong>{{ $errors->first('body') }}</strong></span>
      @endif
    </div>
  </div>
</div>
