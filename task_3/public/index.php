<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$tss = new \SyncService\TransactionSyncService();
$transactions = $tss->downloadAllTransactions('https://americor-test-assignment.wiremockapi.cloud/transactions');

$latest_date = $tss->getLatestDateFromStorage('/local_storage.csv');
if (strtotime($latest_date) < strtotime($transactions[0]->transaction_date)) {
    $tss->saveToLocalStorage('/local_storage.csv', $transactions);
}

echo 'Transactions successfully synchronized!';

// cron command to run this every 10 minutes
// */10 * * * * php index.php