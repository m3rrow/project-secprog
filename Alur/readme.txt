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
	=> section “profile freelancer” bisa di isi dengan:
- job description (ringkasan pengalaman yang pernah di kerjain dan apa keahlian utamanya dalam bidang cyber)
- portofolia (link laporan selama kerja, hasil kerjanya, write-up, atau project yang sudah pernah di bikin)

- Button
	=> Pesan Jasa → redirect ke halaman checkout.
	=> Back / tombol ‘x’→ kembali ke homepage.


FORM PESAN JASA (Checkout – Customer) 
- Kolom Input
	=> Durasi(jumlah hari atau jam sesuai jenis harga yang ditentukan freelancer) 
	=> Catatan tambahan
- Dropdown / radio button
	=> Pilih jeniss harga : mau perhari atau perjam
	=> Pilih metode pembayaran (transfer bank, e-wallet, COD)
- Otomatis oleh system
=> Dealine/tanggal selesai => dihitung otomatis dari mulai + durasi(hari/jam)
	=> Total harga, di itung otomatis berdasarkan rumus
Rumus :
Total Harga = harga perhari x jumlah hari => ini rumus untuk perhari
Total Harga = harga perjam x jumlah jam =>buat perjam
- Button
	=> Konfirmasi Pesanan → simpan order ke database (status: menunggu konfirmasi).
	=> Cancel → kembali ke halaman detail jasa.
- Skenario test checkout
=> Freelancer untuk perhari/jam -> menentapkan harga sama customer netapkan durasi mau berapa hari/jam
=>Customer harus mengisi durasi untuk melakukan pemesanan kalua ga isi system validasi input menampilkan pesan “harus isi durasi”
=>Customer tidak boleh memilih durasi melebih maksimum kalau melebihin system bakalan kasih pesan “tidak boleh melebihi durasi”
=>Semua data terisi dari pilihan jasa, durasi dan metode pembayaran akan disimpan ke system data dan status nya “menunggu konfirmasi”
=>Customer men-cancel pemesanan maka system bakalan membatalkan proses, tidak menyimpan data ke data base dan langsung di arahkan ke halaman utama
Setelah checkout 
	Setelah checkout sistemanya bakalan  melakukan checkout, system mengirim email otomatis ke freelancer, berisi detail pesanan, dll:
-	Nama costumer
-	Detail jesa yang dipesan
-	Durasi pekerjaan
-	Catatan tambahan dari customer
	Diwaktu yang sama, sistemmnya juga mengirim konfirmasi ke customer yang berisi
-	Rangkuman pesanan
-	Status awal order(menunggu konfirmasi freelancer)
	Freelancer menerima orderan di dashboard
-	Freelancer masuk ke dashboard -> melihat daftar order yang masuk
-	Jika freelancer menerima pesanan, maka status order otomatis berubah menjadi “diproses”
-	Jika freelancer menerima pesanan, system dapat memberi notifikasi pembatalan ke customer melalui email.
	Komunikasi progress pekerjaan lewat email
-	Setelah status menjadi proses, freelancer dan customer bisa berkomunikasi melalui email
-	Sistemnya otomatis mengirimkan email notifikasi ke 2 pihak agar bisa membahas pekerjaan
-	Semua komunikasi(diskusi, update, dll) dilakukannya dari email. 
	Penyelesaian dan upload hasil kerja
-	Setelah pekerjaan selesai, freelancer mengunggah hasil kerjanya ke system dalam bentuk 
	Laporan hasil kerja(bisa write up/report)
	Bukti hasil tes/dokumen yang mendukung
-	Setelah upload, system otomatis mengirim notifikasi email ke kostumer untuk memberitahukan hasil kerja sudah selesai dan bisa di lihat.
	Customer melihat hasil kerja freelancer 
-	Customer dapat melihat dan mengunduh laporannya dari
	Menu Riwayat order -> detail order -> laporan hasil kerja.
	Setelah melihat hasilnya, customer bisa :
	Menekan tombil komfirmasi selesai untuk menutup proyeknya
	Memberikan ranting dan review kepada freelancer

HALAMAN RIWAYAT ORDER (Customer)
- Menampilkan
	=> List order user (status: menunggu, diproses, selesai).
	=> Detail order (nama jasa, harga, tanggal, status).
	=> jika selesai ada tampilan lihat laporan(otomatis download laporannya)
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
a.	- Verifikasi hanya berlaku untuk seller baru. (verifnya kek mastiin porto / cv / ktp si seller biar bisa mastiin dia real ato fake)
	- Untuk customer tidak perlu verifikasi dari admin dan yang menjadi patokan legal adalah inputan informasi Company
b.	Kelola data jasa (hapus jika tidak sesuai).
c.	Kelola order (cancel/refund bila ada masalah).
d.	Monitoring transaksi & aktivitas user.

Sistem
