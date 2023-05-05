<?php
$conn = mysqli_connect("localhost", "root", "", "ladctracking");

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage1']['tmp_name']))
    if (is_uploaded_file($_FILES['userImage2']['tmp_name']))
    if (is_uploaded_file($_FILES['userImage3']['tmp_name']))
    if (is_uploaded_file($_FILES['userImage4']['tmp_name'])){
        $time                   =   strtoupper($_POST['time']);
//$date                 =   date('Y-m-d', strtotime($_POST['date']));
$trailer	 	        = 	strtoupper($_POST['trailer']);

$guardname			    =	strtoupper($_POST['guardname']);

$clearance              =   strtoupper($_POST['clearance']);
if ($clearance != 'YES CLEARANCE LIGHTS'){
    $clearance = 'NO';
}


$frontlight              =   strtoupper($_POST['frontlight']);
if ($frontlight != 'YES FRONT'){
    $frontlight = 'NO';
}

$rearlight              =   strtoupper($_POST['rearlight']);
if ($rearlight != 'YES REAR LIGHTS'){
    $rearlight = 'NO';
}
$stoplight              =   strtoupper($_POST['stoplight']);
if ($stoplight != 'YES STOP LIGHTS'){
    $stoplight = 'NO';
}
$sidemarkers              =   strtoupper($_POST['sidemarkers']);
if ($sidemarkers != 'YES SIDE MARKERS'){
    $sidemarkers = 'NO';
}
$taillight              =   strtoupper($_POST['taillight']);
if ($taillight != 'YES TAIL LIGHTS'){
    $taillight = 'NO';
}
$rightside              =   strtoupper($_POST['rightside']);
if ($rightside != 'YES RIGHT SIDE'){
    $rightside = 'NO';
}
$leftside              =   strtoupper($_POST['leftside']);
if ($leftside != 'YES LEFT SIDE'){
    $leftside = 'NO';
}
$rear              =   strtoupper($_POST['rear']);
if ($rear != 'YES REAR'){
    $rear = 'NO';
}
$turnsignals           =   strtoupper($_POST['turnsignals']);
if ($turnsignals != 'YES TURN SIGNALS'){
    $turnsignals = 'NO';
}
$rightflap           =   strtoupper($_POST['rightflap']);
if ($rightflap != 'YES RIGHT FLAP'){
    $rightflap = 'NO';
}
$leftflap          =   strtoupper($_POST['leftflap']);
if ($leftflap != 'YES LEFT FLAP'){
    $leftflap = 'NO';
}
$lofront          =   strtoupper($_POST['lofront']);
if ($lofront != 'YES LO FRONT'){
    $lofront = 'NO';
}
$lifront          =   strtoupper($_POST['lifront']);
if ($lifront != 'YES LI FRONT'){
    $lifront = 'NO';
}
$lorear          =   strtoupper($_POST['lorear']);
if ($lorear != 'YES LO REAR'){
    $lorear = 'NO';
}
$lirear         =   strtoupper($_POST['lirear']);
if ($lirear != 'YES LI REAR'){
    $lirear = 'NO';
}
$rofront          =   strtoupper($_POST['rofront']);
if ($rofront != 'YES RO FRONT'){
    $rofront = 'NO';
}
$rifront          =   strtoupper($_POST['rifront']);
if ($rifront != 'YES RI FRONT'){
    $rifront = 'NO';
}
$rorear          =   strtoupper($_POST['rorear']);
if ($rorear != 'YES LO REAR'){
    $rorear = 'NO';
}
$rirear         =   strtoupper($_POST['rirear']);
if ($rirear != 'YES RI REAR'){
    $rirear = 'NO';
}

        $imgData1 = file_get_contents($_FILES['userImage1']['tmp_name']);
        $imgData2 = file_get_contents($_FILES['userImage2']['tmp_name']);
        $imgData3 = file_get_contents($_FILES['userImage3']['tmp_name']);
        $imgData4 = file_get_contents($_FILES['userImage4']['tmp_name']);

        $imgType1 = $_FILES['userImage1']['type'];
        $imgType2 = $_FILES['userImage2']['type'];
        $imgType3 = $_FILES['userImage3']['type'];
         $imgType4 = $_FILES['userImage4']['type'];
        
        $sql = "INSERT INTO inspection(imageType1 ,image1,imageType2,image2, imageType3,image3, imageType4,image4,time, trailer, guardname, clearance, frontlight, rearlight, stoplight, sidemarkers, taillight, rightside, leftside, rear, turnsignals, rightflap, leftflap, lofront, lifront, lorear, lirear, rofront, rifront, rorear, rirear) VALUES(?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('sssssssssssssssssssssssssssssss', $imgType1, $imgData1,$imgType2,$imgData2,$imgType3,$imgData3,$imgType4,$imgData4,$time,$trailer,$guardname,$clearance,$frontlight,$rearlight,$stoplight,$sidemarkers,$taillight,$rightside,$leftside,$rear,$turnsignals,$rightflap,$leftflap,$lofront,$lifront,$lorear,$lirear,$rofront,$rifront,$rorear,$rirear);
        $current_id = $statement->execute();
        $current_id = $statement->close();
        
    }
}
?>
<HTML>
<HEAD>
<TITLE>Inspection Page</TITLE>
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style>
  .Arial {
            font-family: Arial, Helvetica, sans-serif;
            color: darkblue;
        }

        .Arial2 {
            font-family: Arial, Helvetica, sans-serif;
            color: darkblue;
        }

        a:link,
        a:visited {
            font-family: Arial, Helvetica, sans-serif;
            background-color: navy;
            color: white;
            padding: 20px 75px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        a:hover,
        a:active {
            background-color: gold;
        }
        
        .auto-style2 {
            text-align: center;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            font-size: 36px;
            color: navy;
        }
    
    * {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		.container {
			max-width: 960px;
			margin: 0 auto;
			display: flex;
			flex-wrap: wrap;
		}

		.col {
			flex: 1;
			margin: 10px;
		}

		.text {
			text-align: justify;
		}
        div {

  padding-top: 20px;
  padding-right: 20px;
  padding-bottom: 20px;
  padding-left: 20px;
}
         canvas {
      border: 2px solid black;
    }
        
        
.columns {
  display: flex;
  justify-content: center;
  align-items: center;
}

.column {
  flex: 1;
  padding: 0px;
}
        
        .canvas-container {
  text-align: center;
}

.canvas-wrapper {
  display: inline-block;
}

.canvas-box {
  display: inline-block;
  width: 100px;
  height: 100px;
}

.canvas-box-tall {
  display: inline-block;
  width: 200px;
  height: 75px;
    }
.image-gallery {
    text-align:center;
}
.image-gallery img {
    padding: 3px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    border: 1px solid #FFFFFF;
    border-radius: 4px;
    margin: 20px;
}
</style>
</HEAD>
<BODY>
    <form name="frmImage" enctype="multipart/form-data" action=""
        method="post">
        <div class="auto-style2">
            <strong>17-POINT TRUCK & TRAILER INSPECTION</strong>
            <br>
            <img src="Logo-Securitas-logo.png" width="260" height="160">
        </div>
    
    
	<div class="container">
		<div class="col"
>
        <h2> </h2>   
<br>
            <div class="text"  style="border: thin solid black">
				<td align="right" class="auto-style1">Time In   </td>
        <td class="auto-style3">
            <input type="time" value="<?php echo time('h-i-sa'); ?>" id="time" name="time" required>
        </td>
<br>
                <br>
      
          <td align="right" class="auto-style1">Trailer No. </td>
        <td class="auto-style3">
            <input style="text-transform:uppercase" name="trailer" maxlength="15" type="text" id="trailer">
        </td>
      <br>
      <br>
                  <td align="center" class="auto-style1">Inbound Guard Name</td>

            <td>
                 <?php

$conn = new mysqli('localhost', 'user1', 'testing', 'ladctracking') or die("Unable to connect");
$sql2 = "SELECT guardname FROM guards WHERE guardname !='' OR guardname IS NOT NULL GROUP BY guardname";
$q2 = $conn->query($sql2);
//$conn->query($sql);         
//$q=mysql_query($sql);
echo "<select name=\"guardname\" required>";
echo "<option size =30 ></option>";
while ($row = $q2->fetch_assoc())
//while($row = mysql_fetch_array($q)) 
{
    echo "<option value='" . $row['guardname'] . "'>" . $row['guardname'] . "</option>";
}
echo "</select>";
?>
            
                
                
                
                
                

			</div>
        <div class="phppot-container tile-container">
            <label>Upload Front Image :</label>
            <div class="row">
                <input name="userImage1" type="file" class="full-width" />
            </div>
           
        </div>
            
                 <div class="phppot-container tile-container">
            <label>Upload Back File:</label>
            <div class="row">
                <input name="userImage2" type="file" class="full-width" />
            </div>
           
        </div>
            
                  <div class="phppot-container tile-container">
            <label>Upload Left File:</label>
            <div class="row">
                <input name="userImage3" type="file" class="full-width" />
            </div>
           
        </div>
            
                      <div class="phppot-container tile-container">
            <label>Upload Right File:</label>
            <div class="row">
                <input name="userImage4" type="file" class="full-width" />
            </div>
           
        </div>
            
            
             <div class="row">
                <input type="submit" value="Submit" />
            </div>

            		</div>
        	<div class="col">
         <h2> </h2>   


			<div class="text">
            <div class="text"  style="border: thin solid black">
                
            <h3>Lights and Reflectors</h3>
                <br>
                
                <input type="checkbox" id="clearance" name="clearance" value="YES CLEARANCE LIGHTS">
                    <label for="clearance"> CLEARANCE LIGHTS</label><br>
                
                <input type="checkbox" id="frontlight " name="frontlight" value="YES FRONT">
                    <label for="frontlight"> FRONT </label><br>
                
                <input type="checkbox" id="rearlight" name="rearlight" value="YES REAR LIGHTS">
                    <label for="rearlights"> REAR</label><br>
                
                <input type="checkbox" id="stoplight" name="stoplight" value="YES STOP LIGHTS">
                    <label for="stoplight"> STOP LIGHTS</label><br>
                
                <input type="checkbox" id="sidemarkers" name="sidemarkers" value="YES SIDE MARKERS">
                    <label for="sidemarkers"> SIDE MARKERS</label><br>
                
                <input type="checkbox" id="taillight" name="taillight" value="YES TAIL LIGHTS">
                    <label for="taillight"> TAIL LIGHTS</label><br>
                
<br>
<br>
                
            <h3>REFLECTORS</h3>
                <br>
                
                <input type="checkbox" id="rightside" name="rightside" value="YES RIGHT SIDE">
                    <label for="rightside"> RIGHT SIDE</label><br>
                
                <input type="checkbox" id="leftside" name="leftside" value="YES LEFT SIDE">
                    <label for="leftside"> LEFT SIDE </label><br>
                
                <input type="checkbox" id="rear" name="rear" value="YES REAR">
                    <label for="rear"> REAR</label><br>
                
                <input type="checkbox" id="turnsignals" name="turnsignals" value="YES TURN SIGNALS">
                    <label for="turnsignals"> TURN SIGNALS</label><br>
                

                
<br>
<br>
                
            <h3>MUD FLAPS</h3>
                <br>
                
                <input type="checkbox" id="rightflap" name="rightflap" value="YES RIGHT FLAP">
                    <label for="rightflap"> RIGHT </label><br>
                
                <input type="checkbox" id="leftflap" name="leftflap" value="YES LEFT FLAP">
                    <label for="leftflap"> LEFT  </label><br>
                

<br>
<br>
                
            <h3>TIRES</h3>
                <br>
                
                <input type="checkbox" id="lofront" name="lofront" value="YES LO FRONT">
                    <label for="lofront"> LO FRONT </label><br>
                
                <input type="checkbox" id="lifront" name="lifront" value="YES LI FRONT">
                    <label for="lifront"> LI FRONT </label><br>
                
                 <input type="checkbox" id="lorear" name="lorear" value="YES LO REAR">
                    <label for="lorear"> LO REAR </label><br>
                
                 <input type="checkbox" id="lirear" name="lirear" value="YES LI REAR">
                    <label for="lirear"> LI REAR  </label><br>
                
                     <input type="checkbox" id="rofront" name="rofront" value="YES RO FRONT">
                    <label for="rofront"> RO FRONT </label><br>
                
                <input type="checkbox" id="rifront" name="rifront" value="YES RI FRONT">
                    <label for="rifront"> RI FRONT </label><br>
                
                 <input type="checkbox" id="rorear" name="rorear" value="YES RO REAR">
                    <label for="rorear"> RO REAR </label><br>
                
                 <input type="checkbox" id="rirear" name="rirear" value="YES RI REAR">
                    <label for="rirear"> RI REAR  </label><br>
                
             
                
			</div>
		</div>
	</div>
       <div class="fixed">
            <table style="width: 100%">
                     <tr>
                    <td align="center"><a href="Securitymenu.php">HOME</a></td>

                                                            <td align="center"><a href="inspectionmenu.php">INSPECTION MENU</a></td>

                    
                    <td align="center"><a href="InsertTrailerLADC.php">INBOUND</a></td>

                    <td align="center"><a href="securitywestgate.php">OUTBOUND WEST GATE</a></td>

                    <td align="center"><a href="securityscr.php">OUTBOUND EAST GATE</a></td>

                </tr>
            </table>

            <table border="0">
                <tbody>
                    <tr>
                        <td style="width: 1120px">&nbsp;</td>
                    </tr>
                </tbody>
            </table>



            <table>
                <tbody>
                    <tr>
                        <td><img src="penskesmall.gif" border="0"></td>
                    </tr>
                    <tr>
                        <td width="1900" height="20px" bgcolor="#FDD017"></td>
                    </tr>
                    <tr>
                        <td width="1900" height="20px" bgcolor="#151B8D"></td>
                    </tr>
                </tbody>

            </table>


            </table>
        </div>
        <table border='0'>
            <tr>
                <td style="width: 1120px">&nbsp;</td>
            </tr>
        </table>
    </form>
</BODY>
</HTML>
