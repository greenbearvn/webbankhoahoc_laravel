@extends('Admin.Layout.base')
@section('content')
<h3 class="text-capitalize ml-3">Cap nhat khoa hoc mới</h3>
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
   <form  action="{{route('khoahoc.update',$khoahoc->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-horizontal">
      <input hidden value="{{$khoahoc->id}}" name="id">
         <div class="form-group">
            <div class="col-md-10">
               <h6 >Tên khóa học</h6>
               <input type="text" class="form-control" value="{{$khoahoc->TenKhoaHoc}}"  name="TenKhoaHoc"  />
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Ảnh khóa học</h6>
               <div class="input-group mb-3">
                  <input type="file" class="form-control" value="{{$khoahoc->AnhKhoaHoc}}" name="AnhKhoaHoc" >
               </div>
            </div>
         </div>
         
         <div class="form-group">
            <div class="col-md-10">
               <h6 >Mô tả ngắn</h6>
               <input type="text" class="form-control"  value="{{$khoahoc->MoTaNgan}}" name="MoTaNgan"/>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Mô tả đầy đủ</h6>
               <div class="input-group mb-3">
                  <input type="text" class="form-control" value="{{$khoahoc->MoTaDayDu}}" name="MoTaDayDu">
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6 >Thời gian</h6>

               <input type="date" class="form-control"  name="ThoiGian" value="{{ $khoahoc->ThoiGian}}"/>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Lượt xem</h6>
               <div class="input-group mb-3">
                  <input type="text" class="form-control" name="LuotXem" value="{{$khoahoc->LuotXem}}">
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6 >Thời lượng khóa học</h6>
               <input type="text" class="form-control"  name="ThoiLuongKhoaHoc" value="{{$khoahoc->ThoiLuongKhoaHoc}}" />
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Giá cũ</h6>
               <div class="input-group mb-3">
                  <input type="text" class="form-control" name="GiaCu" value="{{$khoahoc->GiaCu}}">
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Giảm giá</h6>
               <div class="input-group mb-3">
                  <input type="text" class="form-control" name="GiamGia" value="{{$khoahoc->GiamGia}}">
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Trạng thái</h6>
               <div class="input-group mb-3">
                  <select class="form-control" name="TrangThai" value="{{$khoahoc->TrangThai}}">
                     <option value="1">True</option>
                     <option value="0">False</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Cấp độ</h6>
               <div class="input-group mb-3">
                  <select class="form-control" name="MaCapDo" value="{{$khoahoc->MaCapDo}}">
                     @foreach ($capdos as $capdo)
                        <option value="{{$capdo->MaCapDo}}">{{$capdo->TenCapDo}}</option>
                     @endforeach
                  </select>
                  @if ($errors->has('MaCapDo'))
                     <span class="text-danger">{{ $errors->first('MaCapDo') }}</span>
                  @endif
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Giảng viên</h6>
               <div class="input-group mb-3">
                  <select class="form-control" name="MaGiangVien" value="{{$khoahoc->MaGiangVien}}">
                     @foreach ($giangviens as $giangvien)
                     <option value="{{$giangvien->MaGiangVien}}">{{$giangvien->TenGiangVien}}</option>
                     @endforeach
                  </select>
                  @if ($errors->has('MaGiangVien'))
                     <span class="text-danger">{{ $errors->first('MaGiangVien') }}</span>
                  @endif
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-md-10">
               <h6>Danh mục</h6>
               <div class="input-group mb-3">
                  <select class="form-control" name="MaDanhMuc" value="{{$khoahoc->madm}}">
                     @foreach ($danhmucs as $danhmuc)
                     <option value="{{$danhmuc->madm}}">{{$danhmuc->tendm}}</option>
                     @endforeach
                  </select>
                  @if ($errors->has('MaDanhMuc'))
                     <span class="text-danger">{{ $errors->first('MaDanhMuc') }}</span>
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