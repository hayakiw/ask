@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '新規会員登録',
    ];

?>

@section('content')

<div class="container">
  <div class="page-header">
    <h1>新規会員登録</h1>
    <p class="lead">下記の項目を入力して「登録する」を押してください。</p>
  </div>

  {!! Form::open(['route' => 'staff.user.store', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
    <h3>プロフィール</h3>
    <p class="help-block">登録後にも編集できます。</p>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
          <label for="email" class="control-label col-md-4">メールアドレス<span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="mail" name="email" placeholder="例：xxx@example.com" value="{{ Request::old('email') }}" class="form-control"  />
            <p class="">※半角英数字で入力してください</p>
            @if ($errors->has('email'))
            <p class="help-block"><span>{{ $errors->first('email') }}</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('password')) ? ' has-error' : '' }}">
          <label for="password" class="control-label col-md-4">パスワード <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="password" name="password" placeholder="半角英数字6～20文字で入力" class="form-control"  />
            @if ($errors->has('password'))
            <p class="help-block"><span>{{ $errors->first('password') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">お名前　姓 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="text" name="last_name" placeholder="例：米子" value="{{ Request::old('last_name') }}" class="form-control" />
            @if ($errors->has('last_name'))
            <p class="help-block"><span>{{ $errors->first('last_name') }}</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('first_name')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">名 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="text" name="first_name" placeholder="例：太郎" value="{{ Request::old('first_name') }}" class="form-control" />
            @if ($errors->has('first_name'))
            <p class="help-block"><span>{{ $errors->first('first_name') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('birth_at') ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">生年月日 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="date" name="birth_at" placeholder="例:1940-11-11" value="{{ Request::old('birth_at') }}" class="form-control" />
            @if ($errors->has('birth_at'))
            <p class="help-block"><span>{{ $errors->first('birth_at') }}</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('sex')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">性別 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <select  name="sex" class="form-control">
              <option value="">選択してください</option>
              @foreach(App\Staff::getSexs() as $sex)
                <option value="{{ $sex }}"@if(Request::old('sex') == $sex) selected="selected"@endif>{{ $sex }}</option>
              @endforeach
            </select>
            @if ($errors->has('sex'))
            <p class="help-block"><span>{{ $errors->first('sex') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('prefecture')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">都道府県 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <select  name="area" class="form-control">
              <option value="">選択してください</option>
              @foreach(App\Staff::getPrefectures() as $prefecture)
                <option value="{{ $prefecture }}"@if(Request::old('prefecture') == $prefecture) selected="selected"@endif>{{ $prefecture }}</option>
              @endforeach
            </select>
            @if ($errors->has('prefecture'))
            <p class="help-block"><span>{{ $errors->first('prefecture') }}</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('area')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">エリア <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <select  name="area" class="form-control">
              <option value="">選択してください</option>
              @foreach(App\Staff::getAreas() as $area)
                <option value="{{ $area }}"@if(Request::old('area') == $area) selected="selected"@endif>{{ $area }}</option>
              @endforeach
            </select>
            @if ($errors->has('area'))
            <p class="help-block"><span>{{ $errors->first('area') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('tel')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">電話番号 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="text" name="tel" placeholder="例：08012345678" value="{{ Request::old('tel') }}" class="form-control" />
            <p class="">※半角数字で入力してください</p>
            @if ($errors->has('tel'))
            <p class="help-block"><span>{{ $errors->first('tel') }}</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('image')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">画像</label>
          <div class="col-md-8">
            <input type="file" name="image" class="form-control">
            @if ($errors->has('image'))
            <p class="help-block"><span>{{ $errors->first('image') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('description')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">プロフィール <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <textarea name="description" placeholder="プロフィール" class="form-control">{{ Request::old('description') }}</textarea>
            @if ($errors->has('description'))
            <p class="help-block"><span>{{ $errors->first('description') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <h3>サービス</h3>
    <p class="help-block">登録後にも編集・削除できます。</p>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('service.name')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">タイトル <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input name="service[name]" placeholder="例：英語を教えます" class="form-control" value="{{ Request::old('service.name') }}" />
            @if ($errors->has('service.name'))
            <p class="help-block"><span>{{ $errors->first('service.name') }}</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('service.category')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">カテゴリ <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <select name="service[category]" class="form-control">
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
            </select>
            @if ($errors->has('service.category'))
            <p class="help-block"><span>{{ $errors->first('service.category') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('service.price')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">時給 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input name="service[price]" placeholder="例：2000" class="form-control" value="{{ Request::old('service.price') }}" />
            <p class="">※ご希望の時給を半角数字で入力してください</p>
            @if ($errors->has('service.price'))
            <p class="help-block"><span>{{ $errors->first('service.price') }}</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('service.max_hours')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">最高時間 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input name="service[max_hours]" placeholder="例：6" class="form-control" value="{{ Request::old('service.max_hours') }}" />
            <p class="">※1回で働ける最高時間を半角数字で入力してください</p>
            @if ($errors->has('service.max_hours'))
            <p class="help-block"><span>{{ $errors->first('service.max_hours') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('service.location')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">対応可能エリア <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input name="service[location]" placeholder="例：○○県○○市周辺" class="form-control" value="{{ Request::old('service.location') }}" />
            @if ($errors->has('service.location'))
            <p class="help-block"><span>{{ $errors->first('service.location') }}</span></p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('service.description')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">詳細説明 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <textarea name="service[description]" placeholder="詳細説明" class="form-control">{{ Request::old('service.description') }}</textarea>
            <p class="">※できること、できないこと等、詳細に入力してください</p>
            @if ($errors->has('service.description'))
            <p class="help-block"><span>{{ $errors->first('service.description') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <p class="help-block">次に進むことで、<a href="{{ route('static.agreement') }}" target="_blank">利用規約</a>に同意し、ご了承いただいたものとします。</p>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <button type="submit" name="submit" id="btn_regist" class="btn btn-success btn-block"><span>登録する</span></button>
      </div>
    </div>
  {!! Form::close() !!}

</div>
@endsection
