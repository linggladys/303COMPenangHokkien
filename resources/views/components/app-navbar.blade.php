<div>
    @auth
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/logos/logo.png') }}" alt="logo" class="navbar-application-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto text-dark">
                        <!-- Some WIP Navbars -->
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link text-indigo-700">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-indigo-700" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Phrases
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('phrasesCategory.index') }}">
                                    <i class="fa-solid fa-list"></i>
                                    List of Categories
                                </a>
                                <a class="dropdown-item" href="{{ route('likedphraselist.likes') }}">
                                    <i class="fa-solid fa-thumbs-up"></i>
                                     Liked Phrases
                                </a>
                            </div>
                        </li>
                        {{-- <li class="nav-item ">
                            <a href="{{ url('games') }}" class="nav-link text-indigo-700">Games</a>
                        </li> --}}
                        {{-- <li class="nav-item disabled">
                        <a href="#" class="nav-link">Q-n-a Pronunciation</a>
                    </li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ms-auto">
                        @if (Auth::user()->profile_image)
                            <img src="{{ asset('uploads/user_images/' . Auth::user()->profile_image) }}"
                                alt="user-image-profile" class="icon-avatar">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" alt="user-profile-image"
                                class="icon-avatar rounded-circle">
                        @endif
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-indigo-700 dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>



                            <div class="dropdown-menu dropdown-menu-end bg-light" style="margin: 0" aria-labelledby="navbarDropdown">
                                <a href="#" class="dropdown-iem text-indigo-700">
                                    <div class="form-check form-switch" id="custom-form-switch">
                                        <input type="checkbox" class="form-check-input" id="darkSwitch" />
                                        <i class="fa fa-moon"></i>
                                        <label class="custom-control-label" for="darkSwitch">Dark Mode
                                        </label>
                                    </div>
                                </a>
                                <hr>


                                {{-- Redirect to User Profile --}}
                                <a class="dropdown-item text-indigo-700" href="{{ route('profile.index') }}">
                                    <i class="fa-solid fa-user"></i>
                                    Profile
                                </a>


                                {{-- Redirect to logout --}}
                                <a class="dropdown-item text-indigo-700" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt"></i>
                                    Logout
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
