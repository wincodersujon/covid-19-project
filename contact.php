<?php $page = 'contact';
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
            <h2>Contact Us</h2>
            <span class="page-home"><a href="index.php">Home</a> > </span>
            <span>Contact</span>
        </div>
    </div>
</section>

<!-- Start: Contact Section 
==================================================-->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <h3>
                    Contact Informations
                </h3>
                <ul class="contact-area lab-ul">
                    <li class="contact-item">
                        <div class="contact-icon">
                            <img src="img/01.png" alt="contact">
                        </div>
                        <div class="contact-content">
                            <h6>Our Location</h6>
                            <p>Bangladesh Kuwait
                                Moitree Hospital,
                                <br> Uttara, Dhaka
                            </p>
                        </div>
                    </li>
                    <li class="contact-item">
                        <div class="contact-icon">
                            <img src="img/02.png" alt="contact">
                        </div>
                        <div class="contact-content">
                            <h6>Phone Number</h6>
                            <p>1711307069, 01932-505913 <br> +0995646788</p>
                        </div>
                    </li>
                    <li class="contact-item">
                        <div class="contact-icon">
                            <img src="img/03.png" alt="contact">
                        </div>
                        <div class="contact-content">
                            <h6>Email Address</h6>
                            <p>suport@vaccines.com</p>
                        </div>
                    </li>
                    <li class="contact-item">
                        <div class="contact-icon">
                            <img src="img/04.png" alt="contact">
                        </div>
                        <div class="contact-content">
                            <h6>Website Address:</h6>
                            <p>http://vaccines.com</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-sm-12">
                <div id="contact-area">
                    <h3>
                        Send us a Massage
                    </h3>
                    <form method="post" action="mailer.php">
                        <input type="text" name="Name" id="Name" placeholder="Your Name* :" />
                        <input type="text" name="Email" id="Email" placeholder="Your Email* :" />
                        <input type="text" name="Tel" id="Tel" placeholder="Your Number* :" />
                        <input type="text" name="Address" id="Address" placeholder="Your Address* :" />
                        <textarea name="Message" rows="20" cols="20" id="Message" placeholder="Message* :"></textarea>

                        <input type="submit" name="submit" value="Send Message" class="submit-button" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d28950.34958102105!2d91.82208290000001!3d24.9050177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1638951292732!5m2!1sen!2sbd"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

<!-- End: Contact Section 
==================================================-->



<?php 
    include "footer.php";
?>