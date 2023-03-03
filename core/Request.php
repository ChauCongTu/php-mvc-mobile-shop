<?php
class Request{
    private $__rules = [], $__message = [], $__errors = [];
    public $db;
    function __construct(){
        $this->db = new Database();
    }
    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function isPost(){
        if($this->getMethod() == 'post'){
            return true;
        }
        return false;
    }
    public function isGet(){
        if($this->getMethod() == 'get'){
            return true;
        }
        return false;
    }
    public function getFields(){
        $dataFields = [];
        if($this->isGet()){
            //Get data with get Method
            if(!empty($_GET)){
                foreach($_GET as $key => $values){
                    if(is_array($values)){
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);   
                    }
                    else{
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        if($this->isPost()){
            //Get data with get Method
            if(!empty($_POST)){
                foreach($_POST as $key => $values){
                    if(is_array($values)){
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);   
                    }
                    else{
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $dataFields;
    }
    //Set rules
    public function rules($rule = []){
        $this->__rules = $rule;
    }
    //Set message
    public function message($message = []){
        $this->__message = $message;
    }
    //Run validate
    public function validate(){
        $this->__rules = array_filter($this->__rules);

        $checkValidate = true;

        if(!empty($this->__rules)){
            $dataFields = $this->getFields();
            foreach($this->__rules as $fieldName=>$ruleItem){
                $ruleItemArr = explode('|', $ruleItem);
                foreach($ruleItemArr as $rules){

                    $ruleName = null;
                    $ruleValue = null;

                    $ruleArr = explode(':', $rules);
                    $ruleName = reset($ruleArr);
                    if(count($ruleArr) > 1){
                        $ruleValue = end($ruleArr);
                    }
                    if($ruleName == 'required'){
                        if(empty($dataFields[$fieldName])){
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == 'min'){
                        if(strlen($dataFields[$fieldName]) < $ruleValue){
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == 'max'){
                        if(strlen($dataFields[$fieldName]) > $ruleValue){
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == 'email'){
                        if(!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)){
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == 'match'){
                        if(trim($dataFields[$fieldName] != trim($dataFields[$ruleValue]))){
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == 'number'){
                        if(!is_numeric($dataFields[$fieldName])){
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == 'unique'){
                        $tableCheck = null;
                        $fieldCheck = null;

                        if(!empty($ruleArr[1])){
                            $tableCheck = $ruleArr[1];
                        }

                        if(!empty($ruleArr[2])){
                            $fieldCheck = $ruleArr[2];
                        }

                        if(!empty($tableCheck) && !empty($fieldCheck)){
                            $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableCheck WHERE $fieldCheck = '$dataFields[$fieldName]'")->rowCount();
                            if(!empty($checkExist)){
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                    }
                    //Callback validate
                    if(preg_match('~^callback_(.+)~is', $ruleName, $callbackArr)){
                        if(!empty($callbackArr[1])){
                            $callbackName = $callbackArr[1];
                            $controller = App::$app->getCurrentController();
                            if(method_exists($controller, $callbackName)){
                                $checkCallback = call_user_func_array([$controller, $callbackName], [trim($dataFields[$fieldName])]);
                                if(!$checkCallback){
                                    $this->setErrors($fieldName, $ruleName);
                                    $checkValidate = false;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $checkValidate;
    }
    //Get errors
    public function errors($fieldName = ''){
        if(!empty($this->__errors)){
            if(empty($fieldName)){
                $errorArr = [];
                foreach ($this->__errors as $key=>$error){
                    $errorArr[$key] = reset($error);
                }
                return $errorArr;
            }
            return reset($this->__errors[$fieldName]);
        }
        return false;
    }
    //Set Error
    public function setErrors($fieldName, $ruleName){
        $this->__errors[$fieldName][$ruleName] = $this->__message[$fieldName . '.' . $ruleName]; 
    }
}
?>