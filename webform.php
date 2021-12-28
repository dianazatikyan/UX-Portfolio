<?php
    $message_sent = false;
    if(isset($_POST["email"]) && $_POST["email"] != ''){
        
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        // submit the form

        $userName = $_POST["name"];
        $userEmail = $_POST["email"];
        $messageSubject = $_POST["subject"];
        $message = $_POST["message"];
    
        $to ="diana@dzatikyan.com";
        $body = "";
    
        $body .= "From: ".$userName. "\r\n";
        $body .= "Email: ".$userEmail. "\r\n";
        $body .= "Message: ".$message. "\r\n";
    
        mail($to,$messageSubject,$body);

        $message_sent = true;
        }
        
        else{
            $invalid_class_name = "form-invalid";
        }

    
    }




?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/Images/DZLogo.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css" media="all">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="main.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
</head>

<body>
    <?php
    if($message_sent):
    ?>

    <h3>Thanks you for your message!</h3>

    <?php
    else:
        ?>
    <div class="wrapper">
        <div class="inner">
            <form action="webform.php" method="POST" class="form">
                <h3>Get in touch!</h3>
                <div class="form-group">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Jane Doe" tabindex="1" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Your Email</label>
                    <input <?= $invalid_class_name ?? "" ?> type="email" class="form-control" id="email" name="email" placeholder="jane@doe.com" tabindex="2" required>
                </div>
                <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Hello There!" tabindex="3" required>
                </div>
                <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    endif;
    ?> 
</body>

</html>