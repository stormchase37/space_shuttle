<?php require_once('../Connections/shuttle.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_shuttle, $shuttle);
$query_rsShuttle = "SELECT shuttle FROM tblShuttle";
$rsShuttle = mysql_query($query_rsShuttle, $shuttle) or die(mysql_error());
$row_rsShuttle = mysql_fetch_assoc($rsShuttle);
$totalRows_rsShuttle = mysql_num_rows($rsShuttle);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<title>Contact Us</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
</head>

<body>
<div id="outerwrapper">
<div id="header">
  <h1 class="logo">History of the Space Shuttle Program
 <img src="../images/30years.jpg" width="628" height="186" alt="30 years of Space Shuttle"></h1>
</div>
<div id="nav">
  <ul>
    <li><a href="../index.html">Home</a></li>
    <li><a href="discovery.html">Space Shuttle Discovery</a></li>
    <li><a href="enterprise.html">Space Shuttle Enterprise</a></li>
    <li><a href="atlantis.html">Space Shuttle Atlantis</a></li>
    <li><a href="columbia.html">Space Shuttle Columbia</a></li>
    <li> <a href="newsletter.html">Space Shuttle Newsletter </a></li>
    <li><a href="webmail.php">Contact Us</a></li>
  </ul>
</div>
</div>
<div id="content">
  <h1>&nbsp;</h1>
<div id="leftColumn">
    <p><img src="../images/discovery.jpg" height="300" width="250" alt="Discovery Launch" class="illusFloatLeft"></p>
  </div>
  <form id="frmMail" name="frmMail" method="post" enctype="text/plain" action="mailto:cwasmund@stumail.jccc.edu">
   <fieldset>
     <legend>Space Shuttle Information</legend>
     <p>
       <label for="txtName">Name:</label>
       <span id="spryName">
       <input type="text" name="txtName" id="txtName" />
       <span class="textfieldRequiredMsg"> required.</span></span></p>
     <p>
       <label for="txtemail">Email:</label>
       <span id="spryEmail">
       <input type="text" name="txtemail" id="txtemail" />
       <span class="textfieldRequiredMsg">required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></p>
     <p>
       <label for="txtPhone">Phone:</label>
       <span id="spryPhone">
       <input type="text" name="txtPhone" id="txtPhone" />
     <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></p>
     <p>Select the Space Shuttle below that your question is about.</p>
     <p>
       <label for="txtShuttle">Select Space Shuttle:</label>
       <label for="txtShuttle"></label>
       <select name="txtShuttle" class="input" id="txtShuttle">
         <?php
do {  
?>
         <option value="<?php echo $row_rsShuttle['shuttle']?>"><?php echo $row_rsShuttle['shuttle']?></option>
         <?php
} while ($row_rsShuttle = mysql_fetch_assoc($rsShuttle));
  $rows = mysql_num_rows($rsShuttle);
  if($rows > 0) {
      mysql_data_seek($rsShuttle, 0);
	  $row_rsShuttle = mysql_fetch_assoc($rsShuttle);
  }
?>
       </select>
     </p>
     <p>
       <label for="txtComments">Type question here:</label>
       <textarea name="txtComments" cols="10" id="txtComments"></textarea>
     </p>
     <p>How would you like to be contacted?</p>
     <p>
       <label>
         <input type="radio" name="rgContact" value="Phone" id="rgContact_0" />
<span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span>         Phone</label>
       <br />
       <label>
         <input type="radio" name="rgContact" value="Email" id="rgContact_1" />
<span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span>         Email</label>
     </p>
     <p>
       <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
       <input type="reset" name="btnReset" id="btnReset" value="Reset" />
     </p>
     <p><br />
     </p>
   </fieldset>
  </form>
</div>

<div id="footer"><!-- #BeginLibraryItem "/Library/shuttle-footer.lbi" -->
<div id="footer"><a href="../index.html">Home</a>|<a href="discovery.html">Space Shuttle Discovery</a>|<a href="enterprise.html">Space Shuttle Enterprise</a>|<a href="atlantis.html">Space Shuttle Atlantis</a>|<a href="columbia.html">Space Shuttle Columbia</a>|<a href="newsletter.php">Space Shuttle Newsletter</a>|<a href="webmail.php">Contact Us</a><br>
  <p>Copyright&copy; 2015<br />
    By <a href="mailto:cwasmund@stumail.jccc.edu">Chris Wasmund </a>
</div><!-- #EndLibraryItem --><p>&nbsp;</p>
<p>&nbsp; </p>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryPhone", "phone_number", {isRequired:false, format:"phone_custom", pattern:"xxx-xxx-xxxx", useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryEmail", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryName");
  </script>
</body>
</html>
<?php
mysql_free_result($rsShuttle);
?>
