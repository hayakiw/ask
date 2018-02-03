<div class="form-group">
  <label for="">サービス名</label>
  <input type="text" name="title" class="form-control" id="" value="{{ Request::old('title') ? Request::old('title') : $item->title }}">
  @if ($errors->has('title'))
  <p class="err_message"><span>{{ $errors->first('title') }}</span></p>
  @endif
</div>
<div class="form-group">
  <label for="">カテゴリ</label>

  <select name="category" class="form-control{{ $errors->has('category') ? ' err' : '' }}">
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
    <p class="err_message"><span>{{ $errors->first('category') }}</span></p>
    @endif
</div>
<div class="form-group">
  <label for="">時給</label>
  <input type="text" name="price" class="form-control" id="" value="{{ Request::old('price') ? Request::old('price') : $item->price }}">
    @if ($errors->has('price'))
    <p class="err_message"><span>{{ $errors->first('price') }}</span></p>
    @endif
</div>
<div class="form-group">
  <label for="">最高時間</label>
  <input type="text" name="max_hours" class="form-control" id="" value="{{ Request::old('max_hours') ? Request::old('max_hours') : $item->max_hours }}">
    @if ($errors->has('max_hours'))
    <p class="err_message"><span>{{ $errors->first('max_hours') }}</span></p>
    @endif
</div>
<div class="form-group">
  <label for="">詳細な場所</label>
  <input type="text" name="location" class="form-control" id="" value="{{ Request::old('location') ? Request::old('location') : $item->location }}">
    @if ($errors->has('location'))
    <p class="err_message"><span>{{ $errors->first('location') }}</span></p>
    @endif
</div>
<div class="form-group">
  <label for="">詳細説明</label>
  <textarea name="description" class="form-control" rows="3" cols="80">{{ Request::old('description') ? Request::old('description') : $item->description }}</textarea>
    @if ($errors->has('description'))
    <p class="err_message"><span>{{ $errors->first('description') }}</span></p>
    @endif
</div>
<div class="form-group">
  <label for="">画像</label>
  <input type="file" name="image" class="form-control">
  @if ($errors->has('image'))
  <p class="err_message"><span>{{ $errors->first('image') }}</span></p>
  @endif
  <br/>
  <div class="col-md-3">
    <div class="thumbnail">
      <img src="{{ asset($item->getImagePath()) }}" alt="" class="img-thumbnail small">
    </div>
  </div>
</div>
