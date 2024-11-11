<?php echo app('Illuminate\Foundation\Vite')(['public/css/components/article-preview.css']); ?>

<div class="blog-preview">
    <a href="<?php echo e(url('/article/' . $article->id)); ?>">
        <div class="img-wrapper">
            <img src="<?php echo e(Storage::url($article->image)); ?>" alt="blog-image">
        </div>
        <h3 class="title"><?php echo e($article->title); ?></h3>
    </a>
</div>
<?php /**PATH C:\Users\loren\OneDrive\Documents\All Programming Projects\GROUPED PROJECTS\school projects\blue-alert\resources\views/components/article-preview.blade.php ENDPATH**/ ?>