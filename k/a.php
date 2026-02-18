<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จุฬาลักษณ์ ลมดา (พลอย)</title>
</head>

<button class="btn-green" onclick="showImage('images/2.jpg')">Click</button>
    <button class="btn-orange" onclick="showImage('images/1.jpg')">Click</button>

    <div id="myModal" class="modal">
        <span class="close" onclick="closeImage()">&times; ปิดรูปภาพ</span>
        <img class="modal-content" id="imgFull">
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("imgFull");

        // ฟังก์ชันเปิดรูป
        function showImage(src) {
            modal.style.display = "block";
            modalImg.src = src;
        }

        // ฟังก์ชันปิดรูป (แล้วจะเห็นหน้าหลักเหมือนเดิม)
        function closeImage() {
            modal.style.display = "none";
        }

        // คลิกพื้นที่ว่างข้างนอกรูปเพื่อปิดก็ได้
        window.onclick = function(event) {
            if (event.target == modal) {
                closeImage();
            }
        }
    </script>

</body>
</html>

