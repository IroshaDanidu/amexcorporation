<x-site-layout>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Pre Header ***** -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <span>Hey! The Next Training Program Starts In 5 Days.</span>
                </div>

            </div>
        </div>
    </div>

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">Amex <em>Training</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/" >Home</a></li>
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="/programs">Training Programs</a></li>
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                                Manage Profile
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @else
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>

                    <style>
                        .nav {
                            display: flex;
                            flex-wrap: nowrap;
                            list-style: none;
                            padding: 0;
                            margin: 0;
                            align-items: center;
                        }
                        .nav li {
                            margin-right: 15px;
                        }
                        .nav a {
                            text-decoration: none;
                            color: inherit;
                            white-space: nowrap;
                        }
                        .nav-item.dropdown {
                            position: relative;
                        }
                        .dropdown-menu {
                            display: none;
                            position: absolute;
                            top: 100%;
                            left: 0;
                            background-color: white;
                            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                        }
                        .nav-item.dropdown:hover .dropdown-menu {
                            display: block;
                        }
                    </style>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** About Us Page ***** -->
    <div class="page-heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Amex Corporation</h2>
                    <span>Focused on Employee Development and Training</span>
                </div>
            </div>
        </div>
    </div>

    <div class="about-upcoming-shows">
        <div class="container">
            <div class="row">
                <div class="">
                    <h2>About Our Training Programs</h2>
                    <p>Amex Corporation organizes various training programs on a monthly basis to enhance employee skills and development. Our training management system allows for the creation, management, and tracking of these programs efficiently.</p>
                    <h4>Training Program Details</h4>
                    <ul>
                        <li>Training Area: Various domains including technical, managerial, and soft skills.</li>
                        <li>Trainer Details: Experienced professionals from within and outside the organization.</li>
                        <li>Target Employees: All employees based on their roles and career development plans.</li>
                        <li>Schedule and Venue: Monthly schedules with both online and offline venues.</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

</x-site-layout>
