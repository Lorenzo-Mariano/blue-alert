<?php echo app('Illuminate\Foundation\Vite')(['public/css/components/paginator.css']); ?>

<nav class="paginator">
    <?php if(!$paginator->onFirstPage()): ?>
        <a href="<?php echo e(url('/articles/' . ($paginator->currentPage() - 1))); ?>">
            <i class="iconoir-arrow-left-circle"></i>
        </a>
    <?php endif; ?>

    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <span class="disabled"><?php echo e($element); ?></span>
        <?php endif; ?>

        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <span class="active"><?php echo e($page); ?></span>
                <?php else: ?>
                    <a href="<?php echo e(url('/articles/' . $page)); ?>"><?php echo e($page); ?></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e(url('/articles/' . ($paginator->currentPage() + 1))); ?>">
            <i class="iconoir-arrow-right-circle"></i>
        </a>
    <?php endif; ?>
</nav>
<?php /**PATH C:\Users\loren\OneDrive\Documents\All Programming Projects\GROUPED PROJECTS\school projects\blue-alert\resources\views/components/paginator.blade.php ENDPATH**/ ?>