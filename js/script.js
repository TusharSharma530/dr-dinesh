
document.addEventListener('DOMContentLoaded', function () {

    const MOBILE_BREAKPOINT = 991;

    const header = document.querySelector('.main-header');
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const servicesDropdown = document.querySelector('.nav-dropdown');
    const servicesToggle = document.querySelector('.services-toggle');
    const appointmentModal = document.getElementById('appointmentModal');
    const appointmentOpenBtn = document.getElementById('appointmentOpenBtn');
    const appointmentCloseBtn = document.getElementById('appointmentCloseBtn');
    const appointmentForm = document.getElementById('appointmentForm');


    /* ---------------- header (scrolled state) ---------------- */

    function updateHeader() {
        if (header) header.classList.toggle('scrolled', window.scrollY > 100);
    }

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });


    /* header is fixed - give the page the matching top spacing */
    function syncBodyPadding() {
        if (header) document.body.style.paddingTop = header.offsetHeight + 'px';
    }

    syncBodyPadding();
    window.addEventListener('load', syncBodyPadding);

    window.addEventListener('resize', function () {
        syncBodyPadding();
        if (window.innerWidth > MOBILE_BREAKPOINT) closeMobileMenu();
    });


    /* ---------------- services dropdown ---------------- */

    function openServicesDropdown() {
        if (!servicesDropdown) return;
        servicesDropdown.classList.add('open');
        if (servicesToggle) servicesToggle.setAttribute('aria-expanded', 'true');
    }

    function closeServicesDropdown() {
        if (!servicesDropdown) return;
        servicesDropdown.classList.remove('open');
        if (servicesToggle) servicesToggle.setAttribute('aria-expanded', 'false');
    }

    function toggleServicesDropdown() {
        if (!servicesDropdown) return;
        if (servicesDropdown.classList.contains('open')) closeServicesDropdown();
        else openServicesDropdown();
    }

    if (servicesToggle) {
        servicesToggle.addEventListener('click', function (event) {
            // on desktop it is a normal link to services.php
            if (window.innerWidth > MOBILE_BREAKPOINT) return;
            event.preventDefault();
            toggleServicesDropdown();
        });
    }


    /* ---------------- mobile menu ---------------- */

    function openMobileMenu() {
        if (!navLinks || !menuToggle) return;
        navLinks.classList.add('open');
        menuToggle.setAttribute('aria-expanded', 'true');
        const icon = menuToggle.querySelector('i');
        if (icon) icon.className = 'bi bi-x-lg';
    }

    function closeMobileMenu() {
        if (!navLinks || !menuToggle) return;
        navLinks.classList.remove('open');
        menuToggle.setAttribute('aria-expanded', 'false');
        const icon = menuToggle.querySelector('i');
        if (icon) icon.className = 'bi bi-list';
        closeServicesDropdown();
    }

    function toggleMobileMenu() {
        if (!navLinks) return;
        if (navLinks.classList.contains('open')) closeMobileMenu();
        else openMobileMenu();
    }

    if (menuToggle) {
        menuToggle.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            toggleMobileMenu();
        });
    }

    // links inside the mobile nav
    if (navLinks) {
        navLinks.addEventListener('click', function (event) {
            const link = event.target.closest('a');
            if (!link) return;

            // "Services" toggles its submenu instead of navigating
            if (link.classList.contains('services-toggle')) return;

            // submenu item -> close the menu, then the link takes over
            if (link.closest('.dropdown-menu')) {
                if (window.innerWidth <= MOBILE_BREAKPOINT) closeMobileMenu();
                return;
            }

            // normal navigation link
            if (window.innerWidth <= MOBILE_BREAKPOINT) closeMobileMenu();
        });
    }

    // click outside the menu closes it
    document.addEventListener('click', function (event) {
        if (!navLinks || !navLinks.classList.contains('open')) return;

        const clickedInsideMenu = navLinks.contains(event.target);
        const clickedMenuToggle = menuToggle && menuToggle.contains(event.target);

        if (!clickedInsideMenu && !clickedMenuToggle) closeMobileMenu();
    });

    // Escape closes everything
    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') return;
        closeServicesDropdown();
        closeMobileMenu();
        closeAppointmentModal();
    });


    /* ---------------- appointment modal ---------------- */

    function openAppointmentModal() {
        if (!appointmentModal) return;
        appointmentModal.style.display = 'flex';
        document.body.classList.add('modal-open');
    }

    function closeAppointmentModal() {
        if (!appointmentModal) return;
        appointmentModal.style.display = 'none';
        document.body.classList.remove('modal-open');
    }

    if (appointmentOpenBtn) {
        appointmentOpenBtn.addEventListener('click', openAppointmentModal);
    }

    if (appointmentCloseBtn) {
        appointmentCloseBtn.addEventListener('click', closeAppointmentModal);
    }

    if (appointmentModal) {
        appointmentModal.addEventListener('click', function (event) {
            if (event.target === appointmentModal) closeAppointmentModal();
        });
    }

    if (appointmentForm) {
        appointmentForm.addEventListener('submit', function (event) {
            event.preventDefault();
        });
    }


    function initSliderArrows(trackSelector, navSelector, cardSelector, dirAttr) {
        const track = document.querySelector(trackSelector);
        const nav = document.querySelector(navSelector);
        if (!track || !nav) return;

        const prev = nav.querySelector('[' + dirAttr + '="-1"]');
        const next = nav.querySelector('[' + dirAttr + '="1"]');
        if (!prev || !next) return;

        function updateNav() {
            const maxScroll = track.scrollWidth - track.clientWidth - 2;
            prev.disabled = track.scrollLeft <= 2;
            next.disabled = maxScroll <= 2 || track.scrollLeft >= maxScroll;
        }

        nav.addEventListener('click', function (event) {
            const btn = event.target.closest('button');
            if (!btn || btn.disabled) return;

            const card = track.querySelector(cardSelector);
            const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
            const step = card ? card.getBoundingClientRect().width + gap : track.clientWidth;

            track.scrollBy({ left: step * Number(btn.getAttribute(dirAttr)), behavior: 'smooth' });
        });

        track.addEventListener('scroll', updateNav, { passive: true });
        window.addEventListener('resize', updateNav);
        updateNav();
    }

    // homepage "Our Services"
    initSliderArrows('.services-section .services-cards', '.services-nav', '.service-card', 'data-services-dir');

    // homepage gallery
    initSliderArrows('.gallery-section .gallery-cards', '.gallery-section .gallery-nav', '.gallery-card', 'data-gallery-dir');


    /* ---------------- testimonial slider (autoplay + prev / next) ---------------- */

    (function () {
        const slides = document.querySelectorAll('.testimonial-slide');
        if (!slides.length) return;

        let currentSlide = 0;
        let isAnimating = false;

        function changeSlide(direction) {
            if (isAnimating) return;
            isAnimating = true;

            const current = slides[currentSlide];
            const nextIndex = (currentSlide + direction + slides.length) % slides.length;
            const next = slides[nextIndex];

            if (direction > 0) {
                next.classList.add('prepare-left');
                void next.offsetWidth;
                current.classList.add('exit-right');
                next.classList.remove('prepare-left');
                next.classList.add('enter-left');
            } else {
                next.classList.add('prepare-right');
                void next.offsetWidth;
                current.classList.add('exit-left');
                next.classList.remove('prepare-right');
                next.classList.add('enter-right');
            }

            setTimeout(function () {
                current.classList.remove('active', 'exit-left', 'exit-right');
                next.classList.remove('enter-right', 'enter-left', 'prepare-right', 'prepare-left');
                next.classList.add('active');

                currentSlide = nextIndex;
                isAnimating = false;
            }, 500);
        }

        // index.php uses inline onclick="changeSlide(-1)", so keep it global
        window.changeSlide = changeSlide;

        setInterval(function () { changeSlide(1); }, 4000);
    })();


    /* ---------------- image lightbox ---------------- */

    (function () {
        const modal = document.getElementById('imageLightbox');
        const modalImg = document.getElementById('lightboxImg');
        const closeBtn = document.querySelector('.lightbox-close');
        if (!modal || !modalImg || !closeBtn) return;

        document.querySelectorAll('.lightbox-trigger').forEach(function (img) {
            img.addEventListener('click', function () {
                modal.style.display = 'block';
                modalImg.src = this.src;
            });
        });

        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        modal.addEventListener('click', function (event) {
            if (event.target === modal) modal.style.display = 'none';
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') modal.style.display = 'none';
        });
    })();

});
