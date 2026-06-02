@extends('layouts.admin')
@section('title', 'My Profile')
@section('page_title', 'My Profile')

@section('content')

<div class="row">

    {{-- Profile Info --}}
    <div class="col-lg-5">
        <div class="admin-card">
            <div class="admin-card-header"><h2>Account Info</h2></div>
            <div class="admin-card-body">

                <div style="display:flex;align-items:center;gap:16px;margin-bottom:28px;padding-bottom:24px;border-bottom:1px solid #f3f4f6;">
                    <div style="width:56px;height:56px;border-radius:50%;background:var(--accent-color,#e63946);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="color:#fff;font-size:1.4rem;font-weight:700;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                    <div>
                        <div style="font-weight:700;font-size:1rem;color:#1a2e44;">{{ Auth::user()->name }}</div>
                        <div style="font-size:0.85rem;color:#6b7280;">{{ Auth::user()->email }}</div>
                        <div style="font-size:0.78rem;color:#9ca3af;margin-top:2px;">Admin</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.profile.name') }}">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label class="admin-form-label" for="name">Name</label>
                        <input type="text" id="name" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', Auth::user()->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="admin-form-label" for="email">Email</label>
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', Auth::user()->email) }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;">
                        <i class="fa-solid fa-floppy-disk"></i> Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Change Password --}}
    <div class="col-lg-5">
        <div class="admin-card">
            <div class="admin-card-header"><h2>Change Password</h2></div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.profile.password') }}">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label class="admin-form-label" for="current_password">Current Password</label>
                        <div style="position:relative;">
                            <input type="password" id="current_password" name="current_password"
                                   class="form-control @error('current_password') is-invalid @enderror"
                                   autocomplete="current-password" required>
                            <button type="button" class="pwd-toggle" data-target="current_password" tabindex="-1">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        @error('current_password')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="admin-form-label" for="password">New Password</label>
                        <div style="position:relative;">
                            <input type="password" id="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   autocomplete="new-password" required>
                            <button type="button" class="pwd-toggle" data-target="password" tabindex="-1">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        @error('password')<div class="invalid-feedback" style="display:block;">{{ $message }}</div>@enderror
                        <div class="admin-form-hint">Minimum 8 characters</div>
                    </div>
                    <div class="mb-5">
                        <label class="admin-form-label" for="password_confirmation">Confirm New Password</label>
                        <div style="position:relative;">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control"
                                   autocomplete="new-password" required>
                            <button type="button" class="pwd-toggle" data-target="password_confirmation" tabindex="-1">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;">
                        <i class="fa-solid fa-lock"></i> Update Password
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<style>
.pwd-toggle {
    position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
    background: none; border: none; cursor: pointer;
    color: #9ca3af; font-size: 0.95rem; padding: 4px;
    transition: color 0.2s;
}
.pwd-toggle:hover { color: #374151; }
</style>

<script>
document.querySelectorAll('.pwd-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
        const input = document.getElementById(btn.dataset.target);
        const isText = input.type === 'text';
        input.type = isText ? 'password' : 'text';
        btn.querySelector('i').className = isText ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
    });
});
</script>

@endsection
