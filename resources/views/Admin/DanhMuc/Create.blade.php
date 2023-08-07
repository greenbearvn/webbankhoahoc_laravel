@extends('Admin.Layout.base')
@section('content')
    <h3 class="text-capitalize ml-3">Tạo sản phẩm mới</h3>
    <div ng-controller="Create">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form  action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Tên danh muc</h6>
                        <input type="text" class="form-control"  name="tendm"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6>Ảnh danh muc</h6>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="anhdm"   id="AnhGame" >
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="Tạo" class="btn btn-success" />
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-danger" href="/Admin/Games/Index">
                            Quay lại 
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

