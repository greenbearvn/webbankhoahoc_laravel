@extends('Admin.Layout.base')
@section('content')
    <h3 class="text-capitalize ml-3">Tạo cấp độ mới</h3>
    <div ng-controller="Create">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form  action="{{ route('nguoidung.update', $nguoidung->MaNguoiDung) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="form-horizontal">
                <input hidden value="{{ $nguoidung->MaNguoiDung }}" name="MaCapDo">
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Tên nguoi dung</h6>
                        <input type="text" class="form-control"  value="{{ $nguoidung->TenNguoiDung}}"  name="TenNguoiDung"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Mat Khau</h6>
                        <input type="text" class="form-control" value="{{ $nguoidung->MatKhau }}"  name="MatKhau"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6>Chọn quyền</h6>
                        <select class="form-control" name="Quyen" value="{{ $nguoidung->TenCapDo }}">
                            <option value="Admin">Quan tri vien</option>
                            <option value="User">Nguoi dung</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="Cập nhật" class="btn btn-success" />
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-danger" href="/admin/capdo/index">
                            Quay lại 
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

