@extends('layouts.admin')
@section('main')
<form action="{{ route('admin.user.changeRole', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-sm pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Quản lý Role</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">

            <table class="table align-items-center mb-0">
              <thead>

              </thead>
              <tbody>
                <tr>
                @foreach($role as $item)
                @if(isset($all_roles->id))
                <div class="form-check">
                    <input value={{ $item->name }} class="form-check-input"{{ $item->id == $all_roles->id ? 'checked' : '' }} type="radio" name="role" id="flexRadioDefault{{ $item->id }}">
                    <label  class="form-check-label" for="flexRadioDefault1">
                        {{$item->name}}
                    </label>
                  </div>
                  @else
                  <div class="form-check">
                    <input value={{ $item->name }} class="form-check-input" type="radio" name="role" id="flexRadioDefault{{ $item->id }}">
                    <label  class="form-check-label" for="flexRadioDefault1">
                        {{$item->name}}
                    </label>
                  </div>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
</div>
    <button class="btn btn-icon btn-3 btn-success" type="submit">
    <span class="btn-inner--text">Cấp Role</span>
    <span class="btn-inner--icon">
    </button>

</form>

@endsection
