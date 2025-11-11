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
- **Constructor**: Inisialisasi koneksi db
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
- **Constructor**: Inisialisasi koneksi db
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
- **Constructor**: Inisialisasi koneksi db
- **getAllTickets**: Mengambil semua data yang tersedia dalam tabel tiket
- **getTicketById**: Menbambil data tiket berdasarkan id
- **addTicket**: Menambahkan data tiket baru 
- **updateTicket**: Memperbarui data tiket berdasarkan id 
- **deleteTicket**: Menghapus data tiket berdasarkan id

# Penjelasan Alur Program
## 1. Jalankan Program
## 2. Menampilkan tampilan awal 
   Terdapat navbar yang mengandung 3 link yang bisa ditekan oleh user:
   - Tickets
   - Members
   - Films
## 3. Menekan link Ticket
   * READ
      1. Menampilkan data yang dibutuhkan oleh tiket dalam bentuk tabel: `id_tiket`, `id_member` (dalam bentuk `nama_member`), `id_film` (dalam bentuk `judul_film`), `nomor_kursi`, `jadwal_tayang`, `tanggal_menonton`, `tanggal_pemesanan`, `harga`, dan tombol aksi (Update & Delete)
   * CREATE
      1. Tekan tombol "Add Ticket" yang berada diatas tabel
      2. Menampilkan form penambahan data tiket
      3. Mengisi form sesuai dengan data yang dibutuhkan
      3. Tekan tombol "Simpan"
      4. Data berhasil tambah
      5. Redirect ke tampilan awal
   * Update
      1. Tekan tombol "Update" di kolom Aksi dan pada baris data yang ingin diubah
      2. Menampilkan form perubahan data tiket
      3. Menampilkan value data yang belum diubah pada tiap input
      4. Ubah data sesuai yang diharapkan
      5. Tekan tombol "Update" untuk melakukan perubahan data
      6. Data berhasil dibah
      7. Tekan tombol "OK"
      8. Data berhasil diubah
      9. Redirect ke tampilan awal
   * Delete
      1. Tekan tombol "Delete" di kolom Aksi dan pada baris data yang ingin dihapus
      2. Tekan button "Delete" untuk menghapus data
      3. Menampilkan pesan "Yakin ingin menghapus tiket ini?" serta button "OK" dan "Cancel"
      4. Tekan Tombol "Cancel" jika ingin membatalkan penghapusan data
      5. Tekan tombol "OK" untuk melakukan penghapusan data
      6. Data berhasil dihapus

## 4. Menekan link Members
* READ
    1. Menampilkan seluruh data member dalam bentuk tabel: `id_member`, `nama_member`, `email`, `no_hp`, `tanggal_daftar`, dan tombol aksi (Update & Delete)
* CUD (Create, Update, dan Delete) memiliki langkah yang sama dengan langkah diatas (ticket)
## 5. Menekan link Films
* READ  
    1. Menampilkan seluruh data film dalam bentuk tabel: `id_film`, `judul_film`, `genre`, `durasi`, `jadwal_tayang`, `tanggal_rilis`, dan tombol aksi (Update & Delete)
* CUD (Create, Update, dan Delete) memiliki langkah yang sama dengan langkah diatas (ticket)

# Dokumentasi
## 1. CREATE


## 2. READ

## 3. UPDATE

## 4. DELETE
