<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected string $template;

    public function __construct()
    {
        $this->template = 'web.templates.' . config('template.web.active', 'default');
    }

    public function home()
    {
        return view("{$this->template}.pages.home");
    }
}
