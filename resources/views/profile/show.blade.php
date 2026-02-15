@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background: #f6f8fb; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <!-- Header Bar -->
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4 px-3 px-md-0">
                <div class="d-flex align-items-center gap-3">
                    <div class="profile-img-wrapper position-relative d-inline-block" style="width:60px;height:60px;">
                        @if(Auth::user()->profile_photo_url)
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle border border-2 border-primary shadow" style="width:60px;height:60px;object-fit:cover;">
                        @else
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width:60px;height:60px;font-size:1.5em;">
                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                            </div>
                        @endif
                    </div>
                    <span class="fs-4 fw-semibold text-dark">{{ Auth::user()->name }}</span>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light border shadow-sm rounded-pill px-4 py-2 dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-2"></i> Account
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row g-4">
                <!-- Profile Overview Card -->
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow rounded-4 h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3 text-primary"><i class="fas fa-id-card me-2"></i>Profile Overview</h4>
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <th class="text-secondary" style="width: 40%;">Name</th>
                                        <td class="fw-semibold">{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-secondary">Email</th>
                                        <td class="fw-semibold">{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-secondary">Member Since</th>
                                        <td class="fw-semibold">{{ Auth::user()->created_at->format('F Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Update Profile Card -->
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow rounded-4 h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3 text-primary"><i class="fas fa-edit me-2"></i>Update Profile Information</h4>
                            @livewire('profile.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2">
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow rounded-4 h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3 text-primary"><i class="fas fa-key me-2"></i>Change Password</h4>
                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                @livewire('profile.update-password-form')
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow rounded-4 h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3 text-primary"><i class="fas fa-shield-alt me-2"></i>Two-Factor Authentication</h4>
                            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                @livewire('profile.two-factor-authentication-form')
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2">
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow rounded-4 h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3 text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout Other Browser Sessions</h4>
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <div class="card border-0 shadow rounded-4 h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3 text-danger"><i class="fas fa-user-slash me-2"></i>Delete Account</h4>
                            @livewire('profile.delete-user-form')
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection