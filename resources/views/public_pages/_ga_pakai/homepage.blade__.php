@extends('templates.landing-template')
@section('container')
@include('public-pages.parts.landing-header')


{{-- Tentang Kami --}}
<section class="bg-grey p-100">
  <div class="row d-flex justify-content-center">
    <div class="col-12 col-lg-6 full-xl wow fadeInDown p-0">
      <div class="container-fluid gradient-primary p-5">
        <h3 class="text-white">Tentang Kami</h3>
        <hr class="hr-width" />
        <p class="text-white">
          Alidata Technology adalah Perusahaan yang fokus pada Solusi Kebutuhan Produk dan Layanan IT.
          Sejak 2013
          kami terus membantu semua tingkat lembaga dan industri
          dalam menciptakan inovasi-inovasi dengan pemanfaatan sistem informasi yang andal dan
          terintegrasi
          bagi pemerintah dan masyarakat Indonesia.
        </p>
        <a href="#" class="btn submit-btn px-4 mt-3">
          Baca Selengkapnya
        </a>
      </div>
    </div>
  </div>
</section>
{{-- End Tentang Kami --}}

{{-- Produk --}}
<section class="bg-grey-darken section_padding_0_50 p-150 clearfix" id="features">
  <div class="container-fluid">
    <x-landing-title-and-body-comp title="Teleh mengerjakan Proyek" titleClass="text-gradient">
      @slot('body')
      <h5 class="text-body mb-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deleniti necessitatibus nihil
        laboriosam.
        Impedit, veritatis vero repellat et reprehenderit aperiam.
      </h5>
      @endslot
    </x-landing-title-and-body-comp>
    <div class="row d-flex justify-content-center">
      @for ($i = 0; $i < 3; $i++) <div class="col-lg-4 col-md-6 col-12 mt-4 wow fadeInDown my-4 my-md-0">
        <div class="card shadow border-0">
          <a href="#">
            <img class="card-img-top img-fluid" src="{{ asset('vuexy/landing/img/scr-img/default-menu.jpg') }}" alt="Apps Image">
          </a>
          <div class="card-body">
            <h3 class="mb-2 fw-bold">E-Kinerja</h3>
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="#" target="_blank">
                Web
              </a>
              <a class="btn btn-secondary btn-sm" href="#" target="_blank">
                Android
              </a>
              <a class="btn btn-secondary btn-sm" href="#" target="_blank">
                Mesin Fingerprint
              </a>
            </div>
            <small class="text-muted">Jan 10, 2020</small>
            <h5 class="card-text blog-content-truncate">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora, maiores? In harum
              distinctio a repellendus?
            </h5>
            <a href="#" class="btn submit-btn btn-block mt-4">
              Lihat Produk
            </a>
          </div>
        </div>
    </div>
    @endfor
  </div>
  </div>
</section>
{{-- End Produk --}}

{{-- Layanan --}}
<section class="bg-grey section_padding_0_50 p-150 clearfix" id="features">
  <div class="container-fluid">
    <x-landing-title-and-body-comp title="Layanan terbaik dan terpercaya!" titleClass="text-gradient">
      @slot('body')
      <h5 class="text-body mb-4">
        Sejak 2013, Seluruh Produk-produk Alidata sangat berfokus dalam kemudahan penggunaan, penerapan, dan
        pengelolaan serta layanan pelanggan 24 Jam.
      </h5>
      @endslot
    </x-landing-title-and-body-comp>
    <div class="row">
      <div class="col-12">
        <div class="card-body">
          <div class="swiper-centered-slides swiper-container p-1">
            <div class="swiper-wrapper">
              @for ($i = 0; $i < 5; $i++) <div class="swiper-slide rounded swiper-shadow px-4 wow fadeInRight">
                <div style="width: 30rem;">
                  <div class="text-gradient mb-4">
                    <span class="ti-layout text-medium"></span>
                  </div>
                  <div>
                    <h5 class="fw-bold">Web Development</h5>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt,
                      rem
                      officia ratione perferendis tempore eveniet provident officiis ex
                      libero
                      quisquam esse quae hic obcaecati nulla dolore explicabo velit
                      possimus
                      nesciunt? At adipisci a numquam, culpa commodi dicta tempore labore
                      recusandae laboriosam distinctio sapiente voluptatum iure nulla
                      totam fugiat
                      incidunt nobis.
                    </p>
                  </div>
                </div>
            </div>
            @endfor
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
{{-- End Layanan --}}

{{-- Visi & Misi --}}
<section class="package text-center p-5 bg-primary">
  <div class="package">
    <x-landing-title-and-body-comp title="Visi & Misi" titleClass="text-white">
      @slot('body')
      <p class="text-white mb-4">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio eaque doloribus quisquam ipsa iure
        maiores, temporibus magnam quod aspernatur facilis?
      </p>
      @endslot
    </x-landing-title-and-body-comp>
    <div class="row d-flex justify-content-center text-center">
      <div class="col-md-6 col-xl-5 wow fadeInLeft">
        <div class="bg-white border-radius-5 shadow-1 my-4 my-md-0">
          <div class="px-4 py-4 px-md-5 py-md-3">
            <h2 class="fw-bold text-gradient mb-4">
              Visi
            </h2>
            <blockquote class="blockquote px-4 py-3 border-start-primary border-start-3 bg-light">
              <p class="text-left">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet consectetur quaerat
                impedit rem exercitationem quos, beatae voluptas incidunt architecto inventore
                corrupti
                laudantium officia totam molestiae minus? Officia quisquam repellendus incidunt.
                Amet
                repellendus iusto sapiente assumenda dicta eaque necessitatibus quisquam tempore
                quibusdam velit quidem quaerat, nesciunt iste odio. Omnis, sapiente quia!
              </p>
            </blockquote>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-5 wow fadeInRight">
        <div class="bg-white border-radius-5 shadow-1 my-4 my-md-0">
          <div class="px-4 py-4 px-md-5 py-md-3">
            <h2 class="fw-bold text-gradient mb-4">
              Misi
            </h2>
            <blockquote class="blockquote px-4 py-3 border-start-primary border-start-3 bg-light">
              <p class="text-left">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet consectetur quaerat
                impedit rem exercitationem quos, beatae voluptas incidunt architecto inventore
                corrupti
                laudantium officia totam molestiae minus? Officia quisquam repellendus incidunt.
                Amet
                repellendus iusto sapiente assumenda dicta eaque necessitatibus quisquam tempore
                quibusdam velit quidem quaerat, nesciunt iste odio. Omnis, sapiente quia!
              </p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- End Visi & Misi --}}

{{-- Blog --}}
<section class="bg-white p-150" id="applications">
  <div class="special_description_area">
    <div class="container-fluid">
      <x-landing-title-and-body-comp title="Blog" titleClass="text-gradient">
        @slot('body')
        <p class="text-body mb-4">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio eaque doloribus quisquam ipsa iure
          maiores, temporibus magnam quod aspernatur facilis?
        </p>
        @endslot
      </x-landing-title-and-body-comp>
      <div class="row d-flex justify-content-center">
        @for ($i = 0; $i < 3; $i++) <div class="col-12 col-md-6 col-lg-4">
          <div class="card shadow border-0 wow fadeInDown">
            <a href="#">
              <img class="card-img-top img-fluid" src="{{ asset('vuexy/app-assets/images/slider/02.jpg') }}" alt="Blog Post pic" />
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#" class="blog-title-truncate text-body-heading">The
                  Best Features Coming to iOS and Web design</a>
              </h4>
              <div class="d-flex">
                <div class="avatar me-50">
                  <img src="{{ asset('vuexy/app-assets/images/portrait/small/avatar-s-7.jpg') }}" alt="Avatar" width="24" height="24" />
                </div>
                <div class="author-info">
                  <small class="text-muted me-25">by</small>
                  <small><a href="#" class="text-body">Ghani Pradita</a></small>
                  <span class="text-muted ms-50 me-25">|</span>
                  <small class="text-muted">Jan 10, 2020</small>
                </div>
              </div>
              <div class="my-1 py-25">
                <a href="#">
                  <span class="badge rounded-pill badge-light-info me-50">Quote</span>
                </a>
                <a href="#">
                  <span class="badge rounded-pill badge-light-primary">Fashion</span>
                </a>
              </div>
              <h5 class="card-text blog-content-truncate">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora, maiores? In harum
                distinctio a repellendus?
              </h5>
              <hr />
              <div class="d-flex justify-content-between align-items-center">
                <a href="page-blog-detail.html#blogComment">
                  <div class="d-flex align-items-center">
                    <i class="fa-solid fa-eye me-50 font-medium-1 text-body"></i>
                    <span class="text-body fw-bold">76</span>
                  </div>
                </a>
                <a href="page-blog-detail.html" class="fw-bold text-gradient">Selengkapnya</a>
              </div>
            </div>
          </div>
      </div>
      @endfor
    </div>
    <div class="d-flex justify-content-end">
      <a href="#" class="btn submit-btn px-4">
        Blog Lainnya
      </a>
    </div>
  </div>
  </div>
</section>
{{-- End Blog --}}



{{-- <!-- ***** Cool Facts Area Start ***** -->
  <section class="cool-facts-area clearfix">
    <div class="container-fluid">
      <div class="row text-center">
        <!-- Single Cool Fact-->
        <div class="col-lg-3 col-6 mt-4">
          <div class="single-cool-fact wow fadeInUp" data-wow-delay="0.2s">
            <div class="counter-area">
              <h3><span class="counter">9</span></h3>
            </div>
            <div class="cool-facts-content">
              <p>Applications</p>
            </div>
          </div>
        </div>
        <!-- Single Cool Fact-->
        <div class="col-lg-3 col-6 mt-4">
          <div class="single-cool-fact wow fadeInUp" data-wow-delay="0.6s">
            <div class="counter-area">
              <h3><span class="counter">50</span>+</h3>
            </div>
            <div class="cool-facts-content">
              <p>Components</p>
            </div>
          </div>
        </div>
        <!-- Single Cool Fact-->
        <div class="col-lg-3 col-6 mt-4">
          <div class="single-cool-fact wow fadeInUp" data-wow-delay="0.8s">
            <div class="counter-area">
              <h3><span class="counter">100</span>+</h3>
            </div>
            <div class="cool-facts-content">
              <p>Cards</p>
            </div>
          </div>
        </div>
        <!-- Single Cool Fact-->
        <div class="col-lg-3 col-6 mt-4">
          <div class="single-cool-fact wow fadeInUp" data-wow-delay="0.4s">
            <div class="counter-area">
              <h3><span class="counter">100</span>+</h3>
            </div>
            <div class="cool-facts-content">
              <p>Pages</p>
            </div>
          </div>
        </div>
        <!-- Single Cool Fact-->
      </div>
    </div>
  </section>
  <!-- ***** Cool Facts Area End ***** --> 

  <!-- ***** Advance Cards ***** -->
  <section class="bg-grey p-150" id="cards">
    <div class="special_description_area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <div class="section-heading">
              <h2>Advanced Cards</h2>
            </div>
            <p>
              Vuexy Admin provides 100+ basic & advanced cards for eCommerce, Analytics <br />
              Statistics, Charts, Maps and Interactive.
            </p>
          </div>
          <div class="col-12 text-center">
            <a href="../html/ltr/vertical-menu-template/card-statistics.html" target="_blank"><img src="img/scr-img/cards.png" alt="Cards Image" /></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Advance Cards End ***** -->
  <!-- ***** Apps & Pages ***** -->
  <section class="bg-white p-150" id="pages">
    <div class="special_description_area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <div class="section-heading">
              <h2>Pages</h2>
            </div>
            <p>
              Vuexy Admin provides 100+ pages. It contains all the commonly used pages to <br />
              develop any applications which will ease the developer's efforts.
            </p>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/page-knowledge-base.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/page/knowledge-base" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="../html/ltr/vertical-menu-template/page-knowledge-base.html" target="_blank"><img class="border-grey" src="img/scr-img/page-2.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">Knowledge Base</h5>
            <div class="btn-group mt-2" role="group" aria-label="Knowledge Base"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/page-profile.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/page/profile" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/page/profile" target="_blank"><img class="border-grey" src="img/scr-img/page-1.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">Profile</h5>
            <div class="btn-group mt-2" role="group" aria-label="Profile"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/page-faq.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/page/faq" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="../html/ltr/vertical-menu-template/page-faq.html" target="_blank"><img class="border-grey" src="img/scr-img/page-8.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">FAQ</h5>
            <div class="btn-group mt-2" role="group" aria-label="Basic example"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/page-misc-coming-soon.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/page/coming-soon" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="../html/ltr/vertical-menu-template/page-misc-coming-soon.html" target="_blank"><img class="border-grey" src="img/scr-img/page-5.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">Coming Soon...</h5>
            <div class="btn-group mt-2" role="group" aria-label="Basic example"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/page-blog-list.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/page/blog/list" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="../html/ltr/vertical-menu-template/page-blog-list.html" target="_blank"><img class="border-grey" src="img/scr-img/page-4.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">Blog</h5>
            <div class="btn-group mt-2" role="group" aria-label="Basic example"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/page-auth-login-v2.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/auth/login-v2" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="../html/ltr/vertical-menu-template/page-auth-login-v2.html" target="_blank"><img class="border-grey" src="img/scr-img/page-6.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">Authentication</h5>
            <div class="btn-group mt-2" role="group" aria-label="Basic example"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/page-account-settings.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/page/account-settings" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="../html/ltr/vertical-menu-template/page-account-settings.html" target="_blank"><img class="border-grey" src="img/scr-img/page-7.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">Account Settings</h5>
            <div class="btn-group mt-2" role="group" aria-label="Basic example"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/page-pricing.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/page/pricing" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="../html/ltr/vertical-menu-template/page-pricing.html" target="_blank"><img class="border-grey" src="img/scr-img/page-3.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">Pricing</h5>
            <div class="btn-group mt-2" role="group" aria-label="Under Maintenance"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-5 text-center image-hover wow fadeInDown">
            <div class="mb-4">
              <a class="btn btn-secondary btn-sm" href="../html/ltr/vertical-menu-template/dashboard-ecommerce.html" target="_blank">HTML Demo</a>
              <a class="btn btn-secondary btn-sm" href="https://pixinvent.com/demo/vuexy-bootstrap-laravel-admin-template/demo-1/" target="_blank">HTML + Laravel Demo</a>
            </div>
            <a href="../html/ltr/vertical-menu-template/dashboard-ecommerce.html" target="_blank"><img class="border-grey" src="img/scr-img/page-9.jpg" alt="Pages Image" /></a>
            <h5 class="mt-4 mb-0">And More...</h5>
            <div class="btn-group mt-2" role="group" aria-label="Basic example"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Apps & Pages End ***** -->
  <!-- ***** Build Process ***** -->
  <section class="cool-facts-area p-150" id="build-process">
    <div class="section-heading-white text-center">
      <img src="img/scr-img/gitlab-icon.png" class="git-bg" alt="GitLab" />
      <h4 class="text-white mt-2">Gitlab</h4>
      <p class="text-white mt-4">
        You can join Vuexy Admin Gitlab repository to access the latest changes, <br />bug fixes and features without
        having to wait for a new ThemeForest release.
      </p>
      <a class="btn purchase-btn mt-3 px-4" href="https://pixinvent.com/gitlab-access-provider-for-envato" target="_blank"><span>Join Vuexy Admin on Gitlab</span></a>
    </div>
  </section>
  <!-- ***** Build Process End ***** -->
  <!-- ***** Components ***** -->
  <section class="bg-grey p-150 pb-150" id="components">
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-12 mb-b">
          <!-- Heading Text -->
          <div class="section-heading">
            <h2>Components</h2>
          </div>
          <p class="mb-5">
            We have used most popular Vuexy components and combined them with useful components. <br />
            Themed them with same UI of vuexy principles and created a perfect design harmony.
          </p>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-alerts.html" target="_blank">
            <div class="h1 ti-alert" aria-hidden="true"></div>
            <p>Alerts</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ex-component-avatar.html" target="_blank">
            <div class="h1 ti-user" aria-hidden="true"></div>
            <p>Avatar</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-breadcrumbs.html" target="_blank">
            <div class="h1 ti-layout-menu-separated" aria-hidden="true"></div>
            <p>Breadcrumb</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ext-component-noui-slider.html" target="_blank">
            <div class="h1 ti-line-dotted" aria-hidden="true"></div>
            <p>Slider</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-collapse.html" target="_blank">
            <div class="h1 ti-layout-accordion-merged" aria-hidden="true"></div>
            <p>Collapse</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/icons-feather.html" target="_blank">
            <div class="h1 ti-bolt" aria-hidden="true"></div>
            <p>Icons</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/content-typography.html" target="_blank">
            <div class="h1 ti-text" aria-hidden="true"></div>
            <p>Typography</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-buttons-basic.html" target="_blank">
            <div class="h1 ti-link" aria-hidden="true"></div>
            <p>Buttons</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-dropdowns.html" target="_blank">
            <div class="h1 ti-angle-down" aria-hidden="true"></div>
            <p>Dropdowns</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-modals.html" target="_blank">
            <div class="h1 ti-layout" aria-hidden="true"></div>
            <p>Modals</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-tabs-component.html" target="_blank">
            <div class="h1 ti-layout-tab-window" aria-hidden="true"></div>
            <p>Tabs</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-badges.html" target="_blank">
            <div class="h1 ti-medall-alt" aria-hidden="true"></div>
            <p>Badge</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-progress.html" target="_blank">
            <div class="h1 ti-layout-menu" aria-hidden="true"></div>
            <p>Progress</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/form-select.html" target="_blank">
            <div class="h1 ti-layout-media-left" aria-hidden="true"></div>
            <p>Select</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/table.html" target="_blank">
            <div class="h1 ti-layout-column3" aria-hidden="true"></div>
            <p>Tables</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/form-wizard.html" target="_blank">
            <div class="h1 ti-layout-cta-left" aria-hidden="true"></div>
            <p>Wizard</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/form-validation.html" target="_blank">
            <div class="h1 ti-check" aria-hidden="true"></div>
            <p>Validation</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ex-component-divider.html" target="_blank">
            <div class="h1 ti-split-v" aria-hidden="true"></div>
            <p>Divider</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ext-component-quill-editor.html" target="_blank">
            <div class="h1 ti-pencil" aria-hidden="true"></div>
            <p>Editor</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-list-group.html" target="_blank">
            <div class="h1 ti-layout-list-post" aria-hidden="true"></div>
            <p>List</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-carousel.html" target="_blank">
            <div class="h1 ti-layout-sidebar-left" aria-hidden="true"></div>
            <p>Carousel</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ext-component-drag-drop.html" target="_blank">
            <div class="h1 ti-hand-drag" aria-hidden="true"></div>
            <p>Drag &amp; Drop</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ext-component-file-uploader.html" target="_blank">
            <div class="h1 ti-export" aria-hidden="true"></div>
            <p>Upload</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/component-spinner.html" target="_blank">
            <div class="h1 ti-reload" aria-hidden="true"></div>
            <p>Spinner</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/form-date-time-picker.html" target="_blank">
            <div class="h1 ti-calendar" aria-hidden="true"></div>
            <p>Date Picker</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ext-component-tour.html" target="_blank">
            <div class="h1 ti-direction" aria-hidden="true"></div>
            <p>Tour</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ext-component-clipboard.html" target="_blank">
            <div class="h1 ti-notepad" aria-hidden="true"></div>
            <p>Clipboard</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/ext-component-context-menu.html" target="_blank">
            <div class="h1 ti-menu" aria-hidden="true"></div>
            <p>Context Menu</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/chart-apex.html" target="_blank">
            <div class="h1 ti-bar-chart" aria-hidden="true"></div>
            <p>Charts</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/maps-google.html" target="_blank">
            <div class="h1 ti-map" aria-hidden="true"></div>
            <p>Map</p>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6 mt-40 icon-hover">
          <a href="../html/ltr/vertical-menu-template/index-2.html" target="_blank">
            <div class="h1 ti-more" aria-hidden="true"></div>
            <p>More</p>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Components End ***** -->
  <!-- ***** FAQ Start ***** -->
  <section class="app-screenshots-area bg-white section_padding_0_100 clearfix p-150" id="faq">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <!-- Heading Text -->
          <div class="section-heading">
            <h2>FAQ</h2>
          </div>
          <p class="mt-5">
            Got a question? We've got answers. If you have some other questions, see our
            <a href="https://pixinvent.ticksy.com/" target="_blank">support center.</a>
          </p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="accordion" id="accordionExample">
          <div class="card border-radius-15 mb-2">
            <div class="card-header border-radius-15 border-radius-15" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Do you charge for each upgrade?
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <p class="text-sm">
                  Not at all. Once you purchase a license, you'll receive all future releases for free.
                </p>
              </div>
            </div>
          </div>
          <div class="card border-radius-15 mb-2">
            <div class="card-header border-radius-15" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Do I need to purchase a license for each website?
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <p class="text-sm">
                  Yes, you need to have a separate license for each website. You might need to purchase extended
                  license for your web application.
                </p>
              </div>
            </div>
          </div>
          <div class="card border-radius-15 mb-2">
            <div class="card-header border-radius-15" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  What is regular license?
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <p class="text-sm">
                  Regular license can be used for end products that do not charge users for access or service(access
                  is free and there will be no monthly subscription fee). Single regular license can be used for
                  single end product and end product can be used by you or your client. If you want to sell end
                  product to multiple clients then you will need to purchase separate license for each client. The
                  same rule applies if you want to use the same end product on multiple domains(unique setup). For
                  more info on regular license you can check official description.
                </p>
              </div>
            </div>
          </div>
          <div class="card border-radius-15 mb-2">
            <div class="card-header border-radius-15" id="headingFour">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  What is extended license?
                </button>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                <p class="text-sm">
                  Extended license can be used for end products(web service or SAAS) that charges users for access or
                  service(e.g: monthly subscription fee). Single extended license can be used for single end product
                  and end product can be used by you or your client. If you want to sell end product to multiple
                  clients then you will need to purchase separate extended license for each client. The same rule
                  applies if you want to use the same end product on multiple domains(unique setup). For more info on
                  extended licenses you can check official description.
                </p>
              </div>
            </div>
          </div>
          <div class="card border-radius-15 mb-2">
            <div class="card-header border-radius-15" id="headingFive">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Which license is applicable for SASS application?
                </button>
              </h5>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
              <div class="card-body">
                <p class="text-sm">
                  If you are charging your customer for using your SASS based application you must buy an Extended
                  License for each end product. If you aren't charging your customer then purchase Regular License for
                  each end product.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** FAQ End *****====== --> --}}



<!-- ***** Pricing Plane Area Start *****==== -->
{{-- <section class="pricing-plane-area bg-grey p-50 clearfix" id="pricing">
        <div class="row">
            <div class="offset-lg-1"></div>
            <div class="col-12 col-lg-5 col-mg-6 full-xl wow fadeIn p-0">
                <div class="container-fluid gradient-primary p-5 mb-4">
                    <h3 class="text-white">Regular License</h3>
                    <hr class="hr-width" />
                    <p class="text-offwhite">
                        Use by you or your one client in a single end product which
                        <b class="text-white">end users are not charged.</b>
                    </p>
                    <p class="text-offwhite m-1"><span class="ti-check mr-1"></span>6 Months Premium Support Included</p>
                    <p class="text-offwhite m-1"><span class="ti-check mr-1"></span>Quality checked by Envato</p>
                    <p class="text-offwhite"><span class="ti-check mr-1"></span>Lifetime Free Updates</p>
                    <h4 class="text-big text-white">Only $35 NOW</h4>
                    <a class="btn purchase-btn mt-3" href="https://1.envato.market/vuexy_admin"
                        target="_blank"><span>Purchase Now</span></a>
                </div>
            </div>
            <div class="col-12 col-lg-5 col-mg-6 full-xl wow fadeIn p-0">
                <div class="container-fluid gradient-primary p-5 mb-4">
                    <h3 class="text-white">Extended License</h3>
                    <hr class="hr-width" />
                    <p class="text-offwhite">
                        Use by you or your one client in a single end products which
                        <b class="text-white">end users can be charged</b>.
                    </p>
                    <p class="text-offwhite m-1"><span class="ti-check mr-1"></span>6 Months Premium Support Included</p>
                    <p class="text-offwhite m-1"><span class="ti-check mr-1"></span>Quality checked by Envato</p>
                    <p class="text-offwhite"><span class="ti-check mr-1"></span>Lifetime Free Updates</p>
                    <h4 class="text-big text-white">Only $799 NOW</h4>
                    <a class="btn purchase-btn mt-3" href="https://1.envato.market/vuexy_admin"
                        target="_blank"><span>Purchase Now</span></a>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </section> --}}
<!-- ***** Pricing Plane Area End ***** -->
@endsection