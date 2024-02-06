# DDL (Data Definition Language)

## 1. Permasalahan

Setelah kita merancang sebuah ERD, langkah selanjutnya yaitu mengimplementasikannya ke dalam database. Dengan menggunakan salah satu bentuk SQL yaitu menggunakan DDL (Data Definision Language), kita bisa mendefinisikan entitas dan juga atribut dari perancangan ERD yang telah dibuat.  

## 2. Penjelasan DDL (Data Definition Language)

DDL merupakan perintah SQL untuk menggambarkan desain dari database secara menyeluruh. DDL yang dimaksud di sini berfungsi untuk membuat, mengubah maupun menghapus database, tabel, atribut serta relasi antar tabel.

## 3. Penjelasan Detail tentang Tipe Data dan Perintah DDL

### 3.1 TIPE DATA

Tipe data digunakan untuk mendefinisikan tipe dari field atau kolom pada table. Ada beberapa tipe data yang paling sering digunakan, yaitu:

| Tipe Data         | Keterangan                                                                                              |
|-------------------|---------------------------------------------------------------------------------------------------------|
| int(M)            | nilai bilangan bulat (integer)                                                                          |
| float(M,D)        | nilai bilangan pecahan                                                                                  |
| date              | tanggal <br /> Format: YYYY-MM-DD                                                                       |
| datetime          | tanggal dan waktu <br /> Format: YYYY-MM-DD HH:MM:SS                                                    |
| char(M)           | String dengan panjang tetap sesuai dengan yang ditentukan. <br /> Panjangnya 1-255 karakter             |
| varchar(M)        | String dengan panjang yang berubah-ubah sesuai dengan yang disimpan saat itu. <br /> Panjangnya 1-255 karakter |

Contoh Penggunaan:
```mysql
INT(10) -> tipe datanya berupa integer dengan maksimal 10 digit angka.
CHAR(20) -> tipe datanya berupa char dengan maksimal 20 digit karakter.
```

### 3.2 CREATE

CREATE digunakan untuk membuat database maupun tabel. 
Untuk aturan penamaan database maupun tabel tidak boleh mengandung spasi dan juga nama database tidak boleh sama antar database.

<br /> Perintah untuk membuat suatu database seperti berikut: 
```mysql
CREATE DATABASE nama_database;
```
Perintah untuk membuat suatu table seperti berikut: 

```mysql
CREATE TABLE nama_tabel
(
    kolom_1 tipe_data(lebar),
    kolom_2 tipe_data(lebar),
    kolom_3 tipe_data(lebar)
)
```


### 3.3 ALTER

ALTER digunakan untuk mengubah nama atau struktur tabel seperti menambah, mengubah maupun menghapus kolom.

<br />
Perintah untuk menambah kolom pada sebuah table:

```mysql
ALTER TABLE nama_tabel ADD kolom_baru tipe_data(lebar);
```
Perintah untuk mengubah kolom pada sebuah table:
```mysql
ALTER TABLE nama_tabel CHANGE COLUMN nama_kolom_lama nama_kolom_baru type_data_baru(lebar_baru);
```

Perintah untuk mengubah lebar pada kolom atau tipe data pada sebuah table:
```mysql
ALTER TABLE nama_tabel MODIFY nama_kolom(lebar);
```

Perintah untuk menghapus kolom pada sebuah table:
```mysql
ALTER TABLE nama_tabel DROP COLUMN nama_kolom;
```

### 3.4 DROP

DROP digunakan untuk menghapus database atau tabel.

<br /> Perintah untuk menghapus suatu database seperti berikut: 
```mysql
DROP DATABASE nama_database;
```
Perintah untuk menghapus suatu table seperti berikut: 

```mysql
DROP TABLE nama_tabel;
```
## 4. Contoh Studi Kasus

Di bawah ini terdapat contoh ERD, yang dimana akan kita implementasikan ke dalam database.

![erd](https://user-images.githubusercontent.com/48237280/152759887-38630db0-9785-40dd-9e4d-556726aa6ed6.png)
### 4.1 Membuat Database

Membuat database terlebih dahulu dengan cara:

```mysql
CREATE DATABASE keanggotaan_wri;
```
Untuk penamaan database tidak harus sama.

### 4.2 Membuat Table miniclass
Untuk selanjutnya membuat table miniclass, dan juga disitu terdapat sebuah PRIMARY KEY yang digunakan untuk mengidentifikasi suatu baris(record) dalam tabel, dengan aturan tidak boleh bernilai NULL.
```mysql
CREATE TABLE miniclass(
    id_miniclass INT NOT NULL AUTO_INCREMENT,
    miniclass varchar(10),
    PRIMARY KEY (id_miniclass)
)
```

### 4.3 Membuat Table Anggota
Dikarekanan terdapat 2 tabel, langkah selanjutnya membuat table anggota:
```mysql
CREATE TABLE anggota(
    id_anggota INT NOT NULL AUTO_INCREMENT,
    nama_anggota varchar(150) NOT NULL, 
    no_telpon varchar(16) NOT NULL,
    angkatan INT NOT NULL,
    miniclass INT NOT NULL,
    PRIMARY KEY (id_anggota)
);
```

### 4.4 Memberikan relasi antar table
Untuk memberikan relasi antar table kita bisa menggunakan foreign key, yang dimana foreign key merupakan pengenal unik atau kombinasi pengenal unik yang menghubungkan dua tabel atau lebih dalam suatu database.

```mysql
ALTER TABLE anggota ADD FOREIGN KEY (miniclass) REFERENCES miniclass(id_miniclass);
```

### 4.5 Drop Table
Jika kalian ingin menghapus table, caranya seperti berikut:
```mysql
DROP TABLE nama_table_yang_ingin_dihapus;
```
