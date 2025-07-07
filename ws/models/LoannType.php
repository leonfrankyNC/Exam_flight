<?php
require_once __DIR__ . '/../db.php';

class LoanType {
    public static function getAll() {
        $db = getDB();
        $stmt = $db->query("SELECT * FROM loan_types");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM loan_types WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO loan_types (name, interest_rate, max_duration) VALUES (?, ?, ?)");
        $stmt->execute([$data->name, $data->interest_rate, $data->max_duration]);
        return $db->lastInsertId();
    }

    public static function update($id, $data) {
        $db = getDB();
        $stmt = $db->prepare("UPDATE loan_types SET name = ?, interest_rate = ?, max_duration = ? WHERE id = ?");
        $stmt->execute([$data->name, $data->interest_rate, $data->max_duration, $id]);
    }

    public static function delete($id) {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM loan_types WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>