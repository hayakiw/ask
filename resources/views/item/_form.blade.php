<input type="hidden" name="item_id" value="{{ $order->item_id }}">

<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
      <label for="input_name">利用時間 <span class="text-danger">※</span></label>
      <input type="text" name="hours" class="form-control" value="{{ Request::old('hours') ?: $order->hours }}">
      @if ($errors->has('hours'))
      <span class="help-block"><strong>{{ $errors->first('hours') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('use_date') || $errors->has('use_date') ? ' has-error' : '' }}">
      <label for="name">希望日時(日) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="text" name="use_date"  class="form-control datepicker" value="{{Request::old('use_date') ?: $order->use_date}}" />      </div>
      @if ($errors->has('use_date'))
      <span class="help-block"><strong>{{ $errors->first('use_date') }}</strong></span>
      @endif
    </div>
  </div>

  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('use_hour') || $errors->has('use_hour') ? ' has-error' : '' }}">
      <label for="name">希望日時(時) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="text" name="use_hour"  class="form-control datepicker" value="{{Request::old('use_hour') ?: $order->use_hour}}" />      </div>
      @if ($errors->has('use_hour'))
      <span class="help-block"><strong>{{ $errors->first('use_hour') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('use_date2') || $errors->has('use_date2') ? ' has-error' : '' }}">
      <label for="name">希望日時(日) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="text" name="use_date2"  class="form-control datepicker" value="{{Request::old('use_date2') ?: $order->use_date2}}" />      </div>
      @if ($errors->has('use_date2'))
      <span class="help-block"><strong>{{ $errors->first('use_date2') }}</strong></span>
      @endif
    </div>
  </div>

  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('use_hour2') || $errors->has('use_hour2') ? ' has-error' : '' }}">
      <label for="name">希望日時(時) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="text" name="use_hour2"  class="form-control datepicker" value="{{Request::old('use_hour2') ?: $order->use_hour2}}" />      </div>
      @if ($errors->has('use_hour2'))
      <span class="help-block"><strong>{{ $errors->first('use_hour2') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('use_date3') || $errors->has('use_date3') ? ' has-error' : '' }}">
      <label for="name">希望日時(日) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="text" name="use_date3"  class="form-control datepicker" value="{{Request::old('use_date3') ?: $order->use_date3}}" />      </div>
      @if ($errors->has('use_date3'))
      <span class="help-block"><strong>{{ $errors->first('use_date3') }}</strong></span>
      @endif
    </div>
  </div>

  <div class="col-sm-2">
    <div class="form-group{{ $errors->has('use_hour3') || $errors->has('use_hour3') ? ' has-error' : '' }}">
      <label for="name">希望日時(時) <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="text" name="use_hour3"  class="form-control datepicker" value="{{Request::old('use_hour3') ?: $order->use_hour3}}" />      </div>
      @if ($errors->has('use_hour3'))
      <span class="help-block"><strong>{{ $errors->first('use_hour3') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
      <label for="input_name">備考 <span class="text-danger">※</span></label>
      <input type="text" name="comment" class="form-control" value="{{ Request::old('comment') ?: $order->comment }}">
      @if ($errors->has('comment'))
      <span class="help-block"><strong>{{ $errors->first('comment') }}</strong></span>
      @endif
    </div>
  </div>
</div>
