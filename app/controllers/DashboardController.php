<?php
// session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Property.php';
require_once __DIR__ . '/../models/Task.php';

class DashboardController {
    public function index() {
        $userModel = new User();
        $propertyModel = new Property();
        $taskModel = new Task();
        
        $user_count = count($userModel->all());
        $property_count = count($propertyModel->all());
        $task_count = count($taskModel->all());
        
        // FIX: Use PUBLIC getPdo() method
        $pdo = $userModel->getPdo();
        
        // PostgreSQL COUNT queries
        $due_reassessments = $pdo->query("SELECT COUNT(*) FROM reassessment_due_view")->fetchColumn();
        $outstanding_taxes = $pdo->query("SELECT COUNT(*) FROM outstanding_tax_view")->fetchColumn();
        
        $page_title = 'Dashboard';
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/layouts/content_header.php';
        require __DIR__ . '/../views/dashboard.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }
}
