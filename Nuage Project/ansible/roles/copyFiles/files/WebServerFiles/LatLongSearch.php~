<!DOCTYPE HTML>
<HTML>
    <HEAD><TITLE>Weather Condition</TITLE>
        <meta charset="utf-8">
<script src="http://openlayers.org/api/OpenLayers.js"></script>
        <style>
            #entireForm  
            {
                height:250px;
                width:410px;
                position: absolute;
                left: 50%;
                margin: -20px 0 0 -200px;
            }
            .formElements {
                border:2px solid #000000;
                padding:7px 7px 7px 7px; 
                width:400px;
            }
            h2 {
                text-align: center
            }
        </style>
    </HEAD>
    <BODY>
        <div id="entireForm">
        <h2 style="height: 10px;">Latitude and Longitude</h2>
        <div class='formElements'>
        <form name="phpForm" 
              method="post" 
              onsubmit="return validateForm()"
              action="<?php echo $_SERVER['PHP_SELF']; ?>"
        >
        <table>
        <tr>
        <td>State:*</td>
        <td>
        <select name="State">
        <option value="" <?php if (isset($_POST['State']) && $_POST['State']=='' ) {echo ' selected="selected"';} 
                               else {echo ' selected="selected"';}?>>Select your State</option> 
        <option value="AZ" 
                <?php if (isset($_POST['State']) && $_POST['State']=='AZ'){echo ' selected="selected"';}?>>Arizona</option>
        <option value="CA" 
                <?php if (isset($_POST['State']) && $_POST['State']=='CA'){echo ' selected="selected"';}?>>California</option>
        <option value="HI" 
                <?php if (isset($_POST['State']) && $_POST['State']=='HI'){echo ' selected="selected"';}?>>Hawaii</option>
        <option value="IL" 
                <?php if (isset($_POST['State']) && $_POST['State']=='IL'){echo ' selected="selected"';}?>>Illinois</option>
        <option value="NY" 
                <?php if (isset($_POST['State']) && $_POST['State']=='NY'){echo ' selected="selected"';}?>>New York</option>        
        </td>
        </select></td>
        </tr>
        <tr>
        <td>latitude:</td>
        <td><input type="text" name="Latitude" size="27" 
                   value="<?php if(isset($_POST['Latitude'])) { echo htmlentities ($_POST['Latitude']); }?>"></td>
        </tr>
        <tr>
        <td>Longitude:</td>
        <td><input type="text" name="Longitude" size="27" 
                   value="<?php if(isset($_POST['Longitude'])) { echo htmlentities ($_POST['Longitude']); }?>"></td>
        </tr>
        <tr>
        <td></td>
        <td><input type="submit" name="Search" value="Search">
        <input type="submit" name="Update" value="Update"">
        <input type="submit" name="Insert" value="Insert"">
        <input type="submit" name="Delete" value="Delete"">
	</td>
        </tr>
        <tr>
        <td>*-<i>Mandatory fields</i></td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td>Load Balancer picked: <b><? $webserver = system('hostname -I'); $arr = explode( " " , $webserver ); $arr = array_unique( $arr );
$string = implode(" " , $arr); ?></b> </td>
        </tr>    
        </table>
        </form>
        </div>
        </div>    
        <script>   
            function validateForm()
            {
                var fields = ["State"]
                var fieldname = "";
                for (var i = 0; i < fields.length; i++) {
                    fieldname = fields[i];
                    if (document.forms["phpForm"][fieldname].value === "") {
                        alert("Please enter value for " + fieldname);
                        return false;
                    }
                }
                return true;
            }
        </script>

        <?php if(isset($_POST['Search'])): ?>
            <?php
            $post_data["State"] = $_POST['State'];
            $url = "http://192.168.195.154/api.php?table=LatLong&state=" . $post_data["State"]."&method=GET";
	    $json = file_get_contents($url);
	    $obj = json_decode($json);
	    $state = $obj[0]->state;
	    $lat = $obj[0]->latitude;
	    $lon = $obj[0]->longitude;

                $tableStyle = "\"width:415px; 
                                position: absolute; 
                                left: 50%;
                                margin: 300px 0 0 -200px;
                                border:2px solid #000000;
                                padding:0px 12px 0px 12px; \"";
                $html = '<table id="resultMap" style='.$tableStyle.'>';
                $html .= '<tr>';
                $html .= '<td colspan=2 style="text-align: center; font-size: 22px; font-weight: bold;">'.$state.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td style="width: 10em;">Latitude:</td><td style="width: 5em;">'.$lat.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td style="width: 10em;">Longitude:</td><td style="width: 5em;">'.$lon.'</td>';
                $html .= '</tr>';
                $html .= '</table>';
                echo $html;
            ?>
        <?php endif; ?>

        <?php if(isset($_POST['Update'])): ?>
            <?php
            $post_data["State"] = $_POST['State'];
	    $post_data["Latitude"] = $_POST['Latitude'];
	    $post_data["Longitude"] = $_POST['Longitude'];
            $url = "http://192.168.195.154/api.php?table=LatLong&state=" . $post_data["State"] . "&lat=" . $post_data["Latitude"] . "&lon=" . $post_data["Longitude"] . "&method=PUT";
	    $json = file_get_contents($url);
	    $obj = json_decode($json);
	    $state = $obj[0]->state;
	    $lat = $obj[0]->latitude;
	    $lon = $obj[0]->longitude;

                $tableStyle = "\"width:415px; 
                                position: absolute; 
                                left: 50%;
                                margin: 300px 0 0 -200px;
                                border:2px solid #000000;
                                padding:0px 12px 0px 12px; \"";
                $html = '<table id="resultMap" style='.$tableStyle.'>';
                $html .= '<tr>';
                $html .= '<td colspan=2 style="text-align: center; font-size: 22px; font-weight: bold;">'.$state.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td style="width: 10em;">Latitude:</td><td style="width: 5em;">'.$lat.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td style="width: 10em;">Longitude:</td><td style="width: 5em;">'.$lon.'</td>';
                $html .= '</tr>';
                $html .= '</table>';
                echo $html;
            ?>
        <?php endif; ?>

        <?php if(isset($_POST['Delete'])): ?>
            <?php
            $post_data["State"] = $_POST['State'];
            $url = "http://192.168.195.154/api.php?table=LatLong&state=" . $post_data["State"] . "&method=DELETE";
	    $json = file_get_contents($url);
	    $obj = json_decode($json);
	    $state = $obj[0]->state;
	    $lat = $obj[0]->latitude;
	    $lon = $obj[0]->longitude;

                $tableStyle = "\"width:415px; 
                                position: absolute; 
                                left: 50%;
                                margin: 300px 0 0 -200px;
                                border:2px solid #000000;
                                padding:0px 12px 0px 12px; \"";
                $html = '<table id="resultMap" style='.$tableStyle.'>';
                $html .= '<tr>';
                $html .= '<td colspan=2 style="text-align: center; font-size: 22px; font-weight: bold;">'.$state.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td style="width: 10em;">Latitude:</td><td style="width: 5em;">'.$lat.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td style="width: 10em;">Longitude:</td><td style="width: 5em;">'.$lon.'</td>';
                $html .= '</tr>';
                $html .= '</table>';
                echo $html;
            ?>
        <?php endif; ?>    
        <?php if(isset($_POST['Insert'])): ?>
            <?php
            $post_data["State"] = $_POST['State'];
	    $post_data["Latitude"] = $_POST['Latitude'];
	    $post_data["Longitude"] = $_POST['Longitude'];
            $url = "http://192.168.195.154/api.php?table=LatLong&state=" . $post_data["State"] . "&lat=" . $post_data["Latitude"] . "&lon=" . $post_data["Longitude"] . "&method=POST";
	    $json = file_get_contents($url);
	    $obj = json_decode($json);
	    $state = $obj[0]->state;
	    $lat = $obj[0]->latitude;
	    $lon = $obj[0]->longitude;

                $tableStyle = "\"width:415px; 
                                position: absolute; 
                                left: 50%;
                                margin: 300px 0 0 -200px;
                                border:2px solid #000000;
                                padding:0px 12px 0px 12px; \"";
                $html = '<table id="resultMap" style='.$tableStyle.'>';
                $html .= '<tr>';
                $html .= '<td colspan=2 style="text-align: center; font-size: 22px; font-weight: bold;">'.$state.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td style="width: 10em;">Latitude:</td><td style="width: 5em;">'.$lat.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td style="width: 10em;">Longitude:</td><td style="width: 5em;">'.$lon.'</td>';
                $html .= '</tr>';
                $html .= '</table>';
                echo $html;
            ?>
        <?php endif; ?>        
        <noscript>
    </BODY>
</HTML>
