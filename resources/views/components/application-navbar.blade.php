<div>
    @auth
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/logos/logo.png') }}" alt="logo" class="navbar-application-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <!-- Some WIP Navbars -->
                    <li class="nav-item">
                        <a href="#" class="nav-link text-indigo-700">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('phrases.index') }}" class="nav-link text-indigo-700">Phrases</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('games') }}" class="nav-link text-indigo-700">Games</a>
                    </li>
                    {{-- <li class="nav-item disabled">
                        <a href="#" class="nav-link">Q-n-a Pronunciation</a>
                    </li> --}}
                </ul>

                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ms-auto">
                    @if (Auth::user()->profile_image)
                            <img src="{{ asset('uploads/user_images/' .Auth::user()->profile_image) }}" alt="user-image-profile"
                                class="icon-avatar">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" alt="user-profile-image"
                                class="icon-avatar rounded-circle">
                        @endif
                    <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-indigo-700 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdown">
                                {{-- Redirect to User Profile --}}
                                <a class="dropdown-item text-indigo-700" href="{{ route('profile.index') }}">
                                    <i class="fa-solid fa-user"></i>
                                    {{ __('Profile') }}
                                </a>

                                {{-- Redirect to logout --}}
                                <a class="dropdown-item text-indigo-700" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 <i class="fa-solid fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>


                            </div>
                        </li>


                </ul>
            </div>

        </div>
    </nav>
    @endauth
</div>
