<?php

namespace App\Http\Controllers;


use App\Enums\AccountType;
use App\Models\Role;
use App\Service\Publisher\DasboardService as PublisherDashboardService;
use App\Service\Admin\DasboardService as AdminDashboardService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\PaymentHistory;
use App\Helper\Static\Vars;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $publisherService, $adminService;

    public function __construct(PublisherDashboardService $publisherService, AdminDashboardService $adminService)
    {
        $this->publisherService = $publisherService;
        $this->adminService = $adminService;
    }

    public function index(AccountType $type, Request $request)
    {
        $user = $request->user();

        if($user->getRoleName() == Role::ADVERTISER_ROLE)
        {
            $type = Role::ADVERTISER_ROLE;
            SEOMeta::setTitle("$type Dashboard");

            return view('template.advertiser.dashboard');
        }
        elseif($user->getRoleName() == Role::PUBLISHER_ROLE)
        {
            return $this->publisherService->init($request);
        }
        else
        {
            abort_if(Gate::denies('admin_dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
 $earningSummary =  $this->earningSummary($request);


// Earning Graph (cache 1 min)
$earningSummaryGraph = $this->earningSummaryGraph($request);


// Advertiser Stats (cache 2 min)
$advertisersStats =  $this->advertiserStats();



// // Top Clicks by Country (limit 10)
// $topClicks = $this->topClicks($request);


// // Top Transactions (latest 10)
// $topTransactions = $this->topTransactions($request);


// // Latest Transactions (latest 10)
// $latestTransactions =$this->latestTransactions($request);


// // Latest Advertisers (latest 10)
 $advertisers = $this->latestAdvertiser($request);


// Earning Comparison (current vs previous month)
$earningSummaryComparison = $this->earningSummaryComparison();


return view('template.admin.dashboard', compact(
    'earningSummary',
    'earningSummaryGraph',
    'advertisersStats',
     'advertisers',
    'earningSummaryComparison'

));
            return $this->adminService->init($request);
        }

    }

    public function dashboard( Request $request){
       

    }


    public function topAdvertisers(Request $request){
        $user = auth()->user();
    $limit = $request->islimit ?? 5;
$dateFrom = $request->start_date ?? now()->subDays(30);
$dateTo = $request->end_date ?? now();
    $query = DB::table('transactions')
        ->selectRaw('
            SUM(sale_amount) as total_sales_amount,
            SUM(commission_amount) as total_commission_amount,
            COUNT(*) as total_transactions,
            transactions.advertiser_name,
            transactions.advertiser_id,
            transactions.transaction_date,
            sale_amount_currency,
            transactions.external_advertiser_id,
            advertisers.fetch_logo_url,
            advertisers.logo
        ')
        ->leftJoin('advertisers', 'advertisers.advertiser_id', '=', 'transactions.advertiser_id')
         ->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo]);
         
          if(isset($request->status)){
      $status = $request->status;
    $query = $query->where('transactions.commission_status', $status)->groupBy('transactions.advertiser_name')
        ->orderByDesc('total_sales_amount')
        ->limit($limit);
  }else{
      $query = $query->groupBy('transactions.advertiser_name')
        ->orderByDesc('total_sales_amount')
        ->limit($limit);
  }
    $salesAdvertiser = $query->get();


      $query = DB::table('transactions')
        ->selectRaw('
            SUM(sale_amount) as total_sales_amount,
            SUM(commission_amount) as total_commission_amount,
            COUNT(*) as total_transactions,
            transactions.advertiser_name,
            transactions.advertiser_id,
            sale_amount_currency,
            transactions.transaction_date,
            transactions.external_advertiser_id,
            advertisers.fetch_logo_url,
            advertisers.logo
        ')
        ->leftJoin('advertisers', 'advertisers.advertiser_id', '=', 'transactions.advertiser_id')
        ->groupBy(
            'transactions.advertiser_name',
        )->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo]);
        
        
         if(isset($request->status)){
      $status = $request->status;
    $query = $query->where('transactions.commission_status', $status)->orderByDesc('total_commission_amount')
        ->limit($limit);
  }else{
      $query = $query->orderByDesc('total_commission_amount')
        ->limit($limit);
  }

    

    $commissionsAdvertiser = $query->get();

     return response()->json(['status'=>200,'topSales'=>$salesAdvertiser,'topCommissions'=>$commissionsAdvertiser]);
    }

    public function topPublsihers(Request $request){
        $user = auth()->user();
    $limit = $request->islimit ?? 5;
$dateFrom = $request->start_date ?? now()->startOfMonth();
$dateTo = $request->end_date ?? now();
    $topSales = DB::table('transactions')
        ->join('users', 'users.id', '=', 'transactions.publisher_id')
        ->join('websites', 'websites.id', '=', 'users.active_website_id')
        ->selectRaw('
            transactions.publisher_id,
            users.first_name,
            users.last_name,
            users.user_name,
            websites.name,
            COUNT(*) as total_transactions,
            SUM(sale_amount) as total_sales_amount,
            SUM(commission_amount) as total_commission_amount,
            transactions.transaction_date
        ')
       ->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo]);
       
        if(isset($request->status)){
      $status = $request->status;
   $topSales = $topSales->where('transactions.commission_status', $status)->groupBy('transactions.publisher_id')
        ->orderByDesc('total_sales_amount')
        ->limit($limit)
        ->get();
  }else{
      $topSales = $topSales->groupBy('transactions.publisher_id')
        ->orderByDesc('total_sales_amount')
        ->limit($limit)
        ->get();
  }
    
        $topCommissions =  DB::table('transactions')
        ->join('users', 'users.id', '=', 'transactions.publisher_id')
        ->join('websites', 'websites.id', '=', 'users.active_website_id')
        ->selectRaw('
            transactions.publisher_id,
            users.first_name,
            users.last_name,
            users.user_name,
            websites.name,
            COUNT(*) as total_transactions,
            SUM(sale_amount) as total_sales_amount,
            SUM(commission_amount) as total_commission_amount,
            transactions.transaction_date
        ')
       ->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo]);
       
        if(isset($request->status)){
      $status = $request->status;
   $topCommissions = $topCommissions->where('transactions.commission_status', $status)->groupBy('transactions.publisher_id')
        ->orderByDesc('total_commission_amount')
        ->limit($limit)
        ->get();
  }else{
      $topCommissions = $topCommissions->groupBy('transactions.publisher_id')
        ->orderByDesc('total_commission_amount')
        ->limit($limit)
        ->get();
  }
  
      


        return response()->json(['status'=>200,'topSales'=>$topSales,'topCommissions'=>$topCommissions,'from'=>$dateFrom,'to'=>$dateTo]);
    
    }


       public function latestAdvertiser($request)
{
    $limit = $request->islimit ?? 10;

    $advertiser = DB::table('advertisers')
        ->where('is_active', 1)
        ->orderBy('created_at', 'DESC')
        ->limit($limit)
        ->get();
    return $advertiser;
}
    
   public function topTransactions(Request $request)
{
    $user = auth()->user();
    $limit = $request->islimit ?? 5;
$dateFrom = $request->start_date ?? now()->subDays(30);
$dateTo = $request->end_date ?? now();
    $query = DB::table('transactions')
        ->select(
            'transactions.sale_amount',
            'transactions.commission_amount',
            'transactions.advertiser_name',
            'transactions.received_commission_amount',
            'transactions.commission_status',
            'transactions.advertiser_id',
            'transactions.transaction_date',
            'transactions.source',
            'transactions.sale_amount_currency',
            'transactions.external_advertiser_id',
            'advertisers.fetch_logo_url',
            'advertisers.logo'
        )
        ->leftJoin('advertisers', 'advertisers.advertiser_id', '=', 'transactions.advertiser_id')->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo]);

  if(isset($request->status)){
      $status = $request->status;
    $query = $query->where('transactions.commission_status', $status);
  }
  

    // Optional: limit to recent N days (improves performance if no date filter exists)
    // $query->where('transactions.transaction_date', '>=', now()->subDays(90));

    $topTransactions =  $query->orderByDesc('transactions.sale_amount')
                 ->limit($limit)
                 ->get();


                 $query = DB::table('transactions')
        ->select(
            'transactions.sale_amount',
            'transactions.commission_amount',
            'transactions.advertiser_name',
            'transactions.received_commission_amount',
            'transactions.commission_status',
            'transactions.advertiser_id',
            'transactions.transaction_date',
            'transactions.source',
            'transactions.sale_amount_currency',
            'transactions.external_advertiser_id',
            'advertisers.fetch_logo_url',
            'advertisers.logo'
        )
        ->leftJoin('advertisers', 'advertisers.advertiser_id', '=', 'transactions.advertiser_id')->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo]);

 if(isset($request->status)){
      $status = $request->status;
    $query = $query->where('transactions.commission_status', $status);
  }

    $latestTransaction =  $query->orderByDesc('transactions.transaction_date')
                 ->limit($limit)
                 ->get();


                 return response()->json(['status'=>200,'topTransactions'=>$topTransactions,'latestTransactions'=>$latestTransaction]);
}
    
    
   public function latestTransactions($request)
{
    $user = auth()->user();
    $limit = $request->islimit ?? 5;
$dateFrom = $request->start_date ?? now()->subDays(30);
$dateTo = $request->end_date ?? now();
    $query = DB::table('transactions')
        ->select(
            'transactions.sale_amount',
            'transactions.commission_amount',
            'transactions.advertiser_name',
            'transactions.received_commission_amount',
            'transactions.commission_status',
            'transactions.advertiser_id',
            'transactions.transaction_date',
            'transactions.source',
            'transactions.sale_amount_currency',
            'transactions.external_advertiser_id',
            'advertisers.fetch_logo_url',
            'advertisers.logo'
        )
        ->leftJoin('advertisers', 'advertisers.advertiser_id', '=', 'transactions.advertiser_id')->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo]);


    return $query->orderByDesc('transactions.transaction_date')
                 ->limit($limit)
                 ->get();
}
    
  public function topPublishersSales($request)
{
    $user = auth()->user();
    $limit = $request->islimit ?? 5;
$dateFrom = $request->start_date ?? now()->subDays(30);
$dateTo = $request->end_date ?? now();
    $query = DB::table('transactions')
        ->join('users', 'users.id', '=', 'transactions.publisher_id')
        ->selectRaw('
            transactions.publisher_id,
            users.first_name,
            users.last_name,
            users.user_name,
            COUNT(*) as total_transactions,
            SUM(sale_amount) as total_sales_amount,
            SUM(commission_amount) as total_commission_amount,
            transactions.transaction_date
        ')
       ->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo])
        ->groupBy('transactions.publisher_id')
        ->orderByDesc('total_sales_amount')
        ->limit($limit)
        ->get();
    

    return $query;
}
    public function topPublishersCommission($request)
{
    $user = auth()->user();
    $limit = $request->islimit ?? 5;
$dateFrom = $request->start_date ?? now()->subDays(30);
$dateTo = $request->end_date ?? now();
    $query =  DB::table('transactions')
        ->join('users', 'users.id', '=', 'transactions.publisher_id')
        ->selectRaw('
            transactions.publisher_id,
            users.first_name,
            users.last_name,
            users.user_name,
            COUNT(*) as total_transactions,
            SUM(sale_amount) as total_sales_amount,
            SUM(commission_amount) as total_commission_amount,
            transactions.transaction_date
        ')
       ->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo])
       ->groupBy('transactions.publisher_id')
        ->orderByDesc('total_commission_amount')
        ->limit($limit)
        ->get();
    return $query;
}
    
public function topClicks(Request $request)
{
   $limit = $request->input('islimit', 10);

    $dateFrom = $request->input('start_date')
        ? Carbon::parse($request->start_date)->startOfDay()
        : now()->subDays(30)->startOfDay();

    $dateTo = $request->input('end_date')
        ? Carbon::parse($request->end_date)->endOfDay()
        : now()->endOfDay();

    $clicksByCountry = DB::table('deeplink_tracking_details')
        ->select('country', DB::raw('COUNT(*) as total_clicks'))
        ->whereBetween('created_at', [$dateFrom, $dateTo])
        ->groupBy('country')
        ->orderByDesc('total_clicks')
        ->limit($limit)
        ->get();

    return response()->json([
        'status' => 200,
        'topClick' => $clicksByCountry
    ]);
}
   public function topAdvertisersSales($request)
{
    $user = auth()->user();
    $limit = $request->islimit ?? 5;
$dateFrom = $request->start_date ?? now()->subDays(30);
$dateTo = $request->end_date ?? now();
    $query = DB::table('transactions')
        ->selectRaw('
            SUM(sale_amount) as total_sales_amount,
            SUM(commission_amount) as total_commission_amount,
            COUNT(*) as total_transactions,
            transactions.advertiser_name,
            transactions.advertiser_id,
            transactions.transaction_date,
            sale_amount_currency,
            transactions.external_advertiser_id,
            advertisers.fetch_logo_url,
            advertisers.logo
        ')
        ->leftJoin('advertisers', 'advertisers.advertiser_id', '=', 'transactions.advertiser_id')
         ->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo])
        ->groupBy('transactions.advertiser_name')
        ->orderByDesc('total_sales_amount')
        ->limit($limit);

    return $query->get();
}
    public function topAdvertisersCommission($request)
{
    $user = auth()->user();
    $limit = $request->islimit ?? 5;
$dateFrom = $request->start_date ?? now()->subDays(30);
$dateTo = $request->end_date ?? now();
    $query = DB::table('transactions')
        ->selectRaw('
            SUM(sale_amount) as total_sales_amount,
            SUM(commission_amount) as total_commission_amount,
            COUNT(*) as total_transactions,
            transactions.advertiser_name,
            transactions.advertiser_id,
            sale_amount_currency,
            transactions.transaction_date,
            transactions.external_advertiser_id,
            advertisers.fetch_logo_url,
            advertisers.logo
        ')
        ->leftJoin('advertisers', 'advertisers.advertiser_id', '=', 'transactions.advertiser_id')
        ->groupBy(
            'transactions.advertiser_name',
        )->whereBetween('transactions.transaction_date', [$dateFrom, $dateTo])
        ->orderByDesc('total_commission_amount')
        ->limit($limit);

    

    return $query->get();
}
    
    
   public function advertiserStats()
{
    $today = now()->addDay()->format("Y-m-d");
    $past15Days = now()->subDays(15)->format("Y-m-d");

    $totalAdvertisers = DB::table('advertisers')->count();

    $totalActiveAdvertisers = DB::table('advertisers')
        ->where('is_active', 1)
        ->count();

    $totalNewAdvertisers = DB::table('advertisers')
        ->where('is_active', 1)
        ->whereBetween('created_at', [$past15Days, $today])
        ->count();

    $totalPending = DB::table('advertiser_applies')
        ->where('status', 'pending')
        ->count();

    return [
        'totalAdvertisers' => $totalAdvertisers,
        'totalActiveAdvertisers' => $totalActiveAdvertisers,
        'totalNewAdvertisers' => $totalNewAdvertisers,
        'totalPending' => $totalPending,
    ];
}
    
 public function earningSummary($request)
{
    $start_date = $request->start_date ?? Carbon::now()->startOfMonth()->format('Y-m-d');
    $end_date = $request->end_date ?? Carbon::now()->endOfMonth()->format('Y-m-d');

    $start_date .= ' 00:00:00';
    $end_date .= ' 23:59:59';

    $staticCommission = Vars::COMMISSION_PERCENTAGE;
    $commissionMultiplier = (float)("0." . $staticCommission);

    // Total sales, commission, and transactions
    $totals = DB::table('transactions')
        ->selectRaw("
            SUM(received_sale_amount) as total_sales,
            SUM(commission_amount) as total_commission,
            COUNT(*) as total_transactions,
            SUM(CASE WHEN commission_status = 'pending' THEN commission_amount ELSE 0 END) as pending_commission,
            SUM(CASE WHEN commission_status = 'approved' THEN commission_amount ELSE 0 END) as approved_commission,
            SUM(CASE WHEN commission_status = 'declined' THEN commission_amount ELSE 0 END) as declined_commission,
            SUM(commission_amount * ?) as publisher_commission
        ", [$commissionMultiplier])
        ->whereBetween('transaction_date', [$start_date, $end_date])
        ->first();

    // Paid Amount
    $totalPaidAmount = DB::table('payment_histories')
        ->where('status', 'paid')
        ->whereBetween('paid_date', [$start_date, $end_date])
        ->sum('lc_commission_amount');

    // Profit = Commission - Publisher Commission
    $totalProfit = (float)$totals->total_commission - (float)$totals->publisher_commission;

    return [
        'total_sales' => $totals->total_sales,
        'total_commission' => $totals->total_commission,
        'total_transactions' => $totals->total_transactions,
        'pending_commission' => $totals->pending_commission,
        'approved_commission' => $totals->approved_commission,
        'declined_commission' => $totals->declined_commission,
        'publisher_commission' => $totals->publisher_commission,
        'totalPaidAmount' => $totalPaidAmount,
        'total_profit' => $totalProfit,
    ];
}

public function earningSummaryComparison()
{
    $staticCommission = Vars::COMMISSION_PERCENTAGE;

    // Date ranges
    $currentStart = now()->startOfMonth()->startOfDay();
    $currentEnd = now()->endOfMonth()->endOfDay();

    $lastStart = now()->subMonth()->startOfMonth()->startOfDay();
    $lastEnd = now()->subMonth()->endOfMonth()->endOfDay();

    // Helper to get data from DB
    $getData = function ($start, $end) use ($staticCommission) {
        $transactionQuery = DB::table('transactions')
            ->whereBetween('transaction_date', [$start, $end]);

        $total_sales = (float) $transactionQuery->clone()->sum('received_sale_amount');
        $total_commission = (float) $transactionQuery->clone()->sum('commission_amount');
        $total_transactions = (int) $transactionQuery->clone()->count();

        $pending_commission = (float) DB::table('transactions')
            ->where('commission_status', 'pending')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('commission_amount');

        $approved_commission = (float) DB::table('transactions')
            ->where('commission_status', 'approved')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('commission_amount');

        $declined_commission = (float) DB::table('transactions')
            ->where('commission_status', 'declined')
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('commission_amount');

        $publisher_commission = (float) DB::table('transactions')
            ->whereBetween('transaction_date', [$start, $end])
            ->select(DB::raw("SUM(commission_amount * 0.$staticCommission) as total"))
            ->value('total');

        $total_paid = (float) DB::table('payment_histories')
            ->where('status', 'paid')
            ->whereBetween('paid_date', [$start, $end])
            ->sum('lc_commission_amount');

        $total_profit = $total_commission - $publisher_commission;

        return compact(
            'total_sales',
            'total_commission',
            'total_transactions',
            'pending_commission',
            'approved_commission',
            'declined_commission',
            'publisher_commission',
            'total_paid',
            'total_profit'
        );
    };

    $current = $getData($currentStart, $currentEnd);
    $last = $getData($lastStart, $lastEnd);

    // Percent change calculator
    $calculateChange = function ($currentValue, $lastValue) {
        if ($lastValue == 0) {
            return $currentValue > 0 ? 100 : 0;
        }
        return round((($currentValue - $lastValue) / $lastValue) * 100, 2);
    };

    // Format final result
    $comparison = [];
    foreach ($current as $key => $currentValue) {
        $lastValue = $last[$key] ?? 0;
        $comparison[$key] = [
            'current' => round($currentValue, 2),
            'last' => round($lastValue, 2),
            'change_percent' => $calculateChange($currentValue, $lastValue),
        ];
    }

    return $comparison;
}


public function earningSummaryGraph($request)
{
    $start_date = $request->start_date ?? now()->startOfMonth()->format('Y-m-d');
    $end_date = $request->end_date ?? now()->endOfMonth()->format('Y-m-d');

    $start_date .= ' 00:00:00';
    $end_date .= ' 23:59:59';
    $staticCommission = Vars::COMMISSION_PERCENTAGE;

    // Common select fields
    $selectFields = [
        DB::raw('DATE(transaction_date) as date'),
        DB::raw('SUM(received_sale_amount) as total_sales'),
        DB::raw('SUM(commission_amount) as total_commission'),
        DB::raw('SUM(commission_amount) as publisher_commission'),
        DB::raw("SUM(commission_amount * (1 - 0.$staticCommission)) as total_revenue"),
        DB::raw('COUNT(*) as total_transactions'),
        DB::raw("SUM(CASE WHEN commission_status = 'pending' THEN commission_amount ELSE 0 END) as pending_commission"),
        DB::raw("SUM(CASE WHEN commission_status = 'approved' THEN commission_amount ELSE 0 END) as approved_commission"),
        DB::raw("SUM(CASE WHEN commission_status = 'declined' THEN commission_amount ELSE 0 END) as declined_commission"),
    ];

    // Current period data
    $currentData = DB::table('transactions')
        ->select($selectFields)
        ->whereBetween('transaction_date', [$start_date, $end_date])
        ->groupBy(DB::raw('DATE(transaction_date)'))
        ->orderBy('date')
        ->get();

    // Previous period (only if no custom range is provided)
    $previousData = collect();
    if (!$request->start_date && !$request->end_date) {
        $prevStart = now()->subMonth()->startOfMonth()->format('Y-m-d') . ' 00:00:00';
        $prevEnd = now()->subMonth()->endOfMonth()->format('Y-m-d') . ' 23:59:59';

        $previousData = DB::table('transactions')
            ->select($selectFields)
            ->whereBetween('transaction_date', [$prevStart, $prevEnd])
            ->groupBy(DB::raw('DATE(transaction_date)'))
            ->orderBy('date')
            ->get();
    }

    return [
        'current' => $currentData,
        'previous' => $previousData,
    ];
}

}
