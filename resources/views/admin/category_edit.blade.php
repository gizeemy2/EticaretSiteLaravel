
@extends('layouts.admin')
@section('title','Admin Panel')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kategori Ekle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
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
                    <h3 class="card-title">Title</h3>

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
                            <form action="{{route('admin_category_update',['id'=>$data->id])}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" name="parent_id" style="width: 100%;">
                                            <option value="0">Ana Kategori</option>
                                            @foreach($categories as $rs)
                                                <option value="{{$rs->id}}" @if($rs->id ==$data->parent_id) selected="selected" @endif>
                                                    {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" name="title" value="{{$data->title}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Anahtar Kelimeler</label>
                                        <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <input type="text" name="description" value="{{$data->description}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Durum</label>
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            <option value="True" @if($data->status=='True') selected="selected" @endif>True</option>
                                            <option value="False" @if($data->status=='False') selected="selected" @endif>False</option>
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
