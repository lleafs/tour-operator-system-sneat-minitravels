<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link"><x-app-logo /></a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
      <a class="menu-link" href="{{ route('dashboard') }}" wire:navigate>{{ __('Dashboard') }}</a>
    </li>

    <!-- Tour Operator System -->
    <li class="menu-item {{ request()->is('tours/*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-map"></i>
        <div class="text-truncate">{{ __('Tour Operator System') }}</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('tours.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('tours.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-compass"></i>
            <span>{{ __('Tours') }}</span>
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('agencies.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('agencies.index') }}" wire:navigate>
            <i class="menu-icon tf-icons bx bx-cabinet"></i>
            <span>{{ __('Agencies') }}</span>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('bookings.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('bookings.index') }}" wire:navigate>
            <i class="bx bx-calendar-check"></i>
            <span>{{ __('Bookings') }}</span>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('destinations.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('destinations.index') }}" wire:navigate>
            <i class="bx bx-map-pin"></i>
            <span>{{ __('Destinations') }}</span>
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('guides.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('guides.index') }}" wire:navigate>
            <i class="bx bx-id-card"></i>
            <span>{{ __('Guides') }}</span>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('reports.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('reports.index') }}" wire:navigate>
            <i class="bx bx-bar-chart-alt-2"></i>
            <span>{{ __('Reports') }}</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- MiniTravels -->
    <li class="menu-item {{ request()->is('minitravels/*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-paper-plane"></i>
        <div class="text-truncate">{{ __('MiniTravels') }}</div>
      </a>
      <ul class="menu-sub">
        <!-- Gestión de Vouchers -->
        <li class="menu-item {{ request()->routeIs('vouchers.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('vouchers.index') }}" wire:navigate>
            <i class="bx bx-receipt"></i>
            <span>{{ __('Vouchers') }}</span>
          </a>
        </li>

        <!-- Gestión de Hoteles -->
        <li class="menu-item {{ request()->routeIs('hotels.index') ? 'active' : '' }}">
          <a href="{{ route('hotels.index') }}" wire:navigate class="menu-link">
            <i class="bx bx-building-house"></i>
            <span>{{ __('Hotels') }}</span>
          </a>
        </li>

        <!-- Gestión de Vuelos -->
        <li class="menu-item {{ request()->routeIs('flights.index') ? 'active' : '' }}">
          <a href="{{ route('flights.index') }}" wire:navigate class="menu-link">
            <i class="bx bx-paper-plane"></i>
            <span>{{ __('Flights') }}</span>
          </a>
        </li>

        <!-- Reservas -->
        <li class="menu-item {{ request()->routeIs('bookings.index') ? 'active' : '' }}">
          <a href="{{ route('bookings.index') }}" wire:navigate class="menu-link">
            <i class="bx bx-calendar-check"></i>
            <span>{{ __('Bookings') }}</span>
          </a>
        </li>

        <!-- Clientes -->
        <li class="menu-item {{ request()->routeIs('clients.index') ? 'active' : '' }}">
          <a href="{{ route('clients.index') }}" wire:navigate class="menu-link">
            <i class="bx bx-user"></i>
            <span>{{ __('Clients') }}</span>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('packages.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('packages.index') }}" wire:navigate>
            <i class="bx bx-gift"></i>
            <span>{{ __('Packages') }}</span>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('payments.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('payments.index') }}" wire:navigate>
            <i class="bx bx-credit-card"></i>
            <span>{{ __('Payments') }}</span>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('support.index') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('support.index') }}" wire:navigate>
            <i class="bx bx-help-circle"></i>
            <span>{{ __('Support') }}</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Settings -->
    <li class="menu-item {{ request()->is('settings/*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div class="text-truncate">{{ __('Settings') }}</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('settings.profile') }}" wire:navigate>{{ __('Profile') }}</a>
        </li>
        <li class="menu-item {{ request()->routeIs('settings.password') ? 'active' : '' }}">
          <a class="menu-link" href="{{ route('settings.password') }}" wire:navigate>{{ __('Password') }}</a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
<!-- / Menu -->


<script>
  // Toggle the 'open' class when the menu-toggle is clicked
  document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
    menuToggle.addEventListener('click', function() {
      const menuItem = menuToggle.closest('.menu-item');
      // Toggle the 'open' class on the clicked menu-item
      menuItem.classList.toggle('open');
    });
  });
</script>