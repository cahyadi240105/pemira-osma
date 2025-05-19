
---

## 🗳️ PEMIRA-OSMA – Sistem Voting Online Organisasi Mahasiswa

**PEMIRA-OSMA** adalah sistem voting digital berbasis web yang dirancang untuk mendukung pemilihan ketua organisasi mahasiswa secara aman, transparan, dan efisien. Sistem ini dibangun menggunakan **PHP Native** dan memanfaatkan teknologi enkripsi modern dengan **Paseto**, **AES-GCM**, **ChaCha20-Poly1305**, dan **Ed25519** untuk menjamin integritas dan kerahasiaan data.

---

### 📌 Fitur Utama

* ✅ Autentikasi pemilih dengan token kriptografi
* ✅ Sistem voting 1 suara per pemilih
* ✅ Panel admin untuk kelola kandidat & pemilih
* ✅ Statistik hasil voting real-time
* ✅ Desain responsif dengan Skydash Template (Free)
* ✅ Enkripsi dan tanda tangan digital untuk keamanan data

---

### 🛠️ Teknologi yang Digunakan

| Komponen         | Teknologi                                                                                                   |
| ---------------- | ----------------------------------------------------------------------------------------------------------- |
| Bahasa           | PHP Native                                                                                                  |
| Frontend         | Skydash Admin Template (Free)                                                                               |
| Database         | MySQL / MariaDB                                                                                             |
| Kriptografi      | Paseto, AES-GCM, ChaCha20-Poly1305, Ed25519, SHA3-256                                                       |
| Library Tambahan | [Paseto](https://github.com/paragonie/paseto), [sodium\_compat](https://github.com/paragonie/sodium_compat) |

---

### 🔐 Keamanan dan Kriptografi

Sistem ini mengimplementasikan beberapa algoritma keamanan modern:

* **Paseto (Platform-Agnostic Security Tokens)**: Alternatif aman untuk JWT. Digunakan untuk token sesi dan otentikasi.
* **AES-GCM**: Enkripsi simetris dengan autentikasi bawaan. Digunakan untuk mengenkripsi data sensitif (misalnya ID pemilih).
* **ChaCha20-Poly1305**: Alternatif ringan dan aman untuk AES, digunakan pada perangkat dengan keterbatasan hardware.
* **SHA3-256**: Algoritma hashing untuk menyimpan data penting seperti password dengan aman.
* **Ed25519**: Algoritma tanda tangan digital modern yang ringan dan cepat. Digunakan untuk validasi integritas hasil voting.

---

### 🧱 Struktur Direktori

```
/pemira-osma
├── /css/            
├── /docs/            
├── /fonts/      
├── /images/           
├── /js/             
├── /pages/
├── /partials/
├── /scss/
├── /vendor/
├── /vendors/               
├── index.php           
└── README.md
....
```

---

### 🚀 Cara Menjalankan

1. Clone proyek:

   ```bash
   git clone https://github.com/cahyadi240105/pemira-osma.git
   ```
2. Masuk ke folder:

   ```bash
   cd pemira-osma
   ```
3. Import file SQL ke database lokal Anda.
4. Sesuaikan konfigurasi database dan kriptografi di:
   * `/security/config.php`
5. Jalankan di server lokal seperti XAMPP atau Laragon.

---

### 👥 Kontributor

* **Cahyadi Prasetyo** – *Fullstack*
