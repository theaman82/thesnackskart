<!-- Navbar / Header -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-amber-50/95 backdrop-blur-md shadow-sm border-b border-amber-100/60 transition-all duration-300">
  <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-10">
    <div class="flex items-center justify-between h-16 md:h-18">

      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="/" class="flex items-center gap-1.5 text-3xl md:text-3.5xl font-extrabold tracking-tight text-amber-700 hover:text-amber-600 transition-colors duration-300">
          TheSnacksKart
          <span class="text-amber-500 text-2xl font-bold">.</span>
        </a>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center gap-10">
        <a href="/shop" class="relative font-medium text-gray-700 hover:text-amber-700 text-base transition-colors duration-300 group">
          Shop
          <span class="absolute left-0 bottom-[-6px] w-0 h-0.5 bg-amber-600 rounded-full transition-all duration-300 ease-out group-hover:w-full"></span>
        </a>
        <a href="/about" class="relative font-medium text-gray-700 hover:text-amber-700 text-base transition-colors duration-300 group">
          About Us
          <span class="absolute left-0 bottom-[-6px] w-0 h-0.5 bg-amber-600 rounded-full transition-all duration-300 ease-out group-hover:w-full"></span>
        </a>
        <a href="/contact" class="relative font-medium text-gray-700 hover:text-amber-700 text-base transition-colors duration-300 group">
          Contact
          <span class="absolute left-0 bottom-[-6px] w-0 h-0.5 bg-amber-600 rounded-full transition-all duration-300 ease-out group-hover:w-full"></span>
        </a>
      </div>

      <!-- Actions (Cart + Login) -->
      <div class="hidden md:flex items-center gap-6">
        <a href="/cart" class="text-gray-700 hover:text-amber-700 transition-colors duration-300 text-2xl relative group">
          🛒
          <!-- Optional cart count badge -->
          <!-- <span class="absolute -top-1 -right-1 bg-amber-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">3</span> -->
        </a>

        <a href="/login" class="px-7 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-semibold text-base rounded-xl shadow-md shadow-amber-200/40 transition-all duration-300 hover:shadow-lg hover:shadow-amber-300/50 hover:-translate-y-0.5">
          Login
        </a>
      </div>

      <!-- Mobile Hamburger Button -->
      <div class="md:hidden">
        <button id="mobile-menu-btn" class="text-gray-700 hover:text-amber-700 focus:outline-none transition-colors" aria-label="Toggle menu">
          <svg id="menu-open" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <svg id="menu-close" class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu (Slide down) -->
  <div id="mobile-menu" class="hidden md:hidden bg-amber-50 border-b border-amber-100/60 shadow-lg">
    <div class="px-5 pt-3 pb-6 space-y-5">
      <a href="/shop" class="block font-medium text-gray-800 hover:text-amber-700 text-lg py-2 transition-colors">Shop</a>
      <a href="/about" class="block font-medium text-gray-800 hover:text-amber-700 text-lg py-2 transition-colors">About Us</a>
      <a href="/contact" class="block font-medium text-gray-800 hover:text-amber-700 text-lg py-2 transition-colors">Contact</a>

      <div class="pt-4 flex items-center gap-5 border-t border-amber-100/70">
        <a href="/cart" class="text-gray-700 hover:text-amber-700 text-3xl transition-colors">🛒</a>
        <a href="/login" class="flex-1 px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-semibold text-center rounded-xl transition-colors">
          Login
        </a>
      </div>
    </div>
  </div>
</nav>

<!-- Add padding to body so content isn't hidden under fixed navbar -->
<style>
  body { padding-top: 4rem; } /* ~64px for h-16 */
  @media (min-width: 768px) {
    body { padding-top: 4.5rem; } /* adjust for md:h-18 */
  }
</style>

<!-- JavaScript for mobile toggle (vanilla JS - no framework needed) -->
<script>
  const btn = document.getElementById('mobile-menu-btn');
  const menu = document.getElementById('mobile-menu');
  const openIcon = document.getElementById('menu-open');
  const closeIcon = document.getElementById('menu-close');

  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    openIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
  });
</script>