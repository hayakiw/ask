
<div class="row">
  <div class="col-md-6">
    <div class="form-group{{ ($errors->has('title')) ? ' has-error' : '' }}">
      <label for="" class="col-md-4 control-label">サービス名</label>
      <div class="col-md-8">
        <input type="text" name="title" placeholder="例：英語を教えます" class="form-control" id="" value="{{ Request::old('title') ? Request::old('title') : $item->title }}">
        @if ($errors->has('title'))
        <p class="help-block"><span>{{ $errors->first('title') }}</span></p>
        @endif
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group{{ ($errors->has('category')) ? ' has-error' : '' }}">
      <label for="" class="col-md-4 control-label">カテゴリ</label>
      <div class="col-md-8">
        <select name="category" class="form-control">
          <option value="">選択してください</option>
          @foreach ($categories as $category)
            @if ($category->children)
              <optgroup label="{{ $category->name }}">
                @foreach ($category->children as $child)
                  <option value="{{ $child->id }}"@if (Request::old('category', $item->category_id) == $child->id) selected="selected"@endif>{{ $child->name }}</option>
                @endforeach
              </optgroup>
            @else
              <option value="{{ $category->id }}"@if (Request::old('category') == $category->id) selected="selected"@endif>{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
          @if ($errors->has('category'))
          <p class="help-block"><span>{{ $errors->first('category') }}</span></p>
          @endif
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group{{ ($errors->has('price')) ? ' has-error' : '' }}">
      <label for="" class="col-md-4 control-label">時給</label>
      <div class="col-md-8">
        <input type="number" name="price" placeholder="例：2000" class="form-control" id="" value="{{ Request::old('price') ? Request::old('price') : $item->price }}">
        <p class="">※ご希望の時給を半角数字で入力してください</p>
          @if ($errors->has('price'))
          <p class="help-block"><span>{{ $errors->first('price') }}</span></p>
          @endif
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group{{ ($errors->has('max_hours')) ? ' has-error' : '' }}">
      <label for="" class="col-md-4 control-label">最長時間</label>
      <div class="col-md-8">
        <input type="number" name="max_hours" placeholder="例：6" class="form-control" id="" value="{{ Request::old('max_hours') ? Request::old('max_hours') : $item->max_hours }}">
        <p class="">※1回で働ける最長時間を半角数字で入力してください</p>
        @if ($errors->has('max_hours'))
        <p class="help-block"><span>{{ $errors->first('max_hours') }}</span></p>
        @endif
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group{{ ($errors->has('location')) ? ' has-error' : '' }}">
      <label for="" class="col-md-4 control-label">対応可能エリア</label>
      <div class="col-md-8">
        <input type="text" name="location" placeholder="例：○○県○○市周辺" class="form-control" id="" value="{{ Request::old('location') ? Request::old('location') : $item->location }}">
          @if ($errors->has('location'))
          <p class="help-block"><span>{{ $errors->first('location') }}</span></p>
          @endif
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group{{ ($errors->has('description')) ? ' has-error' : '' }}">
      <label for="" class="col-md-4 control-label">詳細説明</label>
      <div class="col-md-8">
        <textarea name="description" class="form-control" style="height:300px;" cols="80">{{ Request::old('description') ? Request::old('description') : $item->description }}</textarea>
        <p class="">※できること、できないことや、提供可能曜日・時間帯を詳細に入力してください</p>
          @if ($errors->has('description'))
          <p class="help-block"><span>{{ $errors->first('description') }}</span></p>
          @endif
      </div>
    </div>
  </div>
</div>
