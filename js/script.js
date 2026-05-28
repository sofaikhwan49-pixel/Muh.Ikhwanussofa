/* STREAMING_CHUNK: Menyusun logika JavaScript terpisah... */
// Tunggu sampai DOM sepenuhnya siap
document.addEventListener("DOMContentLoaded", () => {
    
    // Inisialisasi ikon Lucide
    lucide.createIcons();

    // --- LOGIKA MENU MOBILE ---
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            const isHidden = mobileMenu.classList.contains('hidden');
            
            // Mengubah ikon garis tiga (menu) menjadi silang (x) saat terbuka
            menuBtn.innerHTML = isHidden 
                ? '<i data-lucide="menu" class="w-6 h-6"></i>' 
                : '<i data-lucide="x" class="w-6 h-6"></i>';
            lucide.createIcons();
        });
    }

    // Menutup menu mobile otomatis setelah klik salah satu menu
    const mobileLinks = document.querySelectorAll('.mobile-link');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (mobileMenu && menuBtn) {
                mobileMenu.classList.add('hidden');
                menuBtn.innerHTML = '<i data-lucide="menu" class="w-6 h-6"></i>';
                lucide.createIcons();
            }
        });
    });

    // --- LOGIKA PENYARINGAN PORTFOLIO (FILTER) ---
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Ubah tampilan tombol aktif
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-brand-gold', 'text-black');
                b.classList.add('bg-white/5', 'text-brand-lightText');
            });
            btn.classList.add('active', 'bg-brand-gold', 'text-black');
            btn.classList.remove('bg-white/5', 'text-brand-lightText');

            const filterValue = btn.getAttribute('data-filter');

            // Tampilkan atau sembunyikan item portfolio berdasarkan kategori
            portfolioItems.forEach(item => {
                const category = item.getAttribute('data-category');
                if (filterValue === 'all' || category === filterValue) {
                    item.style.display = 'block';
                    setTimeout(() => { item.style.opacity = '1'; }, 50);
                } else {
                    item.style.opacity = '0';
                    setTimeout(() => { item.style.display = 'none'; }, 200);
                }
            });
        });
    });

    // --- PENANGANAN SUBMIT FORMULIR KONTAK ---
    const form = document.getElementById('contactForm');
    const toast = document.getElementById('toast');

    if (form && toast) {
        form.addEventListener('submit', (e) => {
            e.preventDefault(); // Mencegah browser reload halaman
            
            // Menampilkan pesan sukses
            toast.classList.remove('hidden');
            form.reset(); // Mengosongkan isian form kembali
            
            // Sembunyikan pesan sukses secara otomatis setelah 6 detik
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 6000);
        });
    }
});