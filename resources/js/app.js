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
