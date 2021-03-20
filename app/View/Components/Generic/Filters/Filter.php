<?php

namespace App\View\Components\Generic\Filters;

use Illuminate\View\Component;
use App\ViewModel\Filter\FilterMd;

class Filter extends Component
{
    public $filter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(FilterMd $filter)
    {
        $this->filter=$filter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.filters.filter');
    }
}
