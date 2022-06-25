@extends('layouts.admin')

@section('main')
<div class="colum card container-fluid py-4 px-4">
<form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row  ">
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Tên sản phẩm :</label>
                <div class="input-group input-group-outline my-3">
                <input type="text" id="input_slug" name="name" onkeyup="ChangeToSlug();" class="form-control">
            </div>
            @error('name')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            </div>
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Giá :</label>
                <div class="input-group input-group-outline my-3">

                <input name="price" type="text" class="form-control">
                </div>
            </div>
            @error('price')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder"> Slug :</label>
                <div class="input-group input-group-outline my-3">
                    <input id="output_slug" type="text" name="slug" readonly class="form-control">
                </div>
            </div>
            @error('slug')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col">
            <div class="input-group input-group-static mb-4">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Danh mục :    </label>
                <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                <option value="">-------- Chọn danh mục-------- </option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            @error('category_id')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder">Trạng thái :</label>
                <div class="form-check mb-3">
                <input class="form-check-input" type="radio"  value="1" name="status" id="customRadio1">
                <label class="custom-control-label" for="customRadio1">Hiện</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio"  value="0" name="status" id="customRadio2">
                <label class="custom-control-label" for="customRadio2">Ẩn</label>
            </div>
            @error('status')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder"> Ảnh sản phẩm :</label>
                <div class=" mb-3">
                <input type="file" name="upload_image">
                </div>
            </div>
            @error('upload_image')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror
            <div class="col">
                <label for="exampleFormControlSelect1" class="ms-0 font-weight-bolder"> Thứ tự ưu tiên :</label>
                <div class="input-group input-group-outline my-3">

                <input type="number" name="prioty" class="form-control">
                </div>
            </div>
            @error('prioty')
                    <div id="helpId" class="text-red">{{ $message }}</div>
            @enderror

        </div>

      <button class="btn btn-icon btn-3 btn-success" type="submit">
        <span class="btn-inner--text">Thêm Sản Phẩm</span>
      </button>

</form>
</div>

@endsection
@section('slug')
<script src="{{ url('siteadmin') }}/js/slug.js"></script>
@endsection
