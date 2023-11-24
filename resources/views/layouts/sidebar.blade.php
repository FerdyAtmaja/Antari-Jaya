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
      <li class="menu-item {{ request()->is('product*') ? 'active' : '' }}">
        <a
          href="{{ route('product.index') }}"
          class="menu-link ">
          <i class="menu-icon tf-icons bx bxs-package"></i>
          <div data-i18n="Email">Product</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('product-in*') ? 'active' : '' }}">
        <a
          href="{{ route('dashboard') }}"
          class="menu-link ">
          <i class="menu-icon tf-icons bx bxs-archive-in"></i>
          <div data-i18n="Email">Product Masuk</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('product-out*') ? 'active' : '' }}">
        <a
          href="{{ route('dashboard') }}"
          class="menu-link ">
          <i class="menu-icon tf-icons bx bxs-archive-out"></i>
          <div data-i18n="Email">Product Keluar</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('report*') ? 'active' : '' }}">
        <a
          href="{{ route('dashboard') }}"
          class="menu-link ">
          <i class="menu-icon tf-icons bx bx-trending-up"></i>
          {{-- <i class="menu-icon tf-icons bx bxs-badge-dollar"></i>
          <i class="menu-icon tf-icons bx bxs-bar-chart-alt-2"></i> --}}
          <div data-i18n="Email">Report</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('manage-user*') ? 'active' : '' }}">
        <a
          href="{{ route('dashboard') }}"
          class="menu-link ">
          <i class="menu-icon tf-icons bx bxs-user"></i>
          <div data-i18n="Email">Manage User</div>
        </a>
      </li>
    </ul>
  </aside>
  <!-- / Menu -->
