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

                        <?php if($article->is_restricted): ?>
                            <div class="restriction-message">
                                <p>This article is restricted. It is not accessible to users other than the author and
                                    the admins.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <section class="article-content">
                <div class="links">
                    <a href="/articles" class="back-button">← Back to Articles</a>

                    <?php if(Auth::check() && Auth::user()->is_admin): ?>
                        <div class="admin-option">
                            <i class="iconoir-minus-hexagon"></i>
                            <a href="<?php echo e(route('admin.reasonForm', ['action' => 'banUser', 'id' => $article->author_id])); ?>"
                                class="ban-user-button">
                                Ban User
                            </a>
                        </div>

                        <div class="admin-option">
                            <i class="iconoir-lock"></i>
                            <a href="<?php echo e(route('admin.reasonForm', ['action' => 'restrictPost', 'id' => $article->id])); ?>"
                                class="restrict-post-button">
                                Restrict Post
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if(Auth::check() && Auth::id() === $article->author_id): ?>
                        <div class="edit">
                            <i class="iconoir-edit-pencil"></i>
                            <a href="<?php echo e(route('articles.edit', $article->id)); ?>" class="edit-button">Edit Article</a>
                        </div>

                        <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST"
                            style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="delete-button"
                                onclick="return confirm('Are you sure you want to delete this article?')">
                                <i class="iconoir-trash"></i> Delete Article
                            </button>
                        </form>
                    <?php endif; ?>
                </div>


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