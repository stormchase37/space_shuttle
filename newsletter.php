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
$query_rsState = "SELECT `state` FROM tblState";
$rsState = mysql_query($query_rsState, $shuttle) or die(mysql_error());
$row_rsState = mysql_fetch_assoc($rsState);
$totalRows_rsState = mysql_num_rows($rsState);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Space Shuttle Newsletter</title>
<link href="../css/style.css" rel="stylesheet">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
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
    <li> <a href="newsletter.html">Space Shuttle Newsletter</a></li>
    <li><a href="webmail.php">Contact Us</a></li>
  </ul>
</div>
</div>
<div id="content">
  <h1>&nbsp;</h1>
  <div id="leftColumn">
    <p><img src="../images/discovery.jpg" height="300" width="250" alt="Discovery Launch" class="illusFloatLeft"></p>
  </div>
  <!--closes leftColumn-->
  <div>
    <h1>Space Shuttle Newsletter</h1>
   
    <p align="left"><strong>Bold</strong> fields are required</p>
    <div id="shuttle">
    <form id="frm_shuttle" name="frm_shuttle" method="get">
      <fieldset>
        <legend>Personal Information</legend>
        
         <div id="name">
        <label for="txtCustomer">
        <div align="left"></div>
        </label>
        <span id="nameVal"><strong>Name:</strong>
        <input name="txtCustomer" type="text" class="input" id="txtCustomer">
        <span class="textfieldRequiredMsg"> required.</span></span>
        <div id="address">
          <label for="txtAddress"><strong>Address:</strong></label>
          <span id="addressVal">
          <input name="txtAddress" type="text" class="input" id="txtAddress">
          <span class="textfieldRequiredMsg"> required.</span></span></div>
      <div id="city">
        <label for="txtCity">City:</label>
        <input name="txtCity" type="text" class="input" id="txtCity">
      </div>
      <div id="state">
        <label for="tblState">State</label>
        <select name="tblState" class="input" id="tblState">
          <?php
do {  
?>
          <option value="<?php echo $row_rsState['state']?>"><?php echo $row_rsState['state']?></option>
          <?php
} while ($row_rsState = mysql_fetch_assoc($rsState));
  $rows = mysql_num_rows($rsState);
  if($rows > 0) {
      mysql_data_seek($rsState, 0);
	  $row_rsState = mysql_fetch_assoc($rsState);
  }
?>
        </select>
      </div>
      <div id="zip">
        <label for="txtZip">Zip Code:</label>
        <input name="txtZip" type="text" class="input" id="txtZip">
      </div>
      <div id="email">
        <label for="txtEmail"><strong>E-mail Address:</strong></label>
<span id="emailVal">
<input name="txtEmail" type="text" class="input" id="txtEmail">
<span class="textfieldRequiredMsg">required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>
      <div id="confirmemail">
        <label for="txtConfirmemail"><strong>Confirm E-mail Address:</strong></label>
        <span id="confirmEmail">
          <input type="text" name="text1" id="text1">
          <span class="confirmRequiredMsg">required.</span><span class="confirmInvalidMsg">The values don't match.</span></span> <span class="textfieldRequiredMsg">A value is required.</span></div>
      <div id="submit">
        I am 13 years old or older. <span id="ageConfirm">
        <label>
          <input type="radio" name="confirmAge" value="radio" id="confirmAge_0">
          Yes</label>
        
        <label>
          <input type="radio" name="confirmAge" value="radio" id="confirmAge_1">
          No</label>
        
        <span class="radioRequiredMsg">Please make a selection.</span></span>
        <br>
What is your favorite Space Shuttle(s)? 
<input type="checkbox" name="Atlantis" id="Atlantis">
<label for="Atlantis">Atlantis </label>
<label>
  <input type="checkbox" name="Challenger" value="checkbox" id="Challenger">
        Challenger</label>
  
<label>
  <br>
  <input type="checkbox" name="Columbia" value="checkbox" id="Columbia">Columbia</label>
<meta name="keywords" content="Space Shuttle Atlantis Space Shuttle Endeavour Space Shuttle Discovery Space Shuttle Challenger Space Shuttle Columbia Space Shuttle Newsletter">
<meta name="description" content="Join the Space Shuttle Newsletter">
<input type="checkbox" name="Discovery" id="Discovery">
<label for="Discovery">Discovery 
  <input type="checkbox" name="Endeavour" id="Endeavour">
  Endeavour</label>
        <p>
          <input type="submit" name="btnJoin" id="btnJoin" value="Join">
          
          <input type="reset" name="reset2" id="reset2" value="Reset">
      </p>
       
      </div>
      </fieldset>
    </form>
  </div> <!--closes rightColumn-->
  </div>
</div><!--closes Content-->
<div id="footer"><!-- #BeginLibraryItem "/Library/shuttle-footer.lbi" -->
<div id="footer"><a href="../index.html">Home</a>|<a href="discovery.html">Space Shuttle Discovery</a>|<a href="enterprise.html">Space Shuttle Enterprise</a>|<a href="atlantis.html">Space Shuttle Atlantis</a>|<a href="columbia.html">Space Shuttle Columbia</a>|<a href="newsletter.php">Space Shuttle Newsletter</a>|<a href="webmail.php">Contact Us</a><br>
  <p>Copyright&copy; 2015<br />
    By <a href="mailto:cwasmund@stumail.jccc.edu">Chris Wasmund </a>
</div><!-- #EndLibraryItem --><p></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("nameVal");
var sprytextfield3 = new Spry.Widget.ValidationTextField("confirmEmail");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("confirmEmail", "txtEmail");
var sprytextfield4 = new Spry.Widget.ValidationTextField("emailVal", "email");
var spryradio1 = new Spry.Widget.ValidationRadio("ageConfirm");
var sprytextfield2 = new Spry.Widget.ValidationTextField("addressVal");
</script>
</body>
  </html>
<?php
mysql_free_result($rsState);
?>
