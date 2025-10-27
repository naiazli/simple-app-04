<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}
require_once __DIR__ . '/../models/Task.php';

class TaskController {
    private $task_model;

    public function __construct() {
        $this->task_model = new Task($_SESSION['user_id']);
    }

    public function index() {
        $tasks = $this->task_model->all();
        $page_title = 'Tasks CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/tasks/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create() {
        $properties = $this->task_model->all_properties();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->task_model->create($_POST['property_id'], $_POST['assessment_date'], $_POST['assessed_value'], $_POST['land_value'], $_POST['improvement_value'], $_POST['status'], $_POST['assessor_notes']);
            header('Location: /?controller=task&action=index');
            exit;
        }
        $page_title = 'Tasks CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/tasks/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function edit($id) {
        $properties = $this->task_model->all_properties();
        $task = $this->task_model->find($id);
        if (!$task) {
            header('Location: /?controller=task&action=index');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->task_model->update($id, $_POST['property_id'], $_POST['assessment_date'], $_POST['assessed_value'], $_POST['land_value'], $_POST['improvement_value'], $_POST['status'], $_POST['assessor_notes']);
            header('Location: /?controller=task&action=index');
            exit;
        }
        $page_title = 'Tasks CRUD';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/tasks/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function delete($id) {
        $this->task_model->delete($id);
        header('Location: /?controller=task&action=index');
        exit;
    }
}
