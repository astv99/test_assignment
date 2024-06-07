<?php

namespace SyncService;

class TransactionSyncService
{
    public function __construct()
    {
        // nothing needed here (yet)
    }

    /**
    * @param string $url
    * @return array
    */
    public function downloadAllTransactions(string $url): array
    {
        $dl_transactions = [];
        $next_page = $url;

        while ($next_page != null) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $next_page);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_error($ch)) {
                echo curl_error($ch);
            }
            $res = json_decode($response);
            
            $dl_transactions = array_merge($dl_transactions, $res->data);
            $next_page = $res->next_page ? $res->next_page->url : null;
        }

        return $dl_transactions;
    }

    /**
    * @param string $filepath
    * @param array $transactions
    * @return void
    */
    public function saveToLocalStorage(string $filepath, array $transactions): void
    {
        if (count($transactions) === 0) return;

        $handle = fopen(__DIR__ . $filepath, 'a');
        if ($handle) {
            foreach ($transactions as $transaction) {
                fwrite($handle, $transaction->account_id . ',');
                fwrite($handle, $transaction->transaction_date . ',');
                fwrite($handle, $transaction->transaction_class . ',');
                fwrite($handle, $transaction->transaction_type . ',');
                fwrite($handle, $transaction->transaction_status . ',');
                fwrite($handle, $transaction->transaction_amount . ',');
                fwrite($handle, $transaction->reference_id . ',');
                fwrite($handle, $transaction->memo . "\r\n");
            }
            fclose($handle);
        } else {
            echo "could not append to local storage\r\n";
        }

        return;
    }

    /**
    * @param string $filepath
    * @return string
    */
    public function getLatestDateFromStorage(string $filepath): string
    {
        $rows = file(__DIR__ . $filepath);
        if (count($rows) === 0) return '';

        $last_row = array_pop($rows);
        $data = str_getcsv($last_row);
        return $data ? $data[1] : ''; // $data[1] = transaction_date field
    }
}