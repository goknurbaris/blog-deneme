<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
<div class="fixed top-0 left-0 w-full h-1.5 z-[60] bg-transparent">
    <div id="progress-bar" class="h-full bg-gradient-to-r from-indigo-500 to-violet-600 w-0 rounded-r-full transition-all duration-150"></div>
</div>

<div class="max-w-4xl mx-auto bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-800 overflow-hidden mt-6 transition-colors duration-300">
    <?php if($post->image): ?>
        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="w-full h-80 sm:h-96 object-cover" alt="<?php echo e($post->title); ?>">
    <?php endif; ?>

    <div class="p-8 sm:p-12">
        <div class="flex flex-wrap items-center text-sm text-gray-500 dark:text-slate-400 mb-6 gap-3 transition-colors">
            <span class="bg-indigo-100 dark:bg-indigo-900/50 text-indigo-800 dark:text-indigo-300 text-xs font-bold px-3 py-1 rounded-full transition-colors">
                <?php echo e($post->category->name ?? 'Genel'); ?>

            </span>
            <span>•</span>
            <span class="font-semibold text-gray-700 dark:text-slate-300 flex items-center transition-colors">👤 <?php echo e($post->user->name); ?></span>
            <span>•</span>
            <span class="flex items-center">📅 <?php echo e($post->created_at->format('d.m.Y')); ?></span>

            <span>•</span>

            <span class="bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 px-3 py-1 rounded-full text-xs font-black tracking-widest uppercase flex items-center gap-1 shadow-sm transition-colors duration-300">
                ⏱️ <?php echo e($post->okuma_suresi); ?> DK OKUMA
            </span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 dark:text-white mb-8 leading-tight transition-colors">
            <?php echo e($post->title); ?>

        </h1>

        <div class="prose prose-lg prose-indigo dark:prose-invert max-w-none text-gray-700 dark:text-slate-300 mb-12 transition-colors">
            <?php echo $post->content; ?>

        </div>

        <div class="mt-12 border-t border-gray-100 dark:border-slate-800 pt-8 flex flex-col md:flex-row md:items-center justify-between gap-6 transition-colors">
            <div>
                <h4 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-widest mb-3 transition-colors">Bu yazıyı paylaş:</h4>
                <div class="flex items-center gap-3">
                    <a href="https://api.whatsapp.com/send?text=<?php echo e(urlencode($post->title . ' ' . url()->current())); ?>" target="_blank"
                       class="w-10 h-10 rounded-full bg-[#25D366] text-white flex items-center justify-center hover:scale-110 transition shadow-lg">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 0 5.414 0 12.05c0 2.123.553 4.197 1.603 6.034L0 24l6.105-1.602a11.832 11.832 0 005.944 1.601h.005c6.637 0 12.05-5.414 12.05-12.05a11.833 11.833 0 00-3.641-8.52z"/></svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($post->title)); ?>&url=<?php echo e(url()->current()); ?>" target="_blank"
                       class="w-10 h-10 rounded-full bg-black dark:bg-slate-700 text-white flex items-center justify-center hover:scale-110 transition shadow-lg">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>

            <?php if(auth()->guard()->check()): ?>
                <button onclick="toggleLike(<?php echo e($post->id); ?>)" id="like-btn-<?php echo e($post->id); ?>"
                        class="flex items-center gap-3 px-6 py-3 rounded-2xl transition-all shadow-sm active:scale-95 group border <?php echo e($post->isLikedBy(auth()->user()) ? 'bg-rose-50 dark:bg-rose-900/30 border-rose-100 dark:border-rose-800 text-rose-600 dark:text-rose-400' : 'bg-white dark:bg-slate-800 border-gray-200 dark:border-slate-700 text-gray-500 dark:text-slate-400 hover:bg-rose-50 dark:hover:bg-rose-900/30 hover:border-rose-100 dark:hover:border-rose-800 hover:text-rose-600 dark:hover:text-rose-400'); ?>">
                    <span id="like-icon-<?php echo e($post->id); ?>" class="text-2xl transition-transform group-hover:scale-110">
                        <?php echo e($post->isLikedBy(auth()->user()) ? '❤️' : '🤍'); ?>

                    </span>
                    <div class="flex flex-col items-start leading-none">
                        <span class="text-[10px] font-bold uppercase tracking-widest">BEĞEN</span>
                        <span id="like-count-<?php echo e($post->id); ?>" class="text-sm font-extrabold"><?php echo e($post->likes()->count()); ?></span>
                    </div>
                </button>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="flex items-center gap-3 bg-gray-50 dark:bg-slate-800/50 text-gray-400 dark:text-slate-500 px-6 py-3 rounded-2xl border border-gray-200 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-800 transition">
                    <span class="text-2xl grayscale opacity-50">🤍</span>
                    <div class="flex flex-col items-start leading-none">
                        <span class="text-[10px] font-bold uppercase tracking-widest">BEĞENMEK İÇİN</span>
                        <span class="text-sm font-extrabold">Giriş Yap</span>
                    </div>
                </a>
            <?php endif; ?>
        </div>

        <div class="mt-16 border-t border-gray-100 dark:border-slate-800 pt-10 transition-colors">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 flex items-center transition-colors">
                💬 Yorumlar <span class="ml-3 bg-gray-100 dark:bg-slate-800 text-gray-600 dark:text-slate-300 text-sm px-3 py-1 rounded-full transition-colors"><?php echo e($post->comments->count()); ?></span>
            </h3>

            <div class="bg-gray-50 dark:bg-slate-800/50 rounded-2xl p-6 mb-10 border border-gray-100 dark:border-slate-700 transition-colors">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 transition-colors">Bir yorum bırakın</h4>
                <form action="<?php echo e(route('comment.store', $post->id)); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <div>
                        <input type="text" name="user_name" placeholder="Adınız Soyadınız" required
                               class="w-full px-4 py-3 bg-white dark:bg-slate-900 rounded-xl border border-gray-200 dark:border-slate-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition shadow-sm">
                    </div>
                    <div>
                        <textarea name="content" rows="4" placeholder="Düşüncelerinizi paylaşın..." required
                                  class="w-full px-4 py-3 bg-white dark:bg-slate-900 rounded-xl border border-gray-200 dark:border-slate-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-slate-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition shadow-sm"></textarea>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-indigo-700 transition shadow-md shadow-indigo-100 dark:shadow-none">
                        Yorumu Gönder
                    </button>
                </form>
            </div>

            <div class="space-y-6">
                <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex space-x-4 p-6 bg-white dark:bg-slate-800 rounded-2xl border border-gray-50 dark:border-slate-700 shadow-sm hover:shadow-md dark:hover:shadow-[0_10px_30px_-15px_rgba(0,0,0,0.5)] transition">
                        <div class="flex-shrink-0">
                            <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($comment->user_name)); ?>&background=random&color=fff"
                                 class="w-12 h-12 rounded-full shadow-inner" alt="<?php echo e($comment->user_name); ?>">
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-center mb-2">
                                <h5 class="font-bold text-gray-900 dark:text-white transition-colors"><?php echo e($comment->user_name); ?></h5>
                                <span class="text-xs text-gray-400 dark:text-slate-500 font-medium italic transition-colors"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                            </div>
                            <p class="text-gray-600 dark:text-slate-300 leading-relaxed transition-colors"><?php echo e($comment->content); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center py-10 bg-gray-50 dark:bg-slate-800/50 rounded-2xl border border-dashed border-gray-200 dark:border-slate-700 transition-colors">
                        <p class="text-gray-500 dark:text-slate-400 italic transition-colors">Henüz yorum yapılmamış. İlk yorumu sen yapmaya ne dersin? 😊</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mt-12 border-t border-gray-100 dark:border-slate-800 pt-8 flex justify-between items-center transition-colors">
            <a href="<?php echo e(route('blog.index')); ?>" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium transition flex items-center group">
                <span class="mr-2 group-hover:-translate-x-1 transition-transform">&larr;</span> Listeye Dön
            </a>
        </div>
    </div>
</div>

<script>
    // Okuma Çubuğu Scripti
    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById('progress-bar').style.width = scrolled + '%';
    });

    // Beğeni AJAX Scripti (Karanlık Mod Sınıflarıyla Güncellendi)
    async function toggleLike(postId) {
        const btn = document.getElementById(`like-btn-${postId}`);
        const icon = document.getElementById(`like-icon-${postId}`);
        const countSpan = document.getElementById(`like-count-${postId}`);

        try {
            const response = await fetch(`/blog/${postId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (data.status === 'success') {
                if (data.liked) {
                    icon.innerText = '❤️';
                    // Aydınlık ve Karanlık boş kalp sınıflarını sil
                    btn.classList.remove('bg-white', 'border-gray-200', 'text-gray-500', 'dark:bg-slate-800', 'dark:border-slate-700', 'dark:text-slate-400');
                    // Aydınlık ve Karanlık dolu kalp sınıflarını ekle
                    btn.classList.add('bg-rose-50', 'border-rose-100', 'text-rose-600', 'dark:bg-rose-900/30', 'dark:border-rose-800', 'dark:text-rose-400');
                } else {
                    icon.innerText = '🤍';
                    // Aydınlık ve Karanlık dolu kalp sınıflarını sil
                    btn.classList.remove('bg-rose-50', 'border-rose-100', 'text-rose-600', 'dark:bg-rose-900/30', 'dark:border-rose-800', 'dark:text-rose-400');
                    // Aydınlık ve Karanlık boş kalp sınıflarını ekle
                    btn.classList.add('bg-white', 'border-gray-200', 'text-gray-500', 'dark:bg-slate-800', 'dark:border-slate-700', 'dark:text-slate-400');
                }
                countSpan.innerText = data.count;
            }
        } catch (error) {
            console.error('Hata:', error);
            alert('Bir hata oluştu, lütfen tekrar deneyin.');
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CASPER\Herd\blog-deneme\resources\views/blog/show.blade.php ENDPATH**/ ?>