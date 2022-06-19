@extends('layouts.admin.admin')
@section('main')
<div class="colum card container-fluid py-4 px-4">
<form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{ $category->id }}" />
        <div class="row  ">
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Tên danh mục :</label>
                <div class="input-group input-group-outline my-3">

                <input type="text" value="{{$category->name}}" id="input_slug" name="name" onkeyup="ChangeToSlug();" class="form-control">
            </div>
            @error('name')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            </div>

            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder"> Slug :</label>
                <div class="input-group input-group-outline my-3">
                    <input value="{{$category->slug}}" id="output_slug" type="text" name="slug" readonly class="form-control">
                </div>
            </div>
            @error('slug')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">

            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Trạng thái :</label>
                <div class="form-check mb-3">

                <input class="form-check-input" type="radio"<?php echo $category->status == 1 ? 'checked': ''; ?>  value="1" name="status" id="customRadio1">
                <label class="custom-control-label" for="customRadio1">Hiện</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" <?php echo $category->status == 0 ? 'checked': ''; ?> value="0" name="status" id="customRadio2">
                <label class="custom-control-label" for="customRadio2">Ẩn</label>
                 </div>
                 @error('status')
                    <div id="helpId" class="text-red">{{ $message }}</div>
                 @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder"> Ảnh danh mục :</label>
                <div class=" mb-3">
                <input type="file"  name="upload_image">
                </div>
                @error('upload_image')
                    <div id="helpId" class="text-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder"> Thứ tự ưu tiên :</label>
                <div class="input-group input-group-outline my-3">

                <input type="number" value="{{$category->prioty}}" name="prioty" class="form-control">
                </div>
                @error('prioty')
                    <div id="helpId" class="text-red">{{ $message }}</div>
                @enderror
            </div>

        </div>

      <button class="btn btn-icon btn-3 btn-success" type="submit">
        <span class="btn-inner--text">Sửa danh mục</span>
      </button>

</form>
</div>
@endsection
@section('slug')
<script src="{{ url('siteadmin') }}/js/slug.js"></script>
@endsection
