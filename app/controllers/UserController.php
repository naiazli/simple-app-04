<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $user_model;

    public function __construct() {
        $this->user_model = new User($_SESSION['user_id']);
    }

    public function index() {
        $users = $this->user_model->all();
        $page_title = 'Users CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/users/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create() {
        $roles = $this->user_model->all_roles();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user_model->create($_POST['role_id'], $_POST['username'], $_POST['password'], $_POST['full_name'], $_POST['email'], $_POST['phone_number'] ?? null);
            header('Location: /?controller=user&action=index');
            exit;
        }
        $page_title = 'Users CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/users/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function edit($id) {
        $roles = $this->user_model->all_roles();
        $user = $this->user_model->find($id);
        if (!$user) {
            header('Location: /?controller=user&action=index');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user_model->update($id, $_POST['role_id'], $_POST['username'], $_POST['password'] ?? '', $_POST['full_name'], $_POST['email'], $_POST['phone_number'] ?? null, $_POST['is_active'] ?? 1);
            header('Location: /?controller=user&action=index');
            exit;
        }
        $page_title = 'Users CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/users/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function delete($id) {
        $this->user_model->delete($id);
        header('Location: /?controller=user&action=index');
        exit;
    }
}
