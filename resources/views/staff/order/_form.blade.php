<input type="hidden" name="order_id" value="{{ $order->id }}">
@if ($errors->has('order_id'))
<span class="help-block"><strong>{{ $errors->first('order_id') }}</strong></span>
@endif


    <div class="form-group{{ $errors->has('ok') ? ' has-error' : '' }}">
      <label for="ok" class="control-label col-md-2">依頼受け入れ <span class="text-danger">※</span></label>
      <?php $okOld = Request::old('ok') ?: $order->ok;?>
      <div class="col-md-4">
        <label class="checkbox-inline"><input type="radio" name="ok" value="1"@if($okOld) checked="checked"@endif> 承諾する</label>
        <label class="checkbox-inline"><input type="radio" name="ok" value="0"> お断りする</label>
        @if ($errors->has('ok'))
        <span class="help-block"><strong>{{ $errors->first('ok') }}</strong></span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('staff_comment') ? ' has-error' : '' }}">
      <label for="staff_comment" class="control-label col-md-2">返信内容 <span class="text-danger">※</span></label>
      <div class="col-md-4">
        <textarea  name="staff_comment" class="form-control">{{ Request::old('staff_comment') ?: $order->staff_comment }}</textarea>
        <p>必ずご記入ください</p>
        @if ($errors->has('staff_comment'))
        <span class="help-block"><strong>{{ $errors->first('staff_comment') }}</strong></span>
        @endif
      </div>
    </div>
