<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Components\CategoryRecusive;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    use StorageImageTrait,DeleteModelTrait;

    private $product;
    private $category;
    private $productImage;
    private $categoryRecusive;
    private $tag;
    private $productTag;

    public function __construct(Product $product, Category $category, CategoryRecusive $categoryRecusive,
                                ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->product = $product;
        $this->category = $category;
        $this->productImage = $productImage;
        $this->categoryRecusive = $categoryRecusive;
        $this->productTag = $productTag;
        $this->tag = $tag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $optionSelect = $this->categoryRecusive->CategoryRecusiveAdd();
        return view('admin.product.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $dataProductCreate = ([
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'slug' => Str::slug($request->name, '-'),
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ]);
        $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if (!empty($dataUpload)) {
            $dataProductCreate['feature_image_path'] = $dataUpload['image_path'];
            $dataProductCreate['feature_image_name'] = $dataUpload['image_name'];
        }
        $product = $this->product->create($dataProductCreate);
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataUploadMutiple = $this->storageTraitMutiUpload($fileItem, 'product');
                $product->images()->create([
                    'image_name' => $dataUploadMutiple['image_name'],
                    'image_path' => $dataUploadMutiple['image_path']
                ]);
            }
        }
        $tagIds = [];
        if (!empty($request->tags)) {
            foreach ($request->tags as $tagItem) {
                // Insert to tags
                $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                $tagIds[] = $tagInstance->id;
            }

        }
        $product->tag()->attach($tagIds);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $optionSelect = $this->categoryRecusive->CategoryRecusiveEdit($product->category_id);
        return view('admin.product.edit', compact('product', 'optionSelect'));
    }

    public function update(Request $request, $id)
    {
        $dataProductUpdate = ([
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'slug' => Str::slug($request->name, '-'),
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ]);
        $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if (!empty($dataUpload)) {
            $dataProductUpdate['feature_image_path'] = $dataUpload['image_path'];
            $dataProductUpdate['feature_image_name'] = $dataUpload['image_name'];
        }
        $this->product->find($id)->update($dataProductUpdate);
        $product = $this->product->find($id);
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $this->productImage->where('product_id', $id)->delete();
                $dataUploadMutiple = $this->storageTraitMutiUpload($fileItem, 'product');
                $product->images()->create([
                    'image_name' => $dataUploadMutiple['image_name'],
                    'image_path' => $dataUploadMutiple['image_path']
                ]);
            }
        }
        $tagIds = [];
        if (!empty($request->tags)) {
            foreach ($request->tags as $tagItem) {
                // Insert to tags
                $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                $tagIds[] = $tagInstance->id;
            }

        }
        $product->tag()->sync($tagIds);
        return redirect()->route('products.index');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->product);
    }
}
