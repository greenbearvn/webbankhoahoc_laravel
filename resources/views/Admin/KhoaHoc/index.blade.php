@extends('Admin.Layout.base')
@section('content')
@if ($user)
    <div class="alert alert-danger">{{ $user }}</div>
@endif
<h3>Quản lý khóa học</h3>


<div >
    <div class="d-flex " style="justify-content:space-between;width:98%">
        <p class="btn btn-primary">
            <a href="/admin/khoahoc/create" class="text-light" style="text-decoration:none"> Thêm khóa học mới  </a>
        </p>
        <div class="form-group w-25" >
            <form class="input-group" action="{{ route('khoahoc.sort') }}" method="GET" style="display:flex">   
                <select class="form-control" name="sort">
                    <option value="iddesc">Sắp xếp theo mã giảm dần</option>
                    <option value="idasc">Sắp xếp theo mã tăng dần</option>
                    <option value="GiaMoiDESC">Sắp xếp theo giá giảm dần</option>
                    <option value="GiaMoiASC">Sắp xếp theo giá tăng dần</option>
                </select>
                <button type="submit" class="btn btn-primary">Sắp xếp</button>
        </form>
        </div>
    </div>
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
                <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/khoahoc/edit/{{$product->id}}"> </a>
                <a class="btn btn-primary fa-solid fa-eye" href="/admin/khoahoc/detail/{{$product->id}}"> </a>
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