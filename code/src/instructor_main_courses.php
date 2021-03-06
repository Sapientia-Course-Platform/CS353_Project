<?php

include("connect.php");
session_start();
if(isset($_POST['given_cid'])) {

    $_SESSION['CID'] = $_POST['given_cid'];
    $print = $_POST['given_cid'];
    echo "<script type='text/javascript'>alert('$print');</script>";
    header("Location:edit_course.php");
}

if(isset($_POST['view_statistics_button'])){
    $_SESSION['CID'] = $_POST['view_statistics_button'];
    header("location: instructor_course_statistics.php");
}

if(isset($_POST['complaint_button'])){
    $_SESSION['CID'] = $_POST['complaint_button'];

    header("location:instructor_fill_complaint.php");
}

if(isset($_POST['announcement_button'])){
    $_SESSION['CID'] = $_POST['announcement_button'];

    header("location:make_announcement.php");
}

?>

<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Learn Everyday, Join online courses today, Train Your Brain Today!, Learn to enjoyevery minute of your life., Online Learning, Innovations in Online Learning, Education and Learning, 01, 02, 03, 04, Contact Us">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Instructor Main - Courses</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Instructor-Main---Courses.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.13.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">



    <script type="application/ld+json">{
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "url": "index.html",
            "logo": "images/SapientiaLogo.PNG"
        }</script>
    <meta property="og:title" content="Instructor Main - Courses">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
</head>
<body class="u-body"><header class="u-clearfix u-header u-header" id="sec-85c8"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="521" data-image-height="202">
            <img src="images/SapientiaLogo.PNG" class="u-logo-image u-logo-image-1" data-image-width="196.129">
        </a>
    </div></header>
<section class="u-clearfix u-section-1" id="sec-5c2e">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="instructor_account.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-1">Account</a>
        <a href="instructor_forum.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-2">Forum</a>
        <a href="instructor_main_courses.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-3">My Courses</a>
        <a href="instructor_announcements.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-4">My Announcements</a>
        <a href="logout.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-5">Logout</a>
    </div>
</section>
<section class="u-align-center u-border-7 u-border-palette-4-base u-clearfix u-white u-section-2" id="sec-17aa">
    <div class="u-clearfix u-sheet u-sheet-1">
        <a  href="add_course.php" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-2-light-2 u-radius-6 u-btn-1">Add Course</a>
        <div class="u-table u-table-responsive u-table-1">
            <table class="u-table-entity u-table-entity-1">
                <?php


                $sql = "select CID, course_name, category, level from Course where IID = " .$_SESSION['IID'];
                $result = mysqli_query($con, $sql);

                if ($result)
                {
                    echo "<table class=\"u-table-body\">
            <tr class=\"u-palette-4-base u-table-header u-table-header-1\">
            <th class=\"u-border-1 u-border-palette-4-base u-table-cell\">Course Name</th>
            <th class=\"u-border-1 u-border-palette-4-base u-table-cell\"> Category</th>
            <th class=\"u-border-1 u-border-palette-4-base u-table-cell\">Level</th>
            <th class=\"u-border-1 u-border-palette-4-base u-table-cell\"></th>
            <th class=\"u-border-1 u-border-palette-4-base u-table-cell\"></th>
            <th class=\"u-border-1 u-border-palette-4-base u-table-cell\"></th>
            <th class=\"u-border-1 u-border-palette-4-base u-table-cell\"></th>
            
            
            </tr>";

                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td class=\"u-border-1 u-border-grey-30 u-first-column u-grey-5 u-table-cell u-table-cell-7\">" .$row['course_name']. "</td>";
                        echo "<td class=\"u-border-1 u-border-grey-30 u-first-column u-grey-5 u-table-cell u-table-cell-13\">" .$row['category']. "</td>";
                        echo "<td class=\"u-border-1 u-border-grey-30 u-first-column u-grey-5 u-table-cell u-table-cell-19\">" .$row['level']. "</td>";
                        echo "<td> <form action=\"#\" METHOD=\"POST\">
                    <button type=\"submit\" name = \"given_cid\" id = \"btn\" class=\"u-border-2 u-border-palette-2-light-2 u-btn u-button-style u-hover-palette-2-light-2 u-none u-text-black u-text-hover-white u-btn-4\" value =".$row['CID'] .">Edit</button>
                    </form     
                  </td>";
                        echo "<td> <form action=\"#\" METHOD=\"POST\">
                    <button type=\"submit\" name = \"view_statistics_button\" id = \"btn\" class=\"u-border-2 u-border-palette-2-light-2 u-btn u-button-style u-hover-palette-2-light-2 u-none u-text-black u-text-hover-white u-btn-4\" value =".$row['CID'] .">Statistics</button>
                    </form     
                  </td>";
                        echo "<td> <form action=\"#\" METHOD=\"POST\">
                    <button type=\"submit\" name = \"complaint_button\" id = \"btn\" class=\"u-border-2 u-border-palette-2-light-2 u-btn u-button-style u-hover-palette-2-light-2 u-none u-text-black u-text-hover-white u-btn-4\" value =".$row['CID'] .">Complaint</button>
                    </form     
                  </td>";
                        echo "<td> <form action=\"#\" METHOD=\"POST\">
                    <button type=\"submit\" name = \"announcement_button\" id = \"btn\" class=\"u-border-2 u-border-palette-2-light-2 u-btn u-button-style u-hover-palette-2-light-2 u-none u-text-black u-text-hover-white u-btn-4\" value =".$row['CID'] .">Announce</button>
                    </form     
                  </td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
                else
                {
                    echo "<script type='text/javascript'>alert('Database Error!');</script>";
                    header("Location:login.php");
                }
                ?>
            </table>
        </div>
    </div>
</section>


<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-266b"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Wisdom is life...</p>
    </div></footer>

</body>
</html>