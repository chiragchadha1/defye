var loader_commands = [];

function onLoad(command) {
    loader_commands.push(command);
}

window.onload = function() {
    loader_commands.forEach(function(command) {
        command();
    })
}

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop + 200 < viewportBottom;
};

function smoothAnimate(command, ival, fval, dur, eas, callback) {
    jQuery({ Counter: ival }).animate({ Counter: fval }, {
        duration: dur,
        easing: eas,
        step: function() {
            var value = this.Counter.toFixed(2);
            command(value);
        }
    }).promise().done(function() {
        if (callback) {
            callback();
        }
    })
}

var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);