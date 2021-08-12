<?php declare(strict_types=1); // strict requirement
class Semej {
    // function to check session start or not
    public static function checkSession() {
        try {
            if (session_id() == '') {
                session_start();
            }
        }catch(Exception $e){
            echo "Error in checkSession() --> ".(string)$e;
        }
    }
    // function to validate the inputs
    public static function validation(string $data) : string {
        try{
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            return $data;
        }catch(Exception $e){
            echo "Error in validation() --> ".(string)$e;
        }
    }
    // function to set status, title and message of an alert
    public static function set(string $status=null, string $title=null, string $message=null) {
        try{
            self::checkSession();
            $_SESSION['semej_lib_alerts_status'] = self::validation($status);
            $_SESSION['semej_lib_alerts_title']  = self::validation($title);
            $_SESSION['semej_lib_alerts_message']= self::validation($message);
            session_write_close();
        }catch(Exception $e){
            echo "Error in start() --> ".(string)$e;
        }
    }
    // function to print the status of alert 
    public static function status() {
        try {
            self::checkSession();
            if(isset( $_SESSION['semej_lib_alerts_status'])){
                echo  $_SESSION['semej_lib_alerts_status'];
            }
        }catch(Exception $e){
            echo "Error in status() --> ".(string)$e;
        }
    }
    // function to print the title of alert
    public static function title() {
        try{
            self::checkSession();
            if(isset( $_SESSION['semej_lib_alerts_title'])) {
                echo  $_SESSION['semej_lib_alerts_title'];
            }
        }catch(Exception $e){
            echo "Error in title() --> ".(string)$e;
        }
    }
    // function to print message of the alert
    public static function message() {
        try {
            self::checkSession();
            if (isset($_SESSION['semej_lib_alerts_message'])) {
                echo $_SESSION['semej_lib_alerts_message'];
            }
        }catch(Exception $e){
            echo "Error in message() --> ".(string)$e;
        }
    }
    // function to unset the all Sessions created by Semej
    public static function unset() {

        try {
            self::checkSession();
            $_SESSION['semej_lib_alerts_status'] = null;
            $_SESSION['semej_lib_alerts_title']  = null;
            $_SESSION['semej_lib_alerts_message']= null;
            unset($_SESSION['semej_lib_alerts_status']);
            unset($_SESSION['semej_lib_alerts_title']);
            unset($_SESSION['semej_lib_alerts_message']);
            session_write_close();
        }catch(Exception $e){
            echo "Error in end() --> ".(string)$e;
        }
    }
    // function to show the full alert using bootstrap classes
    public static function show() {
        try {
            self::checkSession();
            if (isset($_SESSION['semej_lib_alerts_message']) && isset($_SESSION['semej_lib_alerts_title']) && isset($_SESSION['semej_lib_alerts_status'])) {
                $semej_alert_box = '
            <div class="alert alert-'.$_SESSION['semej_lib_alerts_status'].' alert-dismissible fade show" role="alert">
                <strong>'.$_SESSION['semej_lib_alerts_title'].'</strong> '.$_SESSION['semej_lib_alerts_message'].'
            </div>
            ';
                echo $semej_alert_box;
            }
                self::unset();
            
        }catch(Exception $e){
            echo "Error in show() --> ".(string)$e;
        }
    }
}