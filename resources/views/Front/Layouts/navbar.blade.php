<div id="apus-header" class="apus-header no_keep_header d-none d-xl-block header-3-2843">
            <div data-elementor-type="wp-post" data-elementor-id="2843" class="elementor elementor-2843" data-elementor-settings="[]">
               <div class="elementor-section-wrap">
                  <section class="elementor-section elementor-top-section elementor-element elementor-element-708f7b3 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="708f7b3" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                     <div class="elementor-container elementor-column-gap-extended">
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-9de945f" data-id="9de945f" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-3c975df elementor-widget__width-auto elementor-widget elementor-widget-apus_element_logo" data-id="3c975df" data-element_type="widget" data-widget_type="apus_element_logo.default">
                                 <div class="elementor-widget-container">
                                    <div class="logo ">
                                       <a href="/home/index" >
                                       <span class="logo-main">
                                       <img width="140" height="50" src="https://demoapus1.com/educrat/learnpress/wp-content/uploads/2022/07/logo.svg" class="attachment-full size-full" alt="" decoding="async" loading="lazy" />                </span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-3776ede elementor-widget__width-auto elementor-widget elementor-widget-apus_element_vertical_menu" data-id="3776ede" data-element_type="widget" data-widget_type="apus_element_vertical_menu.default">
                                 <div class="elementor-widget-container">
                                    <div class="vertical-wrapper  show-hover">
                                       <span class="action-vertical d-flex align-items-center"><i class="icon-vertical"></i>
                                       <span class="title">
                                      Khám phá                    </span>
                                       </span>
                                       <div class="content-vertical">
                                          <ul id="vertical-menu" class="apus-vertical-menu nav">

                                             @foreach ($danhmucs as $danhmuc)
                                                <li id="menu-item-{{$danhmuc->madm}}" class="menu-item-{{$danhmuc->madm}} aligned-left"><a href="/course/category/{{$danhmuc->madm}}">{{$danhmuc->tendm}}</a></li>
                                             @endforeach
                                             
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-e9aef52" data-id="e9aef52" data-element_type="column">
                           <div class="elementor-widget-wrap elementor-element-populated">
                              <div class="elementor-element elementor-element-3b3aa15 elementor-widget__width-auto elementor-widget elementor-widget-apus_element_primary_menu" data-id="3b3aa15" data-element_type="widget" data-widget_type="apus_element_primary_menu.default">
                                 <div class="elementor-widget-container">
                                    <div class="main-menu  ">
                                       <nav data-duration="400" class="apus-megamenu animate navbar navbar-expand-lg" role="navigation">
                                          <div class="collapse navbar-collapse no-padding">
                                             <ul id="primary-menu" class="nav navbar-nav megamenu effect1">
                                                <li id="menu-item-86" class="menu-item-86 has-mega-menu aligned-left">
                                                   <a href="home/index"  >Trang chủ </a>
                                                 
                                                </li>
                                                <li id="menu-item-4408" class="menu-item-4408 has-mega-menu aligned-fullwidth">
                                                   <a href="/course/category/1" >Danh mục </b></a>
                                                  
                                                </li>
                                                <li id="menu-item-3920" class="dropdown menu-item-3920 aligned-left">
                                                   <a href="/blog/index" >Blog </b></a>
                                                  
                                                </li>
                                                <li id="menu-item-3920" class="dropdown menu-item-3920 aligned-left">
                                                   <a href="/course/favourites/user/10"   >Bộ sưu tập</a>
                                                  
                                                </li>
                                                <li id="menu-item-3920" class="dropdown menu-item-3920 aligned-left">
                                                   <a href="/admin/nguoidung/page"   >Admin</a>
                                                  
                                                </li>
                                                
                                             </ul>
                                          </div>
                                       </nav>
                                    </div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-54a4a12 elementor-widget__width-auto elementor-widget elementor-widget-apus_course_search_form" data-id="54a4a12" data-element_type="widget" data-widget_type="apus_course_search_form.default">
                                 <div class="elementor-widget-container">
                                    <div class="apus-search-form-course  button">
                                       <span class="search-button">
                                       <i class="flaticon-search"></i>
                                       </span>
                                       <div class="over-dark"></div>
                                       <form action="https://demoapus1.com/educrat/learnpress/courses/" method="get" class="search-form-popup">
                                          <div class="form-inner">
                                             <div class="search-form-course button">
                                                <div class="d-sm-flex align-items-center">
                                                   <input type="text" placeholder="What do you want to learn today?" name="c_search" class="form-control" autocomplete="off"/>
                                                   <input type="hidden" name="post_type" value="lp_course">
                                                   <button type="submit" class="btn btn-theme btn-search ms-auto">
                                                   <i class="flaticon-search"></i>                                    
                                                   </button>
                                                   <span class="close-search"><i class="ti-close"></i></span>
                                                </div>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-d4984ed elementor-widget__width-auto elementor-widget elementor-widget-apus_element_woo_header_cart" data-id="d4984ed" data-element_type="widget" data-widget_type="apus_element_woo_header_cart.default">
                                 <div class="elementor-widget-container">
                                    <div class="header-button-woo clearfix  ">
                                       <div class="pull-right">
                                          <div class="apus-topcart">
                                             <div class="cart">
                                                <a href="/cart">Giỏ hàng</a>
                                                
                                                
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-9e061c2 elementor-widget__width-auto elementor-widget elementor-widget-apus_element_user_info" data-id="9e061c2" data-element_type="widget" data-widget_type="apus_element_user_info.default">
                                 <div class="elementor-widget-container">
                                    <div class="top-wrapper-menu ">
                                       <a class="btn-login btn btn-sm btn-theme" href="/admin/account/home" title="Log in">
                                       Log in                </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="elementor-element elementor-element-9e061c2 elementor-widget__width-auto elementor-widget elementor-widget-apus_element_user_info" data-id="9e061c2" data-element_type="widget" data-widget_type="apus_element_user_info.default">
                                 <div class="elementor-widget-container">
                                    <form action="/logout" class="top-wrapper-menu " method="POST">
                                       @csrf
                                       <button type="submit" class="btn-login btn btn-sm btn-theme" title="Log in">
                                       Đăng xuất               </button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>

         

