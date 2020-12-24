<?php
header("Content-Type:application/json");
if (isset($_GET['order_id']) && $_GET['order_id']!="") {
	include('db.php');
	$order_id = $_GET['order_id'];
	$result = mysqli_query($con,"SELECT * FROM `transactions` WHERE order_id=$order_id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$nama_pemesan = $row['nama_pemesan'];
	$mobil = $row['mobil'];
	$tgl_pesan = $row['tgl_pesan'];
	$tgl_pinjam = $row['tgl_pinjam'];
	$tgl_kembali = $row['tgl_kembali'];
	$lama_rental = $row['lama_rental'];
	$total_bayar = $row['total_bayar'];
	$status_transaksi = $row['status_transaksi'];
	response($order_id, $nama_pemesan, $mobil, $tgl_pesan, $tgl_pinjam, $tgl_kembali, $lama_rental, $total_bayar, $status_transaksi);
	mysqli_close($con);
	}else{
		response(NULL, "No Record Found");
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($order_id, $nama_pemesan, $mobil, $tgl_pesan, $tgl_pinjam, $tgl_kembali, $lama_rental, $total_bayar, $status_transaksi){
	$response['order_id'] = $order_id;
	$response['nama_pemesan'] = $nama_pemesan;
	$response['mobil'] = $mobil;
	$response['tgl_pesan'] = $tgl_pesan;
	$response['tgl_pinjam'] = $tgl_pinjam;
	$response['tgl_kembali'] = $tgl_kembali;
	$response['lama_rental'] = $lama_rental;
	$response['total_bayar'] = $total_bayar;	
	$response['status_transaksi'] = $status_transaksi;

	$json_response = json_encode($response);
	echo $json_response;
}
?>