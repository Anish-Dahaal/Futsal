@extends("layouts.apps")

@section("content")

    @push('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary-color: #4a6cf7;
            --primary-light: #e0e7ff;
            --secondary-color: #6c757d;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #343a40;
            --white: #ffffff;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
            --sidebar-width: 250px;
            --header-height: 60px;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            --radius: 8px;
        }
        
        body {
            background-color: var(--light-gray);
            color: var(--dark-gray);
            line-height: 1.5;
        }
        
        /* Layout */
        .dashboard-container {
            margin-top: 9vh;
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            grid-template-rows: var(--header-height) 1fr;
            grid-template-areas:
                "sidebar header"
                "sidebar main";
            height: 100vh;
        }
        
        /* Header */
        .header {
            grid-area: header;
            background-color: var(--white);
            box-shadow: var(--shadow);
            padding: 0 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 10;
        }
        
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: var(--secondary-color);
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-menu img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 14px;
        }
        
        .user-role {
            font-size: 12px;
            color: var(--secondary-color);
        }
        
        /* Sidebar */
        .sidebar {
            grid-area: sidebar;
            background-color: var(--dark-gray);
            color: var(--white);
            height: 100vh;
            box-shadow: var(--shadow);
            z-index: 20;
            transition: transform 0.3s ease;
        }
        
        .sidebar-header {
            height: var(--header-height);
            display: flex;
            align-items: center;
            padding: 0 20px;
            background-color: rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            font-size: 20px;
            font-weight: 700;
            color: var(--white);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo i {
            color: var(--primary-color);
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .menu-label {
            padding: 10px 20px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .menu-item {
            position: relative;
        }
        
        .menu-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
        }
        
        .menu-link:hover {
            color: var(--white);
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .menu-link.active {
            color: var(--white);
            background-color: var(--primary-color);
        }
        
        .menu-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: var(--white);
        }
        
        .menu-link i {
            width: 24px;
            margin-right: 10px;
            font-size: 18px;
        }
        
        /* Main Content */
        .main-content {
            grid-area: main;
            padding: 25px;
            overflow-y: auto;
        }
        
        .page-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 700;
        }
        
        /* Cards */
        .card {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 25px;
            overflow: hidden;
        }
        
        .card-header {
            padding: 15px 20px;
            border-bottom: 1px solid var(--medium-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }
        
        .card-action {
            padding: 8px 16px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: background-color 0.2s ease;
        }
        
        .card-action:hover {
            background-color: #3955c8;
        }
        
        .card-body {
            padding: 20px;
        }
        
        /* Tables */
        .table-container {
            overflow-x: auto;
        }
        
        .bookings-table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }
        
        .bookings-table th {
            background-color: var(--medium-gray);
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            color: var(--dark-gray);
            position: sticky;
            top: 0;
        }
        
        .bookings-table tr {
            border-bottom: 1px solid var(--medium-gray);
        }
        
        .bookings-table tr:nth-child(even) {
            background-color: var(--light-gray);
        }
        
        .bookings-table tr:hover {
            background-color: rgba(74, 108, 247, 0.05);
        }
        
        .bookings-table td {
            padding: 12px 15px;
        }
        
        .futsal-name {
            font-weight: 500;
        }
        
        .futsal-icon {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            vertical-align: middle;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            text-align: center;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-confirmed {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success);
        }
        
        .status-pending {
            background-color: rgba(255, 193, 7, 0.15);
            color: var(--warning);
        }
        
        .status-cancelled {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger);
        }
        
        .status-completed {
            background-color: rgba(23, 162, 184, 0.15);
            color: var(--info);
        }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 12px;
            transition: all 0.2s ease;
        }
        
        .btn-view {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }
        
        .btn-view:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        .btn-cancel {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }
        
        .btn-cancel:hover {
            background-color: var(--danger);
            color: var(--white);
        }
        
        /* Profile */
        .profile-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--medium-gray);
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: var(--primary-color);
            font-weight: bold;
        }
        
        .profile-info {
            flex: 1;
        }
        
        .profile-name {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .profile-email {
            color: var(--secondary-color);
        }
        
        .profile-stats {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .stat-card {
            background-color: var(--white);
            padding: 15px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary-color);
        }
        
        .stat-label {
            color: var(--secondary-color);
            font-size: 14px;
        }
        
        .profile-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .detail-group {
            margin-bottom: 15px;
        }
        
        .detail-label {
            color: var(--secondary-color);
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .detail-value {
            font-weight: 500;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
                grid-template-areas:
                    "header"
                    "main";
            }
            
            .sidebar {
                position: fixed;
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .menu-toggle {
                display: block;
            }
            
            .profile-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @endpush

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="#" class="logo">
                    <i class="fas fa-futbol"></i>
                    <span>FutsalPro</span>
                </a>
            </div>
            
            <div class="sidebar-menu">
                <p class="menu-label">Main</p>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="#" class="menu-link" onclick="showView('dashboard-view')">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link active" onclick="showView('bookings-view')">
                            <i class="fas fa-calendar-check"></i>
                            <span>Bookings</span>
                        </a>
                    </li>
                </ul>
                
                <p class="menu-label">Account</p>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="#" class="menu-link" onclick="showView('profile-view')">
                            <i class="fas fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        
        <!-- Header -->
        <header class="header">
            <button class="menu-toggle" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="user-menu">
                <img src="https://i.pravatar.cc/300" alt="User Avatar">
                <div class="user-info">
                    <span class="user-name">John Doe</span>
                    <span class="user-role">Premium Member</span>
                </div>
            </div>
        </header>
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Bookings View -->
            <div id="bookings-view" class="view active">
                <h1 class="page-title">My Futsal Bookings</h1>
                
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">All Bookings</h2>
                        <button class="card-action">New Booking</button>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <table class="bookings-table">
                                <thead>
                                    <tr>
                                        <th>Futsal</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    
                                    <tr>
                                        <td><i class="fas fa-futbol futsal-icon"></i>{{ $booking['futsal']['futsal_name'] }}</td>
                                        {{-- <td class="futsal-name">Indoor Pitch 3</td> --}}
                                        <td>{{ $booking['booking_date'] }}</td>
                                        <td>{{$booking["booking_time"]}}</td>
                                        <td>{{ $booking['duration'] }} hours</td>
                                        
                                        <td>
                                            <span
                                                class="badge {{ $booking['status'] == 'pending'
                                                    ? 'bg-warning'
                                                    : ($booking['status'] == 'Booked'
                                                        ? 'bg-success'
                                                        : ($booking['status'] == 'Rejected'
                                                            ? 'bg-danger'
                                                            : ($booking['status'] == 'Canceled'
                                                                ? 'bg-secondary'
                                                                : 'bg-info'))) }}">
                                                {{ $booking['status'] }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($booking['status'] == 'pending' || $booking['status'] == 'Booked')
                                                <form action="{{ route('bookings.cancel', $booking['id']) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Profile View -->
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
                                <div class="profile-avatar">JD</div>
                                <div class="profile-info">
                                    <h3 class="profile-name">John Doe</h3>
                                    <p class="profile-email">john.doe@example.com</p>
                                    
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
                                        <p class="detail-value">+1 (555) 123-4567</p>
                                    </div>
                                    <div class="detail-group">
                                        <p class="detail-label">Location</p>
                                        <p class="detail-value">New York, USA</p>
                                    </div>
                                    <div class="detail-group">
                                        <p class="detail-label">Preferred Position</p>
                                        <p class="detail-value">Forward</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="detail-group">
                                        <p class="detail-label">Member Since</p>
                                        <p class="detail-value">March 15, 2022</p>
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
            
            <!-- Dashboard View -->
            <div id="dashboard-view" class="view" style="display: none;">
                <h1 class="page-title">Dashboard</h1>
                
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Quick Overview</h2>
                    </div>
                    <div class="card-body">
                        <div class="profile-stats">
                            <div class="stat-card">
                                <span class="stat-value">3</span>
                                <span class="stat-label">Upcoming Bookings</span>
                            </div>
                            <div class="stat-card">
                                <span class="stat-value">8</span>
                                <span class="stat-label">Completed Bookings</span>
                            </div>
                            <div class="stat-card">
                                <span class="stat-value">1</span>
                                <span class="stat-label">Pending Bookings</span>
                            </div>
                            <div class="stat-card">
                                <span class="stat-value">1</span>
                                <span class="stat-label">Cancelled Bookings</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    

    @push('scripts')

    <!-- FontAwesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    
    <script>
        // Toggle sidebar on mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Function to switch between views
        function showView(viewId) {
            // Hide all views
            document.querySelectorAll('.view').forEach(function(view) {
                view.style.display = 'none';
            });
            
            // Show selected view
            document.getElementById(viewId).style.display = 'block';
            
            // Update active menu item
            document.querySelectorAll('.menu-link').forEach(function(link) {
                link.classList.remove('active');
                if (link.getAttribute('onclick').includes(viewId)) {
                    link.classList.add('active');
                }
            });
            
            // Close sidebar on mobile after selection
            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.remove('active');
            }
        }
    </script>

    @endpush


    {{-- <div class="dashboard-container">
        <h1>Dashboard</h1>
        <div class="dashboard-content">
            <div class="user-info">
                <h2>User Information</h2>
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Contact:</strong> {{ $user->contact }}</p>
                <p><strong>Date of Birth:</strong> {{ $user->dob }}</p>
                <p><strong>Address:</strong> {{ $user->address }}</p>
                <p><strong>Profile Picture:</strong> <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" style="width: 100px; height: 100px;"></p>
            </div>
            <div class="booking-info">
                <h2>Booking Information</h2>
                <p><strong>Bookings:</strong></p>
                <ul>
                    @foreach($bookings as $booking)
                        <li>{{ $booking->futsal->name }} - {{ $booking->date }} - {{ $booking->time }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div> --}}