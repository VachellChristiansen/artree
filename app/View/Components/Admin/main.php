<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class main extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $current,
        public string $user = ''
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.main');
    }
}
