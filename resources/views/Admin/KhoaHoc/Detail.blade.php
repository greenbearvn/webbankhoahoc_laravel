@extends('Admin.Layout.base')
@section('content')
<div ng-controller="DonHangDetail" >
    <div id="myDiv">
        <h3>Khóa học</h3>

        <table class="table">
            <tr>
                
                <th>
                    STT
                </th>
                <th>
                    Tên khóa học
                </th>
                <th>
                    Ảnh khóa học
                </th>
                <th>
                    Giá Cũ
                </th>
                <th>
                    Giảm giá
                </th>
                <th>
                    Giá mới
                </th>
                <th>
                    Cấp độ
                </th> 
                <th>
                    Giảng viên
                </th>
                <th>
                    Danh mục
                </th>
                <th></th>
            </tr>


            <tr>
                <td>
                    {{$product->TenKhoaHoc}}
                </td>
                <td>
                    <img src="/images/khoahoc/{{$product->AnhKhoaHoc}}" height="200" width="150" />
                </td>
                <td>
                    {{$product->GiaCu}}
                </td>
                <td>
                    {{$product->GiamGia}}
                </td>
                <td>
                    {{$product->GiaMoi}}
                </td>
                <td>
                    {{$product->TenCapDo}}
                </td>
                <td>
                    {{$product->TenGiangVien}}
                </td>
                <td>
                    {{$product->tendm}}
                </td>
    
                <td style="display:flex;justify-content: space-between;">
                    <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/khoahoc/edit/{{$product->id}}"> </a>
                    <a class="btn btn-primary fa-solid fa-eye" href="/admin/product/detail/{{$product->id}}"> </a>
                    <form action="{{route('delete',$product->id)}}"  method="POST">
                        @csrf
                        @method('DELETE')
                       <button type="submit" class="btn btn-success fa-solid fa-trash" > </a>
                    </form>
    
                </td>

            </tr>
        </table>

        @if(isset($baihocs))
            <h4 class="text-primary mt-5">Các bài học của khóa học</h4>
            <p class="btn btn-primary">
                <a href="/admin/baihoc/create" class="text-light" style="text-decoration:none"> Thêm bài học mới  </a>
            </p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên bài học</th>
                        <th>Tên khóa học</th>
                        <th>Thời gian hoàn thành</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($baihocs as $baihoc)
                        <tr>
                            <td>{{$baihoc->TenBaiHoc}}</td>
                            <td>{{$baihoc->khoahoc->TenKhoaHoc}}</td>
                            <td>{{$baihoc->ThoiGianHoanThanh}}</td>
                            <td>
                                <a class="btn btn-warning" href="/admin/baihoc/edit/{{$baihoc->MaBaiHoc}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a class="btn btn-primary" href="/admin/baihoc/details/{{$baihoc->MaBaiHoc}}"><i class="fa-solid fa-circle-info"></i></a>
                                <button class="btn btn-danger" ng-click="DeleteOrderDetail({{$baihoc->MaBaiHoc}})"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif


        @if(isset($binhluans))
            <h4 class="text-primary mt-5">Các bình luận của khóa học</h4>
            <p class="btn btn-primary">
                <a href="/admin/binhluan/create" class="text-light" style="text-decoration:none"> Thêm bình luận mới  </a>
            </p>
            <table class="table">
                <tr>
                    
                    <th>
                        Tên khóa học
                    </th>
                    <th>
                        Tên người dùng
                    </th>
                    <th>
                        Thời gian
                    </th>
                    
                    <th></th>
                </tr>
    
                @foreach ($binhluans as $binhluan)
                <tr>
                    
                    <td>
                        {{$binhluan->TenKhoaHoc}}
                    </td>
                    <td>
                        {{$binhluan ->TenNguoiDung}}
                    </td>
                    <td>
                        {{$binhluan->ThoiGian}}
                    </td>
                    
                    <td>
                        <a class="btn btn-warning" ng-href="/admin/binhluan/edit/{{$binhluan->MaBinhLuan}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-primary" ng-href="/Admin/Games/Details/"><i class="fa-solid fa-circle-info"></i></a>
                        <a class="btn btn-danger"  ng-click="DeleteOrderDetail(data.MaGame)"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
    
                @endforeach
            </table>
        </div>
        
        <div class="d-flex ">
            <a href="/admin/khoahoc/edit/{{$product->id}}" class="btn btn-success mr-5">Sửa khóa học</a>
            <a href="/admin/donhang/index" class="btn btn-primary ml-5">Quay lại quản lý đơn hàng</a>
    
        </div>
        @endif

</div>


@endsection