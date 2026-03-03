<?php $__env->startSection('title', 'Yeni Yazı Yaz'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <div class="mb-10 flex items-center gap-4">
        <a href="<?php echo e(route('dashboard')); ?>" class="w-12 h-12 flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors shadow-sm text-slate-400 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400">
            <span class="text-xl">←</span>
        </a>
        <h1 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter italic transition-colors">Yeni Yazı Yaz ✍️</h1>
    </div>

    <form action="<?php echo e(route('blog.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-slate-800 p-10 rounded-[3rem] shadow-sm border border-slate-100 dark:border-slate-700 transition-colors duration-300">
        <?php echo csrf_field(); ?>

        <div class="mb-8">
            <label for="title" class="block text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest mb-3 pl-1 transition-colors">Yazı Başlığı</label>
            <input type="text" name="title" id="title" required placeholder="İlgi çekici bir başlık düşün..."
                class="w-full bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-2xl px-6 py-5 focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all text-lg font-bold text-slate-700 dark:text-white placeholder-slate-400 dark:placeholder-slate-500">
        </div>

        <div class="mb-8">
            <label for="image" class="block text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest mb-3 pl-1 transition-colors">Kapak Görseli</label>
            <input type="file" name="image" id="image" required
                class="w-full bg-slate-50 dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-700 rounded-2xl px-6 py-4 focus:outline-none focus:border-indigo-500 text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-indigo-50 dark:file:bg-indigo-900/50 file:text-indigo-700 dark:file:text-indigo-400 hover:file:bg-indigo-100 dark:hover:file:bg-indigo-900 transition-all cursor-pointer">
        </div>

        <div class="mb-10">
            <label for="content" class="block text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest mb-3 pl-1 transition-colors">Yazı İçeriği</label>
            <textarea name="content" id="editor" rows="12"></textarea>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-100 dark:border-slate-700 mt-8 transition-colors">
            <button type="submit" class="flex-grow bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white font-black py-5 rounded-2xl transition-all shadow-lg shadow-indigo-200 dark:shadow-none active:scale-95 uppercase tracking-widest text-xs">
                YAZIYI YAYINLA 🚀
            </button>

            <a href="<?php echo e(route('dashboard')); ?>" class="px-8 py-5 bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-black rounded-2xl text-xs uppercase tracking-widest hover:border-rose-300 dark:hover:border-rose-500 hover:text-rose-600 dark:hover:text-rose-400 transition-all active:scale-95 shadow-sm">
                İPTAL ET
            </a>
        </div>
    </form>
</div>

<style>
    /* AYDINLIK MOD (Varsayılan) CKEDITOR GÖRÜNÜMÜ */
    .ck-editor__editable_inline {
        min-height: 400px;
        border-radius: 0 0 1.5rem 1.5rem !important;
        background-color: #f8fafc !important;
        border-color: #f1f5f9 !important;
        color: #334155 !important;
    }
    .ck-toolbar {
        border-radius: 1.5rem 1.5rem 0 0 !important;
        background-color: #f8fafc !important;
        border-color: #f1f5f9 !important;
    }

    /* KARANLIK MOD (Dark Mode) CKEDITOR GÖRÜNÜMÜ - html etiketinde dark sınıfı varken çalışır */
    html.dark .ck-editor__editable_inline {
        background-color: #0f172a !important; /* bg-slate-900 */
        border-color: #334155 !important; /* border-slate-700 */
        color: #f8fafc !important; /* text-white */
    }
    html.dark .ck-toolbar {
        background-color: #1e293b !important; /* bg-slate-800 */
        border-color: #334155 !important; /* border-slate-700 */
    }
    html.dark .ck.ck-button, html.dark .ck.ck-button * {
        color: #cbd5e1 !important; /* toolbar ikon renkleri */
    }
    html.dark .ck.ck-button:hover, html.dark .ck.ck-button.ck-on {
        background-color: #334155 !important; /* ikon hover rengi */
    }
    html.dark .ck.ck-toolbar__separator {
        background-color: #475569 !important;
    }
    /* Editör içindeki linklerin karanlık modda görünümü */
    html.dark .ck-content a {
        color: #818cf8 !important; /* text-indigo-400 */
    }
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
        })
        .catch(error => { console.error(error); });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CASPER\Herd\blog-deneme\resources\views/blog/create.blade.php ENDPATH**/ ?>