@extends('staff.layout.master')

<?php

    $layout = [
        'left' => true,
        'user' => true,
        'title' => '基本情報',
    ];

?>

@section('content')

<div class="container">
  <div class="page-header">
    <h1>基本情報設定</h1>
  </div>

  {{ Form::model($user, ['route' => 'staff.user.update', 'method' => 'put', 'files' => true, 'class' => 'form-horizontal']) }}

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('last_name')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">お名前　姓 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="text" name="last_name" placeholder="例：米子" value="{{ Request::old('last_name') ?: $user->last_name }}" class="form-control" />
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
            <input type="text" name="first_name" placeholder="例：太郎" value="{{ Request::old('first_name') ?: $user->first_name }}" class="form-control" />
            @if ($errors->has('first_name'))
            <p class="help-block"><span>{{ $errors->first('first_name') }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ ($errors->has('birth_at')) ? ' has-error' : '' }}">
          <label for="" class="control-label col-md-4">生年月日 <span class="text-danger">※</span></label>
          <div class="col-md-8">
            <input type="date" name="birth_at" placeholder="例:1940-11-11" value="{{ Request::old('birth_at') ?: $user->birth_at }}" class="form-control" />
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
            <?php $sexOld = Request::old('sex') ?: $user->sex;?>
            <select  name="sex" class="form-control">
              <option value="">選択してください</option>
              @foreach(App\User::getSexs() as $sex)
                <option value="{{ $sex }}"@if($sexOld == $sex) selected="selected"@endif>{{ $sex }}</option>
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
            <?php $prefectureOld = Request::old('prefecture') ?: $user->prefecture;?>
            <select  name="prefecture" class="form-control">
              <option value="">選択してください</option>
              @foreach(App\Staff::getPrefectures() as $prefecture)
                <option value="{{ $prefecture }}"@if($prefectureOld == $prefecture) selected="selected"@endif>{{ $prefecture }}</option>
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
            <?php $areaOld = Request::old('area') ?: $user->area;?>
            <select  name="area" class="form-control">
              <option value="">選択してください</option>
              @foreach(App\Staff::getAreas() as $area)
                <option value="{{ $area }}"@if($areaOld == $area) selected="selected"@endif>{{ $area }}</option>
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
            <input type="text" name="tel" placeholder="例：08012345678" value="{{ Request::old('tel') ?: $user->tel }}" class="form-control" />
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
            @if ($user->image)
            <div class="col-md-8">
              <div class="thumbnail">
                <img src="{{ asset($user->imageUrl()) }}" alt="" class="img-thumbnail small">
              </div>
            </div>
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
            <textarea name="description" placeholder="プロフィール" class="form-control">{{ Request::old('description') ?: $user->description }}</textarea>
            @if ($errors->has('description'))
            <p class="help-block"><span>{{ $errors->first('description') }}</span></p>
            @endif
            </div>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <button type="submit" id="btn_reset" class="btn btn-success btn-block">変更する</button>
        <a href="{{ route('staff.user.show') }}" class="btn btn-secondary">戻る</a>
      </div>
    </div>
  </div>
  {{ Form::close() }}

</div>

@endsection
