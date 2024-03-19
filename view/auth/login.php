
<div class="container_login">
    <div class="box_login">
         <div class="title_login">
        <a href="#"><button class="box_dangnhap">ĐĂNG NHẬP</button></a>
        <a href="index.php?act=register"><button class="box_dangky">ĐĂNG KÝ </button></a>
            </div>
        <div class="formtaikhoan">
       <form action="index.php?act=login" method="post">
            <input type="text" class="login" name="user" placeholder="Tên đăng nhập.." required> <br>
            <input type="password" class="login" name="pass" id="" placeholder="Pass.." required> <br>
            <input type="submit" class="button_submit" value="ĐĂNG NHẬP" name="dangnhap">
        <div class="user-foot">
                    <a href="index.php?act=forgot-password" class="clearfix">Quên mật khẩu?</a>
                    <p class="clearfix">Hoặc đăng nhập với</p>
                    <div class="loginwith">
                    <li class="loginFb">
                        <span>
                            <i class="fa-brands fa-facebook-f"></i>
                        </span>
                        <a href="#">Đăng nhập bằng Facebook</a>
                    </li>
                    <li class="loginGg">
                        <span>
                        <i class="fa-brands fa-google"></i>
                        </span>
                        <a href="#">Đăng nhập bằng Google</a>
                    </li>
                    </div>
        </div>
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
