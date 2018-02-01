@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '口座設定',
    ];

?>

@section('content')
<div class="contentBody">
  <div >
    <div class="clearfix">
      <h2 class="mb-4 font-weight-bold float-left">口座設定</h2>
    </div>
    {!! Form::model($user, ['route' => ['staff.user.update_bank', $user->id] , 'method' => 'put']) !!}

      <div class="form-group row border border-left-0 border-right-0 border-top-0 pb-3">
        <label for="label" class="col-md-2 col-form-label pt-0">銀行名<br /></label>
        <div class="col-md-5">
            <input type="text" class="form-control  {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" name="bank_name" placeholder="" value="{{ Request::old('bank_name') ?: $user->bank_name }}" />
            @if ($errors->has('bank_name'))
              <div class="invalid-feedback"><span>{{ $errors->first('bank_name') }}</span></div>
            @endif
        </div>
      </div>
      <!-- / .form-group -->


      <div class="form-group row border border-left-0 border-right-0 border-top-0 pb-3">
        <label for="label" class="col-md-2 col-form-label pt-0">支店名<br /></label>
        <div class="col-md-5">
            <input type="text" class="form-control  {{ $errors->has('bank_branch_name') ? 'is-invalid' : '' }}" name="bank_branch_name" placeholder="" value="{{ Request::old('bank_branch_name') ?: $user->bank_branch_name }}" />
            @if ($errors->has('bank_branch_name'))
              <div class="invalid-feedback"><span>{{ $errors->first('bank_branch_name') }}</span></div>
            @endif
        </div>
      </div>
      <!-- / .form-group -->

      <div class="form-group row border border-left-0 border-right-0 border-top-0 pb-3">
        <label for="label" class="col-md-2 col-form-label pt-0">口座番号<br /></label>
        <div class="col-md-5">
            <input type="text" class="form-control  {{ $errors->has('bank_account_number') ? 'is-invalid' : '' }}" name="bank_account_number" placeholder="" value="{{ Request::old('bank_account_number') ?: $user->bank_account_number }}" />
            @if ($errors->has('bank_account_number'))
              <div class="invalid-feedback"><span>{{ $errors->first('bank_account_number') }}</span></div>
            @endif
        </div>
      </div>
      <!-- / .form-group -->


      <div class="form-group row border border-left-0 border-right-0 border-top-0 pb-3">
        <label for="label" class="col-md-2 col-form-label pt-0">口座名義 姓<br /></label>
        <div class="col-md-5">
            <input type="text" class="form-control  {{ $errors->has('bank_account_last_name') ? 'is-invalid' : '' }}" name="bank_account_last_name" placeholder="" value="{{ Request::old('bank_account_last_name') ?: $user->bank_account_last_name }}" />
            @if ($errors->has('bank_account_last_name'))
              <div class="invalid-feedback"><span>{{ $errors->first('bank_account_last_name') }}</span></div>
            @endif
        </div>
      </div>
      <!-- / .form-group -->


      <div class="form-group row border border-left-0 border-right-0 border-top-0 pb-3">
        <label for="label" class="col-md-2 col-form-label pt-0">口座名義 名<br /></label>
        <div class="col-md-5">
            <input type="text" class="form-control  {{ $errors->has('bank_account_first_name') ? 'is-invalid' : '' }}" name="bank_account_first_name" placeholder="" value="{{ Request::old('bank_account_first_name') ?: $user->bank_account_first_name }}" />
            @if ($errors->has('bank_account_first_name'))
              <div class="invalid-feedback"><span>{{ $errors->first('bank_account_first_name') }}</span></div>
            @endif
        </div>
      </div>
      <!-- / .form-group -->


      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary mb-2 w-30 resp-w-100">変更する</button>
        <a href="{{ route('staff.user.show') }}" class="btn btn-secondary mb-2 w-30 resp-w-100">戻る</a>
      </div>
      <!-- / .form-group -->

    {!! Form::close() !!}  
  </div>
</div>
@endsection
