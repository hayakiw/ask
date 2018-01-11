<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="input_name">メールアドレス <span class="text-danger">※</span></label>
      <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: $admin->email }}">
      @if ($errors->has('email'))
      <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
      @endif
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="input_name">パスワード <span class="text-danger">※</span></label>
      <input type="password" name="password" class="form-control" id="password" value="">
      @if ($errors->has('password'))
      <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
      @endif
    </div>
  </div>
</div>
