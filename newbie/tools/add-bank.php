<?php
	require_once('session.php');
    $users = $u['user'];
    $image = $_POST['image'];
    if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/bca.webp'){
    	$akun = 'Bank Central Asia (BCA)';
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/bni.webp'){
    	$akun = 'Bank Negara Indonesia (BNI)';    	
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/bri.png'){
    	$akun = 'Bank Rakyat Indonesia (BRI)';    	
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/mandiri_color.webp'){
    	$akun = 'Bank Mandiri';    	
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/cimb.webp'){
    	$akun = 'Bank CIMB';    	
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/epayment/dana.webp'){
        $akun = 'E-Wallet DANA';     
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/epayment/ovo.webp'){
        $akun = 'E-Wallet OVO';     
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/epayment/gopay_color.webp'){
    	$akun = 'GOPAY';    	
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/shopeepay.webp'){
    	$akun = 'SHOPEEPAY';    	
    }
    else if($image == 'https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/epayment/linkaja.webp'){
    	$akun = 'LINKAJA';    	
    }
    $no_rek = $_POST['no_rek'];
    $pemilik = $_POST['pemilik'];
    $created_date = date('Y-m-d H:i:s');
    $query = mysqli_query($conn,"INSERT INTO `tb_bank` (`image`, `akun`, `no_rek`, `pemilik`, `status`,`userID`) VALUES ('$image', '$akun','$no_rek','$pemilik',1,1)") or die(mysqli_error());
    header('location:../rekening.php');
?>