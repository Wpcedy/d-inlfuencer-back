<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfluencerRequest;
use App\Models\Influencer as InfluencerModel;

class InfluencerController extends Controller
{
    public function index()
    {
        $influencers = InfluencerModel::get();

        return response()->json(['data' => $influencers], 200);
    }

    public function new(InfluencerRequest $request)
    {
        $dataForm = $request->all();

        $data = $this->createInfluencer($dataForm);

        return response()->json($data, 201);
    }

    protected function createInfluencer(array $data)
    {
        return InfluencerModel::create([
            'name' => $data['name'],
            'instagram' => $data['instagram'],
            'followers' => $data['followers'],
            'category' => $data['category'],
        ]);
    }
}
