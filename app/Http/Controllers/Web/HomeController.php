<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Nome do template ativo.
     */
    protected string $template;

    /**
     * Construtor: define o template.
     */
    public function __construct()
    {
        // Ex.: "default"
        $this->template = "web.templates.".config('template.web.active');
    }

    /**
     * Página inicial do site.
     */
    public function home()
    {
        return view($this->template.".pages.home");
    }
}
