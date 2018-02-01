@extends('staff.layout.master')

<?php

    $layout = [
        'left' => true,
        'user' => true,
        'title' => '基本情報',
    ];

?>

@section('content')

<section>
  <div class="reset_box">
    <div class="rs_inner">
      <h2><span>基本情報設定</span></h2>

      {{ Form::model($user, ['route' => 'staff.user.update', 'method' => 'put']) }}
      <div class="rs_inner2">
        <dl class="rg_dl">
          <dt><span>必須</span>お名前</dt>
          <dd>
            @if ($errors->has('name'))
            <p class="err_message"><span>{{ $errors->first('name') }}</span></p>
            @endif
            <input type="text" name="name" placeholder="名前" value="{{ Request::old('name') ?: $user->name }}" class="{{ $errors->has('name') ? ' err' : '' }}" /></dd>
        </dl>

        <dl class="rg_dl">
          <dt><span>必須</span>エリア</dt>
          <dd>
            @if ($errors->has('area'))
            <p class="err_message"><span>{{ $errors->first('area') }}</span></p>
            @endif
            <?php $areaOld = Request::old('area') ?: $user->area;?>
            <select  name="area" class="{{ $errors->has('prefecture') ? ' err' : '' }}">
              <option value="">選択してください</option>
              @foreach(App\Staff::getAreas() as $area)
                <option value="{{ $area }}"@if($areaOld == $area) selected="selected"@endif>{{ $area }}</option>
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
            <textarea name="description" placeholder="プロフィール" class="{{ $errors->has('description') ? ' err' : '' }}">{{ Request::old('description') ?: $user->description }}</textarea></dd>
        </dl>


        <dl>
          <dt></dt>
          <dd><button type="submit" id="btn_reset"><span>変更する</span></button></dd>
        </dl>
      </div>
      {{ Form::close() }}

    </div>
  </div>
</section>

@endsection
