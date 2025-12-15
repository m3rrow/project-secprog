<div class="footer-main-wrapper footer-main3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="sb-footer-section">
                            <div class="footer-logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('images/h3khire-logo.png') }}" alt="" style="max-width: 150px; height: auto;"></a>
                            </div>
                            <p>Connecting freelancers with meaningful projects worldwide.</p>
                            <ul>
                                <li><a href="javascript:;"><i class="fas fa-envelope"></i>
                                    support@h3khire.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="links">
                            <h4>Service</h4>
                            <ul>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Freelancer</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Employers</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Project</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Post a Job</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Post a Project</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="links">
                            <h4>Our Company</h4>
                            <ul>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>About Us</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Our Blog</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Careers</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Terms of Service</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Privacy Policy</a></li>
                                <li><a href="javascript:;"><i class="fas fa-angle-right"></i>Contact & Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="links">
                            <h4>News Letter</h4>
                            <p>Wants to get latest updates! Sign up a for free, get started with store.</p>
                            <div class="input-box ps-rel">
                                <input type="text" placeholder="Your mail Address">
                                <button>Subscribe</button>
                            </div>
                            <div class="app-btn">
                                <a href="javascript:;">
                                    <img src="{{ asset('images/app-store.png') }}" alt="app">
                                </a>
                                <a href="javascript:;">
                                    <img src="{{ asset('images/gpay.png') }}" alt="app">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer float_left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <p>© Copyright 2025 - H3khire by team | All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/wow.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/contact_form.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script>
            $('.heart a').click( function(){
                if ( $(this).hasClass('current') ) {
                    $(this).removeClass('current');
                } else {
                    $('.top_icon span.current').removeClass('current');
                    $(this).addClass('current');    
                }
            });
        </script>
        <script>
                $('#search_button').on("click", function(e) {
                $('#search_open').slideToggle();
                e.stopPropagation(); 
            });
            
            $(document).on("click", function(e){
                if(!(e.target.closest('#search_open'))){  
                    $("#search_open").slideUp();            
                }
            });
        </script>
        <script>
                $('#search_button1').on("click", function(e) {
                $('#search_open1').slideToggle();
                e.stopPropagation(); 
            });
            
            $(document).on("click", function(e){
                if(!(e.target.closest('#search_open1'))){  
                    $("#search_open1").slideUp();            
                }
            });
        </script>
    </body>
</html>