<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataTable extends Component
{
    public $rows;
    /**
     * Create a new component instance.
     * 
     * @param array $rows
     * @return void
     */
    public function __construct($rows = [])
    {
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     * 
     * @return \Illuminate\View\View|string
     */
    public function render(): View|Closure|string
    {
        return view('components.data-table');
    }
}
