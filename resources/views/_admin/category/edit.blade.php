@extends('_admin.layout.master')
@section('title','カテゴリ 編集')

@section('content')

<ol class="breadcrumb">
    <li><a href="{{ route('categories.index') }}">トップ</a></li>
@foreach($catetoryList as $categoryRow)
    <li><a href="{{ route('categories.index', ['parent' => $categoryRow->id] ) }}">{{ $categoryRow->name }}</a></li>
@endforeach
</ol>

<div class="col-md-8">
{{ Form::model($category, ['route' => ['categories.update', 'category' => $category->id] , 'method' => 'put']) }}
　　@include('_admin.category._form', ['category' => $category])
    <input type="hidden" name="parent_id" value="{{ $category->parent_id }}">

    <div style="margin:20px 0;">
      <a href="{{ route('categories.index', ['parent' => $category->parent_id]) }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-primary">更新する</button>
    </div>

{{ Form::close() }}
</div>
@endsection
