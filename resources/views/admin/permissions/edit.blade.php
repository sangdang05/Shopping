@extends('layouts.admin')
@section('css')
<link href="{{ url('siteadmin') }}/css/style.css" rel="stylesheet" />
@endsection
@section('main')
<div class="colum card container-fluid py-4 px-4">
<form action="{{ route('admin.permissions.update',$permission->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{ $permission->id }}" />
        <div class="row  ">
            <div class="col col-lg-6">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Tên sản phẩm :</label>
                <div class="input-group input-group-outline my-3">
                <input type="text" value="{{$permission->name}}" name="name"  class="form-control">
            </div>
            @error('name')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            </div>

            @error('slug')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
        </div>



      <button class="btn btn-icon btn-3 btn-success" type="submit">
        <span class="btn-inner--text">Update Permission</span>
      </button>

</form>
</div>

@endsection
@section('slug')
<script src="{{ url('siteadmin') }}/js/slug.js"></script>
@endsection
