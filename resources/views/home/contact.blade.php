<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Contact Us - BHAKUNDO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #5c6bc0;
            --text-color: #333;
            --light-gray: #f5f5f5;
            --primary-color-rgb: 74, 144, 226;
            --secondary-color-rgb: 92, 107, 192;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            overflow-x: hidden;
        }

        .contact-section {
            padding: 40px 0;
        }

        @media (min-width: 768px) {
            .contact-section {
                padding: 80px 0;
            }
        }

        .contact-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .contact-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            margin-top: 20px;
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact-header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            padding: 30px 20px;
            color: white;
            text-align: center;
        }

        @media (min-width: 768px) {
            .contact-header {
                padding: 40px;
            }
        }

        .contact-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        @media (min-width: 768px) {
            .contact-header h1 {
                font-size: 2.5rem;
                margin-bottom: 15px;
            }
        }

        .contact-header p {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        @media (min-width: 768px) {
            .contact-header p {
                font-size: 1.1rem;
            }
        }

        .contact-body {
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        @media (min-width: 768px) {
            .contact-body {
                padding: 40px;
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }
        }

        .contact-info {
            order: 2;
        }

        @media (min-width: 768px) {
            .contact-info {
                order: 1;
                padding-right: 40px;
            }
        }

        .contact-form {
            order: 1;
        }

        @media (min-width: 768px) {
            .contact-form {
                order: 2;
            }
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background: var(--light-gray);
            border-radius: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        @media (min-width: 768px) {
            .info-item {
                padding: 20px;
                margin-bottom: 30px;
            }
        }

        .info-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: white;
        }

        .info-icon {
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-color);
            font-size: 1.1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        @media (min-width: 768px) {
            .info-icon {
                width: 50px;
                height: 50px;
                margin-right: 20px;
                font-size: 1.2rem;
            }
        }

        .info-item:hover .info-icon {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            transform: scale(1.1) rotate(360deg);
        }

        .info-content h3 {
            font-size: 1rem;
            margin-bottom: 3px;
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        @media (min-width: 768px) {
            .info-content h3 {
                font-size: 1.1rem;
                margin-bottom: 5px;
            }
        }

        .info-content p {
            margin: 0;
            color: #666;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        @media (min-width: 768px) {
            .info-content p {
                font-size: 0.9rem;
            }
        }

        .contact-form form {
            display: grid;
            gap: 15px;
        }

        @media (min-width: 768px) {
            .contact-form form {
                gap: 20px;
            }
        }

        .form-control {
            border: 2px solid var(--light-gray);
            border-radius: 10px;
            padding: 12px 20px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        @media (min-width: 768px) {
            .form-control {
                font-size: 1rem;
            }
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(var(--primary-color-rgb), 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        @media (min-width: 768px) {
            textarea.form-control {
                min-height: 150px;
            }
        }

        .btn-submit {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            cursor: pointer;
            width: 100%;
        }

        @media (min-width: 768px) {
            .btn-submit {
                padding: 15px 30px;
                width: auto;
            }
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(var(--primary-color-rgb), 0.3);
        }

        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            justify-content: center;
        }

        @media (min-width: 768px) {
            .social-links {
                gap: 15px;
                margin-top: 30px;
            }
        }

        .social-link {
            width: 35px;
            height: 35px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        @media (min-width: 768px) {
            .social-link {
                width: 40px;
                height: 40px;
            }
        }

        .social-link:hover {
            transform: translateY(-3px) rotate(360deg);
            color: white;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        }

        /* Success Message Animation */
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .alert {
            animation: slideDown 0.5s ease;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
    </div>
    
    <section class="contact-section">
        <div class="contact-container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="contact-card">
                <div class="contact-header">
                    <h1>Get in Touch</h1>
                    <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                </div>
                <div class="contact-body">
                    <div class="contact-info">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h3>Address</h3>
                                <p>Kathmandu, Nepal</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <h3>Phone</h3>
                                <p>+977 9819287752</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h3>Email</h3>
                                <p>Pujan2273@gmail.com</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h3>Working Hours</h3>
                                <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
                            </div>
                        </div>
                        <div class="social-links">
                            <a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn-submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
