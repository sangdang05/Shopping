@extends('layouts.admin')
@section('css')
<link href="{{ url('public/siteadmin') }}/css/style.css" rel="stylesheet" />
@endsection
@section('main')
<div class="colum card container-fluid py-4 px-4">
<form action="{{ route('admin.permissions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row  ">
            <div class="col col-lg-6">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Tên permission :</label>
                <div class="input-group input-group-outline my-3">
                <input type="text"  name="name" class="form-control">
            </div>
            @error('name')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            </div>
        </div>
      <button class="btn btn-icon btn-3 btn-success" type="submit">
        <span class="btn-inner--text">Add Permissions</span>
      </button>

</form>
</div>

@endsection
@section('slug')
<script src="{{ url('public/siteadmin') }}/js/slug.js"></script>
@endsection
