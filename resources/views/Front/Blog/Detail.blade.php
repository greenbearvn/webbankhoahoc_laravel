@extends('Front.Layouts.layout')
@section('content')
   <div id="apus-main-content" ng-controller="BlogDetail">
      <section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb ">
         <div class="container">
            <div class="wrapper-breads">
               <div class="wrapper-breads-inner">
                  <ol class="breadcrumb">
                     <li><a href="https://demoapus1.com/educrat/learnpress">Home</a>  </li>
                     <li><a href="https://demoapus1.com/educrat/learnpress/category/gym/">{{$blog->tendm}}</a></li>
                     <li class="hidden"><span class="active">{{$blog->TenBaiViet}}</span></li>
                  </ol>
               </div>
            </div>
         </div>
      </section>
      <section id="main-container" class="main-content main-content-detail container inner only-main">
         <div class="row">
            <div id="main-content" class="col-12 ">
               <div id="primary" class="content-area">
                  <div id="content" class="site-content detail-post" role="main">
                     <div class="inner-content-bottom">
                        <article id="post-3860" class="post-3860 post type-post status-publish format-standard has-post-thumbnail hentry category-gym category-primary tag-learn tag-lms tag-online">
                           <div class="inner">
                              <div class="entry-content-detail ">
                                 <div class="single-info">
                                    <div class="inner-detail">
                                       <div class="top-detail-info">
                                          <div class="list-categories"><a href="https://demoapus1.com/educrat/learnpress/category/gym/" class="categories-name"> {{$blog->tendm}}</a>, <a href="https://demoapus1.com/educrat/learnpress/category/primary/" class="categories-name">Primary</a></div>
                                          <h1 class="detail-title">
                                          {{$blog->TenBaiViet}}                                
                                          </h1>
                                          <div class="date">{{$blog->NgayDang}}</div>
                                       </div>
                                    </div>
                                    <div class="entry-thumb">
                                       <div class="post-thumbnail">
                                          <div class="image-wrapper"><img width="1550" height="720" src="/images/blog/{{$blog->AnhMinhHoa}}" class="attachment-full size-full" alt="{{$blog->TenBaiViet}}"  /></div>
                                       </div>
                                    </div>
                                    <div class="inner-detail">
                                       <div class="entry-description">
                                          
                                       </div>
                                       <div class="tag-social d-md-flex align-items-center">
                                          
                                          <div class="ms-auto">
                                             <span class="entry-tags-list"><a href="https://demoapus1.com/educrat/learnpress/tag/learn/"> {{$blog->tendm}}</a></span>                                    
                                          </div>
                                       </div>
                                       <div class="author-info">
                                          <div class="about-container d-flex align-items-center">
                                             
                                             <!-- .author-avatar -->
                                             <div class="description">
                                                <h4 class="author-title">
                                                   <a href="https://demoapus1.com/educrat/learnpress/author/admin/">
                                                   {{$blog->TenNguoiDung}}</a>
                                                
                                             </div>
                                          </div>
                                       </div>
                                       {{-- <nav class="navigation post-navigation" aria-label="Posts">
                                          <h2 class="screen-reader-text">Post navigation</h2>
                                          <div class="nav-links">
                                             <div class="nav-previous">
                                                <a href="https://demoapus1.com/educrat/learnpress/how-to-design-a-simple-yet-unique-and-memorable-brand-identity/" rel="prev">
                                                   <div class="inner inner-left">
                                                      <i class="flaticon-back"></i>
                                                      <div class="navi">Prev</div>
                                                      <span class="title-direct">How to design a simple, yet unique and memorable brand identity</span>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                       </nav> --}}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </article>
                        <div class="inner-detail">
                           
                           <!-- .comments-area -->
                        </div>
                     </div>
                  </div>
                  <!-- #content -->
               </div>
               <!-- #primary -->
            </div>
         </div>
      </section>
      <div class="wrapper-posts-related">
         <div class="container">
            <div class="related-posts">
               <h4 class="title">
                  Related Posts            
               </h4>
               <div class="related-posts-content  widget-content">
                  <div class="slick-carousel " data-carousel="slick" data-large="2" data-medium="2" data-small="1" data-items="4" data-pagination="true" data-nav="false">
                     <div class="item" ng-repeat="i in blogs">
                        <article class="post post-layout post-grid post-3858 type-post status-publish format-standard has-post-thumbnail hentry category-gym category-high-school tag-courses tag-learn tag-lms">
                           <div class="top-image">
                              <figure class="entry-thumb">
                                 <a class="post-thumbnail" href="https://demoapus1.com/educrat/learnpress/how-to-design-a-simple-yet-unique-and-memorable-brand-identity/" aria-hidden="true">
                                    <div class="image-wrapper"><img width="410" height="335" src="/images/blog/@{{i.AnhMinhHoa}}" class="attachment-410x335x1x1 size-410x335x1x1" alt="" /></div>
                                 </a>
                              </figure>
                           </div>
                           <div class="col-content">
                              <div class="list-categories"><a href="https://demoapus1.com/educrat/learnpress/category/gym/" class="categories-name">@{{i.TenDanhMuc}}</a></div>
                              <h4 class="entry-title">
                                 <a href="https://demoapus1.com/educrat/learnpress/how-to-design-a-simple-yet-unique-and-memorable-brand-identity/">@{{i.TenBaiViet}}</a>
                              </h4>
                              <div class="date">@{{i.NgayDang}}</div>
                           </div>
                        </article>
                     </div>
                  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


 <p class="madm" style="display:none;" >{{$blog->MaDanhMuc}} </p>

   @section('scripts')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script>

         var myApp = angular.module("myApp", []).config(['$qProvider', function ($qProvider) {
            $qProvider.errorOnUnhandledRejections(false);
         }]);

         myApp.controller("BlogDetail", function ($scope, $http) {
            $scope.madm = document.querySelector('.madm').textContent.trim(); // Remove whitespace

            $http({
               method: "GET",
               url: "/blog/samecategory/" + Number($scope.madm) // Convert to number
            }).then(function (res) {
               $scope.blogs = res.data;
               console.log($scope.blogs);
            });
         });
         
      </script>

   @endsection

 

 @endsection