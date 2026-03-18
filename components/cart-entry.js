class CartEntry extends HTMLElement {
    connectedCallback() {
        const imgSrc = this.getAttribute('img-src') ?? 'https://placehold.co/120x120/fdf2f8/7e22ce?text=Product';
        const title = this.getAttribute('title') ?? 'Bakery Product';
        const unitPrice = this.getAttribute('unit-price') ?? '0.00';
        const totalPrice = this.getAttribute('total-price') ?? unitPrice;
        const quantity = this.getAttribute('quantity') ?? '1';

        this.innerHTML = `
            <div class="cart-entry">
                <div class="cart-product">
                    <img src="${imgSrc}" alt="${title}">
                    <span>${title}</span>
                </div>
                <p class="unit-price">€${unitPrice}</p>
                <quantity-input value="${quantity}"></quantity-input>
                <p class="total">€${totalPrice}</p>
                <button type="button">
                    <img src="resources/cross.svg">
                </button>
            </div>
        `;
    }
}

customElements.define('cart-entry', CartEntry);
