<br>
<div class="container">
    <div class="cart">
        <div class="cart-left panel">
            <div class="cart-header">Danh sách sản phẩm</div>
            <div class="cart-count">
                Bạn đang có <strong><?php echo count($cart['detail']); ?></strong> sản phẩm trong giỏ hàng
            </div>
            <div class="cart-body">
                <?php
                foreach ($cart['detail'] as $value) {
                    echo '<div class="cart-product">
                            <div class="cart-product-img">
                                <img src="' . $value['product']['thumb']['img'] . '">
                            </div>
                            <div class="cart-product-name">
                                ' . $value['product']['name'] . '
                                <br>
                                [<a href="/' . $value['product']['slug_product'] . '_' . $value['product']['product_id'] . '" class="link-detail"> Xem chi tiết </a>]
                                <br>
                                <small>Số lượng: ' . $value['quanlity'] . '</small>
                            </div>';
                        if(isset($value['product']['discount']) && date('Y-m-d H:i:s') <= $value['product']['discount']['end_discount']){
                            echo'<div class="cart-product-price">
                                        '.currency_format($value['product']['discount']['sale_price']).' <a href="?del_id='.$value['product']['product_id'].'" class="text-danger"><i class="fa-solid fa-trash-can"></i></a>
                                        <br>
                                        <small class="text-dark"><del>'.currency_format($value['product']['origin_price']).'</del></small>
                                    </div>';
                                
                        }
                        else{
                            echo'<div class="cart-product-price">
                                        '.currency_format($value['product']['origin_price']).' <a href="?del_id='.$value['product']['product_id'].'" class="text-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>';
                        }
                        echo'</div>';
                }
                ?>
            </div>
        </div>
        <div class="cart-right panel">
            <div class="cart-header">Xác nhận đơn hàng</div>
            <div class="cart-body">
                <form action="" method="post">
                    <div class="cart-line">
                        <span class="cart-label">Họ tên: </span>
                        <input type="text" class="form-control" name="txtName" id="txtName" value="<?php echo $cart['user']['fullname'] ?>">
                    </div>
                    <div class="cart-line">
                        <span class="cart-label">Số điện thoại: </span>
                        <input type="text" class="form-control" name="txtPhone" id="txtPhone" value="+84.<?php echo $cart['user']['phone'] ?>">
                    </div>

                    <div class="cart-line">
                        <span class="cart-label">Giới tính: </span>
                        <select class="form-select" id="gender" name="gender">
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>
                    <div class="cart-line" id="nhan-hang">
                        <span class="cart-label">Địa chỉ nhận hàng: </span>
                        <textarea type="text" class="form-control" rows="5" name="address"><?php echo $cart['user']['address']; ?></textarea>
                    </div>
                    <div class="cart-line">
                        <span class="cart-label">Hình thức nhận hàng: </span>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="1" name="radDelively" value="option1" checked> Nhận tại siêu thị
                            <label class="form-check-label" for="1"></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="2" name="radDelively" value="option2"> Nhận hàng tại nhà
                            <label class="form-check-label" for="2"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="code">Nhập mã khuyến mãi (Nếu có):</label>
                        <div class="promo-code">
                            <div class="input-promo-code">
                                <input type="text" class="form-control mt-2" name="promo-code">
                            </div>
                            <div class="button-promo-code">
                                <a href="" class="btn btn-danger mt-2">Áp dụng</a>
                            </div>
                        </div>
                    </div>
                    <div class="cart-confirm">
                        <div class="cart-total">Tổng tiền: <span class="cart-total-value"><?php echo currency_format($cart['total']);?></span></div>
                        <button class="cart-submit">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>