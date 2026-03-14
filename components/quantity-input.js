class QuantityInput extends HTMLElement {
    connectedCallback() {
        const min = Number(this.getAttribute('min') ?? 1);
        const max = Number(this.getAttribute('max') ?? 20);
        const initialValue = Number(this.getAttribute('value') ?? min);
        const value = Math.min(max, Math.max(min, initialValue));

        this.classList.add('quantity');
        this.innerHTML = `
            <button type="button" class="decrease" data-action="decrease" aria-label="Decrease quantity">&#8722;</button>
            <input type="number" value="${value}" min="${min}" max="${max}" aria-label="Quantity" />
            <button type="button" class="increase" data-action="increase" aria-label="Increase quantity">&#43;</button>
        `;

        const input = this.querySelector('input');
        const decreaseButton = this.querySelector('[data-action="decrease"]');
        const increaseButton = this.querySelector('[data-action="increase"]');

        if (!input || !decreaseButton || !increaseButton) {
            return;
        }

        const clamp = (nextValue) => Math.min(max, Math.max(min, nextValue));

        const setValue = (nextValue) => {
            const clampedValue = clamp(nextValue);
            input.value = String(clampedValue);
            this.setAttribute('value', String(clampedValue));
            this.dispatchEvent(new CustomEvent('quantitychange', {
                detail: { value: clampedValue },
                bubbles: true
            }));
        };

        decreaseButton.addEventListener('click', () => {
            setValue(Number(input.value || min) - 1);
        });

        increaseButton.addEventListener('click', () => {
            setValue(Number(input.value || min) + 1);
        });

        input.addEventListener('input', () => {
            const numericValue = Number(input.value);

            if (Number.isNaN(numericValue)) {
                return;
            }

            setValue(numericValue);
        });
    }
}

customElements.define('quantity-input', QuantityInput);
