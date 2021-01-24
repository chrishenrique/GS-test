<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{UnitsRepo,SalesRepo};
use App\{Sale, Salesman, Client, Unit, Enterprise};

class ReportsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UnitsRepo $unitsRepo,SalesRepo $salesRepo)
    {
        $this->unitsRepo = $unitsRepo;
        $this->salesRepo = $salesRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales(Request $request)
    {
        $totalPending = 0;
        $totalDone = 0;
        $totalNegotiation = 0;
        $totalLost = 0;

        $ppage = 20;
        $beginAt = $request->get('begin_at');
        $endAt = $request->get('end_at');
        $salesmanId = $request->get('salesman_id');
        $clientId = $request->get('client_id');
        $status = $request->get('status');
        $options = compact('beginAt', 'endAt', 'salesmanId', 'clientId', 'status');
        $items = $this->salesRepo->byFilter( $options);
        $base = clone $items;
        $totalDone = $base->done()->count();
        $base = clone $items;
        $totalPending = $base->pending()->count();
        $base = clone $items;
        $totalNegotiation = $base->negotiation()->count();
        $base = clone $items;
        $totalLost = $base->lost()->count();

        $sales = $items->paginate($ppage);
        $sales->appends($options);

        $statuses = Sale::getAllStatus();
        $clients = Client::all();
        $salesman = Salesman::all();

        return  view('reports.sales', get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function units(Request $request)
    {
        $total = 0;
        $totalSold = 0;
        $totalAvailable = 0;
        $ppage = 20;
        $enterpriseId = $request->get('enterprise_id');
        $options = ['enterprise_id' => $enterpriseId];
        $items = $this->unitsRepo->byFilter( $options);
        $base = clone $items;
        $totalSold = $base->whereHas('sale')->count();
        $base = clone $items;
        $totalAvailable = $base->whereDoesntHave('sale')->count();

        $units = $items->paginate($ppage);
        $units->appends($options);

        $enterprises = Enterprise::all();

        return  view('reports.units', get_defined_vars());
    }

    

}
