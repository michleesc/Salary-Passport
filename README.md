# Salary Passport

Selamat datang di proyek Salary Passport! Proyek ini adalah sebuah aplikasi berbasis Laravel yang menggunakan Laravel Passport untuk mengatur autentikasi API. Dalam proyek ini, Anda dapat menemukan panduan singkat tentang cara mengatur dan menjalankan proyek ini.

## Persyaratan

Sebelum Anda memulai, pastikan Anda memiliki hal-hal berikut diinstal di sistem Anda:

-   [PHP](https://php.net) (disarankan PHP 7.4 atau versi lebih baru)
-   [Composer](https://getcomposer.org)
-   [Git](https://git-scm.com)
-   [Postman](https://www.postman.com) (untuk menguji endpoint API)

## Struktur Database

Dalam proyek Salary Passport, struktur database terdiri dari dua tabel utama: `employees` dan `positions`. Berikut adalah rincian kolom-kolom dalam masing-masing tabel:

### Tabel `employees`

| Nama Kolom      | Tipe Data | Keterangan                             |
|-----------------|-----------|---------------------------------------|
| id              | int       | Kunci utama untuk identifikasi karyawan. |
| name            | string    | Nama lengkap karyawan.                |
| position_id     | int       | Kunci asing yang menghubungkan ke tabel positions. |

### Tabel `positions`

| Nama Kolom      | Tipe Data | Keterangan                             |
|-----------------|-----------|---------------------------------------|
| id              | int       | Kunci utama untuk identifikasi posisi.  |
| name            | string    | Nama posisi pekerjaan.                |
| salary          | double    | Besar gaji yang terkait dengan posisi. |

### Hubungan Antara Tabel

- Tabel `employees` memiliki kolom `position_id` yang merupakan kunci asing (foreign key) yang menghubungkan ke kolom `id` di tabel `positions`.

Struktur database ini memungkinkan Anda untuk mengelola informasi tentang karyawan (`employees`) dan posisi pekerjaan (`positions`) dalam aplikasi Salary Passport.

## Langkah-langkah Instalasi

1. **Clone Repositori**: Clone repositori ini ke komputer Anda menggunakan perintah berikut:

    ```sh
    git clone https://github.com/michleesc/Salary-Passport.git
    ```

2. **Instal Dependensi**: Masuk ke direktori proyek dan jalankan perintah composer untuk menginstal dependensi:

    ```sh
    cd Salary-Passport
    composer install
    ```

3. **Konfigurasi .env**: Salin berkas `.env.example` menjadi `.env` dan atur konfigurasi database dan pengaturan lain yang diperlukan:

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. **Migrasi Database**: Jalankan migrasi database untuk membuat tabel yang diperlukan:

    ```sh
    php artisan migrate
    ```

5. **Instal Passport**: Instal dan konfigurasi Laravel Passport:

    ```sh
    php artisan passport:install
    ```

6. **Jalankan Aplikasi**: Jalankan server pengembangan Laravel:

    ```sh
    php artisan serve
    ```

7. **Import Collection**: Impor koleksi Postman yang disertakan di direktori `postman` ke dalam Postman Anda. Koleksi ini berisi permintaan (requests) yang telah dikonfigurasi untuk menguji endpoint proyek ini.

## Pengujian dengan Postman

1. **Registrasi Pengguna**: Gunakan permintaan `Register User` pada folder `User` untuk membuat pengguna baru. Masukkan data yang diperlukan seperti nama, email, password, dan password_confirmation.

2. **Login**: Setelah registrasi, gunakan permintaan `Login User` pada folder `User` untuk masuk ke dalam aplikasi. Anda akan menerima token autentikasi yang dapat digunakan untuk permintaan lainnya.

3. **Menggunakan Token**: Setiap permintaan yang memerlukan autentikasi harus menyertakan header `Authorization` dengan nilai `Bearer [token]`, di mana `[token]` adalah token yang diterima saat login.

4. **Uji Endpoint User**: Pada folder `User`, Anda dapat menggunakan permintaan yang disediakan untuk menguji endpoint lain seperti mendapatkan data pengguna, dan melakukan logout.

5. **Uji Endpoint Position**: Pada folder `Position`, Anda dapat menggunakan permintaan yang disediakan untuk menguji endpoint CRUD pada tabel position.

6. **Uji Endpoint Employee**: Pada folder `Employee`, Anda dapat menggunakan permintaan yang disediakan untuk menguji endpoint CRUD pada tabel employee.

Terima kasih telah menggunakan Project ini!.