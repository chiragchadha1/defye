<?
session_start();
$baseDir = explode("public_html" , dirname(__FILE__))[0]."public_html/";
require($baseDir."/api/templates/global_constants.php"); // Loads Global Variable Constant
/* <? echo $GLOBAL_CONSTANTS["html_footer"]; ?> */
?>

<html lang="en">

<head>
    <title>defye</title>

    <?
        echo $GLOBAL_CONSTANTS["html_head"];
    ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"
        name="css:lib_fancybox">

    <script type="text/javascript" src="/assets/js/animatedModal.min.js" name="Js/Lib/Isotope_Organizer"></script>
    <script type="text/javascript" src="/assets/js/isotope.min.js" name="Js/Lib/Animated_Modal"></script>
    <script type="text/javascript" src="/assets/js/portfolio.js?v=2332344999" name="Js/Functions/Portfolio"></script>
    <script type="text/javascript" src="/assets/js/parallax.min.js" name="Js/Functions/Parallax"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"
        name="js:lib_fancybox"></script>
</head>

<body>

    <div id="page-loader" class="loader-holder">
        <div class="main-loader"></div>
    </div>

    <section class="section cover slant slant-white" style="background:black;" id="landing-page">
        <canvas id="background-wave-particles"></canvas>
        <div class="container">
            <div class="row align-items-center justify-content-center text-center vh-100">
                <div class="col-md-10">
                    <img class="large-logo" src="/assets/images/logo.png">
                </div>
            </div>
        </div>
    </section>

    <section class="section slant bg-white slant-black" id="services-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" data-aos="fade-up" data-aos-once="true">
                    <h2 class="text-uppercase uppercase">SERVICES</h2>
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-7">
                            <p class="lead">Take a look at what we offer to increase your brand's presence!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END row -->
            <div class="row">

                <div class="col-lg-4 mb-5" data-aos-once="true" data-aos="fade-right">
                    <figure><img src="/assets/images/motion_design.jpg" class="img-fluid"></figure>
                    <div class="p-3">
                        <h3 class="h4">Motion Design</h3>
                        <p class="mb-4">Promotional videos can go a long way in explaining your brand in a small
                            segment, especially when created with stunning visuals.</p>
                        <ul class="list-unstyled list-check text-left">
                            <li class="d-flex mb-2"><span class="oi oi-check text-primary"></span> <span>The defye team
                                    dedicates numerous hours working with clients making sure their project matches
                                    their vision, while also working to meet their deadline. This allows us to help
                                    brands expand their reach by attracting new customers. <br> <a
                                        href="javascript:sendTomdwork()"> View our work</a></span></li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-5" data-aos-once="true" data-aos="fade-up">
                    <figure><img src="/assets/images/ui_ux.jpg" class="img-fluid"></figure>
                    <div class="p-3">
                        <h3 class="h4">Website & Application Development</h3>
                        <p class="mb-4">Website and Mobile appplications with attractive user-interfaces are a key
                            factor in building your online presence.</p>
                        <ul class="list-unstyled list-check text-left">
                            <li class="d-flex mb-2"><span class="oi oi-check text-primary"></span> <span>defye is
                                    adaptive to the industry's changing demands and by working with numerous clients, we
                                    have a definitive grasp on what entices consumers. <br><a
                                        href="javascript:sendTouiwork()"> View our work</a></span></li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-5" data-aos-once="true" data-aos="fade-left">
                    <figure><img src="/assets/images/graphic_design.jpg" class="img-fluid"></figure>
                    <div class="p-3">
                        <h3 class="h4">UI/UX/Graphic Design</h3>
                        <p class="mb-4">Minimalistic, yet professional graphics allow you to convey your message
                            visually.</p>
                        <ul class="list-unstyled list-check text-left">
                            <li class="d-flex mb-2"><span class="oi oi-checktext-primary"></span> <span>With our past
                                    history in graphic design, we are able to showcase new and cutting-edge designs that
                                    change the game.<br><a href="javascript:sendTogdwork()"> View our work</a></span>
                            </li>


                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section bg-black slant slant-white" id="portfolio-motion-design">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center item-animate" data-aos-once="true" data-aos="fade-down">
                    <h2 class="text-uppercase uppercase text-color-white">Motion Design Projects</h2>
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-8">
                            <p class="lead">Here are some of our best promotional and music videos we have made for our
                                clients.</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="filters portfolio-filter" data-aos-once="true" data-aos="zoom-in">
                        <ul>
                            <li class="active" data-filter=".promo-videos">Promotional Videos</li>
                            <li data-filter=".music-videos" class="">Music Videos</li>



                        </ul>
                    </div>
                    <div class="filters-content">
                        <div class="row portfolio-grid" id="motion-work-holder" data-aos-once="true" data-aos="fade-up"
                            style="position: relative; height: 843.865px;">
                            <div class="grid-sizer col-md-4 col-lg-4"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <section class="section bg-white slant slant-black" id="portfolio-ui">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center item-animate" data-aos-once="true" data-aos="fade-down">
                    <h2 class="text-uppercase uppercase">Website & Mobile Application Projects</h2>
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-8">
                            <p class="lead">Here are some of our best websites and applications we have made for our
                                clients.</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="filters portfolio-filter" data-aos-once="true" data-aos="zoom-in">
                        <ul>
                            <li class="active" data-filter=".websites">Websites</li>
                            <li data-filter=".mobile-applications" class="">Mobile Applications</li>
                        </ul>
                    </div>
                    <div class="filters-content">
                        <div class="row portfolio-grid" id="ux-work-holder" data-aos-once="true" data-aos="fade-up"
                            style="position: relative; height: 843.865px;">
                            <div class="grid-sizer col-md-4 col-lg-4"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <section class="section bg-black slant slant-white" id="portfolio-graphics">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center item-animate" data-aos-once="true" data-aos="fade-down">
                    <h2 class="text-uppercase uppercase text-color-white">UI/UX/GRAPHIC DESIGN PROJECTS</h2>
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-8">
                            <p class="lead">Here are some of our best graphics we have made for our clients.</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="filters portfolio-filter" data-aos-once="true" data-aos="zoom-in">
                        <ul>
                            <li class="active" data-filter=".logos">Logos</li>
                            <li data-filter=".gifs">Gifs</li>
                            <li data-filter=".banners" class="">Banners</li>
                            <li data-filter=".user-interfaces" class="">User Interfaces</li>
                            <li data-filter=".misc" class="">Miscellaneous</li>

                        </ul>
                    </div>
                    <div class="filters-content">
                        <div class="row portfolio-grid" data-aos-once="true" data-aos="fade-up" id="graphic-work-holder"
                            style="position: relative; height: 843.865px;">
                            <div class="grid-sizer col-md-4 col-lg-4"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <section class="section bg-white slant slant-black" id="contact-page">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                <div class="col-md-12 text-center item-animate" data-aos-once="true" data-aos="flip-up"
                    style="padding-left: 0%; opacity: 1;">
                    <h2 class="text-uppercase uppercase">CONTACT</h2>
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-8">
                            <p style="font-size: 1.25rem; font-weight: 300;">Join our discord server of creators to get
                                in contact with us regarding any questions or concerns. For any business inquiries,
                                please create a ticket upon joining the server and someone from the defye team will be
                                with you shortly.</p>
                            <a class="discord-button" target="_blank" href="https://discord.gg/GYW7Una">
                                <img src="/assets/images/discord-button.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <? echo $GLOBAL_CONSTANTS["html_footer"]; ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-64531353-15%22%3E"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-64531353-15');

    if (isMobile) {
        $(".large-logo").css("margin-bottom", "100%");
    }
    </script>

    <script type="text/javascript" src="/assets/js/wave-particles.js" name="Js/Lib/WaveParticles"></script>
    <script type="text/javascript" src="/assets/js/main.js" name="Js/Lib/Main_Functions"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "defye",
  "image": "https://defye.us/content/graphic-design/defye-v2.jpg?v=3",
  "@id": "",
  "url": "https://defye.us",
  "telephone": "6099480138",
  "priceRange": "$$",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "",
    "addressLocality": "",
    "postalCode": "",
    "addressCountry": ""
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  },
  "sameAs": [
    "https://twitter.com/defyeus",
    "https://instagram.com/defyeus",
    "https://defye.us"
  ]
}
</script>
</body>

</html>