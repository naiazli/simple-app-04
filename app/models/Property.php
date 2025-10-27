<?php
require_once 'Model.php';

class Property extends Model {
    public function all() {
        $stmt = $this->pdo->query("
            SELECT p.*, CONCAT(o.first_name, ' ', o.last_name) AS owner_name, o.email AS owner_email
            FROM properties p 
            JOIN owners o ON p.owner_id = o.owner_id 
            ORDER BY p.property_id DESC
        ");
        return $stmt->fetchAll();
    }

    public function create($ownerData, $propertyData) {
        $stmt = $this->pdo->prepare("INSERT INTO owners (first_name, last_name, mailing_address, city, state_province, postal_code, email, phone_number) VALUES ($1, $2, $3, $4, $5, $6, $7, $8)");
        $stmt->execute($ownerData);
        $ownerId = $this->pdo->lastInsertId();
        $this->logAudit('CREATE', 'owners', $ownerId, "Created owner");

        $propertyFullData = array_merge([$ownerId], $propertyData);
        $stmt = $this->pdo->prepare("INSERT INTO properties (owner_id, street_address, city, state_province, postal_code, property_type, parcel_number, legal_description, square_footage, year_built) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)");
        $success = $stmt->execute($propertyFullData);
        if ($success) {
            $propertyId = $this->pdo->lastInsertId();
            $this->logAudit('CREATE', 'properties', $propertyId, "Created property");
        }
        return $success;
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("
            SELECT p.*, o.first_name, o.last_name, o.mailing_address, o.city AS owner_city, 
            o.state_province AS owner_state_province, o.postal_code AS owner_postal_code, o.email, o.phone_number
            FROM properties p JOIN owners o ON p.owner_id = o.owner_id WHERE p.property_id = $1
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $ownerData, $propertyData) {
        $ownerIdStmt = $this->pdo->prepare("SELECT owner_id FROM properties WHERE property_id = $1");
        $ownerIdStmt->execute([$id]);
        $ownerId = $ownerIdStmt->fetchColumn();
        
        $ownerStmt = $this->pdo->prepare("UPDATE owners SET first_name = $1, last_name = $2, mailing_address = $3, city = $4, state_province = $5, postal_code = $6, email = $7, phone_number = $8 WHERE owner_id = $9");
        $ownerSuccess = $ownerStmt->execute(array_merge($ownerData, [$ownerId]));

        $propertyStmt = $this->pdo->prepare("UPDATE properties SET street_address = $1, city = $2, state_province = $3, postal_code = $4, property_type = $5, parcel_number = $6, legal_description = $7, square_footage = $8, year_built = $9 WHERE property_id = $10");
        $propertySuccess = $propertyStmt->execute(array_merge($propertyData, [$id]));

        if ($ownerSuccess && $propertySuccess) {
            $this->logAudit('UPDATE', 'properties', $id, "Updated property");
        }
        return $propertySuccess;
    }

    public function delete($id) {
        $ownerIdStmt = $this->pdo->prepare("SELECT owner_id FROM properties WHERE property_id = $1");
        $ownerIdStmt->execute([$id]);
        $ownerId = $ownerIdStmt->fetchColumn();
        
        $stmt = $this->pdo->prepare("DELETE FROM properties WHERE property_id = $1");
        $success = $stmt->execute([$id]);
        if ($success) {
            $this->pdo->prepare("DELETE FROM owners WHERE owner_id = $1")->execute([$ownerId]);
            $this->logAudit('DELETE', 'properties', $id, "Deleted property and owner");
        }
        return $success;
    }
}
