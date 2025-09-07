(function () {
	'use strict';

	// mapping is injected via wp_localize_script as NF_FULL_COUNTRY_NAMES
	var mapping = window.NF_FULL_COUNTRY_NAMES || {};

	// Log script load
	console.log('Ninjaforms Custom ISO Loaded.');

	function codeToName(code) {
		if (!code) return code;
		code = String(code).toUpperCase().trim();
		return mapping[code] || code;
	}

	function maybeReplaceSelect(select) {
		if (!select || select.dataset.nfFullCountryProcessed === '1') return;
		select.dataset.nfFullCountryProcessed = '1';

		var options = Array.prototype.slice.call(select.options || []);
		options.forEach(function (opt) {
			var val = opt.value;
			// if value looks like an ISO 2-letter code, replace it
			if (typeof val === 'string' && val.length === 2) {
				var name = codeToName(val);
				if (name) {
					opt.value = name;
					opt.text = name;
				}
			} else {
				// also replace if value is upper-case 2-letter in attributes (defensive)
				var upper = (String(val) || '').toUpperCase();
				if (upper.length === 2 && mapping[upper]) {
					opt.value = mapping[upper];
					opt.text = mapping[upper];
				}
			}
		});

		// Log the selected country on page load and on change
		function logSelectedCountry(sel) {
			// Try to find the <option> with selected attribute
			var opt = sel.querySelector('option[selected]');
			if (!opt) {
				// Fallback: use the current value
				opt = sel.options[sel.selectedIndex];
			}
			if (opt && opt.value) {
				var code = null;
				// If the value is a full country name, try to find the code by reverse lookup
				for (var k in mapping) {
					if (mapping[k] === opt.value) {
						code = k;
						break;
					}
				}
				// If not found, fallback to value if it's a 2-letter code
				if (!code && opt.value.length === 2) code = opt.value;
				var name = opt.value;
				if (code && name) {
					console.log('Country Selected: ' + code + ' | ' + name);
					console.log('Format will submit as: ' + name);
				}
			}
		}

		logSelectedCountry(select); // On page load

		// Listen for changes to log when user selects a country
		if (!select.dataset.nfFullCountryListener) {
			select.addEventListener('change', function () {
				logSelectedCountry(select);
			});
			select.dataset.nfFullCountryListener = '1';
		}
	}


	function processAll() {
		// Ninja Forms country fields often render with data-nf-field-type="country"
		var nfCountrySelects = document.querySelectorAll('select[data-nf-field-type="country"]');
		var classSelects = document.querySelectorAll('select.full-iso-country-names');
		var containerSelects = document.querySelectorAll('.full-iso-country-names select');
		var all = Array.from(new Set([
			...nfCountrySelects,
			...classSelects,
			...containerSelects
		]));
		console.log('[NF Country] Found ' + all.length + ' select(s) to process.');
		all.forEach(maybeReplaceSelect);
	}

	// Run on DOM ready
	document.addEventListener('DOMContentLoaded', processAll);

	// Ninja Forms fires 'nfFormReady' for forms loaded via AJAX — listen for it
	document.addEventListener('nfFormReady', function () {
		processAll();
	});

	// MutationObserver to catch dynamically added selects (useful for SPA themes / lazy load)
	var observer = new MutationObserver(function (mutations) {
		mutations.forEach(function (m) {
			if (m.addedNodes && m.addedNodes.length) {
				m.addedNodes.forEach(function (node) {
					if (node.nodeType !== 1) return;
					// Direct select
					if (node.matches && node.matches('select[data-nf-field-type="country"], select.full-iso-country-names')) {
						maybeReplaceSelect(node);
					}
					// Select inside .full-iso-country-names container
					if (node.classList && node.classList.contains('full-iso-country-names')) {
						var selects = node.querySelectorAll('select');
						selects && selects.length && Array.prototype.forEach.call(selects, maybeReplaceSelect);
					}
					// Any select inside
					var inner = node.querySelector && node.querySelectorAll && node.querySelectorAll('select[data-nf-field-type="country"], select.full-iso-country-names');
					if (inner && inner.length) {
						Array.prototype.forEach.call(inner, maybeReplaceSelect);
					}
					// Any select inside .full-iso-country-names containers
					var containerSelects = node.querySelector && node.querySelectorAll && node.querySelectorAll('.full-iso-country-names select');
					if (containerSelects && containerSelects.length) {
						Array.prototype.forEach.call(containerSelects, maybeReplaceSelect);
					}
				});
			}
		});
	});

	observer.observe(document.documentElement || document.body, { childList: true, subtree: true });
})();