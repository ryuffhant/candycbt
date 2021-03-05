<?php if($ac==''){
								if(isset($_POST['tambahsiswa'])) {
												$nis = $_POST['nis'];
												$no_peserta = $_POST['no_peserta'];
												$nama = $_POST['nama'];
												$nama = str_replace("'","&#39;",$nama);
												$username = $_POST['username'];
												$id_kelas = $_POST['id_kelas'];
												$idpk= $_POST['idpk'];
												$sesi = $_POST['idsesi'];
												$ruang= $_POST['ruang'];
												$level= $_POST['level'];
												$pass1 = $_POST['pass1'];
												$pass2 = $_POST['pass2'];
												$cekuser = mysql_num_rows(mysql_query("SELECT * FROM siswa WHERE username='$username'"));
												if($cekuser>0) {
													$info = info("Username $username sudah ada!","NO");
												} else {
													if($pass1<>$pass2) {
														$info = info("Password tidak cocok!","NO");
													} else {
													if($setting['jenjang']=='SMK'){
														$exec = mysql_query("INSERT INTO siswa (id_kelas,idpk,nis,no_peserta,nama,sesi,ruang,level,username,password) VALUES ('$id_kelas','$idpk','$nis','$no_peserta','$nama','$sesi','$ruang','$level','$username','$pass1')");
													}else{	
														$exec = mysql_query("INSERT INTO siswa (id_kelas,nis,no_peserta,nama,sesi,ruang,level,username,password) VALUES ('$id_kelas','$nis','$no_peserta','$nama','$sesi','$ruang','$level','$username','$pass1')");
													}
														(!$exec) ? $info = info("Gagal menyimpan!","NO") : jump("?pg=$pg");
													
													}
												}
											}
										
							echo "
								<div class='row'>
									<div class='col-md-12'>
										<div class='box box-solid'>
											<div class='box-header with-border '>
												<h3 class='box-title'><i class='fa fa-group'></i> Peserta Ujian</h3>
                                                <div class='box-tools btn-group'>";
												if($pengawas['level']=='admin'){
												echo "
													<a data-toggle='modal' data-target='#tambahsiswa' class='btn btn-sm btn-primary'><i class='fa fa-check'></i> Tambah</a>
                                                   												
													<a href='?pg=uplfotosiswa' class='btn btn-sm btn-primary'><i class='fa fa-image'></i> Upload Foto</a>";
												}
													echo "
                                                </div>
											</div><!-- /.box-header -->
											<div class='box-body'>
											<div class='table-responsive'>
												<table id='tabelsiswa' class='table table-bordered table-striped'>
													<thead>
														<tr>
															<th width='3px'></th>
															
															<th>No_Peserta</th>
															<th>Nama</th>
															<th>Level</th>
															<th>Kelas</th>";
															if($setting['jenjang']=='SMK'){
															echo"<th>Jurusan</th>";
															}
															echo "
															<th>sesi</th>
															<th>ruang</th>
															<th>Username</th>
															<th>Password</th>";
														if($pengawas['level']=='admin'){
														echo "	<th  width='70px'></th>";
															}
														echo "
														</tr>
													</thead>
													
												</table>
												</div>
												<div class='modal fade' id='tambahsiswa' style='display: none;'>
													<div class='modal-dialog'>
													<div class='modal-content'>
													<div class='modal-header bg-blue'>
													<button  class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
															<h3 class='modal-title'>Tambah Siswa</h3>
															
														</div>
													<div class='modal-body'>
													<form action='' method='post'>
															<div class='form-group'>
															<div class='row'>
																<div class='col-md-6'>
																<label>NIS</label>
																<input type='text' name='nis' class='form-control' required='true'/>
																</div>
																<div class='col-md-6'>
																<label>Nomor Peserta</label>
																<input type='text' name='no_peserta' class='form-control' required='true'/>
																</div>
															</div>
															</div>
															
															<div class='form-group'>
																<label>Nama</label>
																<input type='text' name='nama' class='form-control' required='true'/>
															</div>
															<div class='form-group'>
															<div class='row'>
																<div class='col-md-4'>
																<label>Kelas</label>
																<select name='id_kelas' class='form-control' required='true'>
																	<option value=''></option>";
																	$kelasQ = mysql_query("SELECT * FROM kelas ORDER BY nama ASC");
																	while($kelas = mysql_fetch_array($kelasQ)) {
																		
																		echo "<option value='$kelas[id_kelas]' $s>$kelas[nama]</option>";
																	}
																	echo"
																</select>
																</div>
																<div class='col-md-4'>
																<label>Level</label>
																<select name='level' class='form-control' required='true'>
																	<option value=''></option>";
																	$pkQ = mysql_query("SELECT * FROM level ");
																	while($pk = mysql_fetch_array($pkQ)) {
																		echo "<option value='$pk[kode_level]'>$pk[kode_level]</option>";
																	}
																	echo"
																</select>
																</div>";
																if($setting['jenjang']=='SMK'){
																echo"
																<div class='col-md-4'>
																<label>Jurusan</label>
																<select name='idpk' class='form-control' required='true'>
																	<option value=''></option>";
																	$pkQ = mysql_query("SELECT * FROM pk ORDER BY program_keahlian ASC");
																	while($pk = mysql_fetch_array($pkQ)) {
																		echo "<option value='$pk[id_pk]'>$pk[program_keahlian]</option>";
																	}
																	echo"
																</select>
																</div>";
																}
																echo "
															</div>	
															</div>
															
															<div class='form-group'>
															<div class='row'>
																<div class='col-md-6'>
																<label>Sesi</label>
																<select name='idsesi' class='form-control' required='true'>
																	<option value=''></option>";
																	$sesiQ = mysql_query("SELECT * FROM sesi ");
																	while($sesi = mysql_fetch_array($sesiQ)) {
																		
																		echo "<option value='$sesi[kode_sesi]' $s>$sesi[kode_sesi]</option>";
																	}
																	echo"
																</select>
																</div>
																<div class='col-md-6'>
																<label>Ruang</label>
																<select name='ruang' class='form-control' required='true'>
																	<option value=''></option>";
																	$pkQ = mysql_query("SELECT * FROM ruang ");
																	while($pk = mysql_fetch_array($pkQ)) {
																		
																		echo "<option value='$pk[kode_ruang]'>$pk[kode_ruang]</option>";
																	}
																	echo"
																</select>
																</div>
															</div>
															</div>
															
															<div class='form-group'>
																<label>Username</label>
																<input type='text' name='username' class='form-control' required='true'/>
															</div>
															<div class='form-group'>
																<div class='row'>
																	<div class='col-md-6'>
																		<label>Password</label>
																		<input type='password' name='pass1' class='form-control' required='true'/>
																	</div>
																	<div class='col-md-6'>
																		<label>Ulang Password</label>
																		<input type='password' name='pass2' class='form-control' required='true'/>
																	</div>
																</div>
															</div>
													<div class='modal-footer'>
													<div class='box-tools pull-right btn-group'>
																<button type='submit' name='tambahsiswa' class='btn btn-sm btn-primary'><i class='fa fa-check'></i> Simpan</button>
																<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
													</div>	
													</div>
													</form>
													</div>
								
													</div>
														<!-- /.modal-content -->
													</div>
														<!-- /.modal-dialog -->
													</div>		
											</div><!-- /.box-body -->
										</div><!-- /.box -->
									</div>
									<div class='col-md-4'>";
						}if($ac=='edit') {
							$id = $_GET['id'];
											$siswa = mysql_fetch_array(mysql_query("SELECT * FROM siswa WHERE id_siswa='$id'"));
											if(isset($_POST['submit'])) {
												$nis = $_POST['nis'];
												$nopes = $_POST['no_peserta'];
												$idpk=$_POST['idpk'];
												$nama = $_POST['nama'];
												$nama = str_replace("'","&#39;",$nama);
												$kelas = $_POST['id_kelas'];
												$sesi = $_POST['idsesi'];
												$ruang = $_POST['ruang'];
												$level = $_POST['level'];
												$username = $_POST['username'];
												$pass1 = $_POST['pass1'];
												$pass2 = $_POST['pass2'];
												$level = $_POST['level'];
												if($pass1<>'' AND $pass2<>'') {
													if($pass1<>$pass2) {
														$info = info("Password tidak cocok!","NO");
													} else {
														if($setting['jenjang']=='SMK'){
														$exec = mysql_query("UPDATE siswa SET nis='$nis',no_peserta='$nopes', idpk='$idpk',id_kelas='$kelas',nama='$nama',sesi='$sesi',ruang='$ruang',username='$username',password='$pass1',level='$level' WHERE id_siswa='$id'");
														}else{
														$exec = mysql_query("UPDATE siswa SET nis='$nis',no_peserta='$nopes', id_kelas='$kelas',nama='$nama',sesi='$sesi',ruang='$ruang',username='$username',password='$pass1',level='$level' WHERE id_siswa='$id'");
														}
													}
												} else {
													if($setting['jenjang']=='SMK'){
													$exec = mysql_query("UPDATE siswa SET nis='$nis',no_peserta='$nopes', idpk='$idpk',id_kelas='$kelas',nama='$nama',sesi='$sesi',ruang='$ruang',username='$username',level='$level' WHERE id_siswa='$id'");
													}else{
													$exec = mysql_query("UPDATE siswa SET nis='$nis',no_peserta='$nopes', id_kelas='$kelas',nama='$nama',sesi='$sesi',ruang='$ruang',username='$username',level='$level' WHERE id_siswa='$id'");
													}
												}
												jump("?pg=$pg");
											}
							echo "				<div class='row'>
												<div class='col-md-2'>
												</div>
												 <div class='col-md-7'>
													<form action='' method='post'>
													<div class='box box-success'>
														<div class='box-header with-border'>
															<h3 class='box-title'>Edit</h3>
															<div class='box-tools pull-right btn-group'>
																<button type='submit' name='submit' class='btn btn-sm btn-success'><i class='fa fa-check'></i> Simpan</button>
																<a href='?pg=$pg' class='btn btn-sm btn-danger' title='Batal'><i class='fa fa-times'></i></a>
															</div>
														</div><!-- /.box-header -->
														<div class='box-body'>
													
													<input type='hidden'  name='idu' value='$siswa[id_siswa]'/>
															<div class='form-group'>
															<div class='row'>
																<div class='col-md-6'>
																<label>NIS</label>
																<input type='text' name='nis' class='form-control' value='$siswa[nis]' required='true'/>
																</div>
																<div class='col-md-6'>
																<label>Nomor Peserta</label>
																<input type='text' name='no_peserta' class='form-control' value='$siswa[no_peserta]' required='true'/>
																</div>
															</div>
															</div>
															
															<div class='form-group'>
																<label>Nama</label>
																<input type='text' name='nama' class='form-control' value='$siswa[nama]' required='true'/>
															</div>
															<div class='form-group'>
															<div class='row'>
																<div class='col-md-4'>
																<label>Kelas</label>
																<select name='id_kelas' class='form-control' required='true'>
																	<option value=''></option>";
																	$kelasQ = mysql_query("SELECT * FROM kelas ORDER BY nama ASC");
																	while($kelas = mysql_fetch_array($kelasQ)) {
																		($kelas['id_kelas']==$siswa['id_kelas']) ? $s='selected':$s='';
																		echo "<option value='$kelas[id_kelas]' $s>$kelas[nama]</option>";
																	}
																	echo"
																</select>
																</div>
																<div class='col-md-4'>
																<label>Level</label>
																<select name='level' class='form-control' required='true'>
																	<option value=''></option>";
																	$pkQ = mysql_query("SELECT * FROM level ");
																	while($pk = mysql_fetch_array($pkQ)) {
																		($pk['kode_level']==$siswa['level']) ? $s='selected':$s='';
																		echo "<option value='$pk[kode_level]' $s>$pk[kode_level]</option>";
																	}
																	echo"
																</select>
																</div>";
																if($setting['jenjang']=='SMK'){
																echo "
																<div class='col-md-4'>
																<label>Jurusan</label>
																<select name='idpk' class='form-control' required='true'>
																	<option value=''></option>";
																	$pkQ = mysql_query("SELECT * FROM pk ORDER BY program_keahlian ASC");
																	while($pk = mysql_fetch_array($pkQ)) {
																		($pk['id_pk']==$siswa['idpk']) ? $s='selected':$s='';
																		echo "<option value='$pk[id_pk]' $s>$pk[program_keahlian]</option>";
																	}
																	echo"
																</select>
																</div>";
																}
																echo"
															</div>	
															</div>
															
															<div class='form-group'>
															<div class='row'>
																<div class='col-md-6'>
																<label>Sesi</label>
																<select name='idsesi' class='form-control' required='true'>
																	<option value=''></option>";
																	$sesiQ = mysql_query("SELECT * FROM sesi ");
																	while($sesi = mysql_fetch_array($sesiQ)) {
																		($sesi['kode_sesi']==$siswa['sesi']) ? $s='selected':$s='';
																		echo "<option value='$sesi[kode_sesi]' $s>$sesi[kode_sesi]</option>";
																	}
																	echo"
																</select>
																</div>
																<div class='col-md-6'>
																<label>Ruang</label>
																<select name='ruang' class='form-control' required='true'>
																	<option value=''></option>";
																	$pkQ = mysql_query("SELECT * FROM ruang ");
																	while($pk = mysql_fetch_array($pkQ)) {
																		($pk['kode_ruang']==$siswa['ruang']) ? $s='selected':$s='';
																		echo "<option value='$pk[kode_ruang]' $s>$pk[kode_ruang]</option>";
																	}
																	echo"
																</select>
																</div>
															</div>
															</div>
															<div class='form-group'>
																<label>Username</label>
																<input type='text' name='username' class='form-control' value='$siswa[username]' required='true'/>
															</div>
															<div class='form-group'>
																<div class='row'>
																	<div class='col-md-6'>
																		<label>Password</label>
																		<input type='password' name='pass1' class='form-control' />
																	</div>
																	<div class='col-md-6'>
																		<label>Ulang Password</label>
																		<input type='password' name='pass2' class='form-control'/>
																	</div>
																</div>
															</div>
													
													</form>
													</div>
														<!-- /.modal-content -->
													</div>
														<!-- /.modal-dialog -->
													</div>
													</div>";	
							
						}elseif($ac=='hapussiswa') {
							if(isset($_GET['id'])){
							$id=$_GET['id'];
							$exec=mysql_query("delete from siswa where id_siswa='$id'");
							jump("?pg=$pg");
							}
						}

										echo "
									</div>
								</div>
							";
							?>