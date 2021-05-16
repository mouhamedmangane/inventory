<?php

namespace App\View\Components\Contact\Page;

use Illuminate\View\Component;

class Create extends Component
{
    public $contact;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact=$contact;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.contact.page.create');
    }
}
