<?
   $url = 'https://www.google.com/recaptcha/api/siteverify?secret=6Lf9ga4ZAAAAAML2X5rNfW4xv0V1Z9jtpIFhAL_g&response='.$_POST['g-recaptcha-response'];
   $flag = json_decode(file_get_contents($url));
   if (!$flag->success) {
      // 예외처리 
      echo "<script> alert('인증에 실패하였습니다.'); 
      location='login.php';
      </script>";
      exit;
   }
   $id=$_POST['id'];
   $password=$_POST['password'];
   $fix=$_POST['fix'];
   $phone=$_POST['phone'];
   $zip=$_POST['zip'];
   $addr=$_POST['addr'];
   $addr_detail=$_POST['addr_detail'];

   $dbi_conn=mysqli_connect("l.bsks.ac.kr","p201606010","pp201606010","p201606010");
   $query="insert into up";
   $query=$query."(id, password, fix, phone, zip, addr, addr_detail)";
   $query.="values ";
   $query.="('$id', '$password','$fix', '$phone', '$zip', '$addr', '$addr_detail')";
   $db_ok=mysqli_query($dbi_conn, $query) or die("$query 쿼리가 틀렸어요".mysqli_error($dbi_conn));

   if ($db_ok) {
      echo "<script> alert('정상으로 가입되었습니다.'); 
        location='login.php';
      </script>";
   }
   mysqli_close($dbi_conn);
?>