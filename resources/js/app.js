import './bootstrap';

const clampQuantity = (input, value) => {
	const min = Number(input.min || 1);
	const max = Number(input.max || 20);
	const nextValue = Number.isFinite(value) ? value : min;

	return Math.min(max, Math.max(min, nextValue));
};

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
let timeoutId
document.addEventListener('input', event => {
    if (
        !event.target.closest('#shop-search') &&
        !event.target.closest('#shop-filters')
    ) {
        return;
    }

	const form = event.target.closest('form');

    if (!form) {
        return;
    }

    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => {
        form.submit();
    }, 500);
});