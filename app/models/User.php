<?php
require_once 'Model.php';

class User extends Model {
    public function findByUsername($username) {
        $stmt = $this->pdo->prepare("
            SELECT 	system_users.user_id,
			system_users.role_id,
			system_users.username,
                   	system_users.password,
			system_users.full_name,
			system_users.email,
                   	system_users.phone_number,
			system_users.is_active,
			system_users.created_at,
                   	roles.role_name

            FROM system_users

            INNER JOIN roles ON system_users.role_id = roles.role_id

            WHERE system_users.username = ? AND system_users.is_active = true
        ");

        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function create($roleId, $username, $password, $fullName, $email, $phoneNumber = null) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("
            INSERT INTO system_users (role_id, username, password, full_name, email, phone_number, is_active, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, true, NOW())
        ");
        $success = $stmt->execute([$roleId, $username, $hashed_password, $fullName, $email, $phoneNumber]);
        if ($success) {
            $this->logAudit('CREATE', 'system_users', $this->pdo->lastInsertId(), "Created user: $username");
        }
        return $success;
    }

    public function all() {
        $stmt = $this->pdo->query("
            SELECT system_users.user_id, system_users.role_id, system_users.username, 
                   system_users.password, system_users.full_name, system_users.email, 
                   system_users.phone_number, system_users.is_active, system_users.created_at, 
                   roles.role_name 
            FROM system_users 
            INNER JOIN roles ON system_users.role_id = roles.role_id 
            ORDER BY system_users.created_at DESC
        ");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("
            SELECT system_users.user_id, system_users.role_id, system_users.username, 
                   system_users.password, system_users.full_name, system_users.email, 
                   system_users.phone_number, system_users.is_active, system_users.created_at, 
                   roles.role_name 
            FROM system_users 
            INNER JOIN roles ON system_users.role_id = roles.role_id 
            WHERE system_users.user_id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $roleId, $username, $password, $fullName, $email, $phoneNumber = null, $isActive = true) {
        if ($password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("
                UPDATE system_users 
                SET role_id = ?, username = ?, password = ?, full_name = ?, email = ?, 
                    phone_number = ?, is_active = ? 
                WHERE user_id = ?
            ");
            $success = $stmt->execute([$roleId, $username, $hashed_password, $fullName, $email, $phoneNumber, $isActive, $id]);
        } else {
            $stmt = $this->pdo->prepare("
                UPDATE system_users 
                SET role_id = ?, username = ?, full_name = ?, email = ?, phone_number = ?, is_active = ? 
                WHERE user_id = ?
            ");
            $success = $stmt->execute([$roleId, $username, $fullName, $email, $phoneNumber, $isActive, $id]);
        }
        if ($success) {
            $this->logAudit('UPDATE', 'system_users', $id, "Updated user: $username");
        }
        return $success;
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM system_users WHERE user_id = ?");
        $success = $stmt->execute([$id]);
        if ($success) {
            $this->logAudit('DELETE', 'system_users', $id, "Deleted user ID: $id");
        }
        return $success;
    }

    public function allRoles() {
        $stmt = $this->pdo->query("SELECT role_id, role_name, role_description FROM roles ORDER BY role_name");
        return $stmt->fetchAll();
    }

    public function getPdo() {
        return $this->pdo;
    }
}
