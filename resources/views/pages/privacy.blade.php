<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Alert - Fight Water Pollution</title>
    @vite(['resources/css/app.css', 'public/css/pages/privacy.css'])
    <link rel="stylesheet" href="styles.css"> <!-- Include additional custom styles if necessary -->
</head>

<body>
    <!-- Include Navigation Bar -->
    @include('components.navbar')

    <main>
        <div class="container">
            <h1>Privacy Policy & Terms and Conditions</h1>

            <!-- Form for Acceptance of Policies -->
            <form id="accept-form" action="#" method="post">
                <section class="policy">
                    <h2>Privacy Policy</h2>

                    <div class="policy-section">
                        <h3>1. Introduction</h3>
                        <p>Welcome to Blue Alert. We value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.</p>
                    </div>

                    <div class="policy-section">
                        <h3>2. Information We Collect</h3>
                        <p><strong>Personal Data:</strong> When you visit our website, we may collect personal information, such as name, email address, and contact information.</p>
                        <p><strong>Non-Personal Data:</strong> We also collect non-personal information, such as browser information, device information, and usage data.</p>
                    </div>

                    <div class="policy-section">
                        <h3>3. How We Use Your Information</h3>
                        <p>We may use your information for the following purposes:</p>
                        <ul>
                            <li>To provide and maintain our services</li>
                            <li>To communicate with you, including responding to inquiries and sending updates</li>
                            <li>To improve our website, services, and user experience</li>
                            <li>To analyze trends and site usage</li>
                            <li>To comply with legal requirements and protect our rights</li>
                        </ul>
                    </div>

                    <div class="policy-section">
                        <h3>4. Sharing Your Information</h3>
                        <p>We do not sell or rent your personal information. We may share your information with service providers and legal authorities when necessary.</p>
                    </div>

                    <div class="policy-section">
                        <h3>5. Cookies and Tracking Technologies</h3>
                        <p>We may use cookies and similar tracking technologies to collect information. You can adjust your browser settings to refuse cookies; however, this may impact your ability to use certain features of our site.</p>
                    </div>

                </section>

                <!-- Terms and Conditions Section -->
                <section class="terms">
                    <h2>Terms and Conditions</h2>

                    <div class="terms-section">
                        <h3>1. Acceptance of Terms</h3>
                        <p>By accessing and using Blue Alert’s website, you agree to comply with these Terms and Conditions. If you do not agree, please do not use the website.</p>
                    </div>

                    <div class="terms-section">
                        <h3>2. Use of the Website</h3>
                        <p>The content on this website is for informational and educational purposes only. You agree not to:</p>
                        <ul>
                            <li>Use the site for illegal purposes</li>
                            <li>Violate any applicable laws or regulations</li>
                            <li>Attempt to gain unauthorized access to any part of the site</li>
                        </ul>
                    </div>

                    <div class="terms-section">
                        <h3>3. Intellectual Property</h3>
                        <p>All content on this website is the property of Blue Alert or our licensors. You may not reproduce, distribute, or create derivative works from our content without prior written permission.</p>
                    </div>

                    <div class="terms-section">
                        <h3>4. User-Generated Content</h3>
                        <p>If you submit content to our site, you grant us a non-exclusive, worldwide, royalty-free license to use, reproduce, and distribute your content in connection with our site.</p>
                    </div>

                    <div class="terms-section">
                        <h3>5. Third-Party Links</h3>
                        <p>Our website may contain links to third-party websites. We are not responsible for the content or practices of these third-party sites, and we encourage you to review their privacy policies.</p>
                    </div>
                </section>
            </form>
        </div>
    </main>

    <!-- Include Footer -->
    @include('components.footer')

</body>

</html>
