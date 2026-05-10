import './bootstrap';

const clampQuantity = (input, value) => {
	const min = Number(input.min || 1);
	const max = Number(input.max || 20);
	const nextValue = Number.isFinite(value) ? value : min;

	return Math.min(max, Math.max(min, nextValue));
};

// price range filter
const initShopPriceRange = () => {
	const minRange = document.getElementById('min-price-range');
	const maxRange = document.getElementById('max-price-range');
	const minValue = document.getElementById('min-price-value');
	const maxValue = document.getElementById('max-price-value');
	const fill = document.getElementById('price-range-fill');
	const resetPriceFilterInput = document.querySelector('[data-reset-price-filter]');

	if (!minRange || !maxRange || !minValue || !maxValue || !fill) {
		return;
	}

	const min = Number(minRange.min);
	const max = Number(minRange.max);

	const syncState = () => {
		let currentMin = Number(minRange.value);
		let currentMax = Number(maxRange.value);

		if (currentMin > currentMax) {
			[currentMin, currentMax] = [currentMax, currentMin];
			minRange.value = String(currentMin);
			maxRange.value = String(currentMax);
		}

		minValue.textContent = currentMin.toFixed(2);
		maxValue.textContent = currentMax.toFixed(2);

		const range = max - min || 1;
		const left = ((currentMin - min) / range) * 100;
		const right = ((currentMax - min) / range) * 100;

		fill.style.left = `${left}%`;
		fill.style.width = `${right - left}%`;
	};

	const resetToFullPriceRange = () => {
		minRange.value = minRange.min;
		maxRange.value = maxRange.max;

		if (resetPriceFilterInput) {
			resetPriceFilterInput.value = '1';
		}

		syncState();
	};

	minRange.addEventListener('input', () => {
		if (resetPriceFilterInput) {
			resetPriceFilterInput.value = '0';
		}

		syncState();
	});

	maxRange.addEventListener('input', () => {
		if (resetPriceFilterInput) {
			resetPriceFilterInput.value = '0';
		}

		syncState();
	});

	document.querySelectorAll('#shop-filters input[name="categories[]"]').forEach((checkbox) => {
		checkbox.addEventListener('change', resetToFullPriceRange);
	});

	syncState();
};

// quantity input buttons
document.addEventListener('click', (event) => {
	const button = event.target.closest('.quantity [data-action]');

	if (!button) {
		return;
	}

	const wrapper = button.closest('.quantity');
	const input = wrapper?.querySelector('input[type="number"]');

	if (!input) {
		return;
	}

	const currentValue = Number(input.value || input.min || 1);
	const step = Number(input.step || 1) || 1;
	const delta = button.dataset.action === 'increase' ? step : -step;
	const nextValue = clampQuantity(input, currentValue + delta);

	input.value = String(nextValue);
	input.dispatchEvent(new Event('input', { bubbles: true }));
	input.dispatchEvent(new Event('change', { bubbles: true }));
});

document.addEventListener('input', (event) => {
	const input = event.target.closest('.quantity input[type="number"]');

	if (!input) {
		return;
	}

	input.value = String(clampQuantity(input, Number(input.value)));
});

// auto submit quantity form to update cart entry
document.querySelectorAll('.quantity-form').forEach(form => {
    form.querySelectorAll('input').forEach(input => {
		let timeoutId;

		input.addEventListener('change', () => {
			console.log("input event");
			clearTimeout(timeoutId);

			timeoutId = setTimeout(() => {
				form.submit();
			}, 300);
		});
	});
});

// auto submit search and filters forms on change
// let timeoutId
// document.addEventListener('input', event => {
//     if (
//         !event.target.closest('#shop-search') &&
//         !event.target.closest('#shop-filters')
//     ) {
//         return;
//     }

// 	const form = event.target.closest('form');

//     if (!form) {
//         return;
//     }

//     clearTimeout(timeoutId);
//     timeoutId = setTimeout(() => {
//         form.submit();
//     }, 500);
// });

const shopFiltersPanel = document.querySelector('[data-shop-filters-panel]');
const shopFiltersToggle = document.querySelector('[data-shop-filters-toggle]');

shopFiltersToggle?.addEventListener('click', () => {
	if (!shopFiltersPanel) {
		return;
	}

	shopFiltersPanel.classList.toggle('hidden');
	shopFiltersToggle.setAttribute('aria-expanded', String(!shopFiltersPanel.classList.contains('hidden')));
});

initShopPriceRange();