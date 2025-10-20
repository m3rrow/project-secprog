@extends('layout.app')

@section('content')
<div class="inner-page-main-wrapper float_left ptb-100">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 mb-4">
                <div class="trending-main-box float_left">
                    <div class="trending-lower-text" style="padding: 30px;">
                        
                        <h2 id="job-title" style="font-size: 2rem; font-weight: bold; margin-bottom: 15px;"></h2>
                        <p style="color: #666; font-size: 1rem; margin-bottom: 10px;">By: <strong id="freelancer-name"></strong></p>
                        <p id="job-price" style="font-size: 1.2rem; font-weight: bold; color: #007bff; margin-bottom: 20px;"></p>
                        
                        <hr style="border-top: 1px solid #eee; margin: 20px 0;">

                        <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px;">Service Description</h3>
                        <p id="job-description" style="line-height: 1.6; margin-bottom: 25px;"></p>
                        
                        <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px;">Services Offered</h3>
                        <ul id="job-services" class="check-circle-list" style="list-style-type: none; padding-left: 0; margin-bottom: 25px;">
                        </ul>
                        
                        <hr style="border-top: 1px solid #eee; margin: 30px 0;">

                        <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px;">Rating & Review</h3>
                        <div id="job-rating" style="display: flex; align-items: center; margin-bottom: 15px;">
                        </div>
                        <p style="font-style: italic; color: #777; margin-bottom: 10px;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit." - Reviewer 1</p>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="trending-main-box float_left" style="position: -webkit-sticky; position: sticky; top: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div class="trending-lower-text text-center" style="padding: 25px;">
                        <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px;">Freelancer Profile</h3>
                        <img id="freelancer-photo" src="" alt="Foto Freelancer" style="border-radius: 50%; width: 120px; height: 120px; object-fit: cover; margin: 0 auto 15px auto; border: 3px solid #007bff;">
                        <h4 id="freelancer-name-profile" style="font-size: 1.2rem; font-weight: bold; margin-bottom: 5px;"></h4>
                        <p id="freelancer-title" style="color: #666; margin-bottom: 20px;"></p>
                        
                        <h5 style="font-size: 1.1rem; font-weight: bold; text-align: left; margin-top: 25px; margin-bottom: 10px;">Experience Summary</h5>
                        <p id="freelancer-summary" style="text-align: left; line-height: 1.5; color: #555;"></p>
                        
                        <h5 style="font-size: 1.1rem; font-weight: bold; text-align: left; margin-top: 20px; margin-bottom: 10px;">Top Skills (Cyber)</h5>
                        <ul id="freelancer-skills" class="check-circle-list" style="list-style-type: none; padding-left: 0; text-align: left; color: #555;">
                        </ul>

                        <div style="margin-top: 30px;">
                            <a href="#" class="custom-btn" style="width: 100%; display: block; margin-bottom: 10px;"><span><i class="fas fa-file-alt"></i> View CV</span></a>
                        </div>
                        
                        <div style="margin-top: 15px;">
                            <a href="{{ route('checkout') }}" class="custom-btn" style="width: 100%; display: block;"><span><i class="fas fa-shopping-cart"></i> Order This Service</span></a>
                        </div>
                        
                        <div style="margin-top: 15px;">
                            <a href="{{ url('/') }}" class="custom-btn" style="width: 100%; display: block;">
                                <span><i class="fas fa-home"></i> Kembali ke Beranda</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jobsData = [
            {
                id: 1,
                title: 'Senior PHP Developer',
                freelancerName: 'John Doe',
                price: 'Rp 150.000 / jam',
                description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                services: ['Pengembangan Web Backend', 'Desain API RESTful', 'Optimasi Database'],
                rating: '★★★★★',
                ratingText: '4.8/5.0 (120 Reviews)',
                photo: '{{ asset("images/profile1.png") }}',
                summary: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                skills: ['Secure Coding', 'Vulnerability Assessment', 'Database Security']
            },
            {
                id: 2,
                title: 'Graphics Designer',
                freelancerName: 'Jane Smith',
                price: 'Rp 120.000 / jam',
                description: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                services: ['Desain Logo & Branding', 'Ilustrasi Digital', 'UI/UX Mockup'],
                rating: '★★★★☆',
                ratingText: '4.5/5.0 (95 Reviews)',
                photo: '{{ asset("images/profile2.png") }}',
                summary: 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                skills: ['Brand Security', 'Digital Watermarking']
            },
            {
                id: 3,
                title: 'Product Manager',
                freelancerName: 'Alex Johnson',
                price: 'Rp 200.000 / jam',
                description: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.',
                services: ['Product Roadmapping', 'Market Research', 'Agile Methodology'],
                rating: '★★★★★',
                ratingText: '4.9/5.0 (150 Reviews)',
                photo: '{{ asset("images/profile3.png") }}',
                summary: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                skills: ['Risk Management', 'Compliance Analysis']
            },
            {
                id: 4,
                title: 'Sales Analytics',
                freelancerName: 'Marco Johannes',
                price: 'Rp 200.000 / jam',
                description: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.',
                services: ['Product Roadmapping', 'Market Research', 'Agile Methodology'],
                rating: '★★★★☆',
                ratingText: '4.5/5.0 (150 Reviews)',
                photo: '{{ asset("images/profile4.png") }}',
                summary: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                skills: ['Risk Management', 'Compliance Analysis']
            },
            {
                id: 5,
                title: 'Sales Analytics',
                freelancerName: 'Marco Johannes',
                price: 'Rp 200.000 / jam',
                description: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.',
                services: ['Product Roadmapping', 'Market Research', 'Agile Methodology'],
                rating: '★★★★☆',
                ratingText: '4.5/5.0 (150 Reviews)',
                photo: '{{ asset("images/profile4.png") }}',
                summary: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                skills: ['Risk Management', 'Compliance Analysis']
            },
            {
                id: 6,
                title: 'Sales Analytics',
                freelancerName: 'Marco Johannes',
                price: 'Rp 200.000 / jam',
                description: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.',
                services: ['Product Roadmapping', 'Market Research', 'Agile Methodology'],
                rating: '★★★★☆',
                ratingText: '4.5/5.0 (150 Reviews)',
                photo: '{{ asset("images/profile4.png") }}',
                summary: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                skills: ['Risk Management', 'Compliance Analysis']
            },
            {
                id: 7,
                title: 'Sales Analytics',
                freelancerName: 'Marco Johannes',
                price: 'Rp 200.000 / jam',
                description: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.',
                services: ['Product Roadmapping', 'Market Research', 'Agile Methodology'],
                rating: '★★★★☆',
                ratingText: '4.5/5.0 (150 Reviews)',
                photo: '{{ asset("images/profile4.png") }}',
                summary: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                skills: ['Risk Management', 'Compliance Analysis']
            },
            {
                id: 8,
                title: 'Sales Analytics',
                freelancerName: 'Marco Johannes',
                price: 'Rp 200.000 / jam',
                description: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.',
                services: ['Product Roadmapping', 'Market Research', 'Agile Methodology'],
                rating: '★★★★☆',
                ratingText: '4.5/5.0 (150 Reviews)',
                photo: '{{ asset("images/profile4.png") }}',
                summary: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                skills: ['Risk Management', 'Compliance Analysis']
            },
        ];

        const jobId = parseInt('{{ $jobId }}');
        const jobData = jobsData.find(job => job.id === jobId);

        if (jobData) {
            document.getElementById('job-title').textContent = jobData.title;
            document.getElementById('freelancer-name').textContent = jobData.freelancerName;
            document.getElementById('job-price').innerHTML = `<i class="far fa-money-bill-alt"></i> Harga: ${jobData.price}`;
            document.getElementById('job-description').textContent = jobData.description;
            
            const servicesList = document.getElementById('job-services');
            servicesList.innerHTML = '';
            jobData.services.forEach(service => {
                servicesList.innerHTML += `<li style="margin-bottom: 8px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i> ${service}</li>`;
            });
            
            const ratingDiv = document.getElementById('job-rating');
            ratingDiv.innerHTML = `<span style="font-size: 1.5rem; color: gold;">${jobData.rating}</span> <span style="margin-left: 10px; font-weight: bold;">${jobData.ratingText}</span>`;

            document.getElementById('freelancer-photo').src = jobData.photo;
            document.getElementById('freelancer-name-profile').textContent = jobData.freelancerName;
            document.getElementById('freelancer-title').textContent = jobData.title;
            document.getElementById('freelancer-summary').textContent = jobData.summary;

            const skillsList = document.getElementById('freelancer-skills');
            skillsList.innerHTML = '';
            jobData.skills.forEach(skill => {
                skillsList.innerHTML += `<li style="margin-bottom: 5px;"><i class="fas fa-dot-circle" style="color: #007bff; margin-right: 8px;"></i> ${skill}</li>`;
            });
            
        } else {
            document.getElementById('job-title').textContent = 'Jasa Tidak Ditemukan';
        }
    });
</script>
@endsection