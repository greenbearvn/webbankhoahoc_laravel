@extends('Admin.Layout.base')
@section('content')
<div ng-controller="Create">
    <form action="{{ route('adminCart.save') }}" method="POST">
        <div class="form-horizontal container">
            <h4>Đơn hàng</h4>
            <hr />
            <div class="form-group">

                <div class="col-md-10">
                    <h6>
                        Tên nguoi dung
                    </h6>
                    <select class="custom-select" name="MaNguoiDung">
                        @foreach($nguoidungs as $nguoidung )
                        <option  value="{{$nguoidung->MaNguoiDung}}">{{$nguoidung->TenNguoiDung}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-10">
                    <h6>
                        Ngay Lap
                    </h6>
                
                    <input type="date" name="NgayLap" class="form-control" />

                    
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-10">
                    <h6>
                        Tinh Trang
                    </h6>
                    <select name="TinhTrang" class="custom-select">
                        <option value="">--- Chọn trạng thái đơn hàng ---</option>
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>   
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-10">
                    <h6>
                        Ngay Lap
                    </h6>
                
                    <input type="text" name="Tongtien" class="form-control" value="${{ Cart::getTotal() }}"/>

                    
                </div>
            </div>

        </div>

        <hr />
        <h4>Thêm chi tiết don hang</h4>
        <hr />
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
                    Giá sau cung
                </th>
               


                <th></th>
            </tr>

            @foreach ($cartItems as $item)
            <tr  >
                <td>
                    {{$loop->index + 1}}
                </td>
                <td>
                    {{$item->name}}
                </td>
                
                <td>
                    <img src="/images/khoahoc/{{$item->attributes->image}}" height="200" width="150" />
                </td>
                <td>

                    {{str_replace(',', '', rtrim(number_format($item->price, 2, ',', '.'), '0'))}} đ
                </td>

                <td>
                    <form action="{{ route('adminCart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <button  class="btn btn-success fa-solid fa-trash"></button>
                    </form>
             
                </td>

            </tr>
        @endforeach
        </table>
        <div class="font-weight-bold text-center">Tổng tiền: <div class="text-danger font-weight-bold" id="totalMoney">{{str_replace(',', '', rtrim(number_format(Cart::getTotal(), 2, ',', '.'), '0'))}} đ</div></div> 

        <br />
        <div class="d-flex">
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Lưu thông tin" class="btn btn-success" />
                </div>
            </div>
            <div class="col-md-offset-2 col-md-10">
                <a href="/admin/donhang/index" class="btn btn-danger">Quay về đơn hàng</a>
            </div>
            <div class="col-md-offset-2 col-md-10">
                <form  action="{{ route('adminCart.clear') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Clear Cart</button>
                </form>
            </div>
            
        </div>
    </form>

    

    <hr />
    <h4> Danh sách khoa hoc</h4>
    <div class="d-flex justify-content-end">
        <form class="input-group" action="{{ route('khoahoc.search') }}" method="GET">   
            <input type="text" class="form-control" placeholder="Search COursce" name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <table class="table" >
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
                Danh muc
            </th>
        </tr>

        @foreach ($products as $product)
        <tr >
            <td>
                {{$loop->index + 1}}
            </td>
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
                <form action="{{ route('adminCart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <input type="hidden" value="{{ $product->TenKhoaHoc }}" name="makh">
                    <input type="hidden" value="{{ $product->AnhKhoaHoc}}" name="image">
                    <input type="hidden" value="{{ $product->GiaMoi }}"  name="giamoi">
                    <input type="hidden" value="1" name="quantity">
                    <button type="submit" class="tn btn-primary fa-solid fa-plus"></button>
                 </form>
                <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/product/edit/{{$product->id}}"> </a>
                <a class="btn btn-primary fa-solid fa-eye" href="/admin/product/detail/{{$product->id}}"> </a>
                <form action="{{route('delete',$product->id)}}"  method="POST">
                    @csrf
                    @method('DELETE')
                   <button type="submit" class="btn btn-success fa-solid fa-trash" > </a>
                </form>

            </td>
            
        </tr>
        @endforeach

    </table>
    
    <div>
        {{ $products->links() }}
    </div>
    

</div>
@endsection
