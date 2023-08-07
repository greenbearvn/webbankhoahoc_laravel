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
        <form  action="{{ route('binhluan.store') }}" method="POST" >
            @csrf
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10">
                    <h6>Khoa hoc</h6>
                    <div class="input-group mb-3">
                        <select class="form-control" name="MaKhoaHoc" required>
                            @foreach ($khoahocs as $khoahoc)
                            <option value="{{$khoahoc->id}}">{{$khoahoc->TenKhoaHoc}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('id'))
                            <span class="text-danger">{{ $errors->first('id') }}</span>
                        @endif
                    </div>
                    </div>
                <div class="form-group">
                    <div class="col-md-10">
                    <h6>Nguoi dung</h6>
                    <div class="input-group mb-3">
                        <select class="form-control" name="MaNguoiDung" required>
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
                        <h6 >Noi dung</h6>
                        <textarea class="form-control" name="NoiDung" rows="5" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Thoi gian hoan thanh</h6>
                        <input type="date" class="form-control"  name="ThoiGian"  />
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="Tạo" class="btn btn-success" />
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-danger" href="/admin/binhluan/index">
                            Quay lại 
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

