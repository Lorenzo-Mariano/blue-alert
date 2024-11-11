<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'public/css/pages/welcome.css']); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Fight Water Pollution</title>

</head>

<body>
    <?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main>
        <header class="shadow-1">
            <h1 class="motto">
                Protecting our rivers, protecting our future.
            </h1>
            <div class="invite">
                <h4>Join the movement</h4>
                <span>Join us in preserving the lifeblood of our ecosystems and communities</span><br>
                <a href="/get-involved">Join Now</a>
            </div>
        </header>
        <section class="starter shadow-bottom">
            <div class="welcome">
                <h3>Welcome to Blue Alert</h3>
                <p class="shadow-1">
                    We are dedicated to protecting and restoring rivers through waste pollution monitoring, community
                    clean-up efforts, and promoting sustainable practices. Our waste monitoring program empowers
                    everyone to fight water pollution.
                </p>
            </div>
            <div class="mission">
                <h3>Mission</h3>
                <p class="shadow-1">
                    Our mission is to advocate for the protection and restoration of rivers through
                    grassroots action, policy change and education. We work to ensure that rivers thrive for the people,
                    wildlife and ecosystems that depend on them.
                </p>
            </div>
        </section>
        <section class="services">
            <h2 class="services-label">Services</h2>
            <div class="service-list">
                <div class="river-health-monitoring">
                    <h3>River Health Monitoring</h3>
                    <p>
                        Provides real-time data and reports on the quality of river water,
                        including metrics like pH, turbidity, and pollutant levels.
                    </p>
                </div>
                <div class="community-engagement">
                    <h3>Community Engagement</h3>
                    <p>
                        Provides platforms for community discussions, forums, and events focused
                        on river conservation and waste management.
                    </p>
                </div>
                <div class="advocacy-and-campaigns">
                    <h3>Advocacy and Campaigns</h3>
                    <p>
                        Promotes initiatives and campaigns aimed at protecting rivers and
                        reducing pollution. This might include petitions, awareness programs, and collaboration with
                        local
                        communities.
                    </p>
                </div>
                <div class="educational-resources">
                    <h3>Educational Resources</h3>
                    <p>
                        Offers information on river ecosystems, pollution impacts, and ways
                        individuals can contribute to river conservation.
                    </p>
                </div>
            </div>

        </section>
    </main>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\loren\OneDrive\Documents\All Programming Projects\GROUPED PROJECTS\school projects\blue-alert\resources\views/pages/welcome.blade.php ENDPATH**/ ?>