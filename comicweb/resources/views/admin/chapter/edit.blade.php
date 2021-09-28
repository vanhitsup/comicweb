@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h2 align="center">Thêm Chapter</h2>
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
                    <form method="post" action="{{route('chapter.update',[$chapter->id])}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->title}}" id="slug" name="title" onkeyup="ChangeToSlug();" placeholder="Tên chapter...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->slug_chapter}}" id="convert_slug" name="slug_chapter" placeholder="Slug chapter...">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->summary}}" name="summary" placeholder="Tóm tắt chapter...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung chapter</label>
                            <textarea name="content" rows="3" class="form-control">{{$chapter->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Thuộc bộ truyện</label>
                            <select class="form-control" name="comic_id"  id="exampleFormControlSelect1">
                                @foreach($comic as $key =>$value)
                                    <option {{$value->id == $chapter->comic_id ? 'selected' : '' }} value="{{$value->id}}">{{$value->namecomic}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kích hoạt</label>
                            <select class="form-control" name="action" id="exampleFormControlSelect1">
                                @if($chapter->action==0)
                                <option value="0" selected>Kích hoạt</option>
                                <option value="1">Ngừng kích hoạt</option>
                                @else
                                    <option value="0" selected>Kích hoạt</option>
                                    <option value="1" selected>Ngừng kích hoạt</option>
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
