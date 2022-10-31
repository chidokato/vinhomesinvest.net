@extends('admin.layout.index')
@section('ladipage') menu-item-active @endsection
@section('content')
<div id="alerts">@include('admin.errors.alerts')</div>
<form id="validateForm" action="admin/ladipage/<?php if(isset($data)){if(isset($double)) echo 'add'; else echo 'edit/'.$data->id;}else{ echo 'add'; } ?>" method="POST" enctype="multipart/form-data" id="target">
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="admin/ladipage/list" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại trang danh sách tin tức</span> </a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item mobile-hide">
            <a class="add-iteam" target="_blank" href="{{ asset('') }}"><button class="btn-warning form-control" type="button"><i class="fa fa-share" aria-hidden="true"></i> Trang chủ</button></a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item mobile-hide">
            <button type="reset" class="btn-danger mr-2 form-control"><i class="fas fa-sync"></i> Làm mới</button>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item">
            <button type="submit" class="btn-success form-control"><i class="far fa-save"></i> Lưu lại</button>
        </li>
    </ul>
</nav>

<div class="d-sm-flex align-items-center justify-content-between mb-3 flex" style="height: 38px;">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">{{ isset($data) ? $data->name : 'Thêm mới' }}</h2>
</div>

<div class="row">
    <div class="col-xl-9 col-lg-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label style="display: flex;">Name</label> 
                            <input value="{{ isset($data) ? $data->name : '' }}" name="name" placeholder="Name" type="text" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Detail</label>
                            <textarea rows="3" name="detail" class="form-control">{{ isset($data) ? $data->detail : '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" class="form-control ckeditor" id="ckeditor">{{ isset($data) ? $data->content : '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div style="margin-bottom: 20px"><button class="button-none" type="button" id="add_section" onclick="addCode()"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm link</button></div>

        <div class="add_to_me" id="add_to_me">
            @if(isset($data))
            @foreach($data->section as $val)
            <div class="card shadow mb-4" id="section_list">
                <input type="hidden" name="editidsection[]" id="section_id" value="{{$val->id}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label> 
                                <input value="{{ $val->name }}" name="editnamesection[]" placeholder="Name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Images</label> 
                                <input name="editimgsection[]" placeholder="img" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img style="height: 78px" src="data/ladipage/{{isset($data)? $val->img : ''}}">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label> 
                                <textarea name="editcontentsection[]" rows="3" placeholder="content" class="form-control">{!! $val->content !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="del_section" type="button" onClick="delete_row(this)" class="delete_row"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
            </div>
            @endforeach
            @endif
        </div>

    </div>

    <div class="col-xl-3 col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tùy chọn</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Menu</label>
                    <select name='menu_id' class="form-control kt_select2_1">
                        <option value="">... </option>
                        @foreach($menu as $val)
                        <option <?php if(isset($data) && $data->menu_id == $val->id) echo 'selected'; ?> value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Images</h6>
            </div>
            <div class="card-body">
                <div class="file-upload">
                    <div class="file-upload-content" onclick="$('.file-upload-input').trigger( 'click' )">
                        <img class="file-upload-image" src="{{ isset($data) ? 'data/ladipage/300/'.$data->img : 'data/no_image.jpg' }}" />
                    </div>
                    <div class="image-upload-wrap">
                        <input name="img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</form>

<style type="text/css">
    .add_to_me button{     position: absolute;
    top: 0;
    right: 0;
    border: none;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: none;
    color: red;
    display: flex;
    align-items: center;
    justify-content: center; }
</style>

<script>
    function addCode() {
        document.getElementById("add_to_me").insertAdjacentHTML("beforeend",
                '<div class="card shadow mb-4"><div class="card-body"><div class="row"><div class="col-md-6"><div class="form-group"><label>Name</label> <input name="namesection[]" placeholder="Name" type="text" class="form-control"></div></div><div class="col-md-6"><div class="form-group"><label>Images</label> <input name="imgsection[]" placeholder="img" type="file" class="form-control"></div></div><div class="col-md-12"><div class="form-group"><label>Content</label> <textarea name="contentsection[]" rows="3" placeholder="content" class="form-control"></textarea></div></div></div></div><button type="button" onClick="delete_row(this)" class="delete_row"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></div>');
    }
    function delete_row(e) {
        e.parentElement.remove();
    }
</script>

@endsection

