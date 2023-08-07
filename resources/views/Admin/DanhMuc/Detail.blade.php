@extends('Admin.Layout.base')
@section('content')
<h2>Details</h2>

<div class="bg-white" ng-controller="DetailGame">
    <h4>Game</h4>
    <hr />
    <dl class="dl-horizontal container">
        <dt>
            Tên danh muc
        </dt>

        <dd>
            {{$danhmuc->tendm}}
        </dd>

        <dt>
            Ảnh danh muc
        </dt>

        <dd>
            {{-- <img ng-src="{{game.AnhGame}}" width="150" height="200" /> --}}
            {{$danhmuc->anhdm}}
        </dd>

        

    </dl>
</div>
{{-- <div class="d-flex">
    <a ng-href="/Admin/Games/Edit/{{game.MaGame}}" class="btn btn-primary ml-1">Sửa thông tin</a>
    <a href="/Admin/Games/Index" class="btn btn-danger ml-1">Quay lại</a>
</div> --}}
@endsection