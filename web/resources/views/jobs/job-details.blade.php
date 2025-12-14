@extends('layout.app2')
@section('content_title', $job->title ?? 'Job Details')
@section('content_desc', $job->company ?? optional($job->user)->name ?? 'Company')
@section('content')
<!-- inner page -->
<div class="inner-page-main-wrapper float_left">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="develop_main_wrapper">
               <div class="develop-cont">
                  <h3>
                     {{ $job->title }}
                     <a href="javascript:;"><small>{{ $job->company ?? optional($job->user)->name ?? 'Company' }} &nbsp; <i class="fas fa-check-square"></i></small></a>
                  </h3>
                  <ul>
                     <li>
                        <span><i class="fa fa-suitcase" aria-hidden="true"></i></span>
                        {{ $job->job_type ?? 'Full-time' }}
                     </li>
                     <li>
                        <span><i class="fas fa-dollar-sign"></i></span>
                        {{ $job->salary ?? 'Negotiable' }}
                     </li>
                     <li>
                        <span><i class="fas fa-map-marker-alt"></i></span>
                        {{ $job->location ?? 'Not specified' }}
                     </li>
                     <li>
                        <span><i class="far fa-clock"></i></span>
                        {{ $job->created_at->diffForHumans() }}
                     </li>
                  </ul>
               </div>
               <div class="bid_button">
                  <a href="{{ route('jobs.checkout', $job->id) }}" class="btn btn-primary"> <span>Hire Now - ${{ number_format($job->rate, 2) }}</span> </a>
               </div>
            </div>
         </div>
         <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="descript_main_wrapper">
               <h4>Service Description</h4>
               <p>{!! nl2br(e($job->description)) !!}</p>
               
               <h4>Scope of Work</h4>
               <p>{!! nl2br(e($job->scope)) !!}</p>
               
               <h4>Key Deliverables</h4>
               
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
                  @if($job->skills)
                     @foreach(explode(',', $job->skills) as $skill)
                        <li><span><i class="fas fa-check"></i></span> <p>{{ trim($skill) }}</p></li>
                     @endforeach
                  @else
                     <li><span><i class="fas fa-check"></i></span> <p>You have at least 3 years' experience working in a related field.</p></li>
                  @endif
               </ul>
            </div>
            
         </div>
         <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            

            
            <div class="descript_main_wrapper pb-0">
               <h4>Service Overview</h4>
               <ul class="job-overview">
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-tag" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Category</p>
                        <span>{{ $job->category ?? 'Uncategorized' }}</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-dollar" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Service Rate</p>
                        <span>${{ number_format($job->rate, 2) }} @if($job->rate_type == 'hourly')<small>/ hourly</small>@else<small>Fixed</small>@endif</span>
                     </div>
                  </li>
                  @if($job->rate_type == 'hourly' && $job->estimated_hours)
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Estimated Hours</p>
                        <span>{{ $job->estimated_hours }} hours</span>
                     </div>
                  </li>
                  @endif
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Posted</p>
                        <span>{{ $job->created_at->format('M d, Y') }}</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Location</p>
                        <span>{{ $job->location ?? 'Remote' }}</span>
                     </div>
                  </li>
                  <li>
                     <div class="job-icon">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                     </div>
                     <div class="job-text">
                        <p>Type</p>
                        <span>{{ $job->job_type ?? 'Project-based' }}</span>
                     </div>
                  </li>

               </ul>
            </div>
            <div class="sidebar_widget pb-0 float_left">
               <h4 class="title-sidebar">Job Skills</h4>
               <div class="cat action">
                  @if($job->skills)
                     @foreach(explode(',', $job->skills) as $skill)
                        <label>
                           <input type="checkbox" value="1"><span>{{ trim($skill) }}</span>
                        </label>
                     @endforeach
                  @else
                     <p class="text-muted">No specific skills listed.</p>
                  @endif
               </div>
            </div>
            <div class="mt-4">
               <a class="custom-btn" href="{{ route('jobs.index') }}"><span>Back To Listings</span></a>
            </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
