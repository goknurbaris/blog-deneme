<?php $__env->startSection('title', 'Ana Sayfa'); ?>

<?php $__env->startSection('content'); ?>
<div class="relative mb-16 px-8 py-20 rounded-[3.5rem] bg-gradient-to-br from-indigo-600 via-violet-600 to-purple-700 overflow-hidden shadow-[0_20px_50px_rgba(79,70,229,0.3)]">
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-indigo-400/20 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-2xl mx-auto text-center">
        <h1 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter italic">
            Bir Şeyler Keşfet. ✨
        </h1>

        <form action="<?php echo e(route('blog.index')); ?>" method="GET" class="relative group w-full max-w-2xl mx-auto">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                placeholder="Neler arıyorsun?"
                class="w-full pl-5 sm:pl-8 pr-20 sm:pr-32 py-4 sm:py-6 bg-white/10 border border-white/20 backdrop-blur-2xl rounded-2xl sm:rounded-3xl text-white placeholder-white/70 focus:outline-none focus:ring-4 focus:ring-white/30 focus:bg-white/20 transition-all duration-500 text-sm sm:text-lg shadow-2xl">

            <button type="submit" class="absolute right-2 sm:right-4 top-2 sm:top-4 bottom-2 sm:bottom-4 px-4 sm:px-8 bg-white text-indigo-600 rounded-xl sm:rounded-2xl font-black text-[10px] sm:text-xs uppercase tracking-widest hover:bg-indigo-50 hover:scale-105 transition-all active:scale-95 shadow-lg flex items-center justify-center">
                <span class="hidden sm:inline">ARA</span>
                <span class="sm:hidden text-base">🔍</span>
            </button>
        </form>

        <div class="mt-8 flex flex-wrap justify-center gap-4 text-white/90 text-xs font-bold uppercase tracking-widest">
            <a href="<?php echo e(route('blog.index', ['search' => 'Laravel'])); ?>" class="px-3 py-1 bg-white/10 rounded-full backdrop-blur-md hover:bg-white/30 transition-all cursor-pointer">#Laravel</a>
            <a href="<?php echo e(route('blog.index', ['search' => 'Tailwind'])); ?>" class="px-3 py-1 bg-white/10 rounded-full backdrop-blur-md hover:bg-white/30 transition-all cursor-pointer">#Tailwind</a>
            <a href="<?php echo e(route('blog.index', ['search' => 'Modern'])); ?>" class="px-3 py-1 bg-white/10 rounded-full backdrop-blur-md hover:bg-white/30 transition-all cursor-pointer">#Modern</a>
        </div>
    </div>
</div>

<div class="flex items-center gap-6 mb-12">
    <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter italic shrink-0 transition-colors duration-300">Son Yazılar</h2>
    <div class="h-[2px] w-full bg-slate-100 dark:bg-slate-800 rounded-full transition-colors duration-300"></div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div data-aos="fade-up" class="bg-white dark:bg-slate-800 rounded-[3rem] border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] dark:hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.4)] transition-all duration-500 overflow-hidden group flex flex-col h-full">

            <div class="h-60 bg-slate-200 dark:bg-slate-700 overflow-hidden relative transition-colors duration-300 shrink-0">
                <?php if($post->image): ?>
                    <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <?php else: ?>
                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-700 dark:to-slate-800 text-slate-300 dark:text-slate-500 transition-colors duration-300">
                        <span class="text-4xl mb-2">🖼️</span>
                        <span class="text-[10px] font-black uppercase tracking-widest">Görsel Yok</span>
                    </div>
                <?php endif; ?>
                <div class="absolute top-5 left-5">
                    <span class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-tighter text-indigo-600 dark:text-indigo-400 shadow-sm transition-colors duration-300">
                        <?php echo e($post->created_at->diffForHumans()); ?>

                    </span>
                </div>
            </div>

            <div class="p-8 flex flex-col flex-grow">
                <div class="inline-flex items-center gap-2.5 mb-5">
                    <div class="w-7 h-7 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-full flex items-center justify-center text-[11px] font-black uppercase transition-colors duration-300">
                        <?php echo e(substr($post->user->name, 0, 1)); ?>

                    </div>
                    <span class="text-xs font-bold text-slate-600 dark:text-slate-300 transition-colors duration-300"><?php echo e($post->user->name); ?></span>
                </div>

                <h3 class="text-xl font-extrabold text-slate-800 dark:text-white mb-4 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors leading-snug">
                    <a href="<?php echo e(route('blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a>
                </h3>

                <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-8 leading-relaxed font-medium italic transition-colors duration-300 flex-grow">
                    <?php echo e(strip_tags($post->content)); ?>

                </p>

                <div class="flex items-center justify-between pt-4 border-t border-slate-50 dark:border-slate-700 transition-colors duration-300">
                    <a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-black text-[11px] uppercase tracking-[0.2em] hover:tracking-[0.3em] transition-all">
                        OKUMAYA BAŞLA <span class="ml-2 text-lg leading-none">→</span>
                    </a>

                    <span class="text-slate-400 dark:text-slate-500 font-bold flex items-center gap-1 text-[10px] uppercase tracking-widest transition-colors duration-300">
                        ⏱️ <?php echo e($post->okuma_suresi); ?> dk okuma
                    </span>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-full py-24 text-center bg-white dark:bg-slate-800 rounded-[3rem] border border-dashed border-slate-200 dark:border-slate-700 transition-colors duration-300">
            <div class="text-5xl mb-4">🔍</div>
            <h3 class="text-lg font-bold text-slate-800 dark:text-white transition-colors duration-300">Henüz hiç yazı yok.</h3>
            <p class="text-slate-400 dark:text-slate-500 text-sm mt-1 transition-colors duration-300">Görünüşe göre ilk yazıyı senin paylaşman gerekiyor!</p>
            <a href="<?php echo e(route('blog.create')); ?>" class="inline-block mt-6 text-indigo-600 dark:text-indigo-400 font-bold text-sm underline transition-colors duration-300">İlk Yazını Yaz</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CASPER\Herd\blog-deneme\resources\views/blog/index.blade.php ENDPATH**/ ?>