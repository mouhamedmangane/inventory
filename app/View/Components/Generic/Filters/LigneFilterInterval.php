<?php

namespace App\View\Components\Generic\Filters;

use Illuminate\View\Component;
use App\ViewModel\Filter\LigneFilterIntervalMd;

class LigneFilterInterval extends Component
{
    public $ligne;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LigneFilterIntervalMd $ligne)
    {
        $this->ligne =$ligne;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.filters.ligne-filter-interval');
    }
}
