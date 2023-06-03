<?php

namespace App\View\Components\FormInput;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SubmitResult extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $password,
        public string $radio,
        public string $checkbox,
        public string $color,
        public string $date,
        public string $minmaxdate,
        public string $datetime,
        public string $minmaxdatetime,
        public string $email,
        public string $imagex,
        public string $imagey,
        public string $filepath,
        public string $hidden,
        public string $number,
        public string $range,
        public string $search,
        public string $telephone,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input.submit-result');
    }
}
