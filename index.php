<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gig - Connect & Collaborate</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="icon.jpeg" type="image/jpeg">
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,pt',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">Gig Connect</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="documentation.php">Documentation</a></li>
                <li><a href="#contact">Contact us</a></li>
                <li><a href="login.html" class="btn-primary">Login</a></li>
            </ul>
        </div>
        <div id="google_translate_element"></div>
    </header>

    <div class="main-content">
        <div class="content-container">
            <section id="home" class="hero">
                <div class="hero-content">
                    <h1>Connect with Talent & Clients Effortlessly</h1>
                    <p>Gig is the easiest way to connect with skilled workers for any job. From home repairs to event help, hire freelancers nearby quickly and easily. Post a gig, get matched, and get it done!</p>
                    <p>Your digital gateway to finding opportunities or offering skills. Join today!</p>
                    <a href="login.html" class="btn-primary">Get Started</a>
                </div>
            </section>

            <aside class="sidebar">
                <h2>Job Feed</h2>
                <div id="feed">
                    <!-- Job feed will be injected here via JavaScript -->
                </div>
                <button onclick="document.location='login.html'" class="btn-primary">View Full Feed</button>
            </aside>
        </div>

        <section id="about" class="about">
    <h2>About Gig Connect</h2>
    <div class="about-container">
        <div class="about-box" onclick="focusBox(this)">
            <h3>The Problem We Solve</h3>
            <p>Finding the right talent or securing consistent freelance work can be a challenge in today's fast-paced digital world. For businesses, it’s often hard to find reliable professionals who can deliver high-quality work on time. For freelancers, the struggle lies in finding legitimate opportunities that match their skills, while ensuring timely and secure payments.</p>
            <p>Whether you’re a business looking to scale quickly or a freelancer seeking consistent projects, <b>Gig Connect</b> simplifies and secures every step of the process—making it easier for you to succeed.</p>
        </div>
        <div class="about-box" onclick="focusBox(this)">
            <h3>What We Do</h3>
            <p>At <b>Gig Connect</b>, we bridge the gap between talented professionals and businesses looking for expertise. Our platform empowers skilled freelancers and companies to connect, collaborate, and grow. Whether you're offering services or seeking talent, we provide a seamless, secure, and efficient way to get the job done.<p>
            <p><b>For Freelancers:</b> Showcase your skills, find jobs tailored to your expertise, and grow your career with endless opportunities. From remote gigs to in-person jobs, you can match with clients in your field and manage projects with ease.</p>   
            <p><b>For Clients:</b> Access a diverse pool of freelancers with various skills to bring your projects to life. Whether you're a startup needing extra hands or a large corporation seeking specialized talent, Gig Connect offers a streamlined way to find the perfect match, ensuring quality work delivered on time.</p>
            <p>We're more than just a job board — we’re a community where trust, collaboration, and opportunity meet.</p>
        </div>
        <div class="about-box" onclick="focusBox(this)">
            <h3>Our Mission</h3>
            <p>At <b>Gig Connect</b>, our mission is to revolutionize the way freelancers and businesses connect. We aim to create a dynamic and secure platform where talent and opportunity meet seamlessly. By fostering a community built on trust, transparency, and collaboration, we empower individuals to showcase their skills and companies to achieve their goals with the right expertise.</p>
            <p>We are dedicated to providing a space where quality work thrives, communication flows effortlessly, and both freelancers and clients succeed together. At <b>Gig Connect</b>, we’re not just about getting the job done — we’re about building lasting professional relationships that inspire growth and innovation.</p>
        </div>
    </div>
</section>


        <section id="features" class="features">
            <h2>Features</h2>
            <div class="feature-card">
                <h3>Endless Job Feed</h3>
                <p>Stay updated with the latest job postings and showcases from skilled professionals.</p>
            </div>
            <div class="feature-card">
                <h3 id="h3">Secure Message</h3>
                <p> Use our secure messaging platform to engage with your customer or employer, to set your perfect deal.</p>
                <p>Communicate with confidence using our encrypted messaging platform, ensuring that every conversation between service providers and clients remains private and secure. Discuss project details, share updates, and negotiate terms without worry. Our platform guarantees safe, direct communication, so you can focus on delivering quality work while maintaining trust and confidentiality on both sides.</p>
            <div class="feature-image">
                <img id="messaging" src="messaging.gif" alt="Secure Messaging Example">
         </div>
            </div>
            <div class="feature-card">
        <div class="feature-text">
            <h3><b>Personalized Profiles</b></h3>
            <p>Create a professional profile to display your skills, recent work, and reviews.</p>
            <p>Create a standout profile tailored to showcase your unique skills, portfolio, and achievements. Whether you're a freelancer or a professional, make a lasting impression by customizing your profile to reflect your personal brand. Highlight your work, gather reviews from clients, and let your expertise shine in the best possible way. A profile that truly represents you!</p>
        </div>
        <div class="feature-image">
            <img id="prof" src="profiles.png" alt="Profile example">
        </div>
    </div>
        </section>

        <footer id="contact">
            <h2>Contact Us</h2>
            <p>Have questions or need support? Reach out to our team at <a href="mailto:support@gig.com">support@gig.com</a></p>
            <p><a href="tel:+258845910473">(+258) 84 591-0473</a></p>
            <p>&copy; 2024 Gig. All Rights Reserved.</p>
        </footer>
    </div>

    <script src="scripts.js"></script>
    <script>
        // Fetch posts for the sidebar
        async function fetchSidebarPosts() {
            const response = await fetch('fetch_posts.php');
            const posts = await response.json();
            const feedDiv = document.getElementById('feed');
            feedDiv.innerHTML = '';

            posts.forEach(post => {
                feedDiv.innerHTML += `
                    <div class="post">
                        <div class="post-header">
                            <img src="${post.profile_pic}" alt="${post.username}" class="profile-pic">
                            <span>${post.username}</span>
                            <span>${new Date(post.created_at).toLocaleString()}</span>
                        </div>
                        <p>${post.content}</p>
                    </div>
                `;
            });
        }

        fetchSidebarPosts(); // Initial fetch for sidebar
    </script>
</body>
</html>