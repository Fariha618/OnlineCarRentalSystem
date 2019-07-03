<?php
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT c_email,c_password,c_name FROM customers WHERE c_email=:email and c_password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['cname']=$results->c_name;
$currentpage=$_SERVER['REQUEST_URI'];
echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="form-title">Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-content">
            <div class="col-md-12 col-sm-6">
              <form method="post">                
                            <div class="input-content clearfix">                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="email" name="email" placeholder="Name*" class="form-control Email">
                                    </div><!-- /.col-sm-12 -->
                                    <div class="col-sm-12">
                                        <input type="password" name="password" placeholder="Password*" class="form-control">
                                    </div><!-- /.col-sm-12 -->                                    
                                </div><!-- /.row -->
                                <div class="subimt-button clearfix">
                                    <input type="submit" name="login" value="Login" class="submit yellow-button">
                                </div><!-- /.subimt -->
                            </div><!-- /.input-content -->
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div align="center">
        <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>