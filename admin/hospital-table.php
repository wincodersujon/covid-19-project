<?php
ob_start();
$page = 'hospital';
include "inc/header.php";
?>

<div class="content-wrapper hospital_area">
    <div class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 basic_form">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="d-inline font-primary">Hospitals Details </h3>
                        </div>
                        <div class="table-responsive">

                            <table class="table table_custom">
                                <thead>
                                    <tr>
                                        <th>Hospital Name</th>
                                        <th>Address</th>
                                        <th>Normal Bed</th>
                                        <th>ICU Bed</th>
                                        <th>Oxygen</th>
                                        <th>Plasma Donner</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                $data = file_get_contents('https://services1.arcgis.com/Hp6G80Pky0om7QvQ/arcgis/rest/services/Hospitals_1/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json');
                                $coronalive = json_decode($data, true);
                                $statescount = count($coronalive['features']);
                                $i=0;
                                $max=25;
                                while(($i < $statescount) && ($i < $max)){ 
                                ?>
                                    <tr>
                                        <td class="col-3"><span>
                                                <?php echo  $coronalive['features'][$i]['attributes']['NAME'] ?></span>
                                        </td>
                                        <td class="col-3"><span>
                                                <?php echo  $coronalive['features'][$i]['attributes']['ADDRESS'] ?></span>
                                        </td>
                                        <td class="col-1"><span>
                                                <?php echo  $coronalive['features'][$i]['attributes']['BEDS'] ?></span>
                                        </td>
                                        <td class="col-1">
                                            <span><?php echo  $coronalive['features'][$i]['attributes']['ZIP'] ?>
                                            </span>
                                        </td>
                                        <td class="col-1"><span>
                                                <?php echo  $coronalive['features'][$i]['attributes']['POPULATION'] ?></span>
                                        </td>
                                        <td class="col-1">
                                            <span><?php echo  $coronalive['features'][$i]['attributes']['ZIP'] ?>
                                            </span>
                                        </td>
                                    </tr>

                                    <?php 
                    $i++;  
                }


                ?>
                                </tbody>
                            </table>




                        </div> <!-- .table-responsive -->
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-lg-6 m-t-30 basic_form -->
        </div> <!-- .row (2nd)-->
    </div> <!-- .content -->
</div>
<!-- End: content-wrapper Section -->
<?php include 'inc/footer.php';
ob_end_flush();
?>