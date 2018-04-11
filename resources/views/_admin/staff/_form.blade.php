
<h3>プロフィール</h3>
<div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
  <label for="email" class="control-label col-md-4">メールアドレス <span class="text-danger">※</span></label>
  <div class="col-md-8">
    <input type="mail" name="email" placeholder="例：xxx@example.com" value="{{ Request::old('email', $staff->email) }}" class="form-control"  />
    <p class="">※半角英数字で入力してください</p>
    @if ($errors->has('email'))
    <p class="help-block"><span>{{ $errors->first('email') }}</span></p>
    @endif
  </div>
</div>

<div class="form-group{{ ($errors->has('password')) ? ' has-error' : '' }}">
  <label for="password" class="control-label col-md-4">パスワード <span class="text-danger">@if (isset($form_type) && $form_type == 'create') ※@else &nbsp;&nbsp;@endif</span></label>
  <div class="col-md-8">
    <input type="password" name="password" placeholder="半角英数字6～20文字で入力" class="form-control"  />
    @if ($errors->has('password'))
    <p class="help-block"><span>{{ $errors->first('password') }}</span></p>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label for="" class="control-label col-md-4">ニックネーム <span class="text-danger">※</span></label>
  <div class="col-md-8">
    <input type="text" name="name" placeholder="例：米子 太郎" value="{{ Request::old('name', $staff->name) }}" class="form-control" />
    @if ($errors->has('name'))
    <p class="help-block"><span>{{ $errors->first('name') }}</span></p>
    @endif
  </div>
</div>

<div class="form-group{{ ($errors->has('sex')) ? ' has-error' : '' }}">
  <label for="" class="control-label col-md-4">性別 <span class="text-danger">※</span></label>
  <div class="col-md-8">
    <select  name="sex" class="form-control">
      <option value="">選択してください</option>
      @foreach(App\Staff::getSexs() as $sex)
        <option value="{{ $sex }}"@if(Request::old('sex', $staff->sex) == $sex) selected="selected"@endif>{{ $sex }}</option>
      @endforeach
    </select>
    @if ($errors->has('sex'))
    <p class="help-block"><span>{{ $errors->first('sex') }}</span></p>
    @endif
  </div>
</div>

<div class="form-group{{ ($errors->has('prefecture')) ? ' has-error' : '' }}">
  <label for="" class="control-label col-md-4">都道府県 <span class="text-danger">※</span></label>
  <div class="col-md-8">
    <select  name="prefecture" class="form-control">
      <option value="">選択してください</option>
      @foreach(App\Staff::getPrefectures() as $prefecture)
        <option value="{{ $prefecture }}"@if(Request::old('prefecture', $staff->prefecture) == $prefecture) selected="selected"@endif>{{ $prefecture }}</option>
      @endforeach
    </select>
    @if ($errors->has('prefecture'))
    <p class="help-block"><span>{{ $errors->first('prefecture') }}</span></p>
    @endif
  </div>
</div>

{{-- <div class="form-group{{ ($errors->has('image')) ? ' has-error' : '' }}">
  <label for="" class="control-label col-md-4">画像</label>
  <div class="col-md-8">
    <input type="file" name="image" class="form-control">
    @if ($errors->has('image'))
    <p class="help-block"><span>{{ $errors->first('image') }}</span></p>
    @endif
  </div>
</div> --}}

<div class="form-group{{ ($errors->has('description')) ? ' has-error' : '' }}">
  <label for="" class="control-label col-md-4">プロフィール <span class="text-danger">※</span></label>
  <div class="col-md-8">
    <textarea name="description" placeholder="プロフィール" class="form-control" style="height:300px;">{{ Request::old('description', $staff->description) }}</textarea>
    <p class="">※得意分野、サービス提供可能な曜日・時間帯などを記載してください</p>
    @if ($errors->has('description'))
    <p class="help-block"><span>{{ $errors->first('description') }}</span></p>
    @endif
  </div>
</div>
