<?php    
    function insert($table,$data=null) {
        $command = 'INSERT INTO '.$table;
        $field = $value = null;
        foreach($data as $f => $v) {
            $field	.= ','.$f;
            $value	.= ", '".$v."'";
        }
        $command .=' ('.substr($field,1).')';
        $command .=' VALUES('.substr($value,1).')';
        $exec = mysql_query($command);
        ($exec) ? $status = 'OK' : $status = 'NO';
        return $status;
    }
    
    function update($table,$data=null,$where=null) {
        $command = 'UPDATE '.$table.' SET ';
        $field = $value = null;
        foreach($data as $f => $v) {
            $field	.= ",".$f."='".$v."'";
        }
        $command .= substr($field,1);
		if($where!=null) {
			foreach($where as $f => $v) {
				$value .= "#".$f."='".$v."'";
			}
			$command .= ' WHERE '.substr($value,1);
			$command = str_replace('#',' AND ',$command);
		}
        $exec = mysql_query($command);
        ($exec) ? $status = 'OK' : $status = 'NO';
        return $status;
    }
    
    function delete($table,$where=null) {
        $command = 'DELETE FROM '.$table;
		if($where!=null) {
			$value = null;
			foreach($where as $f => $v) {
				$value .= "#".$f."='".$v."'";
			}
			$command .= ' WHERE '.substr($value,1);
			$command = str_replace('#',' AND ',$command);
		}
        $exec = mysql_query($command);
        ($exec) ? $status = 'OK' : $status = 'NO';
        return $status;
    }
    
    function fetch($table,$where=null) {
        $command = 'SELECT * FROM '.$table;
		if($where!=null) {
			$value = null;
			foreach($where as $f => $v) {
				$value .= "#".$f."='".$v."'";
			}
			$command .= ' WHERE '.substr($value,1);
			$command = str_replace('#',' AND ',$command);
		}
        $exec = mysql_fetch_assoc(mysql_query($command));
        return $exec;
    }
    
    function select($table,$where=null,$order=null,$limit=null) {
        $command = 'SELECT * FROM '.$table;
        if($where!=null) {
            $value = null;
            foreach($where as $f => $v) {
                $value .= "#".$f."='".$v."'";
            }
            $command .= ' WHERE '.substr($value,1);
            $command = str_replace('#',' AND ',$command);
        }
        ($order!=null) ? $command .= ' ORDER BY '.$order :null;
        ($limit!=null) ? $command .= ' LIMIT '.$limit :null;
        $result = array();
        $sql = mysql_query($command);
        while($field = mysql_fetch_assoc($sql)) {
            $result[] = $field;
        }
        return $result;
    }
    
    function rowcount($table,$where=null) {
        $command = 'SELECT * FROM '.$table;
		if($where!=null) {
			$value = null;
			foreach($where as $f => $v) {
				$value .= "#".$f."='".$v."'";
			}
			$command .= ' WHERE '.substr($value,1);
			$command = str_replace('#',' AND ',$command);
		}
        $exec = mysql_num_rows(mysql_query($command));
        return $exec;
    }
    
    function truncate($table) {
        $command = 'TRUNCATE '.$table;
        $exec = mysql_query($command);
        ($exec) ? $status = 'OK' : $status = 'NO';
        return $status;
    }
    
    // $data = array(
            // 'nis' => '10110072',
            // 'nama' => 'Yunus',
            // 'kelas' => 'XII TKJ 2'
        // );
    // $where  = array(
            // 'nis' => '10110072'
        // );
    // echo insert('siswa',$data);
    // echo update('siswa',$data,$where);
    // echo delete('siswa',$where);
    // $siswa = fetch('siswa',$where);
    // echo $siswa['nama'];
    // echo rowcount('siswa',$where);
    // echo truncate('siswa');
    // $sql = select('siswa',$where);
    // foreach($sql as $field) {
        // echo $field['id_siswa'].' - '.$field['nis'].' - '.$field['nama'].' - '.$field['kelas'].'<br/>';
    // }
	// echo "<pre>";
	// print_r($sql);
?>