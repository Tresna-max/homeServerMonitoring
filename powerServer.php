<?php
class powerServer{
 public $link='';
 function __construct($Irms, $power, $Wh, $Temp, $Press, $Altitude){
  $this->connect();
  $this->storeInDB($Irms, $power, $Wh, $Temp, $Press, $Altitude);
 }

 function connect(){
  $this->link = mysqli_connect('192.168.1.15','loggingPHP','Tres132!') or die('Cannot connect');
  mysqli_select_db($this->link,'test') or die('Cannot select the DB');
 }

 function storeInDB($Irms, $power, $Wh, $Temp, $Press, $Altitude){
  $query = "insert into powerServer set Irms='".$Irms."', power='".$power."', Wh='".$Wh."', Temp='".$Temp."', Press='".$Press."', Altitude='".$Altitude."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }

}
if($_GET['Irms'] != '' and  $_GET['power'] != '' and  $_GET['Wh'] != '' and $_GET['Temp'] != '' and  $_GET['Press'] != '' and  $_GET['Altitude'] != ''){
 $powerServer=new powerServer($_GET['Irms'],$_GET['power'],$_GET['Wh'],$_GET['Temp'],$_GET['Press'],$_GET['Altitude']);
}
?>

