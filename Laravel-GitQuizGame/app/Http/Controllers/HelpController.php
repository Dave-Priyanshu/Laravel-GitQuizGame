<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function showHelpPage(): View{
        return view('help');
    }
}
