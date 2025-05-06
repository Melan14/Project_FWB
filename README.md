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
### Tabel roles
| Kolom       | Tipe Data | Keterangan                            |
|-------------|-----------|----------------------------------------|
| id          | int       | Primary Key, auto increment            |
| nama_role   | varchar   | admin / penjual / pembeli              |

### Tabel kategori
| Kolom       | Tipe Data | Keterangan                            |
|-------------|-----------|----------------------------------------|
| id          | int       | Primary Key, auto increment            |
| nama        | varchar   | Nama lengkap pengguna                  |
| email       | varchar   | Unik, digunakan untuk login            |
| password    | varchar   | Password terenkripsi                   |
| id_role     | varchar   | foreign key ke roles                   |
| created_at  | TIMESTAMP | Waktu pendaftaran                      |

### Tabel kategori

| Kolom        | Tipe Data | Keterangan                                 |
|--------------|-----------|--------------------------------------------|
| id           | int       | Primary Key, auto increment                |
| nama_kategori| varchar   | Nama kategori makanan                      |

### Tabel Spot kuliner
| Kolom       | Tipe Data | Keterangan                             |
|-------------|-----------|----------------------------------------|
| id          | int       | Primary Key, auto increment            |
| id_user     | int       | Foreign Key ke User (Penjual)          |
| id_kategori | int       | Foreign Key ke Kategori                |
| Nama        | varchar   | Nama Tempat                            |
| Deskripsi   | varchar   | Deskripsi Tempat Kuliner               |
| Lokasi      | varchar   | alamat / lokasi                        |
| Status      | enum      | tanggal pendaftaran                    |

### Tabel review
| Kolom       | Tipe Data | Keterangan                             |
|-------------|-----------|----------------------------------------|
| id          | int       | Primary Key, auto increment            |
| id_spot     | int       | Foreign Key ke Spot_kuliner            |
| id_user     | int       | Foreign Key ke User                    |
| Rating      | int       | Rating 1-5                             |
| Komentar    | text      | Isi Ulasan                             |
| Tanggal     | timestamp |Tanggal Ulasan di Buat                  |



Jenis Relasi dan Tabel yang Berelasi
Relasi	Jenis Relasi
roles → user	One to Many (1:M)
user → spot_kuliner	One to Many (1:M)
kategori → spot_kuliner	One to Many (1:M)
spot_kuliner → review	One to Many (1:M)
user → review	One to Many (1:M)
