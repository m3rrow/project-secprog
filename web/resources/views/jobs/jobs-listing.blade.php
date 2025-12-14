@extends('layout.app2')
@section('content_title', 'Services Marketplace')
@section('content_desc', 'Find & Hire Services')
@section('content')
<!-- inner page -->

<div class="inner-page-main-wrapper float_left">
   <div class="container">
      <div class="row">
         <!-- Sidebar Filters -->
         <div class="col-lg-3 col-md-4 col-sm-12 col-12">
            <form method="GET" action="{{ route('jobs.index') }}" id="filter-form">
               <div class="sidebar_widget pb-0">
                  <h4 class="title-sidebar">Search</h4>
                  <div class="select-box" style="display: flex; gap: 8px;">
                     <input type="text" name="search" placeholder="Title, skills..." value="{{ request('search') }}" style="flex: 1;">
                     <button type="submit" style="padding: 8px 12px;"><i class="fas fa-search"></i></button>
                  </div>
               </div>

               <div class="sidebar_widget pb-0">
                  <h4 class="title-sidebar">Rate Type</h4>
                  <div class="freelauncer-select-box">
                     <div class="form-group">
                        <input type="radio" id="rate_all" name="rate_type" value="" {{ request('rate_type') == '' ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                        <label for="rate_all">All</label>
                     </div>
                     <div class="form-group">
                        <input type="radio" id="rate_fixed" name="rate_type" value="fixed" {{ request('rate_type') == 'fixed' ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                        <label for="rate_fixed">Fixed</label>
                     </div>
                     <div class="form-group">
                        <input type="radio" id="rate_hourly" name="rate_type" value="hourly" {{ request('rate_type') == 'hourly' ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit()">
                        <label for="rate_hourly">Hourly</label>
                     </div>
                  </div>
               </div>

               <div class="sidebar_widget pb-0">
                  <h4 class="title-sidebar">Price Range</h4>
                  <div class="freelauncer-select-box">
                     <div style="margin-bottom: 10px;">
                        <label style="display: block; margin-bottom: 3px; font-size: 12px;">Min: $<span id="min_label">{{ request('min_rate', 0) }}</span></label>
                        <input type="range" name="min_rate" min="0" max="5000" step="100" value="{{ request('min_rate', 0) }}" onchange="document.getElementById('min_label').textContent = this.value; document.getElementById('filter-form').submit();" style="width: 100%; height: 4px;">
                     </div>
                     <div style="margin-bottom: 10px;">
                        <label style="display: block; margin-bottom: 3px; font-size: 12px;">Max: $<span id="max_label">{{ request('max_rate', 5000) }}</span></label>
                        <input type="range" name="max_rate" min="0" max="5000" step="100" value="{{ request('max_rate', 5000) }}" onchange="document.getElementById('max_label').textContent = this.value; document.getElementById('filter-form').submit();" style="width: 100%; height: 4px;">
                     </div>
                  </div>
               </div>

               <div class="sidebar_widget pb-0">
                  <h4 class="title-sidebar">Category</h4>
                  <div class="freelauncer-select-box">
                     <input type="text" name="category" placeholder="Category" value="{{ request('category') }}" style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 4px; font-size: 12px;">
                     <button type="submit" class="custom-btn" style="margin-top: 8px; width: 100%; padding: 6px;"><span>Filter</span></button>
                  </div>
               </div>

               <div class="sidebar_text">
                  <a class="custom-btn" href="{{ route('jobs.index') }}" style="width: 100%; padding: 6px;"> <span>Reset</span> </a>
               </div>
            </form>
         </div>

         <!-- Main Content -->
         <div class="col-lg-9 col-md-8 col-sm-12 col-12">
            <div class="top-pipe-search-wrapper float_left">
               <div class="search-box">
                  <label>Sort by :</label>
                  <select name="select">
                     <option selected="selected" value=""> Default</option>
                     <option value="recent">Most Recent</option>
                     <option value="price_low">Price: Low to High</option>
                     <option value="price_high">Price: High to Low</option>
                  </select>
               </div>
               <div class="pegination">
                  @if(isset($jobs))
                     <ul>
                        <li>Showing {{ $jobs->firstItem() ?? 0 }} - {{ $jobs->lastItem() ?? 0 }} of {{ $jobs->total() }} Services</li>
                     </ul>
                  @endif
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
                              <li> <span><i class="fas fa-dollar-sign"></i></span> ${{ number_format($job->rate, 2) }} @if($job->rate_type == 'hourly')<small>/hr</small>@endif</li>
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
                        <a href="{{ route('jobs.checkout', $job->id) }}" class="apply-btn"><span>Hire Now</span></a>
                     </div>
                  </div>
               @endforeach
            @else
               <div class="freelauncer-profile float_left" style="text-align: center; padding: 40px 20px; width: 100%;">
                  <div class="profile-text ps-rel">
                     <h6 style="font-size: 18px; margin-bottom: 10px;">No Services Found</h6>
                     <p style="color: #666;">@if(request('search')) No jobs match "<strong>{{ request('search') }}</strong>"@else There are currently no jobs posted.@endif</p>
                     <a href="{{ route('jobs.index') }}" class="custom-btn" style="margin-top: 15px; display: inline-block; padding: 8px 20px;"><span>Clear Filters</span></a>
                  </div>
               </div>
            @endif

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

@endsection
