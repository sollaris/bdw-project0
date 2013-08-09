<?php
	require_once('../include/helper.php');
	
	$xml=simplexml_load_file('../model/menu.xml');
		$storenameT = $xml->xpath('/store/name');
		$storename = $storenameT[0];
		$sections = $xml->xpath('//section');
		$address = $xml->xpath("/store/contact/address/*");

	setlocale(LC_MONETARY, 'en_US');
	
	if (isset($_GET['page']))
		$page = $_GET['page'];
	else
		$page = 'home';

	switch ($page)
	{
		case 'home':
			render('template/header', array('storename' => $storename, 'pagetitle' => '-'));
			render('template/side', array('sections' => $sections));
			render('home');
			render('template/footer', array('address' => $address));
		break;
		
		case 'menu':
			if(isset($_GET['name']))
			{
				$sectionname=htmlspecialchars($_GET['name']);
				if (!count($xml->xpath("//section[@name='$sectionname']")))
					redirect("homepage");
				$items=$xml->xpath("//section[@name='$sectionname']/item");
					
				render('template/header', array('storename' => $storename, 'pagetitle' => $sectionname));
				render('template/side', array('sections' => $sections));
				render('menu', array('sectionname' => $sectionname, 'items' => $items));
				render('template/footer', array('address' => $address));
			}
			else
			{
				redirect("home");
			}
		break;
		
		case 'cart':
			session_start();
			$cart = isset($_SESSION["cart"])?$_SESSION["cart"]:false;
	
			render('template/header', array('storename' => $storename, 'pagetitle' => 'My Cart'));
			render('template/side', array('sections' => $sections));
			render('cart', array('cart' => $cart));
			render('template/footer', array('address' => $address));
		break;
		
		case 'add2cart':
		    session_start();
			if(empty($_POST["order"]) || empty($_POST["qty"]))
				goback();
			$order=$_POST["order"];
			$qty=$_POST["qty"];
			if (isset($_SESSION["cart"][$order]))
				$_SESSION["cart"][$order] += $qty;
			else
			    $_SESSION["cart"][$order] = $qty;
			redirect("cart");
		break;
		
		case 'delete':
		    session_start();
		    if (isset($_POST["order"]))
		        $order=$_POST["order"];
		    unset($_SESSION['cart'][$order]);
		    redirect("cart");
		break;
		
		case 'clear':
			session_start();
			unset($_SESSION['cart']);
			session_destroy();    
			redirect("cart");
		break;
		
		case 'checkout':
			session_start();
			unset($_SESSION['cart']);
			session_destroy();    
			redirect("home");
		break;
	}
?>
