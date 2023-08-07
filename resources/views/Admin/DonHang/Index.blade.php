@extends('Admin.Layout.base')
@section('content')

<h3>Quản lý đơn hàng</h3>

<div class="container">
    <div class="d-flex justify-content-between">
        <p class="btn btn-primary">
            <a href="/admin/donhang/create" class="text-light" style="text-decoration:none"> Thêm đơn hàng mới  </a>
        </p>
        <div class="form-group w-25" >
            <form class="input-group" action="{{ route('baihoc.sort') }}" method="GET" style="display:flex">   
                <select class="form-control" name="sort">
                    <option value="iddesc">Sắp xếp theo mã giảm dần</option>
                    <option value="idasc">Sắp xếp theo mã tăng dần</option>
                </select>
                <button type="submit" class="btn btn-primary">Sắp xếp</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <form class="input-group" action="{{ route('baihoc.search') }}" method="GET">   
            <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="search">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
    <table class="table" >
        <thead>
            <tr>
                <th>
                    STT
                </th>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($donhangs as $donhang)
            <tr >
                <td>
                    {{$loop->index + 1}}
                </td>
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
                <td style="display:flex">
                    <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/donhang/edit/{{$donhang->MaDonHang}}"> </a>
                    <a class="btn btn-primary fa-solid fa-eye" href="/admin/donhang/detail/{{$donhang->MaDonHang}}"> </a>
                    <form action="{{route('delete',$donhang->MaDonHang)}}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success fa-solid fa-trash" > </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $donhangs->links() }}
    </div>
</div>

@endsection

