<?php

// app/Http/Controllers/TesteController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function ping()
    {
        return response()->json(['ok' => true]);
    }
}
