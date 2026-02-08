<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $school->name }} | SchoolPage</title>

    <meta name="description"
        content="{{ Str::limit($school->description ?? 'Official school profile hosted on SchoolPage.co.ke', 155) }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-serif-display:400|manrope:400,500,600,700,800" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #1a365d;
            --primary-light: #2d4a7c;
            --accent: #d97706;
            --accent-light: #f59e0b;
            --cream: #faf8f5;
            --warm-gray: #78716c;
        }

        body {
            font-family: 'Manrope', sans-serif;
        }

        .font-serif {
            font-family: 'DM Serif Display', serif;
        }

        .max-container {
            max-width: 1280px;
            margin: 0 auto;
        }

        /* Navigation shadow on scroll */
        nav.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Hero background pattern */
        .hero-pattern {
            background-color: var(--primary);
            background-image:
                radial-circle at 20% 30%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-circle at 80% 70%, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
        }

        /* Staggered fade-in animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
            opacity: 0;
        }

        .delay-200 {
            animation-delay: 0.2s;
            opacity: 0;
        }

        .delay-300 {
            animation-delay: 0.3s;
            opacity: 0;
        }

        .delay-400 {
            animation-delay: 0.4s;
            opacity: 0;
        }

        /* Image hover effects */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
        }

        .gallery-item img {
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-item:hover img {
            transform: scale(1.08);
        }

        .gallery-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .gallery-item:hover::after {
            opacity: 1;
        }

        /* Document card hover */
        .doc-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .doc-card:hover {
            border-color: var(--accent);
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.15);
        }

        /* Stats counter animation */
        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .stat-item {
            animation: slideIn 0.6s ease-out forwards;
        }

        /* Mobile menu */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        /* Decorative elements */
        .decorative-dot {
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            display: inline-block;
        }

        /* Better CTA buttons */
        .cta-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .cta-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .cta-primary:hover::before {
            left: 100%;
        }

        /* Section divider */
        .section-divider {
            height: 2px;
            width: 60px;
            background: var(--accent);
            margin: 0 auto 2rem;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased" style="background-color: var(--cream);">

    <!-- NAVBAR -->
    <nav id="navbar"
        class="fixed top-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-stone-200 transition-shadow">
        <div class="max-container px-6 h-20 flex items-center justify-between">

            <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center text-3xl"
                    style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);">
                    🎓
                </div>
                <div>
                    <span class="font-bold text-gray-900 text-lg block leading-tight">
                        {{ $school->name }}
                    </span>
                    <span class="text-xs uppercase tracking-wider" style="color: var(--accent);">
                        {{ ucfirst($school->category) }}
                    </span>
                </div>
            </div>

            <div class="hidden lg:flex items-center gap-10 text-sm font-semibold">
                <a href="#about" class="hover:text-amber-700 transition-colors">About</a>
                <a href="#gallery" class="hover:text-amber-700 transition-colors">Gallery</a>
                <a href="#academics" class="hover:text-amber-700 transition-colors">Academics</a>
                <a href="#documents" class="hover:text-amber-700 transition-colors">Documents</a>
                <a href="#contact" class="hover:text-amber-700 transition-colors">Contact</a>

                <a href="#contact" class="cta-primary px-6 py-2.5 rounded-lg font-bold text-white transition-all"
                    style="background: var(--accent);">
                    Apply Now
                </a>
            </div>

            <button id="menuToggle" class="lg:hidden text-3xl" style="color: var(--primary);">
                <span id="menuIcon">☰</span>
            </button>
        </div>
    </nav>

    <!-- MOBILE MENU -->
    <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 h-full w-72 bg-white shadow-2xl z-50 lg:hidden">
        <div class="p-6">
            <button id="closeMenu" class="text-3xl mb-8" style="color: var(--primary);">×</button>
            <nav class="flex flex-col gap-6 text-lg font-semibold">
                <a href="#about" class="hover:text-amber-700 transition-colors">About</a>
                <a href="#gallery" class="hover:text-amber-700 transition-colors">Gallery</a>
                <a href="#academics" class="hover:text-amber-700 transition-colors">Academics</a>
                <a href="#documents" class="hover:text-amber-700 transition-colors">Documents</a>
                <a href="#contact" class="hover:text-amber-700 transition-colors">Contact</a>
                <a href="#contact" class="mt-4 px-6 py-3 rounded-lg font-bold text-white text-center"
                    style="background: var(--accent);">
                    Apply Now
                </a>
            </nav>
        </div>
    </div>

    <!-- HERO -->
    <header class="hero-pattern text-white pt-32 pb-20 mt-20">
        <div class="max-container px-6">
            <div class="grid lg:grid-cols-5 gap-12 items-start">

                <div class="lg:col-span-3">
                    <div class="animate-fade-in delay-100">
                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider"
                            style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);">
                            <span class="decorative-dot"></span>
                            {{ ucfirst($school->type) }} • Est. {{ $school->established_year ?? '19XX' }}
                        </span>
                    </div>

                    <h1
                        class="font-serif text-5xl lg:text-7xl font-normal mt-6 leading-tight animate-fade-in delay-200">
                        {{ $school->name }}
                    </h1>

                    <p class="mt-6 text-xl text-blue-100 max-w-2xl leading-relaxed animate-fade-in delay-300">
                        {{ $school->description ?? 'Building tomorrow\'s leaders through excellence in education,
                        character development, and holistic growth.' }}
                    </p>

                    <div class="mt-10 flex flex-wrap gap-4 animate-fade-in delay-400">
                        <a href="#contact"
                            class="cta-primary px-8 py-4 rounded-xl font-bold text-white shadow-lg hover:shadow-xl transition-all"
                            style="background: var(--accent);">
                            Start Your Application
                        </a>

                        <a href="#documents"
                            class="px-8 py-4 rounded-xl font-bold border-2 border-white/30 hover:bg-white/10 transition-all backdrop-blur-sm">
                            Download Prospectus
                        </a>
                    </div>
                </div>

                <!-- QUICK INFO CARD -->
                <div class="lg:col-span-2">
                    <div class="bg-white text-gray-800 p-8 rounded-2xl shadow-2xl animate-fade-in delay-300">
                        <div class="flex items-center gap-3 border-b pb-4 mb-6" style="border-color: var(--cream);">
                            <span class="decorative-dot"></span>
                            <h3 class="font-bold text-xl">Quick Facts</h3>
                        </div>

                        <ul class="space-y-5 text-sm">
                            <li class="flex justify-between items-center stat-item" style="animation-delay: 0.5s;">
                                <span class="font-medium" style="color: var(--warm-gray);">Category</span>
                                <span class="font-bold">{{ ucfirst($school->category) }}</span>
                            </li>
                            <li class="flex justify-between items-center stat-item" style="animation-delay: 0.6s;">
                                <span class="font-medium" style="color: var(--warm-gray);">Gender</span>
                                <span class="font-bold">{{ ucfirst($school->gender) }}</span>
                            </li>
                            <li class="flex justify-between items-center stat-item" style="animation-delay: 0.7s;">
                                <span class="font-medium" style="color: var(--warm-gray);">County</span>
                                <span class="font-bold">{{ $school->county->name }}</span>
                            </li>
                            <li class="flex justify-between items-center stat-item" style="animation-delay: 0.8s;">
                                <span class="font-medium" style="color: var(--warm-gray);">Sub-County</span>
                                <span class="font-bold">{{ $school->subcounty->name }}</span>
                            </li>
                            <li class="flex justify-between items-center stat-item" style="animation-delay: 0.9s;">
                                <span class="font-medium" style="color: var(--warm-gray);">Ward</span>
                                <span class="font-bold">{{ $school->ward->name }}</span>
                            </li>
                            @if($school->principal_name)
                            <li class="flex justify-between items-center pt-4 border-t stat-item"
                                style="border-color: var(--cream); animation-delay: 1s;">
                                <span class="font-medium" style="color: var(--warm-gray);">Principal</span>
                                <span class="font-bold" style="color: var(--accent);">{{ $school->principal_name
                                    }}</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- GALLERY -->
    <section id="gallery" class="py-20 max-container px-6">
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider"
                style="color: var(--accent);">
                <span class="decorative-dot"></span>
                Campus Life
            </span>
            <h2 class="font-serif text-4xl lg:text-5xl mt-3 mb-4">Our Learning Environment</h2>
            <div class="section-divider"></div>
            <p class="text-lg" style="color: var(--warm-gray);">Experience the vibrant atmosphere of our campus</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($school->images as $index => $image)
            <div
                class="gallery-item {{ $index == 0 ? 'md:col-span-2 md:row-span-2' : '' }} h-80 {{ $index == 0 ? 'md:h-full' : '' }}">
                <img src="{{ asset($image->url) }}" alt="{{ $image->caption }}" class="w-full h-full object-cover">
                @if($image->caption)
                <div class="absolute bottom-0 left-0 right-0 p-4 text-white z-10">
                    <p class="font-semibold">{{ $image->caption }}</p>
                </div>
                @endif
            </div>
            @empty
            <div class="col-span-full text-center py-20">
                <p class="text-lg italic" style="color: var(--warm-gray);">Gallery images coming soon</p>
            </div>
            @endforelse
        </div>
    </section>

    <!-- ABOUT + ACADEMICS -->
    <section id="about" class="bg-white py-20">
        <div class="max-container px-6">
            <div class="grid lg:grid-cols-3 gap-16">

                <!-- ABOUT -->
                <div class="lg:col-span-2">
                    <span class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider"
                        style="color: var(--accent);">
                        <span class="decorative-dot"></span>
                        About Us
                    </span>
                    <h2 class="font-serif text-4xl lg:text-5xl mt-3 mb-8">Welcome to {{ $school->name }}</h2>

                    <div class="prose prose-lg max-w-none" style="color: var(--warm-gray);">
                        <p class="text-lg leading-relaxed">
                            {{ $school->description ?? 'Our institution is committed to providing quality education that
                            prepares students for success in an ever-changing world. We combine academic excellence with
                            character development, ensuring our students grow into responsible, innovative, and
                            compassionate leaders.' }}
                        </p>

                        <div class="grid md:grid-cols-2 gap-8 mt-12">
                            <div class="p-6 rounded-xl" style="background: var(--cream);">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center text-2xl mb-4"
                                    style="background: var(--accent);">
                                    🎯
                                </div>
                                <h3 class="font-bold text-xl mb-2 text-gray-900">Our Mission</h3>
                                <p class="text-sm">To provide quality education that nurtures academic excellence,
                                    character development, and lifelong learning.</p>
                            </div>

                            <div class="p-6 rounded-xl" style="background: var(--cream);">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center text-2xl mb-4"
                                    style="background: var(--primary);">
                                    👁️
                                </div>
                                <h3 class="font-bold text-xl mb-2 text-gray-900">Our Vision</h3>
                                <p class="text-sm">To be a leading institution recognized for excellence in holistic
                                    education and community impact.</p>
                            </div>
                        </div>
                    </div>

                    <!-- ACADEMICS SECTION -->
                    <div id="academics" class="mt-16 pt-12 border-t" style="border-color: var(--cream);">
                        <span class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider"
                            style="color: var(--accent);">
                            <span class="decorative-dot"></span>
                            Academics
                        </span>
                        <h3 class="font-serif text-3xl lg:text-4xl mt-3 mb-8">Academic Excellence</h3>

                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="text-center p-6">
                                <div class="font-serif text-5xl mb-2" style="color: var(--accent);">8-4-4</div>
                                <p class="text-sm font-semibold">Curriculum System</p>
                            </div>
                            <div class="text-center p-6">
                                <div class="font-serif text-5xl mb-2" style="color: var(--primary);">A-</div>
                                <p class="text-sm font-semibold">Mean Grade (2023)</p>
                            </div>
                            <div class="text-center p-6">
                                <div class="font-serif text-5xl mb-2" style="color: var(--accent);">98%</div>
                                <p class="text-sm font-semibold">University Entry</p>
                            </div>
                        </div>
                    </div>

                    <!-- CONTACT -->
                    <div id="contact" class="mt-16 p-10 rounded-2xl" style="background: var(--primary); color: white;">
                        <h3 class="font-serif text-3xl mb-6">Get In Touch</h3>

                        <div class="grid sm:grid-cols-2 gap-8 text-sm">
                            <div>
                                <p class="uppercase tracking-wider text-blue-300 mb-2 text-xs">Email Address</p>
                                <p class="font-semibold text-lg">{{ $school->email ?? 'admissions@school.ac.ke' }}</p>
                            </div>

                            <div>
                                <p class="uppercase tracking-wider text-blue-300 mb-2 text-xs">Phone Number</p>
                                <p class="font-semibold text-lg">{{ $school->phone ?? '+254 700 000 000' }}</p>
                            </div>

                            <div class="sm:col-span-2">
                                <p class="uppercase tracking-wider text-blue-300 mb-2 text-xs">Physical Address</p>
                                <p class="font-medium text-base leading-relaxed">
                                    {{ $school->address }}<br>
                                    {{ $school->ward->name }}, {{ $school->subcounty->name }}<br>
                                    {{ $school->county->name }} County, Kenya
                                </p>
                            </div>

                            @if($school->website)
                            <div class="sm:col-span-2">
                                <a href="{{ $school->website }}" target="_blank"
                                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg font-bold transition-all"
                                    style="background: var(--accent); color: white;">
                                    Visit Website →
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- DOCUMENTS SIDEBAR -->
                <div id="documents">
                    <div class="sticky top-28">
                        <span class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider"
                            style="color: var(--accent);">
                            <span class="decorative-dot"></span>
                            Resources
                        </span>
                        <h3 class="font-serif text-3xl mt-3 mb-8">Documents</h3>

                        <div class="space-y-4">
                            @forelse($school->documents as $doc)
                            <a href="{{ asset($doc->file_url) }}" target="_blank"
                                class="doc-card flex items-start p-5 rounded-xl bg-white">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center text-2xl mr-4 shrink-0"
                                    style="background: var(--cream); color: var(--accent);">
                                    📄
                                </div>
                                <div>
                                    <p class="font-bold text-sm mb-1">{{ $doc->file_name ?? 'Download File' }}</p>
                                    <p class="text-xs uppercase tracking-wider font-semibold"
                                        style="color: var(--accent);">
                                        {{ str_replace('_', ' ', $doc->type) }}
                                    </p>
                                </div>
                            </a>
                            @empty
                            <div class="text-center py-12 px-6 rounded-xl" style="background: var(--cream);">
                                <div class="text-4xl mb-3">📚</div>
                                <p class="text-sm italic" style="color: var(--warm-gray);">Documents will be available
                                    soon</p>
                            </div>
                            @endforelse
                        </div>

                        <!-- QUICK ACTIONS -->
                        <div class="mt-8 p-6 rounded-xl" style="background: var(--cream);">
                            <h4 class="font-bold mb-4">Quick Actions</h4>
                            <div class="space-y-3">
                                <a href="#contact"
                                    class="block text-sm font-semibold hover:text-amber-700 transition-colors">
                                    → Request Admission Info
                                </a>
                                <a href="#contact"
                                    class="block text-sm font-semibold hover:text-amber-700 transition-colors">
                                    → Schedule Campus Visit
                                </a>
                                <a href="#documents"
                                    class="block text-sm font-semibold hover:text-amber-700 transition-colors">
                                    → Download Fee Structure
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-white py-16" style="background: var(--primary);">
        <div class="max-container px-6">
            <div class="grid md:grid-cols-4 gap-10 pb-12 border-b border-white/10">

                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-2xl"
                            style="background: var(--accent);">
                            🎓
                        </div>
                        <h4 class="font-bold text-xl">{{ $school->name }}</h4>
                    </div>
                    <p class="text-blue-200 text-sm leading-relaxed mb-4">
                        {{ $school->ward->name }}, {{ $school->subcounty->name }}<br>
                        {{ $school->county->name }} County, Kenya
                    </p>
                    @if($school->email)
                    <p class="text-sm text-blue-200">{{ $school->email }}</p>
                    @endif
                </div>

                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-blue-200">
                        <li><a href="#about" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#academics" class="hover:text-white transition-colors">Academics</a></li>
                        <li><a href="#gallery" class="hover:text-white transition-colors">Gallery</a></li>
                        <li><a href="#documents" class="hover:text-white transition-colors">Documents</a></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Admissions</h4>
                    <ul class="space-y-2 text-sm text-blue-200">
                        <li><a href="#contact" class="hover:text-white transition-colors">Apply Now</a></li>
                        <li><a href="#documents" class="hover:text-white transition-colors">Requirements</a></li>
                        <li><a href="#documents" class="hover:text-white transition-colors">Fee Structure</a></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">Campus Tours</a></li>
                    </ul>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6 pt-8 text-sm text-blue-200">
                <div>
                    <p>© {{ date('Y') }} {{ $school->name }}. All rights reserved.</p>
                </div>
                <div class="md:text-right">
                    <p>
                        Powered by <strong style="color: var(--accent);">SchoolPage.co.ke</strong> •
                        Bringing every Kenyan school online
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for interactions -->
    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMenu = document.getElementById('closeMenu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.add('open');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
        });

        // Close menu when clicking a link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offset = 100;
                    const targetPosition = target.offsetTop - offset;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

</body>

</html>
