<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $network = $_POST['network'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    switch ($network) {

        case "Awin":
            awinCSV($startdate, $enddate);
            break;

        case "Impact Radius":
            $page = 1;
            $loop2 = true;
            $transactions = [];

            $transactionsData = impactCallApi($startdate, $enddate, $page);
            $transactions = impactPrepareData($transactionsData);
            $page++;

            while ($loop2)
            {
                if(isset($transactionsData['@numpages']) && $page <= $transactionsData['@numpages'])
                {
                    $transactionsData = impactCallApi($startdate, $enddate, $page);
                    $transactions = array_merge($transactions, impactPrepareData($transactionsData));
                } else {
                    $loop2 = false;
                }
            }

            impactCSV($transactions);
            break;

        default:
            break;

    }
}

function awinCSV($startdate, $enddate)
{
    $response = awinCallApi($startdate, $enddate);
    $transactions = json_decode($response, true);

    // Debugging: Check API response structure
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON Decode Error: " . json_last_error_msg();
        exit;
    }

    if (!empty($transactions) && is_array($transactions)) {
        // Define the filename with the current date
        $filename = 'awin_transactions_' . date('Y-m-d') . '.csv';

        // Set headers to force download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="' . $filename . '"');

        // Open output stream
        $output = fopen('php://output', 'w');

        // Add the column headers
        fputcsv($output, ['Transaction ID', 'Advertiser ID', 'Publisher ID', 'Website ID', 'Sub ID', 'Payment ID', 'Advertiser Name',  'Advertiser URL', 'Publisher URL', 'Commission Status', 'Sale Amount', 'Commission Amount', 'Currency Code', 'Date']);

        // Adjust this loop as per the actual API response structure
        foreach ($transactions as $transaction) {

            $date = $transaction['transactionDate'] ?? '';
            if($date)
                $date = date('Y-m-d H:i:s', strtotime($date));

            $date = $date ?: null;

            fputcsv($output, [
                $transaction['id'] ?? null,
                $transaction['advertiserId'] ?? null,
                $transaction['clickRefs']['clickRef'] ?? null,
                $transaction['clickRefs']['clickRef2'] ?? null,
                $transaction['clickRefs']['clickRef3'] ?? null,
                $transaction['paymentId'] ?? null,
                $transaction['campaign'] ?? null,
                $transaction['url'] ?? null,
                $transaction['publisherUrl'] ?? null,
                $transaction['commissionStatus'] ?? null,
                $transaction['saleAmount']['amount'] ?? 0,
                $transaction['commissionAmount']['amount'] ?? 0,
                $transaction['commissionAmount']['currency'] ?? null,
                $date
            ]);
        }

        // Close output stream
        fclose($output);
        exit();
    } else {
        echo "No transactions found or invalid API response.";
        echo "<pre>";
        print_r($transactions); // Debugging: See the structure of response
        echo "</pre>";
    }
}

function awinCallApi($startDate, $endDate)
{
    $startDate = date('Y-m-d\T00:00:00', strtotime($startDate));
    $endDate = date('Y-m-d\T23:59:59', strtotime($endDate));

    $url = "https://api.awin.com/publishers/1263017/transactions/?timezone=UTC&endDate={$endDate}&startDate={$startDate}";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 7350818b-11da-4680-aa50-5777647a2df4'
        ),
    ));

    $response = curl_exec($curl);

    // Error handling for cURL request
    if (curl_errno($curl)) {
        echo 'cURL Error: ' . curl_error($curl);
    }

    curl_close($curl);
    return $response;
}

function impactCSV($transactions)
{

    // Debugging: Check API response structure
    if (empty($transactions)) {
        echo "No Transaction Available Now.";
        exit;
    }

    if (!empty($transactions) && is_array($transactions)) {
        // Define the filename with the current date
        $filename = 'impact_transactions_' . date('Y-m-d') . '.csv';

        // Set headers to force download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="' . $filename . '"');

        // Open output stream
        $output = fopen('php://output', 'w');

        // Add the column headers
        fputcsv($output, ['Transaction ID', 'Advertiser ID', 'Publisher ID', 'Website ID', 'Sub ID', 'Payment ID', 'Advertiser Name',  'Advertiser URL', 'Publisher URL', 'Commission Status', 'Sale Amount', 'Commission Amount', 'Currency Code', 'Date']);

        // Adjust this loop as per the actual API response structure
        foreach ($transactions as $transaction) {
            fputcsv($output, [
                $transaction['transaction_id'],
                $transaction['advertiser_id'],
                $transaction['publisher_id'],
                $transaction['website_id'],
                $transaction['sub_id'],
                null,
                $transaction['advertiser_name'],
                null,
                $transaction['website_url'],
                $transaction['commission_status'],
                $transaction['sale_amount'] ?? 0,
                $transaction['commission_amount'] ?? 0,
                $transaction['currency_code'] ?? null,
                $transaction['transaction_date']
            ]);
        }

        // Close output stream
        fclose($output);
        exit();
    } else {
        echo "No transactions found or invalid API response.";
        echo "<pre>";
        print_r($transactions); // Debugging: See the structure of response
        echo "</pre>";
    }
}

function impactPrepareData($transactionsData)
{
    $transactions = [];
    foreach ($transactionsData['Actions'] ?? [] as $response)
    {
        if(isset($response['SubId1']) && isset($response['SubId2']) || isset($response['ReferringDomain']))
        {
            $state = strtolower($response['State']);
            if($state == "reversed")
                $state = "declined";

            $transactionDate = $response['EventDate'] ?? null;
            if($transactionDate)
                $transactionDate = date("Y-m-d H:i:s", strtotime(str_replace("T", "  ", $transactionDate)));

            $transactions[] = [
                "transaction_id" => $response['Id'],
                "advertiser_id" => $response['CampaignId'],
                "publisher_id" => $response['SubId1'] ?: null,
                "website_id" => $response['SubId2'] ?: null,
                "sub_id" => $response['SubId3'] ?: null,
                "website_url" => $response['ReferringDomain'] ?: null,
                "commission_status" => $state,
                "advertiser_name" => $response['CampaignName'],
                'transaction_date' => $transactionDate,
                'sale_amount' => $response['Amount'],
                'commission_amount' => $response['Payout'],
                'currency_code' => $response['Currency'],
            ];
        }
    }

    return $transactions;
}

function impactCallApi($startDate, $endDate, $page = 1)
{
    $startDate = date('Y-m-d\T00:00:00\Z', strtotime($startDate));
    $endDate = date('Y-m-d\T23:59:59\Z', strtotime($endDate));

    $url = "https://api.impact.com/Mediapartners/IRyu5TAnRbCh2075306znEaBFKbYRSv9e1/Actions?ActionDateStart={$startDate}&ActionDateEnd={$endDate}&page={$page}&PageSize=100";
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Basic SVJ5dTVUQW5SYkNoMjA3NTMwNnpuRWFCRktiWVJTdjllMTpDbW5xdFZ3eUdELlBLVVhNbkxTRC56dndKNEVncTRaeg=='
        ),
    ));

    $response = curl_exec($curl);

    // Error handling for cURL request
    if (curl_errno($curl)) {
        echo 'cURL Error: ' . curl_error($curl);
    }

    curl_close($curl);
    return json_decode($response, true);
}
?>
