@extends('Admin.Layout.base')
@section('content')


<h3>Cập nhật thông tin danh muc</h3>
<div >
    <form action="{{ route('update',$danhmuc->madm)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-horizontal">
            <input hidden value="{{$danhmuc->madm}}" name="madm">
            <div class="form-group">
                <div class="col-md-10">
                    <h6>Tên danh mục</h6>
                    <input type="text" class="form-control" value="{{$danhmuc->tendm}}" name="tendm" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10">
                    <h6>Ảnh danh mục</h6>
                    <input type="file" ck-editor="" value="{{$danhmuc->anhdm}}" id="MoTa" name="anhdm" required />
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" value="Cập nhật" class="btn btn-success" />
                    </div>
                </div>
                <div>
                    <a class="btn btn-danger" href="/admin/danhmuc/index">
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection