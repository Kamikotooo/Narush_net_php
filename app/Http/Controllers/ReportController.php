<?php

namespace App\Http\Controllers;

use App\Models\Report; // Не забудьте подключить модель!

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all(); // выборка всех данных из таблицы reports
        return view('report.index', compact('reports'));
    }
    
    public function create()
    {
        return view('report.create');
    }
}