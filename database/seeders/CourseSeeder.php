<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Facades\Schema;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key sebentar untuk membersihkan tabel
        Schema::disableForeignKeyConstraints();
        Course::truncate();
        Schema::enableForeignKeyConstraints();

        Course::insert([
            // ================= SEMESTER 1 =================
            ['code' => 'BAI101', 'name' => 'Bahasa Indonesia', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Universitas/Fakultas. Fokus pada tata bahasa, ejaan, dan penyusunan karya tulis ilmiah.'],
            ['code' => 'NOP103', 'name' => 'Pancasila', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Universitas/Fakultas. Penguatan nilai dasar Pancasila sebagai ideologi dan dasar negara.'],
            ['code' => 'NOP104', 'name' => 'Kewarganegaraan', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Universitas/Fakultas. Membahas semangat kebangsaan, HAM, dan kesadaran hukum bernegara.'],
            ['code' => 'AGI101', 'name' => 'Agama Islam I', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Agama (Pilih salah satu). Konsep ketuhanan, keimanan, dan implementasi akhlak mulia.'],
            ['code' => 'AGP101', 'name' => 'Agama Kristen Protestan I', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Agama (Pilih salah satu). Pedoman kepribadian Kristiani dan etika moral.'],
            ['code' => 'AGK101', 'name' => 'Agama Kristen Katolik I', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Agama (Pilih salah satu). Penghayatan iman Katolik dan etika sosial.'],
            ['code' => 'AGH101', 'name' => 'Agama Hindu I', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Agama (Pilih salah satu). Konsepsi Brahma Widya, susila, dan etika Hindu.'],
            ['code' => 'AGB101', 'name' => 'Agama Budha I', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Agama (Pilih salah satu). Hakikat ajaran Sang Buddha dan hukum kesunyataan.'],
            ['code' => 'AGC101', 'name' => 'Agama Kong Hu Chu I', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Agama (Pilih salah satu). Nilai kebajikan dan prinsip hidup Junzi (insan berbudi luhur).'],
            ['code' => 'SIP107', 'name' => 'Data dan Pustaka', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Fakultas. Keterampilan literasi data, interpretasi, dan evaluasi referensi ilmiah.'],
            ['code' => 'BAE110', 'name' => 'Bahasa Inggris', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Fakultas. Penguasaan tenses, reading comprehension, dan kosakata akademik dasar.'],
            ['code' => 'ETS102', 'name' => 'Etika Sosial Politik', 'sks' => 2, 'semester' => 1, 'description' => 'Mata Kuliah Wajib Fakultas. Prinsip-prinsip moral, tanggung jawab, dan kepekaan sosial politik.'],

            // ================= SEMESTER 2 =================
            ['code' => 'PNS101', 'name' => 'Teknik Penulisan Ilmiah', 'sks' => 2, 'semester' => 2, 'description' => 'Mata Kuliah Wajib. Konsep dasar penulisan ilmiah, sitasi, dan pemanfaatan reference manager.'],
            ['code' => 'PNS201', 'name' => 'Dasar Metodologi Penelitian Sosial', 'sks' => 3, 'semester' => 2, 'description' => 'Mata Kuliah Wajib. Paradigma penelitian kualitatif & kuantitatif, teknik sampling, dan pengumpulan data.'],
            ['code' => 'PHS101', 'name' => 'Filsafat Ilmu', 'sks' => 2, 'semester' => 2, 'description' => 'Mata Kuliah Wajib. Sejarah perkembangan ilmu, ontologi, epistemologi, aksiologi, dan metode berpikir ilmiah.'],
            ['code' => 'SIP101', 'name' => 'Pengantar Ilmu Informasi dan Perpustakaan', 'sks' => 3, 'semester' => 2, 'description' => 'Mata Kuliah Wajib Prodi. Konsep dasar, teori informasi, sejarah kepustakawanan, dan tren profesi informasi.'],
            ['code' => 'SIP102', 'name' => 'Dasar Organisasi Informasi', 'sks' => 2, 'semester' => 2, 'description' => 'Mata Kuliah Wajib Prodi. Pengantar sistem temu kembali informasi manual dan berbasis TIK.'],
            ['code' => 'SIP111', 'name' => 'Pengantar Kearsipan dan Dokumentasi', 'sks' => 3, 'semester' => 2, 'description' => 'Mata Kuliah Wajib Prodi. Daur hidup arsip, tata persuratan, arsip vital, dan pengenalan arsip elektronik.'],
            ['code' => 'SIP234', 'name' => 'Sistem Klasifikasi', 'sks' => 3, 'semester' => 2, 'description' => 'Mata Kuliah Wajib Prodi. Praktik penentuan notasi subjek dokumen menggunakan bagan DDC (Dewey Decimal Classification).'],
            ['code' => 'SIP344', 'name' => 'Manajemen Data', 'sks' => 2, 'semester' => 2, 'description' => 'Mata Kuliah Wajib Prodi. Pengenalan sistem database relasional dan alur data pada instansi informasi.'],

            // ================= SEMESTER 3 =================
            ['code' => 'PNS212', 'name' => 'Metode Penelitian Kuantitatif', 'sks' => 4, 'semester' => 3, 'description' => 'Mata Kuliah Wajib. Praktik analisis statistik kuantitatif menggunakan perangkat lunak (SPSS) dan uji hipotesis.'],
            ['code' => 'SIP235', 'name' => 'Pengembangan Koleksi', 'sks' => 3, 'semester' => 3, 'description' => 'Mata Kuliah Wajib Prodi. Kebijakan seleksi, pengadaan bahan pustaka fisik/elektronik, dan evaluasi koleksi.'],
            ['code' => 'SIP236', 'name' => 'Pengindeksan dan Analisis Subjek', 'sks' => 3, 'semester' => 3, 'description' => 'Mata Kuliah Wajib Prodi. Analisis subjek dokumen, penyusunan tajuk subjek (LCSH/SLSH), dan tesaurus.'],
            ['code' => 'SIP237', 'name' => 'Sistem Informasi Perpustakaan', 'sks' => 3, 'semester' => 3, 'description' => 'Mata Kuliah Wajib Prodi. Pendekatan sistem, teori informasi, dan perancangan database perpustakaan.'],
            ['code' => 'SIP238', 'name' => 'Sumber dan Layanan Informasi', 'sks' => 2, 'semester' => 3, 'description' => 'Mata Kuliah Wajib Prodi. Evaluasi koleksi referensi umum/khusus, reference interview, dan layanan digital.'],
            ['code' => 'SIP345', 'name' => 'Sistem Temu Kembali Informasi', 'sks' => 2, 'semester' => 3, 'description' => 'Mata Kuliah Wajib Prodi. Logika penelusuran online, boolean operator, metasearch, dan evaluasi hasil penelusuran.'],
            ['code' => 'SIP367', 'name' => 'Literasi Informasi', 'sks' => 3, 'semester' => 3, 'description' => 'Mata Kuliah Wajib Prodi. Model-model literasi informasi (The Big6, Empowering 8) dan lifelong learning.'],
            ['code' => 'BAE213', 'name' => 'Bahasa Inggris Lanjut', 'sks' => 2, 'semester' => 3, 'description' => 'Mata Kuliah Wajib Prodi. Penerapan bahasa Inggris untuk penulisan abstrak, review buku, dan terjemahan.'],
            // Matkul Pilihan Semester 3
            ['code' => 'SIP243', 'name' => 'Kajian Publikasi dan HaKI (Pilihan)', 'sks' => 2, 'semester' => 3, 'description' => 'Mata Kuliah Pilihan. Dinamika industri penerbitan buku, pergeseran cetak ke elektronik, dan Hak Atas Kekayaan Intelektual.'],
            ['code' => 'SIP347', 'name' => 'Analisis Sistem Perpustakaan (Pilihan)', 'sks' => 3, 'semester' => 3, 'description' => 'Mata Kuliah Pilihan. Tahapan SDLC (Systems Development Life Cycle) dalam merancang sistem perpustakaan.'],
            ['code' => 'SIP353', 'name' => 'Kajian Literasi dan Budaya Baca (Pilihan)', 'sks' => 3, 'semester' => 3, 'description' => 'Mata Kuliah Pilihan. Analisis masalah minat baca di Indonesia, pleasure reading, dan net generation.'],
            ['code' => 'SIP356', 'name' => 'Kajian Ruang Pusat Informasi (Pilihan)', 'sks' => 2, 'semester' => 3, 'description' => 'Mata Kuliah Pilihan. Desain tata ruang, interior, ergonomi, dan fasilitas pusat informasi modern.'],
            ['code' => 'SIP371', 'name' => 'Kajian Informasi dan Gender (Pilihan)', 'sks' => 2, 'semester' => 3, 'description' => 'Mata Kuliah Pilihan. Analisis isu marjinalisasi, subordinasi, dan kesenjangan akses informasi berbasis gender.'],

            // ================= SEMESTER 4 =================
            ['code' => 'SIP240', 'name' => 'Sistem Katalogisasi', 'sks' => 2, 'semester' => 4, 'description' => 'Mata Kuliah Wajib Prodi. Pembuatan katalog deskriptif standar AACR2/RDA dan format MARC21.'],
            ['code' => 'SIP241', 'name' => 'Teori Ilmu Sosial untuk IIP', 'sks' => 3, 'semester' => 4, 'description' => 'Mata Kuliah Wajib Prodi. Perspektif strukturalisme, post-strukturalisme, marxism, dan post-modernism untuk analisis isu informasi.'],
            ['code' => 'SIP322', 'name' => 'Perilaku Informasi', 'sks' => 3, 'semester' => 4, 'description' => 'Mata Kuliah Wajib Prodi. Model perilaku pencarian informasi (Wilson, Ellis, Kuhlthau) dan studi pengguna.'],
            ['code' => 'SIP348', 'name' => 'Perancangan Aplikasi Perpustakaan', 'sks' => 3, 'semester' => 4, 'description' => 'Mata Kuliah Wajib Prodi. Konstruksi portal, modifikasi CMS, dan pengelolaan database aplikasi perpustakaan.'],
            ['code' => 'SIP349', 'name' => 'Manajemen Koleksi Non Buku', 'sks' => 2, 'semester' => 4, 'description' => 'Mata Kuliah Wajib Prodi. Katalogisasi dan pengelolaan bahan kartografi, rekaman suara, video, dan multimedia.'],
            ['code' => 'SIP351', 'name' => 'Manajemen Arsip Dinamis', 'sks' => 3, 'semester' => 4, 'description' => 'Mata Kuliah Wajib Prodi. Pengelolaan arsip aktif/inaktif, jadwal retensi arsip (JRA), dan penyusutan arsip.'],
            ['code' => 'SIP359', 'name' => 'Perpustakaan Digital', 'sks' => 3, 'semester' => 4, 'description' => 'Mata Kuliah Wajib Prodi. Arsitektur perpustakaan digital, interoperabilitas metadata, dan preservasi digital.'],
            // Matkul Pilihan Semester 4
            ['code' => 'SIP239', 'name' => 'Etika Informasi (Pilihan)', 'sks' => 2, 'semester' => 4, 'description' => 'Mata Kuliah Pilihan. Prinsip moral pelayanan, kode etik pustakawan, dan penanganan keluhan pemustaka.'],
            ['code' => 'SIP242', 'name' => 'Kajian Informasi dan Psikologi (Pilihan)', 'sks' => 2, 'semester' => 4, 'description' => 'Mata Kuliah Pilihan. Aspek psikologis dalam interaksi layanan informasi dan perubahan perilaku pengguna.'],
            ['code' => 'SIP355', 'name' => 'Kajian Kolaborasi Informasi & Perpustakaan (Pilihan)', 'sks' => 2, 'semester' => 4, 'description' => 'Mata Kuliah Pilihan. Konsep jejaring perpustakaan, konsorsium, dan resource sharing berbasis teknologi.'],
            ['code' => 'SIP366', 'name' => 'Informasi dan Kelompok Khusus (Pilihan)', 'sks' => 3, 'semester' => 4, 'description' => 'Mata Kuliah Pilihan. Layanan informasi dan teknologi bantu (assistive tech) bagi penyandang disabilitas & lansia.'],
            ['code' => 'SIP357', 'name' => 'Informasi dan Kebudayaan (Pilihan)', 'sks' => 3, 'semester' => 4, 'description' => 'Mata Kuliah Pilihan. Analisis budaya informasi digital, autentisitas teks, dan net generation culture.'],
            ['code' => 'MNU312', 'name' => 'Analisis Informasi Bisnis (Pilihan)', 'sks' => 3, 'semester' => 4, 'description' => 'Mata Kuliah Pilihan. Mindset kewirausahaan berbasis TIK dan pengelolaan bisnis jasa informasi.'],

            // ================= SEMESTER 5 =================
            ['code' => 'MNO312', 'name' => 'Total Quality Management (TQM)', 'sks' => 3, 'semester' => 5, 'description' => 'Mata Kuliah Wajib Prodi. Budaya mutu, kepemimpinan, pemberdayaan SDM, dan perbaikan berkelanjutan.'],
            ['code' => 'SIP352', 'name' => 'Manajemen Arsip Statis', 'sks' => 2, 'semester' => 5, 'description' => 'Mata Kuliah Wajib Prodi. Pengolahan arsip bernilai sejarah, pelindungan bukti hukum, dan akses arsip statis.'],
            ['code' => 'SIP358', 'name' => 'Metode Penelitian Informasi dan Perpustakaan', 'sks' => 4, 'semester' => 5, 'description' => 'Mata Kuliah Wajib Prodi. Pendalaman metode analisis wacana, etnografi virtual, digital forensic, dan big data.'],
            ['code' => 'SIP361', 'name' => 'Perancangan Portal dan Aplikasi Informasi', 'sks' => 3, 'semester' => 5, 'description' => 'Mata Kuliah Wajib Prodi. Desain layout web interaktif, manajemen modul, dan hosting website instansi.'],
            ['code' => 'SIP362', 'name' => 'Manajemen Jasa Informasi', 'sks' => 2, 'semester' => 5, 'description' => 'Mata Kuliah Wajib Prodi. Strategi pelayanan berorientasi kepuasan pelanggan pada lembaga profit/nirlaba.'],
            ['code' => 'SIP363', 'name' => 'Masyarakat Informasi', 'sks' => 3, 'semester' => 5, 'description' => 'Mata Kuliah Wajib Prodi. Karakteristik masyarakat informasi, determinan teknologi, dan komunitas virtual.'],
            // Matkul Pilihan Semester 5
            ['code' => 'SIP346', 'name' => 'Informetrika (Pilihan)', 'sks' => 3, 'semester' => 5, 'description' => 'Mata Kuliah Pilihan. Penerapan hukum Bradford, Lotka, Zipf, analisis sitiran, dan paro hidup literatur.'],
            ['code' => 'SIP354', 'name' => 'Manajemen Arsip Elektronik (Pilihan)', 'sks' => 2, 'semester' => 5, 'description' => 'Mata Kuliah Pilihan. Pengelolaan electronic records, alih media, autentikasi, dan preservasi digital.'],
            ['code' => 'SIP364', 'name' => 'Knowledge Management (Pilihan)', 'sks' => 3, 'semester' => 5, 'description' => 'Mata Kuliah Pilihan. Siklus knowledge management, knowledge sharing, dan audit pengetahuan organisasi.'],
            ['code' => 'SIP365', 'name' => 'Kebijakan Informasi (Pilihan)', 'sks' => 3, 'semester' => 5, 'description' => 'Mata Kuliah Pilihan. Regulasi hak cipta, information policy, dan perlindungan data di masyarakat digital.'],
            ['code' => 'PII60102', 'name' => 'Manajemen Krisis dalam Informasi (Pilihan MBKM)', 'sks' => 3, 'semester' => 5, 'description' => 'Mata Kuliah Pilihan lintas prodi/universitas mitra (Universitas Brawijaya). Penanganan krisis informasi.'],

            // ================= SEMESTER 6 =================
            ['code' => 'AGI401', 'name' => 'Agama Islam II', 'sks' => 2, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Fakultas. Isu aktual keagamaan, relasi iman-akal, pluralitas, dan civil society.'],
            ['code' => 'AGP401', 'name' => 'Agama Kristen Protestan II', 'sks' => 2, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Fakultas. Implementasi iman Kristiani dalam pengembangan IPTEK dan masyarakat.'],
            ['code' => 'AGK401', 'name' => 'Agama Kristen Katolik II', 'sks' => 2, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Fakultas. Ajaran sosial Gereja, etika moral, Hak Asasi Manusia, dan demokrasi.'],
            ['code' => 'AGH401', 'name' => 'Agama Hindu II', 'sks' => 2, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Fakultas. Konsepsi catur marga yoga, etika, dan budaya dalam perspektif Hindu.'],
            ['code' => 'AGB401', 'name' => 'Agama Budha II', 'sks' => 2, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Fakultas. Implementasi ajaran Buddha dalam etika sosial politik dan hukum karma.'],
            ['code' => 'AGC401', 'name' => 'Agama Kong Hu Chu II', 'sks' => 2, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Fakultas. Penerapan prinsip Zhi Ren Yong dan pengabdian nilai kebajikan hakiki.'],
            ['code' => 'SIP244', 'name' => 'Manajemen Preservasi, Konservasi & Restorasi', 'sks' => 3, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Prodi. Pencegahan kerusakan fisik dokumen, mitigasi bencana arsip (disaster management), dan fumigasi.'],
            ['code' => 'SIP421', 'name' => 'Kajian Masalah Informasi dan Perpustakaan', 'sks' => 3, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Prodi. Analisis mendalam problem mutakhir kepustakawanan sebagai landasan penulisan ilmiah.'],
            ['code' => 'SIP441', 'name' => 'Pemasaran Informasi', 'sks' => 3, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Prodi. Strategi bauran pemasaran, Product Life Cycle (PLC), dan riset pasar produk informasi.'],
            ['code' => 'KKS495', 'name' => 'Magang', 'sks' => 3, 'semester' => 6, 'description' => 'Mata Kuliah Wajib Prodi. Praktik kerja langsung di institusi/perusahaan/lembaga arsip untuk mengasah hardskill.'],
            // Matkul Pilihan Semester 6
            ['code' => 'SIP368', 'name' => 'Perencanaan Strategik Lembaga Informasi (Pilihan)', 'sks' => 2, 'semester' => 6, 'description' => 'Mata Kuliah Pilihan. Analisis SWOT, perumusan visi/misi, dan penyusunan rencana strategis perpustakaan nirlaba.'],
            ['code' => 'SIP369', 'name' => 'Perancangan Komersial Elektronik (Pilihan)', 'sks' => 3, 'semester' => 6, 'description' => 'Mata Kuliah Pilihan. Arsitektur e-commerce, payment gateway, dan strategi bisnis online/money blogging.'],
            ['code' => 'SIP372', 'name' => 'Sains Data untuk Ilmu Sosial (Pilihan)', 'sks' => 3, 'semester' => 6, 'description' => 'Mata Kuliah Pilihan. Text mining, pembersihan data, analisis sentimen, dan visualisasi big data sosial.'],
            ['code' => 'AUD101', 'name' => 'Audit Informasi (Pilihan MBKM)', 'sks' => 2, 'semester' => 6, 'description' => 'Mata Kuliah Pilihan lintas prodi/universitas mitra (Universitas Brawijaya). Evaluasi aset informasi.'],

            // ================= SEMESTER 7 =================
            ['code' => 'KNS401', 'name' => 'Kuliah Kerja Nyata (KKN)', 'sks' => 3, 'semester' => 7, 'description' => 'Mata Kuliah Wajib Universitas. Pengabdian kepada masyarakat multikultural secara interdisipliner.'],
            ['code' => 'PNS498', 'name' => 'Proposal Skripsi', 'sks' => 3, 'semester' => 7, 'description' => 'Mata Kuliah Wajib Prodi. Perancangan usulan penelitian, rumusan masalah, dan seminar proposal skripsi.'],
            // Matkul Pilihan Semester 7
            ['code' => 'SIP413', 'name' => 'Studi Perbandingan Lembaga & Teknologi Informasi (Pilihan)', 'sks' => 3, 'semester' => 7, 'description' => 'Mata Kuliah Pilihan. Analisis komparatif sistem perpustakaan, arsip, museum, serta penerapan IoT dan Cloud.'],
            ['code' => 'KAS405', 'name' => 'Keasistenan Ilmu Informasi dan Perpustakaan (Pilihan)', 'sks' => 3, 'semester' => 7, 'description' => 'Mata Kuliah Pilihan. Keterlibatan mahasiswa dalam asistensi persiapan materi kuliah dan praktik pengajaran.'],
            ['code' => 'SIP373', 'name' => 'Forensik Digital dan Analisis Citra (Pilihan)', 'sks' => 2, 'semester' => 7, 'description' => 'Mata Kuliah Pilihan. Verifikasi keaslian citra digital, clustering objek, dan deteksi manipulasi file.'],

            // ================= SEMESTER 8 =================
            ['code' => 'PNS499', 'name' => 'Skripsi', 'sks' => 6, 'semester' => 8, 'description' => 'Mata Kuliah Wajib. Penelitian mandiri, penyusunan laporan skripsi, publikasi artikel ilmiah, dan sidang ujian komprehensif.'],
        ]);
    }
}