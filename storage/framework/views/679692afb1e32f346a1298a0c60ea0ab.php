<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Laravel Blog'); ?></title>

    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
        /* Editörün yüksekliğini ayarlıyoruz */
        .ck-editor__editable_inline { min-height: 250px; }
    </style>
</head>
<body class="text-gray-800 antialiased flex flex-col min-h-screen">

    <nav class="bg-white shadow-sm border-b border-gray-100 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="<?php echo e(route('blog.index')); ?>" class="text-xl font-bold text-indigo-600 hover:text-indigo-800 transition">
                        🚀 Blog Projem
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="<?php echo e(route('blog.index')); ?>" class="text-gray-600 hover:text-gray-900 font-medium">Ana Sayfa</a>

                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <a href="<?php echo e(route('login')); ?>" class="text-gray-600 hover:text-gray-900 font-medium">Giriş Yap</a>
                        <?php endif; ?>
                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition shadow-sm">Kayıt Ol</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('blog.create')); ?>" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition shadow-sm">
                            + Yeni Yazı Ekle
                        </a>
                        <span class="text-gray-500 font-medium ml-4">👤 <?php echo e(Auth::user()->name); ?></span>

                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline ml-2">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm transition">Çıkış</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 flex-grow w-full">
        <?php if(session('basari')): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                <p><?php echo e(session('basari')); ?></p>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\CASPER\Herd\blog-deneme\resources\views/layouts/app.blade.php ENDPATH**/ ?>