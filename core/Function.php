<?php
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
if (!function_exists('current_url')) {
    function current_url() {
        return "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
}
if (!function_exists('displayTime')) {
    function displayTime($postTime = '2022-09-10 09:30:00') {
        // Chuyển đổi chuỗi thời gian thành timestamp
        $postTimestamp = strtotime($postTime);
        // Thời gian hiện tại
        $nowTimestamp = time();
        // Khoảng thời gian giữa hai thời điểm tính bằng giây
        $timeDiff = $nowTimestamp - $postTimestamp;
        // Xác định khoảng thời gian hiển thị
        if ($timeDiff < 60) { // Khoảng thời gian nhỏ hơn 1 phút
            $displayTime = "vừa xong";
        } elseif ($timeDiff < 3600) { // Khoảng thời gian nhỏ hơn 1 giờ
            $minutesAgo = floor($timeDiff / 60);
            $displayTime = $minutesAgo . " phút trước";
        } elseif ($timeDiff < 86400) { // Khoảng thời gian nhỏ hơn 1 ngày
            $hoursAgo = floor($timeDiff / 3600);
            $displayTime = $hoursAgo . " giờ trước";
        } elseif ($timeDiff < 604800) { // Khoảng thời gian nhỏ hơn 1 tuần
            $daysAgo = floor($timeDiff / 86400);
            $displayTime = $daysAgo . " ngày trước";
        } else { // Khoảng thời gian lớn hơn hoặc bằng 1 tuần
            $displayTime = date("d/m/Y", $postTimestamp);
        }
        return $displayTime; // Output: "1 ngày trước" 
    }
}

?>