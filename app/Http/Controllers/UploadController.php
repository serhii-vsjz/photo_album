<?php

namespace App\Http\Controllers;

use App\Image;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function upload(Request $request)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->getCategoryById(
                (int) $request->get('category_id')
            );

            $pathName = $category->id;
            $path = Storage::disk('public')->putFile($pathName, $request->file('image'));

            $image = new Image();
            $image->file_name = $path;
            //$image->file_name = $fileName;
            $image->category()->associate($category);
            $image->save();

            DB::commit();
            return redirect(route('upload_image'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
        }
    }

    public function create()
    {
        $categories = $this->categoryRepository->getUserCategories($this->getUser());
        return view('upload.add', compact('categories'));
    }
}
