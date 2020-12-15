<html>
<head>
<title>Rest API Rental Mobil</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div style="width:700px; margin:0 auto;">

<h3>Rest API Persewaan Mobil</h3>   
<form action="" method="POST">
<label>Enter Order ID:</label><br />
<input type="text" name="order_id" placeholder="Enter Order ID" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>    

<?php
if (isset($_POST['order_id']) && $_POST['order_id']!="") {
	$order_id = $_POST['order_id'];
	$url = "http://localhost/api_rentcar/api/".$order_id;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	
	echo "<table>";
	echo "<tr><td>Order ID:</td><td>$result->order_id</td></tr>";
	echo "<tr><td>Pemesan:</td><td>$result->nama_pemesan</td></tr>";
	echo "<tr><td>Mobil:</td><td>$result->mobil</td></tr>";
	echo "<tr><td>Tanggal Pesan:</td><td>$result->tgl_pesan</td></tr>";
	echo "<tr><td>Tanggal Pinjam:</td><td>$result->tgl_pinjam</td></tr>";
	echo "<tr><td>Tanggal Kembali:</td><td>$result->tgl_kembali</td></tr>";
	echo "<tr><td>Lama Rental:</td><td>$result->lama_rental</td></tr>";
	echo "<tr><td>Total Bayar:</td><td>$result->total_bayar</td></tr>";
	echo "<tr><td>Status Transaksi:</td><td>$result->status_transaksi</td></tr>";
	echo "</table>";
}
    ?>
</div>
</body>
</html>