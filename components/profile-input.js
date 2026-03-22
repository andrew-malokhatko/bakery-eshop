class ProfileInput extends HTMLElement {
    connectedCallback() {
        const label = this.getAttribute('label') ?? '‎';    // invisible symbol
        const type = this.getAttribute('type') ?? 'text';
        const value = this.getAttribute('value') ?? '';
        const placeholder = this.getAttribute('placeholder') ?? '';
        const name = this.getAttribute('name') ?? '';

        this.classList.add('profile-input');
        this.innerHTML = `
            <label>${label}</label>
            <input type="${type}" value="${value}" placeholder="${placeholder}" name="${name}" />
        `;
    }
}

customElements.define('profile-input', ProfileInput);
