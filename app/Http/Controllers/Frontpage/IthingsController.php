<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\IthingsProductRepository;
use App\Repositories\IthingsCategoryRepository;

class IthingsController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct()
    {
        $this->productRepository = new IthingsProductRepository;
        $this->categoryRepository = new IthingsCategoryRepository;
    }

    /**
     * Display listing of products
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $search = $request->q;
            $categoryId = $request->category;
            
            // Get all categories for filter
            $categories = $this->categoryRepository->get();
            
            // Get all products for carousel (status 1 only - available products)
            $carouselProducts = $this->productRepository->get(100, [['status', 1]]);
            
            // Build filter conditions for main product list (show all status)
            $filter = [];
            if ($search) {
                $filter[] = ['name', 'LIKE', "%$search%"];
            }
            if ($categoryId) {
                $filter[] = ['category_id', $categoryId];
            }
            // Show all products regardless of status
            
            // Get products with pagination
            $limit = $request->limit ?? 9;
            $perPage = 9;
            $offset = max(0, $limit - $perPage);
            
            $products = $this->productRepository->get($perPage, $filter, [], $offset);
            
            return view('frontpage.modules.ithings-index', compact('products', 'categories', 'carouselProducts'));
        } catch (\Exception $e) {
            \Log::error('iThings Index Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            // Return view with empty data to prevent 500 error
            $products = collect([]);
            $categories = collect([]);
            $carouselProducts = collect([]);
            
            return view('frontpage.modules.ithings-index', compact('products', 'categories', 'carouselProducts'))
                ->with('error', 'Terjadi kesalahan saat memuat produk. Silakan coba lagi nanti.');
        }
    }

    /**
     * Display product detail
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = $this->productRepository->findBySlug($slug);
        
        if (!$product) {
            abort(404);
        }
        
        // Get related products (same category, only available)
        $relatedProducts = $this->productRepository->get(4, [
            ['category_id', $product->category_id],
            ['id', '!=', $product->id],
            ['status', 1]
        ]);
        
        return view('frontpage.modules.ithings-show', compact('product', 'relatedProducts'));
    }
}
