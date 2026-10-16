# Data Film - MVC PHP Native

Aplikasi CRUD sederhana untuk mengelola data film. Dibuat dengan PHP Native, pola Model-View-Controller (MVC), PDO, dan MySQL/MariaDB sebagai tugas individu modul Konsep MVC pada PHP Native dengan Workflow Git.

## Fitur

- Menampilkan daftar film
- Menambah film baru
- Mengubah data film
- Menghapus film (dengan konfirmasi)
- Validasi input dan pesan berhasil/gagal setiap operasi

## Atribut Film

| Atribut | Keterangan |
|---|---|
| judul | Judul film |
| sutradara | Nama sutradara |
| genre | Genre film |
| tahun | Tahun rilis |
| negara | Negara asal film |
| rating | Nilai 0 sampai 10 (satu desimal) |

## Tech Stack

- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Web server lokal XAMPP
- Git

## Instalasi

1. Salin atau clone proyek ke folder `htdocs` XAMPP:
```
   C:\xampp\htdocs\data-film-mvc
```
2. Jalankan **Apache** dan **MySQL** dari XAMPP Control Panel.
3. Impor database `database/film.sql` melalui phpMyAdmin (menu Import), atau lewat terminal:
```
   mysql -u root -p < database/film.sql
```
4. Sesuaikan koneksi pada `config/database.php` jika username atau password MySQL berbeda.
5. Buka aplikasi di browser:
```
   http://localhost/data-film-mvc/public/index.php
```

## Struktur Folder

```
data-film-mvc/
├── app/
│   ├── controllers/
│   │   └── FilmController.php
│   ├── models/
│   │   └── Film.php
│   └── views/
│       └── film/
│           ├── index.php
│           ├── create.php
│           └── edit.php
├── config/
│   └── database.php
├── database/
│   └── film.sql
├── public/
│   └── index.php
├── .gitignore
└── README.md
```

## Penerapan MVC

| Komponen | File | Tanggung jawab |
|---|---|---|
| Model | `app/models/Film.php` | Operasi data ke database dengan PDO dan prepared statement |
| View | `app/views/film/` | Tampilan HTML: daftar, form tambah, form edit |
| Controller | `app/controllers/FilmController.php` | Menerima request, validasi, memanggil Model, menentukan View atau redirect |
| Router | `public/index.php` | Entry point, membaca parameter `page` dan `action` |

## Pemetaan CRUD

| Fitur | Action | Controller | Model | Output |
|---|---|---|---|---|
| Daftar | `index` | `index()` | `getAll()` | `index.php` |
| Form tambah | `create` | `create()` | - | `create.php` |
| Simpan | `store` | `store()` | `insert()` | redirect |
| Form edit | `edit` | `edit()` | `findById()` | `edit.php` |
| Update | `update` | `update()` | `update()` | redirect |
| Hapus | `delete` | `delete()` | `delete()` | redirect |


## Pengujian

1. **Read:** halaman utama menampilkan data awal dari database.
2. **Create:** isi form tambah, simpan, lalu data baru muncul di daftar.
3. **Update:** ubah data lewat form edit, lalu perubahan tampil di daftar.
4. **Delete:** klik Hapus, setujui konfirmasi, lalu data hilang.
5. **Validasi:** kosongkan field atau isi rating di luar 0-10, lalu aplikasi menampilkan pesan error.

## Histori Git

```
* df5d80d (HEAD -> master) feat: add complete CRUD routing
* 68611de feat: add complete Films CRUD views
* 711d43c feat: add film controller with validation       
* 1ef9925 feat: add film CRUD model
* 0d0848b feat: add PDO database connection
* 45a983d feat: add film database schema and seed data    
* 59235e9 chore: initialive mvc PHP native project and create .gitignore
```

## Creator

Muhammad Taqiy Mumtaz
(109062500135)