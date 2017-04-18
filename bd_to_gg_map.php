<?php
$arr_a= array(
'113.8188,34.742875',
'113.819232,34.751892',
'113.823687,34.769566',
'113.83188,34.786763',
'113.835329,34.796249',
'113.837198,34.805497',
'113.827712,34.811662',
'113.814057,34.815811',
'113.786318,34.8036',
'113.786749,34.792455',
'113.77445630093,34.789847876769',
'113.76776793661,34.78289387505',
'113.77185494429,34.77418056459',
'113.76163635346,34.771628121966',
'113.76450560357,34.761489462019',
'113.75073347599,34.761160401909',
'113.75368456425,34.75395095986',
'113.75322761997,34.742314175197',
'113.77585357291,34.742984449957',
'113.78837218741,34.743121192793',
'113.79132335481,34.742955925023'
);

function Convert_BD09_To_GCJ02($lat,$lng){
        $x_pi = 3.14159265358979324 * 3000.0 / 180.0;
        $x = $lng - 0.0065;
        $y = $lat - 0.006;
        $z = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $x_pi);
        $theta = atan2($y, $x) - 0.000003 * cos($x * $x_pi);
        $lng = $z * cos($theta);
        $lat = $z * sin($theta);
							//return array('lng'=>$lng,'lat'=>$lat);
							//数组形式
							//$re_data=array('lng'=>$lng,'lat'=>$lat);
       //return  $re_data;
							return $lng.','.$lat;
}
//看下图形点
foreach ($arr_a as $v){
	$a = explode(',',$v);
	$b=Convert_BD09_To_GCJ02($a[0],$a[1]);
	$c=explode(',',$b);
	
	//print_r( $b)."\n";
	$d='{lat:'.$c[0].', lng:'.$c[1].'},';	
echo $d;
	}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polygon</title>
    <style>
/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

#map { height: 100%; }
/* Optional: Makes the sample page fill the window. */
html, body { height: 100%; margin: 0; padding: 0; }
</style>
    </head>
    <body>
<div id="map"></div>
<!-- 这里是 谷歌map api 的5个key
					var  google_maps_url = ['AIzaSyDovKmTPkOYtsHhMuqZB3bo08rPc2nlx2E','AIzaSyCvRsh-4wk8zvoAliDQlQ8ZFns2MVvkNZY','AIzaSyDxBL8FhW-NWUu9QrVFI2LL6NFfXuY-664','AIzaSyCRMcq8UadP7ZmOZchgcEHJMt8kMedM89w','AIzaSyCAOU6XnzgMB7e0KlCNWC9C2i_b_mxWjoM'];
					--> 
<script async defer
    src="http://ditu.google.cn/maps/api/js?v=3&key=AIzaSyCRMcq8UadP7ZmOZchgcEHJMt8kMedM89w&callback=initMap">
    </script> 
<script>
      // This example creates a simple polygon representing the Bermuda Triangle.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          //center: {lat: 24.886, lng: -70.268},
										<?php
										//初始坐标
										$arr_b=$arr_a[0];
										$a = explode(',',$arr_b);
										$c= Convert_BD09_To_GCJ02($a[0],$a[1]);
										$d = explode(',',$c);
										 echo 'center: {lat: '.$d[0].', lng: '.$d[1].'}';?>,
          mapTypeId: 'terrain'
        });

        // Define the LatLng coordinates for the polygon's path.
        var triangleCoords = [
								<?php
								//将百度地图 经纬度转为谷歌经纬度，并使用谷歌地图构建 多边形区域。
$arr_b= array();
foreach ($arr_a as $v){
	$a = explode(',',$v);
	$b=Convert_BD09_To_GCJ02($a[0],$a[1]);
	$c=explode(',',$b);

	$d='{lat:'.$c[0].', lng:'.$c[1].'},';	
echo $d;
	}									?>
        ];

        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
      }
    </script>
</body>
</html>
