<?php
	$name = $_POST['name'];
	$orders = $_POST['orders'];
	$address = $_POST['address'];
    $email = $_POST['email'];
    $p_no = $_POST['p_no'];

	
	$conn = new mysqli('localhost','root','','food website');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into restaurant(name, orders, address, email, p_no) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $name, $orders, $address, $email, $p_no);
		$stmt->execute();
		header("Location: orderSuccessful.html");
		$stmt->close();
		$conn->close();
	}
?>
