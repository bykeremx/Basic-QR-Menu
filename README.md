<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
Tabii, işte PHP Laravel ile yazdığınız **QR Menü Scripti** için şık ve açıklayıcı bir **README** dosyası önerisi:

---

# **Basic-Qr-Menu-Script** 🛒📱

QR Kod tabanlı dijital menü sistemi, restoranlar için geliştirilmiş modern bir çözümdür. Bu proje, Laravel PHP framework'ü kullanılarak oluşturulmuştur ve kullanıcıların QR kodları tarayarak dijital menülerine erişebilmelerini sağlar. Admin paneli ile menü yönetimi, kategori düzenlemeleri ve ürün eklemeleri kolayca yapılabilir.

---

## **Özellikler** 🚀

- **QR Menü**: Müşteriler, QR kodları tarayarak dijital menüye erişebilirler.
- **Admin Paneli**: Menüler, kategoriler ve ürünler yönetilebilir.
- **Kategori Yönetimi**: Ürünleri kategoriler halinde düzenleme imkanı.
- **Ürün Ekleme / Güncelleme**: Admin paneli üzerinden ürün ekleyebilir veya mevcut ürünleri güncelleyebilirsiniz.
- **Responsive Tasarım**: Menü, her tür cihazda (mobil, tablet, masaüstü) uyumlu olarak görüntülenebilir.
- **Kolay Kurulum**: Laravel projesi kolayca kurulur ve çalıştırılır.

---

## **Kurulum** 🛠️

### 1. **Gereksinimler**:
- PHP 7.3 veya daha yeni bir sürüm
- Composer
- MySQL veya SQLite (Veritabanı)
- Laravel 8.x veya daha yeni sürüm

### 2. **Proje Kurulumu**:

#### 2.1. **Depoyu Klonlayın**:
```bash
git clone https://github.com/bykeremx/Basic-Qr-Menu-Script.git
```

#### 2.2. **Composer Paketlerini Yükleyin**:
```bash
cd Basic-Qr-Menu-Script
composer install
```

#### 2.3. **Env Dosyasını Düzenleyin**:
Projenin kök dizininde `.env` dosyasını oluşturun ve veritabanı ayarlarını yapılandırın:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qr_menu_db
DB_USERNAME=root
DB_PASSWORD=
```

#### 2.4. **Veritabanı Migrasyonlarını Çalıştırın**:
```bash
php artisan migrate
```

#### 2.5. **Laravel'in Geliştirme Sunucusunu Başlatın**:
```bash
php artisan serve
```

---

## **Kullanım** 💻

1. **Admin Paneline Giriş**: `http://localhost:8000/admin` adresine gidin ve giriş yapın. Admin kullanıcı adı ve şifresiyle giriş yaptıktan sonra menü ve ürünleri yönetebilirsiniz.

2. **QR Kodları Oluşturma**: Admin paneli üzerinden menü eklediğinizde, her bir menü için bir QR kodu otomatik olarak oluşturulacaktır.

3. **Kullanıcı Menüsü**: Müşteriler QR kodunu tarayarak menüye erişebilir ve ürünleri görüntüleyebilir.

---

## **Özelleştirme** ⚙️

- **Menü Tasarımı**: Menü sayfasının görünümünü `resources/views` dizininde bulunan Blade şablonlarını düzenleyerek özelleştirebilirsiniz.
- **Admin Paneli**: Admin paneli üzerinden menü ve kategori düzenlemelerini kolayca yapabilirsiniz. Admin paneli kullanıcı rolü yönetimini `app/Models/User.php` dosyasından yapılandırabilirsiniz.

---

## **Ekran Görüntüleri** 📸

![QR Menü](https://via.placeholder.com/800x400.png?text=QR+Menu+Ekran+Görseli)
*QR Menü Kullanıcı Görünümü*

![Admin Paneli](https://via.placeholder.com/800x400.png?text=Admin+Paneli+Ekran+Görseli)
*Admin Paneli Görünümü*

---

## **Katkıda Bulunma** 🌟

Eğer projeye katkıda bulunmak isterseniz, aşağıdaki adımları takip edebilirsiniz:

1. Bu depoyu çatallayın (fork).
2. Geliştirmelerinizi kendi depo kopyanızda yapın.
3. Değişikliklerinizi bir pull request olarak gönderin.

---

## **Lisans** 📄

Bu proje **MIT Lisansı** altında lisanslanmıştır.

---


