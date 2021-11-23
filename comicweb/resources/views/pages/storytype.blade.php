<?php

$cout=count($comic);
?>
@extends('layout')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$name_type}}</li>
            </ol>
        </nav>

        <h3>{{$name_type}}</h3>
        @if($cout==0)
            <div class="row">
                <h2 style="height: 400px;margin-left: 470px">Truyện đang được cập nhật...</h2>
            </div>
        @else
            <div class="row">
                @foreach($comic as $key =>$value)
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" src="{{asset('public/public/uploads/img_comic/'.$value->img_comic)}}"  style="object-fit:cover;height: 225px; width: 100%; display: block;border-style: outset"  data-holder-rendered="true">
                            <div class="card-body">
                                <a href="" style="text-decoration: none;"> <h3 style="font-weight: bold;font-size: 14px;height: 40px">{{$value->namecomic}}</h3></a>
                                <p class="card-text" style="font-size: 14px;">{{$value->summary}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <small class="text-muted"><i class="far fa-eye"></i> 1254</small>
                                    </div>
                                    <a href="{{url('view-comic/'.$value->slug)}}" class="btn btn-danger" style="font-size: 12px">Đọc Truyện</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
