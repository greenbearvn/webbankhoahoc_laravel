@extends('Admin.Layout.base')
@section('content')
<div ng-controller="DonHangDetail" >
    <div id="myDiv">
        <h3>Bài học</h3>

        <table class="table">
            <tr>
                
                <th>
                    STT
                </th>
                <th>
                    Tên khóa học
                </th>
                
                <th>
                    Tên bài học
                </th>
                <th>
                    Thời gian hoàn thành
                </th>
                
                <th></th>
            </tr>


            <tr>
                <td>
                    {{$baihoc->TenKhoaHoc}}
                </td>
               
                <td>
                    {{$baihoc->TenBaiHoc}}
                </td>
                <td>
                    {{$baihoc->ThoiGianHoanThanh}}
                </td>
                
                <td style="display:flex;justify-content: space-between;">
                    <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/baihoc/edit/{{$baihoc->MaBaiHoc}}"> </a>
                    <a class="btn btn-primary fa-solid fa-eye" href="/admin/baihoc/detail/{{$baihoc->MaBaiHoc}}"> </a>
                    <form action="{{route('delete',$baihoc->MaBaiHoc)}}"  method="POST">
                        @csrf
                        @method('DELETE')
                       <button type="submit" class="btn btn-success fa-solid fa-trash" > </a>
                    </form>
    
                </td>

            </tr>
        </table>


        <h4 class="text-primary mt-5">Các video của khóa học</h4>
        <p class="btn btn-primary">
            <a href="/admin/video/create" class="text-light" style="text-decoration:none"> Thêm video mới  </a>
        </p>
        <table class="table">
            <tr>
                <th>
                    Tên bài học
                </th>
                <th>
                    Tên video
                </th>
                <th>
                    Tình trạng
                </th>
                <th>
                    Thời lượng video
                </th>
                <th></th>
            </tr>

            @foreach ($videos as $video)
            <tr >
                
                <td>
                    {{$video->TenBaiHoc}}
                </td>
                <td>
                    {{$video ->TenVideo}}
                </td>
                <td>
                    {{$video->TinhTrang}}
                </td>
                <td>
                    {{$video->ThoiLuongVideo}}
                </td>

                <td>
                    <a class="btn btn-warning" href="/admin/video/edit/{{$video->MaVideo}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-primary" ng-href="/Admin/Games/Details/"><i class="fa-solid fa-circle-info"></i></a>
                    <a class="btn btn-danger"  ng-click="DeleteOrderDetail(data.MaGame)"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>

            @endforeach
        </table>

    </div>
    
    <div class="d-flex ">
        <a href="/admin/baihoc/edit/{{$baihoc->MaBaiHoc}}" class="btn btn-success mr-5">Sửa bài học</a>
        <a href="/admin/donhang/index" class="btn btn-primary ml-5">Quay lại quản lý bài học</a>

    </div>
</div>


@endsection