<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use JWTAuth;

class ProductController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        return $this->user
            ->products()
            ->get(['name', 'price', 'quantity'])
            ->toArray();
    }
}
