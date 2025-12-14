@extends('layout.app2')
@section('content_title', 'Post a Service')
@section('content_desc', 'Post a Service')
@section('content')
<!-- inner page -->

<div class="inner-page-main-wrapper float_left">
   <div class="container">
      <div class="home1-section-heading1">
         <h6>Freelance Marketplace</h6>
         <h4>Post Your Service</h4>
         <p>Offer your skills and expertise to clients worldwide.</p>
      </div>
      <div class="post-project-main-wrapper float_left">
         <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 offset-lg-2">
               <div class="post-form-wrapper float_left">
                  <form action="{{ route('jobs.store') }}" method="POST">
                  @csrf
                     
                     <div class="form-group row">
                        <div class="col-md-6 col-12">
                           <label>Service Title *</label>
                           <input type="text" name="title" placeholder="e.g. Website Penetration Testing" required value="{{ old('title') }}">
                           @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 col-12">
                           <label>Category</label>
                           <input type="text" name="category" placeholder="e.g. Security Testing, Web Development" value="{{ old('category') }}">
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-6 col-12">
                           <label>Service Rate *</label>
                           <div class="input-group">
                              <span class="input-group-text">$</span>
                              <input type="number" name="rate" step="0.01" placeholder="0.00" required value="{{ old('rate') }}" min="0">
                           </div>
                           @error('rate')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 col-12">
                           <label>Rate Type</label>
                           <div class="select-field">
                              <select name="rate_type">
                                 <option value="fixed" {{ old('rate_type') == 'fixed' ? 'selected' : '' }}>Fixed Price</option>
                                 <option value="hourly" {{ old('rate_type') == 'hourly' ? 'selected' : '' }}>Hourly</option>
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-6 col-12">
                           <label>Estimated Hours (if hourly)</label>
                           <input type="number" name="estimated_hours" placeholder="e.g. 40" min="1" value="{{ old('estimated_hours') }}">
                        </div>
                        <div class="col-md-6 col-12">
                           <label>Location</label>
                           <input type="text" name="location" placeholder="e.g. Remote, United States" value="{{ old('location') }}">
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-12 col-12">
                           <label>Service Description *</label>
                           <textarea name="description" rows="4" placeholder="Describe what you're offering..." required>{{ old('description') }}</textarea>
                           @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-12 col-12">
                           <label>Scope of Work *</label>
                           <textarea name="scope" rows="4" placeholder="Detail the scope of work, deliverables, timeline, and what's included..." required>{{ old('scope') }}</textarea>
                           @error('scope')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-12 col-12">
                           <label>Required Skills</label>
                           <textarea name="skills" rows="3" placeholder="List skills separated by commas (e.g. OWASP, Python, Network Security)">{{ old('skills') }}</textarea>
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-6 col-12">
                           <label>Employment Type</label>
                           <div class="select-field">
                              <select name="job_type">
                                 <option value="">Select Type</option>
                                 <option value="Full-time" {{ old('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                 <option value="Part-time" {{ old('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                 <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                 <option value="Project-based" {{ old('job_type') == 'Project-based' ? 'selected' : '' }}>Project-based</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <label>Experience Level</label>
                           <input type="text" name="experience" placeholder="e.g. 5+ years in Security" value="{{ old('experience') }}">
                        </div>
                     </div>

                     <div class="form-actions">
                        <button type="submit" class="custom-btn"><span>Post Service</span></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection