import './product-card/product-card.js';
import './category-card/category-card.js';

async function loadComponent(id, path) {
  const res = await fetch(path);
  const html = await res.text();
  document.getElementById(id).outerHTML = html;
}

Promise.all([
  loadComponent('header-component', 'components/header/header.html'),
  loadComponent('product-listings-component', 'components/product-listings/product-listings.html'),
  loadComponent('categories-component', 'components/categories/categories.html'),
  loadComponent('footer-component', 'components/footer/footer.html'),
]).then(() => {
  // Bestsellers carousel scroll
  const track = document.getElementById('bestsellersTrack');

  function scrollByCard(dir) {
    const card = track.querySelector('.product-card');
    const gap = 16;
    const w = card ? card.getBoundingClientRect().width : 240;
    track.scrollBy({ left: dir * (w + gap), behavior: 'smooth' });
  }

  document.querySelectorAll('[data-carousel]').forEach(btn => {
    btn.addEventListener('click', () => {
      const dir = btn.dataset.carousel === 'next' ? 1 : -1;
      scrollByCard(dir);
    });
  });
});
