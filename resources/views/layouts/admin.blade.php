<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | Swift Fix Admin</title>

    {{-- Template CSS --}}
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/all.min.css">
    <link rel="stylesheet" href="/template/css/style.css">

    <style>
        :root {
            --admin-sidebar-w: 260px;
            --admin-sidebar-bg: #0f1b2d;
            --admin-sidebar-text: rgba(255,255,255,0.78);
            --admin-sidebar-hover: rgba(255,255,255,0.08);
            --admin-sidebar-active: var(--accent-color, #e63946);
            --admin-header-h: 64px;
        }

        body { background: #f5f6fa; }

        /* ── Sidebar ── */
        .admin-sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--admin-sidebar-w);
            height: 100vh; overflow-y: auto;
            background: var(--admin-sidebar-bg);
            z-index: 1000;
            display: flex; flex-direction: column;
        }
        .admin-sidebar-logo {
            padding: 24px 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .admin-sidebar-logo a {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none;
        }
        .admin-sidebar-logo img { height: 36px; }
        .admin-sidebar-logo span {
            color: #fff; font-size: 0.78rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.12em;
            opacity: 0.6;
        }
        .admin-nav { padding: 16px 0; flex: 1; }
        .admin-nav-section {
            padding: 12px 20px 4px;
            font-size: 0.68rem; font-weight: 700; letter-spacing: 0.12em;
            text-transform: uppercase; color: rgba(255,255,255,0.3);
        }
        .admin-nav ul { list-style: none; padding: 0; margin: 0; }
        .admin-nav ul li a {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 20px;
            color: var(--admin-sidebar-text);
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.2s, color 0.2s;
            border-left: 3px solid transparent;
        }
        .admin-nav ul li a i {
            width: 18px; text-align: center; opacity: 0.7; font-size: 0.95rem;
        }
        .admin-nav ul li a:hover {
            background: var(--admin-sidebar-hover);
            color: #fff;
        }
        .admin-nav ul li.active > a {
            background: rgba(255,255,255,0.07);
            color: #fff;
            border-left-color: var(--admin-sidebar-active);
        }
        .admin-nav ul li.active > a i { opacity: 1; }
        .admin-sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .admin-sidebar-footer a {
            display: flex; align-items: center; gap: 10px;
            color: rgba(255,255,255,0.5); text-decoration: none;
            font-size: 0.85rem; transition: color 0.2s;
        }
        .admin-sidebar-footer a:hover { color: #fff; }

        /* ── Main ── */
        .admin-main {
            margin-left: var(--admin-sidebar-w);
            min-height: 100vh;
            display: flex; flex-direction: column;
        }
        .admin-topbar {
            height: var(--admin-header-h);
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 28px;
            position: sticky; top: 0; z-index: 900;
        }
        .admin-topbar-title {
            font-size: 1.05rem; font-weight: 700; color: #1a2e44;
        }
        .admin-topbar-user {
            display: flex; align-items: center; gap: 12px;
        }
        .admin-topbar-user span {
            font-size: 0.88rem; color: #6b7280;
        }
        .admin-topbar-user form { margin: 0; }
        .admin-content {
            padding: 28px;
            flex: 1;
        }

        /* ── Cards ── */
        .admin-card {
            background: #fff; border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            margin-bottom: 24px;
        }
        .admin-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid #f0f0f5;
            display: flex; align-items: center; justify-content: space-between;
        }
        .admin-card-header h2 {
            font-size: 1rem; font-weight: 700; color: #1a2e44; margin: 0;
        }
        .admin-card-body { padding: 24px; }

        /* ── Stats ── */
        .admin-stat-card {
            background: #fff; border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            padding: 24px; display: flex; align-items: center; gap: 18px;
            margin-bottom: 20px;
        }
        .admin-stat-icon {
            width: 52px; height: 52px; border-radius: 12px;
            background: var(--accent-color, #e63946);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .admin-stat-icon i { color: #fff; font-size: 1.3rem; }
        .admin-stat-value { font-size: 1.9rem; font-weight: 800; color: #1a2e44; line-height: 1; }
        .admin-stat-label { font-size: 0.82rem; color: #6b7280; margin-top: 4px; }

        /* ── Tables ── */
        .admin-table { width: 100%; border-collapse: collapse; font-size: 0.9rem; }
        .admin-table th {
            background: #f8f9fb; color: #6b7280;
            font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.06em;
            padding: 10px 16px; text-align: left; font-weight: 600;
            border-bottom: 1px solid #e5e7eb;
        }
        .admin-table td {
            padding: 12px 16px; color: #374151;
            border-bottom: 1px solid #f3f4f6; vertical-align: middle;
        }
        .admin-table tr:last-child td { border-bottom: none; }
        .admin-table tr:hover td { background: #fafafa; }

        /* ── Badges ── */
        .badge-status {
            display: inline-block; padding: 3px 10px; border-radius: 20px;
            font-size: 0.75rem; font-weight: 600; text-transform: capitalize;
        }
        .badge-pending   { background: #fef3c7; color: #92400e; }
        .badge-confirmed { background: #d1fae5; color: #065f46; }
        .badge-completed { background: #dbeafe; color: #1e40af; }
        .badge-cancelled { background: #fee2e2; color: #991b1b; }
        .badge-active    { background: #d1fae5; color: #065f46; }
        .badge-inactive  { background: #f3f4f6; color: #6b7280; }

        /* ── Alerts ── */
        .admin-alert {
            padding: 12px 18px; border-radius: 8px;
            margin-bottom: 20px; font-size: 0.9rem; font-weight: 500;
        }
        .admin-alert-success { background: #d1fae5; color: #065f46; }
        .admin-alert-error   { background: #fee2e2; color: #991b1b; }

        /* ── Form ── */
        .admin-form-label {
            font-size: 0.82rem; font-weight: 600; color: #374151;
            text-transform: uppercase; letter-spacing: 0.06em;
            margin-bottom: 6px; display: block;
        }
        .admin-form-hint { font-size: 0.78rem; color: #9ca3af; margin-top: 4px; }
        .admin-btn {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 20px; border-radius: 8px; font-size: 0.88rem;
            font-weight: 600; cursor: pointer; text-decoration: none;
            transition: opacity 0.2s, transform 0.15s; border: none;
        }
        .admin-btn:hover { opacity: 0.88; transform: translateY(-1px); text-decoration: none; }
        .admin-btn-primary { background: var(--accent-color, #e63946); color: #fff; }
        .admin-btn-secondary { background: #f3f4f6; color: #374151; }
        .admin-btn-danger { background: #fee2e2; color: #991b1b; }
        .admin-btn-sm { padding: 5px 12px; font-size: 0.8rem; }

        /* ── Pagination ── */
        .admin-pagination-nav {
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 12px; margin-top: 20px;
        }
        .admin-pagination-info {
            font-size: 0.83rem; color: #6b7280;
        }
        .admin-pagination {
            display: flex; list-style: none; padding: 0; margin: 0; gap: 4px;
        }
        .admin-page-link {
            display: flex; align-items: center; justify-content: center;
            min-width: 34px; height: 34px; padding: 0 10px;
            border-radius: 8px; font-size: 0.85rem; font-weight: 500;
            color: #374151; background: #fff;
            border: 1px solid #e5e7eb;
            text-decoration: none;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            cursor: pointer;
        }
        a.admin-page-link:hover {
            background: #f3f4f6; border-color: #d1d5db; color: #111;
        }
        .admin-page-item.active .admin-page-link {
            background: var(--accent-color, #e63946);
            border-color: var(--accent-color, #e63946);
            color: #fff;
        }
        .admin-page-item.disabled .admin-page-link {
            color: #d1d5db; background: #fafafa;
            border-color: #f3f4f6; cursor: default;
        }
    </style>

    @stack('styles')
</head>
<body>

<div class="admin-sidebar">
    <div class="admin-sidebar-logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="/template/images/template/logo1white.png" alt="Swift Fix">
        </a>
        <span style="display:block;padding-top:6px;padding-left:2px;">Admin Panel</span>
    </div>

    <nav class="admin-nav">
        <div class="admin-nav-section">Main</div>
        <ul>
            <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </li>
        </ul>

        <div class="admin-nav-section">Content</div>
        <ul>
            <li class="{{ Request::routeIs('admin.services*') ? 'active' : '' }}">
                <a href="{{ route('admin.services.index') }}">
                    <i class="fa-solid fa-wrench"></i> Services
                </a>
            </li>
            <li class="{{ Request::routeIs('admin.posts*') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.index') }}">
                    <i class="fa-solid fa-newspaper"></i> Blog Posts
                </a>
            </li>
            <li class="{{ Request::routeIs('admin.bookings*') ? 'active' : '' }}">
                <a href="{{ route('admin.bookings.index') }}">
                    <i class="fa-solid fa-calendar-check"></i> Bookings
                </a>
            </li>
        </ul>

        <div class="admin-nav-section">Manage</div>
        <ul>
            <li class="{{ Request::routeIs('admin.faqs*') ? 'active' : '' }}">
                <a href="{{ route('admin.faqs.index') }}">
                    <i class="fa-solid fa-circle-question"></i> FAQs
                </a>
            </li>
            <li class="{{ Request::routeIs('admin.zipcodes*') ? 'active' : '' }}">
                <a href="{{ route('admin.zipcodes.index') }}">
                    <i class="fa-solid fa-location-dot"></i> ZIP Codes
                </a>
            </li>
            <li class="{{ Request::routeIs('admin.settings*') ? 'active' : '' }}">
                <a href="{{ route('admin.settings.edit', 'general') }}">
                    <i class="fa-solid fa-gear"></i> Settings
                </a>
            </li>
        </ul>

        <div class="admin-nav-section">Site</div>
        <ul>
            <li>
                <a href="{{ route('home') }}" target="_blank">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> View Website
                </a>
            </li>
        </ul>
    </nav>

    <div class="admin-sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background:none;border:none;padding:0;width:100%;text-align:left;cursor:pointer;">
                <a href="#" onclick="this.closest('form').submit();return false;" style="color:rgba(255,255,255,0.5);text-decoration:none;display:flex;align-items:center;gap:10px;font-size:0.85rem;">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </button>
        </form>
    </div>
</div>

<div class="admin-main">
    <div class="admin-topbar">
        <div class="admin-topbar-title">@yield('page_title', 'Dashboard')</div>
        <div class="admin-topbar-user">
            <a href="{{ route('admin.profile') }}" style="display:flex;align-items:center;gap:8px;text-decoration:none;color:inherit;">
                <i class="fa-solid fa-circle-user" style="color:#9ca3af;font-size:1.4rem;"></i>
                <span>{{ Auth::user()->name }}</span>
            </a>
        </div>
    </div>

    <div class="admin-content">
        @if (session('success'))
            <div class="admin-alert admin-alert-success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="admin-alert admin-alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="/template/js/jquery-3.7.1.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>

@stack('scripts')
</body>
</html>
