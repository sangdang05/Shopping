@extends('layouts.admin.admin')
@section('main')
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Quản lý sản phẩm</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên sản phẩm</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Danh mục</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày tạo</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hành động</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($product as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{url('uploads')}}/product/{{$item->image}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->name}}</h6>

                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->cat->name}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->price}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($item->status == 1)
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                        @else
                        <span class="badge badge-sm bg-gradient-danger">Offline</span>

                        @endif
                      </td>
                      <td class="align-middle text-center">
                        @if(isset($item->created_at))
                        <span class="text-secondary text-xs font-weight-bold">{{$item->created_at->format('d/m/Y')}}</span>
                        @endif
                      </td>
                      <td class="align-middle  text-center ">
                        <a href="{{route('admin.product.edit',$item->id)}}">
                        <button type="button" class="btn bg-gradient-info btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa sản phẩm" data-container="body" data-animation="true">Sửa</button>
                        </a>

                        <a class="btn-delete" href="{{route('admin.product.destroy',$item->id)}}">
                        <button type="button" class="btn bg-gradient-danger  btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa" data-container="body" data-animation="true">Xóa</button>
                        </a>
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
      <a href="{{route('admin.product.create')}}">
      <button class="btn btn-icon btn-3 btn-success" type="button">
        <span class="btn-inner--text">Thêm Sản Phẩm</span>
      <span class="btn-inner--icon"><i class="fas fa-plus"></i>
      </button>
      </a>


    <form method="POST" id="form-delete" action="">
        @csrf @method('DELETE')
    </form>

@endsection
@section('js')
    <script>
        $('.btn-delete').click(function(ev){
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete ').attr('action',_href);
            if(confirm('Bạn có chắc chắn muốn xóa không?')){
                $('form#form-delete ').submit();
            }
        })
    </script>
@endsection
