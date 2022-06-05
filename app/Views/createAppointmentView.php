<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--         
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url("/bootstrap/css/bootstrap.css") ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url("/bootstrap/css/mannual.css") ?>" />
    <link rel="icon" type="image/png" href="<?= base_url("/favicon.ico") ?>" />
    <title>Take Appointment</title>
</head>

<body>
    <div class="header fixed-height">
        <a href="<?= base_url("/Home") ?>" class="logo ms-5 mb-3">
            <img height="60" width="140" src="<?= base_url("/images/j1.png") ?>" alt="" class="rounded">
            <!--<label>DoctorLagbe</label>-->
        </a>
        <div class="header-right">
            <div class="row-5 float-right">
                <a class="" href="<?= base_url("/Home") ?>">Home</a>
                <?php
                if (isset($_SESSION['email'])) {
                    /**type check
                     * assign button according to type
                     * for admin : doctorsignup, manageuser, manageappointment
                     * for user : appointmentHistory
                     * for doctor : see appointment list
                     * logout, profile and change password are common for all
                     */
                    if ($_SESSION['type'] == "user") { ?>
                        <a class="" href="<?= base_url("/AppointmentController/getHistory") ?>">Appointment History</a>
                    <?php } else if ($_SESSION['type'] == "doctor") { ?>
                        <a class="" href="<?= base_url("/AppointmentController/getAppointmentList") ?>">Appointment List</a>
                    <?php } else { ?>
                        <a class="me-2" href="<?= base_url("/AllUserInfoController") ?>">Manage User</a>
                        <div class="dropdown float-left">
                            <a>SignUp</a>
                            <div class="dropdown-content">
                                <a href="<?= base_url("/SignupController/userSignup") ?>">User</a>
                                <a href="<?= base_url("/SignupController/doctorSignup") ?>">Doctor</a>
                                <a href="<?= base_url("/SignupController/adminSignup") ?>">Admin</a>
                            </div>
                        </div>
                        <!-- <a class="" href="<?= base_url("/SignupController/doctorSignup") ?>">SignUp a Doctor</a>
                        <a class="me-2" href="<?= base_url("/SignupController") ?>">SignUp a User</a> -->
                    <?php } ?>
                    <a class="" href="http://localhost:8080/AllUserInfoController/showProfile">Profile</a>
                    <a class="" href="<?= base_url("/LogoutController") ?>">Logout</a>

                <?php
                } else { ?>
                    <a class="" href="<?= base_url("/LoginController") ?>">Login</a>
                    <a class="me-2" href="<?= base_url("/SignupController/userSignup") ?>">Signup</a>
                <?php
                }
                ?>
            </div>
            
        </div>
    </div>

    <div class="container mb-6 col-5 pt-2 pb-7 ps-5 bg-light">
    <div class="label h4 text-center p-4 bg-lgreen">Take Appointment </div> <b>
            <hr>
        </b>
        <form name="form" onsubmit="return check()" action="<?= base_url("/AppointmentController/saveAppointment/" . $docid) ?>" class="form-group p-3" method="POST">
            Patient Name <input type="text" class="form-control my-2" name="pname" placeholder="Enter Name" />
            <div class="row py-2">

                <div class="col-3">
                    Age <input type="number" class="form-control my-2" name="page" placeholder="Enter Age" />
                </div>


                <div class="col-3">
                    <div class="row ps-2 pb-2">
                        Blood Group
                    </div>

                    <div class="col-6">

                        <select name="pbg" id="bloodgroup" class="form-control">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>

                    </div>

                </div>

                <div class="col">
                    <div class=" row ps-3 pb-3">
                        Gender :
                    </div>
                    <div class="row-2">
                        <input type="radio" name="pgender" value="Male" class="ms-2" /> Male
                        <input type="radio" name="pgender" value="Female" class="ms-2" /> Female
                        <input type="radio" name="pgender" value="Others" class="ms-2" /> Others
                    </div>
                </div>
            </div>
            <div class="col-5">
                Appointment Date <input type="date" class="form-control my-2" name="date" placeholder="Enter Date" />
            </div>
            <div class="mt-3 col-3 float-right">
                <input type="submit" value="Submit" class="form-control sign-btn">
            </div>



        </form>

    </div>

    <div class="footer footer-color">
        <p> All rights reserved &copy; HalfCircle</p>
    </div>



    <script>
        function check() {

            var name = document.form.pname.value;
            var age = document.form.page.value;
            var bloodgroup = document.form.pbg.value;
            var gender = document.form.pgender.value;
            var date = document.form.date.value;

            if (name == "") {
                alert("Name field can not be empty");
                return false;
            }
            if (age == "") {
                alert("Age field can not be empty");
                return false;
            }
            if (bloodgroup == "") {
                alert("Blood Group field can not be empty");
                return false;
            }
            if (gender == "") {
                alert("Gender field can not be empty");
                return false;
            }
            if (date == "") {
                alert("Date field can not be empty");
                return false;
            }

        }
    </script>

</body>

</html>