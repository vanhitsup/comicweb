<?php
$cout=count($chapter);
    ?>
@extends('layout')

@section('content')

  <div class="container">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="{{url('view-category/'.$comic->catecomic->slug)}}">{{$comic->catecomic->namecate}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$comic->namecomic}}</li>
          </ol>
      </nav>


    <div class="row">
        <div class="col-md-9">
           <div class="row">
               <div class="col-md-3">
                   <img class="card-img-top"  src="{{asset('public/public/uploads/img_comic/'.$comic->img_comic)}}"  style="height: 225px; width: 100%; display: block;"  data-holder-rendered="true">
               </div>
               <div class="col-md-9">
                   <ul style="list-style: none; text-decoration: none; font-size: 15px; margin-top: 10px">
                       <li>Tên Truyện:  {{$comic->namecomic}}</li>
                       <li>Tác Giả:  {{$comic->author}}</li>
                       <li>Thể Loại: <a href="{{url('story-type/'.$comic->storytype->slug)}}">{{$comic->storytype->name}}</a></li>
                       <li>Danh Mục: <a href="{{url('view-category/'.$comic->catecomic->slug)}}">{{$comic->catecomic->namecate}}</a></li>
                       <li>Số Chương/Tập: <?php echo $cout;?></li>
                       <li>Số Lượt xem <i class="far fa-eye"></i> : 2000</li>
                       <li>Ngày Đăng: PTVA</li>
                       <li>Số Tập/Chương: PTVA</li>
                       <li><a  class="view-chapter"  style="font-size: 12px;font-weight: bold; cursor: pointer">Danh Sách Chương/Tập</a></li>
                       @if($chapter1)
                       <li><a href="{{url('view-chapter/'.$chapter1->slug_chapter)}}" style="font-size: 12px" class="btn btn-danger " >Đọc Truyện</a></li>
                       <li><a href="{{url('view-chapter/'.$chapter_final->slug_chapter)}}" style="font-size: 12px;margin-top: 5px" class="btn btn-success " >Đọc Chương Mới Nhất </a></li>
                       @else
                       @endif
                   </ul>
               </div>
           </div>
            <div class="col-md-12">
                <h3 style="font-weight: bold; font-size: 15px" >Tóm tắt truyện</h3>
                <p>Rạp Chiếu Phim Kinh Dị đưa ra một gợi ý nhỏ: Nếu bạn nhặt được một tờ rơi phim kinh dị của « Rạp Chiếu Phim Địa Ngục », bạn sẽ phát hiện ra tên của mình xuất hiện trong danh sách các diễn viên phim kinh dị ! Không những thế, bạn sẽ bị bắt buộc tham gia bộ phim đó. Sắm vai một nhân vật trong đó, bạn nhất thiết phải tuân theo yêu cầu của kịch bản phim. Theo sự phát triển của tình tiết phim, những nguyền rủa kỳ quái khiến người ta rợn tóc gáy, không nơi nào là không có quỷ ảnh âm u, tất cả sẽ cùng xuất hiện.

                    Hành lang hắc ám, phòng giữ xác yên ắng đến rợn người, bạn không thể không tiếp tục đóng lần lượt từng bộ phim. Có đôi khi, bạn là nhân vật chính, cũng có lúc, có lẽ bạn chỉ là một diễn viên phụ. Chỉ khi tích góp đủ vé chuộc cái chết, bạn mới có thể thoát ly « Rạp Chiếu Phim Địa Ngục ».</p>
            </div>
            <hr>
            <h4 style="font-weight: bold" class="view-chapter">Danh Sách Chương/Tập</h4>

            <ul>
               @php
               $count=count($chapter);

               @endphp
               @if($count>0)
               @foreach($chapter as $key =>$value)
               <li><a href="{{url('view-chapter/'.$value->slug_chapter)}}" style="text-decoration: none">{{$value->title}}</a></li>
               @endforeach
               @else
                   Đang được cập nhật ...
               @endif
           </ul>
            <div class="fb-comments" data-href=" {{\Illuminate\Support\Facades\URL::current()}}" data-width="100%" data-numposts="10"></div>

            <hr>
            <h4 style="font-weight: bold" class="view-chapter">Truyện/Sách Cùng Danh Mục</h4>
            <div class="row">
                @foreach($same_cate as $key =>$value)
                <div class="col-6 col-md-3 col-sm-6">
                    <div class="card mb-3 box-shadow">
                        <img class="card-img-top" src="{{asset('public/public/uploads/img_comic/'.$value->img_comic)}}"  style="height: 200px; width: 100%; display: block;"  data-holder-rendered="true">
                        <div class="card-body">
                            <a href="" style="text-decoration: none"> <h3 style="font-weight: bold;font-size: 14px">{{$value->namecomic}}</h3></a>
                            <p class="card-text" style="font-size: 14px">{{$value->summary}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <small class="text-muted"><i class="far fa-eye"></i> 1254</small>
                                </div>
                                <a href="{{url('view-comic/'.$value->slug)}}" class="btn btn-danger" style="font-size: 12px">Xem Truyện</a>
                            </div>
                        </div>
                    </div></div>
                @endforeach
            </div>
        </div>

   <!-- Truyện nổi bật -->
        <div class="col-md-3">
            <h3> Truyện Nổi Bật </h3>
        </div>
    </div>
  </div>
@endsection
