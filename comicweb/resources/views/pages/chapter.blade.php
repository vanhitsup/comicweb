<style type="text/css">
    .isDisable{
    color: currentColor;
        pointer-events: none;
        opacity: 0.5;
        text-decoration: none;
    }
</style>
@extends('layout')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="{{url('view-category/'.$comic_br->catecomic->slug)}}">{{$comic_br->catecomic->namecate}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$comic_br->namecomic}}</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12">
                <h2>Tên truyện: {{$chapter->comic->namecomic}}</h2>
            </div>
            <div class="col-md-12">
                Chương/Tập hiện tại: {{$chapter->title}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">

                <div  class="form-group">
                    <label for="exampleInputEmail1">Chọn chương</label>
                    <p>  <a href="{{url('view-chapter/'.$previous_chapter)}}" class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisable': ''}}" style="font-size: 12px"><i class="fas fa-long-arrow-alt-left"></i> Tập trước</a>
                        <a href="{{url('view-chapter/'.$next_chapter)}}" class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisable': ''}}" style="font-size: 12px">  Tập sau  <i class="fas fa-long-arrow-alt-right"></i></a></p>
                    <select name="kichhoat" class="custom-select select-chapter " style="font-size: 13px;font-weight: bold;margin-top: 5px">
                             @foreach($all_chapter as $key =>$val)
                            <option value="{{url('view-chapter/'.$val->slug_chapter)}}" >{{$val->title}}</option>
                            @endforeach
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
               {!! $chapter->content !!}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5">

                <div  class="form-group">
                    <label for="exampleInputEmail1">Chọn chương</label>
                    <select name="kichhoat" class="custom-select select-chapter " style="font-size: 13px;font-weight: bold">
                        @foreach($all_chapter as $key =>$val)
                            <option value="{{url('view-chapter/'.$val->slug_chapter)}}" >{{$val->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>
@endsection
