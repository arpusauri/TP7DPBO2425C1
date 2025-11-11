# TP7DPBO2425C1
Saya Arya Purnama Sauri dengan NIM 2408521 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Desain Program (Sistem Manajemen Pembelian Tiket Bioskop)

## Database

### Struktur Tabel
Memiliki 3 entitas (tabel) yaitu `member`, `film`, dan `tiket`.

#### 1. Tabel: `member`
Tabel ini menyimpan data member yang terdaftar.

| Field        | Tipe Data             | Constraint   | Keterangan                                                   |
|-------       |-----------            |------------  |------------                                                  |
| `id_member`         | int(11)           | PRIMARY KEY  | ID PRIMARY unik seorang member dengan tipe data INT dan AUTO_INCREMENT   |
| `nama_member`       | VARCHAR(100)           | NOT NULL     | Nama anggota                                                  |
| `email`      | VARCHAR(100)                | NOT NULL     | Email milik anggota                                                 |
| `no_hp`           | VARCHAR(15)           | NOT NULL     | Nomor telepon milik                 |
| `tanggal_daftar`    | DATE  | NOT NULL     | Kondisi barang (Baru/Bekas)                                  |

#### 2. Tabel: `film`
Tabel ini menyimpan data film yang tayang pada bioskop ini.

| Field              | Tipe Data        | Constraint    | Keterangan                                             |
|-------             |-----------       |------------   |------------                                            |
| `id_film`          | INT(11)          | PRIMARY KEY   | ID PRIMARY unik suatu film dengan tipe data INT dan AUTO_INCREMENT   |
| `judul_film`       |  VARCHAR(100)    | NOT NULL      | Judul suatu film                                       |
| `genre`            |  VARCHAR(50)     | NOT NULL      | Genre film                                             |
| `durasi`           | INT(11)          | NOT NULL      | Durasi film dalam format menit                         |
| `jadwal_tayang`    | TIME             | NOT NULL      | Jadwal waktu film dimulai                              |
| `tanggal_rilis`    | DATE             | NOT NULL      | Tanggal rilis film                                     |

#### 3. Tabel: `tiket`
Tabel ini menyimpan data tiket-tiket yang dipesan pada sistem bioskop ini.

| Field              | Tipe Data        | Constraint    | Keterangan                                             |
|-------             |-----------       |------------   |------------                                            |
| `id_tiket`          | INT(11)          | PRIMARY KEY   | ID PRIMARY KEY unik suatu tiket dengan tipe data INT dan AUTO_INCREMENT   |
| `id_member`       |  INT(11)    | FOREIGN KEY      | ID FOREIGN KEY yang diambil dari tabel `member`                                       |
| `id_film`            |  INT(11)     | FOREIGN KEY      | ID FOREIGN KEY yang diambil dari tabel `film`                                             |
| `nomor_kursi`           | VARCHAR(10)          | NOT NULL      | Nomor suatu kursi dengan format A-N (Alphabet & Number). Alphabet sebagai baris dan Number sebagai kolom dimulai dari baris paling bawah dan kolom paling kanan, contoh : A1 (baris ke-1 kolom ke-2)                          |
| `tanggal_menonton`    | DATE             | NOT NULL      | Tanggal tiket berlaku                              |
| `tanggal_pemesanan`    | DATE             | NOT NULL      | Tanggal member memesan tiket                                     |
| `harga`    | DECIMAL(10,2)             | NOT NULL      | Harga dari suatu tiket                                     |

##  Class Sistem Manajemen Tiket Bioskop 

### 1. Class `Member`
Class model yang merepresentasikan entitas Member.

#### Require:
- require_once (db conn)

#### Method:
- **Constructor**: 
- **getAllMembers**: Mengambil semua data member yang tersedia dalam tabel member
- **getMemberById**: Mengambil data member berdasarkan id
- **addMember**: Menambahkan data member baru
- **updateMember**: Memperbarui data member berdasarkan id
- **deleteMember**: Menghapus data member berdasarkan id

### 2. Class `Film`
Class model yang merepresentasikan entitas Film.

#### Require:
- require_once (db conn)

#### Method:
- **Constructor**: 
- **getAllFilms**: Mengambil semua data yang tersedia dalam tabel film
- **getFilmById**: Mengambil data film berdasarkan id
- **addFilm**: Menambahkan data film baru 
- **updateFilm**: Memperbarui data film berdasarkan id
- **deleteFilm**: Menghapus data film berdasarkan id

### 3. Class `Tiket`
Class model yang merepresentasikan entitas Tiket.

#### Require:
- require_once (db conn)

#### Method:
- **Constructor**: 
- **getAllTickets**: Mengambil semua data yang tersedia dalam tabel tiket
- **getTicketById**: Menbambil data tiket berdasarkan id
- **addTicket**: Menambahkan data tiket baru 
- **updateTicket**: Memperbarui data tiket berdasarkan id 
- **deleteTicket**: Menghapus data tiket berdasarkan id

# Penjelasan Alur Program
## 1. Jalankan Program
## 2. Menampilkan tampilan awal 
   Tampilan dibagi menjadi 2 bagian yaitu :
 - Input (pada bagian atas) 
 - Tabel data (pada bagian bawah)
## 3. Melakukan CRUD
   * CREATE
      1. Masukan seluruh input
      2. Tekan tombol "ADD" di bagian input
      3. Menampilkan pesan "Data berhasil ditambahkan" dan button "OK"
      3. Tekan tombol "OK"
      4. Data berhasil ditambah
      5. **ERROR HANDLING : Jika ada input yang kosong**
      5. **ERROR HANDLING : Jika input ID sesuai dengan data yang ada di Database**
   * Update
      1. Tekan baris pada table yang ingin dirubah data nya
      2. Data baris tersebut akan muncul pada bagian input
      3. Ubah data pada input
      4. Tekan button "Cancel" jika ingin membatalkan perubahan
      5. Tekan button "Update" untuk melakukan perubahan data
      6. Menampilkan pesan "Data berhasil diubah" dan button "OK"
      7. Tekan tombol "OK"
      8. Data berhasil diubah
      9. **ERROR HANDLING  : Jika ada input yang kosong**
   * Delete
      1. Tekan baris pada table yang ingin dihapus data nya
      2. Tekan button "Delete" untuk menghapus data
      3. Menampilkan pesan "Apakah anda yakin ingin menghapus data ini?" serta button "YES" dan "NO"
      4. Tekan Tombol "NO" jika ingin membatalkan penghapusan data
      5. Tekan tombol "YES" untuk melakukan penghapusan data
      6. Menampilkan pesan "Data berhasil dihapus" dan button "OK"
      7. Tekan tombol "OK"
      8. Data berhasil dihapus

# Dokumentasi
## 1. CREATE

## 2. READ

## 3. UPDATE

## 4. DELETE
