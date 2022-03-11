@extends('layouts.user')

@section('content')
<div class="vizew-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Archives</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reunification of migrant toddlers</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="post-details-area mb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="post-details-thumb mb-50">
                    <img src="../../{{$artikel->gambar_artikel}}" alt="">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-lg-8 col-xl-7">
                <div class="post-details-content">
                    <!-- Blog Content -->
                    <div class="blog-content">

                        <!-- Post Content -->
                        <div class="post-content mt-0">
                            <a href="#" class="post-cata cata-sm cata-danger">{{$artikel->kategori->nama_kategori}}</a>
                            <a href="single-post.html" class="post-title mb-2">{{$artikel->judul_artikel}}</a>

                            <div class="d-flex justify-content-between mb-30">
                                <div class="post-meta d-flex align-items-center">
                                    <a href="#" class="post-author">By {{$artikel->user->name}}</a>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <a href="#" class="post-date">{{$artikel->created_at}}</a>
                                </div>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 42</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a>
                                </div>
                            </div>
                        </div>
                        <p>
                            {{$artikel->isi_artikel}}
                        </p>
                    

                        <div class="authors--meta-data d-flex">
                            <p>Posted<span class="counter">80</span></p>
                            <p>Comments<span class="counter">230</span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection()