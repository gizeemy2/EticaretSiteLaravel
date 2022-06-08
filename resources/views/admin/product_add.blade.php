
@extends('layouts.admin')
@section('title','Admin Panel')
@section('javascript')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ürün Ekle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Ürünler</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ürünler</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin_product_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" name="category_id" style="width: 100%;">
                                            @foreach($datalist as $rs)
                                                <option value="{{$rs->id}}">{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Anahtar Kelimeler</label>
                                        <input type="text" name="keywords" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Fiyat</label>
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Miktar</label>
                                        <input type="number" name="quantity" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Minimum Miktar</label>
                                        <input type="number" name="minquantity" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Vergi</label>
                                        <input type="number" name="tax" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label >Detail</label>
                                        <textarea id="summernote" name="detail" ></textarea>
                                        <script>
                                            $(document).ready(function() {
                                                $('#summernote').summernote();
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label  >Url</label>
                                        <input type="text" name="slug" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label  >Resim</label>
                                        <input type="file" name="image"  class="form-control">
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Durum</label>
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            <option selected="selected" value="False">False</option>
                                            <option value="True">True</option>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Ekle</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
