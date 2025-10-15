          <div class="menu-items-wrapper menu-item-wrapper3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
             <div class="container custom-container">
                <div class="row">
                   <div class="col-lg-8 col-md-6">
                    <div class="index1-logo">
                       <a href="{{ url('/') }}">
                       <img class="normal-logo" src="images/blue-logo.png" alt="logo">
                          <img class="sticky-logo" src="images/index1-logo.png" alt="logo">
                       </a>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                                 <ul class="navbar-nav">
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
                                       <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i>{{ Auth::user()->name }}</a>
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

                                 <li>
                                    <div class="search_bar hidden-xs">
                                       <div class="lv_search_bar" id="search_button">
                                          <a href="javascript:;">
                                             <span>
                                                <svg version="1.1" id="Capa_21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                   <g>
                                                      <g>
                                                         <path d="M225.474,0C101.151,0,0,101.151,0,225.474c0,124.33,101.151,225.474,225.474,225.474
                                                            c124.33,0,225.474-101.144,225.474-225.474C450.948,101.151,349.804,0,225.474,0z M225.474,409.323
                                                            c-101.373,0-183.848-82.475-183.848-183.848S124.101,41.626,225.474,41.626s183.848,82.475,183.848,183.848
                                                            S326.847,409.323,225.474,409.323z"></path>
                                                      </g>
                                                   </g>
                                                   <g>
                                                      <g>
                                                         <path d="M505.902,476.472L386.574,357.144c-8.131-8.131-21.299-8.131-29.43,0c-8.131,8.124-8.131,21.306,0,29.43l119.328,119.328
                                                            c4.065,4.065,9.387,6.098,14.715,6.098c5.321,0,10.649-2.033,14.715-6.098C514.033,497.778,514.033,484.596,505.902,476.472z"></path>
                                                      </g>
                                                   </g>
                                                </svg>
                                             </span>
                                          </a>
                                       </div>
                                       <div id="search_open" class="lv_search_box" style="display: none;">
                                          <input type="text" placeholder="Search here">
                                          <button><i class="fa fa-search" aria-hidden="true"></i>
                                          </button>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <a href="javascript:;" class="sidebar-toggle">
                                       <span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                           viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                       <path d="M8.667,15h30c0.552,0,1-0.447,1-1s-0.448-1-1-1h-30c-0.552,0-1,0.447-1,1S8.114,15,8.667,15z"/>
                                       <path d="M8.667,37h30c0.552,0,1-0.447,1-1s-0.448-1-1-1h-30c-0.552,0-1,0.447-1,1S8.114,37,8.667,37z"/>
                                       <path d="M8.667,26h30c0.552,0,1-0.447,1-1s-0.448-1-1-1h-30c-0.552,0-1,0.447-1,1S8.114,26,8.667,26z"/>
                                       </svg></span>
                                    </a>
                                 </li>
                                 @auth                                     
                                 <li class="post-drop">
                                    <a class="post-btn" href="javascript:;"><span><!-- <i class="fas fa-plus-circle"></i>   --> Post aNow &nbsp; <i class="fas fa-chevron-down"></i></span> </a>
                                    <div class="post-page-wrapper">
                                        <a href="{{ route('addjob') }}">Post a Job</a>
                                        <a href="{{ route('addproject') }}">Post a Project</a>
                                    </div>
                                 </li>
                                 @endauth
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
                         <img src="images/index1-logo.png" alt="logo">
                         </a>
                      </div>
                   </div>
                   <div class="col-md-8 col-sm-8 col-8">
                      <div class="d-flex  justify-content-end">
                         <div class="social-media-icons">
                            <ul>
                               <li class="login-btn">
                                 <a href="javascript:;"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                                  <div class="user-text">
                                    <a href="login.html"> <span><svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M10.95 15.84h-11V.17h11v3.88h-1V1.17h-9v13.67h9v-2.83h1v3.83z"></path><path d="M5 8h6v1H5zM11 5.96l4.4 2.54-4.4 2.54V5.96z"></path></svg></span> Login</a>
                                    
                                    <a href="sign-up.html"> <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32" xml:space="preserve"><path d="M16 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm0-12c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zM23.942 32H8.058A4.062 4.062 0 0 1 4 27.942c0-6.616 5.383-12 12-12s12 5.384 12 12A4.062 4.062 0 0 1 23.942 32zM16 17.942c-5.514 0-10 4.486-10 10A2.06 2.06 0 0 0 8.058 30h15.884A2.06 2.06 0 0 0 26 27.942c0-5.514-4.486-10-10-10z"></path></svg></span> Sing Up</a>
                                 </div>
                              </li>
                               <li>
                                  <div class="search_bar hidden-xs">
                                     <div class="lv_search_bar" id="search_button1">
                                        <a href="javascript:;">
                                           <span>
                                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                 <g>
                                                    <g>
                                                       <path d="M225.474,0C101.151,0,0,101.151,0,225.474c0,124.33,101.151,225.474,225.474,225.474
                                                          c124.33,0,225.474-101.144,225.474-225.474C450.948,101.151,349.804,0,225.474,0z M225.474,409.323
                                                          c-101.373,0-183.848-82.475-183.848-183.848S124.101,41.626,225.474,41.626s183.848,82.475,183.848,183.848
                                                          S326.847,409.323,225.474,409.323z"></path>
                                                    </g>
                                                 </g>
                                                 <g>
                                                    <g>
                                                       <path d="M505.902,476.472L386.574,357.144c-8.131-8.131-21.299-8.131-29.43,0c-8.131,8.124-8.131,21.306,0,29.43l119.328,119.328
                                                          c4.065,4.065,9.387,6.098,14.715,6.098c5.321,0,10.649-2.033,14.715-6.098C514.033,497.778,514.033,484.596,505.902,476.472z"></path>
                                                    </g>
                                                 </g>
                                              </svg>
                                           </span>
                                        </a>
                                     </div>
                                     <div id="search_open1" class="lv_search_box" style="display: none;">
                                        <input type="text" placeholder="Search here">
                                        <button><i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                     </div>
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
                        <a href="{{ url('/') }}"><img src="images/index1-logo.png" alt="logo"></a>
                     </div>
                     <div id="toggle_close">&times;</div>
                     <div id='cssmenu'>
                        <ul class="float_left">
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