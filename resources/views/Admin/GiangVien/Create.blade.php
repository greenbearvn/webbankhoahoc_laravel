@extends('Admin.Layout.base')
@section('content')
<h3 class="text-capitalize ml-3">Tạo giảng viên mới</h3>
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
   <form  action="{{ route('giangvien.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-md-10">
               <h6>Người dùng</h6>
               <div class="input-group mb-3">
                  <select class="form-control" name="MaGiangVien" required>
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
               <input type="text" class="form-control"  name="TenGiangVien"  />
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Ảnh dai dien</h6>
               <div class="input-group mb-3">
                  <input type="file" class="form-control" name="AnhDaiDien" >
               </div>
            </div>
         </div>
         
         <div class="form-group">
            <div class="col-md-10">
               <h6 >Email</h6>
               <input type="text" class="form-control"  name="Email"/>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>So dien thoai</h6>
               <div class="input-group mb-3">
                  <input type="text" class="form-control" name="SoDienThoai">
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6 >Mo ta</h6>
                <div class="input-group mb-3">
                <textarea class="form-control" name="MoTa"></textarea>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Danh mục</h6>
               <div class="input-group mb-3">
                  <select class="form-control" name="MaDanhMuc" required>
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
                  <input type="submit" value="Tạo" class="btn btn-success" />
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