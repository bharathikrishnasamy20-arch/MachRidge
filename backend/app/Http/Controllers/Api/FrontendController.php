<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CapabilityResource;
use App\Http\Resources\ContactMessageResource;
use App\Http\Resources\GalleryResource;
use App\Http\Resources\HeroSliderResource;
use App\Http\Resources\IndustryResource;
use App\Http\Resources\InspectionEquipmentResource;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\QuoteRequestResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\TestimonialResource;
use App\Models\Blog;
use App\Models\Capability;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\HeroSlider;
use App\Models\Industry;
use App\Models\InspectionEquipment;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\QuoteRequest;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class FrontendController extends Controller
{
    public function health(): JsonResponse
    {
        return response()->json([
            'status' => 'healthy',
            'timestamp' => now()->toIso8601String(),
        ]);
    }

    public function getHeroSliders(): JsonResponse
    {
        $sliders = HeroSlider::active()->ordered()->get();

        return response()->json([
            'data' => HeroSliderResource::collection($sliders),
        ]);
    }

    public function getProducts(): JsonResponse
    {
        $query = Product::active()->with('category');

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($categoryId = request('category_id')) {
            $query->where('category_id', $categoryId);
        }

        if ($featured = request('featured')) {
            $query->featured();
        }

        $perPage = request('per_page', 12);
        $products = $query->ordered()->paginate($perPage);

        return response()->json([
            'data' => ProductResource::collection($products),
            'meta' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ],
        ]);
    }

    public function getProduct(string $slug): JsonResponse
    {
        $product = Product::where('slug', $slug)
            ->active()
            ->with('category')
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->limit(4)
            ->get();

        return response()->json([
            'data' => new ProductResource($product),
            'related_products' => ProductResource::collection($relatedProducts),
        ]);
    }

    public function getProductCategories(): JsonResponse
    {
        $categories = ProductCategory::active()
            ->withCount('products')
            ->ordered()
            ->get();

        return response()->json([
            'data' => ProductCategoryResource::collection($categories),
        ]);
    }

    public function getProductByCategory(string $slug): JsonResponse
    {
        $category = ProductCategory::where('slug', $slug)
            ->active()
            ->firstOrFail();

        $products = Product::where('category_id', $category->id)
            ->active()
            ->ordered()
            ->paginate(12);

        return response()->json([
            'category' => new ProductCategoryResource($category),
            'data' => ProductResource::collection($products),
            'meta' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ],
        ]);
    }

    public function getCapabilities(): JsonResponse
    {
        $capabilities = Capability::active()->ordered()->get();

        return response()->json([
            'data' => CapabilityResource::collection($capabilities),
        ]);
    }

    public function getInspectionEquipment(): JsonResponse
    {
        $equipment = InspectionEquipment::active()->ordered()->get();

        return response()->json([
            'data' => InspectionEquipmentResource::collection($equipment),
        ]);
    }

    public function getIndustries(): JsonResponse
    {
        $industries = Industry::active()->get();

        return response()->json([
            'data' => IndustryResource::collection($industries),
        ]);
    }

    public function getTestimonials(): JsonResponse
    {
        $testimonials = Testimonial::active()->get();

        return response()->json([
            'data' => TestimonialResource::collection($testimonials),
        ]);
    }

    public function getBlogs(): JsonResponse
    {
        $query = Blog::published();

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $perPage = request('per_page', 9);
        $blogs = $query->latest('published_at')->paginate($perPage);

        return response()->json([
            'data' => BlogResource::collection($blogs),
            'meta' => [
                'current_page' => $blogs->currentPage(),
                'last_page' => $blogs->lastPage(),
                'per_page' => $blogs->perPage(),
                'total' => $blogs->total(),
            ],
        ]);
    }

    public function getBlog(string $slug): JsonResponse
    {
        $blog = Blog::where('slug', $slug)->published()->firstOrFail();

        return response()->json([
            'data' => new BlogResource($blog),
        ]);
    }

    public function getGallery(): JsonResponse
    {
        $query = Gallery::active();

        if ($category = request('category')) {
            $query->where('category', $category);
        }

        $images = $query->latest()->get();

        return response()->json([
            'data' => GalleryResource::collection($images),
        ]);
    }

    public function getSettings(): JsonResponse
    {
        $settings = Setting::all();

        return response()->json([
            'data' => SettingResource::collection($settings),
        ]);
    }

    public function submitContact(StoreContactMessageRequest $request): JsonResponse
    {
        $data = $request->validated();
        $message = ContactMessage::create($data);

        return response()->json([
            'message' => 'Thank you for your message. We will get back to you soon.',
            'data' => new ContactMessageResource($message),
        ], 201);
    }

    public function submitQuoteRequest(StoreQuoteRequest $request): JsonResponse
    {
        $data = $request->validated();
        $quoteRequest = QuoteRequest::create($data);

        return response()->json([
            'message' => 'Your quote request has been submitted successfully. We will contact you shortly.',
            'data' => new QuoteRequestResource($quoteRequest),
        ], 201);
    }
}
