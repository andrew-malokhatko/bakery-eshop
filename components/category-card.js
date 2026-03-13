class CategoryCard extends HTMLElement {
  connectedCallback() {
    const href = this.getAttribute('href') ?? '#';
    const name = this.getAttribute('name') ?? 'Category';
    const imgSrc = this.getAttribute('img-src') ?? '';

    const bgStyle = imgSrc ? ` style="background-image: url('${imgSrc}')"` : '';

    this.outerHTML = `
      <a class="category-card" href="${href}"${bgStyle}>
      </a>
    `;
  }
}

customElements.define('category-card', CategoryCard);
