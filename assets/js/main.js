var gridReferences = {};

function sendTouiwork() {
    smoothAnimate(function(val) { $([document.documentElement, document.body]).scrollTop(val) }, $(window).scrollTop(), $("#portfolio-ui").offset().top, 1000, "easeInOutCirc");
}

function sendTomdwork() {
    smoothAnimate(function(val) { $([document.documentElement, document.body]).scrollTop(val) }, $(window).scrollTop(), $("#portfolio-motion-design").offset().top, 700, "easeInOutCirc");
}

function sendTogdwork() {
    smoothAnimate(function(val) { $([document.documentElement, document.body]).scrollTop(val) }, $(window).scrollTop(), $("#portfolio-graphics").offset().top, 1500, "easeInOutCirc");
}

function isElementInViewPort(el) {
    return Math.abs($(window).scrollTop() - $(el).offset().top) < screen.height / 2
}

function assignButtonCommands() {

}

onLoad(function() {
    var positionIntializer = setInterval(function() { if ($(window).scrollTop() > 0) { $([document.documentElement, document.body]).scrollTop(0) } }, 1)

    var landing_height = $("#landing-page").height();
    $("#landing-page").css("height", (landing_height * 1.5) + "px");

    /* window.onscroll = function() {
        var scrollAmount = $(window).scrollTop();
        $("#background-wave-particles").css("top", "-" + (scrollAmount * 0.3) + "px"); // change the 0.6 to some other value

        $(".scrollAnimation").each(function() {
            var el = $(this);
            if (Math.abs($(window).scrollTop() - el.offset().top) > screen.height / 2) { return false; }
            el.removeClass("scrollAnimation");

            if (el.attr("animation-type") == "heading") {
                if (Math.floor(Math.random() * 2) == 0) {
                    el.css("padding-left", "10%");
                    smoothAnimate(function(val) { el.css({ "opacity": val, "padding-left": (10 - (val * 10)) + "%" }) }, 0, 1, 1000, "easeOutQuint");
                } else {
                    el.css("padding-right", "10%");
                    smoothAnimate(function(val) { el.css({ "opacity": val, "padding-right": (10 - (val * 10)) + "%" }) }, 0, 1, 1000, "easeOutQuint");
                }
            }

            if (el.attr("animation-type") == "services") {
                el.css({ "margin-top": "100px", "opacity": "0" });
                setTimeout(function() {
                    smoothAnimate(function(val) { el.css({ "opacity": val, "margin-top": (100 - (val * 100)) + "px" }) }, 0, 1, 1000, "easeOutQuint");
                }, +el.attr("animation-delay"))
            }

            if (el.attr("animation-type") == "portfolio") {
                el.css("margin-top", "5%");
                smoothAnimate(function(val) { el.css({ "opacity": val, "margin-top": "-" + (5 - (val * 5)) + "%" }) }, 0, 1, 1000, "easeOutQuint");
            }
        })
    } */

    establishPortfolioItems(function() {

        [
            ["#ux-work-holder", ".websites"],
            ["#graphic-work-holder", ".logos"],
            ["#motion-work-holder", ".promo-videos"]
        ].forEach(function(holder) {

            var portfolioGrid = $(holder[0]).isotope({
                itemSelector: '.portfolio-item',
                percentPosition: true,
                transitionDuration: 300,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });

            gridReferences[holder[0].replace("#", "")] = portfolioGrid;

            $(holder[0]).parent().parent().find("li").on('click', function() {
                $(this).parent().find('li').removeClass('active');
                $(this).addClass('active');
                var data = $(this).attr('data-filter');
                portfolioGrid.isotope({
                    filter: data
                });
            });

            portfolioGrid.isotope({
                filter: holder[1]
            });

        });

        $(".fancybox").fancybox({
            'transitionIn': 'easeInOutQuint',
            'transitionOut': 'easeInOutQuint',
            'speedIn': 700,
            'speedOut': 700,
            'overlayShow': false
        });

        assignButtonCommands();

        smoothAnimate(function(val) {
            $("#page-loader").css({ "top": val + "px", "opacity": 1 - ((-1 * val) / 100) });
        }, 0, -100, 1000, "easeInOutQuint", function() {

            smoothAnimate(function(val) {
                $("#landing-page").css("height", val + "px");
            }, $("#landing-page").height(), landing_height, 1000, "easeOutQuint", function() {

                smoothAnimate(function(val) {
                    $(".large-logo").css({ "opacity": val, "margin-bottom": ((val * 3 * 10) + 10) + "%" });
                }, 0, 1, 1000, "easeOutQuint", function() {

                    smoothAnimate(function(val) {
                        $("#background-wave-particles").css({ "opacity": val, "top": (-1 * (20 - ((val * 2) * 10))) + "px" });
                    }, 0, 1, 1000, "easeOutQuint", function() {

                        gridReferences["graphic-work-holder"].isotope({
                            filter: ".logos"
                        });

                        gridReferences["motion-work-holder"].isotope({
                            filter: ".promo-videos"
                        });

                        gridReferences["ux-work-holder"].isotope({
                            filter: ".websites"
                        });

                        $("body").css("overflow-y", "scroll");
                        clearInterval(positionIntializer);
                        $("#page-loader").hide();

                        AOS.init({
                            duration: 1000
                        });

                        $("#landing-page").eq(0).click(function() {
                            color();
                            particleThemeBlack = !particleThemeBlack;

                            if (isMobile) {
                                var minVal = 80;
                                var maxVal = 90;
                            } else {
                                var minVal = 50;
                                var maxVal = 60;
                            }

                            if (!particleThemeBlack) {
                                smoothAnimate(function(val) { $(".large-logo").css("width", val + "%"); }, minVal, maxVal, 400, "easeOutCirc");
                            } else {
                                smoothAnimate(function(val) { $(".large-logo").css("width", val + "%"); }, maxVal, minVal, 400, "easeOutCirc");
                            }
                        });


                    });

                });

            });

        });


    });

})