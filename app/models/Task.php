<?php
require_once 'Model.php';

class Task extends Model {
    public function all() {
        $stmt = $this->pdo->query("
            SELECT a.*, p.street_address AS property_address, u.full_name AS proposer_name
            FROM assessments a 
            JOIN properties p ON a.property_id = p.property_id 
            LEFT JOIN system_users u ON a.proposer_id = u.user_id 
            ORDER BY a.assessment_date DESC
        ");
        return $stmt->fetchAll();
    }

    public function create($propertyId, $assessmentDate, $assessedValue, $landValue, $improvementValue, $status = 'pending', $notes = null) {
        $stmt = $this->pdo->prepare("INSERT INTO assessments (property_id, assessment_date, assessed_value, land_value, improvement_value, proposer_id, status, assessor_notes) VALUES ($1, $2, $3, $4, $5, $6, $7, $8)");
        $success = $stmt->execute([$propertyId, $assessmentDate, $assessedValue, $landValue, $improvementValue, $this->currentUserId, $status, $notes]);
        if ($success) {
            $this->logAudit('CREATE', 'assessments', $this->pdo->lastInsertId(), "Created assessment");
        }
        return $success;
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT a.*, p.street_address AS property_address FROM assessments a JOIN properties p ON a.property_id = p.property_id WHERE a.assessment_id = $1");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $propertyId, $assessmentDate, $assessedValue, $landValue, $improvementValue, $status, $notes) {
        $stmt = $this->pdo->prepare("UPDATE assessments SET property_id = $1, assessment_date = $2, assessed_value = $3, land_value = $4, improvement_value = $5, status = $6, assessor_notes = $7 WHERE assessment_id = $8");
        $success = $stmt->execute([$propertyId, $assessmentDate, $assessedValue, $landValue, $improvementValue, $status, $notes, $id]);
        if ($success) {
            $this->logAudit('UPDATE', 'assessments', $id, "Updated assessment");
        }
        return $success;
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM assessments WHERE assessment_id = $1");
        $success = $stmt->execute([$id]);
        if ($success) {
            $this->logAudit('DELETE', 'assessments', $id, "Deleted assessment");
        }
        return $success;
    }

    public function allProperties() {
        $stmt = $this->pdo->query("SELECT property_id, parcel_number, street_address FROM properties ORDER BY street_address");
        return $stmt->fetchAll();
    }
}
