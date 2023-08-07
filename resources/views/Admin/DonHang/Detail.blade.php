@extends('Admin.Layout.base')
@section('content')
<div ng-controller="DonHangDetail" >
    <div id="myDiv">
        <h3>Đơn hàng</h3>

        <table class="table">
            <tr>
                
                <th>
                    Tên người dùng
                </th>
                <th>
                    Ngày lập
                </th>
                <th>
                    Tình trạng
                </th>
                <th>
                    Tổng tiền
                </th>
                <th></th>
            </tr>


            <tr>
                <td>
                    {{$donhang->TenNguoiDung}}
                </td>
                <td>
                    {{$donhang->NgayLap}}
                </td>
                <td>
                     {{$donhang->TinhTrang}}
                </td>
                <td>
                    {{str_replace(',', '', rtrim(number_format($donhang->Tongtien, 2, ',', '.'), '0'))}} đ
                </td>
                <td>
                    
                </td>

            </tr>


        </table>
        <h4 class="text-primary mt-5">Chi tiết đơn hàng</h4>
        <table class="table">
            <tr>
                
                <th>
                    Tên khóa học
                </th>
                <th>
                    Ảnh khóa học
                </th>
                <th>
                    Giá tiền
                </th>
                <th>
                    Giảng viên
                </th>
                <th></th>
            </tr>

            @foreach ($chitietdonhangs as $chitietdonhang)
            <tr >
                
                <td>
                    {{$chitietdonhang->TenKhoaHoc}}
                </td>
                <td>
                    <img src="/images/khoahoc/{{$chitietdonhang->AnhKhoaHoc}}" width="150" height="200" />
                </td>
                <td>
                    {{str_replace(',', '', rtrim(number_format($chitietdonhang->Gia, 2, ',', '.'), '0'))}} đ
                </td>
                <td>
                    {{$chitietdonhang->TenGiangVien}}
                </td>
                
                
                <td>
                    <a class="btn btn-warning" ng-href="/Admin/Games/Edit/"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-primary" ng-href="/Admin/Games/Details/"><i class="fa-solid fa-circle-info"></i></a>
                    <a class="btn btn-danger"  ng-click="DeleteOrderDetail(data.MaGame)"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
    
    <div class="d-flex ">
        <a ng-href="/Admin/DonHangs/Edit/" class="btn btn-success mr-5">Sửa đơn hàng</a>
        <a href="/admin/donhang/index" class="btn btn-primary ml-5">Quay lại quản lý đơn hàng</a>

    </div>
</div>


@endsection