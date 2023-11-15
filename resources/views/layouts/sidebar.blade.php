<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">

        </span>
        <span class="app-brand-text demo menu-text fw-bold ms-2">Antari Jaya</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu Admin</span>
      </li>
      <!-- Apps -->
      <li class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
        <a
          href="{{ route('dashboard') }}"
          class="menu-link ">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Email">Dashboard</div>
        </a>
      </li>
      {{-- <li class="menu-item {{ request()->is('product*') ? 'active' : '' }}">
        <a
          href="{{ route('product.index') }}"
          class="menu-link">
          <i class="menu-icon bx bxs-package"></i>
          <div data-i18n="Chat">Produk</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('category*') ? 'active' : '' }}">
        <a
          href="{{ route('category.index') }}"
          class="menu-link">
          <i class='menu-icon bx bxs-category'></i>
          <div data-i18n="Calendar">Kategori Produk</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('guest-book*') ? 'active' : '' }}">
        <a
          href="{{ route('guest-book.index') }}"
          class="menu-link">
          <i class='menu-icon bx bxs-book-content'></i>
          <div data-i18n="Kanban">Feedback</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('customer*') ? 'active' : '' }}">
        <a
          href="{{ route('customer.index') }}"
          class="menu-link">
          <i class='menu-icon bx bx-user'></i>
          <div data-i18n="Kanban">Customer</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('shipping-order*') ? 'active' : '' }}">
        <a
          href="{{ route('shipping-order.index') }}"
          class="menu-link">
          <i class='menu-icon bx bxs-cart-download'></i>
          <div data-i18n="Kanban">Shipping Orders</div>
        </a>
      </li> --}}
    </ul>
  </aside>
  <!-- / Menu -->
