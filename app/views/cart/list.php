<br>
<div class="container panel">
    <div class="pane">
        <div class="pane-header"><i class="fa-solid fa-gears"></i> Tùy chỉnh</div>
        <div class="pane-body">
            <div class="pane-item">
                <a href=""><i class="fa-solid fa-arrow-right"></i> Các đơn hàng đang xử lý</a>
            </div>
            <div class="pane-item">
                <a href=""><i class="fa-solid fa-arrow-right"></i> Các đơn hàng đã xử lý</a>
            </div>
        </div>
    </div>
</div>
<div class="container panel mt-2">
    <div class="pane">
        <div class="pane-header"><i class="fa-solid fa-file-contract"></i> Hóa đơn của bạn</div>
        <div class="pane-body">
            <a href="/tao-don-hang/<?php echo $users_id; ?>"><i class="fa-solid fa-plus"></i> Tạo đơn hàng mới</a>
            <hr>
            <?php
                $i = 1;
                foreach($cart as $value){
                    echo'<div class="pane-item">
                            <div class="item-name"><a href="/don-hang/'.$value['cart_id'].'"> '.$i.'. Đơn đặt hàng #'.$value['cart_id'].'</a></div>';
                            if ($value['status'] == 0){
                                echo'<div class="item-status text-primary">- Đang mua sắm</div>
                                    <div class="item-delete"><a href="">Hủy</a></div>';
                            }
                            else if($value['status'] == 1){
                                echo'<div class="item-status text-success">- Đang xử lý</div>
                                    <div class="item-delete"><a href="">Xóa</a></div>';
                            }
                            else if($value['status'] == 2){
                                echo'<div class="item-status text-success">- Đã xử lý</div>
                                    <div class="item-delete"><a href="">Xóa</a></div>';
                            }
                            else{
                                echo'<div class="item-status text-danger">- Đã hủy</div>
                                    <div class="item-delete"><a href="">Xóa</a></div>';
                            }
                            $i++;
                    echo'</div><hr>';
                }
            ?>
        </div>
    </div>
</div>