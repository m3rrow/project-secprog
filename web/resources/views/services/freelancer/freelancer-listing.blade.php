@extends('layout.app2')
@section('content_title', 'Freelancer Listing')
@section('content_desc', 'Freelancer Listing')
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
               <h4 class="title-sidebar">Hourly Rate</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="rate1">
                     <label for="rate1">$5 And Below</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="rate2">
                     <label for="rate2">$5 - $10</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="rate3">
                     <label for="rate3">$10 - $20</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="rate4">
                     <label for="rate4">$20 - $30</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="rate5">
                     <label for="rate5">$40 - $50</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="rate6">
                     <label for="rate6">$40 - $50</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="rate7">
                     <label for="rate7">$40 - $50</label>
                     </div>
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
               <h4 class="title-sidebar">English Level</h4>
               <div class="custom-check">
                  <div class="form-group">
                     <input type="checkbox" id="andro1">
                     <label for="andro1">Basic</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="api1">
                     <label for="api1">Conversational</label>
                     </div>
                     <div class="form-group">
                     <input type="checkbox" id="code1">
                     <label for="code1">Fluent</label>
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
                     <input type="checkbox" id="comu1">
                     <label for="comu1">Communication</label>
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
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/profile1.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="freelacing-details.html"><h6>John Smith</h6></a>
                  <span>Senior Graphic & Web Designer</span>
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
                        <a href="javascript:;">Full Time</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
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
                  <button data-fancybox data-src="#hire" class="apply-btn" title="open"> <span>Hire Us</span> </button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/profile2.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="freelacing-details.html"><h6>David</h6></a>
                  <span>Senior Graphic & Web Designer</span>
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
                        <a href="javascript:;">Full Time</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
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
                  
                  <button data-fancybox data-src="#hire" class="apply-btn" title="open"> <span>Hire Us</span> </button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/profile3.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="freelacing-details.html"><h6>Beatriz</h6></a>
                  <span>Senior Graphic & Web Designer</span>
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
                        <a href="javascript:;">Full Time</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
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
                  <button data-fancybox data-src="#hire" class="apply-btn" title="open"> <span>Hire Us</span> </button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/profile4.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="freelacing-details.html"><h6>Jerry</h6></a>
                  <span>Senior Graphic & Web Designer</span>
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
                        <a href="javascript:;">Full Time</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
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
                  <button data-fancybox data-src="#hire" class="apply-btn" title="open"> <span>Hire Us</span> </button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/profile5.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="freelacing-details.html"><h6> Aaron</h6></a>
                  <span>Senior Graphic & Web Designer</span>
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
                        <a href="javascript:;">Full Time</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
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
                  <button data-fancybox data-src="#hire" class="apply-btn" title="open"> <span>Hire Us</span> </button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/coment-img2.jpg" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="freelacing-details.html"><h6>Shira</h6></a>
                  <span>Senior Graphic & Web Designer</span>
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
                        <a href="javascript:;">Full Time</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
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
                  <button data-fancybox data-src="#hire" class="apply-btn" title="open"> <span>Hire Us</span> </button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/profile1.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="freelacing-details.html"><h6>John Smith</h6></a>
                  <span>Senior Graphic & Web Designer</span>
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
                        <a href="javascript:;">Full Time</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
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
                  <button data-fancybox data-src="#hire" class="apply-btn" title="open"> <span>Hire Us</span> </button>
               </div>
            </div>
            <!--  -->
            <div class="freelauncer-profile float_left">
               <div class="profile-img">
                  <img src="images/profile1.png" alt="profie">
               </div>
               <div class="profile-text ps-rel">
                  <a href="freelacing-details.html"><h6>John Smith</h6></a>
                  <span>Senior Graphic & Web Designer</span>
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
                        <a href="javascript:;">Full Time</a>
                     </div>
                  </div>
                  <div class="pro-add">
                     <ul>
                        <li> <span><i class="far fa-money-bill-alt"></i></span> $20 / Hour</li>
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
                  <button data-fancybox data-src="#hire" class="apply-btn" title="open"> <span>Hire Us</span> </button>
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
<!-- Hire Me Popup -->
<div class="hire_me_popup" id="hire" style="display: none;">
   <div class="hire_me_popup_box">
         <h4>Offer your project to kingjoon</h4>
         <form>
            <label>Project Name</label>
            <input type="text" name="project-name" placeholder="Project for ART LAND DESIGN">
            <label>Send a Private Message</label>
            <textarea rows="3">Hi kingjoon, I noticed your profile and would like to offer you my project. We can discuss any details over chat.</textarea>
            <label>Hire for</label>
            <ul class="select-filde">
            <li>
                  <input type="radio" name="anything" value="" id="yes" checked="checked" />
                  <label for="yes">fixed price</label>
            </li>
            <li>
                  <input type="radio" name="anything" value="" id="no"/>
                  <label for="no">Hourly Rate</label>
            </li>
         </ul>
         <div class="product someData" id="first">
            <ul>
                  <li>
                     <label>Budget</label>
                     <input type="number" name="rupee" min="0" value="250">
                     <span>$</span>
                  </li>
                  <li>
                     <select>
                        <option>INR</option>
                        <option>USD</option>
                        <option>NZD</option>
                        <option>AUD</option>
                        <option>GBP</option>
                        <option>HKD</option>
                        <option>SGD</option>
                        <option>EUR</option>
                        <option>CAD</option>
                     </select>
                  </li>
            </ul>
         </div>
         <div class="product someData" id="second">
            <ul>
                  <li>
                     <label>Budget</label>
                     <input type="number" name="rupee" min="0" value="20">
                     <span>$</span>
                     <span class="hr">/hr</span>
                  </li>
                  <li>
                     <select>
                        <option>INR</option>
                        <option>USD</option>
                        <option>NZD</option>
                        <option>AUD</option>
                        <option>GBP</option>
                        <option>HKD</option>
                        <option>SGD</option>
                        <option>EUR</option>
                        <option>CAD</option>
                     </select>
                  </li>
            </ul>
            <div class="input-box">
                  <label>weekly tracking limit</label>
                  <input type="number" name="hours" min="0" value="10">
                  <span>hours</span>
            </div>
         </div>
            <p>By clicking "Hire Now", you are indicating that you have read and agree to the <a href="terms_service.html">Terms & Conditions</a> and <a href="privacy_policy.html">Privacy Policy</a></p>
            <button type="button" data-fancybox-close class="submitForm ewr_btn_yellow" title="Close">Hire Now!</button>
         </form>
   </div>
</div>
@endsection