<br>
<div class="container">
    <?php
    $totalMoney = 0;
    if ($cart == null) {
    ?>
        <div class="panel p-3">
            <span class="text-danger">
                <p>Bạn không có sản phẩm trong giỏ hàng.</p>
                <p>Click <a href="/" class="text-danger">vào đây</a> để tiếp tục mua sắm</p>
            </span>
        </div>
    <?php
    } else {
    ?>
        <div class="row">
            <div class="col-sm-8">
                <div class="cart-title">Giỏ hàng</div>
                <div class="cart-body">
                    <?php 
                        foreach ($cart as $value) {
                            $totalMoney += $value['total'];
                            echo '<div class="cart-item">
                                    <div class="item-img">
                                        <img src="'.$value['photo'].'">
                                    </div>
                                    <div class="item-info">
                                        <div class="item-info-name">
                                            <span><a href="" class="item-link">'.$value['name'].'</a></span>
                                            <div class="item-ammout"><a href="/Cart/DecreaseAmount/'.$value['product_id'].'" class="item-link">-</a> '.$value['amount'].' <a href="/Cart/IncreaseAmount/'.$value['product_id'].'" class="item-link">+</a></div>
                                        </div>
                                        <div class="item-info-price">
                                            <span>'.currency_format($value['total']).'</span>
                                        </div>
                                    </div>
                                    <div class="item-delete">
                                        <a href="/Cart/RemoveItem/'.$value['product_id'].'">Xóa</a>
                                    </div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="cart-title">Tạm tính</div>
                <div class="cart-body">
                    <div class="checkout-line">
                        <div class="checkout-line-title"><span>Tiền hàng</span></div>
                        <div class="checkout-line-content"><span><?php echo currency_format($totalMoney); ?></span></div>
                    </div>
                    <div class="checkout-line">
                        <div class="checkout-line-title"><span>Phí vận chuyển</span></div>
                        <div class="checkout-line-content"><span>0đ</span></div>
                    </div>
                    <hr>
                    <div class="checkout-line">
                        <div class="checkout-line-title"><span>Tổng cộng</span></div>
                        <div class="checkout-line-content-special"><span><?php echo currency_format($totalMoney); ?></span></div>
                    </div>
                    <div class="cart-action">
                        <a href="/" class="btn btn-light">Tiếp tục mua hàng</a>
                        <a href="/" class="btn btn-danger">Tiến hành đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>