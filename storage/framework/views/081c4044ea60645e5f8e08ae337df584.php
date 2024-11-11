<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'public/css/pages/article.css']); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($article->title); ?> - Blue Alert</title>
</head>

<body>
    <?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>

        <article>
            <section class="article-header">
                <div class="header-overlay">
                    <img src="<?php echo e(Storage::url($article->image)); ?>" alt="Article Background" class="background-image">
                    <div class="header-content">
                        <h1><?php echo e($article->title); ?></h1>
                        <p class="article-author">Written by <?php echo e($article->author->first_name); ?>

                            <?php echo e($article->author->last_name); ?> on
                            <?php echo e($article->created_at->format('M d, Y')); ?>

                        </p>
                    </div>
                </div>
            </section>

            <section class="article-content">
                <a href="/articles" class="back-button">← Back to Articles</a>
                <div class="article-body">
                    <?php echo nl2br(e($article->content)); ?>

                </div>

                <?php if($article->references && $article->references->isNotEmpty()): ?>
                    <div class="article-references">
                        <h3>References:</h3>
                        <ul>
                            <?php $__currentLoopData = $article->references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e($reference->url); ?>" target="_blank"><?php echo e($reference->description); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </section>
        </article>

    </main>

    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\loren\OneDrive\Documents\All Programming Projects\GROUPED PROJECTS\school projects\blue-alert\resources\views/pages/article.blade.php ENDPATH**/ ?>