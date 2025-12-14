@extends('layout.app2')
@section('content_title', 'Jobs Listing')
@section('content_desc', 'Jobs Listing')
@section('content')
<!-- inner page -->

<div class="inner-page-main-wrapper float_left">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="sidebar_widget pb-0">
               <h4 class="title-sidebar">Start Your Search</h4>
               <div class="select-box">
                  <input type="text" placeholder="select category">
                  <button><i class="fas fa-search"></i></button>
               </div>
            </div>
            <div class="sidebar_widget pb-0">
               <h4 class="title-sidebar">Job Type</h4>
               <div class="freelauncer-select-box">
                  <div class="form-group">
                     <input type="checkbox" id="job1">
                     <label for="job1">Onsite</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="job2">
                     <label for="job2">Partial Onsite</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="job3">
                     <label for="job3">Remote</label>
                     </div>
               </div>
            </div>
            <!--  -->
            <div class="sidebar_widget pb-0">
               <h4 class="title-sidebar">Price Type</h4>
               <div class="freelauncer-select-box">
                  <div class="form-group">
                     <input type="checkbox" id="price1">
                     <label for="price1">All</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="price2">
                     <label for="price2">Fixed Project</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="price3">
                     <label for="price3">Hourly Based Project</label>
                     </div>

                  <div class="price-range-slider">
                     <div id="slider-range" class="range-bar"></div>
                     <p class="range-value">
                        <input type="text" id="amount" readonly>
                     </p>
                  </div>

               </div>
            </div>
            <!--  -->
            <div class="sidebar_widget">
               <h4 class="title-sidebar">Project Length</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="rmonth1">
                     <label for="rmonth1">01 to 03 months</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="month2">
                     <label for="month2">03 to 06 months</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="month3">
                     <label for="month3">Less than a month</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="rmonth2">
                     <label for="rmonth2">Less than a week</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="month5">
                     <label for="month5">More than 06 months</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="month6">
                     <label for="month6">03 to 06 months</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="month7">
                     <label for="month7">03 to 06 months</label>
                     </div>
               </div>
            </div>
            <!--  -->
            <div class="sidebar_widget pb-0">
               <h4 class="title-sidebar">Freelancer Type</h4>
               <div class="freelauncer-select-box">
                  <div class="form-group">
                     <input type="checkbox" id="free1">
                     <label for="free1">Agency Freelancers</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="free2">
                     <label for="free2">Independent Freelancers</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="free3">
                     <label for="free3">New Rising Talent</label>
                     </div>
               </div>
            </div>
            <!--  -->
            <div class="sidebar_widget">
               <h4 class="title-sidebar">Categories</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="cate1">
                     <label for="cate1">Business</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="cate2">
                     <label for="cate2">Digital Marketing</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="cate3">
                     <label for="cate3">Programming & Tech</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="cate4">
                     <label for="cate4">Mobiles</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="cate5">
                     <label for="cate5">Music & Audio</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="cate6">
                     <label for="cate6">Headphone</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="cate7">
                     <label for="cate7">Threater</label>
                     </div>
               </div>
            </div>
            <!--  -->
            <div class="sidebar_widget">
               <h4 class="title-sidebar">Skills</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="andro">
                     <label for="andro">Android</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="api">
                     <label for="api">API</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="code">
                     <label for="code">C++</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="con">
                     <label for="con">Content Writing</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="css">
                     <label for="css">Css</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="java">
                     <label for="java">java</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="word">
                     <label for="word">Wordpress</label>
                     </div>
               </div>
            </div>
               <!--  -->
            <div class="sidebar_widget">
               <h4 class="title-sidebar">Location</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="aus">
                     <label for="aus"> <span> <img src="images/aus.png" alt="img"> </span> Austraila</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="india">
                     <label for="india"> <span> <img src="images/india.png" alt="img"> </span> India</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="canada">
                     <label for="canada"> <span> <img src="images/can.png" alt="img"> </span> Canada</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="uni">
                     <label for="uni"> <span> <img src="images/uk.png" alt="img"> </span> United Kingdom</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="united">
                     <label for="united"> <span> <img src="images/us.png" alt="img"> </span> United States</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="mala">
                     <label for="mala"> <span> <img src="images/aus.png" alt="img"> </span> Malasiya</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="dubai">
                     <label for="dubai"> <span> <img src="images/aus.png" alt="img"> </span> Dubai</label>
                     </div>
               </div>
            </div>
            <!--  -->
            <div class="sidebar_widget">
               <h4 class="title-sidebar">Languages</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="lan1">
                     <label for="lan1"> Abkhazian</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="lan2">
                     <label for="lan2"> Afar</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="lan3">
                     <label for="lan3"> Affricaans</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="lan4">
                     <label for="lan4"> Akan</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="lan5">
                     <label for="lan5"> Albanian</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="lan6">
                     <label for="lan6"> Hindi</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="lan7">
                     <label for="lan7"> English</label>
                     </div>
               </div>
            </div>
            <!--  -->
            <div class="sidebar_text">
               <p>Click “Apply Filter” to apply latest changes made by you.</p>
               <a class="custom-btn" href="javascript:;"> <span>Apply Filters</span> </a>
            </div>
         </div>
         <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="top-pipe-search-wrapper float_left">
               <div class="search-box">
                  <label>Sort by :</label>
                  <select name="select">
                     <option selected="selected" value=""> Default</option>
                     <option value="home">Select 1</option>
                     <option value="vehicle">Select 2</option>
                     <option value="education">Select 3</option>
                     <option value="business">Select 4</option>
                  </select>
               </div>
               <div class="pegination">
                  <ul>
                     <li>Showing</li>
                     <li><a href="javascript:;">01 -</a> </li>
                     <li><a href="javascript;;">08</a></li>
                     <li>of</li>
                     <li><a href="javascript:;">66</a></li>
                     <li>Total</li>
                  </ul>
               </div>
            </div>
            <!-- Jobs listing (dynamic) -->
            @if(isset($jobs) && $jobs->count())
               @foreach($jobs as $job)
                  <div class="freelauncer-profile float_left">
                     <div class="profile-img">
                        <img src="{{ asset('images/p1.png') }}" alt="job">
                     </div>
                     <div class="profile-text ps-rel">
                        <a href="{{ route('jobs.show', $job->id) }}"><h6>{{ $job->title }}</h6></a>
                        <a href="{{ route('jobs.show', $job->id) }}"><small>{{ $job->company ?? optional($job->user)->name ?? 'Company' }} <i class="fa fa-check" aria-hidden="true"></i></small></a>
                        <div class="rating-sec">
                           <div class="star">
                              <ul>
                                 <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                                 <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                                 <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                                 <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                                 <li> <a href="javascript:;"><i class="far fa-star"></i></a> </li>
                              </ul>
                           </div>
                           <div class="rating-btn">
                              <a class="btn1" href="javascript:;">Featured</a>
                           </div>
                        </div>
                        <div class="pro-add">
                           <ul>
                              <li> <span><i class="far fa-money-bill-alt"></i></span> {{ $job->salary ?? 'Negotiable' }}</li>
                              <li> <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> {{ $job->created_at->diffForHumans() }}</li>
                              <li> <span><i class="fas fa-map-marker-alt"></i></span> {{ $job->location ?? 'Remote' }}</li>
                              <li class="heart"> <span><i class="fas fa-heart"></i></span></li>
                           </ul>
                        </div>
                     </div>
                     <div class="pro-text">
                        <p>{{ \Illuminate\Support\Str::limit($job->description, 200) }}</p>
                     </div>
                     <div class="skill">
                        <div class="skill-text">
                           <p>Skills</p>
                           @if($job->skills)
                              @foreach(explode(',', $job->skills) as $skill)
                                 <a href="javascript:;">{{ trim($skill) }}</a>
                              @endforeach
                           @endif
                        </div>
                        <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Apply Now</span></button>
                     </div>
                  </div>
               @endforeach
            @else
               <div class="freelauncer-profile float_left">
                  <div class="profile-text ps-rel">
                     <h6>No jobs found.</h6>
                     <p>There are currently no jobs posted.</p>
                  </div>
               </div>
            @endif
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/p4.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="jobs-details.html"><h6>Seniour PHP Developer</h6></a>
                  <a href="jobs-details.html"><small>Infratech Pvt Ltd <i class="fa fa-check" aria-hidden="true"></i></small></a>
                  <div class="rating-sec">
                     <div class="star">
                        <ul>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="far fa-star"></i></a> </li>
                        </ul>
                     </div>
                     <div class="rating-btn">
                        <a class="btn2" href="javascript:;">New</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
                        <li> <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> 8 months ago </li>
                        <li> <span><i class="fas fa-map-marker-alt"></i></span> Brisbane</li>
                        <li class="heart"> <span><i class="fas fa-heart"></i></span></li>
                     </ul>
                  </div>
               </div>
               <div class="pro-text">
                  <p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu omnis iste natus error…</p>
               </div>
               <div class="skill">
                  <div class="skill-text">
                     <p>Skills</p>
                     <a href="javascript:;">HTML</a>
                     <a href="javascript:;">Photoshop</a>
                     <a href="javascript:;">Java</a>
                     <a href="javascript:;">Ui / UX</a>
                     <a href="javascript:;">Jquery</a>
                     <a href="javascript:;">My SQL</a>
                     <a href="javascript:;">PHP</a>
                  </div>
                  <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Apply Now</span></button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/p1.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="jobs-details.html"><h6>Software Engineering</h6></a>
                  <a href="jobs-details.html"><small>Infratech Pvt Ltd <i class="fa fa-check" aria-hidden="true"></i></small></a>
                  <div class="rating-sec">
                     <div class="star">
                        <ul>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="far fa-star"></i></a> </li>
                        </ul>
                     </div>
                     <div class="rating-btn">
                        <a class="btn1" href="javascript:;">Featured</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
                        <li> <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> 8 months ago </li>
                        <li> <span><i class="fas fa-map-marker-alt"></i></span> Brisbane</li>
                        <li class="heart"> <span><i class="fas fa-heart"></i></span></li>
                     </ul>
                  </div>
               </div>
               <div class="pro-text">
                  <p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu omnis iste natus error…</p>
               </div>
               <div class="skill">
                  <div class="skill-text">
                     <p>Skills</p>
                     <a href="javascript:;">HTML</a>
                     <a href="javascript:;">Photoshop</a>
                     <a href="javascript:;">Java</a>
                     <a href="javascript:;">Ui / UX</a>
                     <a href="javascript:;">Jquery</a>
                     <a href="javascript:;">My SQL</a>
                     <a href="javascript:;">PHP</a>
                  </div>
                  <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Apply Now</span></button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/p2.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="jobs-details.html"><h6>Seniour PHP Developer</h6></a>
                  <a href="jobs-details.html"><small>Google Information <i class="fa fa-check" aria-hidden="true"></i></small></a>
                  <div class="rating-sec">
                     <div class="star">
                        <ul>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="far fa-star"></i></a> </li>
                        </ul>
                     </div>
                     <div class="rating-btn">
                        <a class="btn1" href="javascript:;">Featured</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
                        <li> <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> 8 months ago </li>
                        <li> <span><i class="fas fa-map-marker-alt"></i></span> Brisbane</li>
                        <li class="heart"> <span><i class="fas fa-heart"></i></span></li>
                     </ul>
                  </div>
               </div>
               <div class="pro-text">
                  <p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu omnis iste natus error…</p>
               </div>
               <div class="skill">
                  <div class="skill-text">
                     <p>Skills</p>
                     <a href="javascript:;">HTML</a>
                     <a href="javascript:;">Photoshop</a>
                     <a href="javascript:;">Java</a>
                     <a href="javascript:;">Ui / UX</a>
                     <a href="javascript:;">Jquery</a>
                     <a href="javascript:;">My SQL</a>
                     <a href="javascript:;">PHP</a>
                  </div>
                  <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Apply Now</span></button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/p3.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="jobs-details.html"><h6>Iphone Developer</h6></a>
                  <a href="jobs-details.html"><small>Flowtech Information <i class="fa fa-check" aria-hidden="true"></i></small></a>
                  <div class="rating-sec">
                     <div class="star">
                        <ul>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="far fa-star"></i></a> </li>
                        </ul>
                     </div>
                     <div class="rating-btn">
                        <a class="btn1" href="javascript:;">Featured</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
                        <li> <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> 8 months ago </li>
                        <li> <span><i class="fas fa-map-marker-alt"></i></span> Brisbane</li>
                        <li class="heart"> <span><i class="fas fa-heart"></i></span></li>
                     </ul>
                  </div>
               </div>
               <div class="pro-text">
                  <p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu omnis iste natus error…</p>
               </div>
               <div class="skill">
                  <div class="skill-text">
                     <p>Skills</p>
                     <a href="javascript:;">HTML</a>
                     <a href="javascript:;">Photoshop</a>
                     <a href="javascript:;">Java</a>
                     <a href="javascript:;">Ui / UX</a>
                     <a href="javascript:;">Jquery</a>
                     <a href="javascript:;">My SQL</a>
                     <a href="javascript:;">PHP</a>
                  </div>
                  <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Apply Now</span></button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/p4.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="jobs-details.html"><h6>Graphic Designer</h6></a>
                  <a href="jobs-details.html"><small>Hardware Information <i class="fa fa-check" aria-hidden="true"></i></small></a>
                  <div class="rating-sec">
                     <div class="star">
                        <ul>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="far fa-star"></i></a> </li>
                        </ul>
                     </div>
                     <div class="rating-btn">
                        <a class="btn1" href="javascript:;">Featured</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
                        <li> <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> 8 months ago </li>
                        <li> <span><i class="fas fa-map-marker-alt"></i></span> Brisbane</li>
                        <li class="heart"> <span><i class="fas fa-heart"></i></span></li>
                     </ul>
                  </div>
               </div>
               <div class="pro-text">
                  <p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu omnis iste natus error…</p>
               </div>
               <div class="skill">
                  <div class="skill-text">
                     <p>Skills</p>
                     <a href="javascript:;">HTML</a>
                     <a href="javascript:;">Photoshop</a>
                     <a href="javascript:;">Java</a>
                     <a href="javascript:;">Ui / UX</a>
                     <a href="javascript:;">Jquery</a>
                     <a href="javascript:;">My SQL</a>
                     <a href="javascript:;">PHP</a>
                  </div>
                  <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Apply Now</span></button>
               </div>
            </div>
            <!--  -->
               <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/p4.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="jobs-details.html"><h6>Seniour PHP Developer</h6></a>
                  <a href="jobs-details.html"><small>Infratech Pvt Ltd <i class="fa fa-check" aria-hidden="true"></i></small></a>
                  <div class="rating-sec">
                     <div class="star">
                        <ul>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="fas fa-star"></i></a> </li>
                           <li> <a href="javascript:;"><i class="far fa-star"></i></a> </li>
                        </ul>
                     </div>
                     <div class="rating-btn">
                        <a class="btn2" href="javascript:;">New</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
                        <li> <span><i class="fa fa-clock-o" aria-hidden="true"></i></span> 8 months ago </li>
                        <li> <span><i class="fas fa-map-marker-alt"></i></span> Brisbane</li>
                        <li class="heart"> <span><i class="fas fa-heart"></i></span></li>
                     </ul>
                  </div>
               </div>
               <div class="pro-text">
                  <p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu omnis iste natus error…</p>
               </div>
               <div class="skill">
                  <div class="skill-text">
                     <p>Skills</p>
                     <a href="javascript:;">HTML</a>
                     <a href="javascript:;">Photoshop</a>
                     <a href="javascript:;">Java</a>
                     <a href="javascript:;">Ui / UX</a>
                     <a href="javascript:;">Jquery</a>
                     <a href="javascript:;">My SQL</a>
                     <a href="javascript:;">PHP</a>
                  </div>
                  <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Apply Now</span></button>
               </div>
            </div>
            <!--  -->
            <div class="blog-main-wrapper float_left">
               <div class="custom-pegination">
                  @if(isset($jobs))
                     {{ $jobs->links() }}
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- modal apply now -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered apply-job-modal">
      <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Apply Now</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="content-box">
            <span>To apply for this job <strong>email your details to</strong></span>
            <a href="javascript:;">admin@gmail.com</a>
            <p>You can apply to this job and others using your online resume. Click the link below to submit your online resume and email your application to this employer.</p>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Submit Resume & Apply</button>
         <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
      </div>
   </div>
</div>
@endsection