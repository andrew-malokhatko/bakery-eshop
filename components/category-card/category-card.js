class CategoryCard extends HTMLElement {
  connectedCallback() {
    const href = this.getAttribute('href') ?? '#';
    const name = this.getAttribute('name') ?? '';

    this.outerHTML = `
      <a class="category-card" href="${href}">
        <span>${name}</span>
      </a>
    `;
  }
}

customElements.define('category-card', CategoryCard);
