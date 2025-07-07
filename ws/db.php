<?php
require_once __DIR__ . '/../db.php';

class Fund {
    public static function add($amount, $description) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO establishment_funds (amount, description) VALUES (?, ?)");
        $stmt->execute([$amount, $description]);
        return $db->lastInsertId();
    }

    public static function getAll() {
        $db = getDB();
        $stmt = $db->query("SELECT * FROM establishment_funds ORDER BY transaction_date DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getBalance() {
        $db = getDB();
        $stmt = $db->query("SELECT SUM(amount) as balance FROM establishment_funds");
        return $stmt->fetch(PDO::FETCH_ASSOC)['balance'] ?? 0;
    }
}
?>