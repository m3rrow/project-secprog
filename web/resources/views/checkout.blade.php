@extends('layout.app')

@section('content')

<div class="inner-page-main-wrapper float_left ptb-100">
    <div class="container">
        <div class="home1-section-heading1">
            <h6>Konfigurasi Pesanan Anda</h6>
            <h4>Detail Pemesanan Jasa</h4>
        </div>

        <div class="row">

            <div class="col-lg-8 col-md-12">
                
                <div class="trending-main-box float_left mb-3 service-card" data-price-per-day="150000">
                    <div class="trending-upper-text ps-rel">
                        <div class="icon-img">
                            <img src="images/drive.png" alt="img">
                        </div>
                        <a href="#"><h5>Nama Produk Pertama</h5></a>
                        <p>Deskripsi singkat produk.</p>
                    </div>
                    <div class="trending-lower-text">
                        <span>Konfigurasi Pesanan</span>
                        
                        <div style="margin-top: 15px; margin-bottom: 15px;">
                            <label for="durasi_produk_1" style="display: block; margin-bottom: 5px;"><strong>Durasi Pengerjaan (Hari)</strong></label>
                            <input type="number" id="durasi_produk_1" class="form-control duration-input" value="1" min="1" placeholder="Masukkan jumlah hari" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>

                        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
                            <div style="flex: 1;">
                                <label for="tanggal_mulai_1" style="display: block; margin-bottom: 5px;"><strong>Tanggal Mulai</strong></label>
                                <input type="date" id="tanggal_mulai_1" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="flex: 1;">
                                <label for="tanggal_selesai_1" style="display: block; margin-bottom: 5px;"><strong>Deadline Selesai</strong></label>
                                <input type="date" id="tanggal_selesai_1" class="form-control" readonly style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; background-color: #f0f0f0;">
                            </div>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label for="catatan_produk_1" style="display: block; margin-bottom: 5px;"><strong>Deskripsi Tambahan (Opsional)</strong></label>
                            <textarea id="catatan_produk_1" class="form-control" rows="3" placeholder="Jelaskan kebutuhan spesifik Anda di sini..." style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>

                        <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 15px;">
                            <h5 style="margin: 0;">
                                <i class="far fa-money-bill-alt"></i>
                                <strong>Harga: Rp 150.000 / hari</strong>
                            </h5>
                        </div>

                    </div>
                </div>

                <div class="trending-main-box float_left mb-3 service-card" data-price-per-day="250000">
                    <div class="trending-upper-text ps-rel">
                        <div class="icon-img">
                            <img src="images/drive1.png" alt="img">
                        </div>
                        <a href="#"><h5>Nama Produk Kedua</h5></a>
                        <p>Deskripsi lain untuk produk ini.</p>
                    </div>
                    <div class="trending-lower-text">
                        <span>Konfigurasi Pesanan</span>
                        
                        <div style="margin-top: 15px; margin-bottom: 15px;">
                            <label for="durasi_produk_2" style="display: block; margin-bottom: 5px;"><strong>Durasi Pengerjaan (Hari)</strong></label>
                            <input type="number" id="durasi_produk_2" class="form-control duration-input" value="2" min="1" placeholder="Masukkan jumlah hari" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>

                        <div style="display: flex; gap: 15px; margin-bottom: 15px;">
                            <div style="flex: 1;">
                                <label for="tanggal_mulai_2" style="display: block; margin-bottom: 5px;"><strong>Tanggal Mulai</strong></label>
                                <input type="date" id="tanggal_mulai_2" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="flex: 1;">
                                <label for="tanggal_selesai_2" style="display: block; margin-bottom: 5px;"><strong>Deadline Selesai</strong></label>
                                <input type="date" id="tanggal_selesai_2" class="form-control" readonly style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; background-color: #f0f0f0;">
                            </div>
                        </div>
                        <div style="margin-bottom: 10px;">
                             <label for="catatan_produk_2" style="display: block; margin-bottom: 5px;"><strong>Deskripsi Tambahan (Opsional)</strong></label>
                            <textarea id="catatan_produk_2" class="form-control" rows="3" placeholder="Jelaskan kebutuhan spesifik Anda di sini..." style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>

                        <div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 15px;">
                            <h5 style="margin: 0;">
                                <i class="far fa-money-bill-alt"></i>
                                <strong>Harga: Rp 250.000 / hari</strong>
                            </h5>
                        </div>

                    </div>
                </div>

            </div>


            <div class="col-lg-4 col-md-12">
                <div class="trending-main-box float_left" style="position: -webkit-sticky; position: sticky; top: 100px;">
                    <div class="trending-upper-text ps-rel text-center">
                        <h5>Total Pembayaran</h5>
                    </div>
                    <div class="trending-lower-text">
                        <p>Subtotal: <strong id="subtotal-display">Rp 0</strong></p>
                        <p data-fee="20000">Biaya Layanan: <strong id="fee-display">Rp 20.000</strong></p>
                        <hr>
                        <h5>Total: <strong id="total-display">Rp 0</strong></h5>
                        <br>
                        <a class="custom-btn" href="#"> <span>Konfirmasi & Bayar</span> </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }

        function calculateTotal() {
            let subtotal = 0;
            const serviceCards = document.querySelectorAll('.service-card');

            serviceCards.forEach(card => {
                const pricePerDay = parseFloat(card.dataset.pricePerDay) || 0;
                const durationInput = card.querySelector('.duration-input');
                const duration = parseInt(durationInput.value) || 0;
                subtotal += pricePerDay * duration;
            });

            const feeElement = document.querySelector('[data-fee]');
            const fee = parseFloat(feeElement.dataset.fee) || 0;
            const total = subtotal + fee;

            document.getElementById('subtotal-display').textContent = formatRupiah(subtotal);
            document.getElementById('fee-display').textContent = formatRupiah(fee);
            document.getElementById('total-display').textContent = formatRupiah(total);
        }

        const durationInputs = document.querySelectorAll('.duration-input');
        durationInputs.forEach(input => {
            input.addEventListener('input', calculateTotal);
        });

        calculateTotal();
    });
</script>

@endsection