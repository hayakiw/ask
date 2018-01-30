<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
      <label for="input_name">利用時間 <span class="text-danger">※</span></label>
      <input type="text" name="hours" class="form-control" value="{{ Request::old('hours') ?: $item->hours }}">
      @if ($errors->has('hours'))
      <span class="help-block"><strong>{{ $errors->first('hours') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('use_date') || $errors->has('use_date') ? ' has-error' : '' }}">
      <label for="name">利用日時(日) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="text" name="use_date"  class="form-control datepicker" value="{{Request::old('use_date') ?: $item->use_date}}" />      </div>
      @if ($errors->has('use_date'))
      <span class="help-block"><strong>{{ $errors->first('use_date') }}</strong></span>
      @endif
    </div>
  </div>

    <div class="col-sm-6">
      <div class="form-group{{ $errors->has('use_hour') || $errors->has('use_hour') ? ' has-error' : '' }}">
        <label for="name">利用日時(時) <span class="text-danger">※</span></label>
        <div class="input-group">
          <input type="text" name="use_hour"  class="form-control datepicker" value="{{Request::old('use_hour') ?: $item->use_hour}}" />      </div>
        @if ($errors->has('use_hour'))
        <span class="help-block"><strong>{{ $errors->first('use_hour') }}</strong></span>
        @endif
      </div>
    </div>
</div>
