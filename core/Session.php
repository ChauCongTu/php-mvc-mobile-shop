<?php
class Session{
    /**
     * data(key, values) => set session
     * data(key) => get session
     * 
     */
    static public function data($key, $values = ''){
        $sessionKey = self::isInvalid();
        if(!empty($values)){
            $_SESSION[$sessionKey][$key] = $values;
            return true;
        }
        else{
            if (empty($key)){
                if (isset($_SESSION[$sessionKey])){
                    return $_SESSION[$sessionKey];
                }
            }
            else {
                if(isset($_SESSION[$sessionKey][$key])){
                    return $_SESSION[$sessionKey][$key];
                }
            }
        }
    }
    /**
     * delete(key) => Delete session with key
     * delete() => Delete all session
     * 
     */
    static public function delete($key = ''){
        $sessionKey = self::isInvalid();
        if(!empty($values)){
            if(isset($_SESSION[$sessionKey][$key])){
                unset($_SESSION[$sessionKey][$key]);
                return true;
            }
            return false;
        }
        else{
            unset($_SESSION[$sessionKey]);
            return true;
        }
        return false;
    }
    static public function showError($mess){
        $data = ['message' => $mess];
        App::$app->loadError('exception', $data);
    }
    static public function isInvalid(){
        global $config;
        
        if(!empty($config['session'])){
            $sessionConfig = $config['session'];
            if(!empty($sessionConfig['session_key'])){
                $sessionKey = $sessionConfig['session_key'];
                return $sessionKey;
            }
            else{
                self::showError('Thiếu cấu hình Session_key, vui lòng kiểm tra lại!');
            }
        }
        else{
            self::showError('Thiếu cấu hình Session, vui lòng kiểm tra lại!');
        }
    }
}
