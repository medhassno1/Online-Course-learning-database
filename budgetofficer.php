<?php

    // calls connection and session info
    require("includes/common.php");
    
    // check if the user is logged in
    if(empty($_SESSION['user']))
    {
        // if not logged in send them to login page
        header("Location: login.php");
        
        // stop script
        die("Redirecting to login.php");
    }
?>

<!-- basic greeting and temporary tools -->


<!--  HTML starts here -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Tab Example</title>

<link rel="stylesheet" type="text/css" href="css/tabs.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script src="js/tabs.js" type="text/javascript"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

</head>

<body onload="init()">
<div class="container">
<h1>Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, this is the budget officer view!</h1>
<div class="float:left;">
	<h3>Place holder for Department Info or Department image</h3>
</div>
<div style="float:right; padding-right:5px;">
<a href="logout.php" class="btn btn-danger">Logout</a>
</div>

<div style="float:right; padding-right:5px;">
<a href="includes/edit_account.php" class="btn btn-primary">Edit Account</a>
</div>

    <ul id="tabNav">
      <li><a href="#tab1">Tab1 name goes here</a></li>
      <li><a href="#tab2">Tab2 name goes here</a></li>
      <li><a href="#tab3">Tab3 name goes here</a></li>
	  <li><a href="#tab4">Tab4 name goes here</a></li>
	  <li><a href="#tab5">Tab5 name goes here</a></li>
    </ul>

    <div class="tabContent" id="tab1">
      <h2>Tab1 header goes here</h2>
      <div>
		<p>Tab1 content goes in here</p> 
		<div style="padding-top:30px;"></div>
			<form id="form1" action="" class="form-horizontal" onsubmit="return validation(this.id);">
			<div class="form-group">
				<label id="field1" class="label-control col-xs-2" for="field1">Label1 :</label>
				<div class="col-xs-4"><input class="form-control" type="text" name="field1"/>
				</div></div>
				
				<div class="form-group">
				<label id="field2" class="label-control col-xs-2" for="field2">Label2 :</label>
				<div class="col-xs-4"><input class="form-control" type="text" name="field2"/>
				</div></div>
				
				<div class="form-group">
				<label id="field3" class="label-control col-xs-2" for="field3">Label3 :</label>
				<div class="col-xs-4"><select class="form-control" name="field3">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
				</div></div>
				
				<div class="form-group">
				<label id="button1" class="label-control col-xs-2" for="button1">Button1 :</label>
				<div class="col-xs-4"><input class="btn btn-primary" type="submit" value="Button1" />	
				</div></div>
				
			</form>	
      </div>
    </div>

    <div class="tabContent" id="tab2">
      <h2>Tab2 header goes here</h2>
      <div>
        <p>Tab2 content 
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
		goes in here</p>
		
      </div>
    </div>

    <div class="tabContent" id="tab3">
      <h2>Tab3 header goes here</h2>
      <div>
        <p>Tab3 content goes in here</p>
      </div>
    </div>
	
	<div class="tabContent" id="tab4">
      <h2>Tab4 header goes here</h2>
      <div>
        <p>Tab4 content goes in here</p>
      </div>
    </div>
	
	<div class="tabContent" id="tab5">
      <h2>Tab5 header goes here</h2>
      <div>
        <p>Tab5 content goes in here</p>
      </div>
    </div>
</div>

			<script>
	function validation(id) {
	var flag=1;
	id='#'.concat(id);
	 var datafields = $(id).serializeArray();
console.log(datafields);
            var i = 0;
            for(i = 0; i < datafields.length; i++)
            {

                if(datafields[i].value == null || datafields[i].value == '')
                {

                  flag=0;
					alert("Enter all fields");
				return false;
                }
				}
				if(flag==1)
				{
				alert("success");
				return true;
				}
				}
	</script>

  </body>
</html>