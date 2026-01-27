<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - JU 45</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { ju: { red: '#C64136', gold: '#D4AF37', cream: '#F9F7F2', charcoal: '#1F2937' } },
                fontFamily: { serif: ['Playfair Display', 'serif'], calligraphy: ['Great Vibes', 'cursive'] } }
            }
        }
    </script>
</head>
<body class="bg-ju-cream text-ju-charcoal">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-ju-charcoal/95 backdrop-blur-xl text-white py-3 px-6 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="index.html" class="flex items-center gap-3 group">
                <div class="bg-white p-1 rounded-lg border border-ju-gold shadow-lg">
                    <img src="favicon.png" onerror="this.src='https://placehold.co/40x40?text=JU45'" class="h-8 w-8 object-contain">
                </div>
                <span class="font-calligraphy text-2xl md:text-3xl text-ju-gold">JU 45</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-6 text-[11px] uppercase tracking-[0.2em] font-medium text-gray-300">
                <a href="index.html" class="hover:text-ju-gold transition-all">Home</a>
                <a href="manifesto.html" class="hover:text-ju-gold transition-all">Manifesto</a>
                <a href="memories.php" class="text-white border-b border-ju-gold pb-1">Gallery</a>
                <a href="ai-tools.html" class="hover:text-ju-gold transition-all">AI Tools</a>
                <a href="https://rag.ju45th.com" target="_blank" class="text-ju-red font-bold hover:text-white transition-all">RAG 45</a>
            </div>
            
            <button id="mobile-menu-btn" class="md:hidden text-2xl text-ju-gold focus:outline-none"><i class="fas fa-bars"></i></button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-gray-900/98 z-[60] transform translate-x-full transition-transform duration-300 md:hidden flex flex-col justify-center items-center space-y-8 backdrop-blur-lg">
        <button id="close-menu-btn" class="absolute top-6 right-6 text-white text-4xl hover:text-ju-red"><i class="fas fa-times"></i></button>
        <a href="index.html" class="text-2xl text-white font-serif hover:text-ju-gold tracking-widest">HOME</a>
        <a href="manifesto.html" class="text-2xl text-white font-serif hover:text-ju-gold tracking-widest">MANIFESTO</a>
        <a href="memories.php" class="text-2xl text-white font-serif hover:text-ju-gold tracking-widest">GALLERY</a>
        <a href="ai-tools.html" class="text-2xl text-white font-serif hover:text-ju-gold tracking-widest">AI TOOLS</a>
    </div>

    <header class="pt-32 pb-12 text-center px-4">
        <h1 class="font-serif text-5xl font-bold text-ju-charcoal mb-2" data-aos="fade-down">Golden Memories</h1>
        <p class="text-xs uppercase tracking-[0.3em] text-gray-500">Archive of Batch 45</p>
    </header>

    <section class="max-w-7xl mx-auto px-4 pb-20">
        <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
            <?php
            $folder = 'gallery/'; 
            $hasImages = false;

            if (is_dir($folder)) {
                $files = scandir($folder);
                foreach ($files as $file) {
                    // Fix: Case Insensitive Check (jpg, JPG, png, PNG)
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                        $hasImages = true;
                        echo '
                        <div class="break-inside-avoid mb-6 group relative overflow-hidden rounded-xl shadow-md hover:shadow-2xl transition-all duration-300" data-aos="fade-up">
                            <a href="'.$folder.$file.'" data-lightbox="ju-gallery">
                                <img src="'.$folder.$file.'" alt="Memory" class="w-full h-auto transform group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="text-white font-serif italic border border-white px-4 py-2 rounded-full">View</span>
                                </div>
                            </a>
                        </div>';
                    }
                }
            }
            
            // Fallback Message if No Images Found
            if (!$hasImages) {
                echo '<div class="col-span-3 text-center py-12 bg-white rounded-xl border border-dashed border-gray-300">';
                echo '<i class="fas fa-images text-4xl text-gray-300 mb-4"></i>';
                echo '<p class="text-gray-500">No images found in <strong>public_html/gallery/</strong>.</p>';
                echo '<p class="text-xs text-gray-400 mt-2">Please upload images via File Manager.</p>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        function toggleMenu() { mobileMenu.classList.toggle('translate-x-full'); document.body.style.overflow = mobileMenu.classList.contains('translate-x-full') ? 'auto' : 'hidden'; }
        if(menuBtn) menuBtn.addEventListener('click', toggleMenu);
        if(closeMenuBtn) closeMenuBtn.addEventListener('click', toggleMenu);
    </script>
</body>
</html>