<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
    <title>Rabaira - Your Journey, Simplified</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header */
        .header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .logo i {
            margin-right: 0.5rem;
            color: #007bff;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #007bff;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-outline {
            background: white;
            color: #007bff;
            border: 2px solid #007bff;
        }

        .btn-outline:hover {
            background: #007bff;
            color: white;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=2074&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-top: 80px;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .btn-large {
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }

        /* Services Section */
        .services {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #333;
        }

        .service-tabs {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .service-tab {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .service-tab.active {
            background: #f8f9fa;
            border-bottom: 3px solid #007bff;
        }

        .service-tab i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #007bff;
        }

        .search-bar {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 1rem 3rem 1rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1rem;
        }

        .search-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        /* Customer Stories */
        .customer-stories {
            background: #f8f9fa;
            padding: 5rem 2rem;
        }

        .stories-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .stories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .story-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .story-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #007bff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }

        .story-name {
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .story-service {
            color: #007bff;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .story-quote {
            color: #6c757d;
            font-style: italic;
        }

        /* Contact Section */
        .contact {
            padding: 5rem 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-form {
            display: grid;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            padding: 1rem;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-submit {
            display: flex;
            justify-content: flex-end;
        }

        /* Footer */
        .footer {
            background: #333;
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #007bff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .service-tabs {
                flex-direction: column;
                align-items: center;
            }

            .stories-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                flex-direction: column;
                gap: 1rem;
            }

            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="logo">
                <i class="fas fa-plane"></i>
                Rabaira
            </div>
            <ul class="nav-links">
                <li><a href="#flights">Flights</a></li>
                <li><a href="#money-transfer">Money Transfer</a></li>
                <li><a href="#currency-exchange">Currency Exchange</a></li>
                <li><a href="#support">Support</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                <a href="{{ route('login') }}" class="btn btn-outline">Log In</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Your Journey, Simplified</h1>
            <p>Seamless travel and financial services at your fingertips. Book flights, transfer money, and exchange currency with ease.</p>
            <a href="#services" class="btn btn-primary btn-large">Explore Services</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <h2 class="section-title">Our Services</h2>
        <div class="service-tabs">
            <div class="service-tab active" data-service="flights">
                <i class="fas fa-plane"></i>
                <span>Flights</span>
            </div>
            <div class="service-tab" data-service="money-transfer">
                <i class="fas fa-dollar-sign"></i>
                <span>Money Transfer</span>
            </div>
            <div class="service-tab" data-service="currency-exchange">
                <i class="fas fa-exchange-alt"></i>
                <span>Currency Exchange</span>
            </div>
        </div>
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Search for flights">
            <i class="fas fa-search search-icon"></i>
        </div>
    </section>

    <!-- Customer Stories -->
    <section class="customer-stories">
        <div class="stories-container">
            <h2 class="section-title">Customer Stories</h2>
            <div class="stories-grid">
                <div class="story-card">
                    <div class="story-avatar">S</div>
                    <div class="story-name">Sophia's seamless flight booking</div>
                    <div class="story-service">Flight Booking</div>
                    <div class="story-quote">"I booked my flight to Paris in minutes! The process was so smooth and the prices were great."</div>
                </div>
                <div class="story-card">
                    <div class="story-avatar">E</div>
                    <div class="story-name">Ethan's reliable money transfer</div>
                    <div class="story-service">Money Transfer</div>
                    <div class="story-quote">"Sending money to my family abroad has never been easier. The rates are competitive and the service is reliable."</div>
                </div>
                <div class="story-card">
                    <div class="story-avatar">O</div>
                    <div class="story-name">Olivia's quick currency exchange</div>
                    <div class="story-service">Currency Exchange</div>
                    <div class="story-quote">"Exchanging currency for my trip was quick and convenient. I got a great rate and saved time."</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact">
        <h2 class="section-title">Contact Us</h2>
        <form class="contact-form">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea id="message" placeholder="Enter your message"></textarea>
            </div>
            <div class="form-submit">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
        </form>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="copyright">
                © 2024 Rabaira. All rights reserved.
            </div>
            <div class="footer-links">
                <a href="#about">About Us</a>
                <a href="#terms">Terms of Service</a>
                <a href="#privacy">Privacy Policy</a>
                <a href="#contact">Contact Us</a>
            </div>
        </div>
    </footer>

    <script>
        // Service tabs functionality
        document.querySelectorAll('.service-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                document.querySelectorAll('.service-tab').forEach(t => t.classList.remove('active'));
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Update search placeholder based on selected service
                const service = this.getAttribute('data-service');
                const searchInput = document.querySelector('.search-input');
                const searchIcon = document.querySelector('.search-icon');
                
                switch(service) {
                    case 'flights':
                        searchInput.placeholder = 'Search for flights';
                        break;
                    case 'money-transfer':
                        searchInput.placeholder = 'Search for money transfer services';
                        break;
                    case 'currency-exchange':
                        searchInput.placeholder = 'Search for currency exchange rates';
                        break;
                }
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Contact form submission
        document.querySelector('.contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    </script>
</body>
</html>
