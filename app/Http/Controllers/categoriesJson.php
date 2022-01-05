<?php

namespace App\Http\Controllers;

use App\Model\category;
use Illuminate\Routing\Controller as BaseController;

class categoriesJson extends BaseController
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => 'getAllCategories']);
        $this->middleware('guest')->except([
            'getAllCategories',
        ]);
    }

    public function getAllCategories()
    {
        $categories = category::where('isActive', 'Active')->where('isDeleted', 'No')->get()->toJson(JSON_PRETTY_PRINT);
        return response(array(
            'categories' => $categories,
            'class' => DefaultController::class,
        ), 200);
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function show()
    {
    }

    public function delete()
    {
    }
}
