
            <div class="preloader-wrap">
                <div class="preloader">
                    <div class="spinner">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            <div class="header_area" id="header_contents">
                <header class="main-header  header style_two header_v13">
                    @php
                        $contact = \App\Models\FooterContact::latest()->first();
                        $platforms = json_decode($contact->social_media_platforms ?? '[]', true);
                        $urls = json_decode($contact->social_media_urls ?? '[]', true);
                    @endphp

                    @if($contact)
                    <div class="top_bar style_one">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="top_inner">
                                        <div class="left_side common_css">
                                            <div class="contntent address">
                                                <i class="icon-placeholder"></i>
                                                <div class="text">
                                                    <a href="{{ $contact->url }}" target="_blank" rel="noopener noreferrer">
                                                        <span>{{ $contact->address }}</span>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="contntent email">
                                                <i class="icon-email"></i>
                                                <div class="text">
                                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right_side common_css">
                                            <div class="contntent phone">
                                                <i class="icon-phone-call"></i>
                                                <div class="text">
                                                    <a href="tel:{{ $contact->phone }}">+91 {{ $contact->phone }}</a>
                                                </div>
                                            </div>
                                            <div class="contntent media">
                                                <div class="text">
                                                    @foreach($platforms as $index => $platform)
                                                        @php
                                                            $url = $urls[$index] ?? '#';
                                                            $icon = match(strtolower($platform)) {
                                                                'facebook' => 'fa-facebook',
                                                                'twitter' => 'fa-twitter',
                                                                'instagram' => 'fa-instagram',
                                                                'linkedin' => 'fa-linkedin',
                                                                'youtube' => 'fa-youtube',
                                                                'watsapp' => 'fa-whatsapp',
                                                                'pinterest' => 'fa-pinterest',
                                                                'skype' => 'fa-skype',
                                                                'telegram' => 'fa-telegram',
                                                                default => 'fa-share-alt',
                                                            };
                                                        @endphp
                                                        <a href="{{ $url }}" target="_blank" rel="nofollow">
                                                            <i class="fa {{ $icon }}"></i>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                    <section class="navbar_outer get_sticky_header">
                        <div class="container">
                            <nav class="inner_box">
                                <div class="header_logo_box">
                                    <a href="#" class="logo navbar-brand">
                                        <img src="{{ asset('frontend/assets/images/logo.webp') }}" alt="Logo" class="logo_default">
                                        <img src="{{ asset('frontend/assets/images/logo.webp') }}" alt="Logo" class="logo__sticky">
                                    </a>
                                </div>
                                <div class="navbar_togglers hamburger_menu">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </div>
                                <div class="header_content header_content_collapse">

                                    <div class="header_menu_box">
                                        <div class="navigation_menu">
                                            <ul id="myNavbar" class="navbar_nav">
                                                <li class="menu-item nav-item">
                                                    <a href="#" class="nav-link">
                                                        <span>Home</span>
                                                    </a>
                                                </li>
                                                <!-- <li class="menu-item nav-item">
                                                    <a href="#" class="nav-link">
                                                        <span>About Us</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item nav-item">
                                                    <a href="#" class="nav-link">
                                                        <span>Why Choose Us</span>
                                                    </a>
                                                </li> -->
                                                <li class="menu-item  menu-item-has-children dropdown nav-item">
                                                    <a href="#" class="dropdown-toggle nav-link">
                                                        <span>Shop Products</span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="menu-item  nav-item">
                                                            <a href="#" class="dropdown-item nav-link">
                                                                <span>Dipped Mica Capacitors</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item nav-item">
                                                            <a href="#" class="dropdown-item nav-link">
                                                                <span>Chip Mica Capacitors</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item nav-item">
                                                            <a href="#" class="dropdown-item nav-link">
                                                                <span>High Voltage Mica Capacitors</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item  nav-item">
                                                            <a href="#" class="dropdown-item nav-link">
                                                                <span>Miniature Dipped Mica Capacitors</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item  nav-item">
                                                            <a href="#" class="dropdown-item nav-link">
                                                                <span>Metal Clad Capacitors</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item  nav-item">
                                                            <a href="#" class="dropdown-item nav-link">
                                                                <span>Tape & Reel Capacitors</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item  nav-item">
                                                            <a href="#" class="dropdown-item nav-link">
                                                                <span>Molded Capacitor</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item  nav-item">
                                                            <a href="#" class="dropdown-item nav-link">
                                                                <span>Made to Order Capacitors</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item nav-item">
                                                    <a href="#" class="nav-link" aria-label="View">
                                                        <span>Specifications</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item nav-item">
                                                    <a href="#" class="nav-link" aria-label="View">
                                                        <span>Contact Us</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="navbar_right navbar_nav ">
                                        <!-- <li>
                                            <button type="button" class="search-toggler"><i class="icon-search"></i></button>
                                        </li> -->
                                        <li>
                                            <div class="mini_cart_togglers header_side_cart">
                                                <div class="mini-cart-count">
                                                    0 </div>
                                                <i class="icon-shopping-bag1"></i>
                                            </div>
                                        </li>
                                        <li class="header-button">
                                            <a href="" target="_blank" rel="" class="theme-btn four">Login <i class="icon-right-arrow"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </section>
                </header>
            </div>