<input type="hidden" name="order_id" value="{{ $order->id }}">


<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
      <label for="input_name">メッセージ <span class="text-danger">※</span></label>
      <p>来てほしい場所、その他要望を必ずご記入ください</p>
      <textarea  name="comment" class="form-control">{{ Request::old('comment') ?: $order->comment }}</textarea>
      @if ($errors->has('comment'))
      <span class="help-block"><strong>{{ $errors->first('comment') }}</strong></span>
      @endif
    </div>
  </div>
</div>
