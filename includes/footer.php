<!-- Bottom Bar -->
<section class="bottom-bar">
    <div class="container bottom-bar-content">

        <div class="bottom-bar-left">
            <img src="<?php echo htmlspecialchars(!empty($logo) ? $logo : '', ENT_QUOTES, 'UTF-8'); ?>" alt="Logo" class="bottom-logo">
            <div class="bottom-divider"></div>
            <div class="bottom-info">
                <div class="bottom-info-item">
                    <div class="info-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <div class="info-text">
                        <strong>Contact Us</strong>
                        <p>
                            <?php
                            $clinicAddress = htmlspecialchars($address ?? '', ENT_QUOTES, 'UTF-8');
                            $clinicAddress = preg_replace(
                                '/\s+Tejgarhi/i',
                                '<br>Tejgarhi',
                                $clinicAddress,
                                1
                            );
                            echo $clinicAddress;
                            ?>
                        </p>
                    </div>

                </div>
                <div class="bottom-info-item">
                    <div class="info-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="info-text">
                        <strong>Phone Number</strong>
                        <p><?php echo htmlspecialchars($contactno ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><?php echo htmlspecialchars($alternateno ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
                <div class="bottom-info-item timing-item">
                    <div class="info-icon">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div class="info-text">
                        <strong>Clinic Timings</strong>
                        <p><?php echo htmlspecialchars($working_days ?: 'Monday – Saturday', ENT_QUOTES, 'UTF-8'); ?> : <?php echo htmlspecialchars($time ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><?php echo htmlspecialchars($closed_days ?: 'Sunday : Closed', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        $hasSocialFooter = !empty(trim($facebook ?? '')) || !empty(trim($instagram ?? '')) || !empty(trim($youtube ?? '')) || !empty(trim($linkedin ?? '')) || !empty(trim($twitter ?? ''));
        if ($hasSocialFooter) {
        ?>
        <div class="bottom-bar-right">
            <div class="social-links">
                <?php if (!empty(trim($facebook ?? ''))) { ?>
                <a href="<?php echo htmlspecialchars(trim($facebook), ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <?php } ?>

                <?php if (!empty(trim($instagram ?? ''))) { ?>
                <a href="<?php echo htmlspecialchars(trim($instagram), ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <?php } ?>

                <?php if (!empty(trim($youtube ?? ''))) { ?>
                <a href="<?php echo htmlspecialchars(trim($youtube), ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                <?php } ?>

                <?php if (!empty(trim($linkedin ?? ''))) { ?>
                <a href="<?php echo htmlspecialchars(trim($linkedin), ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                <?php } ?>

                <?php if (!empty(trim($twitter ?? ''))) { ?>
                <a href="<?php echo htmlspecialchars(trim($twitter), ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

    </div>
</section>

<footer class="footer">

    <div class="container footer-content">

        <div class="footer-column">
            <h3>Quick Links</h3>
            <div class="footer-links-grid">
                <a href="index"><i class="bi bi-chevron-right"></i> Home</a>
                <a href="about"><i class="bi bi-chevron-right"></i> About</a>
                <a href="services"><i class="bi bi-chevron-right"></i> Services</a>
                <a href="blogs"><i class="bi bi-chevron-right"></i> Blogs</a>
                <a href="contact"><i class="bi bi-chevron-right"></i> Contact</a>
            </div>
        </div>

        <div class="footer-column footer-newsletter">
            <h3>Stay Updated</h3>
            <p>Get health tips, neurosurgical care updates, and clinic information from Dr. Dinesh Singh, Neurosurgeon at Brain And Spine Clinic.</p>
            <form class="newsletter-form" id="newsletterForm">
                <input type="email" name="email" id="newsletterEmail" placeholder="Enter your email" required>
                <button type="submit" class="subscribe-btn" id="subscribeBtn">SUBSCRIBE <i class="bi bi-send-fill"></i></button>
                <p class="newsletter-msg" id="newsletterMsg"></p>
            </form>
        </div>

    </div>

</footer>

<div class="copyright-bar">
    <div class="container copyright-content">
        <p>Copyright &copy; 2026 Neuro Care – By Dr. Dinesh Singh, All Rights Reserved.</p>
        <p>Design and Developed by <a href="https://promotionparadise.in/" target="_blank">Promotion Paradise</a></p>
    </div>
</div>

<!-- Floating Icons -->
<div class="floating-icons">
    <a href="tel:+917982156581" class="floating-icon phone-icon">
        <i class="bi bi-telephone-fill"></i>
    </a>
    <a href="https://wa.me/917906246467" target="_blank" class="floating-icon whatsapp-icon">
        <i class="bi bi-whatsapp"></i>
    </a>
</div>

<!-- Scroll to Top -->
<button id="scrollTopBtn" class="scroll-top-btn" onclick="scrollToTop()">
    <i class="bi bi-chevron-up"></i>
</button>

<script>
window.addEventListener('scroll', function() {
    var btn = document.getElementById('scrollTopBtn');
    if (window.scrollY > 300) {
        btn.classList.add('show');
    } else {
        btn.classList.remove('show');
    }
});

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

(function() {
    var form = document.getElementById('newsletterForm');
    if (!form) return;

    var msg = document.getElementById('newsletterMsg');
    var btn = document.getElementById('subscribeBtn');

    function showMsg(text, ok) {
        msg.textContent = text;
        msg.classList.toggle('success', !!ok);
        msg.classList.toggle('error', !ok);
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        var email = document.getElementById('newsletterEmail').value.trim();

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showMsg('Please enter a valid email address.', false);
            return;
        }

        btn.disabled = true;
        btn.innerHTML = 'SUBSCRIBING...';

        var data = new FormData();
        data.append('email', email);

        fetch('includes/subscribe.php', {
            method: 'POST',
            body: data
        })
        .then(function(res) { return res.json(); })
        .then(function(json) {
            showMsg(json.message, json.ok);
            if (json.ok) form.reset();
        })
        .catch(function() {
            showMsg('Something went wrong. Please try again.', false);
        })
        .finally(function() {
            btn.disabled = false;
            btn.innerHTML = 'SUBSCRIBE <i class="bi bi-send-fill"></i>';
        });
    });
})();
</script>

<script>
// Counter animation: 
(function() {
    var nums = document.querySelectorAll('.stat-card-num[data-count]');
    if (!nums.length) return;

    function parseVal(str) {
        str = (str || '').toString().trim();
        var m = str.match(/^([\d.,]+)(.*)$/);
        if (!m) return null;
        var target = parseFloat(m[1].replace(/,/g, ''));
        if (isNaN(target)) return null;
        return { target: target, suffix: m[2] || '', comma: m[1].indexOf(',') > -1 };
    }

    function fmt(n, comma) {
        n = Math.round(n);
        return comma ? n.toLocaleString('en-IN') : String(n);
    }

    function animate(el) {
        var parsed = parseVal(el.getAttribute('data-count'));
        if (!parsed) return;
        var start = null, dur = 2000;
        function step(ts) {
            if (!start) start = ts;
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3); // easeOutCubic
            el.textContent = fmt(parsed.target * eased, parsed.comma) + parsed.suffix;
            if (p < 1) requestAnimationFrame(step);
            else el.textContent = fmt(parsed.target, parsed.comma) + parsed.suffix;
        }
        requestAnimationFrame(step);
    }

    nums.forEach(function(el) {
        var parsed = parseVal(el.getAttribute('data-count'));
        if (parsed) el.textContent = fmt(0, parsed.comma) + parsed.suffix;
    });

    if (!('IntersectionObserver' in window)) {
        nums.forEach(animate);
        return;
    }
    var io = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
            if (e.isIntersecting) { animate(e.target); io.unobserve(e.target); }
        });
    }, { threshold: 0.4 });
    nums.forEach(function(el) { io.observe(el); });
})();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>