{{-- Address Nav Bar --}}
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fas fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                <small class="me-3 text-light"><i class="fas fa-phone-alt me-2"></i>+012 345 6789</small>
                <small class="text-light"><i class="fas fa-envelope-open me-2"></i>
                    <a href="#" class="__cf_email__" data-cfemail="12312312312312312312312312">cs@alidata.co.id</a>
                </small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="#"><i class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
    </div>
</div>
{{-- .Address Nav Bar --}}

{{-- Menu Bar --}}
<div class="container-fluid position-relative p-0">

    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="#" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fas fa-user-tie me-2"></i>Alidata</h1>

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Home</a>
                    <div class="dropdown-menu m-0">
                        <a href="index-1.html" class="dropdown-item active">Home 1</a>
                        <a href="index-2.html" class="dropdown-item">Home 2</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                    <div class="dropdown-menu m-0">
                        <a href="about-1.html" class="dropdown-item">About 1</a>
                        <a href="about-2.html" class="dropdown-item">About 2</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Service</a>
                    <div class="dropdown-menu m-0">
                        <a href="service-1.html" class="dropdown-item">Service 1</a>
                        <a href="service-2.html" class="dropdown-item">Service 2</a>
                        <a href="service-3.html" class="dropdown-item">Service 3</a>
                        <a href="service-detail.html" class="dropdown-item">Service Detail</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="price-1.html" class="dropdown-item">Price Page 1</a>
                        <a href="price-2.html" class="dropdown-item">Price Page 2</a>
                        <a href="project.html" class="dropdown-item">Project Page</a>
                        <a href="project-detail.html" class="dropdown-item">Project Detail</a>
                        <a href="blog.html" class="dropdown-item">Blog Page</a>
                        <a href="blog-detail.html" class="dropdown-item">Blog Detail</a>
                        <a href="faq.html" class="dropdown-item">FAQs Page</a>
                        <a href="team.html" class="dropdown-item">Team Page</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="elements.html" class="nav-item nav-link">Elements</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></butaton>
            <a href="#" class="btn btn-primary py-2 px-3 ms-3">Purchase Now</a>
        </div>
    </nav>

</div>
{{-- .Menu Bar --}}

{{-- Pencarian --}}
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- .Pencarian --}}