<?php
ob_start();
$page = 'appointment-form';
include "inc/header.php";
?>


<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2  col-md-12 m-t-20 basic_form">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="d-inline font-primary">Register For Doctor Appointment </h3>
                        </div>

                        <?php
                        if (isset($_POST['submit'])) {
                            //Database Connection
                            include "inc/connection.php";

                            $a_name = mysqli_real_escape_string($connection, $_POST['a_name']);
                            $m_phone = mysqli_real_escape_string($connection, $_POST['m_phone']);
                            $a_address = mysqli_real_escape_string($connection, $_POST['a_address']);
                            $department = mysqli_real_escape_string($connection, $_POST['department']);
                            $visit_doctor = mysqli_real_escape_string($connection, $_POST['visit_doctor']);

                            $visitdate = date('Y-m-d', strtotime($_POST['visitdate']));

                            $query = "SELECT fullname FROM appointment WHERE fullname='$a_name'";
                            $result = mysqli_query($connection, $query) or die("Query Faild");

                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                echo "This User Already Exists";
                            } else {
                                $query1 = "INSERT INTO appointment (fullname,phone,address,department,visit_doctor,vdate)
                          VALUE ('$a_name','$m_phone','$a_address','$department','$visit_doctor','$visitdate')";
                                $result1 = mysqli_query($connection, $query1) or die("Query Faild.");

                                if ($result1 == true) {
                                    header("location: index.php");
                                }
                            }
                        }
                        ?>

                        <!-- Form Start -->
                        <form action="" method="post" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="appointment_id" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input value="<?php echo $_SESSION['username'] ?>" type="text" name="a_name" class="form-control" id="name" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="a_address" class="form-control" id="address" placeholder="Enter Present Address">
                            </div>
                            <div class="form-group">
                                <label for="phone">Mobile Number</label>
                                <input type="text" name="m_phone" class="form-control" id="phone" placeholder="Enter Number">
                            </div>
                            <div class="form-group">
                                <label>Select Department</label>
                                <select id="depertment_doctor" class="form-control department" name="department">
                                <option value="">Select depeartment</option>    
                                <option value="Cardiologist">Cardiologist</option>
                                    <option value="ENT">ENT specialist</option>
                                    <option value="Physician">General Physician</option>
                                    <option value="Nephrologist">Nephrologist</option>
                                    <option value="Orthopedician">Orthopedician</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Visit Doctor</label>
                                <select id="doctor_list" class="form-control" name="visit_doctor">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Appointment Date</label>
                                <input type="date" name="visitdate" class="form-control" id="date">
                            </div>

                            <div class="form-footer pt-4 mt-4 border-top">
                                <input type="submit" name="submit" value="Register" />
                                <input type="reset" value="Cancel" onclick="history.back();" />
                            </div>
                        </form> <!-- End: Form  -->
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-lg-6 m-t-30 basic_form -->
        </div> <!-- .row (2nd)-->
    </div> <!-- .content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.department').on('change', function() {
            var e = document.getElementById("depertment_doctor");
            var value = e.value;
            var text = e.options[e.selectedIndex].text;
            let option = {
                Cardiologist: ['Dr Sujon', 'Dr Hasan'],
                ENT: ['Dr Devi', 'Dr Pullen'],
                Physician: ['Dr Fillmore', 'Dr Sujon'],
                Nephrologist: ['Dr Devi', 'Dr Fillmore'],
                Orthopedician: ['Dr Nervo', 'Dr Holler'],
            }
            $('#doctor_list')
            .find('option')
            .remove();

            option[value]?.map(item => {
                $('#doctor_list').append(`<option value="${item}">
                                       ${item}
                                  </option>`);
            })

        });
    </script>
</div>
<!-- End: content-wrapper Section -->

<?php include 'inc/footer.php';
ob_end_flush();
?>