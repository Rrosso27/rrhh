<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolController extends Controller
{
    public function index()
    {
        try {
            $roles = Roles::all();
            return $roles;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
