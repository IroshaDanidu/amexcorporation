<x-site-layout>

    <body>

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
                    <span>Upcoming Training Programs this Month!</span>
                </div>

            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
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

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                        <h2>Register For Our New Tranig programs </h2>
                        <div class="main-white-button">
                            @auth
                                <a href="{{ url('/programs') }}">View Programs</a>
                            @else
                                <a href="{{ route('register') }}">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- *** Training Program Highlights *** -->
    <div class="training-programs">
        <div class="container">
            <div class="section-heading">
                <h2>Our Training Programs</h2>
            </div>

            <!-- Ongoing Programs -->
            <div class="program-section">
                <h2 style="padding-bottom: 20px">Ongoing Programs</h2>

                <div class="row">

                   @php
                        $ongoingPrograms = App\Models\TrainingPrograms::where('status', 'Ongoing')->get();
                   @endphp

                    @foreach($ongoingPrograms as $program)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ $program->getFirstMediaUrl('cover') }}" alt="{{ $program->name }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $program->name }}</h4>
                                    <p class="card-status">
                                        <span class="badge badge-ongoing">{{ $program->status }}</span>
                                    </p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ url('program-details/' . $program->id) }}" class="btn btn-dark">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Scheduled Programs -->
            <!-- Upcoming Programs -->
            <div class="program-section">
                <h2 style="padding-bottom: 20px">Upcoming Programs</h2>
                <div class="row">
                    @php
                        $upcomingPrograms = App\Models\TrainingPrograms::where('status', 'Scheduled')->get();
                    @endphp

                    @foreach($upcomingPrograms as $program)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ $program->getFirstMediaUrl('cover') }}" alt="{{ $program->name }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $program->name }}</h4>
                                    <p class="card-status">
                                        <span class="badge badge-scheduled">{{ $program->status }}</span>
                                    </p>
                                    <p><strong>Start Date:</strong> {{ $program->schedule_start->format('F j, Y, g:i a') }}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ url('program-details/' . $program->id) }}" class="btn btn-dark">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Cancelled Programs -->
            <div class="program-section">
                <h2 style="padding-bottom: 20px">Cancelled Programs</h2>

                <div class="row">
                    @php
                        $cancelledPrograms = App\Models\TrainingPrograms::where('status', 'Cancelled')->get();
                    @endphp

                    @foreach($cancelledPrograms as $program)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ $program->getFirstMediaUrl('cover') }}" alt="{{ $program->name }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $program->name }}</h4>
                                    <p class="card-status">
                                        <span class="badge badge-cancelled">{{ $program->status }}</span>
                                    </p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ url('program-details/' . $program->id) }}" class="btn btn-dark">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <style>
                .badge {
                    padding: 0.5em 1em;
                    border-radius: 0.25em;
                    color: #fff;
                    font-size: 0.875em;
                }
                .badge-scheduled {
                    background-color: #007bff;
                }
                .badge-ongoing {
                    background-color: #28a745;
                }
                .badge-cancelled {
                    background-color: #dc3545;
                }
                .program-section {
                    margin-bottom: 40px;
                }
            </style>
        </div>
    </div>
    <!-- *** Feedback Section *** -->
    <div class="feedback-section">
        <div class="container">
            <div class="section-heading">
                <h2>Feedback from Our Trainees</h2>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="feedback-item">
                        <img src="{{ asset('assets/images/about-map-image.jpg') }}" alt="Trainer 3" class="img-fluid rounded-circle" style="width: 80px; height: 80px;">
                        <h4>Amal Perera</h4>
                        <p>"The project management training was very insightful and practical."</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feedback-item">
                        <img src="{{ asset('assets/images/about-map-image.jpg') }}" alt="Trainer 4" class="img-fluid rounded-circle" style="width: 80px; height: 80px;">
                        <h4>Nimali Silva</h4>
                        <p>"The communication skills training improved my ability to interact with clients effectively."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </body>
</x-site-layout>
