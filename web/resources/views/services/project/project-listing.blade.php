@extends('layout.app2')
@section('content_title', 'Project Listing')
@section('content_desc', 'Project Listing')
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
                              <select>
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
                        <div class="ewr_search_infobox">
                          <div class="ewr_search_proj">
                              <h4><a href="project-detail.html ">Android app with web admin interface</a></h4>
                              <h5><i class="fa fa-check-square"></i>Jack Wilshere</h5>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut the labore et dolore magna aliqua. Ut enim ad an minim veniam sed do eiusmod tempor incididunt ut the labore et
                                  the dolore magna aliqua. Lorem ipsum dolor sit amet.
                              </p>
                              <ul class="ewr_profile_tag">
                                  <li><a href="javascript:;">Graphic Design</a></li>
                                  <li><a href="javascript:;">CSS</a></li>
                                  <li><a href="javascript:;">HTML 5</a></li>
                                  <li><a href="javascript:;">WordPress</a></li>
                                  <li><a href="javascript:;">...</a></li>
                              </ul>
                          </div>
                          <div class="ewr_search_proj_list">
                              <div class="ewr_search_proj_info">
                                  <ul>
                                      <li class="doller"><i class="fa fa-dollar"></i>Expensive</li>
                                      <li><img src="images/india.png" alt="flag" /> India</li>
                                      <li class="folder"><i class="fa fa-folder"></i>Type:Fixed</li>
                                      <li class="folder"><i class="fa fa-clock-o"></i>Less than a week</li>
                                      <li class="folder"><i class="fa fa-money"></i>Budget: $241.00</li>
                                      <li class="folder">
                                          <a href="javascript:;"><i class="fa fa-heart"></i>Favorite</a>
                                      </li>
                                  </ul>
                                  <a href="project-details.html" class="ewr_btn_yellow"><span>Bid Now</span></a>
                              </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="ewr_search_infobox">
                          <div class="ewr_search_proj">
                              <h4><a href="project-detail.html ">Construction business website</a></h4>
                              <h5><i class="fa fa-check-square"></i>Barry Allen</h5>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut the labore et dolore magna aliqua. Ut enim ad an minim veniam sed do eiusmod tempor incididunt ut the labore et
                                  the dolore magna aliqua. Lorem ipsum dolor sit amet.
                              </p>
                              <ul class="ewr_profile_tag">
                                  <li><a href="javascript:;">Graphic Design</a></li>
                                  <li><a href="javascript:;">CSS</a></li>
                                  <li><a href="javascript:;">HTML 5</a></li>
                                  <li><a href="javascript:;">WordPress</a></li>
                                  <li><a href="javascript:;">...</a></li>
                              </ul>
                          </div>
                          <div class="ewr_search_proj_list">
                              <div class="ewr_search_proj_info">
                                  <ul>
                                      <li class="doller"><i class="fa fa-dollar"></i>Expensive</li>
                                      <li><img src="images/india.png" alt="flag" /> India</li>
                                      <li class="folder"><i class="fa fa-folder"></i>Type:Fixed</li>
                                      <li class="folder"><i class="fa fa-clock-o"></i>Less than a week</li>
                                      <li class="folder"><i class="fa fa-money"></i>Budget: $241.00</li>
                                      <li class="folder">
                                          <a href="javascript:;"><i class="fa fa-heart"></i>Favorite</a>
                                      </li>
                                  </ul>
                                  <a href="project-details.html" class="ewr_btn_yellow"><span>Bid Now</span></a>
                              </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="ewr_search_infobox">
                          <div class="ewr_search_proj">
                              <h4><a href="project-detail.html ">Spring boot web service deployment</a></h4>
                              <h5><i class="fa fa-check-square"></i>Martin Gips</h5>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut the labore et dolore magna aliqua. Ut enim ad an minim veniam sed do eiusmod tempor incididunt ut the labore et
                                  the dolore magna aliqua. Lorem ipsum dolor sit amet.
                              </p>
                              <ul class="ewr_profile_tag">
                                  <li><a href="javascript:;">Graphic Design</a></li>
                                  <li><a href="javascript:;">CSS</a></li>
                                  <li><a href="javascript:;">HTML 5</a></li>
                                  <li><a href="javascript:;">WordPress</a></li>
                                  <li><a href="javascript:;">...</a></li>
                              </ul>
                          </div>
                          <div class="ewr_search_proj_list">
                              <div class="ewr_search_proj_info">
                                  <ul>
                                      <li class="doller"><i class="fa fa-dollar"></i>Expensive</li>
                                      <li><img src="images/india.png" alt="flag" /> India</li>
                                      <li class="folder"><i class="fa fa-folder"></i>Type:Fixed</li>
                                      <li class="folder"><i class="fa fa-clock-o"></i>Less than a week</li>
                                      <li class="folder"><i class="fa fa-money"></i>Budget: $241.00</li>
                                      <li class="folder">
                                          <a href="javascript:;"><i class="fa fa-heart"></i>Favorite</a>
                                      </li>
                                  </ul>
                                  <a href="project-details.html" class="ewr_btn_yellow"><span>Bid Now</span></a>
                              </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="ewr_search_infobox">
                          <div class="ewr_search_proj">
                              <h4><a href="project-detail.html">React native complete project</a></h4>
                              <h5><i class="fa fa-check-square"></i>Martina Colliys</h5>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut the labore et dolore magna aliqua. Ut enim ad an minim veniam sed do eiusmod tempor incididunt ut the labore et
                                  the dolore magna aliqua. Lorem ipsum dolor sit amet.
                              </p>
                              <ul class="ewr_profile_tag">
                                  <li><a href="javascript:;">Graphic Design</a></li>
                                  <li><a href="javascript:;">CSS</a></li>
                                  <li><a href="javascript:;">HTML 5</a></li>
                                  <li><a href="javascript:;">WordPress</a></li>
                                  <li><a href="javascript:;">...</a></li>
                              </ul>
                          </div>
                          <div class="ewr_search_proj_list">
                              <div class="ewr_search_proj_info">
                                  <ul>
                                      <li class="doller"><i class="fa fa-dollar"></i>Expensive</li>
                                      <li><img src="images/india.png" alt="flag" /> India</li>
                                      <li class="folder"><i class="fa fa-folder"></i>Type:Fixed</li>
                                      <li class="folder"><i class="fa fa-clock-o"></i>Less than a week</li>
                                      <li class="folder"><i class="fa fa-money"></i>Budget: $241.00</li>
                                      <li class="folder">
                                          <a href="javascript:;"><i class="fa fa-heart"></i>Favorite</a>
                                      </li>
                                  </ul>
                                  <a href="project-details.html" class="ewr_btn_yellow"><span>Bid Now</span></a>
                              </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="ewr_search_infobox">
                          <div class="ewr_search_proj">
                              <h4><a href="project-detail.html">Cakephp Property websites merging</a></h4>
                              <h5><i class="fa fa-check-square"></i>Joney Mike</h5>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut the labore et dolore magna aliqua. Ut enim ad an minim veniam sed do eiusmod tempor incididunt ut the labore et
                                  the dolore magna aliqua. Lorem ipsum dolor sit amet.
                              </p>
                              <ul class="ewr_profile_tag">
                                  <li><a href="javascript:;">Graphic Design</a></li>
                                  <li><a href="javascript:;">CSS</a></li>
                                  <li><a href="javascript:;">HTML 5</a></li>
                                  <li><a href="javascript:;">WordPress</a></li>
                                  <li><a href="javascript:;">...</a></li>
                              </ul>
                          </div>
                          <div class="ewr_search_proj_list">
                              <div class="ewr_search_proj_info">
                                  <ul>
                                      <li class="doller"><i class="fa fa-dollar"></i>Expensive</li>
                                      <li><img src="images/india.png" alt="flag" /> India</li>
                                      <li class="folder"><i class="fa fa-folder"></i>Type:Fixed</li>
                                      <li class="folder"><i class="fa fa-clock-o"></i>Less than a week</li>
                                      <li class="folder"><i class="fa fa-money"></i>Budget: $241.00</li>
                                      <li class="folder">
                                          <a href="javascript:;"><i class="fa fa-heart"></i>Favorite</a>
                                      </li>
                                  </ul>
                                  <a href="project-details.html" class="ewr_btn_yellow"><span>Bid Now</span></a>
                              </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="ewr_search_infobox">
                          <div class="ewr_search_proj">
                              <h4><a href="project-detail.html">Graphic design work to enhance brand</a></h4>
                              <h5><i class="fa fa-check-square"></i>Steven Odam</h5>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut the labore et dolore magna aliqua. Ut enim ad an minim veniam sed do eiusmod tempor incididunt ut the labore et
                                  the dolore magna aliqua. Lorem ipsum dolor sit amet.
                              </p>
                              <ul class="ewr_profile_tag">
                                  <li><a href="javascript:;">Graphic Design</a></li>
                                  <li><a href="javascript:;">CSS</a></li>
                                  <li><a href="javascript:;">HTML 5</a></li>
                                  <li><a href="javascript:;">WordPress</a></li>
                                  <li><a href="javascript:;">...</a></li>
                              </ul>
                          </div>
                          <div class="ewr_search_proj_list">
                              <div class="ewr_search_proj_info">
                                  <ul>
                                      <li class="doller"><i class="fa fa-dollar"></i>Expensive</li>
                                      <li><img src="images/india.png" alt="flag" /> India</li>
                                      <li class="folder"><i class="fa fa-folder"></i>Type:Fixed</li>
                                      <li class="folder"><i class="fa fa-clock-o"></i>Less than a week</li>
                                      <li class="folder"><i class="fa fa-money"></i>Budget: $241.00</li>
                                      <li class="folder">
                                          <a href="javascript:;"><i class="fa fa-heart"></i>Favorite</a>
                                      </li>
                                  </ul>
                                  <a href="project-details.html" class="ewr_btn_yellow"><span>Bid Now</span></a>
                              </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="ewr_search_infobox">
                          <div class="ewr_search_proj">
                              <h4><a href="project-detail.html">Experienced Proof Reader/Editor</a></h4>
                              <h5><i class="fa fa-check-square"></i>Kerry Spark</h5>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut the labore et dolore magna aliqua. Ut enim ad an minim veniam sed do eiusmod tempor incididunt ut the labore et
                                  the dolore magna aliqua. Lorem ipsum dolor sit amet.
                              </p>
                              <ul class="ewr_profile_tag">
                                  <li><a href="javascript:;">Graphic Design</a></li>
                                  <li><a href="javascript:;">CSS</a></li>
                                  <li><a href="javascript:;">HTML 5</a></li>
                                  <li><a href="javascript:;">WordPress</a></li>
                                  <li><a href="javascript:;">...</a></li>
                              </ul>
                          </div>
                          <div class="ewr_search_proj_list">
                              <div class="ewr_search_proj_info">
                                  <ul>
                                      <li class="doller"><i class="fa fa-dollar"></i>Expensive</li>
                                      <li><img src="images/india.png" alt="flag" /> India</li>
                                      <li class="folder"><i class="fa fa-folder"></i>Type:Fixed</li>
                                      <li class="folder"><i class="fa fa-clock-o"></i>Less than a week</li>
                                      <li class="folder"><i class="fa fa-money"></i>Budget: $241.00</li>
                                      <li class="folder">
                                          <a href="javascript:;"><i class="fa fa-heart"></i>Favorite</a>
                                      </li>
                                  </ul>
                                  <a href="project-details.html" class="ewr_btn_yellow"><span>Bid Now</span></a>
                              </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="ewr_search_infobox">
                          <div class="ewr_search_proj">
                              <h4><a href="project-detail.html">Develop an E-commerce Store</a></h4>
                              <h5><i class="fa fa-check-square"></i>Charlie Martin</h5>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut the labore et dolore magna aliqua. Ut enim ad an minim veniam sed do eiusmod tempor incididunt ut the labore et
                                  the dolore magna aliqua. Lorem ipsum dolor sit amet.
                              </p>
                              <ul class="ewr_profile_tag">
                                  <li><a href="javascript:;">Graphic Design</a></li>
                                  <li><a href="javascript:;">CSS</a></li>
                                  <li><a href="javascript:;">HTML 5</a></li>
                                  <li><a href="javascript:;">WordPress</a></li>
                                  <li><a href="javascript:;">...</a></li>
                              </ul>
                          </div>
                          <div class="ewr_search_proj_list">
                              <div class="ewr_search_proj_info">
                                  <ul>
                                      <li class="doller"><i class="fa fa-dollar"></i>Expensive</li>
                                      <li><img src="images/india.png" alt="flag" /> India</li>
                                      <li class="folder"><i class="fa fa-folder"></i>Type:Fixed</li>
                                      <li class="folder"><i class="fa fa-clock-o"></i>Less than a week</li>
                                      <li class="folder"><i class="fa fa-money"></i>Budget: $241.00</li>
                                      <li class="folder">
                                          <a href="javascript:;"><i class="fa fa-heart"></i>Favorite</a>
                                      </li>
                                  </ul>
                                  <a href="project-details.html" class="ewr_btn_yellow"><span>Bid Now</span></a>
                              </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="blog-main-wrapper float_left">
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
      

         <!-- modal apply now -->

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                  </div>
                </div>
              </div>
            </div>

@endsection