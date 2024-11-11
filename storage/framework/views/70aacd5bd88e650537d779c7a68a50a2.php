<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Alert - Fight Water Pollution</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'public/css/pages/about-us.css']); ?>
</head>

<body>
    <?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <h1>About Us</h1>

        <section class="mission">
            <h2>Our Mission</h2>
            <p>
                Our mission is to educate and empower Filipinos to combat water pollution, particularly river
                waste.By raising awareness and promoting better practices, the organization seeks to protect the
                ocean,a vital resource for food, livelihoods, and marine life, for future generations.
            </p>
        </section>

        <section class="vision">
            <h2>Our Vision</h2>
            <p>
                To create a future where the oceans are free from plastic pollution, thriving with marine life,and
                protected by a generation of environmentally conscious Filipinos who actively safeguard our marine
                ecosystems.
            </p>
        </section>

        <section class="social-media">
            
            <h3>Follow Us On</h3>
            <a href="https://facebook.com">
                <i class="iconoir-facebook"></i>
            </a>
            <a href="https://twitter.com">
                <i class="iconoir-twitter"></i>
            </a>
            <a href="https://instagram.com">
                <i class="iconoir-instagram"></i>
            </a>
        </section>
    </main>

    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\loren\OneDrive\Documents\All Programming Projects\GROUPED PROJECTS\school projects\blue-alert\resources\views/pages/about-us.blade.php ENDPATH**/ ?>