@extends('dashboard')

@section('cont')
    <div id="profile-view" class="view" style="display: none;">
        <h1 class="page-title">My Profile</h1>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Profile Information</h2>
                <button class="card-action">Edit Profile</button>
            </div>
            <div class="card-body">
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <img src="{{ Storage::url('/user_photos/' . Auth::guard('frontUser')->user()->user_photo) }}"
                                alt="User Avatar">
                        </div>
                        <div class="profile-info">
                            <h3 class="profile-name">{{ Auth::guard('frontUser')->user()->name }}</h3>
                            <p class="profile-email">{{ Auth::guard('frontUser')->user()->email }}</p>

                            <div class="profile-stats">
                                <div class="stat-card">
                                    <span class="stat-value">12</span>
                                    <span class="stat-label">Total Bookings</span>
                                </div>
                                <div class="stat-card">
                                    <span class="stat-value">8</span>
                                    <span class="stat-label">Completed</span>
                                </div>
                                <div class="stat-card">
                                    <span class="stat-value">3</span>
                                    <span class="stat-label">Upcoming</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile-details">
                        <div>
                            <div class="detail-group">
                                <p class="detail-label">Phone Number</p>
                                <p class="detail-value">{{ Auth::guard('frontUser')->user()->contact }}</p>
                            </div>
                            <div class="detail-group">
                                <p class="detail-label">Location</p>
                                <p class="detail-value">{{ Auth::guard('frontUser')->user()->address }}</p>
                            </div>
                            <div class="detail-group">
                                <p class="detail-label">Date of Birth</p>
                                <p class="detail-value">{{ Auth::guard('frontUser')->user()->date_of_birth }}</p>
                            </div>
                        </div>
                        <div>
                            <div class="detail-group">
                                <p class="detail-label">Member Since</p>
                                <p class="detail-value">{{ Auth::guard('frontUser')->user()->created_at->toDateString() }}
                                </p>
                            </div>
                            <div class="detail-group">
                                <p class="detail-label">Membership Plan</p>
                                <p class="detail-value">Premium</p>
                            </div>
                            <div class="detail-group">
                                <p class="detail-label">Team</p>
                                <p class="detail-value">Urban Strikers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showView("profile-view");
        });
    </script>
@endsection


