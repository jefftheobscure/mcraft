<html>

<head>
  <title>Munchcraft - Create Munchable</title>
  <?php include("layouts.php"); 
  include("globals.php");
  ?>
  
  <script language="javascript" type="text/javascript">
  function ajaxFunction(elemID){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
		ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var target = document.getElementById(elemID);
			target.innerHTML .= ajax.responseText;
		}
	}
	ajaxRequest.open("POST", "recipefactory.php", true);
	ajaxRequest.send(null); 

}
  </script>
  
</head>

<body>
<?php 
include("header.php");
/*the following describes the munchable file structure
note for now we are omitting account/ownership. this may be added later with fb integration
each munchable will have a unique directory in which the following will be stored
components:
1) identity (id.txt)
  -chef
  -name
  -date uploaded
2) list of images (img/*) -validate file format for img tag
3) recipe (recipe.txt)
  -steps  "add new step"
  -substeps "add new substep"
  -etc... (arbitary) "add new (sub)*step"
  Depth denoted by special character at start of line (‘-’, ‘----’, etc.).
  Familial relationships may be found using relative position within file.
  preorder traversal
	Could switch this to user-driven expansion (JIT recipe steps -> speed considerations)
	This will also allow straightforward editing of recipes


3) user "tags" (e.g. "italian", "drunk")
4) List of ingrediants
	-this is searchable
	-users fill out checkbox form of all possible ingredients (maybe create masterlist of user input ingredients, formatted to be uniform)
at this point we will also create user-response framework. this consists of 
4) index.php (this is the webpage for this munchable)
  -output formatted data
  -allow user input
  -link in with facebook "like" button here
  -also prepare user feedback here. forms for comments, rating (json slider?)
create filestructure for user feedback
5) rating (rating.txt)
-total ratings (used for mean)
-current (aggregate mean) rating
6) list of comments (comments/comment(\d)+.txt)
  -output this list in index

validate, then create filestructure
*/
?> 

<h1> Create new Munchable </h1>
<h3> Forms with a (*) are required </h3>
<?php 

if(count($_POST) > 0){
	//if statements for validation error handling
	//echo required field, maybe flip booleans to add highlighting (do this with ajax instead...?)
}

?>

<div>
  <form action="validatenew.php" method="post" enctype="multipart/form-data">
  <table>
  	<tr><span><td>Name*</td><td><input type="text" name="mname"/></td></span></tr>
  	<tr><span><td>Created by</td><td><input type="text" name="createdby"/></td></span></tr>

  	<div>
  	<tr><td><h4> Create recipe: </h4></td></tr>
  	<tr>
  	<td>
  	Enter Step</td> <td><input type="text" name="r1" size=<?php echo "\" $rsteplimit \"" ?>></td>
  	<td>
  	<input type="button" onChange="ajaxFunction();" value="+">
  	</td>
  	</tr>
  	<?php
		//recipe levels correspond to header types
  	?>
	</div>
  	<table>
  </form>
</div> 

</body>

</html>
