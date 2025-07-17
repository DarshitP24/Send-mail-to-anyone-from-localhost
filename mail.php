<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Mail From Localhost</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        html,body{
            background: #007bff;
        }
        .container{
            position: absolute;
            top: 10%;
            left: 5%;
            transform: translate(-50, -50);
            font-family: 'Poppins', sans-serif;
        }
        .container .mail-form{
            background: #fff;
            padding: 25px 35px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
                        0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .container .mail-form .form-control{
            height: 43px;
            font-size: 15px;
        }
        .container .mail-form .textarea{
            height: 100px;
            resize: none;
        }
        .container .mail-form form .button{
            font-size: 17px!important;
        }
        .container .mail-form h2{
            font-size: 30px;
        }
        .container .mail-form p{
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Send Message</h2>
                <p class="text-center">Send mail to anyone from localhost.</p>
                <?php 
                if(isset($_POST['send'])){
                    $recipient = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $sender = "From: darshit240708@gmail.com";

                    if(empty($recipient) || empty($subject) || empty($message)){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php echo"All input fields are required!" ?>
                        </div>
                        <?php
                    }else{
                        if(mail($recipient,$subject,$message,$sender)){
                            ?>
                            <div class="alert alert-success text-center">
                                <?php echo"Your mail sent successfully to $recipient" ?>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php echo"Failed while sending your mail!" ?>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
                <form action="mail.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Recipients">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="10" class="form-control textarea" placeholder="Compose message.." "></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="form-control button btn-primary" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>