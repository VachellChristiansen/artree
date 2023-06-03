<?php

namespace App\View\Components\FormInput;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Image extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $img,
        public int $width = 50,
        public int $height = 50
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input.image');
    }
}
