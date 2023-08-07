@extends('Admin.Layout.base')
@section('content')

<h3>Quản lý cấp độ</h3>

<div class="container">
    <div class="d-flex justify-content-between">
        <p class="btn btn-primary">
            <a href="/admin/capdo/create" class="text-light" style="text-decoration:none"> Thêm cấp độ mới  </a>
        </p>
        <div class="form-group w-25" >
            <form class="input-group" action="{{ route('capdo.sort') }}" method="GET" style="display:flex">   
                <select class="form-control" name="sort">
                    <option value="iddesc">Sắp xếp theo mã giảm dần</option>
                    <option value="idasc">Sắp xếp theo mã tăng dần</option>
                </select>
                <button type="submit" class="btn btn-primary">Sắp xếp</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <form class="input-group" action="{{ route('capdo.search') }}" method="GET">   
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
                    Tên cấp độ
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($capdos as $capdo)
            <tr >
                <td>
                    {{$loop->index + 1}}
                </td>
                <td>
                    {{$capdo->TenCapDo}}
                </td>
                <td style="display:flex">
                    <a class="btn btn-warning fa-solid fa-pencil"  href="/admin/capdo/edit/{{$capdo->MaCapDo}}"> </a>
                    <a class="btn btn-primary fa-solid fa-eye" href="/admin/product/detail/{{$capdo->MaCapDo}}"> </a>
                    <form action="{{route('delete',$capdo->MaCapDo)}}"  method="POST">
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
        {{ $capdos->links() }}
    </div>
</div>

@endsection

