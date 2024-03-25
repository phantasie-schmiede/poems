var ready = (callback) => {
    if (document.readyState != "loading") {
        callback();
    } else {
        document.addEventListener("DOMContentLoaded", callback);
    }
}

ready(() => {
    const container = document.querySelector('.isotope-content'), filters = {};

    let iso = new Isotope(container, {
        animationOptions: {
            duration: 750,
            easing:   'linear',
            queue:    false
        },
        filter:           '*',
        getSortData:      {
            title: '.card-title', // text from querySelector
        },
        itemSelector:     '.isotope-item',
        layoutMode:       'masonry',
        masonry:          {
            columnWidth: '.isotope-sizer',
        },
        sortAscending:    false,
        sortBy:           'original-order',
    });

    // filter buttons
    document.querySelectorAll('.filter a').forEach(filterLink => {
        addEventListener('click', (e) => {
            // don't proceed if already selected
            if (filterLink.classList.contains('active')) {
                return false;
            }

            const optionSet = filterLink.parentElement;

            // change selected class
            optionSet.querySelector('.active').classList.remove('active');
            filterLink.classList.add('active');

            // store filter value in object
            // i.e. filters.color = 'red'
            const group = optionSet.getAttribute('data-filter-group');

            filters[group] = filterLink.getAttribute('data-filter-value');

            // convert object into array
            let isoFilters = [];

            for (let prop in filters) {
                isoFilters.push(filters[prop])
            }

            iso.arrange({filter: isoFilters.join('')});

            return false;
        })
    });

    //sort buttons
    document.querySelectorAll('.sort-by a').forEach(sortLink => {
        sortLink.addEventListener('click', (e) => {
            // get href attribute, minus the '#'
            const linktext = sortLink.getAttribute('href');
            const sortName = linktext.slice(linktext.indexOf('#') + 6);

            if ('random' === sortName) {
                iso.arrange('shuffle');
            }

            // don't proceed if already selected
            if (sortLink.classList.contains('active')) {
                return false;
            }

            if ('original-order' === sortName) {
                iso.arrange({
                    sortBy:        sortName,
                    sortAscending: false
                });
            } else if ('title' === sortName) {
                iso.arrange({
                    sortBy:        sortName,
                    sortAscending: true
                });
            }

            // change selected class
            const optionSet = sortLink.parentElement;

            optionSet.querySelector('.active').classList.remove('active');
            sortLink.classList.add('active');

            return false;
        })
    });

    // show linked poem
    function getURLParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [
            ,
            ""
        ])[1].replace(/\+/g, '%20')) || null;
    }
});
