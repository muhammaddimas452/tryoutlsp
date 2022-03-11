@extends('layouts.app')

@section('content')
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div>
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <a href="/admin/data-artikel/add-artikel"><button class="btn btn-primary"><i class="fa fas-trash"></i> Tambah Data</button></a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">No</th>
                                        <th data-editable="true">Pembuat</th>
                                        <th data-editable="true">Kategori</th>
                                        <th data-editable="true">Judul Artikel</th>
                                        <th data-editable="true">Isi Artikel</th>
                                        <th>Gambar Artikel</th>
                                        <th>Views</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($artikel as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->kategori->nama_kategori}}</td>
                                        <td>{{$item->judul_artikel}}</td>
                                        <td>{{$item->isi_artikel}}</td>
                                        <td><img src="../../{{$item->gambar_artikel}}" style="width:150px"></td>
                                        <td>{{$item->views}}</td>
                                        <td>
                                            <a href="{{ route('detailArtikel', $id = $item->id) }}" data-toggle="modal" data-target="#detailArtikel"><button class="btn btn-primary"><i class="fa fas-edit"></i>Detail</button></a>
                                            <a href="{{ route('deleteArtikel', $id = $item->id) }}"><button class="btn btn-danger"><i class="fa fas-trash"></i> Delete</button></a>
                                            <a href="{{ route('editArtikel', $id = $item->id) }}"><button class="btn btn-success"><i class="fa fas-edit"></i>Edit</button></a>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()