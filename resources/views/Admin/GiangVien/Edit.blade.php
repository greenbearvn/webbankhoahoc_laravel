@extends('Admin.Layout.base')
@section('content')


<h3>Cập nhật thông tin danh muc</h3>
<div >
    <form action="{{ route('giangvien.update',$giangvien->MaGiangVien)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-horizontal">
            <div class="form-horizontal">
            <div class="form-group">
                <div class="col-md-10">
                <h6>Người dùng</h6>
                <div class="input-group mb-3">
                    <select class="form-control" name="MaGiangVien" value="{{$giangvien->MaGiangVien}}">
                        @foreach ($nguoidungs as $nguoidung)
                            <option value="{{$nguoidung->MaNguoiDung}}">{{$nguoidung->TenNguoiDung}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('MaNguoiDung'))
                        <span class="text-danger">{{ $errors->first('MaNguoiDung') }}</span>
                    @endif
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10">
                <h6 >Tên giảng viên</h6>
                <input type="text" class="form-control"  name="TenGiangVien"  value="{{$giangvien->TenGiangVien}}"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10">
                <h6>Ảnh dai dien</h6>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="AnhDaiDien" value="{{$giangvien->AnhDaiDien}}">
                </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-10">
                <h6 >Email</h6>
                <input type="text" class="form-control"  name="Email" value="{{$giangvien->Email}}"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10">
                <h6>So dien thoai</h6>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="SoDienThoai" value="{{$giangvien->SoDienThoai}}">
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10">
                <h6 >Mo ta</h6>
                    <div class="input-group mb-3">
                    <textarea class="form-control" name="MoTa" >{{$giangvien->MoTa}}</textarea>
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10">
                <h6>Danh mục</h6>
                <div class="input-group mb-3">
                    <select class="form-control" name="MaDanhMuc" value="{{$giangvien->MaDanhMuc}}">
                        @foreach ($danhmucs as $danhmuc)
                        <option value="{{$danhmuc->madm}}">{{$danhmuc->tendm}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('madm'))
                        <span class="text-danger">{{ $errors->first('madm') }}</span>
                    @endif
                </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" value="Cập nhật" class="btn btn-success" />
                    </div>
                </div>
                <div>
                    <a class="btn btn-danger" href="/Admin/Games/Index">
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection