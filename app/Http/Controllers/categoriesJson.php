<?php

namespace App\Http\Controllers;

use \App\Model\category;
use Illuminate\Routing\Controller as BaseController;
use App\Model\campaignorders;
use Illuminate\Http\Request;

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

    public function getCampaignsForUser(Request $request)
    {
        try {
            $allInput = $request->all();
            $user_id = intval($allInput['user_id']);

            $campaigns = campaignorders::with('campaign')
                ->where('publisher_id', $user_id)
                ->where('campaign_running_status', 'activated')
                ->where('isDeleted', 'No')
                ->get();

            return response()->json(['status' => 200, 'categories' => $campaigns]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 500]);
        }
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
