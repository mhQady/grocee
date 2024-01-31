<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiBaseController;

class HomeController extends Controller
{
    public function __invoke()
    {
        $data = DB::select('
        SELECT categories.id, categories.name, COUNT(products.id) as product_count
        FROM categories
        LEFT JOIN products ON categories.id = products.category_id
        GROUP BY categories.id, categories.name
        ORDER BY product_count DESC
        LIMIT 15
    ');

        return response()->json(data: [
            'feature_categories' => [$data],
        ]);
    }
}
