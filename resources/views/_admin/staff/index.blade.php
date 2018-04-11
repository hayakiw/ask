@extends('_admin.layout.master')
@section('title','スタッフ')

@section('content')


<div class="section">
  <form>
    <div class="row">

      <div class="col-md-3">
        <div class="form-group form-group-sm">
          <div class="input-group">
            <span class="input-group-addon">id</span>
            <input type="text" name="id" id="id" value="{{ $search['id'] ?? '' }}" class="form-control" placeholder="ID">
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group form-group-sm">
          <div class="input-group">
            <span class="input-group-addon">メールアドレス</span>
            <input type="text" name="email" id="email" value="{{ $search['email'] ?? '' }}" class="form-control" placeholder="メールアドレス">
          </div>
        </div>
      </div>


      <div class="col-md-2">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i>検索</button>
        <a href="{{ route('staffs.index') }}" class="btn btn-secondary">クリア</a>
      </div>
      <div class="col-md-3 text-right">
        <a href="{{ route('staffs.create') }}?{{ http_build_query($_GET) }}" class="btn btn-secondary">新規作成</a>
      </div>
    </div>
  </form>
</div>

<table class="table table-striped table-condensed">
  <tr>
      <th>ID</th>
      <th>メールアドレス</th>
      <th>口コミ</th>
      <th>フォロー/フォロワー</th>
      <th>退会</th>
      <th>編集</th>
      <th>削除</th>
  </tr>
  @foreach($staffs as $staff)
      <tr>
          <td>{{ $staff->id }}</td>
          <td>{{ $staff->email }}</td>

          <td><a href="" class="btn btn-info btn-sm" target="_blank">{{ $staff->reviews->count() }}</a></td>
          <td>
            {{-- <a href="" class="btn btn-info btn-sm" target="_blank">{{ $staff->followings->count() }}</a> /
            <a href="" class="btn btn-info btn-sm" target="_blank">{{ $staff->followers->count() }}</a> --}}
          </td>

          @if ($staff->canceled_at)
            <td>{{ $staff->canceled_at }}</td>
          @else
            <td>
              {{ Form::model($staff, ['route' => ['staffs.cancel', 'user' => $staff->id] , 'method' => 'post', 'data-confirm' => '本当に退会しますか？']) }}
                  <input type="submit" value="退会" class="btn btn-warning btn-sm">
              {{ Form::close() }}
            </td>
          @endif

          <td><a href="{{ route('staffs.edit', ['user' => $staff->id ]) }}?{{ http_build_query($_GET) }}" class="btn btn-success btn-sm">編集</a></td>
          <td>
              {{ Form::model($staff, ['route' => ['staffs.destroy', 'user' => $staff->id] , 'method' => 'delete', 'data-confirm' => '本当に削除しますか？']) }}
                  <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
              {{ Form::close() }}
          </td>
      </tr>
  @endforeach
</table>
<div class="text-center">
    {!! $staffs->appends($search)->links() !!}
</div>

@endsection
