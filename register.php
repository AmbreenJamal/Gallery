<?php session_start();
  // $_SESSION['message']='';
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Login and Registration Form </h1>
            </header>
            <section>
                <div id="container_demo">
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <div id="auth_wrapper">
                        <div id="wrapper">
                        <div id="register" class="animate form">
                            <form  action="registervalidate.php" autocomplete="on" method="post" onsubmit="return checkForm(this);">
                                <h1> Signup </h1>
                                <p style="color:red; text-align:center;  font-weight:bold;">
                                <?php
                                $message="";
                                if(!empty($_GET['message'])) {
                                 echo  $message = $_GET['message']; }?>
                                    </p>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup"  name="username" required="required" type="text" title="Username must not be blank and contain only letters, numbers and underscores, minimum length 4."   pattern="\w+.{4,}" placeholder="mysuperusername690" />
                                </p>
                                <p>
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/>
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="password"  required="required" type="password" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"  placeholder="eg. X8df!90EO"  onchange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.passwordsignup_confirm.pattern = this.value;
"/>
                                </p>
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" title="Please enter the same Password as above." required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"  type="password" placeholder="eg. X8df!90EO" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"/>
                                </p>
                                <p class="signin button">
									<input type="submit" value="Sign up"/>
								</p>
                                <p class="change_link">
									Already a member ?
									<a href="index.php" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
