# **DPBO Tugas Praktikum 3**

##### **Nama : Muhammad Daffa Yusuf Fadhilah**

##### **NIM : 2100543**

Saya Muhammad Daffa Yusuf Fadhilah dengan NIM 2100543 mengerjakan evaluasi TP3
dalam mata kuliah Design Pemrograman Berorientasi Objek
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti
yang telah dispesifikasikan. Aamiin.

## **Design Program**

Terdapat beberapa file yang dibuat untuk membentuk program ini.

- **_classes_** Folder ini berisi tentang kelas-kelas berisi fungsi yang nantinya akan dipanggil untuk menggunakan templet/melakukan query database

  - **DB.php** menampung hal-hal mengenai melakukan koneksi pada database, melakukan query, dan menutup koneksi

  - **MataKuliah.php** menampung berbagai query untuk mengakses tabel `mata_kuliah` pada database

  - **TipeTugas.php** menampung berbagai query untuk mengakses tabel `tipe_tugas` pada database

  - **Todophp** menampung berbagai query untuk mengakses tabel `todo_list` pada database

- **_config_** hanyalah folder yang menampung configurasi database yang akan digunakan
- **_templates_** merupakan folder yang menyimpan berbagai templet html yang digunakan untuk menampilkan data

  - **skinmain.html** merupakan templet yang digunakan untuk menampilkan data dari `index.php` yang merupakan isi dari tabel `todo_list` pada database

  - **skintabledark.html** merupakan templet yang digunakan untuk menampilkan data dari `matkul.php` dan `tipetugas.php` yang merupakan isi dari tabel `mata_kuliah` dan `tipe_tugas` pada database

  - **skindetai.html** merupakan templet yang digunakan untuk menampilkan detai dari data pada tabel `todo_list` melalui `detai.php`

  - **skinindexedit.html** merupakan templet form yang akan digunakan dalam menambahkan/mengedit suatu data pada tabel `todo_list` melalui `AddTodo.php` dan `EditTodo.php`

  - **skintabeledit.html** merupakan templet form yang akan digunakan dalam menambahkan/mengedit suatu data pada tabel `mata_kuliah` dan `tipe_tugas` melalui `matkuladdit.php` dan `tipeaddit.php`

- **_Lainnya_** berikut kumpulan file php dalam melakukan pemprosesan utama.

  - **index.php** merupakan file yang mengambil data dari tabel `todo_list` dan ditampilkan menggunakan card. Dapat melakukan pencarian sekaligus pengurutan entri berdasarkan tanggal deadline terdekat. Pada bagian ini juga dapat memanggil fungsi untuk menambahkan entri.

  - **matkul.php** merupakan file yang mengambil data dari tabel `mata_kuliah` dan ditampilkan menggunakan tabel. Dapat melakukan penghapusan dan memanggil fungsi untuk melakuakn penambahan/pengeditan entri.

  - **tipe_tugas.php** merupakan file yang mengambil data dari tabel `tipe_tugas` dan ditampilkan menggunakan tabel. Dapat melakukan penghapusan dan memanggil fungsi untuk melakuakn penambahan/pengeditan entri.

  - **detai.php** merupakan file yang mengambil satu data tertentu dari tabel `todo_list` dan ditampilkan menggunakan card. Dapat melakukan penghapusan dan memanggil fungsi untuk melakuakn pengeditan entri.

  - **AddTodo.php dan AddTodo_pro.php** kedua file ini bertanggung jawab dalam hal penambahan entri pada tabel `todo_list`. `AddTodo.php` melakukan pemanggilan tampilan form dan `AddTodo_pro.php` menambahkan data tersebut kedalam database.

  - **EditTodo.php dan EditTodo_pro.php** kedua file ini bertanggung jawab dalam hal pengubahan entri pada tabel `todo_list`. `EditTodo.php` melakukan pemanggilan tampilan form beserta isi sebelum di ubah dan `EditTodo_pro.php` memasukan perubahan data tersebut kedalam database.

  - **matkuladdit.php** file ini bertanggung jawab dalam hal penambahan/pengubahan entri pada tabel `mata_kuliah` mulai dari pemanggilan tampilan form, dan juga memasukan entri baru/perubahan pada entri kedalam database.

  - **tipeaddit.php** file ini bertanggung jawab dalam hal penambahan/pengubahan entri pada tabel `tipe_tugas` mulai dari pemanggilan tampilan form, dan juga memasukan entri baru/perubahan pada entri kedalam database.

## **Tampilan**

- Halaman Utama
  ![utama](https://github.com/mdaffayusuff/TP3DPBO2023C2/blob/main/Screenshot%20TP3/halaman_utama.png?raw=true)

- Halaman Detail
  ![utama](https://github.com/mdaffayusuff/TP3DPBO2023C2/blob/main/Screenshot%20TP3/halaman_detail.png?raw=true)

- Halaman Tipe Tugas
  ![utama](https://github.com/mdaffayusuff/TP3DPBO2023C2/blob/main/Screenshot%20TP3/halaman_tipetugas.png?raw=true)

- Halaman Mata Kuliah
  ![utama](https://github.com/mdaffayusuff/TP3DPBO2023C2/blob/main/Screenshot%20TP3/halaman_matakuliah.png?raw=true)

- Halaman Form penambahan/pengeditan data pada Todo
  ![utama](https://github.com/mdaffayusuff/TP3DPBO2023C2/blob/main/Screenshot%20TP3/form_utama.png?raw=true)

- Halaman Form penambahan/pengeditan data pada Mata Kuliah dan Tipe Tugas
  ![utama](https://github.com/mdaffayusuff/TP3DPBO2023C2/blob/main/Screenshot%20TP3/form_kecil.png?raw=true)

## **Alur program dan Demo**

- Menambahkan data Todo

Dari halaman **index.php**, ketika menekan tombol `Add ToDo`, akan memanggil **AddTodo.php** yang menampilakn form untuk disi dengan data yang ingin ditambahkan. Setalah semua terisi dan menekan tombol `submit`, maka dipanggilan **AddTodo_pro.php** untuk memasukan data tersebut ke database dengan menggunakna funsgi `addTodo()`.

- Mengubah data Todo

Dari halaman **index.php** maka dipilihla salah satu data yang ingin diubah dengan cara menekan tombol `detail` pada card-nya. Setelah halaman detail muncul, tekan tombol `ubah` untuk memanggil **EditTodo.php** yang memunculkan halaman form yang sudah terisi data sebelumnya. Dengan mengubah data dan menekan tombol `submit`, maka dipanggilah **EditTodo_pro** untuk memasukan perubahan data ke database menggunakan fungsi `updateTodo()`.

- Menghapus data Todo

Dari halaman **index.php** maka dipilihla salah satu data yang ingin diubah dengan cara menekan tombol `detail` pada card-nya. Setelah halaman detail muncul, tekan tombol `hapus` untuk memanggil fungsi `deleteTodo()` yang secara langsung menghapus data tersebut dari database.

- Melakukan search Todo

Dari halaman **index.php**, isi kolom search pada navbar untuk mencari entri ToDo berdasarkan nama tugas pada entri tersebut. Ketika sudah diisi, maka klik `search` untuk melakukan pencarian dengan menggunakan fungsi `searchTodo()` dan hasil pencarian akan muncul.

- Melakukan sort Todo

Dari halaman **index.php**, tekan tombol `Sort by the nearest Deadline` untuk mengurutkan ToDo berdasarkan waktu deadline yang paling dekat menggunakan fungsi `sortTodo()`. tekan kembali tombol `Sorted by the nearest Deadline` untuk mengembalikan secara semula.

- Menambahkan data Tipe Tugas

Dari halaman **tipetugas.php**, tekan tombol 'Add Tipe Tugas' yang mana akan memanggil **tipeaddit.php** yang memunculkan tampilan form. KEtika form sudah diisi dan menekan tombol `submit`, maka data tersebut kana ditambahkan ke database menggunakan fungsi `addTipe()`.

- Mengubah data Tipe Tugas

Dari halaman **tipetugas.php**, tekan ikon pena yang ada pada baris data yang akan diubah. Dengan menekan ikon pena, maka akan memanggil **tipeaddit.php** yang memunculkan tampilan form yang sudah terisi dengan data sebelumnya. Ketika sudah mengubah data dan menekan tombol 'submit', maka perubahan data akan disimpan ke databse menggunakan fungsi `updateTipe()`.

- Menghapus data Tipe Tugas

Dari halaman **tipetugas.php**, tekan ikon tempat sampah yang ada pada baris data yang akan diubah. Dengan menekan ikon tempat sampah, maka data akan langsung dihapus dengan menggunakn fungsi `deleteTipe()`.

- Menambahkan data Mata Kuliah

Dari halaman **matkul.php**, tekan tombol 'Add Mata Kuliah' yang mana akan memanggil **matkuladdit.php** yang memunculkan tampilan form. KEtika form sudah diisi dan menekan tombol `submit`, maka data tersebut kana ditambahkan ke database menggunakan fungsi `addMatkul()`.

- Mengubah data Mata Kuliah

Dari halaman **matkul.php**, tekan ikon pena yang ada pada baris data yang akan diubah. Dengan menekan ikon pena, maka akan memanggil **matkuladdit.php** yang memunculkan tampilan form yang sudah terisi dengan data sebelumnya. Ketika sudah mengubah data dan menekan tombol 'submit', maka perubahan data akan disimpan ke databse menggunakan fungsi `updateMatkul()`.

- Menghapus data TMata Kuliah

Dari halaman **matkul.php**, tekan ikon tempat sampah yang ada pada baris data yang akan diubah. Dengan menekan ikon tempat sampah, maka data akan langsung dihapus dengan menggunakn fungsi `deleteMatkul()`.
