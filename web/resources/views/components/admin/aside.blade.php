          <div class="menu-items-wrapper menu-item-wrapper3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
             <div class="container custom-container">
                <div class="row">
                   <div class="col-lg-8 col-md-6">
                    <div class="index1-logo">
                       <a href="{{ url('/') }}">
                       <img class="normal-logo" src="{{ asset('images/h3khire-logo.png') }}" alt="logo" style="max-height: 60px;">
                          <img class="sticky-logo" src="{{ asset('images/h3khire-logo.png') }}" alt="logo">
                       </a>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                                 <ul class="navbar-nav">
                              {{-- Dashboard link visible only to authenticated freelancers --}}
                              @auth
                                 @if (Auth::user()->role === 'freelancer')
                                    <li class="nav-item">
                                       <a class="nav-link" href="{{ route('freelancer.dashboard') }}">Dashboard</a>
                                    </li>
                                 @endif
                              @endauth
                                    @foreach ($routes as $route)
                                        @if ($route['is_dropdown'])
                                            <li class="nav-item menu-click{{ $loop->iteration }} ps-rel">
                                                <a class="nav-link" href="javascript:;">{{ $route['label'] }} <span><i class="fas fa-chevron-down"></i></span></a>
                                                <ul class="dropdown-items menu-open{{ $loop->iteration }}">
                                                    @foreach ($route['dropdown'] as $item)
                                                        <li><a href="{{ route($item['route_name']) }}">{{ $item['label'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route($route['route_name']) }}">{{ $route['label'] }}</a>
                                            </li>
                                        @endif
                                        
                                    @endforeach
                                 </ul>
                              </nav>
                 </div>
                 <div class="col-lg-4 col-md-6">
                   <ul
                                 class="d-xl-flex d-lg-flex d-md-none d-sm-none d-none justify-content-end align-items-center social-media-icons">
                                 <li class="dekstop-login-btn">
                              @auth
                                 @php $profileRoute = (Auth::user()->role === 'freelancer') ? route('freelancer.profile') : route('user.profile'); @endphp
                                 <a href="{{ $profileRoute }}">
                                    @if(Auth::user()->profile_picture)
                                       <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile" style="width: 24px; height: 24px; border-radius: 50%; object-fit: cover; display: inline-block; margin-right: 5px; vertical-align: middle;">
                                    @else
                                       <i class="fa fa-user-o" aria-hidden="true"></i>
                                    @endif
                                    {{ Auth::user()->name }}
                                 </a>
                                 <a href="{{ route('logout') }}">/ Logout</a>
                              @else
                                       <a href="{{ route('login') }}"> <i class="fa fa-user-o" aria-hidden="true"></i> Login</a>
                                       <a href="{{ route('register') }}">/ Sign Up</a>
                                    @endauth
                                 </li>
                                 <li class="login-btn">
                                    <a href="javascript:;"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                                     <div class="user-text">
                                    <a href="login.html"> <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32" xml:space="preserve"><path d="M16 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm0-12c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zM23.942 32H8.058A4.062 4.062 0 0 1 4 27.942c0-6.616 5.383-12 12-12s12 5.384 12 12A4.062 4.062 0 0 1 23.942 32zM16 17.942c-5.514 0-10 4.486-10 10A2.06 2.06 0 0 0 8.058 30h15.884A2.06 2.06 0 0 0 26 27.942c0-5.514-4.486-10-10-10z"/></svg></span> Login</a>
                                    
                                    <a href="sign-up.html"> <span><svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M10.95 15.84h-11V.17h11v3.88h-1V1.17h-9v13.67h9v-2.83h1v3.83z"/><path d="M5 8h6v1H5zM11 5.96l4.4 2.54-4.4 2.54V5.96z"/></svg></span> Sign Up</a>
                                 </div>
                                  </li>
                              </ul>
                 </div>
                </div>
             </div>
          </div>
          <!-- responsive menu bar start -->
          <div class="mobile-menu-wrapper d-xl-none d-lg-none d-md-block d-sm-block">
             <div class="container">
                <div class="row">
                   <div class=" col-md-4 col-sm-4 col-4">
                      <div class="mobile-logo">
                         <a href="">
                         <img src="{{ asset('images/h3khire-logo.png') }}" alt="logo">
                         </a>
                      </div>
                   </div>
                   <div class="col-md-8 col-sm-8 col-8">
                      <div class="d-flex  justify-content-end">
                         <div class="social-media-icons">
                            <ul>
                               <li class="login-btn">
                                 @auth
                                    @if(Auth::user()->profile_picture)
                                       <a href="javascript:;"><img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile" style="width: 64px; height: 64px; border-radius: 50%; object-fit: cover;"></a>
                                    @else
                                       <a href="javascript:;"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                                    @endif
                                 @else
                                    <a href="javascript:;"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                                 @endauth
                                  <div class="user-text">
                                    @auth
                                       @php $profileRoute = (Auth::user()->role === 'freelancer') ? route('freelancer.profile') : route('user.profile'); @endphp
                                       <a href="{{ $profileRoute }}"> <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32" xml:space="preserve"><path d="M16 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm0-12c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zM23.942 32H8.058A4.062 4.062 0 0 1 4 27.942c0-6.616 5.383-12 12-12s12 5.384 12 12A4.062 4.062 0 0 1 23.942 32zM16 17.942c-5.514 0-10 4.486-10 10A2.06 2.06 0 0 0 8.058 30h15.884A2.06 2.06 0 0 0 26 27.942c0-5.514-4.486-10-10-10z"/></svg></span> Profile</a>
                                       <a href="{{ route('logout') }}"> <span><svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M10.95 15.84h-11V.17h11v3.88h-1V1.17h-9v13.67h9v-2.83h1v3.83z"></path><path d="M5 8h6v1H5zM11 5.96l4.4 2.54-4.4 2.54V5.96z"></path></svg></span> Logout</a>
                                    @else
                                       <a href="{{ route('login') }}"> <span><svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M10.95 15.84h-11V.17h11v3.88h-1V1.17h-9v13.67h9v-2.83h1v3.83z"></path><path d="M5 8h6v1H5zM11 5.96l4.4 2.54-4.4 2.54V5.96z"></path></svg></span> Login</a>
                                       
                                       <a href="{{ route('register') }}"> <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32" xml:space="preserve"><path d="M16 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm0-12c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zM23.942 32H8.058A4.062 4.062 0 0 1 4 27.942c0-6.616 5.383-12 12-12s12 5.384 12 12A4.062 4.062 0 0 1 23.942 32zM16 17.942c-5.514 0-10 4.486-10 10A2.06 2.06 0 0 0 8.058 30h15.884A2.06 2.06 0 0 0 26 27.942c0-5.514-4.486-10-10-10z"></path></svg></span> Sign Up</a>
                                    @endauth
                                 </div>
                              </li>

                            </ul>
                         </div>
                         <div class="d-flex">
                            <div class="toggle-main-wrapper mt-2" id="sidebar-toggle">
                               <span class="line"></span>
                               <span class="line"></span>
                               <span class="line"></span>
                            </div>
                         </div>
                         
                      </div>
                   </div>
                </div>
             </div>
          </div>
                         <div id="sidebar">
                     <div class="sidebar_logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('images/h3khire-logo.png') }}" alt="logo" style="max-height: 60px"></a>
                     </div>
                     <div id="toggle_close">&times;</div>
                     <div id='cssmenu'>
                        <ul class="float_left">
                     @auth
                        @if (Auth::user()->role === 'freelancer')
                           <li><a href="{{ route('freelancer.dashboard') }}">Dashboard</a></li>
                        @endif
                     @endauth
                            @foreach ($routes as $route)
                                @if ($route['is_dropdown'])
                                    <li class="has-sub">
                                        <a href="javascript:;">{{ $route['label'] }}</a>
                                        <ul>
                                            @foreach ($route['dropdown'] as $item)
                                                <li><a href="{{ route($item['route_name']) }}">{{ $item['label'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ route($route['route_name']) }}">{{ $route['label'] }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                     </div>
                  </div>
          <!-- responsive menu End -->