@extends('Front.Layouts.layout')
@section('content')
<div id="apus-main-content">
    <section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb ">
       <div class="container">
          <div class="wrapper-breads">
             <div class="wrapper-breads-inner">
                <ol class="breadcrumb">
                   <li><a href="https://demoapus1.com/educrat/learnpress">Home</a>  </li>
                   <li><span class="">Thể loại</span></li>
                   @if($danhmuc)
                   <li><span class="active">{{$danhmuc->tendm}}</span></li>
                   @endif
                </ol>
             </div>
          </div>
       </div>
    </section>
    <section id="main-container" class="main-content container inner ">
       <a href="javascript:void(0)" class="mobile-sidebar-btn d-lg-none btn-left"><i class="ti-menu-alt"></i></a>
       <div class="mobile-sidebar-panel-overlay"></div>
       <div class="row">
          <div class="sidebar-wrapper sidebar-course col-lg-3 col-12">
             <aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                <div class="close-sidebar-btn d-lg-none"> <i class="ti-close"></i> <span>Close</span></div>
                <aside class="widget widget_apus_course_filter_keywords">
                   <div class="widget_search">
                      <form class="search-courses" method="get" action="{{route('category.search',$danhmuc->madm)}}">
                        @csrf
                        @method('GET')
                         <input type="text" class="form-control" placeholder="Search courses..." name="search" >
                         <button class="btn" type="submit"><i class="flaticon-search"></i></button>
                           
                      </form>
                   </div>
                </aside>
                <aside class="widget widget_apus_course_filter_category">
                   <h2 class="widget-title"><span>Danh mục</span></h2>
                   <div class="filter-categories-widget">
                      <form action="https://demoapus1.com/educrat/learnpress/courses/" method="get">
                         <ul class="course-category-list course-list-check">
                           @foreach($categories as $category)
                            <li>
                               <a href="{{route('category.getProductByCategory',$category->madm)}}" for="filter-category-72">{{$category->tendm}}</a>
                            </li>
                            @endforeach
                            
                         </ul>
                         <input type="hidden" name="course" value="style1" />        
                      </form>
                   </div>
                </aside>
               
                <aside class="widget widget_apus_course_filter_instructor">
                   <h2 class="widget-title"><span>Giảng viên</span></h2>
                   <div class="filter-instructors-widget">
                      <form action="https://demoapus1.com/educrat/learnpress/courses/" method="get">
                         <ul class="instructor-list course-list-check">
                           @foreach($giangviens as $giangvien)
                            <li>
                              <a href="{{route('category.fillTeacher',$giangvien->MaGiangVien)}}" for="filter-category-{{$giangvien->MaGiangVien}}">{{$giangvien->TenGiangVien}}</a>
                            </li>
                            @endforeach
                         </ul>
                         <input type="hidden" name="course" value="style1" />        
                      </form>
                   </div>
                </aside>
                <aside class="widget widget_apus_course_filter_price">
                   <h2 class="widget-title"><span>Giá</span></h2>
                   <div class="filter-price-widget">
                      <form action="https://demoapus1.com/educrat/learnpress/courses/" method="get">
                         <ul class="price-list course-list-check">
                            <li>
                               <input id="filter-price-all" type="radio" class="d-none" name="filter-price" value=""  checked='checked'>
                               <label for="filter-price-all">All <span class="count">(15)</span></label>
                            </li>
                            <li>
                               <input id="filter-price-free" type="radio" class="d-none" name="filter-price" value="free" >
                               <label for="filter-price-free">Free <span class="count">(0)</span></label>
                            </li>
                            <li>
                               <input id="filter-price-paid" type="radio" class="d-none" name="filter-price" value="paid" >
                               <label for="filter-price-paid">Paid <span class="count">(15)</span></label>
                            </li>
                         </ul>
                         <input type="hidden" name="post_type" value="lp_course">
                         <input type="hidden" name="taxonomy" value="">
                         <input type="hidden" name="term_id" value="">
                         <input type="hidden" name="term" value="">
                         <input type="hidden" name="course" value="style1" />    
                      </form>
                   </div>
                </aside>
                <aside class="widget widget_apus_course_filter_level">
                   <h2 class="widget-title"><span>Cấp độ</span></h2>
                   <div class="filter-levels-widget">
                      <form action="https://demoapus1.com/educrat/learnpress/courses/" method="get">
                         <ul class="level-list course-list-check">
                           @foreach($capdos as $capdo)
                            <li>
                              <a href="" for="filter-category-{{$capdo->MaCapDo}}">{{$capdo->TenCapDo}}</a>
                            </li>
                            @endforeach
                         </ul>
                         <input type="hidden" name="post_type" value="lp_course">
                         <input type="hidden" name="taxonomy" value="">
                         <input type="hidden" name="term_id" value="">
                         <input type="hidden" name="term" value="">
                         <input type="hidden" name="course" value="style1" />        
                      </form>
                   </div>
                </aside>
             </aside>
          </div>
          <div id="main-content" class="col-12 col-lg-9 col-12">
             <main id="main" class="site-main layout-courses display-mode-grid" role="main">
                <div class="course-top-wrapper d-md-flex align-items-center">
                   <div class="course-found"><span>{{$count}}</span> khóa học  được tìm thấy</div>
                   <div class="lp-courses-filter d-flex align-items-center ms-auto">
                      <div class="orderby d-flex align-items-center">
                         <label>Short By:</label>
                         <form class="courses-ordering" method="get">
                            <select name="orderby" class="orderby">
                               <option value=""  selected='selected'>Default</option>
                               <option value="newest" >Newest</option>
                               <option value="oldest" >Oldest</option>
                            </select>
                            <input type="hidden" name="paged" value="1" />
                            <input type="hidden" name="course" value="style1" />        
                         </form>
                      </div>
                   </div>
                </div>
                <div class="row">
                  @foreach($khoahocs as $khoahoc)
                   <div class="col-lg-4 col-md-6 col-12">
                      <div class="course-grid post-4673 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-personal-development course">
                         <div class="course-layout-item">
                            <div class="course-entry">
                               <!-- course thumbnail -->
                               <div class="course-cover">
                                  <div class="course-cover-thumb">
                                     <figure class="entry-thumb">
                                        <a class="post-thumbnail" href="https://demoapus1.com/educrat/learnpress/course/the-complete-financial-analyst-training-investing/" aria-hidden="true">
                                           <div class="image-wrapper"><img width="615" height="435" src="/images/khoahoc/{{$khoahoc->AnhKhoaHoc}}" class="attachment-educrat-course-grid size-educrat-course-grid" alt="" /></div>
                                        </a>
                                     </figure>
                                     <span class="sale-label">{{$khoahoc->GiamGia}}</span>                    
                                  </div>
                               </div>
                               <div class="course-layout-content">
                                  
                                  <!-- course title -->       	
                                  <h3 class="course-title"><a href="https://demoapus1.com/educrat/learnpress/course/the-complete-financial-analyst-training-investing/">{{$khoahoc->TenKhoaHoc}}</a></h3>
                                  <div class="course-meta-middle">
                                     <!-- number lessons -->
                                     <div class="course-lesson-number course-meta-field">
                                        <i class="flaticon-document"></i>
                                        {{-- 1                        Lessons                     --}}
                                     </div>
                                     <!-- time -->
                                     <div class="course-duration course-meta-field">
                                        <i class="flaticon-wall-clock"></i>
                                        {{$khoahoc->ThoiLuongKhoaHoc}}                   
                                     </div>
                                     <div class="course-level course-meta-field">
                                        <i class="flaticon-bar-chart"></i>
                                        {{$khoahoc->TenCapDo}}                         
                                     </div>
                                  </div>
                                  <div class="course-meta-bottom d-flex align-items-center">
                                     <!-- course teacher -->
                                     <div class="lp-course-author d-flex align-items-center">
                                        <div class="course-author__pull-left d-flex align-items-center justify-content-center">
                                           <img alt="John Doe" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads//learn-press-profile/4/c33a229685c37eb0eab4a17bf9a115a0.jpeg" class="avatar avatar-450 photo" height="495" width="450" />                        
                                        </div>
                                        <div class="author-title"><a href="https://demoapus1.com/educrat/learnpress/lp-profile/johndoe/"><span>{{$khoahoc->TenGiangVien}} </span></a></div>
                                     </div>
                                     <!-- price -->
                                     <div class="course-meta-field course-meta-price ms-auto">
                                        <div class="course-price">
                                           <span class="origin-price">{{str_replace(',', '', rtrim(number_format($khoahoc->GiaCu, 2, ',', '.'), '0'))}} đ</span><span class="price">{{str_replace(',', '', rtrim(number_format($khoahoc->GiaMoi, 2, ',', '.'), '0'))}} đ</span>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>

                   @endforeach   
                </div>
                <div>
                  {{ $khoahocs->links() }}
                </div>
             </main>
             <!-- .site-main -->
          </div>
          <!-- .content-area -->
       </div>
    </section>
 </div>
 @endsection