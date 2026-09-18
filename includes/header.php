<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr Dinesh | Neurology & Brain Care</title>
    <meta name="description" content="Professional neurological care and consultation.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>


<header class="main-header">

    <div class="container header-content">

        <a href="index.php" class="logo">
            <img src="assets/icons/logo.png" alt="Neuro Care Logo" class="logo-img">
        </a>

        <div class="header-right">

            <div class="top-bar">
                <div class="top-bar-content">
                    <div class="top-info">
                        <span>You can request appointment in 24 hours</span>
                    </div>
                    <div class="contact-info">
                        <span>
                            <i class="bi bi-envelope-fill"></i>
                            Email : brainspine24@gmail.com
                        </span>
                        <span class="separator">|</span>
                        <span>
                            <i class="bi bi-telephone-fill"></i>
                            Phone : (+91) 7982156581
                        </span>
                        <span class="separator">|</span>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/p/NeuroDoctorMeerut"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/p/DcyMcyYhFZo/"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/"><i class="bi bi-youtube"></i></a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- NAVBAR -->
            <div class="navbar">
                <nav class="nav-links">
                    <a href="index.php" class="active">Home</a>
                    <a href="about.php">About</a>
                    <div class="nav-dropdown">
                        <a href="services.php">Services <i class="bi bi-chevron-down"></i></a>
                        <div class="dropdown-menu">
                            <a href="services.php">Stroke Management</a>
                            <a href="services.php">Migraine Treatment</a>
                            <a href="services.php">Neuromuscular Treatment</a>
                            <a href="services.php">Paralysis Treatment</a>
                            <a href="services.php">Epilepsy Treatment</a>
                            <a href="services.php">Sleep Disorder</a>
                        </div>
                    </div>
                    <a href="gallery.php">Gallery</a>
                    <a href="blogs.php">Blogs</a>
                    <a href="contact.php">Contact Us</a>
                </nav>

                <button class="appointment-btn" onclick="document.getElementById('appointmentModal').style.display='flex'">
                    APPOINTMENT
                </button>
            </div>

        </div>

    </div>

</header>

<!-- Appointment Popup Modal -->
<div id="appointmentModal" class="appointment-modal">
    <div class="appointment-modal-content">
        <span class="appointment-close" onclick="document.getElementById('appointmentModal').style.display='none'">&times;</span>
        <h2>Book Appointment</h2>
        <p class="appointment-subtitle">Fill in the details below to book your appointment</p>

        <form class="appointment-form">
            <div class="appointment-form-row">
                <input type="text" placeholder="Full Name" required>
                <input type="email" placeholder="Email Address" required>
            </div>

            <div class="appointment-form-row">
                <input type="tel" placeholder="Phone Number" required>
                <input type="date" required>
            </div>

            <div class="appointment-form-row">
                <input type="time" required>
                <select required>
                <option value="" disabled selected>Select Services</option>
                <option value="stroke">Stroke Management</option>
                <option value="migraine">Migraine Treatment</option>
                <option value="neuromuscular">Neuromuscular Treatment</option>
                <option value="paralysis">Paralysis Treatment</option>
                <option value="epilepsy">Epilepsy Treatment</option>
                <option value="sleep">Sleep Disorder</option>
                </select>
            </div>

            <textarea placeholder="Your Message" rows="4" required></textarea>

            <button type="submit" class="appointment-submit-btn">BOOK APPOINTMENT</button>
        </form>
    </div>
</div>


<script>
    // Close modal when clicking outside
    document.getElementById('appointmentModal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.style.display = 'none';
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.getElementById('appointmentModal').style.display = 'none';
        }
    });
</script>
