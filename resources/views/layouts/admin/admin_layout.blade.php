<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">


    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="{{asset('backend/css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/aboutform.css')}}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
<div class="sidebar">
    <div class="logo-details">

{{--        <span class="logo_name">{{Auth::user()->name}}</span>--}}
    </div>
    <ul class="nav-links">
        <li>
            <a href="#" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-book-reader"></i>
                <span class="links_name">Store List</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fab fa-servicestack"></i>
                <span class="links_name"> Employees list</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fas fa-users"></i>
                <span class="links_name">Users List</span>
            </a>
        </li>
        <li class="log_out">
            <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <i class='bx bx-search'></i>
        </div>
        <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name">Ardian Ibishi</span>

        </div>
    </nav>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Services</div>
                    <div class="number">2</div>

                </div>
                <i class='bx bx-cart-alt cart'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Projects</div>
                    <div class="number">2</div>

                </div>
                <i class='bx bxs-cart-add cart two'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Subscribe</div>
                    <div class="number">2</div>

                </div>
                <i class='bx bx-cart cart three'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Users</div>
                    <div class="number">2</div>

                </div>
                <i class='bx bxs-cart-download cart four'></i>
            </div>
        </div>

        <div class="sales-boxes">
            <div class="recent-sales box">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>

</body>
</html>

