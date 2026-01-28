<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010914045 จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>

<body>
<h1>66010914045 จุฬาลักษณ์ ลมดา (พลอย)</h1>

<form method = "post" action = "">
    กรอกตัวเลข <input type = "number" min = "0" max = "100" name = "a" autofocus require>
    <button type = "submit" name = "Submit">OK</button>
</form>
<hr>


<?php
if(isset($_POST['Submit'])){
    if ($score >= 80) {
    $grade = "A" ;
    } else if ($score >= 70) {
    $grade = "B" ;
    } else if ($score >= 60) {
    $grade = "C" ;
    } else if ($score >= 50) {
    $grade = "D" ;
    } else {
    $grade = "F" ;
    }
    echo "คะแนน $score ได้เกรด $grade" ;
}
?>

</body>
</html>
