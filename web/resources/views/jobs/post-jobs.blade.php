@extends('layout.app2')
@section('content_title', 'Post Job')
@section('content_desc', 'Post Job')
@section('content')
<!-- inner page -->

<div class="inner-page-main-wrapper float_left">
   <div class="container">
      <div class="home1-section-heading1">
         <h6>Post Job</h6>
         <h4>New Job Offer</h4>
         <p>Add a new job to your company's jobs list.</p>
      </div>
      <div class="post-project-main-wrapper float_left">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="post-form-wrapper float_left">
                  <form>
                     
                     <div class="form-group row">
                        <div class="col-md-6 col-12">
                           <label>Job title</label>
                           <input type="text" placeholder="Add title">
                        </div>
                        <div class="col-md-6 col-12">
                           <label>Location</label>
                           <input type="text" placeholder="E.g. San Francisco, CA">
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-6 col-12">
                           <label>Date Posted</label>
                           <input type="date">
                        </div>
                        <div class="col-md-6 col-12">
                           <label>Expiration date</label>
                           <input type="date">
                        </div>
                     </div>
                     
                     <div class="form-group row">
                           <div class="col-md-6 col-12">
                              <label>Experience</label>
                              <input class="require" placeholder="E.g. Minimum 3 years" type="text">
                           </div>
                           <div class="col-md-6 col-12">
                              <label>Career level</label>
                              <div class="select-field">
                                 <select id="type" name="type">
                                    <option selected="selected" value="">No Experience</option>
                                    <option value="7-9">Entry-Level</option>
                                    <option value="10-13">Mid-Level </option>
                                    <option value="10-13">Senior-Level </option>
                                    <option value="20">Manager / Executive</option>
                                 </select>
                              </div>
                           </div>
                     </div>


                     <div class="form-group row">
                        <div class="col-md-6 col-12">
                           <label>Category</label>
                           <div class="select-field">
                              <select>
                                 <option selected="selected" value="">Select Category</option>
                                 <option value="5-6">Marketing & Communication</option>
                                 <option value="7-9">Software Engineering</option>
                                 <option value="10-13">Project Management </option>
                                 <option value="10-13">Finance </option>
                              </select>
                           </div>
                        </div> 
                        <div class="col-md-6 col-12">
                           <label>Gender</label>
                           <div class="select-field">
                              <select>
                                 <option selected="selected" value="">Gender</option>
                                 <option value="5-6">Male</option>
                                 <option value="7-9">Female</option>
                                 <option value="10-13">Both </option>
                              </select>
                           </div>
                        </div> 
                     </div> 
                     
                     
                     <div class="form-group row">
                        <div class="col-md-6 col-12">
                           <label>Employment type</label>
                              <div class="select-field">
                                 <select>
                                 <option selected="selected" value="">Full Time</option>
                                 <option value="7-9">Entry-Level</option>
                                 <option value="10-13">Mid-Level </option>
                                 <option value="10-13">Senior-Level </option>
                                 <option value="20">Manager / Executive</option>
                              </select>
                              </div>
                        </div> 
                        <div class="col-md-6 col-12">
                           <label>Salary range</label>
                           <div class="select-field">
                              <select>
                                 <option selected="selected" value="">Select Range</option>
                                 <option value="7-9">$700 - $1000</option>
                                 <option value="10-13">$1000 - $1200 </option>
                                 <option value="10-13">$1200 - $1400 </option>
                                 <option value="20">$1500 - $1800</option>
                                 <option value="20">$2000 - $3000</option>
                              </select>
                           </div>
                        </div> 
                     </div> 
                     <div class="form-group row">
                        <div class="col-md-12 col-12">
                           <label>Job description</label>
                           <textarea rows="4" cols="50" placeholder="Describe your project here..."></textarea>
                        </div>
                     </div>
                        
                  </form>
                  <a class="custom-btn" href="javascript:;"> <span>Publish Job</span> </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection