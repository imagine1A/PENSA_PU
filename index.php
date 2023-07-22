<?php

require_once("config.php");
?>


<?php
// Define variables and initialize with empty values
$email = $name = $message = "";
$email_err = $name_err = $message_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);

    }

    // Validate password
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a Email Address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["message"]))) {
        $message_err = "Please confirm password.";
    } else {
        $message = trim($_POST["message"]);

    }


    // Check input errors before inserting in database
    if (empty($name_err) && empty($email_err) && empty($message_err)) {


        // Prepare an insert statement
        $sql = "INSERT INTO contact(name, email, message) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);



            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo '<script>alert("Message Sent Sucessfully")</script>';
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



    // Close connection
}
?>


<!DOCTYPE html>
<html lang="en" style="width: 100%;">

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

<body>
    <section style="width: 100%;display: flex;align-items: center;justify-content: center;flex-direction: column;">
        <section id="banner">
            <section class="info-top">
                <div style="display: flex;gap: 10px;color: #fff;"><a href="#">
                        <div style="color: #ffffff;display: flex;gap: 7px;align-items: center;"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                fill="none" style="font-size: 21px;">

                                <path
                                    d="M2.00333 5.88355L9.99995 9.88186L17.9967 5.8835C17.9363 4.83315 17.0655 4 16 4H4C2.93452 4 2.06363 4.83318 2.00333 5.88355Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M18 8.1179L9.99995 12.1179L2 8.11796V14C2 15.1046 2.89543 16 4 16H16C17.1046 16 18 15.1046 18 14V8.1179Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="info-toggle">pupensa@pentvars.edu.gh</p>
                        </div>
                    </a><a href="#">
                        <div style="color: #ffffff;display: flex;gap: 7px;align-items: center;"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                fill="none" style="font-size: 21px;">
                                <path
                                    d="M17.9241 2.61722C17.8757 2.50014 17.804 2.3904 17.7092 2.29502C17.7078 2.2936 17.7064 2.29219 17.705 2.29078C17.5242 2.11106 17.2751 2 17 2H13C12.4477 2 12 2.44772 12 3C12 3.55228 12.4477 4 13 4H14.5858L11.2929 7.29289C10.9024 7.68342 10.9024 8.31658 11.2929 8.70711C11.6834 9.09763 12.3166 9.09763 12.7071 8.70711L16 5.41421V7C16 7.55228 16.4477 8 17 8C17.5523 8 18 7.55228 18 7V3C18 2.86441 17.973 2.73512 17.9241 2.61722Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M2 3C2 2.44772 2.44772 2 3 2H5.15287C5.64171 2 6.0589 2.35341 6.13927 2.8356L6.87858 7.27147C6.95075 7.70451 6.73206 8.13397 6.3394 8.3303L4.79126 9.10437C5.90756 11.8783 8.12168 14.0924 10.8956 15.2087L11.6697 13.6606C11.866 13.2679 12.2955 13.0492 12.7285 13.1214L17.1644 13.8607C17.6466 13.9411 18 14.3583 18 14.8471V17C18 17.5523 17.5523 18 17 18H15C7.8203 18 2 12.1797 2 5V3Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="info-toggle" style="color: #fff;margin: 0px;">+233 56773456</p>
                        </div>
                    </a></div>
                <div style="display: flex;justify-content: space-between;align-items: center;">
                    <div style="color: #ffffff;display: flex;align-items: center;gap: 14px;"><a href="#"
                            style="color: #fff;"><i class="fab fa-facebook" style="font-size: 21px;"></i></a><a href="#"
                            style="color: #fff;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram"
                                style="font-size: 21px;">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg></a><a href="#" style="color: #fff;"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor"
                                style="font-size: 21px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                </path>
                            </svg></a></div>
                </div>
            </section>
            <nav class="navbar navbar-light navbar-expand-md margin-nav">
                <div class="container-fluid"><a class="navbar-brand" href="index.html"
                        style="color: var(--bs-white);"><img src="assets/img/pensa-PU-1.png" width="60"
                            height="60"></a><button data-bs-toggle="collapse" class="navbar-toggler"
                        data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
                            class="navbar-toggler-icon hamburger-nav"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1" style="flex-wrap: wrap;">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link active" href="index.html"
                                    style="padding-right: 0px;padding-left: 0px;margin-right: 15px;color: var(--bs-white);">Home</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="about_us.html"
                                    style="padding-left: 0px;margin-left: 15px;padding-right: 0px;margin-right: 10px;color: var(--bs-white);">About
                                    Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="registration.php"
                                    style="padding-left: 0px;padding-right: 0px;margin-right: 15px;margin-left: 15px;color: var(--bs-white);">Registrations</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="departments.html"
                                    style="padding-left: 0px;padding-right: 0px;margin-right: 15px;margin-left: 15px;color: var(--bs-white);">Departments</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="gallery.html"
                                    style="padding-right: 0px;padding-left: 0px;margin-right: 15px;margin-left: 15px;color: var(--bs-white);">Gallery</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="news_and_events.html"
                                    style="padding-right: 0px;padding-left: 0px;margin-left: 15px;color: var(--bs-white);">News/Events</a>
                            </li>
                        </ul>
                        <div style="margin-left: 32px;"><a class="btn btn-primary" role="button"
                                style="color: #ffffff;background: transparent;border-width: 0px;font-weight: 600;font-size: 17px;"
                                href="donate.php">Donate&nbsp;💌</a></div>
                    </div>
                </div>
            </nav>
            <section class="py-4 py-xl-5" style="margin-top: 90px;">
                <div class="container h-100">
                    <div class="row h-100">
                        <div
                            class="col-md-10 col-xl-8 d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                            <div>
                                <div
                                    style="height: 41px;width: 304px;border: 1px solid #FFF;border-radius: 100px;color: #fff;display: flex;align-items: center;padding-left: 19px;margin-bottom: 16px;">
                                    <a href="#" style="margin: 0px;padding: 0px;font-size: 14px;"><br><span
                                            style="color: rgb(255, 255, 255);">We upload new videos every Sunday&nbsp;
                                            &nbsp;</span><br><br></a><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-camera-video"
                                        style="font-size: 18px;">
                                        <path fill-rule="evenodd"
                                            d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z">
                                        </path>
                                    </svg>
                                </div>
                                <h1 class="display-4 mb-3"
                                    style="color: rgb(255,255,255);font-family: 'PP Monument Extended';/*font-size: 60.5px;*/font-weight: 500;">
                                    All you need is Living worship</h1>
                                <p class="mb-4"
                                    style="color: rgba(255, 255, 255, 0.70);font-size: 14px;font-family: Rubik, sans-serif;">
                                    Etiam a rutrum, mauris lectus aptent convallis.<br>Fusce vulputate aliquam,viverra
                                    laoreet, aliquam netus.</p><button class="btn"
                                    style="background: rgb(255,255,255);color: #040054;font-family: Rubik, sans-serif;padding: 12px 20px;margin-right: 8px;font-size: 14px;border-width: 0px;border-color: #040054;">JOIN
                                    US NOW 🔥</button><button class="btn right" type="button"
                                    style="color: rgb(255,255,255);border-color: var(--bs-white);font-size: 14px;font-family: Rubik, sans-serif;margin-left: 8px;padding: 12px 20px;">LEARN
                                    MORE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <div class="news update">
            <div class="event-container">
                <div class="event-div">
                    <h6 class="event-title" style="color: #000175;font-weight: 700;font-size: 14px;margin: 0px;">
                        Upcoming Event</h6>
                    <p class="event-details" style="font-size: 20px;font-weight: 700;margin: 0px;">Wings meeting</p>
                    <p style="color: #818397;">Do well to attend today’s meeting and God will richly bless you in
                        abundance</p>
                    <div style="display: flex;gap: 16px;">
                        <div style="display: flex;align-items: center;"><i class="fas fa-map-marker-alt"
                                style="font-size: 20px;color: #002754;"></i>
                            <p style="margin: 0px;font-weight: 600;">&nbsp; Basketball Court</p>
                        </div>
                        <div style="display: flex;align-items: center;"><i class="far fa-clock"
                                style="font-size: 20px;color: #002754;"></i>
                            <p style="margin: 0px;font-weight: 600;">&nbsp; 12:00 PM</p>
                        </div>
                    </div>
                </div>
                <div
                    style="background: url(&quot;assets/img/IMG_6156.jpg&quot;) center / cover no-repeat;width: 279px;height: 170px;border-radius: 9px;">
                </div>
            </div>
        </div>
    </section>
    <section class="text-start about-us"
        style="width: 100%;padding: 15px;background: url(&quot;assets/img/church%20Illustration%203_035225.png&quot;) center / cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-top">
                        <div class="down-layer"></div>
                        <div class="top-layer"></div>
                    </div>
                </div>
                <div class="col-md-6" style="align-items: center;justify-content: center;display: flex;">
                    <div>
                        <h6 style="font-size: 15px;color: rgb(4,0,84);">WE ARE PENSA - PU</h6>
                        <h5 style="font-weight: bold;">Want to know more about us</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dapibus felis et libero
                            scelerisque, sed aliquet nulla tincidunt. Quisque lorem nisl, semper vitae mattis nec,
                            vestibulum nec risus. Sed ut volutpat tortor, ut sodales diam. Integer at tristique turpis.
                            Integer orci leo, fringilla</p><button class="btn btn-primary" type="button"
                            style="background: rgb(4,0,84);margin-top: 25px;padding: 14px 15px;border-width: 0px;border-radius: 4.5px;">Want
                            to know more?</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="padding: 15px;">
        <div style="width: 100%;display: flex;flex-direction: column;align-items: center;padding: 10px;">
            <h6 style="font-size: 15px;color: #040054;">OUR OFFICERS</h6>
            <h5 style="font-weight: bold;">Meet our wonderful LCC</h5><svg xmlns="http://www.w3.org/2000/svg"
                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right"
                id="arrow-right" style="margin-bottom: 40px;">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
                </path>
            </svg>
        </div>
        <div class="image-scroll">
            <div class="card overlay"><img class="card-img w-100 d-block" src="assets/img/casual%20sunday-10.jpg">
                <div class="card-img-overlay text-overlay">
                    <h4 style="color: var(--bs-white);">Title</h4>
                    <p style="color: var(--bs-white);">Paragraph</p>
                </div>
            </div>
            <div class="card overlay"><img class="card-img w-100 d-block" src="assets/img/IMG_1202.jpg">
                <div class="card-img-overlay text-overlay">
                    <h4 style="color: var(--bs-white);">Title</h4>
                    <p style="color: var(--bs-white);">Paragraph</p>
                </div>
            </div>
            <div class="card overlay"><img class="card-img w-100 d-block" src="assets/img/IMG_6490.jpg">
                <div class="card-img-overlay text-overlay">
                    <h4>Title</h4>
                    <p>Paragraph</p>
                </div>
            </div>
            <div class="card overlay"><img class="card-img w-100 d-block" src="assets/img/FB_IMG_1643652048268.jpg">
                <div class="card-img-overlay text-overlay">
                    <h4>Title</h4>
                    <p>Paragraph</p>
                </div>
            </div>
            <div class="card overlay"><img class="card-img w-100 d-block" src="assets/img/GloryFest%202021_48.jpg">
                <div class="card-img-overlay text-overlay">
                    <h4>Title</h4>
                    <p>Paragraph</p>
                </div>
            </div>
            <div class="card overlay"><img class="card-img w-100 d-block" src="assets/img/IMG_6536.jpg">
                <div class="card-img-overlay text-overlay">
                    <h4>Title</h4>
                    <p>Paragraph</p>
                </div>
            </div>
            <div class="card overlay"><img class="card-img w-100 d-block" src="assets/img/IMG_6506.jpg">
                <div class="card-img-overlay text-overlay">
                    <h4>Title</h4>
                    <p>Paragraph</p>
                </div>
            </div>
        </div>
    </section>
    <section style="width: 100%;height: 370px;display: flex;flex-direction: column;">
        <div class="donate-image"></div>
        <div class="donate-container" style="color: var(--bs-white);margin-top: -288px;">
            <h4 style="text-align: center;font-weight: bold;font-size: 27.4px;">"Pray! And listen to God! You can do
                this alone, but<br>find somebody to do it with you</h4><button class="btn" type="button"
                style="background: #ffffff;border-style: none;margin-top: 80px;color: #040054;padding: 15px 47px;font-weight: bold;border-radius: 4.5px;">DONATE</button>
        </div>
    </section>
    <section style="width: 100%;background: #e9edfc;">
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h5 style="color: #040054;">Our Blog</h5>
                    <p class="w-lg-50" style="font-size: 29px;font-weight: bold;">Catch up with our latest news</p>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                <div class="col">
                    <div class="card thumbnail"
                        style="box-shadow: 0px 0px 14px rgba(156,177,198,0.48);max-width: 375px;border: 1px solid rgba(0, 0, 0, 0.20);">
                        <img class="card-img-top w-100 d-block fit-cover"
                            style="height: 200px;border-top-left-radius: 7px;border-top-right-radius: 7px;"
                            src="assets/img/GloryFest%202021_144.jpg">
                        <div class="card-body p-4">
                            <h4 class="card-title" style="font-size: 18px;font-weight: bold;color: rgb(20,22,24);">Lorem
                                libero donec</h4>
                            <p class="card-text" style="color: rgb(119,121,123);font-size: 14px;">Nullam id dolor id
                                nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas
                                eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            <div style="float: right;margin-top: 30px;"><button class="btn btn-primary" type="button"
                                    style="color: #011E67;background: var(--bs-white);border-style: none;width: 142px;font-weight: 600;">READ
                                    MORE&nbsp;<i class="fas fa-arrow-right"></i></button></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card thumbnail"
                        style="box-shadow: 0px 0px 14px rgba(156,177,198,0.48);max-width: 375px;border: 1px solid rgba(0, 0, 0, 0.20);">
                        <img class="card-img-top w-100 d-block fit-cover"
                            style="height: 200px;border-top-left-radius: 7px;border-top-right-radius: 7px;"
                            src="assets/img/IMG_6156.jpg">
                        <div class="card-body p-4">
                            <h4 class="card-title" style="font-size: 18px;font-weight: bold;color: rgb(20,22,24);">Lorem
                                libero donec</h4>
                            <p class="card-text" style="color: rgb(119,121,123);font-size: 14px;">Nullam id dolor id
                                nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas
                                eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            <div style="float: right;margin-top: 30px;"><button class="btn btn-primary" type="button"
                                    style="color: #011E67;background: var(--bs-white);border-style: none;width: 142px;font-weight: 600;">READ
                                    MORE&nbsp;<i class="fas fa-arrow-right"></i></button></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card thumbnail"
                        style="box-shadow: 0px 0px 14px rgba(156,177,198,0.48);max-width: 375px;border: 1px solid rgba(0, 0, 0, 0.20);">
                        <img class="card-img-top w-100 d-block fit-cover"
                            style="height: 200px;border-top-left-radius: 7px;border-top-right-radius: 7px;"
                            src="assets/img/IMG_6501.jpg">
                        <div class="card-body p-4">
                            <h4 class="card-title" style="font-size: 18px;font-weight: bold;color: rgb(20,22,24);">Lorem
                                libero donec</h4>
                            <p class="card-text" style="color: rgb(119,121,123);font-size: 14px;">Nullam id dolor id
                                nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas
                                eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            <div style="float: right;margin-top: 30px;"><button class="btn btn-primary" type="button"
                                    style="color: #011E67;background: var(--bs-white);border-style: none;width: 142px;font-weight: 600;">READ
                                    MORE&nbsp;<i class="fas fa-arrow-right"></i></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="width: 100%;">
        <section class="position-relative py-4 py-xl-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-6 col-xl-5">
                        <div>
                            <form class="p-3 p-xl-4" method="post">
                                <h6 style="color: rgb(6,0,112);">CONTACT US</h6>
                                <p class="text-muted contact_us" style="font-size: 20px;font-weight: bold;">What can we
                                    do to help?</p>
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="mb-3" style="margin-right: 5px;"><label class="form-label"
                                            for="name">Name</label><input class="form-control" type="text" id="name"
                                            name="name"></div>
                                    <div class="mb-3"><label class="form-label" for="email">Email</label><input
                                            class="form-control" type="email" id="email" name="email"
                                            style="margin-left: 5px;"></div>
                                </div>
                                <div class="mb-3"><label class="form-label" for="message">Message</label><textarea
                                        class="form-control" id="message" name="message" rows="6"></textarea></div>
                                <div class="mb-3"><button class="btn btn-primary" type="submit"
                                        style="background: rgb(6,0,80);border-style: none;padding: 12px 30px;font-size: 14px;">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6 offset-xl-1"><iframe allowfullscreen="" frameborder="0" loading="lazy"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAhv3pfiqDuonpS5TIhpDbh3Dv4DKZi6qI&amp;q=Pentecost+University%2CAccra%2C+Ghana&amp;zoom=13"
                            width="100%" height="100%"></iframe></div>
                </div>
            </div>
        </section>
    </section>
    <footer style="width: 100%;background: #002654;color: rgb(255,255,255);">
        <div class="container py-4 py-lg-5" style="color: #ffffff;">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="fw-bold d-flex align-items-center mb-2"><span
                            class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center bs-icon me-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-bezier">
                                <path fill-rule="evenodd"
                                    d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z">
                                </path>
                                <path
                                    d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z">
                                </path>
                            </svg></span><span style="font-size: 18px;">PENSA-PU</span></div>
                    <p class="text-muted copyright" style="font-size: 14px;">Sem eleifend donec molestie, integer
                        quisque orci aliquam.</p>
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
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item"
                    style="font-size: 14px;">
                    <h3 class="fs-6" style="font-size: 14px;">Quick Links</h3>
                    <ul class="list-unstyled">
                        <li class="footer"><a class="link-secondary" href="#">About Us</a></li>
                        <li class="footer"><a class="link-secondary" href="#">Department</a></li>
                        <li class="footer"><a class="link-secondary" href="#">Registration</a></li>
                        <li class="footer"><a class="link-secondary" href="#">Gallery</a></li>
                        <li class="footer"><a class="link-secondary" href="#">News/Events</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item"
                    style="font-size: 14px;">
                    <h3 class="fs-6" style="font-size: 14px;">Quick Links</h3>
                    <ul class="list-unstyled">
                        <li class="footer"><a class="link-secondary" href="#">Help</a></li>
                        <li class="footer"><a class="link-secondary" href="#">FAQs</a></li>
                        <li class="footer"><a class="link-secondary" href="#">Privacy and Policy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item"
                    style="font-size: 14px;">
                    <h3 class="fs-6" style="font-size: 14px;">Contact Us</h3>
                    <ul class="list-unstyled">
                        <li class="footer"><a class="link-secondary" href="#"><i
                                    class="material-icons">location_on</i>&nbsp; P.O Box KN 1739, Kaneshie, Accra.</a>
                        </li>
                        <li class="footer"><a class="link-secondary" href="#"><i class="material-icons">email</i>&nbsp;
                                info@pensa-pu.com</a></li>
                        <li class="footer"><a class="link-secondary" href="#"><i
                                    class="material-icons">call</i>&nbsp;+233 7854322344</a></li>
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