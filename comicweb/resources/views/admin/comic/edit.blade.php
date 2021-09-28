@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h2 align="center">Cập Nhật Truyện</h2>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('comic.update',[$comic->id])}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên truyện</label>
                            <input type="text" class="form-control" value="{{$comic->namecomic}}" id="slug" name="namecomic" onkeyup="ChangeToSlug();" placeholder="Tên truyện...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyện</label>
                            <input type="text" class="form-control" value="{{$comic->slug}}" id="convert_slug" name="slug" placeholder="Slug truyện...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                            <textarea name="summary"  rows="3" class="form-control">{{$comic->summary}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="img_comic">
                            <img src="{{asset('public/uploads/img_comic/'.$comic->img_comic)}}" alt="" width="100" height="100">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục</label>
                            <select class="form-control" name="category"  id="exampleFormControlSelect1">
                                <option>--- Chọn danh mục ---</option>
                                @foreach($category as $key =>$value)
                                    <option {{$value->id == $comic->category_id ? 'selected' : ''}} value="{{$value->id}}">{{$value->namecate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kích hoạt</label>
                            <select class="form-control" name="action" id="exampleFormControlSelect1">
                                @if($comic->action == 0)
                                    <option  selected value="0">Kích hoạt</option>
                                    <option  value="1">Ngừng kích hoạt</option>
                                @else
                                    <option  value="0">Kích hoạt</option>
                                    <option selected  value="1">Ngừng kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="addcomic" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
