<?php
    $data = [
        '1' => 'a',
        '2' => 'b',
        '3' => 'c',
        '4' => 'd',
        '5' => 'e',
        '6' => 'f',
        '7' => 'g',
    ];
?>

<pre>
    <?php echo print_r($data); ?>
</pre>
    <?php 
        for ($i = 1; $i <= 7; $i++){
            unset($data[$i]);
            echo '<pre>';
            echo print_r($data);
            echo '</pre>';
        }
    ?>
