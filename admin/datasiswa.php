<?php 
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    include '../config/config.default.php';
    $query = mysql_query("SELECT * FROM siswa order by nama ASC");
    $jsonResult = '{"data" : [ ';
    $i=0;
    while ($data=mysql_fetch_assoc($query)) {
       if($i != 0){
           $jsonResult .=',';
       }
       $jsonResult .=json_encode($data);
       $i++;
    }
    $jsonResult .= ']}';
    echo $jsonResult;
} else {
    echo '<script>window.location="404.html"</script>';
}
?>