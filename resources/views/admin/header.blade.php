@php
    $active = function($routes) {
        foreach ((array)$routes as $route) {
            if (request()->is($route)) return 'active';
        }
        return '';
    };
@endphp
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
<style>
:root {
  --header-height: 64px;
  --sidebar-radius: 18px;
  --color-bg: #151922;
  --color-header: #181c24;
  --color-sidebar: #23283a;
  --color-sidebar-light: #262c3f;
  --color-accent: #2563eb;
  --color-text: #e5e7ef;
  --color-muted: #8b92a6;
  --color-hover: #23283a;
  --shadow: 0 4px 32px rgba(44,62,80,0.18);
  font-family: 'Inter', 'Roboto', Arial, sans-serif;
}
body, html {
  background: var(--color-bg);
  color: var(--color-text);
  font-family: 'Inter', 'Roboto', Arial, sans-serif;
  margin: 0;
  padding: 0;
}
.admin-header {
  width: 100vw;
  height: var(--header-height);
  background: var(--color-header);
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 2px 16px rgba(24,28,36,0.10);
  padding: 0 32px;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1100;
}
.admin-header .header-title {
  font-size: 1.45rem;
  font-family:'Playfair Display';
  font-weight: 700;
  color: var(--color-accent);
  letter-spacing: 1px;
  user-select: none;
}
.admin-header .header-search {
  flex: 1;
  display: flex;
  justify-content: center;
}
.admin-header .search-bar {
  display: flex;
  align-items: center;
  background: var(--color-sidebar-light);
  border-radius: 22px;
  box-shadow: 0 2px 8px rgba(44,62,80,0.10);
  padding: 0 18px;
  height: 40px;
  min-width: 260px;
  border: 1.5px solid #23283a;
}
.admin-header .search-bar input {
  background: transparent;
  border: none;
  outline: none;
  color: var(--color-text);
  font-size: 1.05rem;
  width: 180px;
  margin-left: 10px;
  font-family: inherit;
}
.admin-header .search-bar .mdi {
  color: var(--color-muted);
  font-size: 1.25rem;
}
.admin-header .header-profile {
  display: flex;
  align-items: center;
  position: relative;
}
.admin-header .profile-btn {
  display: flex;
  align-items: center;
  background: var(--color-sidebar-light);
  border-radius: 22px;
  padding: 6px 18px 6px 10px;
  cursor: pointer;
  border: 1.5px solid #23283a;
  box-shadow: 0 2px 8px rgba(44,62,80,0.10);
  transition: background 0.18s, border 0.18s;
}
.admin-header .profile-btn:hover {
  background: var(--color-hover);
  border: 1.5px solid var(--color-accent);
}
.admin-header .profile-avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: #222d;
  margin-right: 10px;
  object-fit: cover;
  border: 2px solid var(--color-accent);
}
.admin-header .profile-name {
  font-weight: 600;
  color: var(--color-text);
  font-size: 1.08rem;
  margin-right: 6px;
}
.admin-header .mdi-menu-down {
  color: var(--color-muted);
  font-size: 1.2rem;
}
.admin-header .dropdown-menu {
  position: absolute;
  right: 0;
  top: 110%;
  background: var(--color-sidebar);
  border-radius: 12px;
  box-shadow: 0 4px 24px rgba(44,62,80,0.18);
  min-width: 170px;
  padding: 10px 0;
  display: none;
  z-index: 1200;
  border: 1.5px solid #23283a;
}
.admin-header .header-profile.open .dropdown-menu {
  display: block;
}
.admin-header .dropdown-item {
  color: var(--color-text);
  padding: 10px 22px;
  font-size: 1.05rem;
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  border: none;
  background: none;
  width: 100%;
  transition: background 0.18s, color 0.18s;
}
.admin-header .dropdown-item:hover {
  background: var(--color-hover);
  color: var(--color-accent);
}

.admin-sidebar {
  width: 100vw;
  background: var(--color-sidebar);
  box-shadow: 0 4px 24px rgba(44,62,80,0.10);
  border-radius: var(--sidebar-radius);
  margin: 0 auto;
  margin-top: calc(var(--header-height) + 12px);
  padding: 18px 0 12px 0;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  position: relative;
  z-index: 1000;
  max-width: 98vw;
}
.admin-sidebar nav {
  width: 100%;
}
.admin-sidebar ul {
  list-style: none;
  padding: 0 0 0 24px;
  margin: 0;
}
.admin-sidebar li {
  margin-bottom: 6px;
  width: 100%;
}
.admin-sidebar a {
  display: flex;
  align-items: center;
  padding: 13px 18px 13px 0;
  color: var(--color-text);
  text-decoration: none;
  font-weight: 500;
  border-left: 4px solid transparent;
  border-radius: 0 18px 18px 0;
  transition: background 0.18s, color 0.18s, border-color 0.18s;
  font-size: 1.08rem;
  letter-spacing: 0.01em;
  position: relative;
  width: 100%;
}
.admin-sidebar a .sidebar-icon {
  font-size: 1.35rem;
  margin-right: 16px;
  color: var(--color-muted);
  transition: color 0.18s;
}
.admin-sidebar a.active, .admin-sidebar a:hover {
  background: var(--color-hover);
  color: var(--color-accent);
  border-left: 4px solid var(--color-accent);
}
.admin-sidebar a.active .sidebar-icon, .admin-sidebar a:hover .sidebar-icon {
  color: var(--color-accent);
}
.admin-sidebar .sidebar-submenu {
  background: transparent;
  margin-left: 32px;
  border-left: 2px solid #23283a;
  padding-left: 16px;
  margin-top: 2px;
  margin-bottom: 2px;
  display: none;
}
.admin-sidebar .sidebar-submenu.open {
  display: block;
}
.admin-sidebar .sidebar-submenu a {
  font-size: 0.98rem;
  padding: 10px 0 10px 24px;
  border-radius: 0 12px 12px 0;
  color: var(--color-muted);
  border-left: 2px solid transparent;
}
.admin-sidebar .sidebar-submenu a.active, .admin-sidebar .sidebar-submenu a:hover {
  color: var(--color-accent);
  background: var(--color-hover);
  border-left: 2px solid var(--color-accent);
}
@media (max-width: 700px) {
  .admin-header {
    flex-direction: column;
    height: auto;
    padding: 10px 6px;
    gap: 10px;
  }
  .admin-header .header-title {
    font-size: 1.1rem;
  }
  .admin-header .search-bar {
    min-width: 120px;
    padding: 0 8px;
  }
  .admin-header .profile-btn {
    padding: 6px 10px 6px 6px;
  }
  .admin-sidebar {
    border-radius: 10px;
    margin-top: calc(var(--header-height) + 6px);
    padding: 10px 0 6px 0;
  }
  .admin-sidebar ul {
    padding-left: 10px;
  }
}
</style>
<div class="admin-header">
  <div class="header-title">BHAKUNDO</div>

  <div class="header-profile" id="profileDropdown">
    <div class="profile-btn" onclick="document.getElementById('profileDropdown').classList.toggle('open')">
      <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=2563eb&color=fff" class="profile-avatar" alt="Avatar">
      <span class="profile-name">{{ Auth::user()->name ?? 'Admin' }}</span>
      <span class="mdi mdi-menu-down"></span>
    </div>
    <div class="dropdown-menu">
      @if(Auth::check())
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span class="mdi mdi-logout text-danger"></span> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <a class="dropdown-item" href="{{ route('login') }}">
          <span class="mdi mdi-login text-success"></span> Login
        </a>
      @endif
    </div>
  </div>
</div>

<script>
// Sidebar submenu toggle
const productsLink = document.querySelector('.products-link');
const productsSubmenu = document.getElementById('productsSubmenu');
if(productsLink && productsSubmenu) {
  productsLink.addEventListener('click', function(e) {
    e.preventDefault();
    productsSubmenu.classList.toggle('open');
  });
}
// Profile dropdown close on outside click
window.addEventListener('click', function(e) {
  var dropdown = document.getElementById('profileDropdown');
  if (dropdown && !dropdown.contains(e.target)) {
    dropdown.classList.remove('open');
  }
});
</script>
