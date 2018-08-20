<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Cache\Repository;
use App\Repositories\ComputerRepository;
use App\Repositories\PrinterRepository;
// use App\Repositories\MonitorRepository;
// use App\Repositories\UpsRepository;
use App\Entities\Computer;
use App\Repositories\MonitorRepository;

class DashboardController extends Controller
{
    protected $computerRepository;
    protected $printerRepository;
    protected $monitorsRepository;
    protected $upsesRepository;
  

    public function __construct(ComputerRepository $computerRepository, PrinterRepository $printerRepository, MonitorRepository $monitorRepository)
    {
        $this->computerRepository = $computerRepository;
        $this->printerRepository = $printerRepository;
        $this->monitorsRepository = $monitorRepository;
    }

    public function index()
    {
        $totalComputers = $this->computerRepository->totalPerStatus();
        $totalComputers->total = $this->computerRepository->all()->count();
        $totalPrinters = $this->printerRepository->totalPerStatus();
        $totalPrinters->total = $this->printerRepository->all()->count();
        $totalMonitors = $this->monitorsRepository->totalPerStatus();
        $totalMonitors->total = $this->monitorsRepository->all()->count();
        // $totalUpses = $this->upsesRepository->totalPerStatus();
        // $totalUpses->total = $this->upsesRepository->all()->count();
        return view('dashboard.index', compact('totalComputers', 'totalPrinters', 'totalMonitors'));
    }
}
