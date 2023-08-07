@extends('Front.Layouts.layout')
@section('content')

<div id="apus-main-content" ng-controller="LessionDetail">
   <div class="lp-archive-courses">
      <div id="popup-course" class="course-summary">
         <input type="checkbox" id="sidebar-toggle"/>
         <div id="popup-header">
            <div class="popup-header__inner">
               <h2 class="course-title">
                  <a href="https://demoapus1.com/educrat/learnpress/course/learn-3d-modelling-and-design-for-beginners/">{{$khoahoc->TenKhoaHoc}}</a>
               </h2>
            </div>
            <a href="{{route('course.detail',$khoahoc->id)}}" class="back-course">
            <i class="fa fa-times"></i>
            </a>
         </div>
         <div id="popup-sidebar">
            <form method="post" class="search-course" action="{{route('lession.search',$khoahoc->id)}}">
                @csrf
                @method('GET')

               <input type="text" name="search" class="form-control"  placeholder="Tìm kiếm tên bài học...">
               <button name="submit"></button>
            </form>

            <div class="course-curriculum box-info-white" id="learn-press-course-curriculum">
               <h3 class="title">Bài học</h3>
               @foreach($baihocs as $baihoc)
                  <div class="curriculum-scrollable" >
                     <ul class="curriculum-sections">
                        <li class="section" id="section-first-step-{{$baihoc->MaBaiHoc}}" data-id="first-step-{{$baihoc->MaBaiHoc}}" data-section-id="{{$baihoc->MaBaiHoc}}">
                           <div class="section-header" ng-click="ShowVideos({{$baihoc->MaBaiHoc}})">
                              <div class="section-left">
                                 <h5 class="section-title">{{$baihoc->TenBaiHoc}}</h5>
                                 <span class="section-toggle">
                                    <i class="fas fa-caret-down"></i>
                                    <i class="fas fa-caret-up"></i>
                                 </span>
                              </div>
                           </div>
                           <ul class="section-content">
                            <div class="inner">
                              <li class="course-item course-item-lp_lesson course-item-4946 current item-free" data-id="4946" ng-repeat="i in videos | filter: {MaBaiHoc: {{$baihoc->MaBaiHoc}}}">
                                <a class="section-item-link" ng-click="ShowInforVideo(i.MaVideo)" >
                                  <span class="item-name">@{{i.TenVideo}}</span>
                                  <div class="course-item-meta">
                                    <span class="item-meta course-item-status" title="Unread"></span>
                                  </div>
                                </a>
                              </li>
                            </div>
                          </ul>
                        </li>
                     </ul>
                  </div>
               @endforeach
               
         </div>
         
      </div>
      <div id="popup-content">
        <div id="learn-press-content-item">
           <div class="content-item-scrollable">
              <div class="content-item-wrap">
                 <div class="content-item-summary">
                    <h3 class="course-item-title lesson-title">@{{video.TenVideo}}</h3>
                    <div class="content-item-description lesson-description">
                        <p>@{{video.LinkVideo}}</p>
                     </div>
                    <div class="content-item-description lesson-description">
                           <p>@{{video.NoiDungVideo}}</p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
   </div>
</div>

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>

            var myApp = angular.module("myApp", []).config(['$qProvider', function ($qProvider) {
                $qProvider.errorOnUnhandledRejections(false);
            }]);

            var url = window.location.pathname;
            var id = url.substring(url.lastIndexOf('/') + 1);

            myApp.controller("LessionDetail", LessionDetail);
            function LessionDetail($scope, $http) {

                

                $scope.ShowVideos = function (id) {
                    $http({
                        method: "GET",
                        url: "/lession/course/videos/" + Number(id)
                    }).then(function (res) {
                        $scope.videos = res.data;
                        console.log($scope.videos)
                    });
                }

                $http({
                    method: "GET",
                    url:  "/lession/course/lessions/" + Number(id)
                }).then(function (res) {
                    $scope.lessions = res.data;
                    console.log($scope.lessions)
                });

                // $http({
                //     method: "GET",
                //     url: localhost + "/api/Detail/GetTeacherOfCourse/" + Number(id)
                // }).then(function (res) {
                //     $scope.teacher = res.data;
                //     console.log($scope.teacher)
                // });

                $scope.ShowInforVideo = function (id) {
                    console.log("con cac")
                    $http({
                        method: "GET",
                        url: "/lession/course/videos/detail/" + Number(id)
                    }).then(function (res) {
                        $scope.video = res.data;
                        console.log($scope.video)
                    });
                }
            }

            
        </script>

    @endsection

@endsection

