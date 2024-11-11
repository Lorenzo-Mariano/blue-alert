<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'public/css/pages/articles.css']); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Fight Water Pollution</title>
</head>

<body>
    <?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <div class="left-panel">
            <?php if(Auth::check()): ?>
                <?php echo $__env->make('components.article-controls', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <hr>
            <?php endif; ?>
            <?php echo $__env->make('components.article-filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="content">
            <?php if($hasArticles): ?>
                <div class="blogs">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('components.article-preview', ['article' => $article], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="msg-wrapper">
                    <h1 class="no-articles shadow-1">No articles have been posted yet. Check back later!</h1>
                </div>
            <?php endif; ?>

            <div class="pagination">
                <?php echo e($articles->links()); ?>

            </div>

        </div>
    </main>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\loren\OneDrive\Documents\All Programming Projects\GROUPED PROJECTS\school projects\blue-alert\resources\views/pages/articles.blade.php ENDPATH**/ ?>