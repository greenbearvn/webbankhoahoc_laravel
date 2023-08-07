@extends('Front.Layouts.layout')
@section('content')

<div id="apus-main-content">
   <section id="main-container" class="container inner">
   <div class="row">
      <div id="main-content" class="main-page col-12">
         <div id="main" class="site-main clearfix" role="main">
            <div data-elementor-type="wp-page" data-elementor-id="44" class="elementor elementor-44" data-elementor-settings="[]">
               <div class="elementor-section-wrap">
                  @include('Front.Layouts.slide')
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-5345ec0 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5345ec0" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        
                     </div>
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-ac9741c elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ac9741c" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6f69c3b" data-id="6f69c3b" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-7c4fea1 elementor-widget elementor-widget-spacer" data-id="7c4fea1" data-element_type="widget" data-widget_type="spacer.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-spacer">
                                       <div class="elementor-spacer-inner"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-e3a2775 elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="e3a2775" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-35488a0" data-id="35488a0" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-e713f66 elementor-widget elementor-widget-heading" data-id="e713f66" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">Top danh mục</h2>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-200e57c" data-id="200e57c" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-438dc31 elementor-widget__width-auto elementor-widget elementor-widget-button" data-id="438dc31" data-element_type="widget" data-widget_type="button.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                       <a href="https://demoapus1.com/educrat/learnpress/courses" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                       <span class="elementor-button-content-wrapper">
                                       <span class="elementor-button-text">Tất cả danh mục</span>
                                       </span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-08559de elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="08559de" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        @foreach ($categories as $category)
                        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-868857a animated-fast elementor-invisible" data-id="868857a" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;slide-left&quot;,&quot;animation_delay&quot;:100}">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-a3de1a8 elementor-widget elementor-widget-apus_category_banner" data-id="a3de1a8" data-element_type="widget" data-widget_type="apus_category_banner.default">
                                 <div class="elementor-widget-container">
                                    <div class="widget-category-banner">
                                       <a href="/course/category/{{$category->madm}}">
                                          <div class="inner">
                                             <div class="banner-content-wrapper d-flex flex-column  style3" >
                                                <div class="features-box-image d-flex align-items-center justify-content-center img">
                                                   <div class="image-wrapper"><img decoding="async" loading="lazy" width="80" height="80" src="/images/danhmuc/{{$category->anhdm}}" class="attachment-full size-full" alt="" /></div>
                                                </div>
                                                <div class="right-inner">
                                                   <h3 class="banner-title">{{$category->tendm}}</h3>
                                                   
                                                </div>
                                             </div>
                                          </div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                        
                     </div>
                  </section>
                 
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-022b03e elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="022b03e" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b34c6cd" data-id="b34c6cd" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <section class="elementor-section elementor-inner-section elementor-element elementor-element-28054f1 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="28054f1" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:300}">
                                 <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-c55d56f" data-id="c55d56f" data-element_type="column">
                                       <div class="elementor-widget-wrap elementor-element-populated">
                                          <div class="elementor-element elementor-element-96c2dd2 elementor-widget elementor-widget-heading" data-id="96c2dd2" data-element_type="widget" data-widget_type="heading.default">
                                             <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Khóa học xu hướng</h2>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5adae95" data-id="5adae95" data-element_type="column">
                                       <div class="elementor-widget-wrap elementor-element-populated">
                                          <div class="elementor-element elementor-element-1850f13 elementor-widget__width-auto elementor-widget elementor-widget-button" data-id="1850f13" data-element_type="widget" data-widget_type="button.default">
                                             <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper">
                                                   <a href="https://demoapus1.com/educrat/learnpress/courses" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                   <span class="elementor-button-content-wrapper">
                                                   <span class="elementor-button-text">Tất cả khóa học</span>
                                                   </span>
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                              <section class="elementor-section elementor-inner-section elementor-element elementor-element-4c95709 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4c95709" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                 <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-7d3570b" data-id="7d3570b" data-element_type="column">
                                       <div class="elementor-widget-wrap elementor-element-populated">
                                          <div class="elementor-element elementor-element-f40ac1e elementor-invisible elementor-widget elementor-widget-apus_learnpress_courses" data-id="f40ac1e" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;4&quot;,&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:300,&quot;slides_to_scroll&quot;:1}" data-widget_type="apus_learnpress_courses.default">
                                             <div class="elementor-widget-container">
                                                <div class="widget-courses  nofullscreen">
                                                   <div class="slick-carousel  stretch_pagination"
                                                      data-items="4"
                                                      data-large="2"
                                                      data-medium="2"
                                                      data-small="1"
                                                      data-smallest="1"
                                                      data-slidestoscroll="1"
                                                      data-slidestoscroll_large="1"
                                                      data-slidestoscroll_small="1"
                                                      data-pagination="true"
                                                      data-nav="true"
                                                      data-rows="1"
                                                      data-infinite="true"
                                                      data-autoplay="true">
                                                      @foreach ($khoahocs as $khoahoc)
                                                      <div class="item">
                                                         <div class="course-grid post-4663 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-finance-accounting course_category-graphic-design course">
                                                            <div class="course-layout-item course-grid-v3">
                                                               <div class="course-entry">
                                                                  <!-- course thumbnail -->
                                                                  <div class="course-cover">
                                                                     <div class="course-cover-thumb">
                                                                        <figure class="entry-thumb">
                                                                           <a class="post-thumbnail" href="https://demoapus1.com/educrat/learnpress/course/learn-3d-modelling-and-design-for-beginners/" aria-hidden="true">
                                                                              <div class="image-wrapper"><img decoding="async" loading="lazy" width="615" height="435" src="/images/khoahoc/{{$khoahoc->AnhKhoaHoc}}" class="attachment-educrat-course-grid size-educrat-course-grid" alt="" /></div>
                                                                           </a>
                                                                        </figure>
                                                                        <span class="sale-label">{{$khoahoc->GiamGia}} %</span>                    
                                                                     </div>
                                                                  </div>
                                                                  <div class="course-layout-content">
                                                                     
                                                                     <!-- course title -->           
                                                                     <h3 class="course-title"><a href="/course/detail/{{$khoahoc->id}}">{{$khoahoc->TenKhoaHoc}}</a></h3>
                                                                     <div class="course-meta-middle">
                                                                        <!-- number lessons -->
                                                                        
                                                                        <!-- time -->
                                                                        <div class="course-duration course-meta-field">
                                                                           <i class="fa-solid fa-timer"></i>
                                                                           {{$khoahoc->ThoiLuongKhoaHoc}}          
                                                                        </div>
                                                                        <div class="course-level course-meta-field">
                                                                           <i class="fa-solid fa-laptop-code"></i>
                                                                           {{$khoahoc->TenCapDo}}                        
                                                                        </div>
                                                                     </div>
                                                                     <div class="course-meta-bottom d-flex align-items-center">
                                                                        <!-- course teacher -->
                                                                        <div class="lp-course-author d-flex align-items-center">
                                                                           <div class="course-author__pull-left d-flex align-items-center justify-content-center">
                                                                              <img decoding="async" loading="lazy" alt="John Doe" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads//learn-press-profile/2/63d287ea071d7c542c93366748a91fbc.jpeg" class="avatar avatar-450 photo" height="495" width="450" />                        
                                                                           </div>
                                                                           <div class="author-title"><a href="https://demoapus1.com/educrat/learnpress/lp-profile/johndoe/"><span>{{$khoahoc->TenGiangVien}}</span></a></div>
                                                                        </div>
                                                                        <!-- price -->
                                                                        <div class="course-meta-field course-meta-price ms-auto">
                                                                           <div class="course-price">
                                                                              <span class="origin-price">{{number_format($khoahoc->GiaCu)}} đ</span><span class="price">{{str_replace(',', '', rtrim(number_format($khoahoc->GiaMoi, 2, ',', '.'), '0'))}} đ</span>
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
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-b3b98b6 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b3b98b6" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0adcb2b" data-id="0adcb2b" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-e12a61c elementor-invisible elementor-widget elementor-widget-heading" data-id="e12a61c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">How it works?</h2>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-146199f elementor-invisible elementor-widget elementor-widget-text-editor" data-id="146199f" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    12,000+ unique online course list designs						
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-b3a3ebc elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b3a3ebc" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-a48aefc" data-id="a48aefc" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-60d32fa animated-fast elementor-invisible elementor-widget elementor-widget-apus_element_address_box" data-id="60d32fa" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-right&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="apus_element_address_box.default">
                                 <div class="elementor-widget-container">
                                    <div class="widget-box  st3">
                                       <div class="row">
                                          <div class="item col-12 col-sm-12">
                                             <div class="item-box d-flex st3">
                                                <div class="top-inner flex-shrink-0">
                                                   <div class="features-box-image position-relative icon">
                                                      <div class="number">01</div>
                                                      <i class="flaticon-online-course"></i>
                                                   </div>
                                                </div>
                                                <div class="features-box-content flex-grow-1">
                                                   <h3 class="title">Browse courses from our expert contributors.</h3>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-47f66f7 elementor-hidden-tablet elementor-hidden-mobile" data-id="47f66f7" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-9daabd2 animated-fast elementor-invisible elementor-widget elementor-widget-image" data-id="9daabd2" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-right&quot;,&quot;_animation_delay&quot;:300}" data-widget_type="image.default">
                                 <div class="elementor-widget-container">
                                    <img decoding="async" width="142" height="21" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/line1.png" class="attachment-full size-full" alt="" loading="lazy" />															
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-3542190" data-id="3542190" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-25a5548 animated-fast elementor-invisible elementor-widget elementor-widget-apus_element_address_box" data-id="25a5548" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-right&quot;,&quot;_animation_delay&quot;:400}" data-widget_type="apus_element_address_box.default">
                                 <div class="elementor-widget-container">
                                    <div class="widget-box  st3">
                                       <div class="row">
                                          <div class="item col-12 col-sm-12">
                                             <div class="item-box d-flex st3">
                                                <div class="top-inner flex-shrink-0">
                                                   <div class="features-box-image position-relative icon">
                                                      <div class="number">02</div>
                                                      <i class="flaticon-credit-card"></i>
                                                   </div>
                                                </div>
                                                <div class="features-box-content flex-grow-1">
                                                   <h3 class="title">Purchase quickly  and securely.</h3>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-b70d55b elementor-hidden-tablet elementor-hidden-mobile" data-id="b70d55b" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-45d16fd animated-fast elementor-invisible elementor-widget elementor-widget-image" data-id="45d16fd" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-right&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="image.default">
                                 <div class="elementor-widget-container">
                                    <img decoding="async" width="142" height="21" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/line2.png" class="attachment-full size-full" alt="" loading="lazy" />															
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-932d390" data-id="932d390" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-17c6b22 animated-fast elementor-invisible elementor-widget elementor-widget-apus_element_address_box" data-id="17c6b22" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-right&quot;,&quot;_animation_delay&quot;:600}" data-widget_type="apus_element_address_box.default">
                                 <div class="elementor-widget-container">
                                    <div class="widget-box  st3">
                                       <div class="row">
                                          <div class="item col-12 col-sm-12">
                                             <div class="item-box d-flex st3">
                                                <div class="top-inner flex-shrink-0">
                                                   <div class="features-box-image position-relative icon">
                                                      <div class="number">03</div>
                                                      <i class="flaticon-online-learning-5"></i>
                                                   </div>
                                                </div>
                                                <div class="features-box-content flex-grow-1">
                                                   <h3 class="title">That’s it! Start learning  right away.</h3>
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
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-91c064c elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="91c064c" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e2df244" data-id="e2df244" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <section class="elementor-section elementor-inner-section elementor-element elementor-element-386fec2 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="386fec2" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;slide-up&quot;}">
                                 <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-33ae03c" data-id="33ae03c" data-element_type="column">
                                       <div class="elementor-widget-wrap elementor-element-populated">
                                          <div class="elementor-element elementor-element-e1d07d1 elementor-widget elementor-widget-heading" data-id="e1d07d1" data-element_type="widget" data-widget_type="heading.default">
                                             <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Học cùng các giảng viên giỏi nhất</h2>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-903e896" data-id="903e896" data-element_type="column">
                                       <div class="elementor-widget-wrap elementor-element-populated">
                                          <div class="elementor-element elementor-element-6870820 elementor-widget__width-auto elementor-widget elementor-widget-button" data-id="6870820" data-element_type="widget" data-widget_type="button.default">
                                             <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper">
                                                   <a href="https://demoapus1.com/educrat/learnpress/instructors" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                   <span class="elementor-button-content-wrapper">
                                                   <span class="elementor-button-text">Xem tất cả giảng viên</span>
                                                   </span>
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                              
                              <div class="elementor-element elementor-element-9a4ea70 elementor-invisible elementor-widget elementor-widget-text-editor" data-id="9a4ea70" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:300}" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    Bạn muốn chia sẻ kiến thức của mình đến với mọi người? <a href="/giangvien/createUI/6" rel="noopener" target="_blank" class="text-theme text-underline">Trở thành giảng viên</a>						
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-49573ff elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="49573ff" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7f3dc67" data-id="7f3dc67" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <section class="elementor-section elementor-inner-section elementor-element elementor-element-7b4609c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7b4609c" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                 <div class="elementor-container elementor-column-gap-extended">
                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-d43a94d" data-id="d43a94d" data-element_type="column">
                                       <div class="elementor-widget-wrap elementor-element-populated">
                                          <div class="elementor-element elementor-element-2524a06 elementor-invisible elementor-widget elementor-widget-heading" data-id="2524a06" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}" data-widget_type="heading.default">
                                             <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Lời chứng thực</h2>
                                             </div>
                                          </div>
                                          
                                          <div class="elementor-element elementor-element-d0b6a76 elementor-invisible elementor-widget elementor-widget-image" data-id="d0b6a76" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:300}" data-widget_type="image.default">
                                             <div class="elementor-widget-container">
                                                <img decoding="async" width="60" height="43" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/quote.png" class="attachment-full size-full" alt="" loading="lazy" />															
                                             </div>
                                          </div>
                                          <div class="elementor-element elementor-element-180750b elementor-invisible elementor-widget elementor-widget-apus_element_testimonials" data-id="180750b" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:400,&quot;columns&quot;:1}" data-widget_type="apus_element_testimonials.default">
                                             <div class="elementor-widget-container">
                                                <div class="widget-testimonials  style2  nofullscreen">
                                                   <div class="slick-carousel v1 testimonial-main" data-items="1" data-large="1" data-medium="1" data-small="1" data-smallest="1" data-pagination="false" data-nav="false" data-asnavfor=".testimonial-thumbnail" data-slickparent="true">
                                                      <div class="testimonials-item2 text-center">
                                                         <div class="description">It is no exaggeration to say this Educrat experience was 
                                                            transformative–both professionally and personally. This 
                                                            workshop will long remain a high point of my life.
                                                         </div>
                                                         <h3 class="name-client">Ronald Richards</h3>
                                                         <div class="job">President of Sales</div>
                                                      </div>
                                                      <div class="testimonials-item2 text-center">
                                                         <div class="description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae</div>
                                                         <h3 class="name-client">Annette Black</h3>
                                                         <div class="job">Web Designer</div>
                                                      </div>
                                                      <div class="testimonials-item2 text-center">
                                                         <div class="description">It is no exaggeration to say this Educrat experience was 
                                                            transformative–both professionally and personally. This 
                                                            workshop will long remain a high point of my life.
                                                         </div>
                                                         <h3 class="name-client">Robert Fox</h3>
                                                         <div class="job">Marketing</div>
                                                      </div>
                                                      <div class="testimonials-item2 text-center">
                                                         <div class="description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae</div>
                                                         <h3 class="name-client">Brooklyn Simmons</h3>
                                                         <div class="job">Web Designer</div>
                                                      </div>
                                                      <div class="testimonials-item2 text-center">
                                                         <div class="description">It is no exaggeration to say this Educrat experience was 
                                                            transformative–both professionally and personally. This 
                                                            workshop will long remain a high point of my life.
                                                         </div>
                                                         <h3 class="name-client">Ronald Richards</h3>
                                                         <div class="job">President of Sales</div>
                                                      </div>
                                                      <div class="testimonials-item2 text-center">
                                                         <div class="description">It is no exaggeration to say this Educrat experience was 
                                                            transformative–both professionally and personally. This 
                                                            workshop will long remain a high point of my life.
                                                         </div>
                                                         <h3 class="name-client">Ali Tufan</h3>
                                                         <div class="job">Product Manager</div>
                                                      </div>
                                                   </div>
                                                   <div class="wrapper-testimonial-thumbnail">
                                                      <div class="slick-carousel testimonial-thumbnail" data-centerpadding='0px' data-centermode="true" data-items="5" data-large="5" data-medium="5" data-small="3" data-smallest="3" data-pagination="false" data-nav="false" data-asnavfor=".testimonial-main" data-slidestoscroll="1" data-focusonselect="true" data-infinite="true">
                                                         <div class="wrapper-avarta">
                                                            <div class="avarta">
                                                               <img decoding="async" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/test1-2.png" alt="Ronald Richards">
                                                            </div>
                                                         </div>
                                                         <div class="wrapper-avarta">
                                                            <div class="avarta">
                                                               <img decoding="async" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/test2.png" alt="Annette Black">
                                                            </div>
                                                         </div>
                                                         <div class="wrapper-avarta">
                                                            <div class="avarta">
                                                               <img decoding="async" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/test3.png" alt="Robert Fox">
                                                            </div>
                                                         </div>
                                                         <div class="wrapper-avarta">
                                                            <div class="avarta">
                                                               <img decoding="async" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/test4.png" alt="Brooklyn Simmons">
                                                            </div>
                                                         </div>
                                                         <div class="wrapper-avarta">
                                                            <div class="avarta">
                                                               <img decoding="async" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/test5.png" alt="Ronald Richards">
                                                            </div>
                                                         </div>
                                                         <div class="wrapper-avarta">
                                                            <div class="avarta">
                                                               <img decoding="async" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/test6.png" alt="Ali Tufan">
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
                              </section>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-abda03a elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="abda03a" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-75fed0d" data-id="75fed0d" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-16f80d4 elementor-widget elementor-widget-heading" data-id="16f80d4" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">Các khóa mới nhất</h2>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-4581b43 elementor-widget elementor-widget-text-editor" data-id="4581b43" data-element_type="widget" data-widget_type="text-editor.default">
                                 <div class="elementor-widget-container">
                                    10,000+ khóa học về lập trình 					
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-8bee37d" data-id="8bee37d" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-7072194 elementor-widget__width-auto elementor-widget elementor-widget-button" data-id="7072194" data-element_type="widget" data-widget_type="button.default">
                                 <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                       <a href="https://demoapus1.com/educrat/learnpress/courses" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                       <span class="elementor-button-content-wrapper">
                                       <span class="elementor-button-text">Tất cả khóa học</span>
                                       </span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-542b7d1 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="542b7d1" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c7af2c2" data-id="c7af2c2" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-13cddfa elementor-invisible elementor-widget elementor-widget-apus_learnpress_courses" data-id="13cddfa" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;4&quot;,&quot;_animation&quot;:&quot;slide-up&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="apus_learnpress_courses.default">
                                 <div class="elementor-widget-container">
                                    <div class="widget-courses  nofullscreen">
                                       <div class="row">
                                          @foreach ($khoahocs as $khoahoc)
                                          <div class="col-xl-3 col-md-6 col-12">
                                             
                                             <div class="course-grid post-4671 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-social-sciences course_category-web-development course">
                                                <div class="course-layout-item course-grid-v3">
                                                   <div class="course-entry">
                                                      <!-- course thumbnail -->
                                                      <div class="course-cover">
                                                         <div class="course-cover-thumb">
                                                            <figure class="entry-thumb">
                                                               <a class="post-thumbnail" href="https://demoapus1.com/educrat/learnpress/course/learn-figma-ui-ux-design-essential-training/" aria-hidden="true">
                                                                  <div class="image-wrapper"><img decoding="async" loading="lazy" width="615" height="435" src="/images/khoahoc/{{$khoahoc->AnhKhoaHoc}}" class="attachment-educrat-course-grid size-educrat-course-grid" alt="" /></div>
                                                               </a>
                                                            </figure>
                                                            <span class="sale-label">{{$khoahoc->GiamGia}} %</span>
                                                         </div>
                                                      </div>
                                                      <div class="course-layout-content">
                                                         <div class="course-info-top">
                                                            <!-- rating -->
                                                         </div>
                                                      </div>
                                                      <!-- course title -->           
                                                      <h3 class="course-title"><a href="/course/detail/{{$khoahoc->id}}">{{$khoahoc->TenKhoaHoc}}</a></h3>
                                                      <div class="course-meta-middle">
                                                         <!-- number lessons -->
                                                        
                                                         <!-- time -->
                                                         <div class="course-duration course-meta-field">
                                                            <i class="fa-solid fa-timer"></i>
                                                            {{$khoahoc->ThoiLuongKhoaHoc}}                   
                                                         </div>
                                                         <div class="course-level course-meta-field">
                                                            <i class="fa-solid fa-laptop-code"></i>
                                                            {{$khoahoc->TenCapDo}}                        
                                                         </div>
                                                      </div>
                                                      <div class="course-meta-bottom d-flex align-items-center">
                                                         <!-- course teacher -->
                                                         <div class="lp-course-author d-flex align-items-center">
                                                            <div class="course-author__pull-left d-flex align-items-center justify-content-center">
                                                               <img decoding="async" loading="lazy" alt="Ali Tufan" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads//learn-press-profile/2/63d287ea071d7c542c93366748a91fbc.jpeg" class="avatar avatar-450 photo" height="495" width="450" />                        
                                                            </div>
                                                            <div class="author-title"><a href="https://demoapus1.com/educrat/learnpress/lp-profile/alitufan/"><span>{{$khoahoc->TenGiangVien}}</span></a></div>
                                                         </div>
                                                         <!-- price -->
                                                         <div class="course-meta-field course-meta-price ms-auto">
                                                            <div class="course-price">
                                                               <span class="origin-price">{{number_format($khoahoc->GiaCu)}} đ</span><span class="price">{{str_replace(',', '', rtrim(number_format($khoahoc->GiaMoi, 2, ',', '.'), '0'))}} đ</span>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                   @csrf
                                                   <input type="hidden" value="{{ $khoahoc->id }}" name="id">
                                                   <input type="hidden" value="{{ $khoahoc->TenKhoaHoc }}" name="makh">
                                                   <input type="hidden" value="{{ $khoahoc->AnhKhoaHoc }}" name="image">
                                                   <input type="hidden" value="{{ $khoahoc->GiaMoi }}"  name="giamoi">
                                                   <input type="hidden" value="1" name="quantity">
                                                   <button type="submit" class="px-4 py-2 text-white btn-primary rounded">Thêm vào giỏ hàng</button>
                                                </form>
                                             </div>
                                             
                                             
                                          </div>
                                          @endforeach
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               </section>
               
               
                
                  
                  

            </div>
         </div>
      </div>
      <!-- .site-main -->
   </div>
   <!-- .content-area -->
</div>
</section>
</div>
@endsection