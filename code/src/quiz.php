<?php

include("connect.php");

session_start();
$section = $_SESSION['section'];
$content_num = $_SESSION['content_num'];
$CID = $_SESSION['CID'];
$SID = $_SESSION['SID'];

if(isset($_SESSION['current_question_number'])){
    $current_question_number = $_SESSION['current_question_number'];
}
else{
    $_SESSION['current_question_number'] = 1;
    $current_question_number = $_SESSION['current_question_number'];
}


$course_sql = "select * 
                from Course 
                where CID = '$CID'";
$course_result = mysqli_query($con, $course_sql);
if($course_result){
    if($course_result->num_rows == 1) {
        $row1 = mysqli_fetch_array($course_result);
        $course_name = $row1['course_name'];
    }
}


$quiz_sql = "select * 
                from Quiz natural join Quiz_Question
                where Quiz.CID = '$CID' and Quiz.section = '$section' and Quiz.content_num = '$content_num'
                and question_num = '$current_question_number'";

$quiz_result = mysqli_query($con, $quiz_sql);
if($quiz_result){
    if($quiz_result->num_rows == 1){
        $row = mysqli_fetch_array($quiz_result);
        $quiz_title = $row['title'];
        $question_text = $row['question_text'];
        $opt1 = $row['choice1'];
        $opt2 = $row['choice2'];
        $opt3 = $row['choice3'];
        $answer = $row['answer'];
    }
    else{
        echo "<script type='text/javascript'>alert('Database Error!');</script>";
    }
}
else{
    echo "<script type='text/javascript'>alert('Database Error!');</script>";
}


if(isset($_POST['submit_quiz_button'])){
    if (empty($_POST["radiobutton"])) {
        $genderErr = "Gender is required";
        echo "<script type='text/javascript'>alert('Answer required');</script>";
    } else {
        $ans = $_POST["radiobutton"];
        echo "<script type='text/javascript'>alert('$ans');</script>";
        echo "<script type='text/javascript'>alert('$answer');</script>";
    }
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
    <title>Quiz</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Quiz.css" media="screen">
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
    <meta property="og:title" content="Quiz">
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
    <section class="u-clearfix u-section-1" id="sec-cfa0">
      <div class="u-clearfix u-sheet u-sheet-1">
          <a href="student_account.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-1">Account</a>
          <a href="student_notifications.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-2">Nofitications</a>
          <a href="student_my_courses.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-3">My Courses</a>
          <a href="student_fill_complaint.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-4">Fill a Complaint</a>
          <a href="logout.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-5">Logout</a>
          <a href="certificates.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-6">Certificates</a>
          <a href="wishlist.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-7">Wishlist</a>
          <a href="student_main.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-8">Main Page</a>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="carousel_f056">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-1"><?php echo $course_name; ?></h2>
        <div class="u-border-14 u-border-palette-4-light-2 u-container-style u-group u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h5 class="u-text u-text-2"><?php echo $quiz_title; ?></h5>
            <div class="u-form u-form-1">
              <form action="#" method="POST">
                <div class="u-form-group u-form-group-1">
                  <label for="text-25b6" class="u-label">Question </label>
                    <textarea rows="2" cols="50" id="message-6797" name="note_text" class="u-border-4 u-border-palette-2-light-2 u-input u-input-rectangle" required="required" readonly><?php echo $question_text ?></textarea>
                </div>
                <div class="u-form-group u-form-radiobutton u-form-group-2">
                  <div class="u-form-radio-button-wrapper">
                    <input type="radio" name="radiobutton" value="choice1">
                    <label class="u-label" for="radiobutton"><?php echo $opt1 ?></label>
                    <br>
                    <input type="radio" name="radiobutton" value="choice2">
                    <label class="u-label" for="radiobutton"><?php echo $opt2 ?></label>
                    <br>
                    <input type="radio" name="radiobutton" value="choice3">
                    <label class="u-label" for="radiobutton"><?php echo $opt3 ?></label>
                    <br>
                  </div>
                </div>
                <div class="u-align-right u-form-group u-form-submit">
                  <a href="#" class="u-btn u-btn-submit u-button-style u-palette-2-light-2 u-btn-1">Submit Quiz</a>
                  <input type="submit" name="submit_quiz_button" value="submit" class="u-form-control-hidden">
                </div>
                <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse">
              </form>
            </div>
            <a href="https://nicepage.com/k/result-html-templates" class="u-btn u-button-style u-palette-2-light-2 u-btn-2">Next&nbsp;</a>
            <a href="https://nicepage.com/k/result-html-templates" class="u-btn u-button-style u-palette-2-light-2 u-btn-3">Previous&nbsp;</a>
          </div>
        </div>
        <p class="u-text u-text-3">Grade : .../ 10</p>
        <div class="u-form u-form-2">
          <form action="#" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 15px;" source="custom" name="form">
            <div class="u-align-right u-form-group u-form-submit">
              <a href="#" class="u-btn u-btn-submit u-button-style u-palette-2-light-2 u-btn-4">Back to Contents<br>
              </a>
              <input type="submit" value="submit" class="u-form-control-hidden">
            </div>
          </form>
        </div>
      </div>
    </section>

    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-266b"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Wisdom is life...</p>
      </div></footer>
  </body>
</html>