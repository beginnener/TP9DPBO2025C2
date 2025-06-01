_Saya Natasha Adinda Cantika dengan NIM 2312120 mengerjakan TP9 dalam mata kuliah DPBO. Untuk keberkahan-Nya, saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin._

# Implementasi _framework_ MVP dengan PHP

Program ini merupakan sebuah aplikasi berbasis website yang dapat menangani CRUD dan menampilkan isi tabel dari database.

---
## _Dependencies_
1. XAMPP versi 7 keatas yang sudah on
2. Import file mvp_php.sql ke phpmyadmin

---
## Struktur Folder
```
/mvp_php
├── index.php
├── mvp_php.sql
├── model
│   ├── DB.class.php
│   ├── Mahasiswa.class.php
│   └── Template.class.php
├── presenter
│   ├── KontrakPresenter.php
│   └── ProsesMahasiswa.php
├── templates
│   └── skin.html
└── view
    ├── KontrakView.php
    └── TampilMahasiswa.php
```
---
## Fitur Aplikasi

### 1. CRUD Data Baru Mahasiswa
- Formulir yang dapat menerima input data baru daru user
- Button untuk melakukan edit dan hapus

### 2. Tampilan data
- Terdapat tabel yang menampilkan data dari database mahasiswa

---
## Cara Kerja

### 1. Folder model
Secara keseluruhan folder model bertugas untuk menyediakan data, mengelola data, dan berkomunikasi dengan sumber data untuk objek mahasiswa, template untuk tampilan, dan koneksi dengan database

#### Model DB
- Berfungsi untuk menyediakan dan menutup koneksi dengan database MySQL
- Berkomunikasi dengan database untuk eksekusi query dan mengambil data

#### Model Mahasiswa
- Menyediakan struktur data untuk objek mahasiswa
- Menyediakan logika construct, getter, dan setter untuk objek mahasiswa.

#### Model Template
- Menyediakan struktur data untuk objek Template
- Fungsi construct berfungsi untuk membuat objek
- fungsi clear berfungsi untuk menghapus kode dari template html ke konten yang sudah disiapkan
- fungsi write berfungsi untuk menghapus kode dan menampilkan konten ke layar
- fungsi getcontent berfungsi untuk mengambil isi file yang sudah di proses lalu menghapus data dummy dan menampilkan konten dari isi file
- fungsi replace berfungsi untuk menggantikan kode yang ada di template html ke data yang sudah diproses

### 2. Folder presenter
Adalah pusat pemrosesan data. Selain itu, presenter juga bertugas menangani alur dari view ke model, model ke view.

#### Kontrak presenter
- Sebuah interface atau blueprint yang harus diikuti file presenter lainnya yang menginherit kelas ini

#### ProsesMahasiswa
- Fungsi construct bertugas untuk menginisiasi koneksi dari database yang berisi data mahasiswa kedalam variabel $this->mahasiswa. selain itu, diinisasi pula variabel $data berupa list untuk menampung hasil data mahasiswa nanti kedalam list.
- Fungsi prosesDataMahasiswa bertugas untuk mengambil data dari tabel database. Terdapat looping yang digunakan untuk mem-_breakdown_ data dari tabel mahasiswa kedalam _array of object_ mahasiswa.
- Fungsi Getter yang nanti akan digunakan pada view untuk menyajikan isi _array of object_ mahasiswa kepada user.

### 3. Folder Template
- berisi template html untuk menampilkan hasil proses data

### 4. Folder view

#### KontrakView
- interface yang harus diikuti oleh seluruh file yang menginherit kelas ini

#### TampilMahasiswa
- memiliki fungsi construct yang bertugas untuk menginstansiasi objek ProsesMahasiswa
- fungsi tampil bertugas untuk mengolah data yang sudah diolah oleh presenter ProsesMahasiswa kedalam format html lalu diberikan ke template

### 5. File index.php
- untuk menampilkan semua hasil olah data
---

## _Screenshot_ Hasil
