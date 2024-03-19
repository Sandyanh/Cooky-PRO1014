
<div class="container_login">
    <div class="box_login2">
         <div class="title_login">
        <a href="index.php?act=login"><button class="box_dangnhap2">ĐĂNG NHẬP</button></a>
        <a href="index.php?act=register"><button class="box_dangky2">ĐĂNG KÝ </button></a>
            </div>
        <div class="formtaikhoan">
       <form action="index.php?act=register" method="post">
            <input type="email" class="login_user" name="email" placeholder="Email.." required> <br>
            <input type="text" class="login_user" name="user" placeholder="Tên đăng nhập.." required> <br>
            <input type="password" class="login_user" name="pass" id="" placeholder="Pass.." required> <br>
            <input type="submit" class="button_submit" value="ĐĂNG KÝ" name="dangky">
       </form>
       </div>
       <h2 class="thongbao">
       <?php 
       if(isset($thongbao)&&($thongbao !="")){
        echo $thongbao;
       }
       ?>
       </h2>
    </div>
    </div>
