<input type="hidden" name="order_id" value="{{ $order->id }}">

<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
      <label for="input_name">評価 <span class="text-danger">※</span></label><br>
      <label><input type="radio" value="1" name="rate"> 非常に悪い</label>
      <label><input type="radio" value="2" name="rate"> 悪い</label>
      <label><input type="radio" value="3" name="rate"> 普通</label>
      <label><input type="radio" value="4" name="rate"> 良い</label>
      <label><input type="radio" value="5" name="rate"> 非常に良い</label>

      @if ($errors->has('rate'))
      <span class="help-block"><strong>{{ $errors->first('rate') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
      <label for="input_name">コメント <span class="text-danger">※</span></label>
      <textarea  name="comment" class="form-control">{{ Request::old('comment') }}</textarea>
      @if ($errors->has('comment'))
      <span class="help-block"><strong>{{ $errors->first('comment') }}</strong></span>
      @endif
    </div>
  </div>
</div>
