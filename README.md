
## **Veritabanı Kurulumu** 🗄️

Eğer veritabanınızı manuel olarak kurmak istiyorsanız, aşağıdaki adımları izleyebilirsiniz:

### 1. Veritabanı Yedeklemesi:
Veritabanını dışa aktarmak için, `qr-menu-script.sql` dosyasını kullanabilirsiniz. Bu dosya, veritabanınızın yapısını ve içeriğini içerir.

### 2. **Veritabanı Yedekleme Adımları**:

1. **Veritabanını Yükleyin**:
   Veritabanı yedeğinizi yüklemek için, dışa aktardığınız `.sql` dosyasını kullanın.

   Eğer **phpMyAdmin** kullanıyorsanız:
   - phpMyAdmin’e giriş yapın.
   - Yeni bir veritabanı oluşturun (adı `qr-menu-script` olacak şekilde).
   - **Import** (İçe Aktar) sekmesine tıklayın ve `qr-menu-script.sql` dosyasını seçin.

   Eğer **MySQL Komut Satırı** kullanıyorsanız:
   ```bash
   mysql -u [kullanıcı_adınız] -p qr-menu-script < qr-menu-script.sql
   ```

2. **Veritabanı Yapısını Kontrol Edin**:
   Veritabanınız yüklendikten sonra, gerekli tabloların ve verilerin bulunduğundan emin olun.

---

### 3. **README Dosyanızın Tam Hali**

README dosyanızda, yukarıdaki veritabanı dışa aktarma adımlarını şu şekilde güncelleyebilirsiniz:

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
git clone https://github.com/kullanıcı-adınız/Basic-Qr-Menu-Script.git
```

#### 2.2. **Composer Paketlerini Yükleyin**:
```bash
cd Basic-Qr-Menu-Script
composer install
```

#### 2.3. **Veritabanı Yedekleme ve Kurulum**:
Veritabanınızı yüklemek için, `qr-menu-script.sql` dosyasını kullanabilirsiniz.

1. **phpMyAdmin Kullanıyorsanız**:
   - phpMyAdmin’e giriş yapın ve yeni bir veritabanı oluşturun (adı `qr-menu-script` olacak şekilde).
   - **Import** sekmesine tıklayın ve `qr-menu-script.sql` dosyasını seçin.
   
2. **MySQL Komut Satırı Kullanıyorsanız**:
   ```bash
   mysql -u [kullanıcı_adınız] -p qr-menu-script < qr-menu-script.sql
   ```

#### 2.4. **Laravel'in Geliştirme Sunucusunu Başlatın**:
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

## **Katkıda Bulunma** 🌟

Eğer projeye katkıda bulunmak isterseniz, aşağıdaki adımları takip edebilirsiniz:

1. Bu depoyu çatallayın (fork).
2. Geliştirmelerinizi kendi depo kopyanızda yapın.
3. Değişikliklerinizi bir pull request olarak gönderin.

---

## **Lisans** 📄

Bu proje **MIT Lisansı** altında lisanslanmıştır.
---
