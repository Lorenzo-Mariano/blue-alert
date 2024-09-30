<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Blue Alert</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'public/css/pages/articles.css', 'public/css/components/article-filters.css', 'public/css/components/article-preview.css'])
</head>
<body>
    @include('components.navbar')

    <section class="about-us">

        <div class="about-header">
            <h1>About Us</h1>

            <div class="Log-In">
                <a href="login">Log In</a>
                <a href="signup">Sign Up</a>
            </div>
        </div>

        <h2>Our Mission</h2>
        <p>Blue Alert’s mission is to educate and empower Filipinos to<br> combat water pollution, particularly river waste.By raising</br> awareness and promoting better practices, the organization<br> seeks to protect the ocean,a vital resource for food,</br> livelihoods, and marine life, for future generations.</p>
        
        <h2>Our Vision</h2>
        <p>To create a future where the oceans are<br> free from plastic pollution, thriving</br> with marine life,and protected by a<br> generation of environmentally-conscious</br> Filipinos who actively safeguard our marine ecosystems.</p>


        <div class="social-media">
            <h3>Follow Us On</h3> 
            <a href="https://facebook.com"> <i class="fa-brands fa-facebook"></i></a>
            <a href="https://instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://twitter.com"><i class="fa-brands fa-twitter"></i></a>
        </div>
    </section>

    @include('components.footer')
</body>
</html>
