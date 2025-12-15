
@extends('layout.app')
@section('content')
<!-- banner section start start-->
<div class="index1-slider-wrapper ps-rel">
<div class ="video-bg">
    <video autoplay muted loop playsinline poster="../video/banner.mp4">
        <source src="../video/banner.mp4" type="video/mp4">
    </video>
</div>
<div class="overlay-slider">
    <div class="container">
        <div class="slider-caption">
            <h2>Offering 25,000 Job <br> Vacancies Right Now!</h2>
            <p>The most complete job portal software having over 70 million unique <br> visitors every day with verified.</p>
        </div>
        <div class="sldier-contact-form">
            <form method="GET" action="{{ route('jobs.index') }}" id="homepage-search-form" style="display: contents;">
            <ul>
            <li>
                <div class="text-field">
                    <input type="text" name="search" placeholder="Search Services..."> 
                </div>
            </li>
            <li> <div class="select-field"> 
            <select name="category">
            <option selected="selected" value="">Select Category</option>
            <option value="Security Testing">Security Testing</option>
            <option value="Web Development">Web Development</option>
            <option value="Penetration Testing">Penetration Testing</option>
            <option value="Code Review">Code Review</option>
            <option value="Infrastructure">Infrastructure</option>
            </select> </div>
            </li>
            <li> 
            <div class="select-field"> 
            <select name="rate_type">
            <option selected="selected" value="">Rate Type</option>
            <option value="fixed">Fixed Price</option>
            <option value="hourly">Hourly Rate</option>
            </select> 
            </div>
            </li>
            <li class="btn-from">
            <a href="javascript:;" onclick="document.getElementById('homepage-search-form').submit();"><span>Search</span></a>
            </li>
            </ul>
            <ul class="treding-list">
            <li> <span><i class="fas fa-tags"></i></span> Popular Services:</li>
            <li> <a href="{{ route('jobs.index', ['search' => 'Penetration Testing']) }}">Penetration Testing,</a> </li>
            <li> <a href="{{ route('jobs.index', ['search' => 'Security']) }}">Security Audit,</a> </li>
            <li> <a href="{{ route('jobs.index', ['search' => 'Code Review']) }}">Code Review,</a> </li>
            <li> <a href="{{ route('jobs.index', ['search' => 'API']) }}">API Testing,</a> </li>
            <li> <a href="{{ route('jobs.index', ['search' => 'Web']) }}">Web Security</a> </li>
            </ul>
            </form>
            </div>
        </div>
    </div>
    <div class="container">
    </div>
</div>
<!-- banner section start end-->
<!-- index page service section  start -->
<div class="treding-job-wrapper float_left ptb-100">
    <div class="container">
        <div class="home1-section-heading1">
            <h6>New Trending Jobs</h6>
            <h4>Most Popular & Trending Jobs</h4>
        </div>
        <div class="tabFive custom-tab">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div role="tabpanel" class="tab-panel">
                    <!-- Nav tabs -->
                    <ul id="tabFive" class="nav nav-tabs justify-content-center">
                        <li class="nav-item">
                        <a class="active nav-link" href="#contentFive-1" data-bs-toggle="tab">Featured</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#contentFive-2" data-bs-toggle="tab">Remotely</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#contentFive-3" data-bs-toggle="tab">Part Time</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#contentFive-4" data-bs-toggle="tab">Full Time</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="contentFive-1">
                        <div class="row">
                            @forelse($featuredJobs ?? collect() as $job)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="trending-main-box float_left">
                                        <div class="trending-upper-text ps-rel">
                                            <div class="heart"><a href="javascript:;"><i class="fas fa-heart"></i></a></div>
                                            <div class="icon-img"><img src="{{ asset('images/p1.png') }}" alt="img"></div>
                                            <a href="{{ route('jobs.show', $job->id) }}"><h5>{{ $job->title }}</h5></a>
                                            <p>{{ $job->category }}</p>
                                        </div>
                                        <div class="trending-lower-text">
                                            <span>{{ $job->company ?? optional($job->user)->name ?? 'Provider' }}</span>
                                            <a href="javascript:;"> <i class="fas fa-dollar-sign"></i> ${{ number_format($job->rate, 2) }} @if($job->rate_type == 'hourly')/hr @endif</a>
                                            <p> <span><i class="fas fa-map-marker-alt"></i></span> {{ $job->location ?? 'Remote' }} </p>
                                            <a class="custom-btn" href="{{ route('jobs.checkout', $job->id) }}"><span>Hire Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12" style="text-align: center; padding: 40px;">
                                    <p style="color: #666;">No services available at the moment.</p>
                                </div>
                            @endforelse
                        </div>
                        </div>
                        <div class="tab-pane fade" id="contentFive-2">
                        <div class="row">
                            @forelse($remoteJobs ?? collect() as $job)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="trending-main-box float_left">
                                        <div class="trending-upper-text ps-rel">
                                            <div class="heart"><a href="javascript:;"><i class="fas fa-heart"></i></a></div>
                                            <div class="icon-img"><img src="{{ asset('images/p1.png') }}" alt="img"></div>
                                            <a href="{{ route('jobs.show', $job->id) }}"><h5>{{ $job->title }}</h5></a>
                                            <p>{{ $job->category }}</p>
                                        </div>
                                        <div class="trending-lower-text">
                                            <span>{{ $job->company ?? optional($job->user)->name ?? 'Provider' }}</span>
                                            <a href="javascript:;"> <i class="fas fa-dollar-sign"></i> ${{ number_format($job->rate, 2) }} @if($job->rate_type == 'hourly')/hr @endif</a>
                                            <p> <span><i class="fas fa-map-marker-alt"></i></span> {{ $job->location ?? 'Remote' }} </p>
                                            <a class="custom-btn" href="{{ route('jobs.checkout', $job->id) }}"><span>Hire Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12" style="text-align: center; padding: 40px;">
                                    <p style="color: #666;">No remote services available.</p>
                                </div>
                            @endforelse
                        </div>
                        </div>
                        <div class="tab-pane fade" id="contentFive-3">
                        <div class="row">
                            @forelse($partTimeJobs ?? collect() as $job)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="trending-main-box float_left">
                                        <div class="trending-upper-text ps-rel">
                                            <div class="heart"><a href="javascript:;"><i class="fas fa-heart"></i></a></div>
                                            <div class="icon-img"><img src="{{ asset('images/p1.png') }}" alt="img"></div>
                                            <a href="{{ route('jobs.show', $job->id) }}"><h5>{{ $job->title }}</h5></a>
                                            <p>{{ $job->category }}</p>
                                        </div>
                                        <div class="trending-lower-text">
                                            <span>{{ $job->company ?? optional($job->user)->name ?? 'Provider' }}</span>
                                            <a href="javascript:;"> <i class="fas fa-dollar-sign"></i> ${{ number_format($job->rate, 2) }} @if($job->rate_type == 'hourly')/hr @endif</a>
                                            <p> <span><i class="fas fa-map-marker-alt"></i></span> {{ $job->location ?? 'Remote' }} </p>
                                            <a class="custom-btn" href="{{ route('jobs.checkout', $job->id) }}"><span>Hire Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12" style="text-align: center; padding: 40px;">
                                    <p style="color: #666;">No part-time services available.</p>
                                </div>
                            @endforelse
                        </div>
                        </div>
                        <div class="tab-pane fade" id="contentFive-4">
                        <div class="row">
                            @forelse($allJobs ?? collect() as $job)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="trending-main-box float_left">
                                        <div class="trending-upper-text ps-rel">
                                            <div class="heart"><a href="javascript:;"><i class="fas fa-heart"></i></a></div>
                                            <div class="icon-img"><img src="{{ asset('images/p1.png') }}" alt="img"></div>
                                            <a href="{{ route('jobs.show', $job->id) }}"><h5>{{ $job->title }}</h5></a>
                                            <p>{{ $job->category }}</p>
                                        </div>
                                        <div class="trending-lower-text">
                                            <span>{{ $job->company ?? optional($job->user)->name ?? 'Provider' }}</span>
                                            <a href="javascript:;"> <i class="fas fa-dollar-sign"></i> ${{ number_format($job->rate, 2) }} @if($job->rate_type == 'hourly')/hr @endif</a>
                                            <p> <span><i class="fas fa-map-marker-alt"></i></span> {{ $job->location ?? 'Remote' }} </p>
                                            <a class="custom-btn" href="{{ route('jobs.checkout', $job->id) }}"><span>Hire Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12" style="text-align: center; padding: 40px;">
                                    <p style="color: #666;">No services available.</p>
                                </div>
                            @endforelse
                        </div>
                        </div>
                    </div>
                </div>
                <div class="custom-pegination">
                    <ul>
                        <li class="preious"> <a href="javascript:;"> <span>Previous</span> </a> </li>
                        <li class="active"> <a href="javascript:;"> 1 </a> </li>
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
<!-- index page service section  end-->
<div class="million-jobs-main-wrapper ptb-100 float_left">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
            <div class="million-text-wrapper float_left">
                <h4>Millions of Jobs <br> Find the one that's Right for you</h4>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. 
                </p>
            </div>
            </div>
        </div>
        <div class="job-details-main-wrapper">
            <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="jobs-details-wrapper">
                    <div class="job-icon">
                        <span>
                        <svg id="Слой_2" data-name="Слой 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                            <title>Монтажная область 11</title>
                            <path d="M83.89,15.11A7.29,7.29,0,0,0,78.21,13,50.71,50.71,0,0,0,46,27.85L44.87,29H30.13a1.5,1.5,0,0,0-1.07.45l-15.63,16A1.5,1.5,0,0,0,14.5,48H28.88l3.85,3.85a22.9,22.9,0,0,0-15.48,6.82C5,71.07,14.65,85.22,14.75,85.36a1.5,1.5,0,0,0,2.73-.86c0-4.81,4.51-9.37,9.27-9.37a8.63,8.63,0,0,1,8.58,8.66A1.5,1.5,0,0,0,37.68,85,24.09,24.09,0,0,0,47,66.11l4,4V84.5a1.5,1.5,0,0,0,2.56,1.06l16-16A1.5,1.5,0,0,0,70,68.52V54.13L71.15,53A50.71,50.71,0,0,0,86,20.79,7.29,7.29,0,0,0,83.89,15.11ZM30.76,32H41.87l-13,13H18.06Zm7.18,48.83a11.61,11.61,0,0,0-11.2-8.69c-4.92,0-9.5,3.46-11.38,8-1.75-4.37-3.16-12.1,4-19.33A19.89,19.89,0,0,1,35.85,55l8,8A21.82,21.82,0,0,1,37.94,80.83ZM67,67.9l-13,13V70.13l13-13Zm2-17-1.56,1.56-.05.05L52.5,67.38,31.62,46.5,46.53,31.59l.05-.05L48.14,30A47.71,47.71,0,0,1,78.42,16,4.22,4.22,0,0,1,83,20.58,47.71,47.71,0,0,1,69,50.86Z"/>
                            <path d="M63.5,27a9.5,9.5,0,1,0,6.72,2.78A9.44,9.44,0,0,0,63.5,27Zm4.6,14.1A6.5,6.5,0,1,1,70,36.5,6.46,6.46,0,0,1,68.1,41.1Z"/>
                        </svg>
                        </span>
                    </div>
                    <div class="job-box">
                        <h5>2,500</h5>
                        <p>Projects</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="jobs-details-wrapper">
                    <div class="job-icon">
                        <span>
                        <svg version="1.1" id="Layer_22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 100.353 100.352" style="enable-background:new 0 0 100.353 100.352;" xml:space="preserve">
                            <g>
                                <path d="M58.23,69.992l14.993-24.108c0.049-0.078,0.09-0.16,0.122-0.245c2.589-4.222,3.956-9.045,3.956-13.969
                                    c0-14.772-12.018-26.79-26.79-26.79S23.72,16.898,23.72,31.67c0,4.925,1.369,9.75,3.96,13.975c0.03,0.074,0.065,0.146,0.107,0.216
                                    l14.455,24.191c-11.221,1.586-18.6,6.2-18.6,11.797c0,6.935,11.785,12.366,26.829,12.366S77.3,88.783,77.3,81.849
                                    C77.301,76.226,69.578,71.509,58.23,69.992z M30.373,44.294c-2.39-3.804-3.653-8.169-3.653-12.624
                                    c0-13.118,10.672-23.79,23.791-23.79c13.118,0,23.79,10.672,23.79,23.79c0,4.457-1.263,8.822-3.652,12.624
                                    c-0.05,0.08-0.091,0.163-0.124,0.249L54.685,70.01c-0.238,0.365-0.285,0.448-0.576,0.926l-4,6.432L30.507,44.564
                                    C30.472,44.471,30.427,44.38,30.373,44.294z M50.472,91.215c-14.043,0-23.829-4.937-23.829-9.366c0-4.02,7.37-7.808,17.283-8.981
                                    l4.87,8.151c0.269,0.449,0.751,0.726,1.274,0.73c0.004,0,0.009,0,0.013,0c0.518,0,1-0.268,1.274-0.708l5.12-8.232
                                    C66.548,73.9,74.3,77.784,74.3,81.849C74.301,86.279,64.515,91.215,50.472,91.215z"/>
                                <path d="M60.213,31.67c0-5.371-4.37-9.741-9.741-9.741s-9.741,4.37-9.741,9.741s4.37,9.741,9.741,9.741
                                    C55.843,41.411,60.213,37.041,60.213,31.67z M43.731,31.67c0-3.717,3.024-6.741,6.741-6.741s6.741,3.024,6.741,6.741
                                    s-3.023,6.741-6.741,6.741S43.731,35.387,43.731,31.67z"/>
                            </g>
                        </svg>
                        </span>
                    </div>
                    <div class="job-box">
                        <h5>2,500</h5>
                        <p>Projects</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="jobs-details-wrapper">
                    <div class="job-icon">
                        <span>
                        
                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <title/>
                                <g id="about">
                                    <path d="M16,16A7,7,0,1,0,9,9,7,7,0,0,0,16,16ZM16,4a5,5,0,1,1-5,5A5,5,0,0,1,16,4Z"/>
                                    <path d="M17,18H15A11,11,0,0,0,4,29a1,1,0,0,0,1,1H27a1,1,0,0,0,1-1A11,11,0,0,0,17,18ZM6.06,28A9,9,0,0,1,15,20h2a9,9,0,0,1,8.94,8Z"/>
                                </g>
                        </svg>
                        </span>
                    </div>
                    <div class="job-box">
                    <h5>1,500</h5>
                    <p>Profile</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
            <div class="jobs-details-wrapper">
            <div class="job-icon">
            <span><svg id="Layer_26" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><title>Profile</title><path id="User_Circle" data-name="User Circle" d="M12.5,25A12.5,12.5,0,1,1,25,12.5,12.51,12.51,0,0,1,12.5,25ZM4.75,21a11.48,11.48,0,0,0,15.5,0c-.69-1.58-2.71-2.42-4.34-3.09S14,16.3,14,15.5a3,3,0,0,1,.93-2.12,3.41,3.41,0,0,0,1.14-2.64A3.51,3.51,0,0,0,12.5,7,3.44,3.44,0,0,0,9,10.74a3.35,3.35,0,0,0,1.08,2.64A3,3,0,0,1,11,15.5c0,.8-.22,1.7-1.84,2.36S5.44,19.41,4.75,21ZM12.5,6a4.5,4.5,0,0,1,4.57,4.74,4.38,4.38,0,0,1-1.48,3.39A2,2,0,0,0,15,15.5c0,.44,0,.94,1.21,1.44,1.68.7,3.82,1.59,4.78,3.31a11.5,11.5,0,1,0-17,0C5,18.53,7.1,17.64,8.7,17,10,16.44,10,15.92,10,15.5a2,2,0,0,0-.56-1.37A4.36,4.36,0,0,1,8,10.74,4.41,4.41,0,0,1,12.5,6Z"/></svg></span>
            </div>
            <div class="job-box">
            <h5>1,950</h5>
            <p>Users</p>
            </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const jobCards = document.querySelectorAll('.job-card-clickable');

        jobCards.forEach(card => {

            card.addEventListener('click', function (event) {

                event.preventDefault();

                const jobId = this.dataset.jobId;

                if (jobId) {

                    window.location.href = `/job-detail/${jobId}`;
                }
            });
        });
    });
</script>

@endsection
