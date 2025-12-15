@extends('layout.app')

@section('content')

<div class="inner-page-main-wrapper float_left ptb-100">
    <div class="container">
        <div class="home1-section-heading1">
            <h6>Configure Your Order</h6>
            <h4>Service Order Details</h4>
        </div>

        <div class="row">

            <div class="col-lg-8 col-md-12">
                
                <div class="trending-main-box float_left mb-3 service-card" data-price="{{ $job->rate }}">
                    <div class="trending-upper-text ps-rel">
                        <div class="icon-img">
                            <i class="fas fa-briefcase" style="font-size: 40px; color: #007bff;"></i>
                        </div>
                        <a href="{{ route('jobs.show', $job->id) }}"><h5>{{ $job->title }}</h5></a>
                        <p>By <strong>{{ $job->company ?? optional($job->user)->name ?? 'Service Provider' }}</strong></p>
                    </div>
                    <div class="trending-lower-text">
                        <span>Order Configuration</span>
                        
                        @if($job->rate_type == 'hourly')
                        <div style="margin-top: 15px; margin-bottom: 15px;">
                            <label for="hours_required" style="display: block; margin-bottom: 5px;"><strong>Hours Required</strong></label>
                            <input type="number" id="hours_required" class="form-control duration-input" value="{{ $job->estimated_hours ?? 1 }}" min="1" placeholder="Enter number of hours" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                        @endif

                        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
                            <div style="flex: 1;">
                                <label for="start_date" style="display: block; margin-bottom: 5px;"><strong>Start Date</strong></label>
                                <input type="date" id="start_date" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="flex: 1;">
                                <label for="end_date" style="display: block; margin-bottom: 5px;"><strong>Expected Completion</strong></label>
                                <input type="date" id="end_date" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>

                        <div style="margin-bottom: 10px;">
                            <label for="special_requirements" style="display: block; margin-bottom: 5px;"><strong>Special Requirements (Optional)</strong></label>
                            <textarea id="special_requirements" class="form-control" rows="3" placeholder="Describe any specific requirements or details..." style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>

                        <div style="background: #f0f8ff; padding: 15px; border-radius: 8px; margin-bottom: 15px;">
                            <h6 style="margin-bottom: 10px;">Scope of Work:</h6>
                            <p style="font-size: 14px; color: #333; margin: 0;">{!! nl2br(e($job->scope)) !!}</p>
                        </div>

                        <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 15px;">
                            <h5 style="margin: 0;">
                                <i class="fas fa-dollar-sign"></i>
                                <strong>Price: ${{ number_format($job->rate, 2) }} @if($job->rate_type == 'hourly')<small>/hour</small>@endif</strong>
                            </h5>
                        </div>

                    </div>
                </div>

            </div>


            <div class="col-lg-4 col-md-12">
                <div class="trending-main-box float_left" style="position: -webkit-sticky; position: sticky; top: 100px;">
                    <div class="trending-upper-text ps-rel text-center">
                        <h5>Total Payment</h5>
                    </div>
                    <div class="trending-lower-text">
                        <p>Subtotal: <strong id="subtotal-display">${{ number_format($job->rate, 2) }}</strong></p>
                        <p data-fee="2.5">Platform Fee (2.5%): <strong id="fee-display">${{ number_format($job->rate * 0.025, 2) }}</strong></p>
                        <hr>
                        <h5>Total: <strong id="total-display">${{ number_format($job->rate + ($job->rate * 0.025), 2) }}</strong></h5>
                        <br>
                        <a class="custom-btn" href="{{ route('jobs.show', $job->id) }}"> <span>View Full Details</span> </a>
                        <button class="custom-btn" onclick="proceedToPayment()" style="margin-top: 10px; background-color: #28a745;"> <span>Proceed to Payment</span> </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        function formatCurrency(number) {
            return new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 2
            }).format(number);
        }

        function calculateTotal() {
            const serviceCard = document.querySelector('.service-card');
            const pricePerUnit = parseFloat(serviceCard.dataset.price) || 0;
            const durationInput = document.querySelector('.duration-input');
            const duration = parseInt(durationInput.value) || 1;
            
            const subtotal = pricePerUnit * duration;
            const feePercentage = 2.5;
            const fee = subtotal * (feePercentage / 100);
            const total = subtotal + fee;

            document.getElementById('subtotal-display').textContent = formatCurrency(subtotal);
            document.getElementById('fee-display').textContent = formatCurrency(fee);
            document.getElementById('total-display').textContent = formatCurrency(total);
        }

        const durationInput = document.querySelector('.duration-input');
        if(durationInput) {
            durationInput.addEventListener('input', calculateTotal);
        }

        calculateTotal();
    });

    function proceedToPayment() {
        const startDate = document.getElementById('start_date').value;
        const specialReqs = document.getElementById('special_requirements').value;

        if(!startDate) {
            alert('Please select a start date');
            return;
        }

        alert('Payment processing...\n\nService: {{ $job->title }}\nTotal: ' + document.getElementById('total-display').textContent);
        // Here you would integrate with a payment processor like Stripe or PayPal
    }
</script>

@endsection
