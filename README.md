# CandyCBT v2.8-r3

CandyCBT adalah Aplikasi untuk ujian PTS/PAS/PAT dst, berbasis komputer ataupun smartphone. Bertujuan untuk melatih siswa agar terbiasa menggunakan metode test berbasis komputer atau smartphone.

Informasi lebih lanjut, silahkan klik [tautan](http://candycbt.id/) berikut ini. Atau gabung diskusi di grup [telegram](https://t.me/joinchat/F8fX-xHSUuvhjNbdy-kX7g).

---

## Daftar isi
* [Ketergantungan Aplikasi](#ketergantungan)
  - [Laragon](#laragon)
  - [Apache](#apache)
  - [PHP](#php)
  - [MySQL/MariaDB](#mysql-or-mariadb)
  - [nginx](#nginx)
* [Prasyarat](#prasyarat)
  - [Hardware](#hardware)
  - [Software](#software)
* [Pemasangan](#pemasangan)
  - [Aplikasi Laragon](#aplikasi-laragon)
    - [Tutorial Laragon](#tutorial-laragon)
  - [Runtime Environment](#runtime-environment)
    - [VC Redist](#vc-redist)
    - [Net.Framework](#netframework)
  - [CandyCBT](#instalasi-candycbt)
* [Troubleshooting](#troubleshooting)
  - [Pada Laragon](#pada-laragon)
  - [Pada CandyCBT](#pada-candycbt)
* [Tambahan](#tambahan)
  - [Komponen Laragon](#komponen-laragon)
  - [Struktur folder pada laragon](#struktur-folder-pada-laragon)
  - [Integrasi Komponen](#integrasi-komponen)

---

## KETERGANTUNGAN
### Laragon
Laragon adalah universal development environment untuk PHP, Node.js, Python, Java, Go, Ruby, yang portable, terisolasi, cepat, ringan, dan mudah dipakai. Laragon bisa dipakai sebagai pengganti XAMPP.

### Apache
Apache adalah salah satu web server terpopuler yang memungkinkan Anda untuk menjalankan website dengan aman tanpa banyak masalah. Apache lebih banyak digunakan oleh pemilik satu website dan pemilik bisnis kecil serta sederhana yang ingin menyetakan keberadaannya di dunia internet.

### PHP
PHP adalah bahasa pemrograman yang sering disisipkan ke dalam HTML. PHP sendiri berasal dari kata Hypertext Preprocessor. Sejarah PHP pada awalnya merupakan kependekan dari Personal Home Page (Situs personal). PHP pertama kali dibuat oleh Rasmus Lerdorf pada tahun 1995. Pada waktu itu PHP masih bernama Form Interpreted (FI), yang wujudnya berupa sekumpulan skrip yang digunakan untuk mengolah data formulir dari web.

### MySQL or MariaDB
MySQL adalah sistem manajemen database relasional open source (RDBMS) dengan client-server model. Sedangkan RDBMS merupakan software untuk membuat dan mengelola database berdasarkan pada model relasional.

MariaDB adalah sistem manajemen database relasional yang dikembangkan dari MySQL. MariaDB dikembangkan oleh komunitas pengembang yang sebelumnya berkontribusi untuk database MySQL.

### nginx
Nginx adalah web server yang cukup populer saat ini. Selain memberikan performa yang andal, Nginx juga mempunyai beberapa fitur canggih lain yang mudah dikonfigurasi. Jadi tentu saja akan membuat website Anda lebih powerful dan canggih.

---

## PRASYARAT
### HARDWARE
Minimal Spesifikasi Server :
- PC berjenis Tower atau Desktop
- Intel Core i3/AMD A9 2.5GHz dengan 2/4 Core atau lebih tinggi
- 4GB RAM DDR3-2133/DDR4-2400 dual-channel Non-ECC/ECC
- 120GB SSD SATA/NVMe/M.2 untuk system
- 500GB SSHD untuk penyimpanan
- 2/3 NIC dengan dukungan Gigabit
- WiFi Adapter 2.4GHz / 5Ghz *(opsional)*
- Windows 10 (semua versi) atau Windows Server 2012 x64

Hampir semua distro Linux dapat menjalankan aplikasi ini
dengan dasar paket `apache`, `PHP` dan `mysql` atau
sejenis `LAMP Stack` telah terpasang pada sistem. Baca lebih lanjut mengenai [LAMP](https://www.ostechnix.com/install-apache-mysql-php-lamp-stack-on-ubuntu-18-04-lts/) di Linux

```
Spesifikasi diatas sebagai bahan dasar acuan, tidak menutup
kemungkinan dapat bekerja pada perangkat tertentu dan
hasil yang diperoleh saat pelaksanaan dapat berbeda-beda
sesuai dengan kondisi di lapangan.
```

### SOFTWARE
Banyak pembahasan mengenai pemilihan lingkungan pengembangan *(Development Environment)* pada `Windows` terutama untuk aplikasi berbasis webserver seperti halnya `xampp, wampserver, ampps, lampp dst`. Laragon, seperti halnya pengguna `xampp`, ini dikembangkan sebagai alternatif pengganti xampp.

Dengan dasar kemudahan penggunaan `Easy Operation` serta foldernya dapat dipindah-pidah sesuai dengan keinginan tanpa harus merusak sistem didalamnya `isolated` menjadikan laragon sebagai pilihan yang tepat untuk saat ini.

Mungkin anda perlu memasang `run-time component` yang dibutuhkan untuk dapat menjalankan `Apache` atau `PHP` seperti `VisualC++ Redist` dan `Net.Framework`

---

## PEMASANGAN
### Aplikasi Laragon
Laragon saat ini **hanya** tersedia untuk `Windows` berada pada versi rilis `4.0` dan memiliki beberapa edisi seperti `Full`, `Lite` dan `Portable`

| Edisi | Deskripsi | Link | Ukuran berkas |
|--|--|--|--|
| Full | Apache 2.4, Nginx, MySQL 5.7, PHP 7.2, Redis, Memcached, Node.js 11, npm, yarn, git,… | [Unduh](https://sourceforge.net/projects/laragon/files/releases/4.0/laragon-full.exe) | **130MB** |
| Lite | *Tidak termasuk* Node.js 11, npm, yarn, git tapi anda bisa menambahkan `add` komponen tersebut kemudian melalui `Tools > Quick add` | [Unduh](https://sourceforge.net/projects/laragon/files/releases/4.0/laragon-wamp.exe) | **85MB** |
| Portable | PHP 5.4, MySQL 5.1. Pilihan yang tepat untuk mengembangkan `PHP`, komponen seperti `PHP/MySQL` dapat ditambahkan kemudian | [Unduh](https://sourceforge.net/projects/laragon/files/Portable/laragon.7z) | **18MB** |

Anda juga dapat menemukan unduhan laragon di [Github](https://github.com/leokhoa/laragon/releases)

#### TUTORIAL LARAGON
- Menambahkan versi lain dari [`PHP`](https://forum.laragon.org/topic/166/tutorial-how-to-add-another-php-version)
- Menambahkan versi lain dari [`Apache`](https://forum.laragon.org/topic/165/tutorial-how-to-add-another-apache-version)
- Menambahkan versi lain dari [`MySQL`](https://forum.laragon.org/topic/164/tutorial-how-to-add-another-mysql-version)
- Cara Install [`Oracle OCI extensi`](https://forum.laragon.org/topic/607/tutorial-how-to-install-php-s-oracle-oci-extension) pada PHP
- Cara Install ekstensi [`MongoDB`](https://forum.laragon.org/topic/172/tutorial-how-to-install-mongodb-extension)

### Runtime Environment
Agar laragon dapat berfungsi dengan optimal maka dibutuhkan `runtime environment` seperti `VisualC++ Redist` juga `Net.Framework`
#### VC Redist
| Versi | Arsitekur | Link |
|--|--|--|
| 2019 | x86/x64 | [x86](https://aka.ms/vs/16/release/VC_redist.x86.exe) - [x64](https://aka.ms/vs/16/release/VC_redist.x64.exe) |
| 2017 | x86/x64 | [x86](https://go.microsoft.com/fwlink/?LinkId=746571) - [x64](https://go.microsoft.com/fwlink/?LinkId=746572) |
| 2015 | x86/x64 | [Unduh](https://www.microsoft.com/en-pk/download/details.aspx?id=48145) |
| 2013 | x86/x64 | [Unduh](https://support.microsoft.com/en-us/help/4032938/update-for-visual-c-2013-redistributable-package) |
| 2012 | x86/x64 | ~~Tidak tersedia~~ |
| 2010 | x86/x64 | [Unduh](http://www.microsoft.com/download/details.aspx?id=26999) |
| 2008 | x86/x64 | [Unduh](https://www.microsoft.com/en-us/download/details.aspx?id=26368) |
| 2005 | x86/x64 | ~~Tidak tersedia~~ |

#### Net.Framework
| Versi | Link | Versi | Link | Versi | Link |
|--|--|--|--|--|--|
| 1.0 | [Unduh](https://www.microsoft.com/en-pk/download/details.aspx?id=96) | 4.0 | [Unduh](https://www.microsoft.com/en-US/Download/confirmation.aspx?id=17718) | 4.7.1 | [Unduh](https://www.microsoft.com/en-us/download/details.aspx?id=56116) |
| 1.0 SP3 | [Unduh](https://www.microsoft.com/en-pk/download/details.aspx?id=13181) | 4.5 | [Unduh](https://www.microsoft.com/en-eg/download/details.aspx?id=30653) | 4.7.2 | [Unduh](https://dotnet.microsoft.com/download/thank-you/net472-offline) |
| 1.1 | [Unduh](https://www.microsoft.com/en-us/download/details.aspx?id=26) | 4.5.1 | [Unduh](https://www.microsoft.com/en-pk/download/details.aspx?id=40779) | 4.8 | [Unduh](https://dotnet.microsoft.com/download/thank-you/net48-offline) |
| 1.1 SP1 | [Unduh](https://www.microsoft.com/en-us/download/details.aspx?id=33) | 4.5.2 | [Unduh](http://go.microsoft.com/fwlink/?LinkId=328856) |
| 2.0 | [Unduh](https://www.microsoft.com/en-pk/download/details.aspx?id=6523) | 4.6 | [Unduh](https://www.microsoft.com/en-pk/download/details.aspx?id=48137&Search=true) |
| 2.0 SP2 | [Unduh](https://www.microsoft.com/en-pk/download/details.aspx?id=1639) | 4.6.1 | [Unduh](https://www.microsoft.com/en-us/download/details.aspx?id=49982) |
| 3.0 | ~~Tidak tersedia~~ | 4.6.2 | [Unduh](https://www.microsoft.com/en-us/download/details.aspx?id=53344) |
| 3.5 | [Unduh](https://www.microsoft.com/en-pk/download/details.aspx?id=21) | 4.7 | [Unduh](https://dotnet.microsoft.com/download/thank-you/net47-offline) |

`VisualC++ Redist` atau pun `Net.Framework` **Tidak harus** dipasang semua pada sistem perangkat, pilihlah `versi` dari `VisualC++` maupun `Net.Framework` sesuai yang dibutuhkan sistem.

### Instalasi CandyCBT
ketika semua program yang dibutuhkan diatas seperti `laragon` serta paket pendukung `VCC++ Redist` ataupun `Net.Framework` berhasil di pasang pada sistem, saatnya sekarang untuk mengapilkasikan `CandyCBT` pada direktori `www` di laragon.

Pemasangannya sederhana, untuk versi `snapshot` atau `nightly` cukup unduh paket `ZIP` candycbt melaui tombol `Clone or download` pada tampilan repository candycbt, lalu pilih `Download as ZIP` dengan otomatis akan mengunduh paket berektensi zip atau gunakan [tautan](https://github.com/ryuffhant/candycbt/archive/v2.8.zip) berikut.

Saat paket `ZIP` berhasil di unduh, `extract` semua konten didalamnya kemudian pindahkan hasil konten yang telah di `extract` kedalam folder `www` pada folder `laragon` lanjutkan dengan `start all` pada laragon dan cobalah akses [localhost](http://localhost) atau [localhost:8080](http://localhost:8080) pada browser.

>CandyCBT mendukung Apache dan PHP terbaru. Versi stabil yang dapat digunakan `MySQL` yakni `5.6.45` tersedia pula untuk binari windows, sedangkan `mariaDB` stabil berada di versi `10.1.41` dan `PHP` terbaru saat ini berada pada versi `7.3 VC15` berjalan pada server `Apache` versi `2.4.41 VS16` kompatibel dengan `VC15/VC14` untuk versi `PHP` pada sistem operasi windows.

```
Gunakan MySQL Versi 5.6.45 atau MariaDB 10.1.41
agar candycbt berfungsi dengan optimal
Untuk PHP & Apache dapat menggunakan versi terbaru
```

---
## TROUBLESHOOTING
### Pada Laragon
`membersihkan database` hapus semua *file* atau *folder* yang tersimpan dalam folder `laragon\data\*` maupun di `laragon\tmp\xdebug\*` juga `laragon\tmp\*` dalam keadaan aplikasi laragon `dihentikan`.

```
PENTING!

Lakukan proses backup
sebelum membersihkan database pada laragon

Karena dengan membersihkan database akan menghapus
semua database terkait yang tersimpan dari laragon
```

### Pada CandyCBT
Terkadang database tidak bisa di `import` pada setup pertama kali setelah `buat` database melalui halaman utama candycbt. Jika hal tersebut terjadi, buka `laragon` > `Start all` lalu pilih `menu` > `MySQL` atau `MariaDB` gunakan `heidisql` atau `phpmyadmin` untuk pembuatan database.

Buat database awal dengan nama `cbtcandy` lalu `import` file `SQL` yang tersimpan dalam folder `\www\candycbt\config\cbtcandy.sql` tunggu hingga proses `import` selesai. Jika telah selesai silahkan `reload` halaman muka, jika masih diarahkan pada `halaman pembuatan database` silahkan ulangi langkah dalam pembuatan `database`

---

## TAMBAHAN
Komponen pada laragon dapat di integrasikan dengan versi paket yang berbeda-beda sehingga meningkatkan kompabilitas terhadap aplikasi yang sedang dikembangkan. Setiap komponen yang bertautan seperti `PHP` dengan versi tertentu pada Windows akan membutuhkan `apache` dengan versi yang sesuai agar dapat bekerja.
### Komponen Laragon
| Params | Path Install | Component | Download |
|--|--|--|--|
| [pkg_name_ver] | laragon/bin | Apache | [Link](https://www.apachelounge.com/download/) |
| [placed_here] | -- | Git | [Link](https://github.com/git-for-windows/git/releases) |
| [placed_here] | -- | heidisql | [Link](https://www.heidisql.com/download.php) |
| [pkg_name_ver] | -- | MongoDB | [Link](https://www.mongodb.com/download-center/community) |
| [pkg_name_ver] | -- | MySQL | [Link](https://dev.mysql.com/downloads/mysql/?) |
| [pkg_name_ver] | -- | mariaDB | [Link](https://downloads.mariadb.org/mariadb/) |
| [pkg_name_ver] | -- | nginx | [Link](https://nginx.org/en/download.html) |
| [placed_here] | -- | ngrok | [Link](https://ngrok.com/download) |
| [pkg_name_ver] | -- | NodeJS | [Link](https://nodejs.org/dist/) |
| [placed_here] | -- | Notepad++ | [Link](http://download.notepad-plus-plus.org/repository/) |
| [pkg_name_ver] | -- | PHP | [Link](https://windows.php.net/download/) |
| [pkg_name_ver] | -- | Postgresql | [Link](https://www.postgresql.org/ftp/pgadmin/pgadmin4/) |
| [placed_here] | -- | PuTTY | [Link](https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html) |
| [placed_here] | -- | WinSCP | [Link](https://winscp.net/eng/downloads.php) |
| [pkg_name_ver] | -- | yarn | [Link](https://yarnpkg.com/lang/en/docs/install/#windows-stable) |
| [placed_here] | laragon/etc/apps | Adminer | [link](https://www.adminer.org/#download) |
| [pkg_name_ver] | -- | phpMyAdmin | [Link](https://www.phpmyadmin.net/downloads/) |

### Struktur folder pada laragon
```
`-- laragon
	|
	|-- bin
	|	|
	|	|-- apache
	|	|	`-- {pkg_name_ver}
	|	|
	|	|-- git
	|	|	`-- {placed_here}
	|	|
	|	|-- heidisql
	|	|	`-- {placed_here}
	|	|
	|	|-- mongodb
	|	|	`-- {pkg_name_ver}
	|	|
	|	|-- mysql
	|	|	`-- {pkg_name_ver}
	|	|
	|	|-- nginx
	|	|	`-- {pkg_name_ver}
	|	|
	|	|-- ngrok
	|	|	`-- {placed_here}
	|	|
	|	|-- nodejs
	|	|	`-- {pkg_name_ver}
	|	|
	|	|-- notepad++
	|	|	`-- {placed_here}
	|	|
	|	|-- php
	|	|	`-- {pkg_name_ver}
	|	|
	|	|-- postgresql
	|	|	`-- {pkg_name_ver}
	|	|
	|	|-- putty
	|	|	`-- {placed_here}
	|	|
	|	|-- winscp
	|	|	`-- {placed_here}
	|	|
	|	`-- yarn
	|		`-- {pkg_name_ver}
	|
	|-- etc
	|	`-- apps
	|	|	|-- adminer
	|	|	|	`-- {placed_here}
	|	|	|
	|	|	|-- phpmyadmin
	|	|	|	`-- {pkg_name_ver}
```

### Integrasi Komponen
Untuk tag `{pkg_name_ver}` salin beserta subfolder dalam paket `ZIP` tersebut, misalnya:
> ZIP binary dari apache `httpd-2.4.41-win64-VS16.zip` akan memiliki folder dengan nama `Apache24` saat di extract
kemudian **ubah nama** folder `Apache24` menjadi `httpd-2.4.41-win64-VS16` dan tempatkan dalam `laragon\bin\apache\*`

Namun untuk tag `{placed_here}` salin tanpa `subfolder` komponen tersebut

```
Untuk MySQL versi 8.0.17 masih terdapat bugs
sehingga riskan untuk digunakan pada laragon

Gunakan MySQL versi 5.7.27 atau mariaDB 10.4.8
```

---
[![windows](https://img.shields.io/badge/Windows%2010%20for%20Workstation-blue?logo=windows)](https://www.microsoft.com/en-us/software-download/windows10) [![laragon](https://img.shields.io/badge/Powered-Laragon-blue?logo=webpack)](https://github.com/leokhoa/laragon/releases) [![github](https://img.shields.io/badge/Hosted-Gitlab-orange?logo=gitlab)](https://gitlab.com)
