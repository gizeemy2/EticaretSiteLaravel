
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
                        <h1>Ayar Güncelle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Ayarlar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <form action="{{route('admin_setting_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- form start -->
                    <div class="card card-primary card-tabs col-12">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-general-tab" data-toggle="pill" href="#custom-tabs-one-general" role="tab" aria-controls="custom-tabs-one-general" aria-selected="true">Genel Ayarlar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-contactdata-tab" data-toggle="pill" href="#custom-tabs-one-contactdata" role="tab" aria-controls="custom-tabs-one-contactdata" aria-selected="true">İletişim Bilgileri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-smtp-tab" data-toggle="pill" href="#custom-tabs-one-smtp" role="tab" aria-controls="custom-tabs-one-smtp" aria-selected="false">Smtp Ayarlar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-social-tab" data-toggle="pill" href="#custom-tabs-one-social" role="tab" aria-controls="custom-tabs-one-social" aria-selected="false">Sosyal Medya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-aboutus-tab" data-toggle="pill" href="#custom-tabs-one-aboutus" role="tab" aria-controls="custom-tabs-one-aboutus" aria-selected="false">Hakkımızda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-contact-tab" data-toggle="pill" href="#custom-tabs-one-contact" role="tab" aria-controls="custom-tabs-one-contact" aria-selected="false">İletişim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-references-tab" data-toggle="pill" href="#custom-tabs-one-references" role="tab" aria-controls="custom-tabs-one-reference" aria-selected="false">Referanslar</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-general" role="tabpanel" aria-labelledby="custom-tabs-one-general-tab">
                                    <input type="hidden" id="'id" name="id" value="{{$data->id}}" class="form-control">
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
                                        <label>Firma</label>
                                        <input type="text" name="company" value="{{$data->company}}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Durum</label>
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            <option value="True" @if($data->status=='True') selected="selected" @endif>True</option>
                                            <option value="False" @if($data->status=='False') selected="selected" @endif>False</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-contactdata" role="tabpanel" aria-labelledby="custom-tabs-one-contactdata-tab">
                                    <div class="form-group">
                                        <label>Adres</label>
                                        <input type="text" name="address" value="{{$data->address}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <input type="text" name="phone" value="{{$data->phone}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input type="text" name="fax" value="{{$data->fax}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{$data->email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-smtp" role="tabpanel" aria-labelledby="custom-tabs-one-smtp-tab">
                                    <div class="form-group">
                                        <label>Smtp Server</label>
                                        <input type="text" name="smtpserver" value="{{$data->smtpserver}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Smtp Email</label>
                                        <input type="text" name="smtpemail" value="{{$data->smtpemail}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Smtp Şifre</label>
                                        <input type="password" name="smtppasword" value="{{$data->smtppasword}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Smtp Port</label>
                                        <input type="number" name="smtpport" value="{{$data->smtpport}}" class="form-control">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-social" role="tabpanel" aria-labelledby="custom-tabs-one-social-tab">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" value="{{$data->facebook}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" name="instagram" value="{{$data->instagram}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" name="twitter" value="{{$data->twitter}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube</label>
                                        <input type="text" name="youtube" value="{{$data->youtube}}" class="form-control">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-aboutus" role="tabpanel" aria-labelledby="custom-tabs-one-aboutus-tab">
                                    <div class="form-group">
                                        <label >Hakkımızda</label>
                                        <textarea id="aboutus" name="aboutus">{{$data->aboutus}}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-contact" role="tabpanel" aria-labelledby="custom-tabs-one-contact-tab">
                                    <div class="form-group">
                                        <label >İletişim</label>
                                        <textarea id="contact" name="contact">{{$data->contact}}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-references" role="tabpanel" aria-labelledby="custom-tabs-one-references-tab">
                                    <div class="form-group">
                                        <label >Referenslar</label>
                                        <textarea id="references" name="references">{{$data->references}}</textarea>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $('#aboutus').summernote();
                                            $('#contact').summernote();
                                            $('#references').summernote();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </div>
                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
