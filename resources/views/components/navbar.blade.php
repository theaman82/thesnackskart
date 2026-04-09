<!-- Navbar / Header -->
<nav id="site-navbar"
  class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-amber-100/60 shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition-all duration-300">

  <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-10">
    <div class="flex items-center justify-between h-[72px]">

      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="/"
          class="group inline-flex items-center gap-2 text-2xl md:text-3xl font-extrabold tracking-tight text-amber-700 transition-all duration-300 hover:scale-[1.01]">
          <span class="relative">
            TheSnacksKart
          </span>
          <span
            class="text-amber-500 text-3xl leading-none group-hover:translate-x-0.5 transition-transform duration-300">.</span>
        </a>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center gap-8 lg:gap-10">
        <a href="/shop"
          class="relative font-medium text-gray-700 hover:text-amber-700 text-[15px] lg:text-base transition-colors duration-300 group">
          Shop
          <span
            class="absolute left-0 -bottom-2 h-0.5 w-0 bg-amber-600 rounded-full transition-all duration-300 group-hover:w-full"></span>
        </a>

        <a href="/about"
          class="relative font-medium text-gray-700 hover:text-amber-700 text-[15px] lg:text-base transition-colors duration-300 group">
          About Us
          <span
            class="absolute left-0 -bottom-2 h-0.5 w-0 bg-amber-600 rounded-full transition-all duration-300 group-hover:w-full"></span>
        </a>

        <a href="/contact"
          class="relative font-medium text-gray-700 hover:text-amber-700 text-[15px] lg:text-base transition-colors duration-300 group">
          Contact
          <span
            class="absolute left-0 -bottom-2 h-0.5 w-0 bg-amber-600 rounded-full transition-all duration-300 group-hover:w-full"></span>
        </a>
      </div>

      <!-- Desktop Actions -->
      <div class="hidden md:flex items-center gap-3 lg:gap-4">
        <!-- Cart -->
        <a href="/cart"
          class="relative inline-flex items-center justify-center w-11 h-11 rounded-xl border border-amber-100 bg-white text-gray-700 hover:text-amber-700 hover:border-amber-200 hover:bg-amber-50/80 shadow-sm transition-all duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1 5h12M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
          </svg>

          <!-- Badge -->
          <span
            class="absolute -top-1.5 -right-1.5 min-w-[20px] h-5 px-1 rounded-full bg-amber-600 text-white text-[11px] font-bold flex items-center justify-center shadow">
            2
          </span>
        </a>


        @auth
          <div x-data="{ open: false }" class="relative inline-block text-left">
            @php
              $name = auth()->user()->name;
              $initials = strtoupper(substr($name, 0, 1));
            @endphp
            <!-- Profile Button -->
            <button @click="open = !open" @mouseenter="open = true" @mouseleave="open = false"
              class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 transition-all duration-300 shadow-sm">
              <div class="flex items-center gap-2">
                <div
                  class="w-9 h-9 flex items-center justify-center rounded-full bg-amber-600 text-white font-semibold shadow-md">
                  {{ $initials }}
                </div>
                <span class="font-semibold text-gray-700">
                  {{ auth()->user()->name }}
                </span>
              </div>


              <!-- Arrow Icon -->
              <svg class="w-4 h-4 text-gray-500 transition-transform duration-300" :class="{ 'rotate-180': open }"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <!-- Dropdown -->
            <div x-show="open" @mouseenter="open = true" @mouseleave="open = false" x-transition
              class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden z-50">
              <!-- Profile -->
              <a href="{{ route('user.dashboard') }}"
                class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition">
                My Profile
              </a>

              <!-- Orders -->
              <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition">
                Orders
              </a>
              <!-- Wishlist -->
              <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition">
                Wishlist
              </a>
              <!-- Saved Address -->
              <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition">
                Saved Address
              </a>

              <!-- Divider -->
              <div class="border-t"></div>

              <!-- Logout -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition">
                  🚪 Logout
                </button>
              </form>
            </div>

          </div>
        @else
          <a href="{{ route('login') }}"
            class="inline-flex items-center justify-center px-6 lg:px-7 py-2.5 rounded-xl bg-amber-600 text-white font-semibold text-sm lg:text-base shadow-lg shadow-amber-200/50 hover:bg-amber-700 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-amber-300/50 transition-all duration-300">
            Login
          </a>
        @endauth
      </div>

      <!-- Mobile Toggle -->
      <div class="md:hidden">
        <button id="mobile-menu-btn"
          class="inline-flex items-center justify-center w-11 h-11 rounded-xl border border-amber-100 bg-white text-gray-700 hover:text-amber-700 hover:bg-amber-50 transition-all duration-300 focus:outline-none"
          aria-label="Toggle menu">
          <svg id="menu-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <svg id="menu-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu"
    class="max-h-0 overflow-hidden opacity-0 transition-all duration-300 md:hidden bg-white/95 backdrop-blur-xl border-t border-amber-100/70">
    <div class="px-5 pt-4 pb-6 space-y-2">

      <a href="/shop"
        class="flex items-center justify-between rounded-xl px-4 py-3 text-gray-800 font-medium hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">
        <span>Shop</span>
        <span class="text-amber-500">→</span>
      </a>

      <a href="/about"
        class="flex items-center justify-between rounded-xl px-4 py-3 text-gray-800 font-medium hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">
        <span>About Us</span>
        <span class="text-amber-500">→</span>
      </a>

      <a href="/contact"
        class="flex items-center justify-between rounded-xl px-4 py-3 text-gray-800 font-medium hover:bg-amber-50 hover:text-amber-700 transition-all duration-300">
        <span>Contact</span>
        <span class="text-amber-500">→</span>
      </a>

      <div class="pt-4 mt-4 border-t border-amber-100/80 flex items-center gap-3">
        <a href="/cart"
          class="inline-flex items-center justify-center w-12 h-12 rounded-xl border border-amber-100 bg-white text-gray-700 hover:text-amber-700 hover:bg-amber-50 transition-all duration-300 relative">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1 5h12M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
          </svg>
          <span
            class="absolute -top-1.5 -right-1.5 min-w-[20px] h-5 px-1 rounded-full bg-amber-600 text-white text-[11px] font-bold flex items-center justify-center shadow">
            2
          </span>
        </a>

        <a href="/login"
          class="flex-1 inline-flex items-center justify-center px-6 py-3 rounded-xl bg-amber-600 text-white font-semibold shadow-md hover:bg-amber-700 transition-all duration-300">
          Login
        </a>
      </div>
    </div>
  </div>
</nav>

<!-- Body spacing -->
<style>
  body {
    padding-top: 72px;
  }
</style>

<!-- JS -->
<script>
  const btn = document.getElementById('mobile-menu-btn');
  const menu = document.getElementById('mobile-menu');
  const openIcon = document.getElementById('menu-open');
  const closeIcon = document.getElementById('menu-close');
  const navbar = document.getElementById('site-navbar');

  btn.addEventListener('click', () => {
    const isOpen = menu.classList.contains('max-h-[500px]');

    if (isOpen) {
      menu.classList.remove('max-h-[500px]', 'opacity-100');
      menu.classList.add('max-h-0', 'opacity-0');
    } else {
      menu.classList.remove('max-h-0', 'opacity-0');
      menu.classList.add('max-h-[500px]', 'opacity-100');
    }

    openIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
  });

  window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      navbar.classList.add('bg-white/95', 'shadow-md');
      navbar.classList.remove('bg-white/80');
    } else {
      navbar.classList.remove('bg-white/95', 'shadow-md');
      navbar.classList.add('bg-white/80');
    }
  });
</script>