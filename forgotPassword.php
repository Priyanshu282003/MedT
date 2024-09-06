<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <style>

        body{
            background-image: url('https://img.freepik.com/free-vector/white-background-with-blue-tech-hexagon_1017-19366.jpg?w=900&t=st=1709404718~exp=1709405318~hmac=c2bc7121338492b34064448c232c4c465e17ba95d99800fde257d798890ee162');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 150px;
        } 
    </style>
    
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <div class="wrapper">
            <div class="title">
            Forgot Password
            </div>
            <form action="forgotPassword_process.php" method="POST" class="form" name="form1" id="passswordResetForm" onsubmit="">
            <div class="inputfield" style="margin-bottom: 1px;">
                <label for="report_type">Email (*)</label>
                <input type="text" name="email" id="email" class="input" placeholder="Enter Email">
            </div><br> 
            <div class="inputfield">
                <input type="submit" value="Reset Password" class="btn">
            </div>
            </form>
        </div>
    </body>
</html>