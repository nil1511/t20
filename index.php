<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="script/jquery.js" ></script>	
<script type="text/javascript" src="script/login.js" ></script>
<script type="text/javascript" src="script/popup.js" ></script>
<link rel="stylesheet" href="css/index.css" media="all"  />
 <script type='text/javascript' charset='utf-8'>
    $(document).ready(function(){
	      $('.popbox').popbox();
    });
  </script>
<title>Twin(T) kI bAzZi</title>
</head>
<body>
<div>
<div id="header">
logo here
</div>
<!--header end here -->
<div id="login" >
<form action="login" method="post" id="login" >
<input name="username" type="text" id="username" placeholder="username" x-webkit-speech />
<input name="password" type="password" id="password" placeholder="password" x-webkit-speech/>
<input type="submit" name="login" value="login" />
<div class='popbox' style="display:inline-block">

          <a class='open' href='#'><input type="button" id="register" value="Register" /></a>
          <div class='collapse'>
            <div class='box'>
              <div class='arrow'></div>
              <div class='arrow-border'></div>
			<iframe src="register.php" id="regFrame" height="450px"></iframe>
              <!--<a href="#" class="close">close</a>-->
            </div>
          </div>
        </div>
</form>
</div>
<!--login end here -->
<div id="ranking" >
ranking here
</div>
<div id="upcoming">
upcoming match...
also is make team option availabe or not
</div>
<!--upcoming end here -->
</div>
</body>
</html>