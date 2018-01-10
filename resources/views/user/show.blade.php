@extends((auth()->user()->isSeller()) ? 'seller.layout.master' : 'layout.master')

<?php

    $layout = [
        'left' => true,
        'user' => true,
        'title' => 'ユーザー情報',
    ];

?>

@section('content')
<section id="column_l">
  <div class="profile_box">


    <div class="pr_table">
      <h2 class="data">メールアドレス</h2>
      {{ $user->email ?: '&nbsp;' }}
    </div>

    <div id="report">
      <ul><li><a href="#" id="btn_edit"><span>メールアドレスを変更する</span></a></li></ul>
    </div>

    <div class="pr_table">
      <h2 class="data">パスワード</h2>
      ********
    </div>

    <div id="report">
      <ul><li><a href="{{ route('user.edit_password') }}" id="btn_edit"><span>パスワードを変更する</span></a></li></ul>
    </div>

    <div class="pr_table">
      <h2 class="data">基本情報</h2>
      <table class="data">
        <tr>
          <th>姓</th>
          <td>{{ $user->last_name ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>名</th>
          <td>{{ $user->first_name ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>郵便番号</th>
          <td>{{ $user->zip ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>都道府県名</th>
          <td>{{ $user->prefecture ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>市区町村、番地</th>
          <td>{{ $user->address1 ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>ビル・マンション名</th>
          <td>{{ $user->address2 ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>{{ $user->tel ?: '&nbsp;' }}</td>
        </tr>
      </table>
    </div>

    <div id="report">
      <ul><li><a href="{{ route('user.edit') }}" id="btn_edit"><span>基本情報を編集する</span></a></li></ul>
    </div>

    <div class="pr_table">
      <h2 class="data">銀行情報</h2>
      <table class="data">
        <tr>
          <th>銀行名</th>
          <td>{{ $user->bank_name ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>支店名</th>
          <td>{{ $user->bank_branch_name ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>口座番号</th>
          <td>{{ $user->bank_account_number ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>口座名義姓</th>
          <td>{{ $user->bank_account_last_name ?: '&nbsp;' }}</td>
        </tr>
        <tr>
          <th>口座名義名</th>
          <td>{{ $user->bank_account_first_name ?: '&nbsp;' }}</td>
        </tr>
      </table>
    </div>

    <div id="report">
      <ul><li><a href="{{ route('user.edit_bank') }}" id="btn_edit"><span>銀行情報を編集する</span></a></li></ul>
    </div>



  </div>
</section>
@endsection

@section('after_article')
@if (auth('web')->check())
@if ($user->id != auth('web')->id())
<div id="modal_bg"></div>
<div id="report_user" class="modal_box">
</div>
@endif
@endif
@endsection
