@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

             <h2 align="center">Thêm danh mục truyện</h2>
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
                            <form method="post" action="{{route('category.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" value="{{old('namecate')}}" id="slug" name="namecate" onkeyup="ChangeToSlug();" placeholder="Tên danh mục...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug danh mục</label>
                                    <input type="text" class="form-control" value="{{old('slug')}}" id="convert_slug" name="slug" placeholder="Slug danh mục...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="text" class="form-control" value="{{old('des')}}" name="des" placeholder="Mô tả danh mục...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Kích hoạt</label>
                                    <select class="form-control" name="action" id="exampleFormControlSelect1">
                                        <option>--- Chọn ---</option>
                                        <option value="0">Kích hoạt</option>
                                        <option value="1">Ngừng kích hoạt</option>
                                    </select>
                                </div>
                                <button type="submit" name="addcate" class="btn btn-primary">Submit</button>
                            </form>
                    </div>

            </div>

        </div>
    </div>
@endsection
