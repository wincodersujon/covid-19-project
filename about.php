<?php $page = 'about';
include "header.php"; ?>

<!-- Start: Navbar Section 
==================================================-->
<div class="header_section">
    <div class="container">
        <div class="row">
            <?php include "navbar.php"; ?>
        </div>
    </div>
</div>

<!-- End: Navbar Section 
==================================================-->

<section class="page-header">
    <div class="container">
        <div class="page-title">
            <h2>About Us</h2>
            <span class="page-home"><a href="index.php">Home</a> > </span>
            <span>About</span>
        </div>
    </div>
</section>


<!-- Start: About Section 
==================================================-->
<div class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="section-head">
                    <h5 class="subtitle"> About... </h5>
                    <h2 class="title"> Health is the root of all happiness</h2>
                    <p> We update the bed availability, oxygen, ICU availability in nearby hospitals. This service is
                        available across Bangladesh. The goal is to help patients make more informed decisions about
                        their medical care. When a hospital is running low on bed availability, oxygen, or ICU
                        availability, this information is updated in real time. This service also includes getting
                        vaccinated for the new COVID vaccination. </p>
                    <p> How to use the service? To use the service, you
                        need
                        to register on the website. You can register yourself or your client.

                    </p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="about_img">
                    <img src="img/about.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End: About Section 
==================================================-->

<!-- Start: Team Section 
==================================================-->
<div class="doctor_section">
    <div class="container">
        <div class="section-head">
            <h5 class="subtitle">Meet Our Doctors</h5>
            <h2 class="title">Meet Our Professional Doctors </h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="doctor-list">
                    <div class="doctor-content">
                        <h5 class="doctor-name"> Dr. Akole Prasad </h5>
                        <span class="doctor-dagi">Sergion Specialist</span>
                        <p class="doctor-details">Dr. Akole is and internist in Sergion Specialist
                            and has been in practilce between 2-3 years </p>
                        <ul>
                            <li><span>Speciality</span>: Cardiology </li>
                            <li><span>Degrees</span>: M.D. of Medicine</li>
                            <li><span>Experiences</span>: 03+ Years </li>
                        </ul>
                    </div>
                    <div class="doctor-thumb">
                        <img src="img/doctor1.png" alt="doctor-membar">
                    </div>
                </div>
            </div>
            <!-- Docton list 1 -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="doctor-list">
                    <div class="doctor-content">
                        <h5 class="doctor-name"> Dr. Agarkhedkar Nikhil </h5>
                        <span class="doctor-dagi">Dermatology Specialist</span>
                        <p class="doctor-details">Dr. Agarkhedkar is and internist in Dermatology
                            and has been in practilce between 5-9 years </p>
                        <ul>
                            <li><span>Speciality</span>: Sergion Specialist</li>
                            <li><span>Degrees</span>: M.D. of Medicine</li>
                            <li><span>Experiences</span>: 09+ Years</li>
                        </ul>
                    </div>
                    <div class="doctor-thumb">
                        <img src="img/doctor2.png" alt="doctor-membar">
                    </div>
                </div>
            </div>
            <!-- Docton list 2 -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="doctor-list">
                    <div class="doctor-content">
                        <h5 class="doctor-name"> Dr. Arora Sonali </h5>
                        <span class="doctor-dagi">Neurology Specialist</span>
                        <p class="doctor-details">Dr. Arora Kovalsky is and internist in Neurology
                            and has been in practilce between 4-5 years </p>
                        <ul>
                            <li><span>Speciality</span>: Sergion Specialist</li>
                            <li><span>Degrees</span>: M.D. of Medicine</li>
                            <li><span>Experiences</span>: 05+ Years </li>
                        </ul>
                    </div>
                    <div class="doctor-thumb">
                        <img src="img/doctor3.png" alt="doctor-membar">
                    </div>
                </div>
            </div>
            <!-- Docton list 3 -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="doctor-list">
                    <div class="doctor-content">
                        <h5 class="doctor-name"> Dr. Athavale Smita</h5>
                        <span class="doctor-dagi">Paediatrics Specialist</span>
                        <p class="doctor-details">Dr. Jason Kovalsky is and internist in Athavale
                            and has been in practilce between 6-8 years </p>
                        <ul>
                            <li><span>Speciality</span>: Sergion Specialist</li>
                            <li><span>Degrees</span>: M.D. of Medicine</li>
                            <li><span>Experiences</span>: 08+ Years </li>
                        </ul>
                    </div>
                    <div class="doctor-thumb">
                        <img src="img/doctor4.png" alt="doctor-membar">
                    </div>
                </div>
                <!-- Docton list 4 -->
            </div>
        </div>
    </div>
</div>

<!-- End: Team Section 
==================================================-->

<?php 
    include "footer.php";
?>