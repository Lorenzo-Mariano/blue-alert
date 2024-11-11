<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'public/css/components/navbar.css']); ?>

<nav class="navbar">
    <a href="/" class="<?php echo e(Request::is('/') ? 'active' : ''); ?>">Home</a>
    <a href="/about-us" class="<?php echo e(Request::is('about-us') ? 'active' : ''); ?>">About Us</a>
    <a href="/articles/1" class="<?php echo e(Request::is('articles') ? 'active' : ''); ?>">Articles</a>
    <a href="/get-involved" class="<?php echo e(Request::is('get-involved') ? 'active' : ''); ?>">Get Involved</a>
</nav>
<?php /**PATH C:\Users\loren\OneDrive\Documents\All Programming Projects\GROUPED PROJECTS\school projects\blue-alert\resources\views/components/navbar.blade.php ENDPATH**/ ?>