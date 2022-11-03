<div>
    @auth
        <nav class="navbar navbar-expand-md navbar-light shadow-custom">
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
                    <ul class="navbar-nav me-auto ">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link text-indigo-600">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-indigo-600" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Phrases
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-white" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-indigo-600" href="{{ route('phrasesCategory.index') }}">
                                    <i class="fa-solid fa-list"></i>
                                    List of Phrase Categories
                                </a>
                                <a class="dropdown-item text-indigo-600" href="{{ route('likedphraselist.likes') }}">
                                    <i class="fa-solid fa-thumbs-up"></i>
                                     Liked Phrases
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-indigo-600" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Games
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-white" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-indigo-600" href="{{ route('quiz.index') }}">
                                <i class="fa-solid fa-hand-pointer"></i>
                                Quiz
                            </a>
                            <a class="dropdown-item text-indigo-600" href="{{ route('draganddrop.index') }}">
                                <i class="fa-solid fa-up-down-left-right"></i>
                                Drag and Drop
                            </a>

                        </li>
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
                            <a id="navbarDropdown" class="nav-link text-indigo-600 dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>


                            <div class="dropdown-menu dropdown-menu-end m-0" aria-labelledby="navbarDropdown">
                                {{-- Redirect to User Profile --}}
                                <a class="dropdown-item text-indigo-600" href="{{ route('profile.index') }}">
                                    <i class="fa-solid fa-user"></i>
                                    Profile
                                </a>


                                {{-- Redirect to logout --}}
                                <a class="dropdown-item text-indigo-600" href="{{ route('logout') }}"
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
