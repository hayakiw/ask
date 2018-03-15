@extends('layout/master')

<?php
$layout = [
    'title' => 'ページへ接続できませんでした',
];
?>

@section('content')
<div class="container">
  <div class="page-header">
    <h1>ページへ接続できませんでした</h1>
  </div>
指定されたページへ接続できませんでした。<br>
URLを直接入力した場合，入力ミスがないかご確認ください。
</div>
@endsection
