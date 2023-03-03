<?php
class Route{
    public function handleRoute($url){
        global $routes;
        unset($routes['default_controller']);
        unset($routes['default_actions']);

        $url = trim($url, '/');
        
        if(empty($url)){
            $url = "/";
        }

        $handleUrl = $url;
        if(isset($routes)){
            foreach($routes as $key=>$values){
                if(preg_match('~'.$key.'~is', $url)){
                    $handleUrl = preg_replace('~'.$key.'~is', $values, $url);
                }
            }
        }
        return $handleUrl;
    }
}
?>