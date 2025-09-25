@extends('layouts.app2')
@section('content_title', 'Job Details')
@section('content_desc', 'Job Details')
@section('content')
<!-- inner page -->
<div class="inner-page-main-wrapper float_left">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="develop_main_wrapper">
               <div class="develop-cont">
                  <h3>
                     Android & IOS Developer
                     <a href="jobs-details.html"><small>Softtech Pvt Ltd &nbsp; <i class="fas fa-check-square"></i></small></a>
                  </h3>
                  <ul>
                     <li>
                        <span><i class="fa fa-suitcase" aria-hidden="true"></i></span>
                        Project Manager
                     </li>
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
                  <!-- <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>Apply Now</span></button> -->
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <span>Apply Now</span> </a>
               </div>
            </div>
         </div>
         <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="descript_main_wrapper">
               <h4>Jobs Description</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut an
                  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labo
                  ris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisic-
                  ing elit, sed do eiusmod tempor incididunt ut an labore et dolore magna aliqua. Duis aute irure
                  dolor in reprehenderit in voluptate velit esse.
               </p>
               
               <h4>Key Responsibilities</h4>
               
               <ul class="mt-4">
                  <li><span><i class="fas fa-check"></i></span> <p>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</p> </li>
                  <li><span><i class="fas fa-check"></i></span>
                     <p>Aenean pellentes vitae</p>
                     </li>
                  <li><span><i class="fas fa-check"></i></span> <p>Work with BAs, product managers and tech teams to lead the Product Design.</p>
                     </li>
                  <li><span><i class="fas fa-check"></i></span><p>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</p>
                     </li>
                  <li><span><i class="fas fa-check"></i></span>
                     <p>Accurately estimate design tickets during planning sessions.</p></li>
               </ul>

               <h4>Skill & Experience</h4>
               
               <ul>
                  <li><span><i class="fas fa-check"></i></span> <p>You have at least 3 years’ experience working as a Product Designer.</p> </li>
                  <li><span><i class="fas fa-check"></i></span>
                     <p>You have experience using Sketch and InVision or Framer</p>
                     </li>
                  <li><span><i class="fas fa-check"></i></span> <p>You have some previous experience working in an agile environment – Think two-week sprints.</p>
                     </li>
                  <li><span><i class="fas fa-check"></i></span> <p>You are familiar using Jira and Confluence in your workflow</p>
                     </li>
                  
               </ul>
               <h4>Job Location</h4>
               <div style="width: 100%" class="map_frame"><iframe width="100" height="400" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
               
               
            </div>
            
            
         </div>
         <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            

            
            <div class="descript_main_wrapper pb-0">
               <h4>Job Overview</h4>
               <ul class="job-overview">
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Date Posted</p>
                        <span>May 3, 2022</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Location</p>
                        <span>New York</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Offered Salary:</p>
                        <span>$520 - $650 / month</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Expiration date</p>
                        <span>May 5, 2026</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Experience</p>
                        <span>2 Year</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Gender</p>
                        <span>Both</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Qualification</p>
                        <span>Bachelor Degree</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Career Level</p>
                        <span>Executive</span>
                     </div>
                  </li>

               </ul>
            </div>
         <div class="sidebar_widget pb-0 float_left">
               <h4 class="title-sidebar">Job Skills</h4>
               <div class="cat action">
                  <label>
                     <input type="checkbox" value="1"><span>Website Designer</span>
                  </label>
                  <label>
                     <input type="checkbox" value="1"><span>HTML 5</span>
                  </label>
                  <label>
                     <input type="checkbox" value="1"><span>Banner Designers</span>
                  </label>
                  <label>
                     <input type="checkbox" value="1"><span>Word Press</span>
                  </label>
                  <label>
                     <input type="checkbox" value="1"><span>Logo Designer</span>
                  </label>
                  <label>
                     <input type="checkbox" value="1"><span>Graphics</span>
                  </label>
               </div>
            </div>
            <div class="inner-page-main-wrapper mt-0 mb-0 float_left">
               <div class="side-bar-social blog-social float_left">
                  <ul>
                     <li>
                        Follow:
                     </li>
                     <li>
                        <a href="javascript:;"> <span> <svg viewBox="0 0 25 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Page-1" stroke="none">
                                       <g id="Social-Icons---Isolated" transform="translate(-176.000000, -55.000000)">
                                          <path d="M200.78439,55.3395122 L200.78439,62.9141463 L196.28878,62.9258537 C192.764878,62.9258537 192.085854,64.6 192.085854,67.0468293 L192.085854,72.4673171 L200.48,72.4673171 L199.39122,80.9434146 L192.085854,80.9434146 L192.085854,103 L183.329951,103 L183.329951,80.9434146 L176,80.9434146 L176,72.4673171 L183.329951,72.4673171 L183.329951,66.2156098 C183.329951,58.9570732 187.754146,55 194.24,55 C197.331902,55 200,55.2341463 200.78439,55.3395122 Z" id="Facebook2"></path>
                                       </g>
                                    </g>
                                 </svg></span> </a>
                  </li>
                  <li>
                     <a href="javascript:;"> <span><svg version="1.1" id="Capa_33" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                       c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                       c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                       c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                       c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                       c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                       C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                       C480.224,136.96,497.728,118.496,512,97.248z"></path>
                                 </svg></span> </a>
                  </li>
                  <li>
                     <a href="javascript:;"> <span>
                                 <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m75 512h362c41.355469 0 75-33.644531 75-75v-362c0-41.355469-33.644531-75-75-75h-362c-41.355469 0-75 33.644531-75 75v362c0 41.355469 33.644531 75 75 75zm-45-437c0-24.8125 20.1875-45 45-45h362c24.8125 0 45 20.1875 45 45v362c0 24.8125-20.1875 45-45 45h-362c-24.8125 0-45-20.1875-45-45zm0 0"></path>
                                    <path d="m256 391c74.4375 0 135-60.5625 135-135s-60.5625-135-135-135-135 60.5625-135 135 60.5625 135 135 135zm0-240c57.898438 0 105 47.101562 105 105s-47.101562 105-105 105-105-47.101562-105-105 47.101562-105 105-105zm0 0"></path>
                                    <path d="m406 151c24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45 20.1875 45 45 45zm0-60c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"></path>
                                 </svg>
                              </span></a>
                  </li>
                  <li>
                     <a href="javascript:;"> <span>
                                 <svg version="1.1" id="Layer_22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <g>
                                       <g>
                                          <g>
                                             <path class="st0" d="M288.7727,379.6177c-31.0821-2.4047-44.1417-17.8159-68.517-32.6133
                                                c-10.8615,56.9841-23.678,112.0556-53.9793,149.6197c-8.8183,10.9314-26.6251,5.4308-27.3315-8.5965
                                                c-4.577-90.7884,26.777-162.8616,42.1821-238.8844c-29.2561-49.2489,3.5182-148.377,65.2267-123.9501
                                                c75.9469,30.0324-65.7538,183.1232,29.3731,202.244c99.312,19.9639,139.8549-172.3209,78.2635-234.8649
                                                C265.005,2.2744,94.9703,90.5199,115.879,219.7852c3.9603,24.5667,24.5773,35.8323,21.9539,60.118
                                                c-1.63,15.0815-17.1885,23.7737-30.9302,17.3495c-39.393-18.4189-51.6065-58.7523-49.7335-110.0808
                                                c3.5243-98.0223,88.0768-166.6563,172.8845-176.1536C337.3106-0.987,437.9776,50.4022,451.8727,151.291
                                                C467.5057,265.1574,403.4518,388.471,288.7727,379.6177L288.7727,379.6177z"></path>
                                          </g>
                                       </g>
                                    </g>
                                 </svg>
                              </span></a>
                  </li>
               </ul>
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