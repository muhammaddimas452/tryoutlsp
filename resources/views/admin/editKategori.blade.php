@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
            <div class="sparkline10-hd">
                <div class="main-sparkline10-hd">
                    <h1>Edit <span class="basic-ds-n">Kategori</span></h1>
                </div>
            </div>
            <div class="sparkline10-graph">
                <div class="basic-login-form-ad">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="basic-login-inner inline-basic-form">
                                <form action="{{route('updateKategori', $id = $kategori->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <input type="text" class="form-control basic-ele-mg-b-10 responsive-mg-b-10" 
                                                name="nama_kategori"
                                                placeholder="Masukkan Kategori" 
                                                value="{{ $kategori->nama_kategori}}"/>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                                                            <div class="login-horizental lg-hz-mg"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()