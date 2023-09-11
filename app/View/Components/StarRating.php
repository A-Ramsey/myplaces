<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StarRating extends Component
{
    public $rating;
    public $isInput;
    public $label;
    public $inputName;
    /**
     * Create a new component instance.
     */
    public function __construct($rating = 1, $isInput = false, $label = "Star Rating", $inputName = "star_rating")
    {
        $this->rating = $rating;
        $this->isInput = $isInput;
        $this->label = $label;
        $this->inputName = $inputName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.star-rating', [
            'rating' => $this->rating,
            'isInput' => $this->isInput,
            'label' => $this->label,
            'inputName' => $this->inputName,
        ]);
    }
}
