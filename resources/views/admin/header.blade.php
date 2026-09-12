<header class="modern-admin-header">
  <nav class="admin-navbar">
    <div class="navbar-container">

      <!-- Left: Logo & Brand -->
      <div class="navbar-brand-section">
        <div class="brand-logo">
          <img src="{{ asset('images/logofoot.png') }}" alt="Logo" class="admin-logo">
        </div>
        <div class="brand-text">
          <h3 class="admin-title">Admin Dashboard</h3>
          <span class="admin-subtitle">Content Management</span>
        </div>
      </div>

      <!-- Right: User Actions -->
      <div class="navbar-actions">
        @auth
          <span class="admin-user-name">Hi, {{ Auth::user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="admin-logout-btn">Logout</button>
          </form>
        @endauth
        <a href="{{ url('/') }}" class="admin-view-site-btn">
          <i class="fa-solid fa-arrow-up-right-from-square"></i> View Site
        </a>
      </div>

    </div>
  </nav>
</header>

<style>
.modern-admin-header {
  background: #ffffff;
  border-bottom: 1px solid #f1e4d8;
  box-shadow: 0 2px 12px rgba(0,0,0,0.04);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.admin-navbar {
  padding: 0;
}

.navbar-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 30px;
  max-width: 100%;
}

.navbar-brand-section {
  display: flex;
  align-items: center;
  gap: 15px;
}

.brand-logo .admin-logo {
  height: 28px;
  width: auto;
}

.brand-text {
  display: flex;
  flex-direction: column;
}

.admin-title {
  color: #111827;
  font-size: 18px;
  font-weight: 700;
  margin: 0;
  line-height: 1.2;
}

.admin-subtitle {
  color: #9ca3af;
  font-size: 12px;
  font-weight: 400;
  margin: 0;
}

.navbar-actions {
  display: flex;
  align-items: center;
  gap: 14px;
}

.admin-user-name {
  color: #374151;
  font-size: 14px;
  font-weight: 500;
}

.admin-logout-btn {
  background: transparent;
  border: 1px solid #e5e7eb;
  color: #6b7280;
  font-size: 13px;
  font-weight: 500;
  padding: 7px 14px;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.2s ease;
}

.admin-logout-btn:hover {
  border-color: #f97316;
  color: #f97316;
}

.admin-view-site-btn {
  background: #f97316;
  color: #ffffff;
  font-size: 13px;
  font-weight: 600;
  padding: 8px 16px;
  border-radius: 8px;
  text-decoration: none;
  transition: background-color 0.2s ease;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

.admin-view-site-btn:hover {
  background: #ea580c;
  color: #ffffff;
  text-decoration: none;
}

/* Responsive */
@media (max-width: 768px) {
  .navbar-container {
    padding: 12px 20px;
  }

  .admin-title {
    font-size: 16px;
  }

  .admin-subtitle {
    font-size: 11px;
  }

  .brand-logo .admin-logo {
    height: 30px;
  }

  .admin-user-name {
    display: none;
  }
}
</style>
