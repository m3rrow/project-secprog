@extends('layout.app2')
@section('content_title', 'Company Listing')
@section('content_desc', 'Company Listing')
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
            <!--  -->
            <div class="sidebar_widget">
               <h4 class="title-sidebar">Industrial Experiences</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="aro">
                     <label for="aro">Aerospace/Defense</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="auto">
                     <label for="auto">Automotive</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="bank">
                     <label for="bank">Banking</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="bio">
                     <label for="bio">Biotechnology</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="hard">
                     <label for="hard">Computer Hardware</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="mob">
                     <label for="mob">Mobile</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="elect">
                     <label for="elect">electric</label>
                     </div>
               </div>
            </div>
            <!--  -->
            <div class="sidebar_widget">
               <h4 class="title-sidebar">Skills</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="andro1">
                     <label for="andro1">Android</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="api">
                     <label for="api">API</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="code1">
                     <label for="code1">C++</label>
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
               <h4 class="title-sidebar">English Level</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="andro">
                     <label for="andro">Basic</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="api1">
                     <label for="api1">Conversational</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="code">
                     <label for="code">Fluent</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="con1">
                     <label for="con1">Native Or Billingual</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="css1">
                     <label for="css1">Professional</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="comu">
                     <label for="comu">Communication</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="end">
                     <label for="end">English</label>
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
            <!--  -->
            <div class="blog-main-wrapper float_left">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-16">
                     <div class="blog-box">
                        <div class="img-icon">
                           <img src="images/blog-img4.jpg" alt="img">
                           <div class="img-overlay"></div>
                           <a href="javascript:;">30 jobs</a>
                        </div>
                        <div class="blog-content">
                           <div class="brand-logo">
                              <img src="images/infra.jpg" alt="infra">
                           </div>
                           <h3><a href="javascript:;">Infratech Pvt Ltd</a></h3>
                              <span> <i class="fas fa-check-circle"></i>  Verified Company</span>
                           <p><i class="fas fa-map-marker-alt"></i> 325, New Market, New York</p>
                           <a href="company-details.html" class="r-btn"> <span>View Profile</span> </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-16">
                     <div class="blog-box">
                        <div class="img-icon">
                           <img src="images/blog-img5.jpg" alt="img">
                           <div class="img-overlay"></div>
                           <a href="javascript:;">30 jobs</a>
                        </div>
                        <div class="blog-content">
                           <div class="brand-logo">
                              <img src="images/hardware.jpg" alt="infra">
                           </div>
                           <h3><a href="javascript:;">Hardware Information</a></h3>
                              <span> <i class="fas fa-check-circle"></i>  Verified Company</span>
                           <p><i class="fas fa-map-marker-alt"></i> 325, New Market, New York</p>
                           <a href="company-details.html" class="r-btn"><span>View Profile</span></a>
                        </div>
                     </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-6 col-md-6 col-sm-6 col-16">
                     <div class="blog-box">
                        <div class="img-icon">
                           <img src="images/blog-img3.jpg" alt="img">
                           <div class="img-overlay"></div>
                           <a href="javascript:;">30 jobs</a>
                        </div>
                        <div class="blog-content">
                           <div class="brand-logo">
                              <img src="images/info.jpg" alt="infra">
                           </div>
                           <h3><a href="javascript:;">Google Information</a></h3>
                              <span> <i class="fas fa-check-circle"></i>  Verified Company</span>
                           <p><i class="fas fa-map-marker-alt"></i> 325, New Market, New York</p>
                           <a href="company-details.html" class="r-btn"><span>View Profile</span></a>
                        </div>
                     </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-6 col-md-6 col-sm-6 col-16">
                     <div class="blog-box">
                        <div class="img-icon">
                           <img src="images/blog-img1.jpg" alt="img">
                           <div class="img-overlay"></div>
                           <a href="javascript:;">30 jobs</a>
                        </div>
                        <div class="blog-content">
                           <div class="brand-logo">
                              <img src="images/flow.jpg" alt="infra">
                           </div>
                           <h3><a href="javascript:;">Flowtech Information</a></h3>
                              <span> <i class="fas fa-check-circle"></i>  Verified Company</span>
                           <p><i class="fas fa-map-marker-alt"></i> 325, New Market, New York</p>
                           <a href="company-details.html" class="r-btn"><span>View Profile</span></a>
                        </div>
                     </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-6 col-md-6 col-sm-6 col-16">
                     <div class="blog-box">
                        <div class="img-icon">
                           <img src="images/blog-img6.jpg" alt="img">
                           <div class="img-overlay"></div>
                           <a href="javascript:;">30 jobs</a>
                        </div>
                        <div class="blog-content">
                           <div class="brand-logo">
                              <img src="images/tech.jpg" alt="infra">
                           </div>
                           <h3><a href="javascript:;">G Tach Solutions</a></h3>
                              <span> <i class="fas fa-check-circle"></i>  Verified Company</span>
                           <p><i class="fas fa-map-marker-alt"></i> 325, New Market, New York</p>
                           <a href="company-details.html" class="r-btn"><span>View Profile</span></a>
                        </div>
                     </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-6 col-md-6 col-sm-6 col-16">
                     <div class="blog-box">
                        <div class="img-icon">
                           <img src="images/blog-img7.jpg" alt="img">
                           <div class="img-overlay"></div>
                           <a href="javascript:;">30 jobs</a>
                        </div>
                        <div class="blog-content">
                           <div class="brand-logo">
                              <img src="images/meet.jpg" alt="infra">
                           </div>
                           <h3><a href="javascript:;">Pro Meet Pvt. Ltd</a></h3>
                              <span> <i class="fas fa-check-circle"></i>  Verified Company</span>
                           <p><i class="fas fa-map-marker-alt"></i> 325, New Market, New York</p>
                           <a href="company-details.html" class="r-btn"><span>View Profile</span></a>
                        </div>
                     </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-6 col-md-6 col-sm-6 col-16">
                     <div class="blog-box">
                        <div class="img-icon">
                           <img src="images/blog-img3.jpg" alt="img">
                           <div class="img-overlay"></div>
                           <a href="javascript:;">30 jobs</a>
                        </div>
                        <div class="blog-content">
                           <div class="brand-logo">
                              <img src="images/hand.jpg" alt="infra">
                           </div>
                           <h3><a href="javascript:;">Pro Meet Pvt. Ltd</a></h3>
                              <span> <i class="fas fa-check-circle"></i>  Verified Company</span>
                           <p><i class="fas fa-map-marker-alt"></i> 325, New Market, New York</p>
                           <a href="company-details.html" class="r-btn"><span>View Profile</span></a>
                        </div>
                     </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-6 col-md-6 col-sm-6 col-16">
                     <div class="blog-box">
                        <div class="img-icon">
                           <img src="images/blog-img2.jpg" alt="img">
                           <div class="img-overlay"></div>
                           <a href="javascript:;">30 jobs</a>
                        </div>
                        <div class="blog-content">
                           <div class="brand-logo">
                              <img src="images/flow.jpg" alt="infra">
                           </div>
                           <h3><a href="javascript:;">Pro Meet Pvt. Ltd</a></h3>
                              <span> <i class="fas fa-check-circle"></i>  Verified Company</span>
                           <p><i class="fas fa-map-marker-alt"></i> 325, New Market, New York</p>
                           <a href="company-details.html" class="r-btn"><span>View Profile</span></a>
                        </div>
                     </div>
                  </div>
               </div>
               <!--  -->
               <div class="custom-pegination">
                  <ul>
                     <li class="preious"> <a href="javascript:;"> <span>Previous</span> </a> </li>
                     <li class="active"> <a href="javascript:;"> <span>1</span> </a> </li>
                     <li> <a href="javascript:;"> <span>2</span> </a> </li>
                     <li> <a href="javascript:;"> <span>3</span> </a> </li>
                     <li> <a href="javascript:;"> <span>4</span> </a> </li>
                     <li> <a href="javascript:;"> <span>5</span> </a> </li>
                     <li class="preious active"> <a href="javascript:;"> <span>Next</span> </a> </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection