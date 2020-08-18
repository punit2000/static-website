<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESD Sem 5</title>
    <link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="contactinfo">
                <div>
                    <h2>contact info</h2>
                    <ul class="info">
                        <li>
                            <span><img src = "images/location.jpg"></span>
                            <span> A-Block, Thakur Educational Campus,<br>
                                Shyamnarayan Thakur Marg, Thakur Village,<br>
                                Kandivali East, Mumbai, Maharashtra 400101</span>
                        </li>
                        <li>
                            <span><img src = "images/mail.png"></span>
                            <span>p.savlesha@gmail.com</span>     
                        </li>
                        <li>
                            <span><img src = "images/call.png"></span>
                            <span>9167838757</span>     
                        </li>
                    </ul>
                    <ul class="sci">
                        <li><a href="https://instagram.com/tcetmumbai.in?igshid=11mjphzh2piyk"> <img src="images/1.jpg" class="icons" > </a></li>
                        <li><a href="https://www.facebook.com/Thakur-College-Of-Engineering-and-Technology-TCET-140873615978164/"> <img src="images/2.jpg" class="icons"  ></a.</li>
                        <li><a href="https://twitter.com/punitsavlesha?s=09"> <img src="images/3.png" class="icons"  > </a></li>
                        
                    </ul>  
                </div>  
            </div>
            <div class="contactform">
                <h2>Send a messsage</h2>
                <div class="formbox">
                    <form action="" method="post">
                        <div class="inputbox w50">
                            <label for="firstname" >Firstname</label><input type="text" required name="firstname" id="firstname"><br>
                        </div>
                        <div class="inputbox w50">
                            <label for="lastname" >Lastname</label><input type="text" required name="lastname" id="lastname"><br>
                        </div>
                        <div class="inputbox w50">
                            <label for="mobileno" >MobileNo</label><input type="number" required name="mobileno" id="mobileno"><br>
                        </div>
                        <div class="inputbox w50">
                            <label for="email" >Email id</label><input type="text" required name="email" id="email"><br>
                        </div>
                        <div class="inputbox w100 ">
                            <label for="message" >Write your message here...</label><input type="text" required name="message" id="message">
                        </div>
                        <div class="inputbox w100"> 
                        <input type="submit"  value="Submit" name="submit">
                        </div>

                    </form>
        
                </div>
            </div>
               
        </div>
    </section>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $mobileno=$_POST['mobileno'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $fileopen=fopen("student_details.txt","a");
    fwrite($fileopen,"\nFirst Name :".$firstname);
    fwrite($fileopen,"\nLast Name :".$lastname);
    fwrite($fileopen,"\nMobile No :".$mobileno);
    fwrite($fileopen,"\nEmail Id :".$email);
    fwrite($fileopen,"\nMessage :".$message);
    fwrite($fileopen,"\n_");
    echo "Student Entry for ".$firstname." Was Successful <br> ";
    fclose($fileopen);
}


?>
<?php
    require('db.php');
    
    
    $firstname = stripslashes($_REQUEST['firstname']);
    $firstname = mysqli_real_escape_string($con,$firstname);
    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($con,$lastname);
    $mobileno = stripslashes($_REQUEST['mobileno']);
    $mobileno = mysqli_real_escape_string($con,$mobileno);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $message = stripslashes($_REQUEST['message']);
    $message = mysqli_real_escape_string($con,$message);
    $query = "INSERT into `contact` (  firstname, lastname,email ,mobileno,  message )
    VALUES ('$firstname','$lastname', '$email', '$mobileno','$message')";
    $result = mysqli_query($con,$query);

?>