<?php

declare(strict_types=1);

namespace SmartAutomation\Controllers;

use SmartAutomation\Core\Controller;
use SmartAutomation\Core\Request;

final class HomeController extends Controller
{
    public function index(Request $request): void
    {
        $this->view('home', ['title' => 'Smart Automation v2']);
    }
}
