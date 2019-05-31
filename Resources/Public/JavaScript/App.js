(function($, undefined) {
    "use strict";

    $(document).ready(function() {
        const $container = $('#isotope-content'),
            filters = {};

        $container.isotope({
            itemSelector: '.item',
            layoutMode: 'masonry',
            masonry: {
                gutterWidth: 0
            },
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            },
            getSortData: {
                title: '.poem_title', // text from querySelector
            },
            sortBy: 'original-order',
            sortAscending: false
        });

        // filter buttons
        $('.filter a').click(function() {
            const $this = $(this);
            // don't proceed if already selected
            if ($this.hasClass('active')) {
                return false;
            }

            const $optionSet = $this.parents('.filter');
            // change selected class
            $optionSet.find('.active').removeClass('active');
            $this.addClass('active');

            // store filter value in object
            // i.e. filters.color = 'red'
            const group = $optionSet.attr('data-filter-group');
            filters[group] = $this.attr('data-filter-value');
            // convert object into array
            let isoFilters = [];

            for (let prop in filters) {
                isoFilters.push(filters[prop])
            }

            const selector = isoFilters.join('');
            $container.isotope({filter: selector});

            return false;
        });

        //sort buttons
        $('.sort-by a').click(function() {
            const $this = $(this);

            // get href attribute, minus the '#'
            const linktext = $this.attr('href');
            const sortName = linktext.slice(linktext.indexOf('#') + 6);
            if ('random' === sortName) {
                $container.isotope('shuffle');
            }

            // don't proceed if already selected
            if ($this.hasClass('active')) {
                return false;
            }

            if ('original-order' === sortName) {
                $container.isotope({
                    sortBy: sortName,
                    sortAscending: false
                });
            } else if ('title' === sortName) {
                $container.isotope({
                    sortBy: sortName,
                    sortAscending: true
                });
            }

            // change selected class
            const $optionSet = $this.parents('.sort-by');
            $optionSet.find('.active').removeClass('active');
            $this.addClass('active');

            return false;
        });

        const $collapse = $('.collapse');
        $collapse.on('shown.bs.collapse', function() {
            $container.isotope('layout')
        });
        $collapse.on('hidden.bs.collapse', function() {
            $container.isotope('layout')
        });

        // show linked poem
        function getURLParameter(name) {
            return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [, ""])[1].replace(/\+/g, '%20')) || null;
        }

        const poem = getURLParameter('poem');
        if (poem) {
            $('#poem_' + poem).collapse('show');
        }

        // close all other poems when opening one
        $container.find('.item.poem button').on('click', function() {
            $container.find('.item.poem .collapse.in').collapse('hide');
        })

    });

})(jQuery);
