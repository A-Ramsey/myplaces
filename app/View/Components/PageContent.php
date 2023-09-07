<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageContent extends Component
{
    public $title;
    public $tagline;
    /**
     * Create a new component instance.
     */
    public function __construct($title = false, $tagline = false)
    {
        $this->title = $title;
        $this->tagline = $tagline;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-content', [
            'title' => $this->title,
            'tagline' => $this->tagline,
        ]);
    }
}
