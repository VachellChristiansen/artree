<?php

namespace App\View\Components\FormInput;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $name,
        public string $cols = '100',
        public string $rows = '10',
        public string $note = '',
        public string $value = '',
        public string $placeholder = '',
        public string $disabled = 'false',
        public string $required = 'false',
        public string $readonly = 'false',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input.text-area');
    }
}
