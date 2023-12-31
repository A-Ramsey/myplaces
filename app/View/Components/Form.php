<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $name;
    public $title;
    public $action;
    public $method;
    public $small;
    public $tagline;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $action, $name="", $method = "POST", $small=true, $tagline="")
    {
        $this->title = $title;
        $this->action = $action;
        $this->name = ($name == "") ? str_replace(' ', '-', strtolower($title)) : $name;
        $this->method = $method;
        $this->small = $small;
        $this->tagline = $tagline;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form', [
            $this->name,
            $this->title,
            $this->action,
            $this->method,
            $this->small,
            $this->tagline,
        ]);
    }
}
