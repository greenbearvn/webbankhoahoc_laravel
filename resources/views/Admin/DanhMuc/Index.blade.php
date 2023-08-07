@extends('Admin.Layout.base')
@section('content')

<h3>Quản lý danh mục</h3>

<div >
    <div class="d-flex " style="justify-content:space-between;width:98%">
        <p class="btn btn-primary">
            <a href="/admin/danhmuc/create" class="text-light" style="text-decoration:none"> Thêm danh mục mới  </a>
        </p>
        <div class="form-group w-25">
            <select class="form-control" id="filterGame" ng-model="myOrderBy">
                <option value="">--- Sắp xếp danh sách gảm theo ---</option>
                <option value="">-- Sắp xếp danh sách game theo --</option>
                <option value="-MaGame">Sắp xếp theo mã giảm dần</option>
                <option value="MaGame">Sắp xếp theo mã tăng dần</option>
                <option value="-GiaTien">Sắp xếp theo giá giảm dần</option>
                <option value="GiaTien">Sắp xếp theo giá tăng dần</option>
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <form class="input-group" action="{{ route('danhmuc.search') }}" method="GET">   
            <input type="text" class="form-control" placeholder="Tìm kiếm..." name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
    <table class="table" >
        <tr>
            <th>
                STT
            </th>
            <th>
                Tên danh mục
            </th>
            <th>
                Ảnh danh mục
            </th>
        </tr>

        @foreach ($danhmucs as $danhmuc)
        <tr >
            <td>
                {{$loop->index + 1}}
            </td>
            <td>
                {{$danhmuc->tendm}}
            </td>
            <td>
                <img src="/images/danhmuc/{{$danhmuc->anhdm}}" height="200" width="150" />
            </td>
            
            <td style="display:flex;justify-content: normal;">
                <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/danhmuc/edit/{{$danhmuc->madm}}"> </a>
                <a class="btn btn-primary fa-solid fa-eye" href="/admin/danhmuc/detail/{{$danhmuc->madm}}"> </a>
                <form action="{{route('delete',$danhmuc->madm)}}"  method="POST">
                    @csrf
                    @method('DELETE')
                   <button type="submit" class="btn btn-success fa-solid fa-trash" > </a>
                </form>

            </td>
        </tr>
        @endforeach

    </table>
    <div>
        {{ $danhmucs->links() }}
    </div>
</div>

@endsection