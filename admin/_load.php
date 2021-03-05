<?php
	require("../config/config.default.php");
	require("../config/config.function.php");
	require("../config/functions.crud.php");
	$id_siswa = (isset($_SESSION['id_siswa'])) ? $_SESSION['id_siswa'] : 0;
	if(isset($_GET['pg'])) {
		$pg = $_GET['pg'];
		if($pg=='waktu') {
			echo $waktu;
		}
		elseif($pg=='log') {
            $logC = 0;
			echo "<div class='direct-chat-messages' style='height:470px'>";
			$logQ = mysql_query("SELECT * FROM log ORDER BY date DESC limit 6");
			while($log = mysql_fetch_array($logQ)) {
                $logC++;
				$siswa = mysql_fetch_array(mysql_query("SELECT * FROM siswa WHERE id_siswa='$log[id_siswa]'"));
				if($log['type']=='login' || $log['type']=='logout') {
					($log['type']=='login') ? $icon = 'fa-sign-in' : $icon = 'fa-sign-out';
					($log['type']=='login') ? $color = 'text-green' : $color = 'text-red';
					echo "
						<div class='direct-chat-msg' >
							<div class='direct-chat-info clearfix'>
								<span class='direct-chat-name pull-left'>$siswa[nama]</span>
								<span class='direct-chat-timestamp pull-right'>".timeAgo($log['date'])."</span>
							</div><!-- /.direct-chat-info -->
							<img class='direct-chat-img' src='$homeurl/dist/img/avatar-0.png' alt='message user image'><!-- /.direct-chat-img -->
							<div class='direct-chat-text'>
								<span class='$color'><i class='fa $icon'></i> ".ucfirst($log['text'])."</span>
							</div><!-- /.direct-chat-text -->
						</div><!-- /.direct-chat-msg -->
					";
				} else {
					($log['type']=='testongoing') ? $icon = 'fa-pencil-square-o' : $icon = 'fa-check-square-o';
					echo "
						<div class='direct-chat-msg right'>
							<div class='direct-chat-info clearfix'>
								<span class='direct-chat-name pull-right'>$siswa[nama]</span>
								<span class='direct-chat-timestamp pull-left'>".timeAgo($log['date'])."</span>
							</div><!-- /.direct-chat-info -->
							<img class='direct-chat-img' src='$homeurl/dist/img/avatar-0.png' alt='message user image'><!-- /.direct-chat-img -->
							<div class='direct-chat-text'>
								<span><i class='fa $icon'></i> ".ucfirst($log['text'])."...</span>
							</div><!-- /.direct-chat-text -->
						</div><!-- /.direct-chat-msg -->
					";
				}
			}
            if($logC==0) { echo "<p class='text-center'>Tidak ada aktifitas.</p>"; }
			echo "</div>";
		}
		elseif($pg=='pengumuman') {
            $logC = 0;
			echo "<ul class='timeline'><li class='time-label'><span class='bg-blue'>- Terbaru -</span></li>";
			$logQ = mysql_query("SELECT * FROM pengumuman ORDER BY date DESC");
			
			while($log = mysql_fetch_array($logQ)) {
                $logC++;
				$user = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE id_pengawas='$log[user]'"));
				if($log['type']=='internal'){$bg='bg-green';$color='text-green';}else{$bg='bg-blue';$color='text-blue';}
					echo "
						
						
						<!-- timeline time label -->
						
						<li><i class='fa fa-envelope $bg'></i>
						<div class='timeline-item'>
						<span class='time'> <i class='fa fa-calendar'></i> ".buat_tanggal('d-m-Y',$log['date'])." <i class='fa fa-clock-o'></i> ".buat_tanggal('h:i',$log['date'])."</span>
						<h3 class='timeline-header' style='background-color:#f9f0d5'><a class='$color' href='#'>$log[judul]</a> <small> $user[nama]</small>
						
						</h3>
						<div class='timeline-body'>
						".ucfirst($log['text'])."	
						</div>
						
						</div>
						</li>
            
						
					";
				
			}
            if($logC==0) { echo "<p class='text-center'>Tidak ada aktifitas.</p>"; }
			echo "</ul>";
		}
		elseif($pg=='pengumumansiswa') {
            $logC = 0;
			echo "<ul class='timeline'><br>";
			$logQ = mysql_query("SELECT * FROM pengumuman where type='eksternal' ORDER BY date DESC");
			
			while($log = mysql_fetch_array($logQ)) {
                $logC++;
				$user = mysql_fetch_array(mysql_query("SELECT * FROM pengawas WHERE id_pengawas='$log[user]'"));
				if($log['type']=='internal'){$bg='bg-green';$color='text-green';}else{$bg='bg-blue';$color='text-blue';}
					echo "
						
						
						<!-- timeline time label -->
						
						<li><i class='fa fa-envelope $bg'></i>
						<div class='timeline-item'>
						<span class='time'> <i class='fa fa-calendar'></i> ".buat_tanggal('d-m-Y',$log['date'])." <i class='fa fa-clock-o'></i> ".buat_tanggal('h:i',$log['date'])."</span>
						<h3 class='timeline-header' style='background-color:#f9f0d5'><a class='$color' href='#'>$log[judul]</a> <small> $user[nama]</small>
						
						</h3>
						<div class='timeline-body'>
						".ucfirst($log['text'])."	
						</div>
						
						</div>
						</li>
            
						
					";
				
			}
            if($logC==0) { echo "<p class='text-center'>Tidak ada aktifitas.</p>"; }
			echo "</ul>";
		}
		elseif($pg=='token') {
						function create_random($length)
						{
							$data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
							$string = '';
							for($i = 0; $i < $length; $i++) {
							$pos = rand(0, strlen($data)-1);
							$string .= $data{$pos};
						}
						return $string;
						}
						$token=create_random(6);
						$now = date('Y-m-d H:i:s');
						echo $token; 
						$cek=mysql_num_rows(mysql_query("select * from token"));
						if($cek<>0){
						$query=mysql_fetch_array(mysql_query("select time from token"));
						$time=$query['time'];
						$tgl=buat_tanggal('H:i:s',$time);
						$exec=mysql_query("update token set token='$token', time='$now' where  id_token='1'");
						}else{
						$exec = mysql_query("INSERT INTO token (token,masa_berlaku) VALUES ('$token','00:15:00')");
						}
		}
	}
?>