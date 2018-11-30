<?php
echo "<p>All times shown in Server Time (US Central)</p>";
require_once('mysqli_connect.php');

$sql = "SELECT * FROM Hours WHERE UserID='" . $_POST['id'] . "' AND WEEK(Punch)=WEEK(NOW())";

$result = $conn->query($sql);
$punches = [];

for ($i=0; $i < 7; $i++){
	$punches[$i] = array();
}

if ($result->num_rows > 0) {
	$cols = 1;
	$table = "<table border=\"1\">
  <tr>
    <td></td>
    <td>In</td>";
	while($row = $result->fetch_assoc()) {
		$punch = $row['Punch'];
		$date = substr($punch,0,10);
		$udate = strtotime($date);
		$day = date('w', $udate);
		$time = substr($punch,11);
		$punches[$day][] = $time;
		if (sizeof($punches[$day]) > $cols){
			$cols++;
		}
	}
	for ($i = 0; $i < $cols - 1; $i++){
		if ($i % 2 == 0){
			$table .= "<td>Out</td>";
		}
		else {
			$table .= "<td>In</td>";
		}
	}
	$table .= "<td>Total</td>";
	$table .= "  </tr>
  <tr>
    <td>Sunday</td>";
	$totalSunday = 0;
    $col = 0;
    foreach($punches[0] as $stamp){
        $table .= "<td>".$stamp."</td>";
        $col++;
        if ($col % 2 != 0){
        	$in = strtotime($stamp);
		}
		else{
			$out = strtotime($stamp);
			$totalSunday += ($out - $in);
		}
    }
    if($col < $cols){
        for ($i = 0; $i < ($cols - $col); $i++){
        	$table .= "<td></td>";
        }
    }
    if ($totalSunday > 0){
        $table .= "<td>".date('H:i:s',$totalSunday)."</td>";
	}
	else {
		$table .= "<td>0</td>";
	}
    $table .= "  </tr>
  <tr>
    <td>Monday</td>";
    $col = 0;
    $totalMonday = 0;
    foreach($punches[1] as $stamp){
        $table .= "<td>".$stamp."</td>";
        $col++;
        if ($col % 2 != 0){
            $in = strtotime($stamp);
        }
        else{
            $out = strtotime($stamp);
            $totalMonday += ($out - $in);
        }
    }
    if($col < $cols){
        for ($i = 0; $i < ($cols - $col); $i++) {
            $table .= "<td></td>";
        }
    }
    if ($totalMonday > 0){
        $table .= "<td>".date('H:i:s',$totalMonday)."</td>";
    }
    else {
        $table .= "<td>0</td>";
    }
    $table .= "  </tr>
  <tr>
    <td>Tuesday</td>";
    $col = 0;
    $totalTuesday = 0;
    foreach($punches[2] as $stamp){
        $table .= "<td>".$stamp."</td>";
        $col++;
        if ($col % 2 != 0){
            $in = strtotime($stamp);
        }
        else{
            $out = strtotime($stamp);
            $totalTuesday += ($out - $in);
        }
    }
    if($col < $cols){
        for ($i = 0; $i < ($cols - $col); $i++){
            $table .= "<td></td>";
        }
    }
    if ($totalTuesday > 0){
        $table .= "<td>".date('H:i:s',$totalTuesday)."</td>";
    }
    else {
        $table .= "<td>0</td>";
    }
    $table .= "  </tr>
  <tr>
    <td>Wednesday</td>";
    $col = 0;
    $totalWednesday = 0;
    foreach($punches[3] as $stamp){
        $table .= "<td>".$stamp."</td>";
        $col++;
        if ($col % 2 != 0){
            $in = strtotime($stamp);
        }
        else{
            $out = strtotime($stamp);
            $totalWednesday += ($out - $in);
        }
    }
    if($col < $cols){
        for ($i = 0; $i < ($cols - $col); $i++){
            $table .= "<td></td>";
        }
    }
    if ($totalWednesday > 0){
        $table .= "<td>".date('H:i:s',$totalWednesday)."</td>";
    }
    else {
        $table .= "<td>0</td>";
    }
    $table .= "  </tr>
  <tr>
    <td>Thursday</td>";
    $col = 0;
    $totalThursday = 0;
    foreach($punches[4] as $stamp){
        $table .= "<td>".$stamp."</td>";
        $col++;
        if ($col % 2 != 0){
            $in = strtotime($stamp);
        }
        else{
            $out = strtotime($stamp);
            $totalThursday += ($out - $in);
        }
    }
    if($col < $cols){
        for ($i = 0; $i < ($cols - $col); $i++){
            $table .= "<td></td>";
        }
    }
    if ($totalThursday > 0){
        $table .= "<td>".date('H:i:s',$totalThursday)."</td>";
    }
    else {
        $table .= "<td>0</td>";
    }
    $table .= "  </tr>
  <tr>
    <td>Friday</td>";
    $col = 0;
    $totalFriday = 0;
    foreach($punches[5] as $stamp){
        $table .= "<td>".$stamp."</td>";
        $col++;
        if ($col % 2 != 0){
            $in = strtotime($stamp);
        }
        else{
            $out = strtotime($stamp);
            $totalFriday += ($out - $in);
        }
    }
    if($col < $cols){
        for ($i = 0; $i < ($cols - $col); $i++){
            $table .= "<td></td>";
        }
    }
    if ($totalFriday > 0){
        $table .= "<td>".date('H:i:s',$totalFriday)."</td>";
    }
    else {
        $table .= "<td>0</td>";
    }
    $table .= "  </tr>
  <tr>
    <td>Saturday</td>";
    $col = 0;
    $totalSaturday = 0;
    foreach($punches[6] as $stamp){
        $table .= "<td>".$stamp."</td>";
        $col++;
        if ($col % 2 != 0){
            $in = strtotime($stamp);
        }
        else{
            $out = strtotime($stamp);
            $totalSaturday += ($out - $in);
        }
    }
    if($col < $cols){
        for ($i = 0; $i < ($cols - $col); $i++){
            $table .= "<td></td>";
        }
    }
    if ($totalSaturday > 0){
        $table .= "<td>".date('H:i:s',$totalSaturday)."</td>";
    }
    else {
        $table .= "<td>0</td>";
    }

    $total = $totalMonday + $totalTuesday + $totalWednesday + $totalThursday + $totalFriday + $totalSaturday + $totalSunday;

    $table .= "  </tr>
</table>";
} else {
    echo "0 results";
}
echo $table;
if ($total > 0){
    echo "<p> Weekly Total Hours: ".date('H:i:s',$total)."</p>";
}
else {
    echo "<p> Weekly Total Hours: 0</p>";
}




?>
