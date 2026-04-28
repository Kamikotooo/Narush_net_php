<?php

namespace App\View\Components;

use App\Models\Status; // Важно!
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // Загружаем список всех статусов из базы данных
        $statuses = Status::all();
        
        // Передаем $statuses в blade-шаблон компонента
        return view('components.filter', compact('statuses'));
    }
}