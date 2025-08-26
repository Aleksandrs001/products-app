<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Product;

	class ProductController extends Controller
	{
		public function index(Request $request)
		{
			$query = Product::query();

			if ($request->has('search')) {
				$query->where('title', 'like', '%' . $request->get('search') . '%');
			}

			return response()->json($query->get());
		}
	}
