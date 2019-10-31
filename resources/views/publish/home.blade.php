@include('publish/time')
@extends('publish.masterPage')
@section('content')
<div class="row content">
  <div class="col-sm-2 sidenav">
    <div class="index-intro row">
      <ul class="col-sm-12">
        <li class="dropdown" style="width:100%">
          <button class="btn btn-primary dropdown-toggle" type="button" style="width:100%" data-toggle="dropdown">Thể loại truyện
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            @foreach($categoriesList as $category)
            <li class="dropdown-item">
              <a href="/danh-sach/{{$category->id}}/">{{$category->name}}</a>
            </li>
            @endforeach
          </ul>
        </li>
      </ul>
    </div>
    <div class="index-intro row">
      <div class="title-list">
        <h3>
          <a href="https://truyenfull.vn/danh-sach/truyen-moi/" title="Truyện mới">Truyện mới</a>
        </h3>
      </div>
      @foreach($newBooks as $newBook)
      <div class="truyen-moi-item col-sm-6 col-xs-3" itemscope="" itemtype="https://schema.org/Book" style="padding:4px;">
        <a href="/truyen/{{$newBook->id }}" itemprop="url">
          <img src="{{$newBook->avatar}}" alt="{{$newBook->name}}" class="truyen-moi-img item-img" itemprop="image">
          <div style="width:100%;height:100%;">
            <div class="truyen-moi-title">
              <h6 class="bookname" itemprop="name">{{$newBook->name}}</h6>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    <div class="title-list hidden-xs">
      <h3>
        <a href="https://truyenfull.vn/danh-sach/truyen-moi/" title="Truyện xem nhiều">Truyện xem nhiều</a>
      </h3>
    </div>
    <div class="hidden-xs">
      <div class="">
        <div class="">
          <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
          <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
              @foreach($topViewBooks as $topViewBook)
              <li data-target="#fade-quote-carousel" data-slide-to="{{$loop->index}}" class="@if($loop->first) active @endif"></li>
              @endforeach
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
              @foreach($topViewBooks as $topViewBook)
              <div class="item truyen-xem-nhieu-info @if($loop->first) active @endif">
                <a href="/truyen/{{$topViewBook->id}}">
                  <img class="d-block w-100 slider-content" src="{{$topViewBook->avatar}}" style="width:100%;height:100%">
                  <h4>{{$topViewBook->name}}</h4>
                </a>
                <h5>{{$topViewBook->authorName}}</h5>
                <h6>{!!$topViewBook->description!!}</h6>

              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-8 text-left">
    <div class="">
      <div class="title-list">
        <h3>
          <a href="https://truyenfull.vn/danh-sach/truyen-moi/" title="Truyện mới cập nhật">Truyện mới cập nhật</a>
        </h3>
      </div>
      @foreach($justUpdatedBooks as $justUpdatedBook)
      <div class="row truyen-moi-cap-nhat">
        <div class="col-xs-9 col-sm-6 col-md-5 col-title">
          <a href="/truyen/{{$justUpdatedBook->id}}" title="{{$justUpdatedBook->name}}" itemprop="url">
            <h6 itemprop="name">
              {{$justUpdatedBook->name}}
            </h6>
          </a>
          <span class="label-title label-hot"></span>
        </div>
        <div class="hidden-xs col-sm-3 col-md-3 col-cat">
          <h6>
            @foreach($justUpdatedBook->categories as $category)
            <a itemprop="genre" href="/the-loai/{{$category->id}}" title="{{$category->name}}">
              {{$category->name}}
            </a>
            @if(!$loop->last)
            ,
            @endif
            @endforeach
            <h6>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2 col-chap text-info">
          <a href="doc-truyen/{{$justUpdatedBook->id}}/chuong-{{$justUpdatedBook->lastchapter}}/" title="{{$justUpdatedBook->name}}">
            <h6>
              <span class="chapter-text">
                C<a class="hidden-xs hidden-sm">hương </a>
              </span>{{$justUpdatedBook->lastchapter}}
            </h6>
          </a>
        </div>
        <div class="hidden-xs hidden-sm col-md-2 col-time">
          <h6>{{timeAgo($justUpdatedBook->lastestUpdate)}}</h6>
        </div>
      </div>
      @endforeach
    </div>

    <div class="truyen-de-cu-list">
      <div class="title-list">
        <h3>
          <a href="https://truyenfull.vn/danh-sach/truyen-moi/" title="Truyện mới">Truyện được đề cử</a>
        </h3>
      </div>
      <div class="row">
        @foreach($recommendBooks as $recommendBook)
        <div class="truyen-de-cu col-sm-6 row" >
          <div class="avatar col-xs-3">
            <a href="/truyen/toan-chuc-phap-su-dich/" class="cover" target="_blank" aria-label="Toàn Chức Pháp Sư (Dịch)">
              <img class="d-block w-100 slider-content" src="{{$recommendBook->avatar}}">
            </a>
          </div>
          <div class="novel-info col-xs-9" style="font-size:12px">
            <h5>{{$recommendBook->bookName}}</h5>
            <h6 style="color: #111;">{{$recommendBook->authorName}}</h6>
            <h6 style="color: #4497f8!important;">đề cứ {{$recommendBook->vote}}/10</h6>
            <h6 style="color: #f5222d!important;">{{number_format($recommendBook->view)}} lượt xem</h6>
          </div>

        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="col-sm-2 sidenav">
    @yield('right_content')
    <div class="well">
      <p>ADS</p>
    </div>
    <div class="well">
      <p>ADS</p>
    </div>
    <div class="comment-list">

    </div>
  </div>
</div>

@endsection