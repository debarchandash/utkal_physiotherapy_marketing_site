<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Utkal Physiotherapy Center offers expert rehabilitation, pain relief, sports recovery, and personalized treatment plans in a modern care environment.">
        <title>{{ config('app.name', 'Utkal Physiotherapy Center') }}</title>
        <style>
            :root {
                --bg: #f5fbff;
                --bg-2: #edf6ff;
                --card: #ffffff;
                --card-soft: #f0f7ff;
                --primary: #1d8ac8;
                --primary-dark: #0f5f9b;
                --accent: #7ad7c2;
                --text: #15263b;
                --muted: #5d7288;
                --border: rgba(19, 57, 92, 0.11);
                --shadow: 0 24px 70px rgba(20, 78, 120, 0.12);
            }

            * { box-sizing: border-box; }
            html { scroll-behavior: smooth; }
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background:
                    radial-gradient(circle at top left, rgba(122, 215, 194, 0.18), transparent 28%),
                    radial-gradient(circle at right center, rgba(29, 138, 200, 0.14), transparent 30%),
                    var(--bg);
                color: var(--text);
                line-height: 1.6;
            }
            a { text-decoration: none; color: inherit; }
            img { max-width: 100%; display: block; }
            .container {
                width: min(1180px, calc(100% - 32px));
                margin: 0 auto;
            }
            .topbar {
                position: sticky;
                top: 0;
                z-index: 50;
                backdrop-filter: blur(14px);
                background: rgba(245, 251, 255, 0.8);
                border-bottom: 1px solid var(--border);
            }
            .nav {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 18px 0;
                gap: 20px;
            }
            .brand {
                display: flex;
                align-items: center;
                gap: 12px;
                font-weight: 800;
                letter-spacing: 0.03em;
            }
            .brand-mark {
                width: 42px;
                height: 42px;
                border-radius: 14px;
                display: grid;
                place-items: center;
                background: linear-gradient(135deg, var(--primary), var(--primary-dark));
                color: white;
                font-size: 20px;
                box-shadow: 0 14px 28px rgba(29, 138, 200, 0.25);
            }
            .brand-text small {
                display: block;
                font-size: 11px;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                color: var(--muted);
                font-weight: 700;
            }
            .menu {
                display: flex;
                align-items: center;
                gap: 26px;
                font-size: 15px;
                color: var(--muted);
                font-weight: 600;
            }
            .menu a:hover { color: var(--primary-dark); }
            .nav-actions {
                display: flex;
                align-items: center;
                gap: 14px;
            }
            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                padding: 14px 22px;
                font-weight: 700;
                transition: 0.25s ease;
                cursor: pointer;
                border: 1px solid transparent;
            }
            .btn-primary {
                background: linear-gradient(135deg, var(--primary), var(--primary-dark));
                color: white;
                box-shadow: 0 18px 36px rgba(24, 112, 178, 0.25);
            }
            .btn-primary:hover { transform: translateY(-2px); }
            .btn-secondary {
                background: rgba(29, 138, 200, 0.08);
                color: var(--primary-dark);
                border-color: rgba(29, 138, 200, 0.18);
            }
            .btn-secondary:hover { background: rgba(29, 138, 200, 0.12); }

            .hero {
                padding: 54px 0 28px;
            }
            .hero-grid {
                display: grid;
                grid-template-columns: 1.1fr 0.9fr;
                gap: 44px;
                align-items: center;
            }
            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: rgba(122, 215, 194, 0.18);
                color: var(--primary-dark);
                padding: 9px 16px;
                border-radius: 999px;
                font-size: 12px;
                font-weight: 800;
                letter-spacing: 0.1em;
                text-transform: uppercase;
            }
            .eyebrow::before {
                content: "";
                width: 9px;
                height: 9px;
                border-radius: 50%;
                background: var(--accent);
                box-shadow: 0 0 0 5px rgba(122, 215, 194, 0.25);
            }
            h1 {
                font-size: clamp(2.8rem, 5vw, 5rem);
                line-height: 0.98;
                letter-spacing: -0.06em;
                margin: 22px 0 18px;
            }
            .accent { color: var(--primary); }
            .subtitle {
                max-width: 620px;
                font-size: 1.12rem;
                color: var(--muted);
                margin-bottom: 28px;
            }
            .hero-actions {
                display: flex;
                align-items: center;
                gap: 16px;
                margin-bottom: 30px;
                flex-wrap: wrap;
            }
            .mini-list {
                display: flex;
                flex-wrap: wrap;
                gap: 18px;
                list-style: none;
                padding: 0;
                margin: 0;
                font-size: 0.96rem;
                color: var(--muted);
                font-weight: 600;
            }
            .mini-list li::before {
                content: "✓";
                color: var(--primary);
                margin-right: 8px;
                font-weight: 900;
            }
            .hero-visual {
                position: relative;
                min-height: 620px;
            }
            .image-panel {
                position: relative;
                border-radius: 34px;
                overflow: hidden;
                background: linear-gradient(160deg, rgba(12, 69, 105, 0.15), rgba(122, 215, 194, 0.12));
                box-shadow: var(--shadow);
                border: 1px solid rgba(19, 57, 92, 0.08);
            }
            .image-panel img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                min-height: 620px;
            }
            .floating-card {
                position: absolute;
                background: rgba(255,255,255,0.9);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(21,38,59,0.08);
                border-radius: 22px;
                padding: 18px 18px 12px;
                box-shadow: 0 16px 40px rgba(20, 78, 120, 0.12);
            }
            .card-top {
                bottom: 36px;
                left: -28px;
                width: 230px;
            }
            .card-bottom {
                top: 52px;
                right: -18px;
                width: 200px;
            }
            .card-label {
                color: var(--muted);
                font-size: 12px;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                font-weight: 800;
            }
            .card-value {
                font-size: clamp(1.7rem, 2vw, 2.3rem);
                font-weight: 900;
                letter-spacing: -0.05em;
                margin: 8px 0 2px;
            }
            .card-note {
                color: var(--muted);
                font-size: 0.92rem;
            }
            .stats {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 18px;
                padding: 26px 0 12px;
            }
            .stat {
                background: rgba(255,255,255,0.7);
                border: 1px solid var(--border);
                border-radius: 22px;
                padding: 22px 20px;
                box-shadow: 0 12px 25px rgba(20, 78, 120, 0.04);
            }
            .stat strong {
                display: block;
                font-size: 2rem;
                letter-spacing: -0.05em;
                margin-bottom: 6px;
            }
            .stat span { color: var(--muted); font-weight: 600; }

            .section {
                padding: 86px 0;
            }
            .heading {
                display: flex;
                justify-content: space-between;
                align-items: end;
                gap: 22px;
                margin-bottom: 26px;
            }
            .heading h2 {
                margin: 0;
                font-size: clamp(2rem, 3vw, 3rem);
                letter-spacing: -0.05em;
            }
            .heading p {
                margin: 0;
                max-width: 620px;
                color: var(--muted);
                font-size: 1.03rem;
            }
            .services-grid, .doctor-grid, .result-grid, .testimonial-grid {
                display: grid;
                gap: 24px;
            }
            .services-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
            .service-card {
                background: rgba(255,255,255,0.72);
                border: 1px solid var(--border);
                border-radius: 24px;
                padding: 28px 22px;
                transition: 0.25s ease;
                box-shadow: 0 12px 28px rgba(20, 78, 120, 0.04);
            }
            .service-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 20px 40px rgba(23, 94, 146, 0.12);
            }
            .service-icon {
                width: 56px;
                height: 56px;
                border-radius: 18px;
                display: grid;
                place-items: center;
                background: linear-gradient(135deg, rgba(29,138,200,0.12), rgba(122,215,194,0.2));
                color: var(--primary-dark);
                font-size: 1.7rem;
                margin-bottom: 18px;
            }
            .service-card h3 {
                margin: 0 0 10px;
                font-size: 1.3rem;
            }
            .service-card p {
                margin: 0;
                color: var(--muted);
            }

            .about-wrap {
                display: grid;
                grid-template-columns: 1.05fr 0.95fr;
                gap: 24px;
                align-items: center;
            }
            .about-image {
                border-radius: 28px;
                overflow: hidden;
                min-height: 440px;
                box-shadow: var(--shadow);
                border: 1px solid var(--border);
            }
            .about-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .benefits {
                display: grid;
                gap: 16px;
            }
            .benefit {
                display: flex;
                align-items: flex-start;
                gap: 16px;
                background: rgba(255,255,255,0.72);
                border: 1px solid var(--border);
                border-radius: 20px;
                padding: 18px 18px;
            }
            .benefit-badge {
                width: 38px;
                height: 38px;
                border-radius: 12px;
                background: rgba(29,138,200,0.12);
                color: var(--primary-dark);
                display: grid;
                place-items: center;
                font-weight: 800;
                flex-shrink: 0;
            }
            .benefit h3 { margin: 0 0 6px; font-size: 1.1rem; }
            .benefit p { margin: 0; color: var(--muted); }

            .doctor-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
            .doctor-card {
                background: rgba(255,255,255,0.72);
                border: 1px solid var(--border);
                border-radius: 28px;
                overflow: hidden;
                box-shadow: 0 12px 28px rgba(20, 78, 120, 0.04);
                transition: 0.25s ease;
            }
            .doctor-card:hover { transform: translateY(-6px); }
            .doctor-card img {
                width: 100%;
                height: 280px;
                object-fit: cover;
            }
            .doctor-body {
                padding: 22px 20px 24px;
            }
            .doctor-role {
                display: inline-block;
                padding: 7px 10px;
                border-radius: 999px;
                background: rgba(29,138,200,0.1);
                color: var(--primary-dark);
                font-size: 11px;
                font-weight: 800;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 10px;
            }
            .doctor-card h3 {
                margin: 0 0 8px;
                font-size: 1.5rem;
                letter-spacing: -0.04em;
            }
            .doctor-card p {
                margin: 0;
                color: var(--muted);
            }
            .doctor-meta {
                margin-top: 18px;
                display: flex;
                justify-content: space-between;
                gap: 12px;
                padding-top: 16px;
                border-top: 1px solid rgba(19, 57, 92, 0.08);
                color: var(--muted);
                font-size: 0.95rem;
                font-weight: 700;
            }

            .result-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
            .result-card {
                background: linear-gradient(180deg, rgba(255,255,255,0.8), rgba(232,246,255,0.9));
                border: 1px solid var(--border);
                border-radius: 26px;
                padding: 30px 26px;
            }
            .result-number {
                font-size: 2.5rem;
                font-weight: 900;
                letter-spacing: -0.05em;
                color: var(--primary-dark);
                margin-bottom: 12px;
            }
            .result-card h3 { margin: 0 0 10px; font-size: 1.3rem; }
            .result-card p { margin: 0; color: var(--muted); }

            .testimonial-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
            .testimonial {
                background: rgba(255,255,255,0.72);
                border: 1px solid var(--border);
                border-radius: 26px;
                padding: 24px 22px;
            }
            .stars { color: #ffb500; letter-spacing: 4px; font-size: 1.05rem; }
            .testimonial p {
                color: var(--muted);
                font-size: 1rem;
                margin: 18px 0 18px;
            }
            .person {
                display: flex;
                align-items: center;
                gap: 12px;
            }
            .avatar {
                width: 48px;
                height: 48px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--primary), var(--accent));
                display: grid;
                place-items: center;
                color: white;
                font-weight: 800;
            }
            .person strong { display: block; }
            .person span { color: var(--muted); font-size: 0.9rem; }

            .cta-wrap {
                background: linear-gradient(135deg, rgba(29,138,200,0.96), rgba(16,76,118,0.98));
                border-radius: 32px;
                padding: 42px 38px;
                color: white;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 18px;
                box-shadow: 0 28px 60px rgba(11, 58, 93, 0.26);
            }
            .cta-wrap h2 {
                margin: 0 0 8px;
                font-size: clamp(2rem, 2.5vw, 3rem);
                letter-spacing: -0.05em;
            }
            .cta-wrap p {
                margin: 0;
                opacity: 0.9;
                max-width: 560px;
            }
            .cta-wrap .btn {
                white-space: nowrap;
                background: white;
                color: var(--primary-dark);
                padding-left: 28px;
                padding-right: 28px;
            }

            footer {
                padding: 32px 0 56px;
                color: var(--muted);
            }
            .footer-inner {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 18px;
                border-top: 1px solid rgba(19, 57, 92, 0.1);
                padding-top: 24px;
                flex-wrap: wrap;
            }
            .footer-links {
                display: flex;
                flex-wrap: wrap;
                gap: 18px;
                font-weight: 600;
            }

            @media (max-width: 980px) {
                .hero-grid,
                .about-wrap,
                .services-grid,
                .doctor-grid,
                .result-grid,
                .testimonial-grid {
                    grid-template-columns: 1fr 1fr;
                }
                .menu { display: none; }
                .hero-grid { grid-template-columns: 1fr; }
                .hero-visual { order: -1; }
                .cta-wrap { flex-direction: column; align-items: flex-start; }
            }
            @media (max-width: 640px) {
                .stats,
                .services-grid,
                .doctor-grid,
                .result-grid,
                .testimonial-grid,
                .about-wrap,
                .hero-grid {
                    grid-template-columns: 1fr;
                }
                .nav { padding: 14px 0; }
                .nav-actions { gap: 8px; }
                .btn { width: 100%; }
                .hero-actions { flex-direction: column; align-items: stretch; }
                .heading { flex-direction: column; align-items: flex-start; }
                .floating-card { position: static; width: 100%; margin-top: 16px; }
                .hero-visual { min-height: auto; }
                .image-panel img { min-height: 420px; }
                .cta-wrap { padding: 30px 22px; }
            }
        </style>
    </head>
    <body>
        <header class="topbar">
            <div class="container nav">
                <div class="brand">
                    <div class="brand-mark">U</div>
                    <div class="brand-text">
                        <small>Utkal</small>
                        Physiotherapy Center
                    </div>
                </div>

                <nav class="menu" aria-label="Main navigation">
                    <a href="#home">Home</a>
                    <a href="#services">Services</a>
                    <a href="#doctors">Doctors</a>
                    <a href="#results">Results</a>
                    <a href="#contact">Contact</a>
                </nav>

                <div class="nav-actions">
                    <a class="btn btn-secondary" href="#contact">Call Now</a>
                    <a class="btn btn-primary" href="#appointment">Book Visit</a>
                </div>
            </div>
        </header>

        <main id="home">
            <section class="hero">
                <div class="container hero-grid">
                    <div>
                        <span class="eyebrow">Trusted care & recovery</span>
                        <h1>Move better. <span class="accent">Feel stronger.</span></h1>
                        <p class="subtitle">
                            Utkal Physiotherapy Center helps patients recover from pain, injury, and mobility limitations through modern rehabilitation, expert diagnosis, and personalized treatment plans.
                        </p>

                        <div class="hero-actions">
                            <a class="btn btn-primary" href="#appointment">Book an Appointment</a>
                            <a class="btn btn-secondary" href="#services">Explore Treatments</a>
                        </div>

                        <ul class="mini-list">
                            <li>Hands-on care</li>
                            <li>Evidence-based treatment</li>
                            <li>Personalized recovery plans</li>
                        </ul>
                    </div>

                    <div class="hero-visual">
                        <div class="image-panel">
                            <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=900&q=80" alt="Physiotherapist treating a patient">
                        </div>

                        <div class="floating-card card-top">
                            <div class="card-label">Patient recovery</div>
                            <div class="card-value">92%</div>
                            <div class="card-note">patients report improved mobility within 6 weeks</div>
                        </div>

                        <div class="floating-card card-bottom">
                            <div class="card-label">Open Hours</div>
                            <div class="card-value">Mon-Sat</div>
                            <div class="card-note">9:00 AM - 8:00 PM</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container">
                <div class="stats">
                    <div class="stat">
                        <strong>12+</strong>
                        <span>Years of experience</span>
                    </div>
                    <div class="stat">
                        <strong>8k+</strong>
                        <span>Patients treated</span>
                    </div>
                    <div class="stat">
                        <strong>25+</strong>
                        <span>Therapy programs</span>
                    </div>
                    <div class="stat">
                        <strong>4.9/5</strong>
                        <span>Average satisfaction</span>
                    </div>
                </div>
            </section>

            <section class="section" id="services">
                <div class="container">
                    <div class="heading">
                        <div>
                            <span class="eyebrow">Our services</span>
                            <h2>Complete rehabilitation for every stage of recovery</h2>
                        </div>
                        <p>We combine manual therapy, exercise science, and modern movement training to reduce pain, restore mobility, and help you regain confidence in daily life.</p>
                    </div>

                    <div class="services-grid">
                        <article class="service-card">
                            <div class="service-icon">🦵</div>
                            <h3>Orthopedic Rehab</h3>
                            <p>Targeted recovery plans for knee, back, shoulder, and joint rehabilitation.</p>
                        </article>
                        <article class="service-card">
                            <div class="service-icon">🏃</div>
                            <h3>Sports Injury Care</h3>
                            <p>Performance recovery and return-to-play support for athletes and active adults.</p>
                        </article>
                        <article class="service-card">
                            <div class="service-icon">🧠</div>
                            <h3>Neurological Therapy</h3>
                            <p>Movement retraining and guided sessions for post-stroke and neurological conditions.</p>
                        </article>
                        <article class="service-card">
                            <div class="service-icon">🩺</div>
                            <h3>Pain Management</h3>
                            <p>Personalized therapy for chronic pain, stiffness, posture issues, and soft-tissue recovery.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="container about-wrap">
                    <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=900&q=80" alt="Physiotherapy consultation">
                    </div>

                    <div>
                        <span class="eyebrow">Why choose us</span>
                        <h2 style="margin: 16px 0 18px; font-size: clamp(2rem, 3vw, 3rem); letter-spacing: -0.05em;">Smarter treatment. Better outcomes.</h2>
                        <div class="benefits">
                            <div class="benefit">
                                <div class="benefit-badge">01</div>
                                <div>
                                    <h3>Detailed assessment</h3>
                                    <p>We start with a focused physical evaluation to understand the cause, movement pattern, and recovery goals.</p>
                                </div>
                            </div>
                            <div class="benefit">
                                <div class="benefit-badge">02</div>
                                <div>
                                    <h3>Personalized care plan</h3>
                                    <p>Each treatment plan is tailored to your condition, lifestyle, and pace of healing.</p>
                                </div>
                            </div>
                            <div class="benefit">
                                <div class="benefit-badge">03</div>
                                <div>
                                    <h3>Goal-focused progress</h3>
                                    <p>We track mobility, strength, and pain markers so every session moves you closer to full recovery.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section" id="doctors">
                <div class="container">
                    <div class="heading">
                        <div>
                            <span class="eyebrow">Meet our specialists</span>
                            <h2>Expert doctors guiding your recovery</h2>
                        </div>
                        <p>Our clinicians combine clinical expertise, rehabilitation science, and compassionate patient support to deliver measurable improvements.</p>
                    </div>

                    <div class="doctor-grid">
                        <article class="doctor-card">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=700&q=80" alt="Dr. Ananya Mohanty">
                            <div class="doctor-body">
                                <span class="doctor-role">Senior Physiotherapist</span>
                                <h3>Dr. Ananya Mohanty</h3>
                                <p>Specializes in orthopedic rehab, post-surgical recovery, and chronic pain management.</p>
                                <div class="doctor-meta">
                                    <span>12 yrs exp.</span>
                                    <span>1,500+ patients</span>
                                </div>
                            </div>
                        </article>

                        <article class="doctor-card">
                            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=700&q=80" alt="Dr. Sudeep Das">
                            <div class="doctor-body">
                                <span class="doctor-role">Sports Therapist</span>
                                <h3>Dr. Sudeep Das</h3>
                                <p>Expert in sports injury care, mobility optimization, and performance-focused therapy.</p>
                                <div class="doctor-meta">
                                    <span>10 yrs exp.</span>
                                    <span>800+ athletes</span>
                                </div>
                            </div>
                        </article>

                        <article class="doctor-card">
                            <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=700&q=80" alt="Dr. Nandini Sahu">
                            <div class="doctor-body">
                                <span class="doctor-role">Neurological Rehab</span>
                                <h3>Dr. Nandini Sahu</h3>
                                <p>Focuses on stroke rehab, balance restoration, neurological recovery, and gait training.</p>
                                <div class="doctor-meta">
                                    <span>9 yrs exp.</span>
                                    <span>600+ cases</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <section class="section" id="results">
                <div class="container">
                    <div class="heading">
                        <div>
                            <span class="eyebrow">Our work</span>
                            <h2>Evidence-based care that delivers measurable progress</h2>
                        </div>
                        <p>We focus on restoring control, confidence, and independence through structured therapy with visible improvement over time.</p>
                    </div>

                    <div class="result-grid">
                        <article class="result-card">
                            <div class="result-number">65%</div>
                            <h3>Average pain reduction</h3>
                            <p>Reported by patients after a structured rehabilitation plan and regular sessions.</p>
                        </article>
                        <article class="result-card">
                            <div class="result-number">4.6x</div>
                            <h3>Faster return to movement</h3>
                            <p>Patients recover confidence and function sooner with guided exercise and manual therapy.</p>
                        </article>
                        <article class="result-card">
                            <div class="result-number">1:1</div>
                            <h3>Personal attention</h3>
                            <p>Every recovery plan includes direct specialist guidance, goal tracking, and progress reviews.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="container">
                    <div class="heading">
                        <div>
                            <span class="eyebrow">Patient stories</span>
                            <h2>People trust us to help them move freely again</h2>
                        </div>
                    </div>

                    <div class="testimonial-grid">
                        <article class="testimonial">
                            <div class="stars">★★★★★</div>
                            <p>“After my knee surgery, the team helped me regain strength and confidence. The progression was clear and the care was exceptional.”</p>
                            <div class="person">
                                <div class="avatar">S</div>
                                <div>
                                    <strong>Subhasmita</strong>
                                    <span>Recovery patient</span>
                                </div>
                            </div>
                        </article>

                        <article class="testimonial">
                            <div class="stars">★★★★★</div>
                            <p>“Their sports rehab plan helped me return to my game with less pain and better mobility. The attention to detail was impressive.”</p>
                            <div class="person">
                                <div class="avatar">A</div>
                                <div>
                                    <strong>Abhijit</strong>
                                    <span>Cricket player</span>
                                </div>
                            </div>
                        </article>

                        <article class="testimonial">
                            <div class="stars">★★★★★</div>
                            <p>“The team helped improve my posture and reduce constant back pain. I finally feel comfortable in everyday movements again.”</p>
                            <div class="person">
                                <div class="avatar">R</div>
                                <div>
                                    <strong>Ritika</strong>
                                    <span>Desk professional</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <section class="section" id="appointment">
                <div class="container">
                    <div class="cta-wrap">
                        <div>
                            <h2>Your recovery starts with a conversation.</h2>
                            <p>Book a consultation and get expert guidance on your mobility, strength, and pain relief goals.</p>
                        </div>
                        <a class="btn" href="#contact">Schedule Your Visit</a>
                    </div>
                </div>
            </section>
        </main>

        <footer id="contact">
            <div class="container footer-inner">
                <div>
                    <strong>Utkal Physiotherapy Center</strong><br>
                    24/7 care support • Modern recovery solutions
                </div>

                <div class="footer-links">
                    <a href="#services">Services</a>
                    <a href="#doctors">Doctors</a>
                    <a href="#results">Results</a>
                    <a href="tel:+919876543210">+91 98765 43210</a>
                </div>
            </div>
        </footer>
    </body>
</html>
