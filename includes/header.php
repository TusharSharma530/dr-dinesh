<?php require_once __DIR__ . '/../manager/database/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>
        <?php  echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Dr Dinesh | Neurosurgical & Brain Care'; ?>
    </title>
    <meta name="description" content="Professional neurosurgical care and consultation." >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="slick/slick.css" >
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" >
    <link  rel="stylesheet"  href="css/style.css" >
    <link rel="stylesheet" href="css/responsiveness.css" >
    <script src="js/script.js" defer ></script>
</head>


<body>

<header class="main-header">

    <div class="container header-content">
        <a href="index.php"  class="logo"  aria-label="Neuro Care Home" >
            <img  src="assets/icons/logo.png" alt="Neuro Care Logo" class="logo-img" >
        </a>

        <div class="header-right">
<!-- top bar -->

            <div class="top-bar">
                <div class="top-bar-content">

                    <!-- APPOINTMENT MESSAGE -->

                    <div class="top-info">

                        <span>
                            You can request appointment in 24 hours
                        </span>

                    </div>

                    <div class="contact-info">
                        <span>

                            <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                             Email : brainspine24@gmail.com
                        </span>

                        <span class="separator" aria-hidden="true" >
                        </span>

                        <span>

                            <i class="bi bi-telephone-fill"  aria-hidden="true" ></i>
                            Phone : 7982156581, 7906246467
                        </span>

                        <span class="separator" aria-hidden="true">
                            |
                        </span>

                        <div class="social-icons">

                            <a
                                href="https://www.facebook.com/p/NeuroDoctorMeerut"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Facebook"
                            >

                                <i class="bi bi-facebook" aria-hidden="true" ></i>
                            </a>

                            <a
                                href="https://www.instagram.com/p/DcyMcyYhFZo/"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Instagram"
                            >

                                <i  class="bi bi-instagram" aria-hidden="true" ></i>
                            </a>

                            <a
                                href="https://www.youtube.com/"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="YouTube"
                            >

                                <i  class="bi bi-youtube"  aria-hidden="true"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>
<!-- navbar -->

            <div class="navbar">

                <nav class="nav-links" id="main-navigation" aria-label="Main Navigation"
                >

                    <a href="index.php">
                        Home
                    </a>

                    <a href="about.php">
                        About
                    </a>

                    <div class="nav-dropdown">
                        <a  href="services.php" class="services-toggle" aria-expanded="false"
                            aria-haspopup="true"
                        >

                            <span>
                                Services
                            </span>

                            <i class="bi bi-chevron-down"  aria-hidden="true"></i>
                        </a>

                        <!-- SERVICES SUBMENU -->

                        <div class="dropdown-menu">
                            <a href="services.php?service=brain-tumor" >
                                Brain Tumor Surgery
                            </a>

                            <a  href="services.php?service=spine-surgery" >
                                Spine Surgery
                            </a>

                            <a  href="services.php?service=aneurysm" >
                                Aneurysm Clipping
                            </a>


                            <a
                                href="services.php?service=dbs"
                            >
                                Deep Brain Stimulation
                            </a>


                            <a
                                href="services.php?service=trauma"
                            >
                                Neurotrauma Surgery
                            </a>


                            <a
                                href="services.php?service=pediatric"
                            >
                                Pediatric Neurosurgery
                            </a>

                        </div>

                    </div>


                    <!-- GALLERY -->

                    <a href="gallery.php">
                        Gallery
                    </a>


                    <!-- BLOGS -->

                    <a href="blogs.php">
                        Blogs
                    </a>


                    <!-- CONTACT -->

                    <a href="contact.php">
                        Contact Us
                    </a>

                </nav>
 <!-- appointment button -->

                <button
                    class="appointment-btn"
                    type="button"
                    id="appointmentOpenBtn"
                >
                    APPOINTMENT
                </button>
<!-- Mobile menu btn -->

                <button
                    class="menu-toggle"
                    type="button"
                    aria-label="Toggle Navigation Menu"
                    aria-expanded="false"
                    aria-controls="main-navigation"
                >

                    <i
                        class="bi bi-list"
                        aria-hidden="true"
                    ></i>

                </button>

            </div>

        </div>

    </div>

</header>
<!-- appointment modal -->

<div
    id="appointmentModal"
    class="appointment-modal"
    role="dialog"
    aria-modal="true"
    aria-labelledby="appointmentTitle"
>


    <div class="appointment-modal-content">

        <button
            type="button"
            class="appointment-close"
            id="appointmentCloseBtn"
            aria-label="Close appointment modal"
        >

            &times;

        </button>


        <h2 id="appointmentTitle">
            Book Appointment
        </h2>


        <p class="appointment-subtitle">
            Fill in the details below to book your appointment
        </p>


        <form  class="appointment-form" id="appointmentForm" >

            <div class="appointment-form-row">

                <input  type="text" name="name" placeholder="Full Name" autocomplete="name"  required >

                <input type="email" name="email"  placeholder="Email Address" autocomplete="email" required  >

            </div>

            <!-- PHONE + DATE -->

            <div class="appointment-form-row">

                <input type="tel"  name="phone" placeholder="Phone Number"  autocomplete="tel"  required  >

                <input  type="date" name="date"  required >
            </div>

            <!-- TIME + SERVICE -->

            <div class="appointment-form-row">

                <input type="time" name="time" required >

                <select name="service" required >

                    <option  value="" disabled selected >
                        Select Services
                    </option>


                    <option value="brain-tumor">
                        Brain Tumor Surgery
                    </option>


                    <option value="spine-surgery">
                        Spine Surgery
                    </option>


                    <option value="aneurysm">
                        Aneurysm Clipping
                    </option>


                    <option value="dbs">
                        Deep Brain Stimulation
                    </option>


                    <option value="trauma">
                        Neurotrauma Surgery
                    </option>


                    <option value="pediatric">
                        Pediatric Neurosurgery
                    </option>

                </select>

            </div>

            <textarea
                name="message"
                placeholder="Your Message"
                rows="4"
                required
            ></textarea>

            <!-- SUBMIT BUTTON -->

            <button type="submit" class="appointment-submit-btn" >
                BOOK APPOINTMENT
            </button>

        </form>

    </div>

</div>


</body>
</html>
