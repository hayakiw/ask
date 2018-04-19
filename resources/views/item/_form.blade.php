<input type="hidden" name="item_id" value="{{ $item->id }}">
@if ($errors->has('item_id'))
<span class="help-block"><strong>{{ $errors->first('item_id') }}</strong></span>
@endif

<div class="row">
<div class="form-group">
  <div class="col-md-12">
    <a href="{{ route('message.show', ['staff' => $item->staff->id ]) }}" class="btn btn-primary btn-block">メッセージ</a>
  </div>
</div>
</div>


<div class="row mt-10">
  <div class="col-sm-12">
    <div class="form-group">
      <p>まずはメッセージを送り、場所・日時を決めてください。</p>
      <p>お互いの希望が一致したら、下記より申請してください。</p>
    </div>
  </div>
</div>


<div class="row mt-10">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="input_name">合計金額</label><br>
      xxx,xxx 円
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
      <label for="input_name">利用時間 <span class="text-danger">※</span></label>
      <input type="number" name="hours" class="form-control" value="{{ Request::old('hours') ?: $order->hours }}" placeholder="例:2" max="24">
      @if ($errors->has('hours'))
      <span class="help-block"><strong>{{ $errors->first('hours') }}</strong></span>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-4 col-xs-7">
    <div class="form-group{{ $errors->has('prefer_date') || $errors->has('prefer_date') ? ' has-error' : '' }}">
      <label for="name">希望日時 <span class="text-danger">※</span></label>
      <div class="input-group">
        <input type="date" name="prefer_date"  class="form-control datepicker" value="{{Request::old('prefer_date') ?: $order->prefer_date}}" />      </div>
      @if ($errors->has('prefer_date'))
      <span class="help-block"><strong>{{ $errors->first('prefer_date') }}</strong></span>
      @endif
    </div>
  </div>

  <div class="col-sm-2 col-xs-4">
    <div class="form-group{{ $errors->has('prefer_hour') || $errors->has('prefer_hour') ? ' has-error' : '' }}">
      <label for="name">　</label>
      <div class="input-group">
        <input type="time" name="prefer_hour"  class="form-control datepicker" value="{{Request::old('prefer_hour') ?: $order->prefer_hour}}" />      </div>
      @if ($errors->has('prefer_hour'))
      <span class="help-block"><strong>{{ $errors->first('prefer_hour') }}</strong></span>
      @endif
    </div>
  </div>
</div>
