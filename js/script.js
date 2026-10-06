document.addEventListener('DOMContentLoaded', function () {

    const header =
        document.querySelector('.main-header');

    const menuToggle =
        document.querySelector('.menu-toggle');

    const navLinks =
        document.querySelector('.nav-links');

    const servicesDropdown =
        document.querySelector('.nav-dropdown');

    const servicesToggle =
        document.querySelector('.services-toggle');

    const appointmentModal =
        document.getElementById('appointmentModal');

    const appointmentOpenBtn =
        document.getElementById('appointmentOpenBtn');

    const appointmentCloseBtn =
        document.getElementById('appointmentCloseBtn');

    const appointmentForm =
        document.getElementById('appointmentForm');


    const MOBILE_BREAKPOINT = 991;

    function updateHeader() {

        if (!header) return;

        if (window.scrollY > 100) {

            header.classList.add('scrolled');

        } else {

            header.classList.remove('scrolled');

        }

    }


    window.addEventListener(
        'scroll',
        updateHeader,
        { passive: true }
    );

    updateHeader();

    function syncBodyPadding() {

        if (!header) return;

        /*
         * Header is fixed.
         * Give the page enough top spacing.
         */

        const height =
            header.offsetHeight;

        document.body.style.paddingTop =
            height + 'px';

    }


    syncBodyPadding();


    window.addEventListener(
        'load',
        syncBodyPadding
    );


    window.addEventListener(
        'resize',
        function () {

            syncBodyPadding();

            if (
                window.innerWidth >
                MOBILE_BREAKPOINT
            ) {

                closeMobileMenu();

            }

        }
    );

    function openServicesDropdown() {

        if (!servicesDropdown) return;

        servicesDropdown.classList.add('open');

        if (servicesToggle) {

            servicesToggle.setAttribute(
                'aria-expanded',
                'true'
            );

        }

    }


    function closeServicesDropdown() {

        if (!servicesDropdown) return;

        servicesDropdown.classList.remove('open');

        if (servicesToggle) {

            servicesToggle.setAttribute(
                'aria-expanded',
                'false'
            );

        }

    }


    function toggleServicesDropdown() {

        if (!servicesDropdown) return;

        const isOpen =
            servicesDropdown.classList.contains('open');


        if (isOpen) {

            closeServicesDropdown();

        } else {

            openServicesDropdown();

        }

    }


    if (servicesToggle) {

        servicesToggle.addEventListener(
            'click',
            function (event) {

                const clickedChevron =
                    event.target.closest(
                        '.services-toggle i.bi-chevron-down'
                    );


                if (clickedChevron) {
                    event.preventDefault();
                    event.stopPropagation();
                    toggleServicesDropdown();
                    return;

                }

            }
        );

    }

// mobile view

    function openMobileMenu() {

        if (!navLinks || !menuToggle) return;

        navLinks.classList.add('open');

        menuToggle.setAttribute(
            'aria-expanded',
            'true'
        );


        const icon =
            menuToggle.querySelector('i');


        if (icon) {

            icon.className =
                'bi bi-x-lg';

        }

    }


    function closeMobileMenu() {

        if (!navLinks || !menuToggle) return;

        navLinks.classList.remove('open');

        menuToggle.setAttribute(
            'aria-expanded',
            'false'
        );


        const icon =
            menuToggle.querySelector('i');


        if (icon) {

            icon.className =
                'bi bi-list';

        }


        closeServicesDropdown();

    }


    function toggleMobileMenu() {

        if (!navLinks) return;

        const isOpen =
            navLinks.classList.contains('open');


        if (isOpen) {

            closeMobileMenu();

        } else {

            openMobileMenu();

        }

    }
// hamerburg btn

    if (menuToggle) {

        menuToggle.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                event.stopPropagation();

                toggleMobileMenu();

            }
        );

    }

    if (navLinks) {

        navLinks.addEventListener(
            'click',
            function (event) {

                const link =
                    event.target.closest('a');


                if (!link) return;

                if (
                    link.classList.contains(
                        'services-toggle'
                    )
                ) {
                    return;

                }


                /*
                 * SERVICES SUBMENU ITEM
                 */

                if (
                    link.closest('.dropdown-menu')
                ) {

                    if (
                        window.innerWidth <=
                        MOBILE_BREAKPOINT
                    ) {

                        closeMobileMenu();

                    }

                    return;

                }


                /*
                 * NORMAL MOBILE NAVIGATION
                 */

                if (
                    window.innerWidth <=
                    MOBILE_BREAKPOINT
                ) {

                    closeMobileMenu();

                }

            }
        );

    }
    document.addEventListener(
        'click',
        function (event) {

            if (!navLinks) return;


            if (
                !navLinks.classList.contains('open')
            ) {

                return;

            }


            const clickedInsideMenu =
                navLinks.contains(event.target);


            const clickedMenuToggle =
                menuToggle &&
                menuToggle.contains(event.target);


            if (
                !clickedInsideMenu &&
                !clickedMenuToggle
            ) {

                closeMobileMenu();

            }

        }
    );

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key !== 'Escape') return;


            closeServicesDropdown();

            closeMobileMenu();

            closeAppointmentModal();

        }
    );

// appointment modal

    function openAppointmentModal() {

        if (!appointmentModal) return;

        appointmentModal.style.display =
            'flex';

        document.body.classList.add(
            'modal-open'
        );

    }


    function closeAppointmentModal() {

        if (!appointmentModal) return;

        appointmentModal.style.display =
            'none';

        document.body.classList.remove(
            'modal-open'
        );

    }


    if (appointmentOpenBtn) {

        appointmentOpenBtn.addEventListener(
            'click',
            function () {

                openAppointmentModal();

            }
        );

    }
    if (appointmentCloseBtn) {

        appointmentCloseBtn.addEventListener(
            'click',
            function () {

                closeAppointmentModal();

            }
        );

    }

    if (appointmentModal) {

        appointmentModal.addEventListener(
            'click',
            function (event) {

                if (
                    event.target ===
                    appointmentModal
                ) {

                    closeAppointmentModal();

                }

            }
        );

    }

    if (appointmentForm) {

        appointmentForm.addEventListener(
            'submit',
            function (event) {

                event.preventDefault();
            }
        );

    }


});
