<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link">
      <x-app-logo />
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

    {{-- Dashboard --}}
    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-home"></i>
        <div>{{ __('Dashboard') }}</div>
      </a>
    </li>

    {{-- ADMIN MENU --}}
    @if(auth()->user()->role === 'admin')

    {{-- Agency Management --}}
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Agency Management
      </span>
    </li>

    <li class="menu-item {{ request()->routeIs('agencies.*') ? 'active' : '' }}">
      <a href="{{ route('agencies.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-building"></i>
        <div>Agencies</div>
      </a>
    </li>

    {{-- Future --}}
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user-circle"></i>
        <div>Users</div>
      </a>
    </li>

    {{-- Operations --}}
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Operations
      </span>
    </li>

    <li class="menu-item {{ request()->routeIs('flights.*') ? 'active' : '' }}">
      <a href="{{ route('flights.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-paper-plane"></i>
        <div>Flights</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ route('hotels.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-building-house"></i>
        <div>Hotels</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ route('bookings.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-calendar-check"></i>
        <div>Bookings</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ route('clients.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Clients</div>
      </a>
    </li>

    {{-- Tour Operator --}}
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Tour Operator
      </span>
    </li>

    <li class="menu-item {{ request()->routeIs('tours.*') ? 'active' : '' }}">
      <a href="{{ route('tours.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-map"></i>
        <div>Tours</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ route('destinations.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-map-pin"></i>
        <div>Destinations</div>
      </a>
    </li>

    <li class="menu-item {{ request()->routeIs('guides.*') ? 'active' : '' }}">
      <a href="{{ route('guides.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-id-card"></i>
        <div>Guides</div>
      </a>
    </li>

    <li class="menu-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
      <a href="{{ route('reports.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
        <div>Reports</div>
      </a>
    </li>

    {{-- Finance --}}
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Finance
      </span>
    </li>

    <li class="menu-item">
      <a href="{{ route('packages.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-gift"></i>
        <div>Packages</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ route('payments.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-credit-card"></i>
        <div>Payments</div>
      </a>
    </li>

    {{-- Support --}}
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        Support
      </span>
    </li>

    <li class="menu-item {{ request()->routeIs('support.*') ? 'active' : '' }}">
      <a href="{{ route('support.index') }}"
        class="menu-link"
        wire:navigate>

        <i class="menu-icon tf-icons bx bx-help-circle"></i>

        <div>Support</div>

      </a>
    </li>
    @endif

    {{-- AGENCY MENU --}}
    @if(auth()->user()->role === 'agency')

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">
        {{ auth()->user()->agency?->name }}
      </span>
    </li>
    <li class="menu-item {{ request()->routeIs('clients.index') ? 'active' : '' }}">
      <a href="{{ route('clients.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Clients</div>
      </a>
    </li>

    <li class="menu-item {{ request()->routeIs('flights.index') ? 'active' : '' }}">
      <a href="{{ route('flights.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-paper-plane"></i>
        <div>Flights</div>
      </a>
    </li>

    <li class="menu-item {{ request()->routeIs('bookings.index') ? 'active' : '' }}">
      <a href="{{ route('bookings.index') }}" class="menu-link" wire:navigate>
        <i class="menu-icon tf-icons bx bx-calendar-check"></i>
        <div>Bookings</div>
      </a>
    </li>
    @endif
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