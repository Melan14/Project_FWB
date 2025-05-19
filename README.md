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

## 🎭 Role & Fitur

### 1. Admin
- Melihat daftar akun user
- Menghapus akun vendor atau foodie
- Menghapus review

### 2. Vendor (Pemilik Warung / Restoran)
- Mendaftarkan tempat kuliner
- Mengelola informasi tempat kuliner
- Melihat ulasan dari foodie

### 3. Foodie
- Melihat daftar tempat kuliner
- Memberikan review dan rating
- Menyimpan tempat favorit

---

## 🗃️ Struktur Tabel Database

### 1. `Users`
Data seluruh pengguna sistem.

| Field       | Tipe Data | Keterangan                     |
|-------------|-----------|---------------------------------|
| id          | INT       | Primary Key                    |
| name        | VARCHAR   | Nama lengkap                   |
| email       | VARCHAR   | Email login                    |
| password    | VARCHAR   | Password login                 |
| role        | ENUM      | 'admin', 'vendor', 'foodie'    |
| created_at  | TIMESTAMP | Tanggal dibuat                 |
| updated_at  | TIMESTAMP | Tanggal diubah                 |

---

### 2. `User_Profile`
Profil tambahan pengguna (relasi 1–1 ke Users).

| Field       | Tipe Data | Keterangan                           |
|-------------|-----------|---------------------------------------|
| id          | INT       | Primary Key                          |
| user_id     | INT       | Foreign Key → Users(id), UNIQUE      |
| foto        | VARCHAR   | Path foto profil                     |
| bio         | TEXT      | Ringkasan pengguna                   |
| deskripsi   | TEXT      | Deskripsi lengkap pengguna           |
| created_at  | TIMESTAMP | Tanggal dibuat                       |
| updated_at  | TIMESTAMP | Tanggal diubah                       |

---

### 3. `Spot_kuliner`
Tempat kuliner yang didaftarkan oleh vendor.

| Field       | Tipe Data | Keterangan                                 |
|-------------|-----------|---------------------------------------------|
| id          | INT       | Primary Key                                |
| user_id     | INT       | Foreign Key → Users(id) (vendor)           |
| name        | VARCHAR   | Nama tempat kuliner                        |
| deskripsi   | TEXT      | Deskripsi tempat kuliner                   |
| lokasi      | VARCHAR   | Alamat tempat kuliner                      |
| status      | ENUM      | 'pending', 'approved', 'rejected'          |
| created_at  | TIMESTAMP | Tanggal dibuat                             |
| updated_at  | TIMESTAMP | Tanggal diubah                             |

---

### 4. `Review`
Ulasan dari foodie terhadap tempat kuliner.

| Field       | Tipe Data | Keterangan                          |
|-------------|-----------|--------------------------------------|
| id          | INT       | Primary Key                         |
| user_id     | INT       | Foreign Key → Users(id) (foodie)    |
| spot_id     | INT       | Foreign Key → Spot_kuliner(id)      |
| rating      | INT       | Skala 1–5                           |
| komentar    | TEXT      | Isi ulasan                          |
| created_at  | TIMESTAMP | Tanggal dibuat                      |
| updated_at  | TIMESTAMP | Tanggal diubah                      |

---

### 5. `Favorite`
Daftar tempat kuliner favorit milik foodie (relasi Many-to-Many).

| Field       | Tipe Data | Keterangan                          |
|-------------|-----------|--------------------------------------|
| user_id     | INT       | Foreign Key → Users(id) (foodie)    |
| spot_id     | INT       | Foreign Key → Spot_kuliner(id)      |
| created_at  | TIMESTAMP | Tanggal ditambahkan ke favorit      |
**Primary Key**: `(user_id, spot_id)`

---

## 🔗 Relasi Antar Tabel

| Relasi                        | Jenis Relasi   |
|-------------------------------|----------------|
| Users → User_Profile          | One-to-One     |
| Users (vendor) → Spot_kuliner | One-to-Many    |
| Users (foodie) → Review       | One-to-Many    |
| Spot_kuliner → Review         | One-to-Many    |
| Users (foodie) ↔ Spot_kuliner (Favorite) | Many-to-Many |
