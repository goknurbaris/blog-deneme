<?php $__env->startSection('title', 'Panelim'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto">
    <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter italic transition-colors">Panelim 🚀</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-2 font-medium transition-colors">Hoş geldin, <span class="text-indigo-600 dark:text-indigo-400"><?php echo e(auth()->user()->name); ?></span>! İşte istatistiklerin.</p>
        </div>
        <a href="<?php echo e(route('blog.create')); ?>" class="inline-flex items-center justify-center bg-indigo-600 text-white px-6 py-3 rounded-2xl text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100 dark:shadow-none">
            + Yeni Yazı Yaz
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div class="bg-white dark:bg-slate-800 p-8 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-md transition-all duration-300 group">
            <div class="text-slate-400 dark:text-slate-500 text-xs font-black uppercase tracking-widest mb-2 transition-colors">Sistemdeki Yazılar</div>
            <div class="flex items-end justify-between">
                <div class="text-5xl font-black text-indigo-600 dark:text-indigo-400 transition-colors"><?php echo e($toplamYazi); ?></div>
                <div class="text-3xl opacity-20 group-hover:scale-110 transition-transform duration-300">📝</div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 p-8 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-md transition-all duration-300 group">
            <div class="text-slate-400 dark:text-slate-500 text-xs font-black uppercase tracking-widest mb-2 transition-colors">Toplam Yazar</div>
            <div class="flex items-end justify-between">
                <div class="text-5xl font-black text-violet-600 dark:text-violet-400 transition-colors"><?php echo e($toplamYazar); ?></div>
                <div class="text-3xl opacity-20 group-hover:scale-110 transition-transform duration-300">✍️</div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 p-8 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-md transition-all duration-300 group">
            <div class="text-slate-400 dark:text-slate-500 text-xs font-black uppercase tracking-widest mb-2 transition-colors">Toplam Beğeni</div>
            <div class="flex items-end justify-between">
                <div class="text-5xl font-black text-rose-600 dark:text-rose-400 transition-colors"><?php echo e($toplamBegeni); ?></div>
                <div class="text-3xl opacity-20 group-hover:scale-110 transition-transform duration-300">❤️</div>
            </div>
        </div>
    </div>

    <div class="mb-6 flex items-center gap-4">
        <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tighter transition-colors">Benim Yazılarım</h2>
        <div class="h-[2px] flex-grow bg-slate-100 dark:bg-slate-800 rounded-full transition-colors"></div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden transition-colors duration-300">
        <?php $__empty_1 = true; $__currentLoopData = $benimYazilarim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yazi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 last:border-0 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 transition-all duration-300 hover:bg-slate-50 dark:hover:bg-slate-700/50">

                <div class="flex-1">
                    <a href="<?php echo e(route('blog.show', $yazi->slug)); ?>" class="text-lg font-bold text-slate-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors block mb-1">
                        <?php echo e($yazi->title); ?>

                    </a>
                    <div class="flex flex-wrap items-center text-xs text-slate-500 dark:text-slate-400 font-medium gap-3 transition-colors">
                        <span class="bg-slate-100 dark:bg-slate-900 px-2 py-1 rounded-md"><?php echo e($yazi->created_at->format('d.m.Y')); ?></span>
                        <span>❤️ <?php echo e($yazi->likes()->count()); ?> Beğeni</span>
                        <span>💬 <?php echo e($yazi->comments()->count()); ?> Yorum</span>
                    </div>
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a href="<?php echo e(route('blog.edit', $yazi->id)); ?>" class="flex-1 sm:flex-none text-center px-5 py-2.5 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition-colors">
                        Düzenle
                    </a>

                    <form action="<?php echo e(route('blog.destroy', $yazi->id)); ?>" method="POST" class="flex-1 sm:flex-none" onsubmit="return confirm('Bu yazıyı silmek istediğine emin misin? (Bu işlem geri alınamaz)');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" class="w-full text-center px-5 py-2.5 bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-rose-100 dark:hover:bg-rose-900/50 transition-colors">
                            Sil
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="p-16 text-center">
                <div class="text-5xl mb-4 opacity-50">📝</div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-white transition-colors mb-2">Henüz hiç yazı paylaşmamışsın.</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 transition-colors mb-6">Profilini canlandırmak için hemen bir şeyler karalamaya başla!</p>
                <a href="<?php echo e(route('blog.create')); ?>" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-black text-xs uppercase tracking-widest hover:text-indigo-700 transition-colors">
                    İlk Yazını Yaz →
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CASPER\Herd\blog-deneme\resources\views/dashboard.blade.php ENDPATH**/ ?>