@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h2 align="center">Cập nhật danh mục truyện</h2>
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
                    <form method="post" action="{{route('category.update',[$data->id])}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" value="{{$data->namecate}}" name="namecate" placeholder="Tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <input type="text" class="form-control" value="{{$data->des}}" name="des" placeholder="Mô tả danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kích hoạt</label>
                            <select class="form-control" name="action" id="exampleFormControlSelect1">
                                @if($data->action == 0)
                                    <option  value="1">Kích hoạt</option>
                                    <option selected value="0">Ngừng kích hoạt</option>
                                @else
                                    <option selected value="1">Kích hoạt</option>
                                    <option  value="0">Ngừng kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="addcate" class="btn btn-primary">Update</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
