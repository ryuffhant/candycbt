
<?php
require_once 'PHPExcel.php';
	include "../config/config.default.php";
	include  "../config/config.function.php";
	include  "../config/functions.crud.php";
	
	
	
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
	$id_mapel = $_GET['m'];
	$mapel = fetch('mapel',array('id_mapel'=>$id_mapel));
	$file = "SOAL_".$mapel['nama'];

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
       		
       	->setCellValue('A1', 'NO')
       	->setCellValue('B1', 'SOAL')
       	->setCellValue('C1', 'JENIS')
       	->setCellValue('D1', 'PILA')
       	->setCellValue('E1', 'PILB')
       	->setCellValue('F1', 'PILC')
       	->setCellValue('G1', 'PILD')
       	->setCellValue('H1', 'PILE')
       	->setCellValue('I1', 'FILE1')
       	->setCellValue('J1', 'FILE2')
       	->setCellValue('K1', 'FILEA')
       	->setCellValue('L1', 'FILEB')
       	->setCellValue('M1', 'FILEC')
       	->setCellValue('N1', 'FILED')
       	->setCellValue('O1', 'FILEE')
       	->setCellValue('P1', 'JAWABAN');
       	

$baris = 2;
$no = 0;		
$soalx = mysql_query("select * from soal where id_mapel='$id_mapel'");
while($soal = mysql_fetch_array($soalx)){
$no++;
$objPHPExcel->setActiveSheetIndex(0)
     	->setCellValue("A".$baris, $no)
     	->setCellValue("B".$baris, $soal['soal'])
     	->setCellValue("C".$baris, $soal['jenis'])
     	->setCellValue("D".$baris, $soal['pilA'])
     	->setCellValue("E".$baris, $soal['pilB'])
     	->setCellValue("F".$baris, $soal['pilC'])
     	->setCellValue("G".$baris, $soal['pilD'])
     	->setCellValue("H".$baris, $soal['pilE'])
     	->setCellValue("I".$baris, $soal['file'])
     	->setCellValue("J".$baris, $soal['file1'])
     	->setCellValue("K".$baris, $soal['fileA'])
     	->setCellValue("L".$baris, $soal['fileB'])
     	->setCellValue("M".$baris, $soal['fileC'])
     	->setCellValue("N".$baris, $soal['fileD'])
     	->setCellValue("O".$baris, $soal['fileE'])
     	->setCellValue("P".$baris, $soal['jawaban']);
     				

$baris++;
}
 
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('transaksi');
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Soal_'.$file.'.xls"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>