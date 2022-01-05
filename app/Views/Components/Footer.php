<?php

namespace App\View\Components;

use Illuminate\View\Component as BaseComponent;

class Alert extends BaseComponent
{

    public function __construct()
    {
        // 
    }

    public function render()
    {
        return view('components.footer');
    }
}