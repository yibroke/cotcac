
<div class="container">
    <div class="col-md-4 col-md-offset-4 myform">
<h1>Login</h1>
<div id="myerror"></div>
  <?php echo form_open('user/login_validation'); ?>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email_login" id="email_login">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password_login" id="password_login">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>

 <div id="load"> <button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button></div>
 
    </div>
    </div>