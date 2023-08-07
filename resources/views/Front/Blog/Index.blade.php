@extends('Front.Layouts.layout')
@section('content')
<style>
.description {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 50px;
}
</style>
<div id="apus-main-content">
    <section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb ">
       <div class="container">
          <div class="wrapper-breads">
             <div class="wrapper-breads-inner">
                <ol class="breadcrumb">
                   <li><a href="https://demoapus1.com/educrat/learnpress">Home</a>  </li>
                   <li><span class="active">Blog</span></li>
                </ol>
             </div>
          </div>
       </div>
    </section>
    <section id="main-container" class="main-content home-page-default blog-only-main style-list container inner">
       <div class="row responsive-medium">
          <div id="main-content" class="col-12 col-12">
             <div id="main" class="site-main layout-blog" role="main">
                <header class="page-header d-none">
                   <h1 class="page-title">Archives</h1>
                </header>
                <!-- .page-header -->
                <div class="layout-posts-list">
                   <div class="row">
                     @foreach ($blogs as $blog)
                      <div class="col-xl-12 col-12">
                         <article class="post post-layout post-list-item post-3860 type-post status-publish format-standard has-post-thumbnail hentry category-gym category-primary tag-learn tag-lms tag-online">
                            <div class="d-sm-flex align-items-center">
                               <div class="top-image flex-shrink-0">
                                  <figure class="entry-thumb">
                                     <a class="post-thumbnail" href="/blog/detail/{{$blog->MaBaiViet}}" aria-hidden="true">
                                        <div class="image-wrapper"><img width="520" height="400" src="/images/blog/{{$blog->AnhMinhHoa}}" class="attachment-520x400x1x1 size-520x400x1x1" alt="{{$blog->TenBaiViet}}" /></div>
                                     </a>
                                  </figure>
                               </div>
                               <div class="col-content flex-grow-1">
                                  <div class="d-flex">
                                     <div class="list-categories"><a href="https://demoapus1.com/educrat/learnpress/category/gym/" class="categories-name">{{$blog->tendm}}</a></div>
                                     <div class="date">{{$blog->NgayDang}}</div>
                                  </div>
                                  <h4 class="entry-title">
                                     <a href="https://demoapus1.com/educrat/learnpress/10-marketing-trends-that-you-should-be-prepared-for-in-2022/">{{$blog->TenBaiViet}}</a>
                                  </h4>
                                  <div class="description">{{$blog->NoiDung}}</div>
                                  <a class="btn btn-readmore d-none d-md-inline-block" href="/blog/detail/{{$blog->MaBaiViet}}">Read More</a>
                               </div>
                            </div>
                         </article>
                      </div>
                  @endforeach
                   </div>
                </div>
               
                <!-- .navigation -->
             </div>
             <!-- .site-main -->
          </div>
          <!-- .content-area -->
       </div>
    </section>
    <div>
      {{ $blogs->links() }}
    </div>
 </div>
 @endsection