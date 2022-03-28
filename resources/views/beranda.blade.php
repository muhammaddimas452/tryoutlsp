@extends('layouts.user')

@section('content')
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Feature</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Archive by Category BERANDA</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive List Posts Area Start ##### -->
    <div class="vizew-archive-list-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h4><i class="fa fa-book" aria-hidden="true"></i> Artikel Terbaru </h4>
                        </div>
                        <!-- View Options -->
                        <div class="view-options">
                            {{-- <a href="archive-grid.html"><i class="fa fa-th-large" aria-hidden="true"></i></a> --}}
                            <a href="/" ><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                            <a href="/grid" ><i class="fa fa-th-large" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Post Area -->
                    @foreach($terbaru as $item)
                    <div class="single-post-area style-2">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../../{{$item->gambar_artikel}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Post Content -->
                                <div class="post-content mt-0">
                                    <a href="#" class="post-cata cata-sm cata-success">{{$item->kategori->nama_kategori}}</a>
                                    <a href="{{route('detailArtikel', $id = $item->id)}}" class="post-title mb-2">{{$item->judul_artikel}}</a>
                                    <div class="post-meta d-flex align-items-center mb-2">
                                        <a href="#" class="post-author">By {{$item->user->name}}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">{{$item->created_at}}</a>
                                    </div>
                                    <p class="mb-2">{{$item->isi_artikel}}</p>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-eye mr-2" aria-hidden="true"></i>{{$item->views}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Pagination -->
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="sidebar-area">
                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Artikel Terpopuler</h4>
                                <div class="line"></div>
                            </div>

                            <!-- Single Blog Post -->
                            @foreach($baca as $item)
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="../../{{$item->gambar_artikel}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">{{ $item->judul_artikel}}</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-eye mr-1" aria-hidden="true"></i>{{ $item->views}}</a>
                                        <a href="#" class="ml-2"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>{{ $item->created_at}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Archive List Posts Area End ##### -->
@endsection()