@extends('Admin.Layout.base')
@section('content')
    <h3 class="text-capitalize ml-3">Tạo cấp độ mới</h3>
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
        <form  action="{{ route('baihoc.store') }}" method="POST" >
            @csrf
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10">
                    <h6>Khoa hoc</h6>
                    <div class="input-group mb-3">
                        <select class="form-control" name="MaKhoaHoc" required>
                            @foreach ($khoahocs as $khoahoc)
                            <option value="{{$khoahoc->id}}">{{$khoahoc->TenKhoaHoc}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('id'))
                            <span class="text-danger">{{ $errors->first('id') }}</span>
                        @endif
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Ten bai hoc</h6>
                        <input type="text" class="form-control"  name="TenBaiHoc"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Thoi gian hoan thanh</h6>
                        <input type="text" class="form-control"  name="ThoiGianHoanThanh"  />
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="Tạo" class="btn btn-success" />
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-danger" href="/admin/baihoc/index">
                            Quay lại 
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

