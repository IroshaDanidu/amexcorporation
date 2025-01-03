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

    <!-- ***** Pre HEader ***** -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <span>Hey! The Show Is Starting In 5 Days.</span>
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
    <div class="page-heading-rent-venue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Training Programs</h2>

                </div>
            </div>
        </div>
    </div>





    <div class="shows-events-schedule">
        <div class="container">
            @php
                $programs = \App\Models\TrainingPrograms::with(['trainers', 'trainingTypes'])->get();
            @endphp

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Training Programs</h2>
                        <span>Check out our latest Shows & Events and be part of us.</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul>
                        @if($programs && $programs->count() > 0)
                            @foreach($programs as $program)
                                <div class="card mb-3 program-card">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="{{ $program->getFirstMediaUrl('cover') }}" class="card-img" alt="{{ $program->name }}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="{{ url('program-details/' . $program->id) }}" >
                                                <h5 class="card-title">{{ $program->name }}</h5>
                                                </a>
                                                <p class="card-text">
                                                    <span class="badge badge-{{ strtolower($program->status) }}">{{ $program->status }}</span>
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-muted"><i class="fa fa-clock-o"></i> Start: {{ $program->schedule_start->format('M d, Y H:i') }}</small><br>
                                                    <small class="text-muted"><i class="fa fa-clock-o"></i> End: {{ $program->schedule_end->format('M d, Y H:i') }}</small><br>
                                                    <small class="text-muted"><i class="fa fa-map-marker"></i> {{ $program->venue }}</small>
                                                </p>
                                                <div class="trainers">
                                                    <h6>Trainers</h6>
                                                    <ul>
                                                        @foreach($program->trainers as $trainer)
                                                            <li>{{ $trainer->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="types">
                                                    <h6>Types</h6>
                                                    <ul>
                                                        @foreach($program->trainingTypes as $type)
                                                            <li>{{ $type->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <style>
                            .program-card {
                                border: 1px solid #ddd;
                                border-radius: 12px;
                                overflow: hidden;
                                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
                                transition: transform 0.3s ease, box-shadow 0.3s ease;
                                background: linear-gradient(135deg, #f9f9f9, #ffffff);
                            }

                            .program-card:hover {
                                transform: scale(1.03);
                                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
                            }

                            .program-card .card-body {
                                padding: 25px;
                            }

                            .program-card .card-title {
                                margin-bottom: 10px;
                                font-size: 1.5em;
                                font-weight: 700;
                                color: #333;
                            }

                            .program-card .badge {
                                font-size: 0.875em;
                                padding: 0.6em 1.2em;
                                border-radius: 20px;
                                color: #fff;
                                text-transform: uppercase;
                                letter-spacing: 1px;
                            }

                            .badge-scheduled {
                                background-color: #007bff;
                            }

                            .badge-ongoing {
                                background-color: #28a745;
                            }

                            .badge-completed {
                                background-color: #6c757d;
                            }

                            .badge-cancelled {
                                background-color: #dc3545;
                            }

                            .program-card .trainers ul, .program-card .types ul {
                                list-style: none;
                                padding: 0;
                                margin: 0;
                            }

                            .program-card .trainers ul li, .program-card .types ul li {
                                font-size: 0.95em;
                                margin-bottom: 5px;
                                color: #555;
                            }

                            .program-card .trainers h6, .program-card .types h6 {
                                font-size: 1.1em;
                                font-weight: bold;
                                margin-top: 15px;
                                margin-bottom: 10px;
                                color: #222;
                            }

                            .program-card img {
                                border-top-left-radius: 12px;
                                border-bottom-left-radius: 12px;
                                object-fit: cover;
                                height: 100%;
                                width: 100%;
                            }
                        </style>

                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/owl-carousel.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    </body>


</x-site-layout>
