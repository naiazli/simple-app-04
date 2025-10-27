<?php
abstract class Model {
    protected $pdo;
    protected $currentUserId;

    public function __construct($userId = null) {
        $host = 'localhost';
        $dbname = 'tasks_04';
        $user = 'postgres';
        $password = 'password';
        
        try {
            $dsn = "pgsql:host=$host;dbname=$dbname";
            $this->pdo = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        $this->currentUserId = $userId ?: $_SESSION['user_id'] ?? null;
    }

    public function getPdo() {
        return $this->pdo;
    }

    protected function logAudit($actionType, $tableName, $recordId = null, $details = null) {
        if (!$this->currentUserId) return;
        $stmt = $this->pdo->prepare("
            INSERT INTO audit_trail (user_id, action_type, table_name, record_id, details) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$this->currentUserId, $actionType, $tableName, $recordId, $details]);
    }
}
