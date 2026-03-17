<!DOCTYPE html>
<html>
<head>
    <title>Super Ready App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
.light {
    background: linear-gradient(to bottom,#FF9933,#FFFFFF,#138808);
}

.dark {
    background:#121212;
    color:white;
}

.dark .navbar {
    background:#1f1f1f !important;
}
</style>


</head>

<body class="{{ Auth::user()->theme ?? 'light' }}">


{{-- 🔥 NAVBAR START --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="#">Super Ready</a>

        <div class="collapse navbar-collapse justify-content-end">

            @auth
            <ul class="navbar-nav align-items-center">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center"
                       href="#" role="button"
                       data-bs-toggle="dropdown">

                        {{-- Profile Image --}}
                        <img src="{{ auth()->user()->image
        ? asset('uploads/profile/'.auth()->user()->image)
        : asset('assets/images/default.png') }}"
     style="width:80px;height:80px;border-radius:50%;object-fit:cover;">


                        {{-- User Name --}}
                        {{ Auth::user()->first_name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                               Edit Profile
                                </a>

                        </li>
                        <li>
                  <a class="dropdown-item" href="{{ route('settings.edit') }}">
                           Settings
                             </a>
                        </li>


                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
            @endauth

        </div>
    </div>
</nav>
{{-- 🔥 NAVBAR END --}}

<div class="container mt-5">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
