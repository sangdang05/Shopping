@extends('layouts.admin')
@section('main')
<form action="{{ route('admin.roles.changePermissions',$role->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-sm pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Quản lý permission: {{ $role->name}}</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        @foreach ($permissions as $item)
                        <div class="form-check">
                            <input value="{{ $item->id }}" name="permission[]" class="form-check-input"
                            @foreach ($roleHasPermissions as $check)
                            {{ $item->id == $check->permission_id ? 'checked' : ''  }}
                            @endforeach

                             type="checkbox" value="{{ $item->id }}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $item->name}}
                            </label>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-icon btn-3 btn-success" type="submit">
        <span class="btn-inner--text">Cập nhật Premissions</span>
      </button>
</form>

@endsection
