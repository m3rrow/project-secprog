Alur Web Freelancing cybersecurity

FORM LOGIN
- Kolom Text
	=> Username/Email
	=> Password
- Button
	=> Login → untuk melakukan proses login sesuai role (customer/freelancer).
	=> Register → redirect ke form registrasi.
	=> Forgot Password → redirect ke halaman reset password.


FORM REGISTER
- Kolom Text
	=> Username
	=> Email
	=> Password
	=> Confirm Password
	=> Nomor HP
- Dropdown/Radio
	=> Pilih Role (Customer / freelancer) 
	kalo pilih freelancer, ada tambahan suruh input cv/porto/ktp
    kalo pilih customer, ada tambahan kolom yg nanya dari company apa
- Button
	=> Register → simpan data user ke database.
	=> Back to Login → kembali ke form login.


FORM INDEX / HOMEPAGE (Customer)
- Menampilkan
	=> Banner / poster / promosi / etc
	=> 	a. recommend jasa random (buat pertama kali) 
		b. recommend jasa sesuai last search (kalo ud pernah search) 
- Fitur
	=> Search bar → cari jasa (contoh: "Pentester"), nama pemilik jasa, kategori jasa (Network pentesting, Web application pentesting, Mobile application pentesting, dll)
	=> Filter kategori → review, harga, domisili
- Button/Link
	=> Redirect ke detail Jasa yang dicari
	=> Link ke Form Login (jika user belum login).


HALAMAN DETAIL JASA
- Menampilkan
	=> Nama jasa
	=> Nama penyedia (freelancer)
	=> Harga per jam/hari
	=> Deskripsi layanan / penjelasan lbh lanjut ttg penyedia layanan
	=> Foto freelancer
	=> Rating & review
- Button
	=> Pesan Jasa → redirect ke halaman checkout.
	=> Back / tombol ‘x’→ kembali ke homepage.


FORM PESAN JASA (Checkout – Customer)
- Kolom Input
	=> Deadline / Tanggal 
	=> Catatan tambahan
- Dropdown / radio button
	=> Pilih metode pembayaran (transfer bank, e-wallet, COD).
- Button
	=> Konfirmasi Pesanan → simpan order ke database (status: menunggu konfirmasi).
	=> Cancel → kembali ke halaman detail jasa.


HALAMAN RIWAYAT ORDER (Customer)
- Menampilkan
	=> List order user (status: menunggu, diproses, selesai).
	=> Detail order (nama jasa, harga, tanggal, status).
- Button
	=> Konfirmasi Selesai → ubah status order jadi selesai.
	=> Berikan Review → isi rating & komentar untuk seller.


DASHBOARD FREELANCER
=> Tambah Jasa Baru
=> Kelola Jasa (semisal dia input 3 jasa, dia bisa nonaktifin 1 jasa lain yang lg ga aktif)
=> Order Masuk
=> Riwayat Order
=> pendapatan
=> Jasa yang terinput
=> Jumlah order masuk
=> Rating rata-rata


FORM TAMBAH JASA (Freelancer)
- Kolom Input
	=> Nama jasa
	=> Harga
	=> Deskripsi layanan
	=> Upload foto penyedia jasa 
	=> Upload porto/cv/etc
- Button
	=> Simpan → buat data jasa baru.
	=> Cancel → kembali ke dashboard.


HALAMAN ORDER MASUK (Freelancer)
- Menampilkan
	=> Daftar order yang belum diproses.
	=> Detail customer (nama, alamat, catatan).
- Button
	=> Terima Order → ubah status order jadi diproses.
	=> Tandai Selesai → ubah status jadi selesai.


FORM PROFIL (jd kek binusmaya yg bisa milih jd lecturer/student, nah kalo ini bisa milih jd customer atau seller)
- Menunjukkan
	=> Nama
	=> Email
	=> Nomor HP
	=> Alamat
- Upload Foto
	=> Untuk ganti foto profil.
- Button
	=> Update Profil → simpan perubahan ke database.
	=> Log out


ADMIN FLOW
a.	Verifikasi seller baru. (verifnya kek mastiin porto / cv / ktp si seller biar bisa mastiin dia real ato fake) 
b.	Kelola data jasa (hapus jika tidak sesuai).
c.	Kelola order (cancel/refund bila ada masalah).
d.	Monitoring transaksi & aktivitas user.
