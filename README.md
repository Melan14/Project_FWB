<h3 align="center">CULINARY SULBAR</h3> 
<h4 align="center">(Eksplorasi Kuliner & Wisata Makanan Sulawesi Barat)</h4>

<p align="center"> <img src="https://github.com/user-attachments/assets/6ea20b1c-762f-4fc2-98b8-fb3785782673" alt=" " width="200"/>
</p> 

<p align="center">
    <strong>MELANI RAITA</strong><br/><br/> 
    <strong>D0223028</strong><br/><br/> 
    <strong>Framework Web Based</strong><br/><br/> 
    <strong>2025</strong> 
</p>


Role dan Fitur-Fiturnya
1. Admin
Mengelola data user (Vendor & Foodie)
Verifikasi tempat kuliner
Mengelola data review (moderasi)

2. Vendor (Pemilik Warung atau Restoran)
Mendaftarkan tempat kuliner
Mengelola informasi tempat kuliner miliknya
Melihat ulasan dari Foodie

4. Foodie
Melihat daftar tempat kuliner
Memberikan review dan rating
Menyimpan tempat favorit

Tabel-tabel Database Beserta Field dan Tipe Datanya
Tabel roles
Kolom |Tipe Data  |	Keterangan
id	  | INT	      |  Primary Key
nama_role |VARCHAR|	Admin / Penjual / Pembeli

Tabel user
Kolom   |Tipe Data	|Keterangan
id	    | INT	    |Primary Key
nama	| VARCHAR	|Nama Lengkap
password| VARCHAR	|Password login
email   | VARCHAR	|Email Pengguna
id_role	| INT	    |Foreign Key ke tabel roles
created_at	| DATETIME	| Tanggal Pendaftaran

Tabel kategori
Kolom	| Tipe Data	| Keterangan
id	    | INT	    | Primary Key
nama_kategori | VARCHAR	| Nama Kategori Makanan

Tabel spot_kuliner
Kolom	|Tipe Data	|Keterangan
id	    |INT	    |Primary Key
id_user	|INT	    |Foreign Key ke tabel user (Vendor)
id_kategori	|INT	|Foreign Key ke tabel kategori
nama	|VARCHAR	|Nama Tempat
deskripsi |TEXT	    |Deskripsi Tempat Kuliner
lokasi	|VARCHAR	|Alamat / Lokasi
status	|ENUM	    |Status Verifikasi

Tabel review
Kolom	|Tipe Data	|Keterangan
id	    |INT	    |Primary Key
id_spot	|INT	    |Foreign Key ke tabel spot_kuliner
id_user	|INT	    |Foreign Key ke tabel user (Foodie)
rating	|INT	    |Rating 1–5
komentar|TEXT    	|Isi Ulasan
tanggal	|DATETIME	|Tanggal Ulasan Dibuat

Jenis Relasi dan Tabel yang Berelasi
Relasi	Jenis Relasi
roles → user	One to Many (1:M)
user → spot_kuliner	One to Many (1:M)
kategori → spot_kuliner	One to Many (1:M)
spot_kuliner → review	One to Many (1:M)
user → review	One to Many (1:M)
