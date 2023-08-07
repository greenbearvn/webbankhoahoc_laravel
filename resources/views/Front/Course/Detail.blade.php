
@extends('Front.Layouts.layout')
@section('content')
<div id="wrapper-container" class="wrapper-container " ng-controller="DetailView">
         <div id="apus-main-content">
            <div class="course-header default v1">
               <div class="container">
                  <div class="breadcrumbs-simple">
                     <ol class="breadcrumb">
                        <li><a href="https://demoapus1.com/educrat/learnpress">Trang chủ</a>  </li>
                        <li><a href="https://demoapus1.com/educrat/learnpress//course/">Khóa học</a></li>
                        <li><span class="active">{{$khoahoc->TenKhoaHoc}}</span></li>
                     </ol>
                  </div>
                  <div class="inner-default">
                     <div class="col-xl-8">
                        <div class="course-header-left">
                           <div class="course-category">
                              <a class="course-category-item" href="https://demoapus1.com/educrat/learnpress/course-category/social-sciences/">{{$khoahoc->tendm}}</a>
                           </div>
                           <h2 class="title">{{$khoahoc->TenKhoaHoc}}</h2>
                           <div class="excerpt">
                              {{$khoahoc->MoTaNgan}}
                           </div>
                           <div class="course-header-meta">
                              <!-- rating -->
                              <div class="rating">
                                 <div class="wrapper_rating_avg d-flex align-items-center">
                                    <span class="rating_avg">4.7</span>
                                    <div class="review-stars-rated-wrapper">
                                       <div class="review-stars-rated">
                                          <ul class="review-stars">
                                             <li><span class="fa fa-star"></span></li>
                                             <li><span class="fa fa-star"></span></li>
                                             <li><span class="fa fa-star"></span></li>
                                             <li><span class="fa fa-star"></span></li>
                                             <li><span class="fa fa-star"></span></li>
                                          </ul>
                                          <ul class="review-stars filled"  style="width: 93.4%" >
                                             <li><span class="fa fa-star"></span></li>
                                             <li><span class="fa fa-star"></span></li>
                                             <li><span class="fa fa-star"></span></li>
                                             <li><span class="fa fa-star"></span></li>
                                             <li><span class="fa fa-star"></span></li>
                                          </ul>
                                       </div>
                                       <span class="nb-review">(3)</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="course-student-number course-meta-field">
                                 <i class="flaticon-online-course-1"></i>
                                 {{-- {{course.users}}                          <span>Enrolled</span> --}}
                              </div>
                              <!-- time -->
                              <div class="course-duration course-meta-field">
                                 <i class="flaticon-clock"></i>
                                 {{$khoahoc->ThoiLuongKhoaHoc}}                       
                              </div>
                           </div>
                           <div class="course-header-bottom">
                              <div class="lp-course-author d-flex align-items-center">
                                 <div class="course-author__pull-left d-flex align-items-center justify-content-center">
                                    <img alt="Ali Tufan" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads//learn-press-profile/2/63d287ea071d7c542c93366748a91fbc.jpeg" class="avatar avatar-450 photo" height="495" width="450" />                            
                                 </div>
                                 <div class="author-title"><a href="https://demoapus1.com/educrat/learnpress/lp-profile/alitufan/"><span>{{$khoahoc->TenGiangVien}}</span></a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <section id="main-container" class="inner">
               <div class="claerfix single-content-course v1 container">
                  <div class="row">
                     <div id="main-content" class="col-12">
                        <div id="primary" class="content-area">
                           <div id="content" class="site-content detail-course" role="main">
                              <div class="row">
                                 <div class="col-lg-8 col-12">
                                    <div class="lp-archive-courses">
                                       <div id="learn-press-course" class="course-summary">
                                          <div class="course-content course-summary-content">
                                             <div class="lp-entry-content apus-lp-content-area" style="display:flex">
                                                <ul id="course-tabs-spy" class="course-single-tab nav nav-pills sticky-top">
                                                   <li class="nav-item course-nav course-nav-tab-overview">
                                                      <a class="nav-link active" href="#tab-overview-id">Tổng quan</a>
                                                   </li>
                                                   <li class="nav-item course-nav course-nav-tab-curriculum">
                                                      <a class="nav-link" href="#tab-curriculum-id">Mục lục</a>
                                                   </li>
                                                   <li class="nav-item course-nav course-nav-tab-instructor">
                                                      <a class="nav-link" href="#tab-instructor-id">Giảng viên</a>
                                                   </li>
                                                   <li class="nav-item course-nav course-nav-tab-reviews">
                                                      <a class="nav-link" href="#tab-reviews-id">Bình luận</a>
                                                   </li>
                                                </ul>
                                                <div class="course-tabs-scrollspy">
                                                   <div class="course-panel" id="tab-overview-id">
                                                      <div class="content">
                                                         <div class="course-description box-info-white" id="learn-press-course-description">
                                                            <h3 class="title">Mô tả khóa học</h3>
                                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                                            <p>Aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto. Sam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi.</p>
                                                            
                                                           
                                                            
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="course-panel" id="tab-curriculum-id">
                                                        <div class="content">
                                                            <div class="course-curriculum box-info-white" id="learn-press-course-curriculum">
                                                                <h3 class="title">Mục lục</h3>
                                                                
                                                                @foreach($baihocs as $baihoc)
                                                                <div class="curriculum-scrollable" >
                                                                    <ul class="curriculum-sections">
                                                                      <li class="section" id="section-first-step-{{$baihoc->MaBaiHoc}}" data-id="first-step-{{$baihoc->MaBaiHoc}}" data-section-id="{{$baihoc->MaBaiHoc}}">
                                                                        <div class="section-header" ng-click="ListLession({{$baihoc->MaBaiHoc}})">
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
                                                                              <a class="section-item-link" href="/course/videos/{{$khoahoc->id}}" >
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
                                                    </div>
                                                   <div class="course-panel" id="tab-instructor-id">
                                                      <div class="content">
                                                         <div class="course-detail-author box-info-white">
                                                            <h3 class="title">Giang Vien</h3>
                                                            <div class="lp-course-detail-author m-0 d-sm-flex align-items-sm-center">
                                                               <div class="flex-shrink-0">
                                                                  <div class="author-image d-flex align-items-center justify-content-center">
                                                                     <img alt="Ali Tufan" src="/images/giangvien/{{$giangvien->AnhDaiDien}}" class="avatar avatar-450 photo" height="495" width="450" />			
                                                                  </div>
                                                               </div>
                                                               <div class="course-author-infomation flex-grow-1">
                                                                  <h4 class="course-author-title"><a href="https://demoapus1.com/educrat/learnpress/lp-profile/alitufan/"><span>{{$giangvien->TenGiangVien}}</span></a></h4>
                                                                  <div class="job-title">{{$giangvien->tendm}}</div>
                                                                  <div class="author-top-content">
                                                                     
                                                                     <div class="nb-students">
                                                                        <i class="flaticon-online-learning-5"></i>
                                                                        {{-- @{{teacher.student}} Students	    		 --}}
                                                                     </div>
                                                                     <div class="nb-course">		    			
                                                                        <i class="flaticon-play-1"></i>		
                                                                        {{-- @{{teacher.course}} Courses	    		 --}}
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="author-description">
                                                                {{$giangvien->MoTa}}
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="course-panel" id="tab-reviews-id">
                                                      <div class="content">
                                                         <div id="reviews">
                                                            
                                                            <div id="comments" class="box-info-white comments-course">
                                                               <h3 class="title">Reviews <small>(3)</small></h3>
                                                               <ol class="comment-list">
                                                                @foreach ($binhluans as $binhluan)
                                                                  <li class="comment byuser comment-author-admin even thread-even " id="li-comment-29" >
                                                                     <div id="comment-29" class="the-comment">
                                                                        <div class="comment-box">
                                                                           <div class="inner-left">
                                                                              <div class="d-flex flex-nowrap">
                                                                                 <h3 class="name-comment">{{$binhluan->TenNguoiDung}}</h3>
                                                                                 <div class="date">
                                                                                    {{$binhluan->ThoiGian}}				
                                                                                 </div>
                                                                              </div>
                                                                              
                                                                           </div>
                                                                           <div itemprop="description" class="comment-text">
                                                                              <p>{{$binhluan->NoiDung}}	</p>
                                                                           </div>
                                                                           
                                                                        </div>
                                                                     </div>
                                                                  </li>
                                                                  @endforeach
                                                               </ol>
                                                            </div>
                                                            <div id="review_form_wrapper" class="commentform box-info-white">
                                                               <div class="reply_comment_form hidden">
                                                                  <div class="commentform reset-button-default">
                                                                     <div class="clearfix">
                                                                        <div id="respond" class="comment-respond">
                                                                           <h4 class="title comment-reply-title">Reply comment <small><a rel="nofollow" id="cancel-comment-reply-link" href="/educrat/learnpress/course/learn-figma-ui-ux-design-essential-training/#respond" style="display:none;">Cancel reply</a></small></h4>
                                                                           <form action="https://demoapus1.com/educrat/learnpress/wp-comments-post.php" method="post" id="commentform" enctype="multipart/form-data" class="comment-form-theme" novalidate>
                                                                              <div class="row">curriculum-scrollable
                                                                                 <div class="col-12 col-sm-6">
                                                                                    <div class="form-group"><label>Name</label>
                                                                                       <input id="author" class="form-control" placeholder="Your Name" name="author" type="text" value="" size="30" aria-required="true" />
                                                                                    </div>
                                                                                 </div>
                                                                                 <div class="col-12 col-sm-6">
                                                                                    <div class="form-group"><label>Email</label>
                                                                                       <input id="email" placeholder="your@mail.com" class="form-control" name="email" type="text" value="" size="30" aria-required="true" />
                                                                                    </div>
                                                                                 </div>
                                                                                 <div class="col-12 col-sm-6 d-none">
                                                                                    <div class="form-group"><label>Website</label>
                                                                                       <input id="url" name="url" placeholder="Your Website" class="form-control" type="text" value=""  />
                                                                                    </div>
                                                                                 </div>
                                                                              </div>
                                                                              <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" /> <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p>
                                                                              <div class="form-group"><label>Reviews</label><textarea placeholder="Write Reviews" id="comment" class="form-control" name="comment" cols="45" rows="5" aria-required="true" placeholder="Write Reviews"></textarea></div>
                                                                              <p class="form-submit"><input name="submit" type="submit" id="submit" class="btn btn-theme" value="Submit" /> <input type='hidden' name='comment_post_ID' value='4671' id='comment_post_ID' />
                                                                                 <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                                                              </p>
                                                                              <input type="hidden" name="comment-post-item-course" value="4671" />
                                                                           </form>
                                                                        </div>
                                                                        <!-- #respond -->
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div id="review_form">
                                                                  <div class="commentform reset-button-default">
                                                                     <div class="clearfix">
                                                                        <div id="respond" class="comment-respond">
                                                                           <h4 class="title comment-reply-title">Add a review <small><a rel="nofollow" id="cancel-comment-reply-link" href="/educrat/learnpress/course/learn-figma-ui-ux-design-essential-training/#respond" style="display:none;">Cancel reply</a></small></h4>
                                                                           <form action="https://demoapus1.com/educrat/learnpress/wp-comments-post.php" method="post" id="commentform" enctype="multipart/form-data" class="comment-form-theme" novalidate>
                                                                             
                                                                              <div class="form-group"><label>Reviews</label><textarea id="comment" class="form-control" placeholder="Write Reviews" name="comment" cols="45" rows="5" aria-required="true"></textarea></div>
                                                                              <p class="form-submit"><input name="submit" type="submit" id="submit" class="btn btn-theme" value="Submit Review" /> <input type='hidden' name='comment_post_ID' value='4671' id='comment_post_ID' />
                                                                                 <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                                                              </p>
                                                                              <input type="hidden" name="comment-post-item-course" value="4671" />
                                                                           </form>
                                                                        </div>
                                                                        <!-- #respond -->
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <!-- end entry content left --> 
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="sidebar-wrapper col-lg-4 col-12 sidebar-course-single">
                                    <aside class="sidebar sidebar-right sticky-top" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                                       <aside class="widget widget_apus_course_info">
                                          <div class="course-info-widget">
                                             <div class="course-video box-info-white">
                                                <p><iframe title="Working at Envato" width="1280" height="720" src="https://www.youtube.com/embed/7e90gBu4pas?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
                                             </div>
                                             <div class="bottom-inner">
                                                <div class="course-price d-flex align-items-center">
                                                   <div class="sale-price"><span class="price">{{str_replace(',', '', rtrim(number_format($khoahoc->GiaMoi, 2, ',', '.'), '0'))}} đ </span></div>
                                                </div>
                                                <div class="lp-course-buttons">
                                                </div>
                                                <div class="inner">
                                                   <ul class="lp-course-info-fields">
                                                      <li class="lp-course-info duration">
                                                         <label><i class="flaticon-clock"></i>Thời gian hoàn thành</label>
                                                         <span class="lp-label label-15 day">
                                                            {{$khoahoc->ThoiLuongKhoaHoc}}	</span>
                                                      </li>
                                                      
                                                      
                                                      
                                                      <li class="lp-course-info language">
                                                         <label><i class="flaticon-translate"></i>Ngôn ngữ</label>
                                                         <span class="lp-label label-English, France">
                                                         English, France	</span>
                                                      </li>
                                                      <li class="lp-course-info skill_level">
                                                         <label><i class="flaticon-bar-chart"></i>Cấp độ</label>
                                                         <span class="lp-label label-">
                                                            {{$khoahoc->TenCapDo}}
                                                         </span>
                                                      </li>
                                                     
                                                   </ul>
                                                   <form action="{{ route('cart.store') }}" method="POST" class="apus-social-share text-center" enctype="multipart/form-data">
                                                      @csrf
                                                      <input type="hidden" value="{{ $khoahoc->id }}" name="id">
                                                      <input type="hidden" value="{{ $khoahoc->TenKhoaHoc }}" name="makh">
                                                      <input type="hidden" value="{{ $khoahoc->AnhKhoaHoc }}" name="image">
                                                      <input type="hidden" value="{{ $khoahoc->GiaMoi }}"  name="giamoi">
                                                      <input type="hidden" value="1" name="quantity">
                                                      <button type="submit" class="px-4 py-2 text-white btn-primary rounded">Thêm vào giỏ hàng</button>
                                                   </form>
                                                   <!-- socials -->
                                                   
                                                </div>
                                             </div>
                                          </div>
                                       </aside>
                                    </aside>
                                 </div>
                              </div>
                              <div class="widget widget-courses-related">
                                 <h3 class="widget-title">
                                    Related Courses    
                                 </h3>
                                 <div class="related-courses-content widget-content" >
                                    <div class="slick-carousel" data-carousel="slick" data-small="1" data-smallest="1" data-medium="2" data-large="2" data-items="4" data-pagination="false" data-nav="true" >
                                       <div class="course-grid post-4659 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-graphic-design course_category-web-development course" ng-repeat="i in SameCourse" style="display:inline-block">
                                          <div class="course-layout-item" >
                                             <div class="course-entry" >
                                                <!-- course thumbnail -->
                                                <div class="course-cover">
                                                   <div class="course-cover-thumb">
                                                      <figure class="entry-thumb">
                                                         <a class="post-thumbnail" href="https://demoapus1.com/educrat/learnpress/course/idea-was-based-on-our-experiences-learning-photoshop/" aria-hidden="true">
                                                            <div class="image-wrapper"><img width="615" height="435" src="/images/khoahoc/@{{i.AnhKhoaHoc}}" class="attachment-educrat-course-grid size-educrat-course-grid" alt="@{{i.TenKhoaHoc}}" /></div>
                                                         </a>
                                                      </figure>                  
                                                   </div>
                                                </div>
                                                <div class="course-layout-content">
                                                   <div class="course-info-top">
                                                      <!-- rating -->
                                                      
                                                      </div>
                                                   </div>
                                                   <!-- course title -->       	
                                                   <h3 class="course-title"><a href="https://demoapus1.com/educrat/learnpress/course/idea-was-based-on-our-experiences-learning-photoshop/">@{{i.tenKhoaHoc}}</a></h3>
                                                   <div class="course-meta-middle">
                                                      <!-- number lessons -->
                                                      <div class="course-lesson-number course-meta-field">
                                                         <i class="flaticon-document"></i>
                                                         {{-- @{{i.course}}                        Lessons                     --}}
                                                      </div>
                                                      <!-- time -->
                                                      <div class="course-duration course-meta-field">
                                                         <i class="flaticon-wall-clock"></i>
                                                         @{{i.ThoiLuongKhoaHoc}} week                    
                                                      </div>
                                                      <div class="course-level course-meta-field">
                                                         <i class="flaticon-bar-chart"></i>
                                                         @{{i.TenCapDo}}                    
                                                      </div>
                                                   </div>
                                                   <div class="course-meta-bottom d-flex align-items-center">
                                                      <!-- course teacher -->
                                                      <div class="lp-course-author d-flex align-items-center">
                                                         <div class="course-author__pull-left d-flex align-items-center justify-content-center">
                                                            <img alt="Albert Flores" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads//learn-press-profile/5/90cce4fb5a0d497f1fc52bc858e399fb.jpeg" class="avatar avatar-450 photo" height="495" width="450" />                        
                                                         </div>
                                                         <div class="author-title"><a href="https://demoapus1.com/educrat/learnpress/lp-profile/albertflores/"><span>@{{i.TenGiangVien}}</span></a></div>
                                                      </div>
                                                      <!-- price -->
                                                      <div class="course-meta-field course-meta-price ms-auto">
                                                         <div class="course-price">
                                                            <span class="origin-price">&#036;@{{i.GiaCu}}</span><span class="price">&#036;@{{i.GiaMoi}}</span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
            
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- #content -->
                        </div>
                        <!-- #primary -->
                     </div>
                  </div>
               </div>
            </section>
         </div>
         <!-- .site-content -->
        
         <a href="#" id="back-to-top" class="add-fix-top">
         <i class="ti-arrow-up"></i>
         </a>
      </div>
      @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>

            var myApp = angular.module("myApp", []).config(['$qProvider', function ($qProvider) {
                $qProvider.errorOnUnhandledRejections(false);
            }]);
            var url = window.location.pathname;
            var id = url.substring(url.lastIndexOf('/') + 1);

            myApp.controller("DetailView", function ($scope, $http) {
            
                $http({
                    method: "GET",
                    url: "/course/samecategory/" + Number(id)

                }).then(function (res) {
                    $scope.SameCourse = res.data;
                    console.log($scope.SameCourse)
                });


                $scope.ListLession = function (id) {
                    $http({
                        method: "GET",
                        url: "/course/videos/" + Number(id)
                    }).then(function (res) {
                        $scope.videos = res.data;
                        console.log($scope.videos)
                    });
                }

                
            });
         
      </script>

   @endsection
@endsection
{{-- @section scripts
{
    <script>
        var localhost = "https://localhost:44330";
        var locationhost = "https://localhost:44393"

        var myApp = angular.module("myApp", []).config(['$qProvider', function ($qProvider) {
            $qProvider.errorOnUnhandledRejections(false);
        }]);
        var url = window.location.pathname;
        var id = url.substring(url.lastIndexOf('/') + 1);

        myApp.controller("DetailView", DetailView);
        function DetailView($scope, $http) {

            $scope.myCart = JSON.parse(localStorage.getItem('myCart')) || [];

            $scope.ListCart = JSON.parse(localStorage.getItem('ListCart')) || [];

            $scope.addCart = function () {
                $http({
                    method: "GET",
                    url: localhost + "/api/Detail/DetailProduct/" + Number(id)
                }).then(function (res) {
                    $scope.course = res.data;

                    if ($scope.ListCart.includes($scope.course)) {
                        
                    } else {
                        $scope.ListCart.push($scope.course);
                        localStorage.setItem('ListCart', JSON.stringify($scope.ListCart));
                    }
                    

                    //////////////////////////////////////////////////////////
                    $scope.item = {MaKhoaHoc: $scope.course.maKhoaHoc, MaGiangVien: $scope.course.maGiangVien};

                    if ($scope.myCart.includes($scope.item)) {
                        alert($scope.item + ' is already in the list!');
                    } else {
                        $scope.myCart.push($scope.item);
                        localStorage.setItem('myCart', JSON.stringify($scope.myCart));
                    }
                });
            };




            $http({
                method: "GET",
                url: localhost + "/api/Detail/DetailProduct/"+ Number(id)

            }).then(function (res) {
                $scope.course = res.data;
                console.log($scope.course)
                
            });



            $scope.ListLession = function (id) {

                $http({
                method: "GET",
                url: localhost + "/api/Detail/ListVideoByLessionId/" + Number(id)

            }).then(function (res) {
                $scope.videos = res.data;
                console.log($scope.videos)
            });
            }

            $http({
                method: "GET",
                url: localhost + "/api/Detail/ListLessionUsingID/" + Number(id)

            }).then(function (res) {
                $scope.lessions = res.data;
                console.log($scope.lessions)
            });

            $http({
                method: "GET",
                url: localhost + "/api/Detail/GetTeacherOfCourse/" + Number(id)

            }).then(function (res) {
                $scope.teacher = res.data;
                console.log($scope.teacher)
            });


            $http({
                method: "GET",
                url: localhost + "/api/Detail/GetCourseSameCategory/" + Number(id)

            }).then(function (res) {
                $scope.SameCourse = res.data;
                console.log($scope.SameCourse)
            });

            $http({
                method: "GET",
                url: localhost + "/api/Detail/ListComment/" + Number(id)

            }).then(function (res) {
                $scope.LM = res.data;
                console.log($scope.LM)
            });


            

             $scope.Check = function () {

                 $scope.Account = JSON.parse(localStorage.getItem('Account')) || [];
                   console.log($scope.Account.maNguoiDung)

                    $http({
                    method: "GET",
                    url: localhost + "/api/User/CheckAddCart?usid="+$scope.Account.maNguoiDung+"&makh="+ Number(id)

                }).then(function (res) {
                    $scope.check = res.data;
                    if($scope.check == 0){
                        window.location.href = localhost+ "/UserFrontend/Cart";
                    }
                    if($scope.check == 1){
                        window.location.href = locationhost + "/UserFrontend/Lession/"+ Number(id);
                    }

                });
            }
        }
    </script>
} --}}