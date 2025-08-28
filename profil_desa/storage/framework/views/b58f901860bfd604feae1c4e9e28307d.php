

<?php $__env->startSection('content'); ?>

<!-- SVG Background Decoration -->
<div class="absolute top-0 left-0 w-screen h-[520px] z-10 overflow-hidden pointer-events-none">
    <svg xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 1440 320"
         class="w-full h-full"
         preserveAspectRatio="none">
        <path fill="#ffffff" fill-opacity="1"
              d="M0,32L80,42.7C160,53,320,75,480,80C640,85,800,75,960,69.3C1120,64,1280,64,1360,64L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
        </path>
    </svg>
</div>

<!-- Hero Section -->
<section class="relative w-full py-20 bg-green-600 z-0 shadow-inner">
    <br><br><br><br>
    <div class="max-w-4xl mx-auto text-center px-6">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Galeri Desa</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Potret kehidupan, budaya, dan keindahan alam desa dalam satu bingkai.
        </p>
    </div>
</section>

<div class="container mx-auto px-4 py-10">

    <!-- Galeri Gambar -->
    <section>
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Foto</h2>
        <div id="galeri-gambar" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="overflow-hidden rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl 
                    <?php echo e($index >= 9 ? 'hidden extra-gambar opacity-0 scale-95' : ''); ?>" data-aos="fade-up">
                    <img src="<?php echo e(asset('storage/galeri/'.$image->file)); ?>" 
                        alt="<?php echo e($image->title); ?>"
                        class="w-full h-64 object-cover cursor-pointer preview-img">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Tombol kontrol -->
        <div class="flex justify-center gap-4 mt-8">
            <button id="btn-expand" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full shadow transition duration-300">
                Lihat Lebih
            </button>
            <button id="btn-collapse" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-full shadow hidden transition duration-300">
                Tutup
            </button>
        </div>
    </section>

    <!-- Garis Pemisah -->
    <div class="my-16 border-t border-gray-300"></div>

    <!-- Galeri Video -->
    <section>
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Video</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition duration-300" data-aos="fade-up">
                    <video controls class="w-full h-64 object-cover">
                        <source src="<?php echo e(asset('storage/galeri/'.$video->file)); ?>" type="video/mp4">
                        Browser Anda tidak mendukung video.
                    </video>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</div>

<!-- Modal Preview -->
<div id="imgModal" 
    class="fixed inset-0 flex items-center justify-center backdrop-blur-md bg-white/30 
           opacity-0 pointer-events-none z-50 transition-opacity duration-300">
    <img id="modalImage" 
         class="max-h-[85vh] max-w-[90vw] rounded-lg shadow-xl border border-gray-200 
                transform scale-90 transition-transform duration-300">
</div>
<br><br><br>
<script>
    AOS.init({
        duration: 800,
        once: true
    });

// Preview Gambar dengan animasi fade & scale
const modal = document.getElementById("imgModal");
const modalImg = document.getElementById("modalImage");
const images = document.querySelectorAll(".preview-img");

// Buka modal
images.forEach(img => {
    img.addEventListener("click", () => {
        modalImg.src = img.src;
        modal.classList.remove("pointer-events-none", "opacity-0");
        modal.classList.add("opacity-100");
        modalImg.classList.remove("scale-90");
        modalImg.classList.add("scale-100");
    });
});

// Tutup modal kalau klik background (bukan gambar)
modal.addEventListener("click", (e) => {
    if (e.target !== modalImg) {
        modal.classList.remove("opacity-100");
        modal.classList.add("opacity-0", "pointer-events-none");
        modalImg.classList.remove("scale-100");
        modalImg.classList.add("scale-90");
    }
});

    // Expand & Collapse Logic dengan animasi
    const btnExpand = document.getElementById("btn-expand");
    const btnCollapse = document.getElementById("btn-collapse");
    const extraGambar = document.querySelectorAll(".extra-gambar");

    btnExpand.addEventListener("click", () => {
        let shown = 0;
        extraGambar.forEach((item) => {
            if (item.classList.contains("hidden") && shown < 9) {
                item.classList.remove("hidden");
                setTimeout(() => {
                    item.classList.remove("opacity-0", "scale-95");
                    item.classList.add("opacity-100", "scale-100");
                }, 10);
                shown++;
            }
        });

        // sembunyikan tombol jika habis
        const stillHidden = Array.from(extraGambar).some(el => el.classList.contains("hidden"));
        if (!stillHidden) {
            btnExpand.classList.add("hidden");
        }
        btnCollapse.classList.remove("hidden");
    });

    btnCollapse.addEventListener("click", () => {
        extraGambar.forEach((item) => {
            if (!item.classList.contains("hidden")) {
                item.classList.remove("opacity-100", "scale-100");
                item.classList.add("opacity-0", "scale-95");
                setTimeout(() => {
                    item.classList.add("hidden");
                }, 300);
            }
        });
        btnExpand.classList.remove("hidden");
        btnCollapse.classList.add("hidden");
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Jopu\Downloads\profil_desa\profil_desa\resources\views/galeri.blade.php ENDPATH**/ ?>