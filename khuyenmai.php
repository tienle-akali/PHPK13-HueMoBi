<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ĐIỆN THOẠI HUẾ</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/ico/logohuemobi16x16.png">
    <link rel="stylesheet" href="assets/css/khuyenmai.css">
</head>

<body>
   
    
            <?php include 'header.php';?>
      
        <!--....................................header.........................................................-->
    <section>
        
            <div class="bannerkm"><img src="assets/img/banner/khuyenmai.png" alt="khuyến mãi"/></div>
            
                
                    <form action="#" method="post" name="comment"> 
                        <h3 class="binhluan">Bình luận</h3><br/>
                        <label>Tên của bạn:</label>
                        <input type="text" name="yourname" placeholder="hãy nhập tên của bạn" /><br><br>
                        <label>Địa chỉ email:</label>
                        <input type="text" name="email" placeholder="nhập địa chỉ email"/><br><br>
                        <label>Bình luận:</label>
                        <input type="text" name="comment" style="height:100px" placeholder="Viết bình luận vào đây"></textarea><br><br>
                        <button class="btn" type="submit" name="submit" >Gửi nhận xét</button>
                    </form>
               
                <!-- <div class="printcomment">
                    <p>Họ và tên</p>
                    <p>bình luận</p>
                </div> -->
            
       
        <!--..................................................conten..............................................-->
    </section>    
            <?php include 'footer.php';?>
        
        <!--..........................................footer....................................................-->
        
    
</body>
</html>