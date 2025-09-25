@extends('layout.app2')
@section('content_title', 'Project Details')
@section('content_desc', 'Project Details')
@section('content')
<!-- inner page -->

<div class="inner-page-main-wrapper float_left">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="develop_main_wrapper">
               <div class="develop-cont">
                  <a href="javascript:;">
                     <h3>
                        Android & IOS Developer
                        <small>Softtech Pvt Ltd &nbsp; <i class="fas fa-check-square"></i></small>
                     </h3> 
                  </a>
                  <ul>
                     <li>
                        <span><i class="fas fa-dollar-sign"></i></span>
                        Expensive
                     </li>
                     <li>
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        Brisbane
                     </li>
                     <li>
                        <span><i class="far fa-clock"></i></span>
                        8 months ago
                     </li>
                  </ul>
               </div>
               <div class="bid_button">
                  <a href="#test"> <span>Bid Now</span> </a>
               </div>
            </div>
         </div>
         <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="descript_main_wrapper">
               <h4>Project Description</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut an
                  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labo
                  ris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisic-
                  ing elit, sed do eiusmod tempor incididunt ut an labore et dolore magna aliqua. Duis aute irure
                  dolor in reprehenderit in voluptate velit esse.
               </p>
               <ul class="link_btn">
                  <li><a href="javascript:;"> <i class="fas fa-globe-americas"></i>  &nbsp;www.example.com</a></li>
                  <li><a href="javascript:;" download> <i class="fas fa-file-pdf"></i> &nbsp; Download</a></li>
               </ul>
               <h4>Responsibilities</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut an
                  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labo
                  ris nisi ut aliquip ex ea commodo consequat.
               </p>
               <ul>
                  <li><span><i class="fas fa-check"></i></span> Design must be functional </li>
                  <li><span><i class="fas fa-check"></i></span>
                     Aenean pellentes vitae
                     </li>
                  <li><span><i class="fas fa-check"></i></span> Top quality Software services.
                     </li>
                  <li><span><i class="fas fa-check"></i></span> All Design Feature In E- workers
                     </li>
                  <li><span><i class="fas fa-check"></i></span>
                     Aenean pellentes vitae</li>
               </ul>
               <h4>Minimum Qualification</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut an
                  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labo
                  ris nisi ut aliquip ex ea commodo consequat.
               </p>
               <ul>
                  <li><span><i class="fas fa-check"></i></span> Design must be functional </li>
                  <li><span><i class="fas fa-check"></i></span>
                     Aenean pellentes vitae
                     </li>
                  <li><span><i class="fas fa-check"></i></span> Top quality Software services.
                     </li>
                  <li><span><i class="fas fa-check"></i></span> All Design Feature In E- workers
                     </li>
                  <li><span><i class="fas fa-check"></i></span>
                     Aenean pellentes vitae</li>
               </ul>
               <h4>Location</h4>
               <div style="width: 100%" class="map_frame"><iframe width="100" height="400" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
               
               <ul class="social-icon">
                  <li>
                     <h4 class="border-0 ps-0">Share</h4>
                  </li>
                  <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
               </ul>
            </div>
            <div class="descript_main_wrapper" id="test">
               <h4>Place a Bid on this Project</h4>
               <div class="bid-details-main">
                  <p>You will be able to edit your bid until the project is awarded to someone.</p>
                  <h6>Bid Details</h6>
                  <div class="row">
                     <div class="col-lg-6 col-md-12 col-12">
                        <label>Hourly Date(per month)</label>
                        <div class="input-box">
                           <input type="text" placeholder="$8">
                           <span>USD</span>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-12">
                        <label>Weekly Limit</label>
                        <div class="input-box">
                           <input type="text" placeholder="48">
                           <span>HRS</span>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12 col-12">
                        <label>Describe Your Proposal</label>
                        <textarea rows="6" placeholder="What makes you the best candidate for this project?"></textarea>
                     </div>
                     <div class="col-lg-12 col-md-12 col-12">
                        <a href="javascript:;" class="place_btn"> <span>Place Bid</span> </a>
                     </div>
                  </div>
               </div>
            </div>
            <h4 class="proposal_heading">Proposal</h4>
            
            <div class="descript_main_wrapper map_frame">
               <div class="proposal_main_sec">
                  <div class="proposal_img_text">
                     <div class="proposal_img">
                        <img src="images/user1.png" alt="">
                     </div>
                     <div class="proposal_text">
                        <h5>
                           
                           Aditi S.
                        </h5>
                        <p class="rating"><span>3.5</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i> &nbsp; <strong>(12 Reviewts ) &nbsp; 100% Completion</strong></p>
                     </div>
                  </div>
                  <div class="price">
                     <h5>$10.00 USD <small>/per hour</small></h5>
                  </div>
               </div>
               <p class="ps-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut  the
                  labore et dolore magna aliqua. Ut enim ad minim veniam. Consectetur adipisicing elit, sed do eius
                  mod tempor incididunt ut  the labore et dolore magna aliqua.
               </p>
               <a href="javascript:;" class="rm-btn">Read More &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="descript_main_wrapper map_frame">
               <div class="proposal_main_sec">
                  <div class="proposal_img_text">
                     <div class="proposal_img">
                        <img src="images/user2.png" alt="">
                     </div>
                     <div class="proposal_text">
                        <h5>
                           
                           Marina Smith
                        </h5>
                        <p class="rating"><span>3.5</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i> &nbsp; <strong>(12 Reviewts ) &nbsp; 100% Completion</strong></p>
                     </div>
                  </div>
                  <div class="price">
                     <h5>$10.00 USD <small>/per hour</small></h5>
                  </div>
               </div>
               <p class="ps-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut  the
                  labore et dolore magna aliqua. Ut enim ad minim veniam. Consectetur adipisicing elit, sed do eius
                  mod tempor incididunt ut  the labore et dolore magna aliqua.
               </p>
               <a href="javascript:;" class="rm-btn">Read More &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="descript_main_wrapper map_frame">
               <div class="proposal_main_sec">
                  <div class="proposal_img_text">
                     <div class="proposal_img">
                        <img src="images/user3.png" alt="">
                     </div>
                     <div class="proposal_text">
                        <h5>
                           
                           Akshay H.
                        </h5>
                        <p class="rating"><span>3.5</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i> &nbsp; <strong>(12 Reviewts ) &nbsp; 100% Completion</strong></p>
                     </div>
                  </div>
                  <div class="price">
                     <h5>$10.00 USD <small>/per hour</small></h5>
                  </div>
               </div>
               <p class="ps-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut  the
                  labore et dolore magna aliqua. Ut enim ad minim veniam. Consectetur adipisicing elit, sed do eius
                  mod tempor incididunt ut  the labore et dolore magna aliqua.
               </p>
               <a href="javascript:;" class="rm-btn">Read More &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="descript_main_wrapper map_frame">
               <div class="proposal_main_sec">
                  <div class="proposal_img_text">
                     <div class="proposal_img">
                        <img src="images/user4.png" alt="">
                     </div>
                     <div class="proposal_text">
                        <h5>
                           
                           Ajay S.
                        </h5>
                        <p class="rating"><span>3.5</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i> &nbsp; <strong>(12 Reviewts ) &nbsp; 100% Completion</strong></p>
                     </div>
                  </div>
                  <div class="price">
                     <h5>$10.00 USD <small>/per hour</small></h5>
                  </div>
               </div>
               <p class="ps-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut  the
                  labore et dolore magna aliqua. Ut enim ad minim veniam. Consectetur adipisicing elit, sed do eius
                  mod tempor incididunt ut  the labore et dolore magna aliqua.
               </p>
               <a href="javascript:;" class="rm-btn">Read More &nbsp; <i class="fas fa-chevron-right"></i></a>
            </div>
         </div>
         <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="descript_main_wrapper pb-0">
               <div class="budget_main_wrapper">
                  <div class="budget_img">
                     <img src="images/icon1.png" alt="">
                  </div>
                  <div class="budget_text">
                     <h5>$241.00</h5>
                     <span>Budget</span>
                  </div>
               </div>
               <div class="budget_main_wrapper border-bottom-0">
                  <div class="budget_img">
                     <img src="images/icon2.png" alt="">
                  </div>
                  <div class="budget_text">
                     <h5>05 Proposals</h5>
                     <span>Till Aug 28, 2020</span>
                  </div>
               </div>
            </div>
            <div class="descript_main_wrapper pb-0">
                  <h4>About the client</h4>
                  <ul class="client_list">
                     <li><i class="fas fa-map-marker-alt"></i> &nbsp; &nbsp; Brisbane</li>
                     <li><i class="fas fa-folder"></i> &nbsp; &nbsp; 13 projects completed</li>
                     <li><i class="fas fa-user"></i> &nbsp; &nbsp; <small>3.5</small> <strong><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i></strong> (12 Reviews )</li>
                     <li> <i class="far fa-clock"></i> &nbsp; &nbsp; Member since Aug 30, 2020</li>
                     
                  </ul>
            </div>
            <div class="descript_main_wrapper pb-0">
               <h4>Payment Method</h4>
               <ul class="client_list">
                  <li><i class="fas fa-comment-dollar"></i> &nbsp; &nbsp;  Payment method verified</li>
                  <li><i class="fas fa-folder-minus"></i>&nbsp; &nbsp; Deposit made</li>
                  <li><i class="fas fa-envelope"></i> &nbsp; &nbsp; Email address verified</li>
                  <li>  <i class="fas fa-user"></i> &nbsp; &nbsp; Profile completed</li>
                  <li><i class="fas fa-phone-volume"></i> &nbsp; &nbsp; Phone number verified</li>
                  
               </ul>
         </div>
         </div>
      </div>
   </div>
</div>
@endsection