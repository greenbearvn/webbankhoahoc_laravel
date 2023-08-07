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
        <form  action="{{ route('video.update', $video->MaVideo) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="form-horizontal">
                <input hidden value="{{ $video->MaVideo }}" name="MaBaiHoc">
                <div class="form-group">
                    <div class="col-md-10">
                    <h6>Khoa hoc</h6>
                    <div class="input-group mb-3">
                        <select class="form-control" name="MaBaiHoc" value="{{$video->MaBaiHoc}}">
                            <option value="{{$video->MaBaiHoc}}">{{$video->TenBaiHoc}}</option>
                            @foreach ($baihocs as $baihoc)
                            <option value="{{$baihoc->MaBaiHoc}}">{{$baihoc->TenBaiHoc}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('MaBaiHoc'))
                            <span class="text-danger">{{ $errors->first('MaBaiHoc') }}</span>
                        @endif
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Ten video</h6>
                        <input type="text" class="form-control"  name="TenVideo"  value="{{$video->TenVideo}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Link video</h6>
                        <input type="text" class="form-control"  name="LinkVideo"  value="{{$video->LinkVideo}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Thoi luong video</h6>
                        <input type="text" class="form-control"  name="ThoiLuongVideo" value="{{$video->ThoiLuongVideo}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        <h6 >Tinh trang</h6>
                        <select class="form-control" name="TinhTrang" value="{{$video->TinhTrang}}">
                            <option value="{{$video->TinhTrang}}">{{$video->TinhTrang}}</option>
                            <option value="1">True</option>
                            <option value="0">False</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" value="Cap nhat" class="btn btn-success" />
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

