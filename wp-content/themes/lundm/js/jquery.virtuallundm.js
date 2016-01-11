(function($) {
    $.fn.virtuallundm = function(options) {

        var opts = $.extend({
            selectors: {
                areas: 'ul.areas li',
                areaBtns: 'ul.areas li a.area-link',
                areaLink: 'a.area-link',
                tooltip: '.tooltip'
            },
          // Gebaude Animation
            fadeDuration: 500,
          // Ausblende Geschwindigkeit
            tipFadeDuration: 500,
          // Einblendeverzögerung Tip
            tipDelay: 500
        }, options || {});

        return $(this).each(function() {
            init(this);
        });

        function init(that) {
            that.areaBtns = $(that).find(opts.selectors.areaBtns);
            that.areas = $(that).find(opts.selectors.areas);
            setupEvents(that);
        }

        function setupEvents(that) {
            that.areas.mouseenter(function(e) {
                fadeHandler(this, {'opacity': 1}, false);
                showTooltip($(this), that);
            });
            that.areas.mouseleave(function(e) {
                fadeHandler(this, {'opacity': 0}, true);
                hideTooltip($(this), that);
            });
        }

        function fadeHandler(that, options, cancel) {
            if (!that.animation || cancel) {
                that.animation = true;
                $(that).children(opts.selectors.areaLink).animate(options, opts.fadeDuration, function(e) {
                    that.animation = false;
                });
            }
        }

        function showTooltip(area, that) {
            var tooltip = area.find('.tooltip');
            var position = area.children(opts.selectors.areaLink).position();
            var width = area.children(opts.selectors.areaLink).width();
            var height = area.children(opts.selectors.areaLink).height();

            that.tipDelay = setTimeout(function() {
                tooltip.css({
                    'display': 'block',
                    'opacity': 0,
                    'top': position.top - tooltip.height() + (height/3) -50,
                    'left': position.left - ((tooltip.width() - width) / 2)
                }).animate({
                    'top': position.top - tooltip.height() + (height/3),
                    'opacity': 1
                });
            }, opts.tipDelay);
        }

        function hideTooltip(area, that) {
            clearTimeout(that.tipDelay);
            var tooltip = area.find('.tooltip');
            tooltip.fadeOut(opts.tipFadeDuration);
        }

    }

})(jQuery);
