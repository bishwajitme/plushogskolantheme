<?php


$raknare_background = get_sub_field('raknare_background');

?>

<section class="part-counters-section counters-part home-section easyanimator clearfix" style="background:<?php echo $raknare_background; ?>">

    <div class="container">
        <div class="row">
            <?php
            if (have_rows('raknare')):

                // loop through the rows of data
                while (have_rows('raknare')): the_row();
                    // display a sub field value
                    $raknare_number = get_sub_field('raknare_number');
                    $raknare_title = get_sub_field('raknare_title');
                    $raknare_description = get_sub_field('raknare_description');
                    $raknare_sufix = get_sub_field('counter_value_suffix');

                    ?>

                    <div class="text-white counters-entry col-lg-4 col-md-6 col-sm-12 col-xs-12 p-4 border-right">

                        <h3><span class="timer count-title count-number" data-to="<?php echo $raknare_number; ?>"
                                  data-speed="2500">raknare_number</span><span><?php echo $raknare_sufix ?></span></h3>
                        <h3><?php echo $raknare_title; ?></h3>
                        <div class="count-text pt-3 pb-3 pr-3"><?php echo $raknare_description; ?></div>
                    </div>


                <?php
                endwhile;

            else:

                // no rows found

            endif;
            ?>
        </div>
    </div>

</section>
<script>
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from: $(this).data('from'),
                    to: $(this).data('to'),
                    speed: $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals: $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof (settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof (settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,               // the number the element should start at
            to: 0,                 // the number the element should end at
            speed: 1000,           // how long it should take to count between the target numbers
            refreshInterval: 100,  // how often the element should be updated
            decimals: 0,           // the number of decimal places to show
            formatter: formatter,  // handler for formatting the value before rendering
            onUpdate: null,        // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

     jQuery(function ($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        //$('.timer').each(count);

        jQuery(window).scroll(function(event) {
            jQuery(".part-counters-section.come-in").each(function(i, el) {
                var el = jQuery(el);
                if (el.visible(true)) {
                    jQuery('.timer').each(count);
                    el.removeClass('part-counters-section');
                }
            });
        });


        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
</script>