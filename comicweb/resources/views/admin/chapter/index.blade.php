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

                    <h2 align="center">Danh sách Chapter Truyện</h2>
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
                        <th scope="col">Tên Chapter</th>
                        <th scope="col">Slug Chapter</th>
                        <th scope="col">Tóm Tắt</th>
                        <th scope="col">Thuộc Bộ Truyện</th>
                        <th scope="col">Kích Hoạt</th>
                        <th scope="col" width="15%">Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key =>$value)
                        <tr>
                            <th><?php echo $i++;?></th>
                            <td>{{$value->title}}</td>
                            <td>{{$value->slug_chapter}}</td>
                            <td>{{$value->summary}}</td>
                            <td>{{$value->comic->namecomic}}</td>
                            <td>
                                @if($value->action==1)
                                    <span class="text-danger">Ngừng kích hoạt</span>
                                @else
                                    <span class="text-success">Kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('chapter.destroy',[$value->id])}}" method="post" style="float: left; margin-right: 5px">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có chắc muốn xóa ?')" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('chapter.edit',[$value->id])}}" class="btn btn-primary">Edit</a>
                            </td>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
