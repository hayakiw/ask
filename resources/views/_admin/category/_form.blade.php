<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="input_name">カテゴリ名 <span class="text-danger">※</span></label>
      <input type="text" name="name" class="form-control" id="name" value="{{ Request::old('name') ?: $category->name }}">
      @if ($errors->has('name'))
      <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
      @endif
    </div>
  </div>
</div>
