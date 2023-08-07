@extends('Admin.Layout.base')
@section('content')

<h3>Quản lý cấp độ</h3>

<div class="container">
    <div class="d-flex justify-content-between">
        <p class="btn btn-primary">
            <a href="/admin/baihoc/create" class="text-light" style="text-decoration:none"> Thêm cấp độ mới  </a>
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
                    Khóa học
                </th>
                <th>
                    Tên bài học
                </th>
                <th>
                    Thời gian hoàn thành
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($baihocs as $baihoc)
            <tr >
                <td>
                    {{$loop->index + 1}}
                </td>
                <td>
                    {{$baihoc->TenKhoaHoc}}
                </td>
                <td>
                    {{$baihoc->TenBaiHoc}}
                </td>
                <td>
                    {{$baihoc->ThoiGianHoanThanh}}
                </td>
                <td style="display:flex">
                    <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/baihoc/edit/{{$baihoc->Mabaihoc}}"> </a>
                    <a class="btn btn-primary fa-solid fa-eye" href="/admin/product/detail/{{$baihoc->Mabaihoc}}"> </a>
                    <form action="{{route('delete',$baihoc->Mabaihoc)}}"  method="POST">
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
        {{ $baihocs->links() }}
    </div>
</div>

@endsection

