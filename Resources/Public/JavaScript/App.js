(function ($, undefined) {
	"use strict";

	$(document).ready(function () {
		var $container = $('#isotope-content'),
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
		$('.filter a').click(function () {
			var $this = $(this);
			// don't proceed if already selected
			if ($this.hasClass('active')) {
				return false;
			}

			var $optionSet = $this.parents('.filter');
			// change selected class
			$optionSet.find('.active').removeClass('active');
			$this.addClass('active');

			// store filter value in object
			// i.e. filters.color = 'red'
			var group = $optionSet.attr('data-filter-group');
			filters[group] = $this.attr('data-filter-value');
			// convert object into array
			var isoFilters = [];
			for (var prop in filters) {
				isoFilters.push(filters[prop])
			}
			var selector = isoFilters.join('');
			$container.isotope({filter: selector});

			return false;
		});

		//sort buttons
		$('.sort-by a').click(function () {
			var $this = $(this);

			// get href attribute, minus the '#'
			var linktext = $this.attr('href')
			var sortName = linktext.slice(linktext.indexOf('#') + 6);
			if (sortName == 'random') {
				$container.isotope('shuffle');
			}

			// don't proceed if already selected
			if ($this.hasClass('active')) {
				return false;
			}

			if (sortName == 'original-order') {
				$container.isotope({
					sortBy: sortName,
					sortAscending: false
				});
			} else if (sortName == 'title') {
				$container.isotope({
					sortBy: sortName,
					sortAscending: true
				});
			}

			// change selected class
			var $optionSet = $this.parents('.sort-by');
			$optionSet.find('.active').removeClass('active');
			$this.addClass('active');

			return false;
		});

		$('.collapse').on('shown.bs.collapse', function () {
			$container.isotope('layout')
		});
		$('.collapse').on('hidden.bs.collapse', function () {
			$container.isotope('layout')
		});

		// show linked poem
		function getURLParameter(name) {
			return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [, ""])[1].replace(/\+/g, '%20')) || null;
		}
		var poem = getURLParameter('poem');
		if (poem) {
			$('#poem_' + poem).collapse('show');
		}

		// close all other poems when opening one
		$container.find('.item.poem button').on('click', function() {
			$container.find('.item.poem .collapse.in').collapse('hide');
		})

	});

})(jQuery);
