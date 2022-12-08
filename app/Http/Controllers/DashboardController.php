<?php

namespace App\Http\Controllers;

use App\Facades\LoggerFacade;
use Symfony\Component\Console\Output\ConsoleOutput;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
