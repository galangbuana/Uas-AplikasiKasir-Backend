# 🛍️ Sistem Aplikasi Kasir Sederhana
- Nama : I Komang Raditia Galang Buana
- NIM  : 220040092
- Kelas  : UG224
- Ujian Akhir Semester Back-End Web Development

## 💡Brainstorming

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
![Untitled Diagram-Page-14 drawio (4)](https://github.com/galangbuana/Uas-AplikasiKasir-Backend/assets/162245644/35e69681-e0f9-48c2-be50-3ed23827a141)


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

## ⚙️ Struktur Proyek
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

## 🔧 Instalasi

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
    
4. **Import Database untuk sistem aplikasi kasir sederhana:**
  - Buka phpMyAdmin, alat bantu web untuk mengelola database MySQL.
  - Pilih database yang ingin Anda gunakan atau buat database baru dengan nama yang sesuai.
  - Impor file `db_kasir.sql` ke dalam database yang dipilih.
  - Alternatively, jalankan query SQL dari file `db_kasir.sql` untuk membuat database dan tabel yang diperlukan secara manual.
  - Pastikan proses import database berhasil dan semua tabel dan data telah termuat dengan benar.

5. **Buat file `.env` di direktori root proyek dan tambahkan konfigurasi database Anda:**
    ```sh
    DB_HOST=localhost
    DB_NAME=kasir
    DB_USERNAME=admin
    DB_PASSWORD=admin123
    ```

6. **Siapkan Postman untuk Menguji API:**
   Unduh Postman dari situs resminya [klik disini](https://www.postman.com/downloads/).

## 🌐 Contoh Penggunaan

### Manajemen Member
**URL:** http://localhost/uas-kasir-backend/api/members

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
                "member_id": "2023001",
                "member_name": "John Doe",
                "phone_number": "081234567890",
                "email": "john.doe@example.com",
                "join_date": "2023-01-01"
            },
            {
                "member_id": "2023002",
                "member_name": "Jane Smith",
                "phone_number": "081298765432",
                "email": "jane.smith@example.com",
                "join_date": "2023-02-15"
            },
            {
                "member_id": "2023003",
                "member_name": "Alice Johnson",
                "phone_number": "081234598765",
                "email": "alice.johnson@example.com",
                "join_date": "2023-03-10"
            },
            {
                "member_id": "2023004",
                "member_name": "Bob Brown",
                "phone_number": "081234567812",
                "email": "bob.brown@example.com",
                "join_date": "2023-04-20"
            },
            {
                "member_id": "2023005",
                "member_name": "Charlie Davis",
                "phone_number": "081234598712",
                "email": "charlie.davis@example.com",
                "join_date": "2023-05-25"
            },
            {
                "member_id": "2023006",
                "member_name": "David Evans",
                "phone_number": "081234567845",
                "email": "david.evans@example.com",
                "join_date": "2023-06-30"
            },
            {
                "member_id": "2023007",
                "member_name": "Eve Foster",
                "phone_number": "081234598734",
                "email": "eve.foster@example.com",
                "join_date": "2023-07-18"
            },
            {
                "member_id": "2023008",
                "member_name": "Frank Green",
                "phone_number": "081234567891",
                "email": "frank.green@example.com",
                "join_date": "2023-08-22"
            },
            {
                "member_id": "2023009",
                "member_name": "Grace Hill",
                "phone_number": "081234598756",
                "email": "grace.hill@example.com",
                "join_date": "2023-09-14"
            },
            {
                "member_id": "2023010",
                "member_name": "Hannah Ivy",
                "phone_number": "081234567823",
                "email": "hannah.ivy@example.com",
                "join_date": "2023-10-05"
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
         "member_id": "2023011",
         "member_name": "Raplh Lauren",
         "phone_number": "081432765090",
         "email": "raplh.lauren@example.com",
         "join_date": "2023-01-01"
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
         "member_id": "2023011",
         "member_name": "Aurelia Laura",
         "phone_number": "081432765090",
         "email": "aurelia.laura@example.com",
         "join_date": "2023-01-01"
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
         "member_id": "2023011"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Delete success"
     }
     ```

### Manajemen Produk
**URL:** http://localhost/uas-kasir-backend/api/products

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
                "product_id": "124001",
                "product_name": "Rice",
                "price": "50000.00",
                "stock": "100"
            },
            {
                "product_id": "124002",
                "product_name": "Cooking Oil",
                "price": "30000.00",
                "stock": "200"
            },
            {
                "product_id": "124003",
                "product_name": "Sugar",
                "price": "25000.00",
                "stock": "150"
            },
            {
                "product_id": "124004",
                "product_name": "Shampoo",
                "price": "15000.00",
                "stock": "75"
            },
            {
                "product_id": "124005",
                "product_name": "Toothpaste",
                "price": "10000.00",
                "stock": "50"
            },
            {
                "product_id": "124006",
                "product_name": "Detergent",
                "price": "20000.00",
                "stock": "60"
            },
            {
                "product_id": "124007",
                "product_name": "Dishwashing Liquid",
                "price": "18000.00",
                "stock": "80"
            },
            {
                "product_id": "124008",
                "product_name": "Bread",
                "price": "12000.00",
                "stock": "90"
            },
            {
                "product_id": "124009",
                "product_name": "Milk",
                "price": "15000.00",
                "stock": "110"
            },
            {
                "product_id": "124010",
                "product_name": "Coffee",
                "price": "20000.00",
                "stock": "120"
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
         "product_id": "124011",
         "product_name": "Soap",
         "price": "8000.00",
         "stock": "40"
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
         "product_id": "124011",
         "product_name": "Salt",
         "price": "8000.00",
         "stock": "40"
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
         "product_id": "124011"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Delete success"
     }
     ```

### Manajemen Penjualan
**URL:** http://localhost/uas-kasir-backend/api/sales

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
                "product_id": "124001",
                "member_id": "2023001",
                "sale_date": "2024-06-22 10:30:00",
                "quantity": "1",
                "selling_price": "50000.00",
                "total_price": "50000.00"
            },
            {
                "sales_id": "2",
                "product_id": "124002",
                "member_id": "2023002",
                "sale_date": "2024-06-22 11:00:00",
                "quantity": "2",
                "selling_price": "30000.00",
                "total_price": "60000.00"
            },
            {
                "sales_id": "3",
                "product_id": "124003",
                "member_id": "2023003",
                "sale_date": "2024-06-23 14:45:00",
                "quantity": "1",
                "selling_price": "25000.00",
                "total_price": "25000.00"
            },
            {
                "sales_id": "4",
                "product_id": "124004",
                "member_id": "2023004",
                "sale_date": "2024-06-23 15:00:00",
                "quantity": "1",
                "selling_price": "15000.00",
                "total_price": "15000.00"
            },
            {
                "sales_id": "5",
                "product_id": "124005",
                "member_id": "2023005",
                "sale_date": "2024-06-24 09:30:00",
                "quantity": "1",
                "selling_price": "10000.00",
                "total_price": "10000.00"
            },
            {
                "sales_id": "6",
                "product_id": "124006",
                "member_id": "2023006",
                "sale_date": "2024-06-24 10:45:00",
                "quantity": "1",
                "selling_price": "20000.00",
                "total_price": "20000.00"
            },
            {
                "sales_id": "7",
                "product_id": "124007",
                "member_id": "2023007",
                "sale_date": "2024-06-25 11:15:00",
                "quantity": "1",
                "selling_price": "18000.00",
                "total_price": "18000.00"
            },
            {
                "sales_id": "8",
                "product_id": "124008",
                "member_id": "2023008",
                "sale_date": "2024-06-25 12:30:00",
                "quantity": "2",
                "selling_price": "12000.00",
                "total_price": "24000.00"
            },
            {
                "sales_id": "9",
                "product_id": "124009",
                "member_id": "2023009",
                "sale_date": "2024-06-26 13:00:00",
                "quantity": "1",
                "selling_price": "15000.00",
                "total_price": "15000.00"
            },
            {
                "sales_id": "10",
                "product_id": "124010",
                "member_id": "2023010",
                "sale_date": "2024-06-26 14:30:00",
                "quantity": "1",
                "selling_price": "20000.00",
                "total_price": "20000.00"
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
         "sales_id": "11",
         "product_id": "124011",
         "member_id": "2023011",
         "sale_date": "2024-06-22 10:30:00",
         "quantity": "2",
         "selling_price": "8000.00",
         "total_price": "16000.00"
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
         "sales_id": "11"
     }
     ```
   - **Tanggapan:**
     ```json
     {
         "message": "Delete success"
     }
     ```

## 🔍 Refleksi Diri terhadap Proyek Pengembangan Aplikasi Kasir Sederhana

Dalam proses pengembangan aplikasi kasir sederhana ini, terdapat beberapa tantangan dan kesulitan yang saya hadapi, serta berbagai strategi yang saya gunakan untuk mengatasinya.

### Tantangan dan Kesulitan

1. **Desain Arsitektur dan Pemisahan Tanggung Jawab**
   - **Tantangan**: Merancang struktur proyek yang modular dan mudah dikelola membutuhkan banyak pertimbangan, terutama dalam hal pemisahan tanggung jawab antar komponen (controller, model, service).
   - **Cara Mengatasi**: Saya memutuskan untuk menerapkan pola arsitektur MVC (Model-View-Controller) yang jelas dan terstruktur. Ini membantu menjaga agar setiap komponen memiliki tanggung jawab spesifik dan meminimalkan keterikatan antara bagian-bagian yang berbeda dari kode.

2. **Pengelolaan Koneksi Database**
   - **Tantangan**: Mengatur koneksi database yang aman dan efisien merupakan tantangan, terutama dalam hal mengelola konfigurasi dan koneksi ulang.
   - **Cara Mengatasi**: Saya menggunakan file `.env` untuk menyimpan konfigurasi lingkungan secara aman. Selain itu, saya merancang kelas `Database` dengan metode `getConnection()` yang memastikan hanya satu koneksi yang aktif pada satu waktu, yang membantu mengurangi beban pada server database.

3. **Penulisan Ulang URL dengan `.htaccess`**
   - **Tantangan**: Mengkonfigurasi penulisan ulang URL untuk mengarahkan semua permintaan melalui satu titik masuk (`app.php`) tidaklah mudah, terutama dalam menangani berbagai skenario permintaan.
   - **Cara Mengatasi**: Saya mempelajari dokumentasi `.htaccess` dan melakukan beberapa percobaan hingga menemukan aturan yang tepat untuk mengarahkan semua permintaan ke `app.php` tanpa mengganggu akses ke file dan direktori statis.

4. **Validasi dan Sanitasi Input**
   - **Tantangan**: Menangani validasi dan sanitasi input pengguna untuk mencegah SQL injection dan serangan XSS merupakan aspek kritis dalam pengembangan aplikasi web.
   - **Cara Mengatasi**: Saya menggunakan PDO dengan prepared statements untuk menghindari SQL injection. Selain itu, saya menambahkan lapisan validasi di tingkat service untuk memastikan bahwa semua input yang diterima sesuai dengan kriteria yang diharapkan sebelum diteruskan ke model.

5. **Pengujian dan Debugging**
   - **Tantangan**: Mengidentifikasi dan memperbaiki bug, serta memastikan bahwa semua fungsionalitas bekerja sebagaimana mestinya, merupakan proses yang memakan waktu dan menantang.
   - **Cara Mengatasi**: Saya menerapkan pengujian unit pada metode-metode kunci di service dan model. Selain itu, saya menggunakan alat debugging PHP dan menambahkan log pada titik-titik penting dalam aplikasi untuk memudahkan identifikasi masalah.

6. **Performance dan Scalability**
   - **Tantangan**: Memastikan aplikasi berjalan efisien dan dapat diskalakan untuk menangani jumlah pengguna yang banyak.
   - **Cara Mengatasi**: Saya merancang aplikasi dengan prinsip-prinsip terbaik dalam pengelolaan resource, seperti menggunakan koneksi database yang efisien dan mengoptimalkan query SQL. Selain itu, saya mempertimbangkan penggunaan caching untuk mengurangi beban pada database.

### Pembelajaran dan Pengembangan Diri

Selama proses pengembangan ini, saya banyak belajar tentang pentingnya perencanaan yang matang dan desain arsitektur yang baik. Saya juga menyadari bahwa pengelolaan konfigurasi lingkungan dan keamanan aplikasi merupakan aspek yang sangat penting yang tidak boleh diabaikan. Selain itu, saya mendapatkan pengalaman berharga dalam menggunakan berbagai alat dan teknik untuk pengujian dan debugging, yang sangat membantu dalam memastikan kualitas dan stabilitas aplikasi.

Ke depannya, saya berharap dapat menerapkan pengalaman dan pengetahuan yang saya peroleh dari proyek ini untuk proyek-proyek lainnya, serta terus mengembangkan keterampilan saya dalam pengembangan aplikasi web yang lebih kompleks dan canggih.


*Galang Buana*
