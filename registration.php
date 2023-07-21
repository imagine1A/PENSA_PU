<?php


// Include config file
require "config.php";

session_start();

$required = "Required";
$lastid = "";

$query = "SELECT userid FROM personaldetails ORDER BY userid DESC";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);

$lastid = $row['userid'];

if (empty($lastid)) {
    $number = "PENSAPU-000001";
} else {
    $idd = str_replace("PENSAPU-", "", $lastid);
    $id = str_pad($idd + 1, 6, 0, STR_PAD_LEFT);
    $number = 'PENSAPU-' . $id;
}


// Define variables and initialize with empty values
$firstname = $lastname = $dateofbirth = $hometown = $residenceaddress = $email = $contact = $whatsappcontact = $gender = $maritalstatus = "";
$firstname_err = $lastname_err = $dateofbirth_err = $hometown_err = $residenceaddress_err = $email_err = $contact_err = $gender_err = $maritalstatus_err = "";
$Pid = $number;


// Define variables and initialize with empty values
$churchname = $location = $area = $district = $localassembly = $districtpastor = $baptism = $communion = $officer = $officertitle = "";
$churchname_err = $location_err = $area_err = $district_err = $localassembly_err = $districtpastor_err = $baptism_err = $communion_err = $officer_err = $officertitle_err = "";


// Define variables and initialize with empty values
$faculty = $program = $studentid = $level = $residence = $scholarship = "";
$faculty_err = $program_err = $studentid_err = $level_err = $residence_err = $scholarship_err = "";


// Define variables and initialize with empty values
$fathername = $fatheroccupation = $fathercontact = $isfatherofficer = $mothername = $motheroccupation = $mothercontact = $ismotherofficer = "";
$fathername_err = $fatheroccupation_err = $fathercontact_err = $isfatherofficer_err = $mothername_err = $motheroccupation_err = $mothercontact_err = $ismotherofficer_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate firstname
    if (empty(trim($_POST["firstname"]))) {
        $firstname_err = "Please enter your First Name.";
    } elseif (!preg_match("/^[a-zA-z]*$/", trim($_POST["firstname"]))) {
        $firstname_err = "Firstname can only contain letters.";
    } else {
        $firstname = trim($_POST["firstname"]);
    }


    // Validate lastname
    if (empty(trim($_POST["lastname"]))) {
        $lastname_err = "Please enter your Last Name.";
    } elseif (!preg_match("/^[a-zA-z]*$/", trim($_POST["lastname"]))) {
        $lastname_err = "Last name can only contain letters.";
    } else {
        $lastname = trim($_POST["lastname"]);
    }

    // Validate date of birth
    if (empty(trim($_POST["dateofbirth"]))) {
        $dateofbirth_err = "Please enter your Date of birth.";
    } else {
        $dateofbirth = trim($_POST["dateofbirth"]);
    }


    // Validate hometown
    if (empty(trim($_POST["hometown"]))) {
        $hometown_err = "Please enter your hometown";
    } else {
        $hometown = trim($_POST["hometown"]);
    }


    // Validate residenceaddress
    if (empty(trim($_POST["residenceaddress"]))) {
        $residenceaddress_err = "Please enter your residence";
    } else {
        $residenceaddress = trim($_POST["residenceaddress"]);
    }


    //Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your Email.";
    } elseif (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", trim($_POST["email"]))) {
        $email_err = "Enter a valid email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate contact
    if (empty(trim($_POST["contact"]))) {
        $contact_err = "Please enter your contact";
    } else {
        $contact = trim($_POST["contact"]);
    }

    $whatsappcontact = trim($_POST["whatsappcontact"]);


    // Validate gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please select your gender";
    } else {
        $gender = trim($_POST["gender"]);
    }

    // Validate marital-status
    if (empty(trim($_POST["marital-status"]))) {
        $maritalstatus_err = "Please select your marital status";
    } else {
        $maritalstatus = trim($_POST["marital-status"]);
    }



    //church details

    // Validate churchname
    if (empty(trim($_POST["churchname"]))) {
        $churchname_err = "Please enter your Church Name.";
    } else {
        $churchname = trim($_POST["churchname"]);
    }


    // Validate location
    if (empty(trim($_POST["location"]))) {
        $location_err = "Please enter your Church Location.";
    } else {
        $location = trim($_POST["location"]);
    }

    // Validate area
    if (empty(trim($_POST["area"]))) {
        $area_err = "Please enter your Area Name.";
    } else {
        $area = trim($_POST["area"]);
    }


    // Validate district
    if (empty(trim($_POST["district"]))) {
        $district_err = "Please enter your hometown";
    } else {
        $district = trim($_POST["district"]);
    }


    // Validate local assembly
    if (empty(trim($_POST["localassembly"]))) {
        $localassembly_err = "Please enter the name of your local assembly";
    } else {
        $localassembly = trim($_POST["localassembly"]);
    }


    //Validate district pastor
    if (empty(trim($_POST["districtpastor"]))) {
        $districtpastor_err = "Please enter the name of your district pastor.";
    } else {
        $districtpastor = trim($_POST["districtpastor"]);
    }


    // Validate baptism
    if (empty(trim($_POST["baptism"]))) {
        $baptism_err = "Please select baptism";
    } else {
        $baptism = trim($_POST["baptism"]);
    }

    // Validate communicant
    if (empty(trim($_POST["communion"]))) {
        $communion_err = "Please select communion";
    } else {
        $communion = trim($_POST["communion"]);
    }

    // Validate officer
    if (empty(trim($_POST["officer"]))) {
        $officer_err = "Please select if you are an officer of the church";
    } else {
        $officer = trim($_POST["officer"]);
    }


    // Validate officer specify

    $officertitle = trim($_POST["officertitle"]);




    //SCHOOL DETAILS



    // Validate Faculty
    if (empty(trim($_POST["faculty"]))) {
        $faculty_err = "Please Enter Facualty Name";
    } else {
        $faculty = trim($_POST["faculty"]);
    }

    // Validate officer
    if (empty(trim($_POST["program"]))) {
        $program_err = "Please Enter Program Name";
    } else {
        $program = trim($_POST["program"]);
    }

    // Validate officer
    if (empty(trim($_POST["studentid"]))) {
        $studentid_err = "Please Enter Student ID";
    } else {
        $studentid = trim($_POST["studentid"]);
    }

    // Validate officer
    if (empty(trim($_POST["level"]))) {
        $level_err = "Please Level of Student";
    } else {
        $level = trim($_POST["level"]);
    }

    // Validate officer
    if (empty(trim($_POST["residence"]))) {
        $residence_err = "Please name of residence";
    } else {
        $residence = trim($_POST["residence"]);
    }

    // Validate officer
    if (empty(trim($_POST["scholarship"]))) {
        $scholarship_err = "Please select if you are on Scholarship";
    } else {
        $scholarship = trim($_POST["scholarship"]);
    }


    //FAMILY DETAILS



    // Validate Faculty
    if (empty(trim($_POST["fathername"]))) {
        $fathername_err = "Please Enter Facualty Name";
    } else {
        $fathername = trim($_POST["fathername"]);
    }

    // Validate officer
    if (empty(trim($_POST["fatheroccupation"]))) {
        $fatheroccupation_err = "Please Enter Program Name";
    } else {
        $fatheroccupation = trim($_POST["fatheroccupation"]);
    }

    // Validate officer
    if (empty(trim($_POST["fathercontact"]))) {
        $fathercontact_err = "Please Enter Student ID";
    } else {
        $fathercontact = trim($_POST["fathercontact"]);
    }


    $isfatherofficer = trim($_POST["isfatherofficer"]);


    // Validate officer
    if (empty(trim($_POST["mothername"]))) {
        $mothername_err = "Please name of residence";
    } else {
        $mothername = trim($_POST["mothername"]);
    }

    // Validate officer
    if (empty(trim($_POST["motheroccupation"]))) {
        $motheroccupation_err = "Please select if you are on Scholarship";
    } else {
        $motheroccupation = trim($_POST["motheroccupation"]);
    }


    // Validate officer
    if (empty(trim($_POST["mothercontact"]))) {
        $mothercontact_err = "Please select if you are on Scholarship";
    } else {
        $mothercontact = trim($_POST["mothercontact"]);
    }



    $ismotherofficer = trim($_POST["ismotherofficer"]);

    $filename = $_FILES["inpFile"]["name"];
    $tempname = $_FILES["inpFile"]["tmp_name"];
    $folder = "./assets/img/passportpictures/" . $filename;


    if (
        empty($firstname_err) && empty($lastname_err) && empty($dateofbirth_err) && empty($hometown_err) && empty($residenceaddress_err) && empty($email_err) && empty($contact_err) && empty($gender_err) && empty($maritalstatus_err)
        && empty($churchname_err) && empty($location_err) && empty($area_err) && empty($district_err) && empty($localassembly_err) && empty($districtpastor_err) && empty($baptism_err) && empty($communion_err) && empty($officer_err)
        && empty($faculty_err) && empty($program_err) && empty($studentid_err) && empty($level_err) && empty($residence_err) && empty($scholarship_err)
        && empty($fathername_err) && empty($fatheroccupation_err) && empty($fathercontact_err) && empty($isfatherofficer_err) && empty($mothername_err) && empty($motheroccupation_err) && empty($mothercontact_err) && empty($ismotherofficer_err)
    ) {

        // Prepare an insert statement
        $sql = "INSERT INTO personaldetails (userid, firstname, lastname, dateofbirth,hometown, residentialaddress, emailaddress, contactno, whatsappno, gender, maritalstatus ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql1 = "INSERT INTO churchdetails (userid, churchname, location, area, district, localassembly, districtpastor, baptism, communicant, churchofficer, officertitle ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql2 = "INSERT INTO schooldetails (userid, faculty, program, studentid, residence, sponshership) VALUES (?, ?, ?, ?, ?, ?)";
        $sql3 = "INSERT INTO familydetails (userid, fathername, fatheroccupation, fathercontact, fatherofficer, mothername, motheroccupation, mothercontact, motherofficer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        // Get all the submitted data from the form
        $sql4 = "INSERT INTO passportpictures (userid, filename) VALUES (?,?)";




        if ($stmt = mysqli_prepare($conn, $sql)) {

            if ($stmt1 = mysqli_prepare($conn, $sql1)) {

                if ($stmt2 = mysqli_prepare($conn, $sql2)) {

                    if ($stmt3 = mysqli_prepare($conn, $sql3)) {

                        $stmt4 = mysqli_prepare($conn, $sql4);
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "sssssssssss", $Pid, $firstname, $lastname, $dateofbirth, $hometown, $residenceaddress, $email, $contact, $whatsappcontact, $gender, $maritalstatus);
                        mysqli_stmt_bind_param($stmt1, "sssssssssss", $Pid, $churchname, $location, $area, $district, $localassembly, $districtpastor, $baptism, $communion, $officer, $officertitle);
                        mysqli_stmt_bind_param($stmt2, "ssssss", $Pid, $faculty, $program, $studentid, $residence, $scholarship);
                        mysqli_stmt_bind_param($stmt3, "sssssssss", $Pid, $fathername, $fatheroccupation, $fathercontact, $isfatherofficer, $mothername, $motheroccupation, $mothercontact, $ismotherofficer);
                        mysqli_stmt_bind_param($stmt4, "ss", $Pid, $filename);

                        // Attempt to execute the prepared statement
                        if (mysqli_stmt_execute($stmt) && (mysqli_stmt_execute($stmt1)) && (mysqli_stmt_execute($stmt2)) && (mysqli_stmt_execute($stmt3)) && (mysqli_stmt_execute($stmt4))) {

                            move_uploaded_file($tempname, $folder);

                            echo '<script>alert("Registeration Successful!")</script>';
                        } else {
                            echo "Oops! Something went wrong at church details. Please try again later.";
                        }
                    }

                }

            }
        }

    }




    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PENSA PU</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=DM+Sans&amp;display=swap">
    <link rel="stylesheet" href="assets/css/PP%20Monument%20Extended.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rozha+One&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/Articles-Cards.css">
    <link rel="stylesheet" href="assets/css/Features-Image.css">
    <link rel="stylesheet" href="assets/css/Footer-Multi-Column.css">
    <link rel="stylesheet" href="assets/css/Multi-step-form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-size: 14px;">
    <div style="box-shadow: -4px 3px 9px 0px rgba(86,109,132,0.15 );">
        <section class="info-top" style="color: #040054;border-bottom: 2px solid rgba(4,0,84,0.31);">
            <div style="display: flex;gap: 10px;"><a href="#" style="color: #040054;">
                    <div style="display: flex;gap: 7px;align-items: center;"><svg xmlns="http://www.w3.org/2000/svg"
                            width="1em" height="1em" viewBox="0 0 20 20" fill="none" style="font-size: 21px;">

                            <path
                                d="M2.00333 5.88355L9.99995 9.88186L17.9967 5.8835C17.9363 4.83315 17.0655 4 16 4H4C2.93452 4 2.06363 4.83318 2.00333 5.88355Z"
                                fill="currentColor"></path>
                            <path
                                d="M18 8.1179L9.99995 12.1179L2 8.11796V14C2 15.1046 2.89543 16 4 16H16C17.1046 16 18 15.1046 18 14V8.1179Z"
                                fill="currentColor"></path>
                        </svg>
                        <p class="info-toggle">pupensa@pentvars.edu.gh</p>
                    </div>
                </a><a href="#" style="color: #040054;">
                    <div style="display: flex;gap: 7px;align-items: center;"><svg xmlns="http://www.w3.org/2000/svg"
                            width="1em" height="1em" viewBox="0 0 20 20" fill="none" style="font-size: 21px;">
                            <path
                                d="M17.9241 2.61722C17.8757 2.50014 17.804 2.3904 17.7092 2.29502C17.7078 2.2936 17.7064 2.29219 17.705 2.29078C17.5242 2.11106 17.2751 2 17 2H13C12.4477 2 12 2.44772 12 3C12 3.55228 12.4477 4 13 4H14.5858L11.2929 7.29289C10.9024 7.68342 10.9024 8.31658 11.2929 8.70711C11.6834 9.09763 12.3166 9.09763 12.7071 8.70711L16 5.41421V7C16 7.55228 16.4477 8 17 8C17.5523 8 18 7.55228 18 7V3C18 2.86441 17.973 2.73512 17.9241 2.61722Z"
                                fill="currentColor"></path>
                            <path
                                d="M2 3C2 2.44772 2.44772 2 3 2H5.15287C5.64171 2 6.0589 2.35341 6.13927 2.8356L6.87858 7.27147C6.95075 7.70451 6.73206 8.13397 6.3394 8.3303L4.79126 9.10437C5.90756 11.8783 8.12168 14.0924 10.8956 15.2087L11.6697 13.6606C11.866 13.2679 12.2955 13.0492 12.7285 13.1214L17.1644 13.8607C17.6466 13.9411 18 14.3583 18 14.8471V17C18 17.5523 17.5523 18 17 18H15C7.8203 18 2 12.1797 2 5V3Z"
                                fill="currentColor"></path>
                        </svg>
                        <p class="info-toggle" style="margin: 0px;">+233 56773456</p>
                    </div>
                </a></div>
            <div style="display: flex;justify-content: space-between;align-items: center;">
                <div style="color: #040054;display: flex;align-items: center;gap: 14px;"><a href="#"
                        style="color: #040054;"><i class="fab fa-facebook" style="font-size: 21px;"></i></a><a href="#"
                        style="color: #040054;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram" style="font-size: 21px;">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                            </path>
                        </svg></a><a href="#" style="color: #040054;"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="font-size: 21px;">
                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                            </path>
                        </svg></a></div>
            </div>
        </section>
        <nav class="navbar navbar-light navbar-expand-md bg-white margin-nav">
            <div class="container-fluid"><a class="navbar-brand" href="index.php"
                    style="color: #040054;padding: 0px;"><img src="assets/img/pensa-PU.png" width="60" height="60"
                        style="margin-bottom: -10px;margin-top: -8px;"></a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link otherpages-1" href="index.php"
                                style="padding-right: 0px;padding-left: 0px;margin-right: 15px;color: #040054;">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link otherpages-1" href="about_us.html"
                                style="padding-left: 0px;margin-left: 15px;padding-right: 0px;margin-right: 10px;color: #040054;">About
                                Us</a></li>
                        <li class="nav-item"><a class="nav-link active otherpages-1" href="registration.php"
                                style="padding-left: 0px;padding-right: 0px;margin-right: 15px;margin-left: 15px;color: #040054;">Registrations</a>
                        </li>
                        <li class="nav-item"><a class="nav-link otherpages-1" href="departments.html"
                                style="padding-left: 0px;padding-right: 0px;margin-right: 15px;margin-left: 15px;color: #040054;">Departments</a>
                        </li>
                        <li class="nav-item"><a class="nav-link otherpages-1" href="gallery.html"
                                style="padding-right: 0px;padding-left: 0px;margin-right: 15px;margin-left: 15px;color: #040054;">Gallery</a>
                        </li>
                        <li class="nav-item"><a class="nav-link otherpages-1" href="news_and_events.html"
                                style="padding-right: 0px;padding-left: 0px;margin-left: 15px;color: #040054;">News/Events</a>
                        </li>
                    </ul><a class="btn btn-primary" role="button" href="donate.php"
                        style="color: #040054;background: transparent;border-width: 0px;font-weight: 600;margin-left: 12px;">Donate💌</a>
                </div>
            </div>
        </nav>
    </div>
    <section id="section-form">
        <div id="reg-image"></div>
        <div id="reg-form">
            <p style="font-size: 14px;color: #040054;">REGISTRATION</p>
            <h5 style="color: rgb(0,0,0);">Register with us</h5>
            <section style="height: 614px;">
                <div id="multple-step-form-n" class="container" style="margin-bottom: 0px;align-items: center;">
                    <div id="progress-bar-button" class="multisteps-form">
                        <div class="row-inner">
                            <div class="col-12 col-lg-10 ml-auto mr-auto" style="margin: 0px;padding: 0px;">
                                <div class="multisteps-form__progress"><a
                                        class="btn multisteps-form__progress-btn js-active" role="button"
                                        title="User Info" style="margin-right: 15px;"></a><a
                                        class="btn multisteps-form__progress-btn" role="button" title="User Info"></a><a
                                        class="btn multisteps-form__progress-btn" role="button" title="User Info"></a><a
                                        class="btn multisteps-form__progress-btn" role="button" title="User Info"></a><a
                                        class="btn multisteps-form__progress-btn" role="button" title="User Info"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="multistep-start-row" class="row">
                        <div id="multistep-start-column" class="col-12 col-lg-12" style="margin: 0px;padding: 0px;">

                            <form id="main-form" class="multisteps-form__form" style="height: 100px;"
                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                                enctype="multipart/form-data">
                                <div id="single-form-next" class="multisteps-form__panel p-4 js-active"
                                    data-animation="scaleIn" style="background: transparent;">
                                    <div id="form-content" class="multisteps-form__content">
                                        <h5 style="color: rgb(0,0,0);font-size: 18px;">Personal Details</h5>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Frist Name" required="" name="firstname">
                                            </div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Last Name" required="" name="lastname"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="date" placeholder="Date of Birth" required=""
                                                    name="dateofbirth"></div>
                                            <div class="col"><input class="form-control" type="text"
                                                    placeholder="Home Town" name="hometown"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Residential Address"
                                                    name="residenceaddress"></div>
                                            <div class="col-lg-6"><input class="form-control" type="email"
                                                    placeholder="Email" required="" name="email"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="tel" placeholder="Contant" name="contact"></div>
                                            <div class="col-lg-6"><input class="form-control" type="tel"
                                                    placeholder="WhatsApp Contact" name="whatsappcontact"></div>
                                        </div>
                                        <div class="col-md-10 col-lg-4 col-xxl-4" id="gender"
                                            style="display: flex;padding-bottom: 30px;">
                                            <div
                                                style="padding: 2px;border: 1px solid rgb(98,98,98);border-right-width: 0px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
                                                <div class="form-check"
                                                    style="margin-right: 5px;margin-left: 20px;padding: 5px;"><input
                                                        class="form-check-input" type="radio" id="formCheck-1"
                                                        name="gender"><label class="form-check-label"
                                                        for="formCheck-1">Male</label></div>
                                            </div>
                                            <div
                                                style="border: 1px solid rgb(98,98,98);padding: 2px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                                                <div class="form-check"
                                                    style="margin-right: 5px;margin-left: 20px;padding: 5px;"
                                                    name="gender"><input class="form-check-input" type="radio"
                                                        id="formCheck-2" name="gender"><label class="form-check-label"
                                                        for="formCheck-2">Female</label></div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-lg-4 col-xxl-4" id="marital_status"
                                            style="padding-bottom: 10px;">
                                            <div class="status">
                                                <div class="form-check"
                                                    style="margin-right: 5px;margin-left: 20px;padding: 5px;"><input
                                                        class="form-check-input" type="radio" id="formCheck-3"
                                                        name="marital-status"><label class="form-check-label"
                                                        for="formCheck-3">Single</label></div>
                                            </div>
                                            <div class="status-1">
                                                <div class="form-check"
                                                    style="margin-right: 5px;margin-left: 20px;padding: 5px;"><input
                                                        class="form-check-input" type="radio" id="formCheck-4"
                                                        name="marital-status"><label class="form-check-label"
                                                        for="formCheck-4">Married</label></div>
                                            </div>
                                            <div class="status-2">
                                                <div class="form-check"
                                                    style="margin-right: 5px;margin-left: 20px;padding: 5px;"><input
                                                        class="form-check-input" type="radio" id="formCheck-6"
                                                        name="marital-status"><label class="form-check-label"
                                                        for="formCheck-6">Divorced</label></div>
                                            </div>
                                            <div class="status-3">
                                                <div class="form-check"
                                                    style="margin-right: 5px;margin-left: 20px;padding: 5px;"><input
                                                        class="form-check-input" type="radio" id="formCheck-5"
                                                        name="marital-status"><label class="form-check-label"
                                                        for="formCheck-5">Widow(er)</label></div>
                                            </div>
                                        </div>
                                        <div id="next-button" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary ml-auto js-btn-next" id="btn-form"
                                                type="button" title="Next" style="padding: 12px 40px;">NEXT&nbsp;<i
                                                    class="fas fa-arrow-right"></i></button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev" class="multisteps-form__panel p-4 rounded"
                                    data-animation="scaleIn">
                                    <div id="form-content-1" class="multisteps-form__content">
                                        <h5 style="color: rgb(0,0,0);font-size: 18px;">Church Details</h5>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Church Name" name="churchname"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Location" name="location"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Area" name="area"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="District" name="district"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Local Assembly" name="localassembly"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Local or District" name="districtpastor"></div>
                                        </div>
                                        <div class="row donate-text-1">
                                            <div class="col-xxl-5">
                                                <div id="Baptism" style="display: flex;padding-bottom: 25px;">
                                                    <div
                                                        style="padding: 2px;border: 1px solid rgb(98,98,98);border-right-width: 0px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="radio" id="formCheck-11" name="baptism"><label
                                                                class="form-check-label"
                                                                for="formCheck-11">Baptized</label></div>
                                                    </div>
                                                    <div
                                                        style="border: 1px solid rgb(98,98,98);padding: 2px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;width: 143.1px;">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="radio" id="formCheck-12" name="baptism"><label
                                                                class="form-check-label" for="formCheck-12">Not
                                                                Baptized</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-5">
                                                <div id="communion" style="display: flex;padding-bottom: 20px;">
                                                    <div
                                                        style="padding: 2px;border: 1px solid rgb(98,98,98);border-right-width: 0px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="radio" id="formCheck-9" name="communion"><label
                                                                class="form-check-label"
                                                                for="formCheck-9">Communicant</label></div>
                                                    </div>
                                                    <div
                                                        style="border: 1px solid rgb(98,98,98);padding: 2px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                                                        <div class="form-check"
                                                            style="margin-right: 5px;margin-left: 20px;padding: 5px;">
                                                            <input class="form-check-input" type="radio"
                                                                id="formCheck-10" name="communion"><label
                                                                class="form-check-label" for="formCheck-10">Non
                                                                Communicant</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row donate-text" style="padding-bottom: 0px;">
                                            <div class="col-xl-7 col-xxl-4">
                                                <div id="officer" style="display: flex;padding-bottom: 28px;">
                                                    <div
                                                        style="padding: 2px;border: 1px solid rgb(98,98,98);border-right-width: 0px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="radio" id="formCheck-7" name="officer"
                                                                value="Officer"><label class="form-check-label"
                                                                for="formCheck-7">Church
                                                                Officer</label></div>
                                                    </div>
                                                    <div
                                                        style="border: 1px solid rgb(98,98,98);padding: 2px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;width: 143.1px;">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="radio" id="formCheck-8" name="officer"
                                                                value="Not Officer"><label class="form-check-label"
                                                                for="formCheck-8">Not an
                                                                Officer</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-7">
                                                <div id="officer-pos" style="display: flex;padding-bottom: 10px;">

                                                    <select name="officertitle" class="btn btn-primary dropdown-toggle"
                                                        style="background: #ffffff;color: #040054;">
                                                        <option class="dropdown-item" value="" selected>Specify if
                                                            officer</option>
                                                        <option class="dropdown-item" value="Elder">Elder</option>
                                                        <option class="dropdown-item" value="Deacon">Deacon</option>
                                                        <option class="dropdown-item" value="Deaconess">Deaconess
                                                        </option>



                                                    </select>


                                                </div>
                                            </div>
                                        </div>
                                        <div id="next-prev-buttons" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" id="btn-form-prev" type="button"
                                                title="Prev" style="margin-right: 15px;padding: 12px 40px;"><i
                                                    class="fas fa-arrow-left"></i>&nbsp;PREVIOUS&nbsp;</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" id="btn-form"
                                                type="button" title="Next"
                                                style="padding: 12px 40px;">NEXT&nbsp;&nbsp;<i
                                                    class="fas fa-arrow-right"></i></button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-1" class="multisteps-form__panel p-4"
                                    data-animation="scaleIn">
                                    <div id="form-content-2" class="multisteps-form__content">
                                        <h5 style="color: rgb(0,0,0);font-size: 18px;">School Details</h5>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Faculty" name="faculty"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Program" name="program"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Student ID" name="studentid"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Level" name="level"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Hall/Hostel of Residence" name="residence">
                                            </div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-xxl-6">
                                                <div id="Sponsor" style="display: flex;padding-bottom: 19px;">
                                                    <div
                                                        style="padding: 2px;border: 1px solid rgb(98,98,98);border-right-width: 0px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="radio" id="formCheck-13" name="scholarship"><label
                                                                class="form-check-label" for="formCheck-13">Church of
                                                                Pentecost Sponsored&nbsp;</label></div>
                                                    </div>
                                                    <div
                                                        style="border: 1px solid rgb(98,98,98);padding: 2px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;width: 245.1px;">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="radio" id="formCheck-14" name="scholarship"><label
                                                                class="form-check-label" for="formCheck-14">Not
                                                                Sponsored by Church of Pentecost</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="next-prev-buttons-1" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" id="btn-form-prev-1"
                                                type="button" title="Prev"
                                                style="margin-right: 15px;padding: 12px 40px;background: rgba(4,0,84,0);border-color: #040054;color: #040054;"><i
                                                    class="fas fa-arrow-left"></i>&nbsp;PREVIOUS&nbsp;</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" id="btn-form"
                                                type="button" title="Next">NEXT&nbsp;&nbsp;<i
                                                    class="fas fa-arrow-right"></i></button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-2" class="multisteps-form__panel p-4"
                                    data-animation="scaleIn">
                                    <div id="form-content-3" class="multisteps-form__content">
                                        <h5 style="color: rgb(0,0,0);font-size: 18px;">Family Details</h5>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Father's Name" name="fathername"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Occupation" name="fatheroccupation"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Contact" name="fathercontact"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Specify if Church Officer" name="isfatherofficer">
                                            </div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Mother's Name" name="mothername"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Occupation" name="motheroccupation"></div>
                                        </div>
                                        <div class="row donate-text">
                                            <div class="col-md-12 col-lg-6 txt-box"><input class="form-control"
                                                    type="text" placeholder="Contact" name="mothercontact"></div>
                                            <div class="col-lg-6"><input class="form-control" type="text"
                                                    placeholder="Specify if Church officer" name="ismotherofficer">
                                            </div>
                                        </div>
                                        <div id="next-prev-buttons-2" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" id="btn-form-prev-2"
                                                type="button" title="Prev"
                                                style="margin-right: 15px;padding: 12px 40px;color: #040054;background: transparent;border-color: #040054;"><i
                                                    class="fas fa-arrow-left"></i>&nbsp;PREVIOUS&nbsp;</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" id="btn-form"
                                                type="button" title="Next">NEXT&nbsp;&nbsp;<i
                                                    class="fas fa-arrow-right"></i></button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-3" class="multisteps-form__panel p-4"
                                    data-animation="scaleIn">
                                    <div id="form-content-4" class="multisteps-form__content">
                                        <h5 style="color: rgb(0,0,0);font-size: 18px;margin-bottom: 25px;">Image of User
                                        </h5>
                                        <div class="row donate-text"
                                            style="display: flex;flex-direction: column;padding-bottom: 5px;">
                                            <div class="col-md-12 col-lg-6" id="imagePreview"><input
                                                    class="form-control" type="file" id="inpFile" name="inpFile"
                                                    onchange="showPreview(event);"></div>
                                            <div class="col-lg-6 preview" id="image-preview"
                                                style="padding: 10px 12px;">
                                                <p id="txt">Image Preview</p><img id="file-ip-1-preview"
                                                    class="image-preview_image" src="" alt="image preview"
                                                    height="auto">
                                            </div>
                                        </div>
                                        <div id="next-prev-buttons-3" class="button-row d-flex"
                                            style="margin-top: 15px;"><button class="btn btn btn-primary js-btn-prev"
                                                id="btn-form-prev-3" type="button" title="Prev"
                                                style="margin-right: 15px;padding: 12px 40px;color: #040054;background: transparent;border-color: #040054;"><i
                                                    class="fas fa-arrow-left"></i>&nbsp;PREVIOUS&nbsp;</button>
                                            <button class="btn btn btn-primary ml-auto" id="btn-form" type="submit"
                                                title="Register" name="Register">REGISTER&nbsp;</button>
                                        </div>
                                        <span style="color: red;">Please Check your input again if the register button
                                            is inactive</span>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <footer style="width: 100%;background: #002754;color: rgb(255,255,255);">
        <div class="container py-4 py-lg-5" style="color: #ffffff;">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="fw-bold d-flex align-items-center mb-2"><span
                            class="d-flex justify-content-center align-items-center"><img width="60" height="60"
                                src="assets/img/pensa-PU.png"></span><span style="font-size: 20px;">PENSA-PU</span>
                    </div>
                    <p class="text-muted copyright">Sem eleifend donec molestie, integer quisque orci aliquam.</p>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook" style="font-size: 24px;">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                </path>
                            </svg></li>
                        <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter" style="font-size: 24px;">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                </path>
                            </svg></li>
                        <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram"
                                style="font-size: 24px;">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6">Quick Links</h3>
                    <ul class="list-unstyled">
                        <li class="footer"><a class="link-light" href="#">About Us</a></li>
                        <li class="footer"><a class="link-light" href="#">Department</a></li>
                        <li class="footer"><a class="link-light" href="#">Registration</a></li>
                        <li class="footer"><a class="link-light" href="#">Gallery</a></li>
                        <li class="footer"><a class="link-light" href="#">News/Events</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6">Support</h3>
                    <ul class="list-unstyled">
                        <li class="footer"><a class="link-light" href="#">Help</a></li>
                        <li class="footer"><a class="link-light" href="#">FAQs</a></li>
                        <li class="footer"><a class="link-light" href="#">Privacy and Policy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6">Contact Us</h3>
                    <ul class="list-unstyled">
                        <li class="footer"><a class="link-light" href="#"><i
                                    class="material-icons">location_on</i>&nbsp; P.O Box KN 1739, Kaneshie, Accra.</a>
                        </li>
                        <li class="footer"><a class="link-light" href="#"><i class="material-icons">email</i>&nbsp;
                                info@pensa-pu.com</a></li>
                        <li class="footer"><a class="link-light" href="#"><i class="material-icons">call</i>&nbsp;+233
                                7854322344</a></li>
                    </ul>
                </div>
            </div>
            <hr style="opacity: 1;color: #ffffff;">
            <div class="d-flex justify-content-between align-items-center pt-3">
                <p class="text-muted mb-0 footer">Copyright © 2022 Brand</p>
                <p class="text-muted mb-0 footer">Designed and Developed by PENSA DEV TEAM</p>
            </div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/image_placeholder.js"></script>
    <script src="assets/js/Multi-step-form.js"></script>
</body>

</html>