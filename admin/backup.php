<?php
require("../config/config.default.php");
	(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
	($id_pengawas==0) ? header('location:login.php'):null;

	function &backup_tables($host, $user, $pass, $name, $tables = '*'){
  $data = "\n/*---------------------------------------------------------------".
          "\n  SQL DB BACKUP ".date("d.m.Y H:i")." ".
          "\n  HOST: {$host}".
          "\n  DATABASE: {$name}".
          "\n  TABLES: {$tables}".
          "\n  ---------------------------------------------------------------*/\n";
  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);
  mysql_query( "SET NAMES `utf8` COLLATE `utf8_general_ci`" , $link ); // Unicode

  if($tables == '*'){ 
    $tables = array();
    $result = mysql_query("SHOW TABLES");
    while($row = mysql_fetch_row($result)){
      $tables[] = $row[0];
    }
  }else{
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }

  foreach($tables as $table){
    $data.= "\n/*---------------------------------------------------------------".
            "\n  TABLE: `{$table}`".
            "\n  ---------------------------------------------------------------*/\n";           
    $data.= "DROP TABLE IF EXISTS `{$table}`;\n";
    $res = mysql_query("SHOW CREATE TABLE `{$table}`", $link);
    $row = mysql_fetch_row($res);
    $data.= $row[1].";\n";

    $result = mysql_query("SELECT * FROM `{$table}`", $link);
    $num_rows = mysql_num_rows($result);    

    if($num_rows>0){
      $vals = Array(); $z=0;
      for($i=0; $i<$num_rows; $i++){
        $items = mysql_fetch_row($result);
        $vals[$z]="(";
        for($j=0; $j<count($items); $j++){
          if (isset($items[$j])) { $vals[$z].= "'".mysql_real_escape_string( $items[$j], $link )."'"; } else { $vals[$z].= "NULL"; }
          if ($j<(count($items)-1)){ $vals[$z].= ","; }
        }
        $vals[$z].= ")"; $z++;
      }
      $data.= "INSERT INTO `{$table}` VALUES ";      
      $data .= "  ".implode(";\nINSERT INTO `{$table}` VALUES ", $vals).";\n";
    }
	
  }	

  mysql_close( $link );
  return $data;
}

if (!file_exists('backup')) {
    mkdir('backup', 0777, true);
}

$tabel = "*";
$backup_file = 'backup/candycbt_'.time().'.sql';
$mybackup = backup_tables($host,$user,$pass,$tabel);

// save to file
$handle = fopen($backup_file,'w+');
fwrite($handle,$mybackup);
fclose($handle);

?>
<div class="alert alert-success alert-dismissable" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Database <?php echo $tabel; ?> telah di Backup<br />
								silahkan untuk mendownload database klik 
								<a href="<?php echo $backup_file?>"><button class="btn btn-danger"> download database</button></a>
								
                            </div>