<!-- Thanh toán -->
<main class="page-container">
    <div class="page-wrapper">
        <div class="home-page-container">
            <h1 class="title-user">Thanh toán</h1>
            <div class="checkout-page">
                <div class="form-container checkout-page-form">
                    <h2 class="title-user">Thông tin giao hàng</h2>
                    <form action="index.php?req=profile-edit" class="form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id ?>" />
                        <div class="row">
                            <input class="input" type="text" name="username" id="username" placeholder="Họ tên" value="" />
                        </div>
                        <div class="row">
                            <input class="input" type="email" name="email" id="email" placeholder="Email" value="" />
                        </div>
                        <div class="row">
                            <input class="input" type="text" name="address" id="address" placeholder="Địa chỉ chi tiết" value="" />
                        </div>
                        <div class="row">
                            <input class="input" type="text" name="phone" id="phone" placeholder="Số điện thoại" value="" />
                        </div>
                        <div class="row">
                            <textarea class="input" type="text" name="note" id="note" cols="30" rows="10" placeholder="Ghi chú" ></textarea>
                        </div>
                        <div class="form-group-button">
                            <input name="submit" class="btn" type="submit" value="Cập nhật" />
                            <a class="btn" href="index.php?req=profile">Quay lại</a>
                        </div>
                    </form>
                </div>
                <div class="order-form">
                    <h2 class="title-user order-title">Đơn hàng của bạn</h2>
                    <div class="grand-total order-content">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title">Tổng số giỏ hàng</h4>
                        </div>
                        <h5>Món ăn của bạn 💝</h5>
                        <div class="item-cart-product">
                            <div class="item-image-order">
                                <img src="https://picsum.photos/200/300" alt="Sản phẩm giỏ hàng" width="40px" height="40px">
                            </div>
                            <div class="item-name-order">
                                <p>Lẩu Thái Hải Sản - Lẩu Nhỏ (Gồm Nước Cốt Lẩu)</p>
                            </div>
                            <div class="item-quantity-order">x1</div>
                            <div class="item-price-order">200000</div>
                        </div>
                        <div class="item-cart-product">
                            <div class="item-image-order">
                                <img src="https://picsum.photos/200/300" alt="Sản phẩm giỏ hàng" width="40px" height="40px">
                            </div>
                            <div class="item-name-order">
                                <p>Lẩu Thái Hải Sản - Lẩu Nhỏ (Gồm Nước Cốt Lẩu)</p>
                            </div>
                            <div class="item-quantity-order">x1</div>
                            <div class="item-price-order">200000</div>
                        </div>
                        <h5>Giá gốc: <span>
                                50000
                            </span></h5>
                        <h4 class="grand-total-title">Tổng cộng: <span>
                                200000
                            </span></h4>
                        <a href="index.php?req=checkout">Tiến hành đặt hàng</a>
                    </div>
                </div>
            </div>
            <div class="radio-list">
                <div class="radio-item">
                    <input type="radio" name="pay-method" id="pay-method-1" value="1">
                    <label for="pay-method-1">Thanh toán khi nhận hàng (COD)</label>
                </div>
                <div class="radio-item">
                    <input type="radio" name="pay-method" id="pay-method-2" value="2">
                    <label for="pay-method-2">Thanh toán trực tuyến</label>
                </div>
            </div>
        </div>
    </div>
</main>