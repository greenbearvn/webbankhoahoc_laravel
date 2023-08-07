@extends('Admin.Layout.base')
@section('content')

<h3>Quản lý bài viết</h3>

<div class="container">
    <div class="d-flex justify-content-between">
        <p class="btn btn-primary">
            <a href="/admin/blog/create" class="text-light" style="text-decoration:none"> Thêm bài viết mới  </a>
        </p>
        <div class="form-group w-25" >
            <form class="input-group" action="{{ route('blog.sort') }}" method="GET" style="display:flex">   
                <select class="form-control" name="sort">
                    <option value="iddesc">Sắp xếp theo mã giảm dần</option>
                    <option value="idasc">Sắp xếp theo mã tăng dần</option>
                </select>
                <button type="submit" class="btn btn-primary">Sắp xếp</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <form class="input-group" action="{{ route('blog.search') }}" method="GET">   
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
                    Tên bài viết
                </th>
                <th>
                    Ảnh minh họa
                </th>
                <th>
                    Ngày đăng
                </th>
                <th>
                    Danh mục
                </th>
                <th>
                    Người dùng
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr >
                <td>
                    {{$loop->index + 1}}
                </td>
                <td>
                    {{$blog->TenBaiViet}}
                </td>
                <td>
                    <img src="/images/blog/{{$blog->AnhMinhHoa}}" height="200" width="150" />
                </td>
                <td>
                    {{$blog->NgayDang}}
                </td>
                <td>
                    {{$blog->tendm}}
                </td>
                <td>
                    {{$blog->TenNguoiDung}}
                </td>
                <td style="display:flex">
                    <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/blog/edit/{{$blog->MaBaiViet}}"> </a>
                    <a class="btn btn-primary fa-solid fa-eye" href="/admin/product/detail/{{$blog->MaBaiViet}}"> </a>
                    <form action="{{route('delete',$blog->MaBaiViet)}}"  method="POST">
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
        {{ $blogs->links() }}
    </div>
</div>

@endsection

