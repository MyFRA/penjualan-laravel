# Penjualan Laravel
<br>
 <p align="center">
 <a href="https://ibb.co/wLtMZXx"><img src="https://i.ibb.co/3sKB5qL/dashboard.png" alt="dashboard" border="0"></a>
 </p>

 <br /> 

## Fitur

- Multi user ( Pengguna ).
- Karena, menggunakan konsep tim / kelompok, maka terdapat fitur keanggotaan, yang memiliki hak akses masing masing.
- Role = Pemilik, Administrator, Anggota
- Cocok untuk pemilik usaha reseller
- Untuk Menambahkan anggota ke dalam kelompok/tim/perusahaan, menggunakan token invite link, seperti invite group whatsapp.
-dan masih terdapat beberapa fitur lainya.

## Kekurangan

- masih banyak kekurangan.
- Masih dalam tahap pengembangan, dan entah kapan mau dilanjut.



## Framework

- Laravel



## Screenshoots

 <p align="center">
<a href="https://ibb.co/Gp9q8s9"><img src="https://i.ibb.co/sRCZN5C/keranjang.png" alt="keranjang" border="0"></a>
<br><br>
<a href="https://ibb.co/XF4jRGt"><img src="https://i.ibb.co/YfWPsVh/checkout.png" alt="checkout" border="0"></a>
<br><br>
<a href="https://ibb.co/JdWcT7Z"><img src="https://i.ibb.co/z5WmgRd/kas.png" alt="kas" border="0"></a>

</p>

## Instalasi

Clone atau download repository

`$ git clone https://github.com/MyFRA/penjualan-laravel.git`

Duplikat atau salin file .env.example ke .env

Setting koneksi database di dalam file .env
Setelah itu jalankan perintah berikut.

`$ composer install` <br>
`$ php artisan key:generate` <br>
`$ php artisan migrate` <br>
`$ php artisan db:seed` <br>
`$ php artisan storage:link`

Agar fitur cek ongkir berjalan lancar, masukan key api rajaongkir, di dalam file .env
<p align="center">
<a href="https://ibb.co/LzX89PH"><img src="https://i.ibb.co/0jRcYXv/rajaongkir.png" alt="rajaongkir" border="0"></a>
</p>


## Menjalankan

`$ php artisan serve`
<br><br>
