@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h2 align="center">Thêm Truyện</h2>
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
                    <form method="post" action="{{route('comic.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên truyện</label>
                            <input type="text" class="form-control" value="{{old('namecomic')}}" id="slug" name="namecomic" onkeyup="ChangeToSlug();" placeholder="Tên truyện...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyện</label>
                            <input type="text" class="form-control" value="{{old('slug')}}" id="convert_slug" name="slug" placeholder="Slug truyện...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác giả</label>
                            <input type="text" class="form-control"  name="author" placeholder="Tên tác giả...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                            <textarea name="summary" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="img_comic">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục</label>
                            <select class="form-control" name="category"  id="exampleFormControlSelect1">
                                <option>--- Chọn danh mục ---</option>
                                @foreach($data as $key =>$value)
                                <option value="{{$value->id}}">{{$value->namecate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thể loại</label>
                            <select class="form-control" name="storytype"  id="exampleFormControlSelect1">
                                <option>--- Chọn Thể Loại ---</option>
                                @foreach($type as $key =>$value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kích hoạt</label>
                            <select class="form-control" name="action" id="exampleFormControlSelect1">
                                <option>--- Chọn ---</option>
                                <option value="0">Kích hoạt</option>
                                <option value="1">Ngừng kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="addcomic" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
