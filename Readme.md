# Official Sendmantic PHP Library

## Install
```php
composer require "sendmantic/sendmantic"
```

## Cara menggunakan
pastikan anda sudah terdaftar di www.sendmantic.com
lalu dapatkan apikey http://doc.sendmantic.my.id/#mendapatkan-api-key
anda bisa pelajari lengkapnya di http://doc.sendmantic.my.id/

```php
use Sendmantic\Sendmantic;

$apikey = 'apikey anda disini';
$sendmantic = new Sendmantic($apikey);

// get infopaket
$pakets= $sendmantic->paketinfo();
print_r($pakets);

// kirim pesan SMS
$r= $sendmantic->kirimSMS('0812xxxxxxxx','contohPesan');
print_r($r);

// kirim pesan SMS terjadwal
$r= $sendmantic->kirimSMS('0812xxxxxxxx','contohPesan','2020-01-10 21:03:01');
print_r($r);

// hitung jumlah pesan 
echo $sendmantic->hitungPesanSMS('Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis optio ipsa iusto nesciunt ratione unde in cumque, numquam officiis obcaecati totam fugiat harum fuga nisi nulla beatae modi a sunt!');


```




made with 💗 

