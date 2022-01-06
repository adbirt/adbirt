<?php

namespace App\Http\Controllers;

use \App\Model\category;
use Illuminate\Routing\Controller as BaseController;

class categoriesJson extends BaseController
{

    var array $outputData = array();

    public function __construct()
    {
    }

    public function getAllCategories()
    {
        $categories = json_decode(category::where('isActive', 'Active')
            ->where('isDeleted', 'No')
            ->get()->toJson(JSON_PRETTY_PRINT), true);

        $categories = array_map(function ($category) {
            $category['category_name'] = ucwords(
                $category['category_name']
            );
            return $category;
        }, $categories);

        return response()->json(['status' => 200, 'categories' => $categories]);
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
