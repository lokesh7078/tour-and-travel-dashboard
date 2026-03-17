<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom,#FF9933,#FFFFFF,#138808);
        }

        .header {
            background: #fff;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: relative;
            z-index: 100;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .menu-btn {
            font-size: 24px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .logo {
            height: 36px;
        }

        .header-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: none;
            background: #f1f3f5;
            cursor: pointer;
            font-size: 18px;
        }

        .icon-btn:hover {
            background: #e9ecef;
        }

        .notify-wrap {
            position: relative;
        }

        .notify-dot {
            position: absolute;
            top: -2px;
            right: -2px;
            background: red;
            color: #fff;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 10px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: -220px;
            width: 220px;
            height: 100%;
            background: #fff;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            padding-top: 70px;
            transition: 0.3s;
            z-index: 99;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .sidebar a:hover {
            background: #f1f3f5;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .dark-mode {
            background: #121212 !important;
            color: #fff;
        }

        .dark-mode .card,
        .dark-mode .header,
        .dark-mode .sidebar {
            background: #1e1e1e;
            color: #fff;
        }

        .dark-mode a {
            color: #fff;
        }



        body {
    margin:0;
    font-family: Arial;
    background: linear-gradient(to bottom,#FF9933,#FFFFFF,#138808);
}

.tab-btn {
    padding:10px 20px;
    border:none;
    cursor:pointer;
    font-weight:bold;
    background:#fff;
    border-radius:6px;
    margin-right:10px;
}

.tab-btn.active {
    background:#FF9933;
    color:#fff;
}

.table-box {
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.btn-view {
    background:#138808;
    color:#fff;
    padding:6px 12px;
    border:none;
    border-radius:6px;
    text-decoration:none;
}



    </style>
</head>
<body>


    <div class="sidebar" id="sidebar">

    <a href="{{ route('admin.home') }}">Dashboard</a>

    <!-- Drivers Dropdown -->
    <a href="javascript:void(0)" onclick="toggleDriverMenu()"
       style="display:flex;justify-content:space-between;align-items:center;">
        <span>Drivers</span>
       <span id="driverArrow" style="font-size:16px;">▼</span>
    </a>

    <div id="driverSubmenu" style="display:none;padding-left:20px;">
      <a href="{{ route('admin.drivers.index') }}">Driver List</a>
<a href="{{ route('admin.drivers.pending') }}">Pending List</a>
    </div>

    {{-- <a href="{{ route('admin.riders') }}">Riders</a> --}}
    <a href="{{ route('admin.rides') }}">Rides</a>
    {{-- <a href="{{ route('admin.earnings') }}">Earnings</a>
    <a href="{{ route('admin.complaints') }}">Complaints</a> --}}
    {{-- <a href="{{ route('admin.settings.edit') }}">Settings</a> --}}
    <a href="{{ route('admin.terms') }}">Terms & Conditions</a>

</div>


{{-- <div class="sidebar" id="sidebar">
    <a href="{{ route('admin.home') }}">Dashboard</a>
    <a href="{{ route('admin.drivers') }}">Drivers</a>
    <a href="{{ route('admin.riders') }}">Riders</a>
    <a href="{{ route('admin.rides') }}">Rides</a>
    <a href="{{ route('admin.earnings') }}">Earnings</a>
    <a href="{{ route('admin.complaints') }}">Complaints</a>
    <a href="{{ route('admin.settings.edit') }}">Settings</a>
    <a href="{{ route('admin.terms') }}">Terms & Conditions</a>
</div> --}}



<!-- HEADER -->
<div class="header">

    <div class="header-left">
        <img src="{{ asset('images/logo.jpeg') }}" class="logo">
        <button class="menu-btn" onclick="toggleSidebar()">☰</button>
    </div>

    <div class="header-right">

        <button class="icon-btn" onclick="toggleTheme()">🌙</button>

        <div class="notify-wrap">
            <button class="icon-btn">🔔</button>
            <span class="notify-dot">25</span>
        </div>

        <button class="icon-btn" onclick="toggleFullScreen()">⛶</button>

        <div class="notify-wrap">
            <img
                src="{{ asset('images/ravi.jpeg') }}"
                onclick="toggleProfile()"
                style="width:38px;height:38px;border-radius:50%;cursor:pointer;object-fit:cover;border:2px solid #ddd"
            >

            <div id="profileMenu" style="
                display:none;
                position:absolute;
                right:0;
                top:45px;
                background:#fff;
                border-radius:8px;
                box-shadow:0 5px 15px rgba(0,0,0,0.15);
                overflow:hidden;
                z-index:99;
            ">
                <a href="{{ route('admin.profile') }}" style="display:block;padding:10px 15px;text-decoration:none;color:#000">My Profile</a>

                <a href="#" style="display:block;padding:10px 15px;text-decoration:none;color:#000">Settings</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="width:100%;border:none;background:none;padding:10px 15px;text-align:left;color:red">
                        Logout
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- PAGE CONTENT -->
<div style="padding:20px">
    {{ $slot }}
</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('active');
}

function toggleTheme() {
    document.body.classList.toggle('dark-mode');
}

function toggleDriverMenu() {
    const menu = document.getElementById('driverSubmenu');
    const arrow = document.getElementById('driverArrow');

    if (menu.style.display === "none" || menu.style.display === "") {
        menu.style.display = "block";
        arrow.innerHTML = "▲";   // Bold Up Arrow
    } else {
        menu.style.display = "none";
        arrow.innerHTML = "▼";   // Bold Down Arrow
    }
}

function toggleFullScreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
}

function toggleProfile() {
    const menu = document.getElementById('profileMenu');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
}
</script>
@if(session('success'))
<div id="toast-success" style="
    position: fixed;
    top: 20px;
    right: 20px;
    background: #ffffff;
    padding: 15px 20px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    display: flex;
    align-items: center;
    gap: 12px;
    z-index: 9999;
    animation: slideIn 0.4s ease;
">
    <div style="
        width: 35px;
        height: 35px;
        background: #d4edda;
        color: #28a745;
        border-radius: 50%;
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:bold;
        font-size:18px;
    ">
        ✓
    </div>

    <div>
        <strong style="color:#333;">
            {{ session('success') }}
        </strong>
    </div>
</div>

<script>
    setTimeout(function() {
        const toast = document.getElementById('toast-success');
        if(toast){
            toast.style.opacity = '0';
            toast.style.transition = '0.5s';
            setTimeout(() => toast.remove(), 500);
        }
    }, 3000);
</script>

<style>
@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>
@endif

</body>
</html>
 