## 🛍️ Filament-Ecommerce

**Filament-Ecommerce** adalah aplikasi e-commerce sederhana berbasis Laravel dengan admin panel yang dibangun menggunakan [FilamentPHP](https://filamentphp.com/). Proyek ini dirancang untuk menjadi solusi ringan dan fleksibel dalam mengelola produk, kategori, pesanan, dan pengguna melalui antarmuka admin yang modern dan intuitif.

### ✨ Fitur Utama
- 🔐 Otentikasi pengguna
- 🧾 Manajemen produk dan kategori
- 📦 Pengelolaan stok dan inventaris
- 🛒 Proses checkout dan riwayat pesanan
- 🎨 Antarmuka admin menggunakan FilamentPHP
- 📁 Media upload untuk gambar produk

### 🛠️ Teknologi yang Digunakan
- Laravel 10+
- FilamentPHP v3
- Livewire
- TailwindCSS

### 🚀 Instalasi Cepat

```bash
git clone https://github.com/khoirulmustofa/Filament-Ecommerce.git
cd filament-ecommerce
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Login admin (default):
- Email: `admin@gmail.com`
- Password: `password`

### 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---


```php

php artisan make:seed

```

```php

php artisan migrate:fresh --seed

```


```php

php artisan storage:link

```

```php

php artisan config:clear
php artisan route:clear

```