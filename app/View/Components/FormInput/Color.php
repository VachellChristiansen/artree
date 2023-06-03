<?php

namespace App\View\Components\FormInput;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Color extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $name,
        public string $value = '',
        public string $note = '',
        public string $disabled = 'false',
        public string $required = 'false',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input.color');
    }
}
