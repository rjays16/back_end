<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Illuminate\Http\Request;
use App\Models\User;
class SecretController extends Controller
{
    public function index()
    {
        return Secret::all();
    }
}
