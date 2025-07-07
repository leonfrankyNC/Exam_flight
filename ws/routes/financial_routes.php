<?php
require_once __DIR__ . '/../controllers/FinancialController.php';

Flight::route('POST /funds', ['FinancialController', 'addFund']);
Flight::route('GET /funds', ['FinancialController', 'getFunds']);
Flight::route('GET /loan_types', ['FinancialController', 'getLoanTypes']);
Flight::route('POST /loan_types', ['FinancialController', 'createLoanType']);
Flight::route('PUT /loan_types/@id', ['FinancialController', 'updateLoanType']);
Flight::route('DELETE /loan_types/@id', ['FinancialController', 'deleteLoanType']);
Flight::route('GET /clients', ['FinancialController', 'getClients']);
Flight::route('POST /clients', ['FinancialController', 'createClient']);
Flight::route('GET /loans', ['FinancialController', 'getLoans']);
Flight::route('POST /loans', ['FinancialController', 'createLoan']);
Flight::route('PUT /loans/@id', ['FinancialController', 'updateLoan']);
Flight::route('DELETE /loans/@id', ['FinancialController', 'deleteLoan']);
?>