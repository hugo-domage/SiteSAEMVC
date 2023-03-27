<?php
final class Session
{

    public static function start(Array $A_params):void {
        $_SESSION['email'] = $A_params['email'];
        $_SESSION['status'] = $A_params['usertype'];
    }

    public static function check():bool {
        return (isset($_SESSION['id']) && isset($_SESSION['status']));
    }

    public static function getSession(): ?array {
        if (Session::check()) {
            return $_SESSION;
        }
        return null;
    }
    public static function destroy() : void{
        if (ini_get("session.use_cookies")) {
            $A_params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $A_params["path"],
                $A_params["domain"], $A_params["secure"], $A_params["httponly"]
            );
        }
        session_destroy();
    }
}
