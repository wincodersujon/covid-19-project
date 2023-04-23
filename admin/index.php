<?php $page = 'index';
include 'inc/header.php'; 
?>

<!-- Content Section -->
<div class="content-wrapper" data-aos="fade-left" data-aos-duration="1000">

    <?php
        //Database Connection
        include "inc/connection.php";
        $query = "SELECT * FROM hospitals_info ORDER BY hospital_id DESC";
        $result = mysqli_query($connection,$query) or die("Failed");
        $count = mysqli_num_rows($result); 
        $row = mysqli_fetch_assoc($result)
        ?>

    <div class="content">
        <div class="row">
            <!-- Top Statistics -->
            <div class="col-md-12 col-sm-12">

                <?php  
                $data = file_get_contents('https://services1.arcgis.com/Hp6G80Pky0om7QvQ/arcgis/rest/services/Hospitals_1/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json');
                $coronalive = json_decode($data, true);
                $statescount = count($coronalive['features']);
                $i=0;
                $max=1;
                while(($i < $statescount) && ($i < $max)){ 
                ?>

                <h5 class="text-capitalize pb-3"> <i class="mdi mdi-hospital-building"></i>
                    <?php echo  $coronalive['features'][$i]['attributes']['NAME'] ?>
                </h5>

                <div class="row hospital_info">
                    <div class="col-xl-3 col-md-6 col-sm-12 m-b-30">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/normal-bed.png" alt="">
                                <div class="text-center mt-4">
                                    <h5> <?php echo $coronalive['features'][$i]['attributes']['BEDS']; ?></h5>
                                    <p class="mb-2 text-truncate"> Normal Bed </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-12 m-b-30">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/icu-bed.png" alt="">
                                <div class="text-center mt-4">
                                    <h5> <?php echo $coronalive['features'][$i]['attributes']['ZIP']; ?></h5>
                                    <p class="mb-2 text-truncate">ICU Bed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-12 m-b-30">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/oxygen.png" alt="">
                                <div class="text-center mt-4">
                                    <h5> <?php echo $coronalive['features'][$i]['attributes']['POPULATION']; ?> </h5>
                                    <p class="mb-2 text-truncate">Oxygen</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-12 m-b-30">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/plasma.png" alt="">
                                <div class="text-center mt-4">
                                    <h5> <?php echo $coronalive['features'][$i]['attributes']['NAICS_CODE']; ?></h5>
                                    <p class="mb-2 text-truncate">Plasma Donor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $i++;  
                }
                ?>
                <div class="row">
                    <div class="col-xl-6 col-sm-12  m-b-30 revenue_anlyt_sec">
                        <div class="card">
                            <div class="card-body">
                                <div class="media-body">
                                    <p class="f-w-500">Patient Statistics <span
                                            class="f-w-700 font-primary ml-2">78.34%</span></p>
                                </div>

                                <div class="card_icon"><i class="mdi mdi-finance"></i></div>

                                <div class="chartjs-wrapper">
                                    <canvas id="revenue_anlyt"></canvas>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="text-center mt-4">
                                            <p class="mb-2 text-truncate"><i
                                                    class="mdi mdi-circle font-primary font-size-10 mr-1"></i> This
                                                month</p>
                                            <h5>454 Booked</h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-center mt-4">
                                            <p class="mb-2 text-truncate"><i
                                                    class="mdi mdi-circle font-size-10 mr-1"></i> This Year </p>
                                            <h5>442 Booked</h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-center mt-4">
                                            <p class="mb-2 text-truncate"><i
                                                    class="mdi mdi-circle font-size-10 mr-1"></i> Previous Year </p>
                                            <h5>42 Booked</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Statistics -->


                    <div class="col-xl-6 col-md-12 col-sm-12 m-b-30">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h3 class="d-inline font-primary">World Covid-19</h3>
                                    <div class="card_icon"><i class="mdi mdi-earth"></i></div>
                                </div>
                                <div class="vector_map_world">
                                    <div id="world" style="height: 100%; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:  Map -->


                    <div class="col-xl-6 col-md-12 col-sm-12 m-b-30 sales_overview_sec">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header m-b-0">
                                    <h3 class="d-inline font-primary">Vaccine Registered List</h3>
                                    <div class="card_icon"><i class="mdi mdi-calendar-multiple"></i></div>
                                </div>

                                <div class="p-t-15">
                                    <div class="table-responsive">

                                        <?php
              //Database Connection
              include "inc/connection.php";
              $query = "SELECT * FROM vaccine_registration ORDER BY vaccine_id DESC LIMIT 6";
              $result = mysqli_query($connection,$query) or die("Failed");
              $count = mysqli_num_rows($result);
                          if($count > 0){ ?>

                                        <table class="mb-0 table table-bordered">
                                            <thead>
                                                <tr class="heading">
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                    while($row = mysqli_fetch_assoc($result)){  
                ?>
                                                <tr>
                                                    <td class="col-3"><?php echo $row['fullname']; ?></td>
                                                    <td class="col-4"><?php echo $row['address']; ?></td>
                                                    <td class="col-3"><?php echo $row['phone']; ?></td>
                                                </tr>
                                                <?php 
                    } //while
                ?>
                                            </tbody>
                                            <?php
              }else{
                  echo "No Data";
          } //if

          ?>
                                        </table>
                                    </div> <!-- end: table-responsive  -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End:  Covid test request -->

                    <div class="col-xl-6 col-md-12 col-sm-12 m-b-30 sales_overview_sec">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header m-b-0">
                                    <h3 class="d-inline font-primary">Doctor Appointment Request</h3>
                                    <div class="card_icon"><i class="mdi mdi-calendar-plus"></i></div>
                                </div>

                                <div class="p-t-15">
                                    <div class="table-responsive">

                                        <?php
              //Database Connection
              include "inc/connection.php";
              $query = "SELECT * FROM appointment ORDER BY appointment_id DESC LIMIT 6";
              $result = mysqli_query($connection,$query) or die("Failed");
              $count = mysqli_num_rows($result);
                          if($count > 0){ ?>

                                        <table class="mb-0 table table-bordered">
                                            <thead>
                                                <tr class="heading">
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                    while($row = mysqli_fetch_assoc($result)){  
                ?>
                                                <tr>
                                                    <td class="col-3"><?php echo $row['fullname']; ?></td>
                                                    <td class="col-4"><?php echo $row['address']; ?></td>
                                                    <td class="col-3"><?php echo $row['phone']; ?></td>
                                                </tr>
                                                <?php 
                    } //while
                ?>
                                            </tbody>
                                            <?php
              }else{
                  echo "No Data";
          } //if

          ?>
                                        </table>
                                    </div> <!-- end: table-responsive  -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end: Appointment -->
                </div>
            </div>
            <!-- col-md-7 -->
        </div> <!-- end: row (1st)-->
        <!-- End: row (3rd)-->
    </div> <!-- End: .content -->
</div>
<!-- End: content-wrapper Section -->

<?php include 'inc/footer.php'; ?>