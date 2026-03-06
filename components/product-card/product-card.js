class ProductCard extends HTMLElement {
  connectedCallback() {
    const href = this.getAttribute('href') ?? 'product.html';
    const imgSrc = this.getAttribute('img-src') ?? '';
    const imgAlt = this.getAttribute('img-alt') ?? '';
    const title = this.getAttribute('title') ?? '';
    const desc = this.getAttribute('desc') ?? '';
    const price = this.getAttribute('price') ?? '';
    const productId = this.getAttribute('product-id') ?? '';
    const productName = this.getAttribute('product-name') ?? title;

    this.outerHTML = `
      <article class="product-card">
        <a class="product-card__media" href="${href}">
          <img
            class="product-card__img"
            src="${imgSrc}"
            alt="${imgAlt}"
            loading="lazy"
          />
        </a>

        <div class="product-card__content">
          <h3 class="product-card__title">
            <a href="${href}">${title}</a>
          </h3>

          <p class="product-card__desc">${desc}</p>

          <div class="product-card__bottom">
            <div class="product-card__price">€${price}</div>

            <button
              class="product-card__btn"
              type="button"
              data-add-to-cart
              data-id="${productId}"
              data-name="${productName}"
              data-price="${price}"
            >
              Add to cart
            </button>
          </div>
        </div>
      </article>
    `;
  }
}

customElements.define('product-card', ProductCard);
