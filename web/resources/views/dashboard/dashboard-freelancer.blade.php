@extends('layout.app2')
@section('content_title', 'Dashboard')
@section('content_desc', 'Manage Your Services & Orders')
@section('content')

<style>
    .dashboard-wrapper {
        background: #f8f9fa;
        padding: 30px 0;
    }
    
    .dashboard-card {
        background: #fff;
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 20px;
        transition: box-shadow 0.3s ease;
    }
    
    .dashboard-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }
    
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .dashboard-title {
        font-size: 22px;
        font-weight: 600;
        color: #222;
        margin: 0;
    }
    
    .dashboard-subtitle {
        color: #666;
        font-size: 13px;
        margin-top: 5px;
    }
    
    .stat-box {
        text-align: center;
        padding: 20px;
        border-radius: 8px;
        background: #f8f9fa;
    }
    
    .stat-number {
        font-size: 28px;
        font-weight: 700;
        color: #007bff;
    }
    
    .stat-label {
        color: #666;
        font-size: 13px;
        margin-top: 8px;
        text-transform: uppercase;
    }
    
    .service-item {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .service-item:hover {
        border-color: #007bff;
        background: #f9fbff;
    }
    
    .service-info h6 {
        font-weight: 600;
        margin: 0 0 5px 0;
        color: #222;
    }
    
    .service-info p {
        color: #666;
        font-size: 13px;
        margin: 0;
    }
    
    .service-rate {
        font-size: 18px;
        font-weight: 700;
        color: #007bff;
    }
    
    .service-actions {
        display: flex;
        gap: 8px;
    }
    
    .modal-header {
        background: #f8f9fa;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .modal-title {
        font-weight: 600;
        color: #222;
    }
    
    .form-label {
        font-weight: 600;
        color: #222;
        margin-bottom: 8px;
    }
    
    .form-control, .form-select {
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 8px 12px;
        font-size: 13px;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.1);
    }
    
    .btn-primary {
        background: #007bff;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        padding: 8px 20px;
    }
    
    .btn-primary:hover {
        background: #0056b3;
    }
    
    .btn-outline-primary {
        color: #007bff;
        border-color: #007bff;
        border-radius: 6px;
        font-weight: 600;
    }
    
    .btn-outline-primary:hover {
        background: #007bff;
        color: #fff;
    }
    
    .btn-sm {
        font-size: 12px;
        padding: 5px 12px;
    }
    
    .badge {
        font-size: 11px;
        padding: 4px 8px;
        border-radius: 4px;
    }
    
    .status-active {
        background: #d4edda;
        color: #155724;
    }
    
    .status-inactive {
        background: #f8d7da;
        color: #721c24;
    }
    
    .no-services {
        text-align: center;
        padding: 40px 20px;
        color: #666;
    }
    
    .no-services h6 {
        color: #999;
        margin-bottom: 10px;
    }
</style>

<div class="dashboard-wrapper">
    <div class="container">
        <!-- Header -->
        <div class="dashboard-header">
            <div>
                <h2 class="dashboard-title">Your Dashboard</h2>
                <p class="dashboard-subtitle">Manage your services and monitor orders</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postServiceModal">
                <i class="fas fa-plus"></i> Post a Service
            </button>
        </div>

        <div class="row">
            <!-- Left Column: Services & Stats -->
            <div class="col-lg-8">
                <!-- Your Services Section -->
                <div class="dashboard-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <div>
                            <h5 class="dashboard-title" style="margin: 0;">Your Services</h5>
                            <p class="dashboard-subtitle">Active service listings</p>
                        </div>
                        <span class="badge" style="background: #007bff; color: #fff; font-size: 14px; padding: 8px 12px;">
                            {{ $jobs->count() ?? 0 }} Active
                        </span>
                    </div>

                    @if($jobs && $jobs->count())
                        @foreach($jobs as $job)
                            <div class="service-item">
                                <div class="service-info">
                                    <h6>{{ $job->title }}</h6>
                                    <p>
                                        <i class="fas fa-folder-open"></i> {{ $job->category ?? 'No Category' }} 
                                        • <i class="fas fa-clock"></i> {{ $job->created_at->format('M d, Y') }}
                                    </p>
                                    <p style="margin-top: 5px;">{{ \Illuminate\Support\Str::limit($job->description, 80) }}</p>
                                </div>
                                <div style="text-align: right;">
                                    <div class="service-rate" style="margin-bottom: 10px;">
                                        ${{ number_format($job->rate, 2) }}
                                        @if($job->rate_type == 'hourly')
                                            <span style="font-size: 14px; color: #666;">/hr</span>
                                        @endif
                                    </div>
                                    <span class="badge {{ $job->is_active ? 'status-active' : 'status-inactive' }}">
                                        {{ $job->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                    <div class="service-actions" style="margin-top: 10px; justify-content: flex-end;">
                                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="editService({{ $job->id }})" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="toggleService(this, {{ $job->id }})" title="Toggle Status">
                                            <i class="fas fa-{{ $job->is_active ? 'pause' : 'play' }}"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no-services">
                            <h6>No Services Posted Yet</h6>
                            <p>Click "Post a Service" to get started and start accepting orders</p>
                        </div>
                    @endif
                </div>

                <!-- Stats Section -->
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-4">
                        <div class="stat-box">
                            <div class="stat-number">{{ $activeCount ?? 0 }}</div>
                            <div class="stat-label">Active Services</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-box">
                            <div class="stat-number">{{ $totalEarnings ?? '$0.00' }}</div>
                            <div class="stat-label">Total Earnings</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-box">
                            <div class="stat-number">0</div>
                            <div class="stat-label">Pending Orders</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Profile Info -->
            <div class="col-lg-4">
                <div class="dashboard-card text-center">
                    <div style="width: 60px; height: 60px; background: #007bff; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 24px;">
                        <i class="fas fa-user"></i>
                    </div>
                    <h6 style="margin: 0 0 5px 0; color: #222;">{{ auth()->user()->name ?? 'Freelancer' }}</h6>
                    <p style="color: #666; font-size: 13px; margin: 0 0 15px 0;">{{ auth()->user()->email ?? 'email@example.com' }}</p>
                    <hr style="margin: 15px 0;">
                    <div style="text-align: left;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <span style="color: #666; font-size: 13px;">Rating</span>
                            <div style="color: #f1c40f;">★★★★★ <span style="color: #666;">(4.8)</span></div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <span style="color: #666; font-size: 13px;">Response Rate</span>
                            <span style="color: #222; font-weight: 600;">98%</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #666; font-size: 13px;">Member Since</span>
                            <span style="color: #222; font-weight: 600;">2024</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-primary" style="width: 100%; margin-top: 15px;">
                        <i class="fas fa-user-edit"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Post Service Modal -->
<div class="modal fade" id="postServiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Post a New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="post-service-form" action="{{ route('jobs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Service Title *</label>
                                <input type="text" class="form-control" name="title" placeholder="e.g. Website Penetration Testing" required />
                                <small class="text-muted">A clear, descriptive title for your service</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Category *</label>
                                <input type="text" class="form-control" name="category" placeholder="e.g. Security Testing" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Service Rate *</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" name="rate" step="0.01" placeholder="0.00" required min="0" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rate Type *</label>
                                <select class="form-select" name="rate_type" required>
                                    <option value="fixed">Fixed Price</option>
                                    <option value="hourly">Hourly Rate</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Estimated Hours</label>
                                <input type="number" class="form-control" name="estimated_hours" placeholder="e.g. 40" min="1" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Description *</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Describe what you're offering and your expertise..." required></textarea>
                        <small class="text-muted">Be specific about what clients will receive</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Scope of Work *</label>
                        <textarea class="form-control" name="scope" rows="3" placeholder="Detail the scope, deliverables, timeline, and any limitations..." required></textarea>
                        <small class="text-muted">Help clients understand exactly what's included</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Required Skills</label>
                        <textarea class="form-control" name="skills" rows="2" placeholder="e.g. Penetration Testing, Web Security, API Testing (comma-separated)"></textarea>
                        <small class="text-muted">Skills that describe your expertise</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i> Post Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function editService(id) {
        alert('Edit service functionality coming soon');
    }

    function toggleService(btn, id) {
        alert('Toggle service status functionality coming soon');
    }

    document.getElementById('post-service-form')?.addEventListener('submit', function(e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
    });
</script>

@endsection
