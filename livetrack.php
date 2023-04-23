<?php $page = 'live';
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
            <h2>Live Tracker</h2>
            <span class="page-home"><a href="index.php">Home</a> > </span>
            <span>Live Tracker</span>
        </div>
    </div>
</section>


<!-- Start: Tracker Section 
==================================================-->
<section class="livetrack-section" id="livetrack">
    <div class="container">
        <div class="section-head">
            <h5 class="subtitle"> COVID-19 Tracker </h5>
            <h2 class="title">Covid-19 World Wide Stats </h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="elfsight-app-7f6433af-02d2-4be7-9054-f5e91d85ddcf livetrackmap"></div>
            </div>
        </div>
    </div>
</section>

<!-- Start: Tracker Section 
==================================================-->

<?php 
    include "footer.php";
?>