<?php
	session_start();
	
	unset($_SESSION['aid']) ;
	unset($_SESSION['aname']) ; // ตรงนี้ถูกต้องแล้ว (ถ้าแก้ index.php ตามข้างบน)
	
    echo"<script>" ;
    echo "window.location='index.php';";
    echo "</script>";
?>