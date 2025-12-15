@extends('layout.app')

@section('content')

<div class="index1-slider-wrapper ps-rel" style="height: 500px !important; padding: 0 !important; display: flex; align-items: center; justify-content: center;">
    <div class="video-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -1;">
        <video autoplay muted loop playsinline poster="{{ asset('video/banner1.mp4') }}" style="width: 100%; height: 100%; object-fit: cover;">
            <source src="{{ asset('video/banner1.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="overlay-slider" style="background: rgba(0, 0, 0, 0.5); position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
        <div class="container">
            <div class="slider-caption text-center" style="color: white;">
                <h2 style="font-size: 3rem; font-weight: bold;">Contact Us</h2>
                <ul class="treding-list" style="list-style: none; padding: 0; margin-top: 10px; display: inline-flex; gap: 5px;">
                    <li><a href="{{ url('/') }}" style="color: #fff; text-decoration: none;">Home</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="inner-page-main-wrapper float_left ptb-100">
    <div class="container">
        <div class="contact-main-wrapper float_left">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="contact-box float_left">
                        <div class="contact-icon"><a href="javascript:;"> <span><i class="fa fa-map-marker" aria-hidden="true"></i></span> </a></div>
                        <h4>Address</h4>
                        <p>Web Company Name, 125, Colis Street</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="contact-box float_left">
                        <div class="contact-icon"><a href="javascript:;"> <span><i class="fa fa-phone" aria-hidden="true"></i></span> </a></div>
                        <h4>Phone</h4>
                        <p>+1234567890</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="contact-box float_left">
                        <div class="contact-icon"><a href="javascript:;"> <span><i class="fa fa-envelope" aria-hidden="true"></i></span> </a></div>
                        <h4>Email</h4>
                        <p>store@example.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="contact-box float_left">
                        <div class="contact-icon"><a href="javascript:;"> <span><i class="fa fa-globe" aria-hidden="true"></i></span> </a></div>
                        <h4>Web Address</h4>
                        <p>www.example.com</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="locate-main-wrapper float_left" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 mb-4">
                    <iframe width="100%" height="550" src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border-radius: 8px;"></iframe>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="leave-form float_left" style="background: #a7a7a7ff; padding: 40px; border: 1px solid #eee; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                        <h4 style="text-align: center; font-weight: bold;margin-bottom: 30px; font-size: 1.8rem;">Leave A Message</h4>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="full_name" style="margin-bottom: 8px; display: block; font-weight: 500;">Full Name</label>
                                        <input type="text" id="full_name" class="form-control" required="" placeholder="e.g. John Doe">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="email_address" style="margin-bottom: 8px; display: block; font-weight: 500;">Email Address</label>
                                        <input type="email" id="email_address" class="form-control" required="" placeholder="e.g. john@example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="message" style="margin-bottom: 8px; display: block; font-weight: 500;">Message</label>
                                <textarea id="message" class="form-control" rows="5" required="" placeholder="Write your message here..."></textarea>
                            </div>
                            <div class="text-center">
                                <button class="submitForm custom-btn"> <span><i class="fas fa-paper-plane"></i> Send Now</span> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection