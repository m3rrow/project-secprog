@extends('layout.app')

@section('content')


<div class="inner-page-main-wrapper float_left ptb-100">
    <div class="container">
        <div class="home1-section-heading1">
            <h6>Ringkasan Pesanan Anda</h6>
            <h4>Halaman Checkout</h4>
        </div>

        <div class="row">

            <div class="col-lg-8 col-md-12">
                

                <div class="trending-main-box float_left mb-3">
                    <div class="trending-upper-text ps-rel">
                        <div class="icon-img">

                            <img src="images/drive.png" alt="img">
                        </div>
                        <a href="#"><h5>Nama Produk Pertama</h5></a>
                        <p>Deskripsi singkat produk.</p>
                    </div>
                    <div class="trending-lower-text">
                        <span>Detail Item</span>
                        <a href="javascript:;"> <i class="far fa-money-bill-alt"></i> Rp 150.000 </a>
                        <p> <span><i class="fas fa-box"></i></span> Kuantitas: 1 </p>
                    </div>
                </div>


                <div class="trending-main-box float_left mb-3">
                    <div class="trending-upper-text ps-rel">
                        <div class="icon-img">

                            <img src="images/drive1.png" alt="img">
                        </div>
                        <a href="#"><h5>Nama Produk Kedua</h5></a>
                        <p>Deskripsi lain untuk produk ini.</p>
                    </div>
                    <div class="trending-lower-text">
                        <span>Detail Item</span>
                        <a href="javascript:;"> <i class="far fa-money-bill-alt"></i> Rp 250.000 </a>
                        <p> <span><i class="fas fa-box"></i></span> Kuantitas: 2 </p>
                    </div>
                </div>

            </div>


            <div class="col-lg-4 col-md-12">
                <div class="trending-main-box float_left">
                    <div class="trending-upper-text ps-rel text-center">
                        <h5>Total Pembayaran</h5>
                    </div>
                    <div class="trending-lower-text">
                        <p>Subtotal: <strong>Rp 400.000</strong></p>
                        <p>Pengiriman: <strong>Rp 20.000</strong></p>
                        <hr>
                        <h5>Total: <strong>Rp 420.000</strong></h5>
                        <br>

                        <a class="custom-btn" href="#"> <span>Bayar Sekarang</span> </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection