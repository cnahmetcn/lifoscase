# Lifos Yazılım Case Study

## Proje Hakkında
Bu proje gider takibinin yapıldığı, giderlerin ne zaman ve nerede harcandığı bilgisinin tutulduğu bir projedir.

## Projeyi yükleme ve çalıştırma
- git clone https://github.com/cnahmetcn/lifoscase.git
- cp .env.example .env
- php artisan key:generate
- Mysql veritabanında bir db oluşturup env dosyasında düzenleyin
- php artisan migrate
- php artisan db:seed
- php artisan serve

*****
- Bu projede Google Maps JS API kullanılmıştır ayrıca Places API entegre edilmiştir. 

## Görseller

### Gider Listeleme Ekranı
![Gider Listeleme Ekranı](/images/listeleme.png)

### Herhangi Bir Gideri Görüntüleme
![Herhangi Bir Gideri Görüntüleme](/images/görüntüleme.PNG)

### Yeni Gider Ekleme
![Yeni Gider Ekleme](/images/yeniekleme.png)

### Herhangi Bir Gideri Düzenleme
![Herhangi Bir Gideri Düzenleme](/images/düzenleme.png)

### Kategori Listeleme
![Kategori Listeleme](/images/kategorirapor.png)

### Haritada Gösterme
![Haritada Gösterme](/images/harita.png)
