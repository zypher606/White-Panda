<?php
include('db.php');
$message="";
if(isset($_GET['action']))
{          
    if($_GET['action']=="reset")
    {
        $encrypt = mysqli_real_escape_string($connection,$_GET['encrypt']);
        $query = "SELECT id FROM users where md5(90*13+id)='".$encrypt."'";
        $result = mysqli_query($connection,$query);
        $Results = mysqli_fetch_array($result);
        if(count($Results)>=1)
        {

        }
        else
        {
            $message = 'Invalid key please try again. <a href="http://whitepanda.in/writerLogin.html/#forget">Forget Password?</a>';
        }
    }
}
elseif(isset($_POST['action']))
{
    
    $encrypt      = mysqli_real_escape_string($connection,$_POST['action']);
    $password     = mysqli_real_escape_string($connection,$_POST['password']);
    $query = "SELECT id FROM users where md5(90*13+id)='".$encrypt."'";
//    echo $query;
    $result = mysqli_query($connection,$query);
    $Results = mysqli_fetch_array($result);
    if(count($Results)>=1)
    {
        $query = "update users set password='".md5($password)."' where id='".$Results['id']."'";
        mysqli_query($connection,$query);
//        echo $query;
        $message = "Your password changed sucessfully <a href=\"http://whitepanda.in/wrterLogin.html/\">click here to login</a>.";
    }
    else
    {
        $message = 'Invalid key please try again. <a href="http://whitepanda.in/writerLogin.html/#forget">Forget Password?</a>';
    }
}
else
{
    header("location: ");
}
echo $message;
?>
  
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
function mypasswordmatch()
{
    var pass1 = $("#password").val();
    var pass2 = $("#password2").val();
    if (pass1 != pass2)
    {
        alert("Passwords do not match");
        return false;
    }
    else
    {
        $( "#reset" ).submit();
    }
	
}
  </script>
</head>

<body>

<div class="bus_login">
            <a href='index.html'><img  src="images/full_logo_light2.png"/></a>
            
            <h2>Welcome Back</h2>
            
            
            <form class='f1' action="php/reset.php" method="post" id="reset">
                <fieldset>
                <legend><h3>Reset Your Password.</h3></legend>
                  <p><input id="password" class="textbox" name="password" type="password" placeholder="Enter new password">
                  <p><input id="password2" class="textbox" name="password2" type="password" placeholder="Re-type new password">
                  <input name="action" type="hidden" value="'.$encrypt.'" /></p>
                  <p><input id='create' type="button" value="Reset Password" onclick="mypasswordmatch();" /></p>
                </fieldset>
            </form>

</div>
</body>



        
