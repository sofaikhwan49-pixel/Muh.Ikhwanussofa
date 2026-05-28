
<?php

// ==========================
// KONEKSI DATABASE
// ==========================

$host = "localhost";
$user = "root";
$pass = "";
$db   = "ikhwan_db"; // SESUAI DATABASE KAMU

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}


// ==========================
// SIMPAN DATA FORM
// ==========================

$success = false;
$error   = false;

if(isset($_POST['kirim_pesan'])){

    $nama  = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

    $query = "INSERT INTO kontak 
              (nama_lengkap, email, pesan)
              VALUES
              ('$nama', '$email', '$pesan')";

    $simpan = mysqli_query($conn, $query);

    if($simpan){
        $success = true;
    } else {
        $error = true;
    }
}

?>



<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY WEB | Web Deplofer & Kreator Digital Profesional</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Lucide Icons untuk ikon modern -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Konfigurasi Tema Tailwind -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            gold: '#D4AF37',
                            darkBg: '#0B0C10',
                            darkCard: '#1F2833',
                            lightText: '#C5C6C7',
                            accent: '#45F3FF'
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Menghubungkan File CSS Eksternal -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Menghubungkan File JavaScript Eksternal -->
    <script src="js/script.js" defer></script>
</head>
<body class="font-sans antialiased selection:bg-brand-gold selection:text-black">

    <!-- Header / Navbar -->
    <header class="fixed top-0 left-0 w-full z-50 bg-brand-darkBg/90 backdrop-blur-md border-b border-white/5 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Logo -->
            <a href="#beranda" class="text-xl font-extrabold tracking-widest text-white flex items-center gap-2 group">
                <span class="w-8 h-8 rounded-lg bg-brand-gold flex items-center justify-center text-black font-black text-sm group-hover:rotate-12 transition-transform duration-300">FP</span>
                MY<span class="text-brand-gold">WEB</span>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="#beranda" class="text-sm font-medium text-brand-lightText hover:text-brand-gold transition-colors duration-300">Beranda</a>
                <a href="#tentang" class="text-sm font-medium text-brand-lightText hover:text-brand-gold transition-colors duration-300">Tentang</a>
                <a href="#karya" class="text-sm font-medium text-brand-lightText hover:text-brand-gold transition-colors duration-300">Karya</a>
                <a href="#kontak" class="text-sm font-medium text-brand-lightText hover:text-brand-gold transition-colors duration-300">Kontak</a>
            </nav>

            <!-- Call to Action Button (Desktop) -->
            <div class="hidden md:block">
                <a href="#kontak" class="px-5 py-2.5 bg-transparent border border-brand-gold text-brand-gold hover:bg-brand-gold hover:text-black text-sm font-semibold rounded-lg transition-all duration-300">
                    Mulai Project
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="menu-btn" class="md:hidden text-white focus:outline-none p-2" aria-label="Toggle Menu">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-20 left-0 w-full bg-brand-darkBg border-b border-white/5 px-6 py-6 transition-all duration-300">
            <nav class="flex flex-col gap-5">
                <a href="#beranda" class="mobile-link text-lg font-medium text-brand-lightText hover:text-brand-gold">Beranda</a>
                <a href="#tentang" class="mobile-link text-lg font-medium text-brand-lightText hover:text-brand-gold">Tentang</a>
                <a href="#karya" class="mobile-link text-lg font-medium text-brand-lightText hover:text-brand-gold">Karya</a>
                <a href="#kontak" class="mobile-link text-lg font-medium text-brand-lightText hover:text-brand-gold">Kontak</a>
                <a href="#kontak" class="mobile-link mt-2 w-full py-3 text-center bg-brand-gold text-black font-semibold rounded-lg">
                    Hubungi Saya
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="relative min-h-screen flex items-center justify-center pt-24 pb-12 overflow-hidden">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1f293710_1px,transparent_1px),linear-gradient(to_bottom,#1f293710_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)] pointer-events-none"></div>
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-brand-gold/5 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-5xl mx-auto px-6 text-center z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/5 border border-white/10 text-xs text-brand-gold font-medium mb-6 animate-pulse">
                <span class="w-2 h-2 rounded-full bg-brand-gold"></span> Be Yourself
            </div>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-extrabold tracking-tight text-white mb-6 leading-tight">
                Membuat Karya<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-gold via-yellow-400 to-amber-500">
                    MUH.IKHWANUSSOFA
                </span>
            </h1>

            <p class="text-lg md:text-xl text-brand-lightText max-w-2xl mx-auto mb-10 leading-relaxed font-light">
                Web Defloper & Kreator Digital yang menjadi hobi dan mendedikasikan diri untuk membuat karya-karya digital melalui visualisaai dunia moderen.
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#karya" class="w-full sm:w-auto px-8 py-4 bg-brand-gold text-black font-bold rounded-xl shadow-lg shadow-brand-gold/20 hover:bg-white hover:shadow-white/10 transition-all duration-300 flex items-center justify-center gap-2 group">
                    Lihat Portfolio 
                    <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#kontak" class="w-full sm:w-auto px-8 py-4 bg-white/5 border border-white/10 text-white font-semibold rounded-xl hover:bg-white/10 transition-all duration-300">
                    Hubungi Saya
                </a>
            </div>
        </div>
    </section>

    <!-- Tentang Saya Section -->
    <section id="tentang" class="py-24 bg-brand-darkCard/30 relative border-t border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left: Profile Image -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative group">
                        <div class="absolute -inset-1.5 bg-gradient-to-r from-brand-gold to-yellow-600 rounded-2xl blur opacity-30 group-hover:opacity-60 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative w-72 h-96 sm:w-80 sm:h-[420px] bg-brand-darkBg rounded-2xl overflow-hidden border border-white/10 flex flex-col justify-between p-6">
                            
                            <!-- BAGIAN FOTO PROFIL (Menggunakan tag <img>) -->
                            <div class="w-full h-2/3 bg-white/5 rounded-xl flex items-center justify-center overflow-hidden">
                                <img src="ikhwan.jpg" alt="Yosua Polyo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            
                            <div class="text-center mt-4">
                                <h3 class="text-xl font-bold text-white">MUH.IKHWANUSSOFA</h3>
                                <p class="text-sm text-brand-gold mt-1">My Foto</p>
                                <div class="flex gap-3 justify-center mt-4 text-brand-lightText">
                                    <a href="#" class="hover:text-white transition-colors"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                                    <a href="#" class="hover:text-white transition-colors"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                                    <a href="#" class="hover:text-white transition-colors"><i data-lucide="camera" class="w-5 h-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-xs font-bold tracking-widest text-brand-gold uppercase block">TENTANG SAYA</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white">Muh.Ikhwanussofa</h2>
                    <p class="text-brand-lightText text-lg leading-relaxed font-light">
                        Saya adalah seorang mahasiswa disalahsatu universitas (universitas Ibrahimy) situbondo. Saat ini, saya menempuh studi di fakultas (SAINTEK/sains dan teknologi) program studi (Ilmu Komputer).Sebagai mahasiswa yang tumbuh di lingkungan kampus berbasis pesantren, saya tidak hanya fokus pada pencapaian akademik, tetapi juga berkomitmen untuk mengintegrasikan nilai-nilai keislaman dan akhlakul karimah dalam pengembangan diri serta pengabdian masyarakat.
                    </p>
                    <p class="text-brand-lightText leading-relaxed font-light">
                        Resep Kehidupan Di Dunia
                        "Allah SWT senantiasa membantu hambanya selama hambanya itu membantu saudaranya."  by : TGH.Muh.Khotibuddin Athar,QH.,MH.
                    </p>

                    <!-- Key Metrics -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 pt-6">
                        
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Galeri Karya Section -->
    <section id="karya" class="py-24 bg-brand-darkBg">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-widest text-brand-gold uppercase block mb-2">MY GALERY</span>


            </div>
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <button class="filter-btn active px-5 py-2.5 rounded-full text-sm font-medium bg-brand-gold text-black transition-all duration-300" data-filter="all">Semua</button>
                <button class="filter-btn px-5 py-2.5 rounded-full text-sm font-medium bg-white/5 border border-white/10 text-brand-lightText hover:text-white hover:bg-white/10 transition-all duration-300" data-filter="alam">Foto Alam</button>
                <button class="filter-btn px-5 py-2.5 rounded-full text-sm font-medium bg-white/5 border border-white/10 text-brand-lightText hover:text-white hover:bg-white/10 transition-all duration-300" data-filter="modern">Keluarga</button>
                <button class="filter-btn px-5 py-2.5 rounded-full text-sm font-medium bg-white/5 border border-white/10 text-brand-lightText hover:text-white hover:bg-white/10 transition-all duration-300" data-filter="editing">Wisuda Tahfidz (MAPK)</button>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Card 1 (Alam) -->
                <div class="portfolio-item group bg-brand-darkCard/50 border border-white/5 rounded-2xl overflow-hidden hover:border-brand-gold/30 transition-all duration-300" data-category="alam">
                    <div class="relative overflow-hidden h-72">
                        <!-- BERUBAH: Menggunakan tag <img> untuk foto portfolio alam -->
                        <img src="gunung.jpg" alt="Simfoni Puncak Gunung" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-darkBg via-transparent to-transparent opacity-90"></div>
                        <span class="absolute top-4 right-4 text-xs font-semibold px-3 py-1 bg-brand-gold text-black rounded-full">Foto Alam</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Alam</h3>
                        <p class="text-brand-lightText text-sm font-light">Di setiap tarikan napas di ketinggian ego perlahan luruh digantikan oleh rasa syukur yang mendalam atas indahnya alam. Di sini saya menemukan kedamaian yang tak terlukiskan.</p>
                    </div>
                </div>

                <!-- Card 2 (Modern) -->
                <div class="portfolio-item group bg-brand-darkCard/50 border border-white/5 rounded-2xl overflow-hidden hover:border-brand-gold/30 transition-all duration-300" data-category="modern">
                    <div class="relative overflow-hidden h-72">
                        <!-- BERUBAH: Menggunakan tag <img> untuk foto portfolio modern -->
                        <img src="family.jpg" alt="Desain Kampanye Komersial" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-darkBg via-transparent to-transparent opacity-90"></div>
                        <span class="absolute top-4 right-4 text-xs font-semibold px-3 py-1 bg-brand-gold text-black rounded-full">Keluarga</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">My Family</h3>
                        <p class="text-brand-lightText text-sm font-light">Rumah bukan hanya sekadar tempat tinggal tapi di mana hati kita berada. Dan hati kita selalu berada di antara orang-orang terkasih yang kita sebut keluarga.</p>
                    </div>
                </div>

                <!-- Card 3 (Editing) -->
                <div class="portfolio-item group bg-brand-darkCard/50 border border-white/5 rounded-2xl overflow-hidden hover:border-brand-gold/30 transition-all duration-300" data-category="editing">
                    <div class="relative overflow-hidden h-72">
                        <!-- BERUBAH: Menggunakan tag <img> untuk foto portfolio editing -->
                        <img src="wisuda.jpg" alt="Koreksi Warna Sinematik" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-darkBg via-transparent to-transparent opacity-90"></div>
                        <span class="absolute top-4 right-4 text-xs font-semibold px-3 py-1 bg-brand-gold text-black rounded-full">Wisuda Tahfidz (MAPK)</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Wisuda MAPK</h3>
                        <p class="text-brand-lightText text-sm font-light">Satu langkah kecil di dunia, satu pencapaian besar untuk akhirat. Alhamdulillah mahkota cahaya itu kini bukan lagi sekadar impian, melainkan amanah yang harus terus dijaga di dalam dada.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hubungi Saya Section -->
    <section id="kontak" class="py-24 bg-brand-darkCard/20 relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Info Hubungi -->
                <div class="lg:col-span-5 space-y-6">
                    <span class="text-xs font-bold tracking-widest text-brand-gold uppercase block">KONTAK</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white">Ide Kereatifmu</h2>
                    <p class="text-brand-lightText font-light leading-relaxed">
                        Punya ide kreatif, project website, desain, atau konsep digital lainnya? Saya siap membantu mengubah ide Anda menjadi karya yang modern, menarik, dan profesional. Silakan kirim pesan melalui formulir ini.
                    </p>

                    <div class="space-y-4 pt-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-brand-gold">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-xs text-brand-lightText">Email Saya</p>
                                <p class="text-sm font-bold text-white">sofaikhwan49@gmail.com</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-brand-gold">
                                <i data-lucide="map-pin" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-xs text-brand-lightText">Alamt</p>
                                <p class="text-sm font-bold text-white">Pengadang, Lombok tengah, Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Formulir -->
<div class="lg:col-span-7">
    <div class="bg-brand-darkCard border border-white/5 p-8 rounded-2xl relative">

        <form method="POST" class="space-y-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <div>
                    <label for="name"
                        class="block text-xs font-semibold text-brand-lightText uppercase tracking-wider mb-2">
                        Nama Lengkap
                    </label>

                    <input 
                        type="text"
                        id="name"
                        name="nama"
                        required
                        class="w-full bg-brand-darkBg border border-white/10 focus:border-brand-gold rounded-xl px-4 py-3.5 text-white placeholder-gray-500 focus:outline-none transition-all duration-300"
                        placeholder="Yudi">
                </div>

                <div>
                    <label for="email"
                        class="block text-xs font-semibold text-brand-lightText uppercase tracking-wider mb-2">
                        Alamat Email
                    </label>

                    <input 
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full bg-brand-darkBg border border-white/10 focus:border-brand-gold rounded-xl px-4 py-3.5 text-white placeholder-gray-500 focus:outline-none transition-all duration-300"
                        placeholder="nama@email.com">
                </div>

            </div>

            <div>
                <label for="message"
                    class="block text-xs font-semibold text-brand-lightText uppercase tracking-wider mb-2">
                    Pesan Anda
                </label>

                <textarea 
                    id="message"
                    name="pesan"
                    rows="5"
                    required
                    class="w-full bg-brand-darkBg border border-white/10 focus:border-brand-gold rounded-xl px-4 py-3.5 text-white placeholder-gray-500 focus:outline-none transition-all duration-300"
                    placeholder="Tuliskan proyek impian atau pertanyaan Anda di sini..."></textarea>
            </div>

            <button 
                type="submit"
                name="kirim_pesan"
                class="w-full py-4 bg-brand-gold text-black font-bold rounded-xl shadow-lg shadow-brand-gold/10 hover:bg-white hover:shadow-white/5 transition-all duration-300 flex items-center justify-center gap-2">

                <i data-lucide="send" class="w-4 h-4"></i>
                Kirim Pesan

            </button>

        </form>

        <?php if(isset($success) && $success == true){ ?>

            <div class="mt-4 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm flex items-center gap-2">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
                Pesan Anda berhasil terkirim!
            </div>

        <?php } ?>

    </div>
</div>




                </div>

            </div>
        </div>
    </section>

    