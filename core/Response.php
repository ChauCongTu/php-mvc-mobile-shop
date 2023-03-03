<?php
class Response{
    public function redirect($uri = ''){
        if(preg_match('~^(http|https)~is', $uri)){
            $url = $uri;    
        }
        else{
            $url = '/' . $uri;
        }
        header("Location: " . $url);
        exit;
    }
}
?>