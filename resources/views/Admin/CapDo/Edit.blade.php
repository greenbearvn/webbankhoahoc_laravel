@extends('Admin.Layout.base')
@section('content')


<h3>Cập nhật thông tin cấp độ</h3>
<div>
    <form action="{{ route('capdo.update', $capdo->MaCapDo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-horizontal">
            <input hidden value="{{ $capdo->MaCapDo }}" name="MaCapDo">
            <div class="form-group">
                <div class="col-md-10">
                    <h6>Tên cấp độ</h6>
                    <input type="text" class="form-control" value="{{ $capdo->TenCapDo }}" name="TenCapDo" required />
                </div>
            </div>

            <div class="d-flex">
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" value="Cập nhật" class="btn btn-success" />
                    </div>
                </div>
                <div>
                    <a class="btn btn-danger" href="/admin/capdo/index">
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection