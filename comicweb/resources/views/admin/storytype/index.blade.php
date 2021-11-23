<?php
$i=0;
$i++;
?>
@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-body">

                    <h2 align="center">Danh sách thể loại</h2>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Thể Loại</th>
                        <th scope="col">Slug Thể Loại</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Kích Hoạt</th>
                        <th scope="col">Hành Động
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key =>$value)
                        <tr>
                            <th><?php echo $i++;?></th>
                            <td>{{$value->name}}</td>
                            <td>{{$value->slug}}</td>
                            <td>{{$value->description}}</td>
                            <td>
                                @if($value->action==0)
                                    <span class="text-success">Kích hoạt</span>
                                @else
                                    <span class="text-danger">Ngừng Kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('category.destroy',[$value->id])}}" method="post" style="float: left; margin-right: 5px">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có chắc muốn xóa ?')" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('category.edit',[$value->id])}}" class="btn btn-primary">Edit</a>
                            </td>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
