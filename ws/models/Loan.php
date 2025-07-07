<?php
require_once __DIR__ . '/../models/Fund.php';
require_once __DIR__ . '/../models/LoanType.php';
require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/Loan.php';

class FinancialController {
    public static function addFund() {
        $data = Flight::request()->data;
        if ($data->amount <= 0) {
            Flight::json(['error' => 'Montant invalide'], 400);
            return;
        }
        $id = Fund::add($data->amount, $data->description);
        Flight::json(['message' => 'Fonds ajouté', 'id' => $id]);
    }

    public static function getFunds() {
        $funds = Fund::getAll();
        $balance = Fund::getBalance();
        Flight::json(['funds' => $funds, 'balance' => $balance]);
    }

    public static function getLoanTypes() {
        $loanTypes = LoanType::getAll();
        Flight::json($loanTypes);
    }

    public static function createLoanType() {
        $data = Flight::request()->data;
        if ($data->interest_rate < 0 || $data->max_duration <= 0) {
            Flight::json(['error' => 'Taux ou durée invalide'], 400);
            return;
        }
        $id = LoanType::create($data);
        Flight::json(['message' => 'Type de prêt créé', 'id' => $id]);
    }

    public static function updateLoanType($id) {
        $data = Flight::request()->data;
        if ($data->interest_rate < 0 || $data->max_duration <= 0) {
            Flight::json(['error' => 'Taux ou durée invalide'], 400);
            return;
        }
        LoanType::update($id, $data);
        Flight::json(['message' => 'Type de prêt modifié']);
    }

    public static function deleteLoanType($id) {
        LoanType::delete($id);
        Flight::json(['message' => 'Type de prêt supprimé']);
    }

    public static function getClients() {
        $clients = Client::getAll();
        Flight::json($clients);
    }

    public static function createClient() {
        $data = Flight::request()->data;
        if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
            Flight::json(['error' => 'Email invalide'], 400);
            return;
        }
        $id = Client::create($data);
        Flight::json(['message' => 'Client ajouté', 'id' => $id]);
    }

    public static function getLoans() {
        $loans = Loan::getAll();
        Flight::json($loans);
    }

    public static function createLoan() {
        $data = Flight::request()->data;
        if ($data->amount <= 0 || !$data->client_id || !$data->loan_type_id) {
            Flight::json(['error' => 'Données invalides'], 400);
            return;
        }
        $id = Loan::create($data);
        Flight::json(['message' => 'Prêt créé', 'id' => $id]);
    }

    public static function updateLoan($id) {
        $data = Flight::request()->data;
        if ($data->amount <= 0) {
            Flight::json(['error' => 'Montant invalide'], 400);
            return;
        }
        Loan::update($id, $data);
        Flight::json(['message' => 'Prêt modifié']);
    }

    public static function deleteLoan($id) {
        Loan::delete($id);
        Flight::json(['message' => 'Prêt supprimé']);
    }
}
?>