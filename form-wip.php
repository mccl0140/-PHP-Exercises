<?php


// Check if submit button is clicked
//by checking if $_GET["submit-data"] has value
//      isset($variable_to_be_checked);
// if the value of the variable $variable_to_be_checked is null
//isset() returns false. In every other case isset() returns true.
    
// if submit button is clicked  
if (isset($_GET["submit-data"])) {
/*    //print entire get array
    echo "<pre>\$_GET";
    print_r($_GET);
    echo "</pre>";*/
    
    
    $errors = NULL;
    $valid = false;
    
    // validate the fullname
    if (trim($_GET["fullname"])) {
       $fn = filter_var($_GET["fullname"], FILTER_SANITIZE_STRING); 
    } else {
        $errors = "<p>Please enter your full name.</p>";
    }
    
    //here you want to do the same thing for your email
    if (trim($_GET["email"])) {
        //if you get here, it means there is some value
        //now you need to check if that value is a proper email (with @ symbol etc)
        //if filter_var returns true, then your email is okay
        if (filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)){
            $em = $_GET["email"];
        } else {
            //remove the email from $_GET array
            $_GET["email"] = NULL;
            
            //create error message
            $errors .= "<p>Invalid email!</p>";
        }
    } else {
        $errors .= "<p>Please enter your email.</p>";
    }
    
    //here you want to do the same thing for your message
    if (filter_var($_GET["message"])){
        $me = $_GET["message"];
    } else {
        $_GET["message"] = NULL;
        $errors .="<p>Please enter your message.</p>";
    }
    // Create the feedback
    
    if (isset($fn) && isset($em) && isset($me)) {
        $valid = true;
        $feedback = "<p>Hello {$fn}, you're now subscribe with this email: {$em}, Thank you for your message!</p><p>{$me}</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Form WIP</title>
    </head>
    <body>
        <form action="form-wip.php" method="get">
            <fieldset>
                <legend>EXAMPLE FORM</legend>
                <div class="box">
                    <label for="fullname">Full name:</label>
                    <input type="text" name="fullname" id="fullname" value="<?php if (isset($valid) && !$valid) {echo $_GET["fullname"];}  ?>">
                </div>
                <div class="box">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" value="<?php if (isset($valid) && !$valid) {echo $_GET["email"];}  ?>">
                </div>
                <label for="message">Message:</label>
                <div class="box">
                    <textarea type="text" name="message" rows="2" cols="30" id="message" value="<?php if (isset($valid) && !$valid) {echo $_GET["message"];}  ?>"></textarea>
                </div>
                <div class="box">
                    <input type="submit" value="Submit" name="submit-data">
                </div>
            </fieldset>
        </form>
        
        <?php
        //do your printing here
        
        if (isset($feedback)) {
            echo $feedback;
        }
        if (isset($errors)) {
           echo $errors; 
        }
        
        ?>
        
    </body>
</html>
