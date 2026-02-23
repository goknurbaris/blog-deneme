<?php $__env->startSection('title', 'Yazıyı Düzenle'); ?>

<?php $__env->startSection('content'); ?>
    <h1>📝 Yazıyı Düzenle</h1>
    <form action="<?php echo e(route('blog.update', $post->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <label>Başlık</label>
        <input type="text" name="title" value="<?php echo e($post->title); ?>" style="width:100%; padding:10px; margin:10px 0;" required>

        <label>İçerik</label>
        <textarea name="content" rows="10" style="width:100%; padding:10px; margin:10px 0;" required><?php echo e($post->content); ?></textarea>

        <button type="submit" style="background: #ffc107; color: black; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Güncelle 🔄</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\CASPER\Herd\blog-deneme\resources\views/blog/edit.blade.php ENDPATH**/ ?>