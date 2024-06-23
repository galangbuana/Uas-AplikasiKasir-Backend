# 🛍️ Sistem Aplikasi Kasir Sederhana

## 📖 Brainstorming

## 📜 Deskripsi Singkat
Aplikasi kasir sederhana ini adalah sebuah sistem berbasis web yang memungkinkan pengelolaan data member, produk, dan penjualan untuk sebuah toko atau usaha kecil. Sistem ini dibangun menggunakan PHP dan MySQL, dengan struktur MVC (Model-View-Controller) yang terorganisir. 

## ☰ Fitur Sistem Aplikasi Kasir 

### 👨🏻‍💻 Manajemen Member 
- **GET /api/members**: Membaca semua data member yang ada pada database
- **POST /api/members**: Menambahkan member yang baru bergabung
- **PUT /api/members**: Memperbarui data member jika terdapat kesalahan pada data atau yang lainnya
- **DELETE /api/members**: Menghapus data member yang sudah tidak aktif lagi

### 🛒 Manajemen Produk
- **GET /api/products**: Membaca semua data produk yang ada pada database
- **POST /api/products**: Menambahkan produk yang baru masuk ke toko
- **PUT /api/products**: Memperbarui data produk jika terdapat kesalahan pada data atau yang lainnya
- **DELETE /api/products**: Menghapus data produk yang sudah tidak dijual lagi

### 💵 Manajemen Penjualan
- **GET /api/sales**: Membaca semua data penjualan yang ada pada database
- **POST /api/sales**: Menambahkan penjualan yang baru dari pembelian barang
- **DELETE /api/sales**: Menghapus data penjualan

## 🏗️ Gambaran Arsitektur Teknologi

### Penjelasan
![image](https://github.com/galangbuana/Uas-AplikasiKasir-Backend/assets/162245644/407eaeaa-6ef1-480e-9d8d-6b68b006b3d8)
Penjelasan singkat mengenai  gambaran arsitektur teknologi yang digunakan:

- **User Interface**: Tampilan antarmuka yang memungkinkan pengguna berinteraksi langsung dengan sistem melalui web browser.
- **PHP**: Bahasa pemrograman PHP digunakan untuk menjalankan logika bisnis utama sistem aplikasi kasir sederhana. Hal ini meliputi manipulasi data member, validasi input pengguna, penjualan, produk dan berbagai pemrosesan bisnis penting lainnya.
- **MySQL**: Sistem menggunakan database MySQL untuk menyimpan seluruh data yang terkait dengan sistem aplikasi kasir sederhana.
- **Apache Web Server**: Apache Web Server berperan sebagai perantara, menerima permintaan dari browser pengguna dan meneruskannya ke REST API yang sesuai.
- **REST API**: REST API bertindak sebagai jembatan antara tampilan antarmuka pengguna (front-end) dan logika bisnis di balik layar (back-end). API ini menerima permintaan dari server web, melakukan operasi yang diperlukan, dan memberikan respons yang sesuai.
  
## 🗃️ ERD
![Untitled Diagram-Page-14 drawio (1)](https://github.com/galangbuana/Uas-AplikasiKasir-Backend/assets/162245644/26df6858-b6dd-49c6-b3db-0db215c7e907)

Dengan ERD ini, hubungan antar tabel dalam sistem aplikasi kasir sederhana dapat dipahami dengan jelas.

- **Members**
  - `member_id (PK)`
  - `member_name`
  - `phone_number`
  - `email`
  - `join_date`
- **Products**
  - `product_id`
  - `product_name`
  - `price`
  - `stock`
- **Sales**
  - `sales_id`
  - `product_id`
  - `member_id`
  - `sale_date`
  - `quantity`
  - `selling_price`
  - `total_price`
  - `product_id` REFERENCES `products(product_id)`
  - `member_id` REFERENCES `members(member_id)`

Relasi antar tabel-tabel dalam desain database diatas:
- **Tabel Products** dan **Tabel Sales** memiliki relasi one-to-many. Satu produk bisa terjual dalam banyak penjualan, tetapi setiap penjualan hanya terkait dengan satu produk pada satu waktu. Ini diwakili oleh `id_produk` yang ada di kedua tabel sebagai Foreign Key di Tabel Penjualan.
- **Tabel Members** dan **Tabel Sales** juga memiliki relasi one-to-many. Satu member bisa melakukan banyak penjualan, tetapi setiap penjualan hanya terkait dengan satu member. Ini diwakili oleh `id_member` yang ada di kedua tabel sebagai Foreign Key di Tabel Penjualan.
- **Tabel Products** tidak langsung terhubung dengan **Tabel Member** melalui relasi database. Namun, mereka terhubung secara tidak langsung melalui Tabel Penjualan. Informasi ini membantu dalam melacak produk apa yang dibeli oleh member tertentu.

## Struktur Proyek
```sh
toko-serba-ada/
├── app.php
├── db_kasir.sql
├── .env
├── .htaccess
├── config/
│   ├── database.php
│   └── table.php
├── controllers/
│   ├── MembersController.php
│   ├── ProductsController.php
│   └── SalesController.php
├── middleware/
│   └── Router.php
├── models/
│   ├── MembersModel.php
│   ├── ProductsModel.php
│   └── SalesModel.php
└── services/
    ├── MembersService.php
    ├── ProductsService.php
    └── SalesService.php
```

### Penjelasan
Berikut adalah deskripsi singkat dari setiap file dan direktori:

1. **.env**:
   - Berisi konfigurasi lingkungan seperti detail koneksi database.

2. **db_kasir.sql**:
   - File SQL yang berisi skrip untuk membuat database dan tabel yang diperlukan.
     
3. **.htaccess**:
   - Mengatur URL rewrite untuk mengarahkan semua permintaan ke `app.php`.

4. **app.php**:
   - File utama untuk mengatur rute dan menghubungkan dengan controller yang sesuai.

5. **config/**:
   - `database.php`: Kelas `Database` untuk mengatur koneksi ke database menggunakan PDO.
   - `table.php`: Mengandung array yang memetakan nama tabel di database.

6. **controllers/**:
   - `MembersController.php`: Mengatur operasi CRUD untuk members.
   - `ProductsController.php`: Mengatur operasi CRUD untuk produk.
   - `SalesController.php`: Mengatur operasi CRD untuk penjualan.

7. **middleware/**:
   - `Router.php`: Kelas `Router` untuk mengatur rute dan menghubungkan dengan action yang sesuai.

8. **models/**:
   - `MembersModel.php`: Model untuk operasi database terkait members.
   - `ProductsModel.php`: Model untuk operasi database terkait produk.
   - `SalesModel.php`: Model untuk operasi database terkait penjualan.

9. **services/**:
   - `MembersService.php`: Layanan untuk operasi logika bisnis terkait members.
   - `ProductsService.php`: Layanan untuk operasi logika bisnis terkait produk.
   - `SalesService.php`: Layanan untuk operasi logika bisnis terkait penjualan.


## 📝 Petunjuk Penggunaan
Langkah-langkah untuk menginstal proyek ini secara lokal:

## Instalasi

1. Clone repositori ini:
    ```sh
    git clone https://github.com/username/toko-serba-ada.git
    ```
    
2. **Membuka Proyek di Editor Terpilih:**
  - Gunakan IDE favorit Anda, seperti Visual Studio Code, untuk membuka folder proyek.
  - Pastikan Anda memiliki semua ekstensi dan plugin yang diperlukan untuk pengembangan proyek terpasang.
  - Akses file-file proyek dan mulai proses pengembangan dan pengujian.
    
3. **Persiapkan Server Web Lokal:**
  - Pastikan XAMPP terinstal dan diaktifkan di komputer Anda.
  - Jalankan XAMPP dan verifikasi bahwa layanan Apache dan MySQL aktif.
  - Tunggu hingga server web lokal dan database MySQL siap digunakan.
    
4. Import Database untuk sistem aplikasi kasir sederhana:
  - Buka phpMyAdmin, alat bantu web untuk mengelola database MySQL.
  - Pilih database yang ingin Anda gunakan atau buat database baru dengan nama yang sesuai.
  - Impor file `db_kasir.sql` ke dalam database yang dipilih.
  - Alternatively, jalankan query SQL dari file `db_kasir.sql` untuk membuat database dan tabel yang diperlukan secara manual.
  - Pastikan proses import database berhasil dan semua tabel dan data telah termuat dengan benar.

5. Buat file `.env` di direktori root proyek dan tambahkan konfigurasi database Anda:
    ```sh
    DB_HOST=localhost
    DB_NAME=kasir
    DB_USERNAME=admin
    DB_PASSWORD=admin123
    ```

6. **Siapkan Postman untuk Menguji API**
   Unduh Postman dari situs resminya [klik disini](https://www.postman.com/downloads/).

## Contoh Penggunaan

### Manajemen Member

**1. Membaca semua data member**
   - **Permintaan:**
     ```
     GET /api/members
     ```
   - **Tanggapan:**
     ```json
     {
         "records": [
             {
                 "member_id": "1",
                 "member_name": "John Doe",
                 "phone_number": "123456789",
                 "email": "john@example.com",
                 "join_date": "2023-01-01"
             }
         ]
     }
     ```

**2. Menambah member baru**
   - **Permintaan:**
     ```
     POST /api/members
     ```
   - **Payload:**
     ```json
     {
         "member_id": "2",
         "member_name": "Jane Doe",
         "phone_number": "987654321",
         "email": "jane@example.com",
         "join_date": "2023-02-01"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Insert success"
     }
     ```

**3. Memperbarui member**
   - **Permintaan:**
     ```
     PUT /api/members
     ```
   - **Payload:**
     ```json
     {
         "member_id": "2",
         "member_name": "Jane Smith",
         "phone_number": "987654321",
         "email": "jane@example.com",
         "join_date": "2023-02-01"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Update success"
     }
     ```

**4. Menghapus member**
   - **Permintaan:**
     ```
     DELETE /api/members
     ```
   - **Payload:**
     ```json
     {
         "member_id": "2"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Delete success"
     }
     ```

### Produk

**1. Membaca semua produk**
   - **Permintaan:**
     ```
     GET /api/products
     ```
   - **Tanggapan:**
     ```json
     {
         "records": [
             {
                 "product_id": "1",
                 "product_name": "Product A",
                 "price": "1000",
                 "stock": "10"
             }
         ]
     }
     ```

**2. Menambah produk**
   - **Permintaan:**
     ```
     POST /api/products
     ```
   - **Payload:**
     ```json
     {
         "product_id": "2",
         "product_name": "Product B",
         "price": "2000",
         "stock": "20"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Insert success"
     }
     ```

**3. Memperbarui produk**
   - **Permintaan:**
     ```
     PUT /api/products
     ```
   - **Payload:**
     ```json
     {
         "product_id": "2",
         "product_name": "Product B Updated",
         "price": "2500",
         "stock": "25"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Update success"
     }
     ```

**4. Menghapus produk**
   - **Permintaan:**
     ```
     DELETE /api/products
     ```
   - **Payload:**
     ```json
     {
         "product_id": "2"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Delete success"
     }
     ```

### Penjualan

**1. Membaca semua penjualan**
   - **Permintaan:**
     ```
     GET /api/sales
     ```
   - **Tanggapan:**
     ```json
     {
         "records": [
             {
                 "sales_id": "1",
                 "product_id": "1",
                 "member_id": "1",
                 "sale_date": "2023-01-01",
                 "quantity": "1",
                 "selling_price": "1000",
                 "total_price": "1000"
             }
         ]
     }
     ```

**2. Menambah penjualan**
   - **Permintaan:**
     ```
     POST /api/sales
     ```
   - **Payload:**
     ```json
     {
         "sales_id": "2",
         "product_id": "2",
         "member_id": "2",
         "sale_date": "2023-02-01",
         "quantity": "2",
         "selling_price": "2000",
         "total_price": "4000"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Insert success"
     }
     ```

**3. Menghapus penjualan**
   - **Permintaan:**
     ```
     DELETE /api/sales
     ```
   - **Payload:**
     ```json
     {
         "sales_id": "2"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Delete success"
     }
     ```
