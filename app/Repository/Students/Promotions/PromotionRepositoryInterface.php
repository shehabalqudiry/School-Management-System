<?php

namespace App\Repository\Students\Promotions;

interface PromotionRepositoryInterface {

    public function index();

    public function create();

    public function store($request);

    public function destroy($request);

}

