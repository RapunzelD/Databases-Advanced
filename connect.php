<?php
    //Connection **************************************************************************
    $dbServername = "sql11.freemysqlhosting.net"; 
    $dbUsername = "sql11526495"; 
    $dbPassword = "HnD1f5z1HB"; 
    $dbName = "sql11526495";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if ($conn == false) {
        die("No database connection");
    }
    elseif ($conn == true)
    {
        echo "";
    }

    // Login shizzle **************************************************************************
    $emailLogin = $_POST['emailLogin'];
    $passLogin = $_POST['passwordLogin'];

    $passChecking = $conn->query("SELECT paswoord FROM Passes WHERE Email = '$emailLogin'");       
    $emailChecking = $conn->query("SELECT email FROM Passes WHERE Email = '$emailLogin'");

   
    if(($emailChecking->num_rows > 0)) {      
        echo '<script>alert("Email does exist.")</script>';

        $sqlSalt = "SELECT Salt FROM Users WHERE Email = '$emailLogin'";
        $sqlPlaintPass = "SELECT paswoord FROM Passes WHERE Email = '$emailLogin'";

        $resultSalt = $conn->query($sqlSalt);
        $resultPass = $conn->query($sqlPlaintPass);

        if ($resultSalt->num_rows > 0) {
          
            while($rowsalt = $resultSalt->fetch_assoc()) {
                echo "Salt: " . $rowsalt["Salt"];               
              }
        } 
        if ($resultPass->num_rows > 0) {
          
            while($rowpass = $resultPass->fetch_assoc()) {
                echo " Pass: " . $rowpass["paswoord"];
                echo $rowsalt["Salt"] + $rowpass["paswoord"];               
              }
             
        }                          
    } else {
        echo '<script>alert("Email does not yet exist. Create an account first.")</script>';      
    }    
  
    
    
    


    $stmt = $conn->prepare("INSERT INTO Users (email, firstname, lastname, gender, username, dhash, Salt) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $Email, $firstName, $lastname, $gender, $Username, $dhash,  $Salt);

    $stmtPass = $conn->prepare("INSERT INTO Passes (email, paswoord ) VALUES (?, ?)");
    $stmtPass->bind_param("ss", $Email, $password);
    
    // set parameters and execute **************************************************************************
    $Email = $_POST['email'];
    $firstName = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $Username = $_POST['username'];

    

    ?>

<script> 
    // Dees bevat alles voor het maken van de hashes en salts/ww **************************************************************************
    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * 
        charactersLength));
        }
        return result;
    }

    var saltHash = makeid(10);

    function hash() {
        let inputval = document.getElementsByName("password")[0].value;
        let pasAndSalt = inputval + saltHash;
        const utf8 = new TextEncoder().encode(pasAndSalt);
        return crypto.subtle.digest('SHA-256', utf8).then((hashBuffer) => {
        const hashArray = Array.from(new Uint8Array(hashBuffer));
        const hashHex = hashArray
            .map((bytes) => bytes.toString(16).padStart(2, '0'))
            .join('');              
        let plainText = inputval;
        var Salt = saltHash;
        var passSalt = inputval + saltHash;
        const Hashed =  hashHex;
        
        document.cookie = "Hashed = " + Hashed;
        document.cookie = "Salt = " + Salt;
        document.cookie = "plainText = " + plainText;
        
    });
    }
    
</script>

<?php
    // Parameters voor hash, passwoord & salt. **************************************************************************
    $dhash = $_COOKIE['Hashed'];
    $Salt = $_COOKIE['Salt'];
    $password = $_COOKIE['plainText'];

    // Checken of email en paswoord nog niet bestaan in de database. Als dat het geval is, log in. **************************************************************************
    $emailCheck = $conn->query("SELECT email FROM Users WHERE email = '$Email'");
    $userNameCheck = $conn->query("SELECT username FROM Users WHERE username = '$Username'");
    if(($emailCheck->num_rows == 0) && ($userNameCheck->num_rows == 0)) {
        $stmt->execute();
        $stmtPass->execute();
        alert("*************** Account created succesfully! ***************"); 
        $stmt->close();
        $stmtPass->close();
        
    } else {
        echo '<script>alert("Email or Username already exists. Log In")</script>';
        $stmt->close();
        $stmtPass->close();
    }





    
    



    
    
    
    

    
    


    