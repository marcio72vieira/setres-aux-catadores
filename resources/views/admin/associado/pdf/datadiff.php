<?php
function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
    /*
    $interval can be:
    yyyy - Number of full years
    q - Number of full quarters
    m - Number of full months
    y - Difference between day numbers
        (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
    d - Number of full days
    w - Number of full weekdays
    ww - Number of full weeks
    h - Number of full hours
    n - Number of full minutes
    s - Number of full seconds (default)
    */

    if (!$using_timestamps) {
        $datefrom = strtotime($datefrom, 0);
        $dateto = strtotime($dateto, 0);
    }
    $difference = $dateto - $datefrom; // Difference in seconds

    switch($interval) {

    case 'yyyy': // Number of full years

        $years_difference = floor($difference / 31536000);
        if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
            $years_difference--;
        }
        if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
            $years_difference++;
        }
        $datediff = $years_difference;
        break;

    case "q": // Number of full quarters

        $quarters_difference = floor($difference / 8035200);
        while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
            $months_difference++;
        }
        $quarters_difference--;
        $datediff = $quarters_difference;
        break;

    case "m": // Number of full months

        $months_difference = floor($difference / 2678400);
        while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
            $months_difference++;
        }
        $months_difference--;
        $datediff = $months_difference;
        break;

    case 'y': // Difference between day numbers

        $datediff = date("z", $dateto) - date("z", $datefrom);
        break;

    case "d": // Number of full days

        $datediff = floor($difference / 86400);
        break;

    case "w": // Number of full weekdays

        $days_difference = floor($difference / 86400);
        $weeks_difference = floor($days_difference / 7); // Complete weeks
        $first_day = date("w", $datefrom);
        $days_remainder = floor($days_difference % 7);
        $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
        if ($odd_days > 7) { // Sunday
            $days_remainder--;
        }
        if ($odd_days > 6) { // Saturday
            $days_remainder--;
        }
        $datediff = ($weeks_difference * 5) + $days_remainder;
        break;

    case "ww": // Number of full weeks

        $datediff = floor($difference / 604800);
        break;

    case "h": // Number of full hours

        $datediff = floor($difference / 3600);
        break;

    case "n": // Number of full minutes

        $datediff = floor($difference / 60);
        break;

    default: // Number of full seconds (default)

        $datediff = $difference;
        break;
    }

    return $datediff;

}

echo datediff('yyyy','1972-09-03','2021-04-12')." Anos <br>";
echo datediff('m','1972-09-03','2021-04-12')." Mês <br>";
echo datediff('d','1972-09-03','2021-04-12')." Dias <br>";

echo "<br><br>"."/////////////////////////////  OUTRO SCRIPT  //////////////////////////"; echo "<br>";

/*
echo "MANUAL DO PHP"; echo "<br>";

date_default_timezone_set('UTC');
echo date("l");

echo date( "Y-m-d", strtotime( "2009-01-31 +1 month" ) ); // PHP:  2009-03-03
echo date( "Y-m-d", strtotime( "2009-01-31 +2 month" ) ); // PHP:  2009-03-31
echo "<br>"; echo "<br>";

$data1 = strtotime('2021-04-12');
echo $data1;
*/


$datainicial = strtotime('1972-09-03');echo "</br></br>";echo $datainicial;
$datafinal = strtotime('2021-04-12'); echo "</br></br>";echo $datafinal;

$datadiff = abs(($datafinal) - ($datainicial)); echo "</br></br>"; echo $datadiff;

$years = floor($datadiff / (365*60*60*24));echo "<br><br>"; echo "Quantidade de Anos: ".$years; echo "<br>";

$months = floor(($datadiff - $years * 365*60*60*24) / (30*60*60*24)); echo "Quantidade de Meses: ".$months; echo "<br>";

$days = floor(($datadiff - $years*365*60*60*24 - $months*30*60*60*24) / (60*60*24));echo "Quantidade de dias: "; echo $days; echo "<br>";



//$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));



?>
