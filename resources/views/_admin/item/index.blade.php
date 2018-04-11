@extends('_admin.layout.master')
@section('title', 'サービス管理')

@section('content')

<div class="section">
  <form>
    <div class="row">

      <div class="col-md-4">
        <div class="form-group form-group-sm">
          <div class="input-group">
            <span class="input-group-addon">カテゴリ</span>
            <select class="form-control" name="category" id="category">
              <option value="">選択してください</option>
              @foreach (App\Category::topCategories() as $category)
                @if ($category->children)
                  <optgroup label="{{ $category->name }}">
                    @foreach ($category->children as $child)
                      <option value="{{ $child->id }}"@if (Request::old('category', array_get($search, 'category')) == $child->id) selected="selected"@endif>{{ $child->name }}</option>
                    @endforeach
                  </optgroup>
                @else
                  <option value="{{ $category->id }}"@if (Request::old('category', array_get($search, 'category')) == $category->id) selected="selected"@endif>{{ $category->name }}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-2">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i>検索</button>
        <a href="{{ route('_admin.items.index') }}" class="btn btn-secondary">クリア</a>
      </div>
      <div class="col-md-3 text-right">
        <a href="{{ route('_admin.items.create') }}?{{ http_build_query($_GET) }}" class="btn btn-secondary">新規作成</a>
      </div>
    </div>
  </form>
</div>

@if($items->count())
<table class="table">
  <thead>
    <tr>
      <th>スタッフ</th>
      <th>サービス名</th>
      <th>場所の詳細</th>
      <th>時給</th>
      <th>購入可能最大時間</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($items as $key => $item)
    <tr>
      <td>{{ $item->staff->name }}</td>
      <td><a href="{{ route('_admin.items.show', $item->id) }}">{{ $item->title }}</a></td>
      <td>{{ $item->location }}</td>
      <td>{{ $item->price }}</td>
      <td>{{ $item->max_hours }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<p>新規登録より、サービスを登録してください</p>
@endif

@endsection
