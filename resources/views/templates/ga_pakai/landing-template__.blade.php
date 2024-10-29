<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="Vuexy - Vuejs, React, HTML & Laravel Admin Dashboard Template" content="The most developer friendly & highly customisable Material Design VueJS Admin Dashboard Template of 2021 !" />
    <meta name="keywords" content=" admin, chat, dark layout, dashboard, material, vue cli, vue2, Vuejs, vuejs admin, vuejs app, react, vuejs dashboard, Vuejs material, vuesax, vuex, web app" />
    <meta name="p:domain_verify" content="5418c1f147b09c6e3f555b49b16e2f3d" />
    <!-- Title -->
    <title>Alidata Technology | Solusi Kebutuhan IT</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('web/logo/alidata-nav-icon-o.png') }}" />
    {{-- End Favicon --}}

    {{-- Vendor --}}
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/vendors/css/vendors.min.css') }}">
    {{-- End Vendor --}}

    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/css/components.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    {{-- Landing Style --}}
    <link rel="stylesheet" href="{{ asset('vuexy/landing/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/landing/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/landing/css/style.css') }}">
    {{-- End Landing Style --}}

    {{-- Page Style --}}
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/css/pages/page-blog.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/vendors/css/extensions/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/css/plugins/extensions/ext-component-swiper.min.css') }}">
    {{-- End Page Style --}}

    <link rel="stylesheet" href="{{ asset('vuexy/assets/css/style.css') }}">

    <style>
        html body p {
            line-height: 1.5;
        }

        .text-heading {
            font-weight: 600;
        }

        .text-body {
            font-weight: 500;
            font-size: 20px;
        }

        .border-radius-5 {
            border-radius: 5px;
        }

        .p-100 {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
    </style>
</head>

<body>

    @yield('container')

    <!-- ***** Footer Area Start ***** -->
    <footer class="text-center pt-3 clearfix">
        <!-- Foooter Text-->
        <div class="copyright-text">
            <p>
                Copyright ©<span class="year"></span> Designed by
                <a href="#" target="_blank" class="text-danger">Alidata</a>
            </p>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->
    {{-- <script>
        ;
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            (i[r] =
                i[r] ||
                function() {
                    ;
                    (i[r].q = i[r].q || []).push(arguments)
                }),
            (i[r].l = 1 * new Date());
            (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0])
            a.async = 1
            a.src = g
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js', 'ga')

        ga('create', 'UA-96096445-4', 'auto')
        ga('send', 'pageview')
    </script> --}}
    <!-- Start of Async Drift Code -->
    {{-- <script>
        "use strict";

        ! function() {
            var t = window.driftt = window.drift = window.driftt || [];
            if (!t.init) {
                if (t.invoked) return void(window.console && console.error && console.error(
                    "Drift snippet included twice."));
                t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page",
                        "hide", "off", "on"
                    ],
                    t.factory = function(e) {
                        return function() {
                            var n = Array.prototype.slice.call(arguments);
                            return n.unshift(e), t.push(n), t;
                        };
                    }, t.methods.forEach(function(e) {
                        t[e] = t.factory(e);
                    }), t.load = function(t) {
                        var e = 3e5,
                            n = Math.ceil(new Date() / e) * e,
                            o = document.createElement("script");
                        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src =
                            "https://js.driftt.com/include/" + n + "/" + t + ".js";
                        var i = document.getElementsByTagName("script")[0];
                        i.parentNode.insertBefore(o, i);
                    };
            }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('6ashbsefxhx7');
    </script> --}}
    <!-- End of Async Drift Code -->
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    {{-- <script src="../../../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58d9fa1af7a79649"></script> --}}
    <!-- Jquery-2.2.4 JS -->
    <script src="{{ asset('vuexy/landing/js/jquery-2.2.4.min.js') }}"></script>
    <!-- Headroom js -->
    <script src="{{ asset('vuexy/landing/js/headroom.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('vuexy/landing/js/popper.min.js') }}"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="{{ asset('vuexy/landing/js/bootstrap.min.js') }}"></script>
    <!-- All Plugins JS -->
    <script src="{{ asset('vuexy/landing/js/plugins.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('vuexy/landing/js/active.js') }}"></script>
    <script src="{{ asset('vuexy/landing/js/jquery.mobile.custom.min.js') }}"></script>
    <!-- Resource jQuery -->
    <script src="{{ asset('vuexy/landing/js/main.js') }}"></script>
    <!-- Resource jQuery -->

    {{-- Vendor --}}
    <script src="{{ asset('vuexy/app-assets/vendors/js/vendors.min.js') }}"></script>
    {{-- End Vendor --}}

    {{-- Swipper --}}
    <script src="{{ asset('vuexy/app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/js/scripts/extensions/ext-component-swiper.min.js') }}"></script>
    {{-- End Swipper --}}

    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>

    <script src="{{ asset('vuexy/landing/js/modernizr.js') }}"></script>


    <script data-cfasync="false" src="{{ asset('assets/startup/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/startup/js/jquery.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/js/bootstrap.bundle.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/wow/wow.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/easing/easing.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/waypoints/waypoints.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/counterup/counterup.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/owlcarousel/owl.carousel.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/isotope/isotope.pkgd.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/lightbox/js/lightbox.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/js/main.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/js/rocket-loader.min.js') }}" data-cf-settings="3f4280ae93371ddb0ff05dc4-|49" defer=""></script>


    <!-- Headroom -->
    {{-- <script>
        $(document).ready(function() {
            var year = new Date().getFullYear()
            $('.year').text(year)
            // Select all links with hashes
            $('a[href*="#"]')
                // Remove links that don't actually link to anything
                .not('[href="#"]')
                .not('[href="#0"]')
                .click(function(event) {
                    // On-page links
                    if (
                        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                        location.hostname == this.hostname
                    ) {
                        // Figure out element to scroll to
                        var target = $(this.hash)
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']')
                        // Does a scroll target exist?
                        if (target.length) {
                            // Only prevent default if animation is actually gonna happen
                            event.preventDefault()
                            $('html, body').animate({
                                    scrollTop: target.offset().top
                                },
                                1000,
                                function() {
                                    // Callback after animation
                                    // Must change focus!
                                    var $target = $(target)
                                    $target.focus()
                                    if ($target.is(':focus')) {
                                        // Checking if the target was focused
                                        return false
                                    } else {
                                        $target.attr('tabindex',
                                            '-1') // Adding tabindex for elements not focusable
                                        $target.focus() // Set focus again
                                    }
                                }
                            )
                        }
                    }
                })
            // grab an element
            var myElement = document.querySelector('header')
            // construct an instance of Headroom, passing the element
            var headroom = new Headroom(myElement)
            // initialise
            headroom.init()
        })

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script> --}}
    <!-- End Headroom -->

</body>

</html>