
<?php
@ini_set('display_errors', 0);
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
require ("lib/fpdf/fpdf.php");
require("lib/lib-function.php");
require("../koneksi.php");
$query = mysql_query("SELECT * FROM transaksi WHERE id='$_GET[id]'");
$hasil = mysql_fetch_array($query);
$hhh=$hasil['pengguna'];
$query2 = mysql_query("SELECT * FROM pengguna WHERE username='$hhh'");
$hasil2 = mysql_fetch_array($query2);

function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}
Class Kwitansi extends FPDF
{
	/*Format Kwitansi Sederhana oleh : Ahyarudin -- www.ayayank.com*/
	var $tanggal,$kwnums,$admins,$notevalid,$headerCo,$headerAddr,$headerTel;
	/* Header Kwitansi */
	function Header(){
		$this->SetFont('Arial','B',12);
		$this->Cell(40,7,$this->headerCo,0,1,'L');
		$this->SetFont('Arial','B',11);
		$this->Cell(0,7,$this->headerAddr,0,1,'L');
		$this->Cell(120,7,$this->headerTel,0,0,'L');
		$this->SetFont('Arial','',12);
		$this->Cell(28,7,'',0,0,'L');
		$this->SetFont('Courier','',12);
		$this->Cell(0,7,'',0,1,'L');
		$this->SetFillColor(95, 95, 95);
		$this->Rect(5, 27.5, 198, 3, 'FD');
	}
	/* Footer Kwitansi*/
	function Footer(){
		$this->SetY(-40);
		$this->Ln(18);
		$this->Cell(130);
		$this->SetFont('Courier','B',12);
		$this->Cell(0,6,$this->admins,0,1,'C');
		$this->Ln(3);
		$this->SetFont('Arial','I',10);
		$this->Cell(0,6,$this->notevalid,0,1,'R');
	}
	function setHeaderParam($pt,$jl,$tel){
		$this->headerCo=$pt;
		$this->headerAddr=$jl;
		$this->headerTel=$tel;
		}
	function setAdmins($admins){$this->admins=$admins;}
	function setValidasi($word){$this->notevalid=$word;}
}
/*Deklarasi variable untuk cetak*/
$pt='PUTRI LAUNDRY';
$jl='Jl. Raya Gununghalu  No. 78';
$tel='021 - 9997724';
$cash=$hasil['tarif'];
$pembayar=$hasil['konsumen'];
$tglambil= TanggalIndo($hasil['tgl_ambil']);
$tgltransaksi= TanggalIndo($hasil['tgl_transaksi']);
$admins='Admin';
$payment='Jasa Laundry';
$notevalid='validasi pembayaran dianggap sah bila disertai tanda tangan dan stempel';
/*parameter kertas*/
$pdf=new Kwitansi('L','mm','A5');
$fungsi=new Fungsi();
/* Retrieve No. Kwitansi*/
/*Persiapan Parameter*/
$pdf->setAdmins($admins);
$pdf->setValidasi($notevalid);
$pdf->setHeaderParam($pt,$jl,$tel);
/* Bagian di mana inti dari kwitansi berada*/
$pdf->setMargins(5,5,5);
$pdf->AddPage();
$pdf->SetLineWidth(0.6);
$pdf->Ln(10);
$pdf->Cell(20);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,8,'Terima Dari  : ',0,0,'R');
$pdf->SetFont('Courier','',14);
$pdf->Cell(16,8,$pembayar,0,1,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20);
$pdf->Cell(40,8,'Uang Sejumlah  : ',0,0,'R');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,'###'.$fungsi->Terbilang($cash).' RUPIAH ###',0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->SetY(-90);
$pdf->Cell(20);
$pdf->Cell(40,8,'Untuk Pembayaran  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$payment,0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->SetY(70);
$pdf->Cell(20);
$pdf->Cell(40,8,'Tanggal Ambil  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$tglambil,0,'L');
$pdf->SetY(-50);
$pdf->SetFont('Courier','B','16');
$pdf->Cell(60,12,'Rp '.$fungsi->Ribuan($cash),1,0,'C');
$pdf->SetAuthor('http://www.ayayank.com',true);
$pdf->SetY(-40);
$pdf->SetFont('Courier','',12);
$pdf->Cell(130);
$pdf->Cell(0,6,$tgltransaksi,0,1,'C');
$pdf->Ln(10);
$pdf->Output();
?>
<title>Kwitansi Pembayaran</title>