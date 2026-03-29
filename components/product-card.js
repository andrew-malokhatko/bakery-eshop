class ProductCard extends HTMLElement {
    connectedCallback() {
        const href = this.getAttribute('href') ?? 'product.html';
        const imgSrc = this.getAttribute('img-src') ?? 'https://placehold.co/400x300/fdf2f8/7e22ce?text=Product';
        const title = this.getAttribute('title') ?? 'Product';
        const desc = this.getAttribute('desc') ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna';
        const price = this.getAttribute('price') ?? '5.50';

        this.outerHTML = `
        <a class="product-card" href="${href}">
          <img class="image" src="${imgSrc}"/>
          <p class="title">${title}</p>
          <p class="desc">${desc}</p>
          <div class="content">
            <p>${price}€</p>
            <button>Add to cart</button>
          </div>
        </a>
    `;

    }
}

customElements.define('product-card', ProductCard);
