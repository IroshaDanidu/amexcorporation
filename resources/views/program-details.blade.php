<x-site-layout>
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <span>Upcoming Training Programs this Month!</span>
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
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">

                        <h2>{{ $program->name }}</h2>

                        <p class="card-status">
                            <span class="badge badge-{{ strtolower($program->status) }}">{{ $program->status }}</span>
                        </p>
                        <style>
                            .badge {
                                padding: 1em 2em;
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
                            .badge-completed {
                                background-color: #6c757d;
                            }
                            .badge-cancelled {
                                background-color: #dc3545;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .main-banner {
            background-image: url('{{ $program->getFirstMediaUrl('cover') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
    <!-- ***** Main Banner Area End ***** -->

    <div class="rent-venue-tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="right-content">
                                                <h4>{{ $program->name }}</h4>
                                                <p>{{ $program->description }}</p>

                                                <p><strong>Schedule Start:</strong> {{ $program->schedule_start->format('F j, Y, g:i a') }}</p>
                                                <p><strong>Schedule End:</strong> {{ $program->schedule_end->format('F j, Y, g:i a') }}</p>
                                                <p><strong>Venue:</strong> {{ $program->venue }}</p>
                                                <p><strong>Prerequisites:</strong> {{ $program->prerequisites }}</p>
                                                <p><strong>Max Participants:</strong> {{ $program->max_participants }}</p>
                                                <p><strong>Status:</strong> <span class="badge badge-{{ strtolower($program->status) }}">{{ $program->status }}</span></p>
                                                <p><strong>Training Types:</strong>
                                                    @foreach($program->trainingTypes as $type)
                                                        <span class="badge badge-info">{{ $type->name }}</span>
                                                    @endforeach
                                                </p>
                                                <p><strong>Trainers:</strong>
                                                    @foreach($program->trainers as $trainer)
                                                        <span class="badge badge-success">{{ $trainer->name }}</span>
                                                    @endforeach
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div id="map">
                                                @if($program->getMedia('gallery')->isNotEmpty())
                                                    @foreach($program->getMedia('gallery')->take(2) as $media)
                                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                                            <img src="{{ $media->getUrl() }}" alt="Gallery Image" class="img-fluid" style="padding-bottom: 8px">
                                                        </a>
                                                    @endforeach
                                                    <div class="image-description">
                                                        <p>{{ $program->gallery_description }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </section>

                            <div class="gallery">
                                @if($program->getMedia('gallery')->isNotEmpty())
                                    @foreach($program->getMedia('gallery')->skip(2) as $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            <img src="{{ $media->getUrl() }}" alt="Gallery Image" class="img-fluid" style="padding-top: 6px">
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rent-venue-tabs {
            padding: 60px 0;
        }
        .right-content {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .right-content h4 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .right-content p, .right-content ul {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }
        .right-content ul.list {
            list-style: none;
            padding: 0;
        }
        .right-content ul.list li {
            margin-bottom: 10px;
        }
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
        .badge-completed {
            background-color: #6c757d;
        }
        .badge-cancelled {
            background-color: #dc3545;
        }
        #map {
            text-align: center;
        }
        .image-description {
            margin-top: 10px;
            font-size: 14px;
            color: #777;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery a {
            flex: 1 1 calc(25% - 10px);
            max-width: calc(25% - 10px);
        }
        .gallery img {
            width: 100%;
            height: auto;
        }
    </style>


    <livewire:feedback-component :program="$program" />


</x-site-layout>
