
@extends('Front.Layouts.layout')

@section('content')
<div id="apus-main-content" ng-controller="Account">
            <section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb ">
               <div class="container">
                  <div class="wrapper-breads">
                     <div class="wrapper-breads-inner">
                        <ol class="breadcrumb">
                           <li><a href="https://demoapus1.com/educrat/learnpress">Home</a>  </li>
                           <li><span class="active">Profile</span></li>
                        </ol>
                     </div>
                  </div>
               </div>
            </section>
            <section id="main-container" class="container inner">
               <div class="row">
                  <div id="main-content" class="main-page col-12">
                     <div id="main" class="site-main clearfix" role="main">
                        <div class="learnpress">
                           <div id="learn-press-profile"  class="lp-user-profile guest">
                              <div class="lp-content-area">
                                 <ul class="nav nav-tabs-account" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                       <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Đăng nhập</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Đăng ký</button>
                                    </li>
                                 </ul>
                                 <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                       <div class="learn-press-form-login learn-press-form">
                                          <h3>Đăng nhập</h3>

                                          <form action="{{ route('user.login') }}" method="POST">
                                             @csrf
                                             <ul class="form-fields">
                                                <li class="form-field">
                                                   <label for="username">Email&nbsp;<span class="required">*</span></label>
                                                   <input type="email" name="email" id="username" placeholder="Email or username" autocomplete="username" />
                                                </li>
                                                <li class="form-field">
                                                   <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                                                   <input type="password" name="password" id="password" placeholder="Password" autocomplete="current-password" ng-model="password"/>
                                                </li>
                                             </ul>
                                             <p>   
                                                <label>
                                                <input type="checkbox" name="rememberme"/>
                                                Nhớ tôi		</label>
                                             </p>
                                             <p>
                                                <input type="hidden" name="learn-press-login-nonce" value="154c79b659">
                                                <button type="submit" >Mật khẩu</button>
                                             </p>
                                             <p>
                                                <a href="https://demoapus1.com/educrat/learnpress/my-account/lost-password/">Quên mật khẩu?</a>
                                             </p>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                       <div class="learn-press-form-register learn-press-form">
                                          <h3>Register</h3>
                                          <form name="learn-press-register" action="{{ route('register') }}"  method="POST">
                                             @csrf
                                             <input type="hidden"  />
                                             <ul class="form-fields">
                                                <li class="form-field">
                                                   <label for="reg_username">Email&nbsp;<span class="required">*</span></label>
                                                   <input id ="reg_username" name="email" type="text" placeholder="Username" autocomplete="username" value="">
                                                </li>
                                                <li class="form-field">
                                                   <label for="reg_username">Tên người dùng&nbsp;<span class="required">*</span></label>
                                                   <input id ="reg_username" name="name" type="text" placeholder="Username" autocomplete="username" value="">
                                                </li>
                                                <li class="form-field">
                                                   <label for="reg_password">Mật khẩu&nbsp;<span class="required">*</span></label>
                                                   <input id ="reg_password" name="password" type="password" placeholder="Password" autocomplete="new-password">
                                                </li>
                                                <li class="form-field">
                                                   <label for="reg_password2">Nhập lại mật khẩu&nbsp;<span class="required">*</span></label>
                                                   <input id ="reg_password2" name="password_confirmation" type="password" placeholder="Password" autocomplete="off">
                                                </li>
                                             </ul>
                                             <p>
                                                <input type="hidden" id="learn-press-register-nonce" name="learn-press-register-nonce" value="c76087de3c" /><input type="hidden" name="_wp_http_referer" value="/educrat/learnpress/lp-profile/" />			<button type="submit">Đăng ký</button>
                                             </p>
                                          </form>

                                 </div>
                              </div>
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