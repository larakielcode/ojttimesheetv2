<?php
declare(strict_types=1);

namespace App\Core;

final class Session
{
    private function __construct()
    {
    }

    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            ini_set('session.cookie_httponly', '1');
            ini_set('session.use_only_cookies', '1');
            ini_set('session.cookie_samesite', 'Strict');

            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                ini_set('session.cookie_secure', '1');
            }

            session_start();
        }
    }

    public static function authenticate(int $users_id, string $email, string $role): void
    {
        self::checkSessionStatus();
        session_regenerate_id(true);

        self::set('logged_on_user', [
            'users_id' => $users_id,
            'email' => $email,
            'role' => $role,
            'last_login_time' => time()
        ]);
        self::set('is_logged', true);
    }

    public static function set(string $key, mixed $value): void
    {
        self::checkSessionStatus();
        $_SESSION[$key] = $value;
    }

    public static function destroy(): void
    {
        self::start();
        if (session_status() !== PHP_SESSION_NONE) {
            session_unset();
            if (ini_get('session.use_cookies')) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000,
                    $params['path'],
                    $params['domain'],
                    $params['secure'],
                    $params['httponly']
                );
            }
        }
        session_destroy();
    }

    public static function checkSessionStatus(): void
    {
        if (session_status() !== PHP_SESSION_NONE) {
            self::start();
        }
    }
}
