<?php

namespace App\View\Components\FormInput;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Radio extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $name,
        public $radioOptions,
        public string $note = '',
        public string $disabled = 'false',
        public string $required = 'false',
        public string $readonly = 'false',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input.radio');
    }
}
