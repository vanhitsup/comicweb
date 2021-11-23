@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <h2 align="center">Thêm Thể loại Truyện</h2>
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
                    <form method="post" action="{{route('storytype.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thể loại</label>
                            <input type="text" class="form-control" value="{{old('name')}}" id="slug" name="name" onkeyup="ChangeToSlug();" placeholder="Tên thể loại...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug thể loại</label>
                            <input type="text" class="form-control" value="{{old('slug')}}" id="convert_slug" name="slug" placeholder="Slug thể loại...">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả thể loại</label>
                            <input type="text" class="form-control" value="{{old('description')}}" name="description" placeholder="Tóm tắt thể loại...">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kích hoạt</label>
                            <select class="form-control" name="action" id="exampleFormControlSelect1">
                                <option>--- Chọn ---</option>
                                <option value="0">Kích hoạt</option>
                                <option value="1">Ngừng kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="addstorytype" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
