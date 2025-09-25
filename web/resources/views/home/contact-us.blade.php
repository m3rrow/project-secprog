@extends('layout.app2')
@section('content_title', 'Contact Us')
@section('content_desc', 'Contact Us')
@section('content')
<!-- inner page -->

<div class="inner-page-main-wrapper float_left">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="contact-main-wrapper float_left">
               <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="contact-box float_left">
                        <div class="contact-icon">
                           <a href="javascript:;"> <span><i class="fa fa-map-marker" aria-hidden="true"></i></span> </a>
                        </div>
                        <h4>Address</h4>
                        <p>Web Company Name,</p>
                        <p>125, Colis Street </p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="contact-box float_left">
                        <div class="contact-icon">
                           <a href="javascript:;"> <span><i class="fa fa-phone" aria-hidden="true"></i></span> </a>
                        </div>
                        <h4>Phone</h4>
                        <p>+1234567890</p>
                        <p>+1234567890</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="contact-box float_left">
                        <div class="contact-icon">
                           <a href="javascript:;"> <span><i class="fa fa-envelope" aria-hidden="true"></i></span> </a>
                        </div>
                        <h4>Email</h4>
                        <p>store@example.com</p>
                        <p>store@example.com</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="contact-box float_left">
                        <div class="contact-icon">
                           <a href="javascript:;"> <span><i class="fa fa-globe" aria-hidden="true"></i></span> </a>
                        </div>
                        <h4>Web Address</h4>
                        <p>www.example.com</p>
                        <p>www.example.com</p>
                     </div>
                  </div>
               </div>
            </div>
            <!--  -->
            <div class="locate-main-wrapper float_left">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-12">
                     <iframe width="100" height="500" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                     <div class="leave-form float_left">
                        <h4>Leave A Message</h4>
                        <form>
                           <div class="form-group row">
                              <div class="col-md-12 col-12">
                                 <input type="text" class="form-control require" name="first_name" required="" placeholder="Full Name">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-12 col-12">
                                 <input type="email" class="form-control require" name="email" required="" data-valid="email" data-error="Email should be valid." placeholder="Email Address">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-12 col-12">
                                 <input type="number" class="form-control require" name="contact_no" placeholder="Mobile no.">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-12 col-12">
                                 <input type="text" class="form-control require" name="message" placeholder="Message">
                              </div>
                           </div>
                           <button class="submitForm custom-btn"> <span>Send Now</span> </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
</div>
@endsection