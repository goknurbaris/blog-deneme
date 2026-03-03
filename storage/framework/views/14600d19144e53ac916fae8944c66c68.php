<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h2 class="text-2xl font-extrabold text-slate-900 mb-6 text-center">Tekrar Hoş Geldin! 👋</h2>

    <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-5">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 ml-1">E-Posta Adresi</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                placeholder="ornek@mail.com">
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-1 ml-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-1 ml-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 ml-1">Şifre</label>
            <input type="password" name="password" required
                class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                placeholder="••••••••">
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-1 ml-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-1 ml-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
        </div>

        <div class="flex items-center justify-between text-sm px-1">
            <label class="flex items-center cursor-pointer group">
                <input type="checkbox" name="remember" class="rounded-md border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <span class="ms-2 text-slate-600 group-hover:text-slate-900 transition">Beni hatırla</span>
            </label>
            <a href="<?php echo e(route('password.request')); ?>" class="font-semibold text-indigo-600 hover:text-indigo-700 transition">Şifremi Unuttum?</a>
        </div>

        <button type="submit" class="w-full bg-slate-900 hover:bg-indigo-600 text-white font-bold py-4 rounded-2xl transition-all duration-300 transform active:scale-[0.98] shadow-lg shadow-slate-200">
            Giriş Yap
        </button>

        <p class="text-center text-slate-500 text-sm mt-6">
            Hesabın yok mu?
            <a href="<?php echo e(route('register')); ?>" class="font-bold text-indigo-600 hover:underline">Hemen Kayıt Ol</a>
        </p>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\Users\CASPER\Herd\blog-deneme\resources\views/auth/login.blade.php ENDPATH**/ ?>