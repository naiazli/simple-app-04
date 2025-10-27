<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();
            $user = $userModel->findByUsername($_POST['username']);
            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role_name'];
                header('Location: /?controller=dashboard&action=index');
                exit;
            } else {
                $error = 'Salah - Tak Betul username or password';
            }
        }
        require __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /');
        exit;
    }
}
