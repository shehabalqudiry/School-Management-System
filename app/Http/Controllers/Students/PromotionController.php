<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\Students\Promotions\PromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    protected $PromotionRepo;

    public function __construct(PromotionRepositoryInterface $PromotionRepo)
    {
        $this->PromotionRepo = $PromotionRepo;
    }

    // Index
    public function index()
    {
        return $this->PromotionRepo->index();
    }

    public function create()
    {
        return $this->PromotionRepo->create();
    }

    public function store(Request $request)
    {
        return $this->PromotionRepo->store($request);
    }

    public function destroy(Request $request)
    {
        return $this->PromotionRepo->destroy($request);
    }


}
