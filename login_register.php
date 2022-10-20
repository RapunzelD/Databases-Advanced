<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Helvetica-Bold.ttf" type="text/css"/>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/png" href="ng_logo-removebg-preview.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>       
        <title>NGSemperFi</title>
    </head>
    <body>   
        
        <img class="logo-img" src="images\ng_logo-removebg-preview.png">
            <h1 class="brandname">
                NGSemperFi
            </h1>
        </a>

        <div class="form">
            <form class="reg_form" method="post">
                <h2 class="labels">Register</h2>
                <input class="reginput" type="text" pattern="^[A-Za-zÀ-ÿ ,.'-]+$" id="firstname" name="firstname" placeholder="First Name" required/>
                <input class="reginput" type="text" pattern="^[A-Za-zÀ-ÿ ,.'-]+$" id="lastname" name="lastname" placeholder="Last Name" required/>
                <input class="reguserinput" type="text" pattern="^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$" id="username" name="username" placeholder="User Name" required/>                
                <input class="regemailinput" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="reg_email" name="email" placeholder="Email" required/>

                <input class="regpwdinput" type="password" id="reg_password" name="password" placeholder="Password" required/>


                <h2 class="birthdaylabel">Birthday</h2>
                <input class="regdateinput" type="date" id="birthday" name="birthday" required/>
                <h2 class="genderlabel">Gender</h2>
                <input class="regradioinput" type="radio" id="male" name="gender" value="Male"/>
                <label for="male" class="genderlabels">Male</label> 
                <input class="regradioinput" type="radio" id="female" name="gender" value="Female"/>
                <label for="female" class="genderlabels">Female</label>
                <input class="regradioinput" type="radio" id="other" name="gender" value="Other"/>
                <label for="other" class="genderlabels">Other</label>
                <h2 class="profile_pic">Choose your profile picture</h2>
                <input class="profile_pic_file" type="file" accept="image/*" id="profile_pic" name="profile_pic">
                <input class="submitbuttons" onclick="hash()" type="submit" id="reg_submit" value="Create Account"/>
                <p class="noaccount_p">Do you already have an account? <a href="#">Login</a></p>
            </form>
            <form class="log_form" method="post">
                <h2 class="labels">Login</h2>
                <input class="logemailinput" type="email" id="log_email" name="emailLogin" placeholder="Email" required/>
                <input class="logpwdinput" type="password" id="log_password" name="passwordLogin" placeholder="Password" required/>
                <input class="submitbuttons" onclick="login()" type="submit" id="log_submit" value="Login"/>
                <p class="noaccount_p">Don't have an account yet? <a href="#">Register</a></p>
            </form>
        </div>      
        <script src="switcher.js"></script>
        <?php include 'connect.php';?>
    </body>
</html>