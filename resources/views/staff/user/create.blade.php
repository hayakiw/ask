@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '新規会員登録',
    ];

?>

@section('content')
<?php var_dump($errors);?>
<section>
  <div class="regist_box">
    <div class="rg_inner">
      <h2><span>新規会員登録</span></h2>
      <p class="lead">下記の項目を入力して「登録する」を押してください。</p>

      {!! Form::open(['route' => 'staff.user.store', 'method' => 'post', 'files' => true]) !!}
        <dl class="rg_dl">
          <dt><span>必須</span>メールアドレス（※非公開）</dt>
          <dd>
            @if ($errors->has('email'))
            <p class="err_message"><span>{{ $errors->first('email') }}</span></p>
            @endif
            <input type="mail" name="email" placeholder="半角英数字で入力" value="{{ Request::old('email') }}"@if ($errors->has('email')) class="err"@endif  /></dd>
        </dl>
        <dl class="rg_dl">
          <dt><span>必須</span>パスワード</dt>
          <dd>
            @if ($errors->has('password'))
            <p class="err_message"><span>{{ $errors->first('password') }}</span></p>
            @endif
            <input type="password" name="password" placeholder="半角英数字6～20文字で入力"@if ($errors->has('password')) class="err"@endif  /></dd>
        </dl>
        <dl class="rg_dl">
          <dt><span>必須</span>姓</dt>
          <dd>
            @if ($errors->has('last_name'))
            <p class="err_message"><span>{{ $errors->first('last_name') }}</span></p>
            @endif
            <input type="text" name="last_name" placeholder="姓" value="{{ Request::old('last_name') }}" class="{{ $errors->has('last_name') ? ' err' : '' }}" /></dd>
        </dl>
        <dl class="rg_dl">
          <dt><span>必須</span>名</dt>
          <dd>
            @if ($errors->has('first_name'))
            <p class="err_message"><span>{{ $errors->first('first_name') }}</span></p>
            @endif
            <input type="text" name="first_name" placeholder="名" value="{{ Request::old('first_name') }}" class="{{ $errors->has('first_name') ? ' err' : '' }}" /></dd>
        </dl>
        <dl class="rg_dl">
          <dt><span>必須</span>画像</dt>
          <dd>
            @if ($errors->has('image'))
            <p class="err_message"><span>{{ $errors->first('image') }}</span></p>
            @endif
            <input type="file" name="image" class="form-control"></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>都道府県</dt>
          <dd>
            鳥取県
          </dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>エリア</dt>
          <dd>
            @if ($errors->has('area'))
            <p class="err_message"><span>{{ $errors->first('area') }}</span></p>
            @endif
            <select  name="area" class="{{ $errors->has('prefecture') ? ' err' : '' }}">
              <option value="">選択してください</option>
              @foreach(App\Staff::getAreas() as $area)
                <option value="{{ $area }}"@if(Request::old('area') == $area) selected="selected"@endif>{{ $area }}</option>
              @endforeach
            </select>
          </dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>プロフィール</dt>
          <dd>
            @if ($errors->has('description'))
            <p class="err_message"><span>{{ $errors->first('description') }}</span></p>
            @endif
            <textarea name="description" placeholder="プロフィール" class="{{ $errors->has('description') ? ' err' : '' }}">{{ Request::old('description') }}</textarea></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>サービス名</dt>
          <dd>
            @if ($errors->has('service.name'))
            <p class="err_message"><span>{{ $errors->first('service.name') }}</span></p>
            @endif
            <input name="service[name]" placeholder="サービス名" class="{{ $errors->has('service.name') ? ' err' : '' }}" value="{{ Request::old('service.name') }}" /></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>カテゴリ</dt>
          <dd>
            @if ($errors->has('service.category'))
            <p class="err_message"><span>{{ $errors->first('service.category') }}</span></p>
            @endif
            <select name="service[category]" class="{{ $errors->has('service.category') ? ' err' : '' }}">
              <option value="">選択してください</option>
              @foreach ($categories as $category)
                @if ($category->children)
                  <optgroup label="{{ $category->name }}">
                    @foreach ($category->children as $child)
                      <option value="{{ $child->id }}"@if (Request::old('service.category') == $child->id) selected="selected"@endif>{{ $child->name }}</option>
                    @endforeach
                  </optgroup>
                @else
                  <option value="{{ $category->id }}"@if (Request::old('service.category') == $category->id) selected="selected"@endif>{{ $category->name }}</option>
                @endif
              @endforeach
            </select></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>時給</dt>
          <dd>
            @if ($errors->has('service.price'))
            <p class="err_message"><span>{{ $errors->first('service.price') }}</span></p>
            @endif
            <input name="service[price]" placeholder="時給" class="{{ $errors->has('service.price') ? ' err' : '' }}" value="{{ Request::old('service.price') }}" /></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>最高時間</dt>
          <dd>
            @if ($errors->has('service.max_hours'))
            <p class="err_message"><span>{{ $errors->first('service.max_hours') }}</span></p>
            @endif
            <input name="service[max_hours]" placeholder="最高時間" class="{{ $errors->has('service.max_hours') ? ' err' : '' }}" value="{{ Request::old('service.max_hours') }}" /></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>詳細な場所</dt>
          <dd>
            @if ($errors->has('service.location'))
            <p class="err_message"><span>{{ $errors->first('service.location') }}</span></p>
            @endif
            <input name="service[location]" placeholder="住所" class="{{ $errors->has('service.location') ? ' err' : '' }}" value="{{ Request::old('service.location') }}" /></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>詳細説明</dt>
          <dd>
            @if ($errors->has('service.description'))
            <p class="err_message"><span>{{ $errors->first('service.description') }}</span></p>
            @endif
            <textarea name="service[description]" placeholder="詳細説明" class="{{ $errors->has('service.description') ? ' err' : '' }}">{{ Request::old('service.description') }}</textarea></dd>
        </dl>
        <button type="submit" name="submit" id="btn_regist"><span>登録する</span></button>
      {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
