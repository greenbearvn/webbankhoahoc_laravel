
<!DOCTYPE html>
<html lang="zxx">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Marketing</title>
    <link rel="icon" href="favicons/1705-img-logo.png" type="image/png">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="/assets/Admin/css/css-bootstrap1.min.css">

    <link rel="stylesheet" href="/assets/Admin/css/themefy_icon-themify-icons.css">

    <link rel="stylesheet" href="/assets/Admin/css/css-nice-select.css">

    <link rel="stylesheet" href="/assets/Admin/css/css-owl.carousel.css">

    <link rel="stylesheet" href="/assets/Admin/css/gijgo-gijgo.min.css">

    <link rel="stylesheet" href="/assets/Admin/css/css-all.min.css">
    <link rel="stylesheet" href="/assets/Admin/css/tagsinput-tagsinput.css">

    <link rel="stylesheet" href="/assets/Admin/css/datepicker-date-picker.css">

    <link rel="stylesheet" href="/assets/Admin/css/scroll-scrollable.css">

    <link rel="stylesheet" href="/assets/Admin/css/css-jquery.dataTables.min.css">
    <link rel="stylesheet" href="/assets/Admin/css/css-responsive.dataTables.min.css">
    <link rel="stylesheet" href="/assets/Admin/css/css-buttons.dataTables.min.css">
    <link rel="stylesheet" href="/assets/Admin/css/bostrap4.datatable">

    <link rel="stylesheet" href="/assets/Admin/css/text_editor-summernote-bs4.css">

    <link rel="stylesheet" href="/assets/Admin/css/morris-morris.css">

    <link rel="stylesheet" href="/assets/Admin/css/material_icon-material-icons.css">

    <link rel="stylesheet" href="/assets/Admin/css/css-metisMenu.css">

    <link rel="stylesheet" href="/assets/Admin/css/css-style1.css">
    <link rel="stylesheet" href="/assets/Admin/css/colors-default.css" id="colorSkinCSS">

    <link href="/assets/Admin/css/pagination.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="crm_body_bg" ng-app="myApp">

        <div ng-controller="Favourite">
            <nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
                <div class="logo d-flex justify-content-between">
                    <a href="/Home/Index"><h3>EDUCATE</h3></a>
                    <div class="sidebar_close_icon d-lg-none">
                        <i class="ti-close"></i>
                    </div>
                </div>
                <ul >
                    @foreach($courses as $course)
                    <li class="mm-active" style="margin: 30px">
                        <a  ng-click="GetLession({{$course->id}})" aria-expanded="false">
                            <span>{{$course->TenKhoaHoc}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>
        
        
        
            <section class="main_content dashboard_part large_header_bg">
        
                <div class="container-fluid g-0">
                    <div class="row">
                        <div class="col-lg-12 p-0 ">
                            <div class="header_iner d-flex justify-content-between align-items-center" style="margin-bottom:13%">
                                <div class="sidebar_icon d-lg-none">
                                    <i class="ti-menu"></i>
                                </div>
                                <div class="serach_field-area d-flex align-items-center">
                                    <div class="search_inner">
                                        <form action="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search here...">
                                            </div>
                                            <button type="submit"> <img src="/assets/Admin/images/icon-icon_search.svg" alt=""> </button>
                                        </form>
                                    </div>
                                    <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                                </div>
                                <div class="header_right d-flex justify-content-between align-items-center">
                                    <div class="header_notification_warp d-flex align-items-center">
                                        <li>
                                            <a class="bell_notification_clicker nav-link-notify" href="#">
                                                <img src="/assets/Admin/images/icon-bell.svg" alt="">
                                            </a>
        
                                            <div class="Menu_NOtification_Wrap">
                                                <div class="notification_Header">
                                                    <h4>Notifications</h4>
                                                </div>
                                                <div class="Notification_body">
        
                                                    <div class="single_notify d-flex align-items-center">
                                                        <div class="notify_thumb">
                                                            <a href="#"><img src="/assets/Admin/images/staf-2.png" alt=""></a>
                                                        </div>
                                                        <div class="notify_content">
                                                            <a href="#"><h5>Cool Marketing </h5></a>
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                        </div>
                                                    </div>
        
                                                    <div class="single_notify d-flex align-items-center">
                                                        <div class="notify_thumb">
                                                            <a href="#"><img src="/assets/Admin/images/staf-4.png" alt=""></a>
                                                        </div>
                                                        <div class="notify_content">
                                                            <a href="#"><h5>Awesome packages</h5></a>
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                        </div>
                                                    </div>
        
                                                    <div class="single_notify d-flex align-items-center">
                                                        <div class="notify_thumb">
                                                            <a href="#"><img src="/assets/Admin/images/staf-3.png" alt=""></a>
                                                        </div>
                                                        <div class="notify_content">
                                                            <a href="#"><h5>what a packages</h5></a>
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                        </div>
                                                    </div>
        
                                                    <div class="single_notify d-flex align-items-center">
                                                        <div class="notify_thumb">
                                                            <a href="#"><img src="/assets/Admin/images/staf-2.png" alt=""></a>
                                                        </div>
                                                        <div class="notify_content">
                                                            <a href="#"><h5>Cool Marketing </h5></a>
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                        </div>
                                                    </div>
        
                                                    <div class="single_notify d-flex align-items-center">
                                                        <div class="notify_thumb">
                                                            <a href="#"><img src="/assets/Admin/images/staf-4.png" alt=""></a>
                                                        </div>
                                                        <div class="notify_content">
                                                            <a href="#"><h5>Awesome packages</h5></a>
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                        </div>
                                                    </div>
        
                                                    <div class="single_notify d-flex align-items-center">
                                                        <div class="notify_thumb">
                                                            <a href="#"><img src="/assets/Admin/images/staf-3.png" alt=""></a>
                                                        </div>
                                                        <div class="notify_content">
                                                            <a href="#"><h5>what a packages</h5></a>
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nofity_footer">
                                                    <div class="submit_button text-center pt_20">
                                                        <a href="#" class="btn_1">See More</a>
                                                    </div>
                                                </div>
                                            </div>
        
                                        </li>
                                        <li>
                                            <a class="CHATBOX_open nav-link-notify" href="#"> <img src="/assets/Admin/images/icon-msg.svg" alt=""> </a>
                                        </li>
                                    </div>
                                    <div class="profile_info">
                                        <img src="/assets/Admin/images/img-client_img.png" alt="#">
                                        <div class="profile_info_iner">
                                            <div class="profile_author_name">
                                                <p>Neurologist </p>
                                                <h5>Dr. Robar Smith</h5>
                                            </div>
                                            <div class="profile_info_details">
                                                <a href="#">My Profile </a>
                                                <a href="#">Settings</a>
                                                <form method="POST" action="/logout">
                                                    @csrf
                                                    <button type="submit">Log Out</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="list-group">
                    <ul>
                        <li ng-repeat="i in lessions">
                            <a href="#" class="list-group-item list-group-item-action">@{{i.TenBaiHoc}}</a>
                        </li>
                    </ul>
                    
                </div>
                

                <div id="back-top" style="display: none;">
                    <a title="Go to Top" href="#">
                        <i class="ti-angle-up"></i>
                    </a>
                </div>
            </section>
        </div>

 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>

'use strict';

        const myApp = angular.module("myApp", []).config(['$qProvider', ($qProvider) => {
            $qProvider.errorOnUnhandledRejections(false);
        }]);

        myApp.controller("Favourite", ($scope, $http) => {
            $scope.GetLession = (id) => {
                $http({
                    method: "GET",
                    url: `/course/favourites/lession/${Number(id)}`
                }).then((res) => {
                    $scope.lessions = res.data;
                    console.log($scope.lessions);
                });
            };
        });
         
      </script>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="/assets/Admin/js/97-js-jquery1-3.4.1.min.js"></script>

        <script src="/assets/Admin/js/2771-js-popper1.min.js"></script>

        <script src="/assets/Admin/js/9754-js-bootstrap1.min.js"></script>

        <script src="/assets/Admin/js/1174-js-metisMenu.js"></script>

        <script src="/assets/Admin/js/count_up-jquery.waypoints.min.js"></script>

        <script src="/assets/Admin/js/chartlist-Chart.min.js"></script>

        <script src="/assets/Admin/js/count_up-jquery.counterup.min.js"></script>

        <script src="/assets/Admin/js/js-jquery.nice-select.min.js"></script>

        <script src="/assets/Admin/js/js-owl.carousel.min.js"></script>

        <script src="/assets/Admin/js/js-jquery.dataTables.min.js"></script>
        <script src="/assets/Admin/js/js-dataTables.responsive.min.js"></script>
        <script src="/assets/Admin/js/js-dataTables.buttons.min.js"></script>
        <script src="/assets/Admin/js/js-buttons.flash.min.js"></script>
        <script src="/assets/Admin/js/js-jszip.min.js"></script>
        <script src="/assets/Admin/js/js-pdfmake.min.js"></script>
        <script src="/assets/Admin/js/js-vfs_fonts.js"></script>
        <script src="/assets/Admin/js/js-buttons.html5.min.js"></script>
        <script src="/assets/Admin/js/js-buttons.print.min.js"></script>
        <script src="/assets/Admin/js/2476-js-chart.min.js"></script>

        <script src="/assets/Admin/js/progressbar-jquery.barfiller.js"></script>

        <script src="/assets/Admin/js/tagsinput-tagsinput.js"></script>

        <script src="/assets/Admin/js/text_editor-summernote-bs4.js"></script>
        <script src="/assets/Admin/js/am_chart-amcharts.js"></script>

        <script src="/assets/Admin/js/scroll-perfect-scrollbar.min.js"></script>
        <script src="/assets/Admin/js/scroll-scrollable-custom.js"></script>
        <script src="/assets/Admin/js/chart_am-core.js"></script>
        <script src="/assets/Admin/js/chart_am-charts.js"></script>
        <script src="/assets/Admin/js/chart_am-animated.js"></script>
        <script src="/assets/Admin/js/chart_am-kelly.js"></script>
        <script src="/assets/Admin/js/chart_am-chart-custom.js"></script>

        <script src="/assets/Admin/js/4235-js-custom.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.1.min.js"></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
</body>
</html>
