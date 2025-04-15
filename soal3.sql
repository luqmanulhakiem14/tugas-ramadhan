


/* 
3. Buatkan fitur perpustakaan yang di dalamnya bisa:
- menambahkan buku dengan keterangan judul, penulis, dan tahun terbit
PHP dan SQL
- Dapat melihat daftar buku .
Fitur:
- Tersambung ke database.
- Tambah buku.
- Daftar buku.
- Dapat di searching


*/


CREATE DATABASE perpustakaan;

USE perpustakaan;

CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100),
    penulis VARCHAR(100),
    tahun_terbit INT NOT NULL
);


