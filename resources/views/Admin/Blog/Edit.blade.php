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
        <form  action="{{ route('blog.update', $blog->MaBaiViet) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-horizontal">
                <input hidden value="{{ $blog->MaBaiViet }}" name="MaBaiViet">
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Ten bai viet</h6>
                        <input  type="text" class="form-control" name="TenBaiViet" value="{{ $blog->TenBaiViet }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Anh minh hoa</h6>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="AnhMinhHoa" value="{{ $blog->AnhMinhHoa }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Noi dung</h6>
                        <textarea class="form-control" name="NoiDung" rows="5" >{{ $blog->NoiDung }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Thoi gian</h6>
                        <input type="date" class="form-control"  name="NgayDang" value="{{ $blog->NgayDang }}" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                    <h6>Danh muc</h6>
                    <div class="input-group mb-3">
                        <select class="form-control" name="MaDanhMuc" value="{{ $blog->MaDanhMuc }}"  >
                            <option value="{{$blog->MaDanhMuc}}">{{$blog->tendm}}</option>
                            @foreach ($danhmucs as $danhmuc)
                            <option value="{{$danhmuc->madm}}">{{$danhmuc->tendm}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('madm'))
                            <span class="text-danger">{{ $errors->first('madm') }}</span>
                        @endif
                    </div>
                    </div>
                <div class="form-group">
                    <div class="col-md-10">
                    <h6>Nguoi dung</h6>
                    <div class="input-group mb-3">
                        <select class="form-control" name="MaNguoiDung" value="{{ $blog->MaNguoiDung }}" >
                            <option value="{{$blog->MaNguoiDung}}">{{$blog->TenNguoiDung}}</option>
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
                
                <div class="d-flex">
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="Cap nhat" class="btn btn-success" />
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-danger" href="/admin/blog/index">
                            Quay lại 
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

