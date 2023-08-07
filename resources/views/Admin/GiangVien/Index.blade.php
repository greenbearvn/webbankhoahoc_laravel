@extends('Admin.Layout.base')
@section('content')

<h3>Quản lý giảng viên</h3>

<div class="container">
    <div class="d-flex justify-content-between">
        <p class="btn btn-primary">
            <a href="/admin/giangvien/create" class="text-light" style="text-decoration:none"> Thêm giảng viên mới  </a>
        </p>
        <div class="form-group w-25" >
            <form class="input-group" action="{{ route('giangvien.sort') }}" method="GET" style="display:flex">   
                <select class="form-control" name="sort">
                    <option value="iddesc">Sắp xếp theo mã giảm dần</option>
                    <option value="idasc">Sắp xếp theo mã tăng dần</option>
                </select>
                <button type="submit" class="btn btn-primary">Sắp xếp</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <form class="input-group" action="{{ route('giangvien.search') }}" method="GET">   
            <input type="text" class="form-control" placeholder="Tìm kiếm khóa học ..." name="search">
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
                    Tên giảng viên
                </th>
                <th>
                    Email
                </th>
                <th>
                    Số điện thoại
                </th>
                <th>
                    Ảnh đại diện
                </th>
                
                <th>
                    Danh mục
                </th>

                
            </tr>
        </thead>
        <tbody>
            @foreach ($giangviens as $giangvien)
            <tr >
                <td>
                    {{$loop->index + 1}}
                </td>
                <td>
                    {{$giangvien->TenGiangVien}}
                </td>
                <td>
                    {{$giangvien->Email}}
                </td>
                <td>
                    {{$giangvien->SoDienThoai}}
                </td>
                <td>
                    <img src="/images/giangvien/{{ $giangvien->AnhDaiDien }}" height="200" width="150" />
                </td>
      
                <td>
                    {{$giangvien->tendm}}
                </td>

                
                <td style="display:flex">
                    <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/giangvien/edit/{{$giangvien->MaGiangVien}}"> </a>
                    <a class="btn btn-primary fa-solid fa-eye" href="/admin/giangvien/detail/{{$giangvien->MaGiangVien}}"> </a>
                    <form action="{{route('delete',$giangvien->MaGiangVien)}}"  method="POST">
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
        {{ $giangviens->links() }}
    </div>
</div>

@endsection

