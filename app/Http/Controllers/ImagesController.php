<?php


namespace App\Http\Controllers;


use App\Repositories\ImageRepositoryInterface;

class ImagesController extends Controller
{
    private $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function list($id)
    {
        $images = $this->imageRepository->getImagesByCategoryId($id);
        return view('images.list', compact('images'));

    }

}