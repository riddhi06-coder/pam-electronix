
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
                <header class="main-header  header header_style style_two header_v13">
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
                                                    <a href="{{ $contact->map_url }}" target="_blank" rel="noopener noreferrer">
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
                                               @php
                                                    $phoneRaw = preg_replace('/\D/', '', $contact->phone);
                                                    if (strlen($phoneRaw) === 10) {
                                                        $formattedPhone = preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $phoneRaw);
                                                    } else {
                                                        $formattedPhone = $contact->phone;
                                                    }
                                                @endphp
                                                
                                                <div class="text">
                                                    <a href="tel:+1{{ $phoneRaw }}">+1 {{ $formattedPhone }}</a>
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
                                    <a href="{{ route('home.page') }}" class="logo navbar-brand">
                                        <img src="{{ asset('frontend/assets/images/logo.webp') }}" alt="PAM Electronix Logo" class="logo_default">
                                        <img src="{{ asset('frontend/assets/images/logo.webp') }}" alt="PAM Electronix Logo" class="logo__sticky">
                                    </a>
                                </div>
                                
                                @php
                                    $cartCount = DB::table('carts')->where('session_id', session()->getId())->count(); 
                                @endphp
                                        
                                        
                                <div class="mobile_cart_icon" onclick="document.getElementById('cartForm').submit()" style="cursor: pointer;">
                                    <i class="icon-shopping-bag1"></i>
                                    <span class="mini-cart-count1">{{ $cartCount }}</span>
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
                                                    <a href="{{ route('home.page') }}" class="nav-link">
                                                        <span>Home</span>
                                                    </a>
                                                </li>

                                             @php
    use App\Models\Product;
    $products = Product::orderBy('id', 'asc')->get();
@endphp

<li class="menu-item menu-item-has-children dropdown nav-item">
    <a href="#" class="dropdown-toggle nav-link">
        <span>Shop Products</span>
    </a>
    <ul class="dropdown-menu">
        @foreach ($products as $product)
            @switch($product->id)
                @case(1)
                    {{-- Special logic when product ID is 1 --}}
                    <li class="menu-item nav-item">
                        <a href="{{ route('product-details.show', $product->slug) }}" class="dropdown-item nav-link">
                            <span>{{ $product->product_name }}</span>
                        </a>
                    </li>

                    {{-- Add static extra links only for product ID 1 --}}
                    <li class="menu-item nav-item">
                        <a href="{{ route('chip_mica_capacitors.show') }}" class="dropdown-item nav-link">
                            <span>Chip Mica Capacitors</span>
                        </a>
                    </li>
                    <li class="menu-item nav-item">
                        <a href="{{ route('high_voltage_mica_capacitors.show') }}" class="dropdown-item nav-link">
                            <span>High Voltage Mica Capacitors</span>
                        </a>
                    </li>
                   
                  <li class="menu-item nav-item">
                        <a href="{{ route('miniature_dipped_mica_capacitors.show') }}" class="dropdown-item nav-link">
                            <span>Miniature Dipped Mica Capacitors</span>
                        </a>
                    </li> 
                    <li class="menu-item nav-item">
                        <a href="{{ route('metal_clad_capacitors.show') }}" class="dropdown-item nav-link">
                            <span>Metal Clad Capacitors</span>
                        </a>
                    </li> 
                    <li class="menu-item nav-item">
                        <a href="{{ route('tape_reel_capacitors.show') }}" class="dropdown-item nav-link">
                            <span>Tape Reel Capacitors</span>
                        </a>
                    </li> 
                    <li class="menu-item nav-item">
                        <a href="{{ route('molded_capacitor.show') }}" class="dropdown-item nav-link">
                            <span>Molded Capacitor</span>
                        </a>
                    </li> 
                    <!--<li class="menu-item nav-item">-->
                    <!--    <a href="{{ route('miniature_dipped_mica_capacitors.show') }}" class="dropdown-item nav-link">-->
                    <!--        <span>Miniature Dipped Mica Capacitors</span>-->
                    <!--    </a>-->
                    <!--</li> -->
                    @break

              
            @endswitch
        @endforeach
    </ul>
</li>




                                                <li class="menu-item nav-item">
                                                    <a href="{{ route('show.specifications') }}" class="nav-link" aria-label="View">
                                                        <span>Specifications</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item nav-item">
                                                    <a href="{{ route('contact.us') }}" class="nav-link" aria-label="View">
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
                                        @php
                                            $cartCount = DB::table('carts')->where('session_id', session()->getId())->count(); 
                                        @endphp
                                        
                                        <li>
                                            <form action="{{ route('cart.details') }}" method="POST" id="cartForm">
                                                @csrf
                                                <div class="mini_cart_togglers header_side_cart" onclick="document.getElementById('cartForm').submit()" style="cursor: pointer;">
                                                    <div class="mini-cart-count">
                                                        {{ $cartCount }}
                                                    </div>
                                                    <i class="icon-shopping-bag1"></i>
                                                </div>
                                            </form>
                                        </li>


                                        <!-- <li class="header-button">
                                            <a href="" target="_blank" rel="" class="theme-btn four">Login <i class="icon-right-arrow"></i></a>
                                        </li> -->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </section>
                </header>
            </div>