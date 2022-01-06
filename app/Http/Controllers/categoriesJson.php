<?php

namespace App\Http\Controllers;

use App\Model\category;
use Illuminate\Routing\Controller as BaseController;

class categoriesJson extends BaseController
{

    var array $outputData = array();

    public function __construct()
    {
    }

    public function getAllCategories()
    {
        $categories = category::where('isActive', 'Active')->where('isDeleted', 'No')->get()->toJson(JSON_PRETTY_PRINT);

        return response()->json(['status' => 200, 'categoories' => $categories]);
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
