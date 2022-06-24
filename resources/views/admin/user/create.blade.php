@extends('layouts.admin')
@section('css')
<link href="{{ url('public/siteadmin') }}/css/style.css" rel="stylesheet" />
@endsection
@section('main')
<div class="colum card container-fluid py-4 px-4">
<form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col col-lg-4">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Username:</label>
                <div class="input-group input-group-outline my-3">
                <input type="text" name="name"  class="form-control">
            </div>
            @error('name')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-4">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Email:</label>
                <div class="input-group input-group-outline my-3">
                    <input type="email"  class="form-control" name="email" >
                </div>
                @error('email')
                    <small id="helpId" class="text-muted">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-4">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Password:</label>
                <div class="input-group input-group-outline my-3">
                    <input type="password"  class="form-control" name="password" >
                </div>
                @error('password')
                    <small id="helpId" class="text-muted">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-4">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Re-password:</label>
                <div class="input-group input-group-outline my-3">
                    <input type="password"  class="form-control" name="confirm_password" >
                </div>
                @error('confirm_password')
                    <small id="helpId" class="text-muted">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-4">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder"> Ảnh user :</label>
                <div class=" mb-3">
                <input type="file" name="upload_image">
                </div>
            </div>
            @error('upload_image')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
        </div>

      <button class="btn btn-icon btn-3 btn-success" type="submit">
        <span class="btn-inner--text">Thêm User</span>
      </button>

</form>
</div>

@endsection
@section('slug')
<script src="{{ url('public/siteadmin') }}/js/slug.js"></script>
@endsection
