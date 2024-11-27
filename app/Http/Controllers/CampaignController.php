<?php

namespace App\Http\Controllers;

use App\Http\Requests\addInfluencerRequest;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaign as CampaignModel;
use App\Models\InfluencersCampaigns as InfluencersCampaignsModel;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = CampaignModel::get();

        return response()->json(['data' => $campaigns], 200);
    }

    public function new(CampaignRequest $request)
    {
        $dataForm = $request->all();

        $data = $this->createCampaign($dataForm);

        return response()->json($data, 201);
    }

    protected function createCampaign(array $data)
    {
        return CampaignModel::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'budget' => $data['budget'],
            'start_campaign' => $data['start_campaign'],
            'end_campaign' => $data['end_campaign'],
        ]);
    }

    public function list(Request $request)
    {
        $id = $request->route('id');
        $campaign = CampaignModel::find($id);
        $campaign->influencers;

        return response()->json(['campaign' => $campaign], 200);
    }

    public function add(addInfluencerRequest $request)
    {
        $id = $request->route('id');
        $dataForm = $request->all();

        $data = $this->addInfluencerInCampaign($id, $dataForm);

        return response()->json($data, 200);
    }

    protected function addInfluencerInCampaign($id, array $data)
    {
        return InfluencersCampaignsModel::create([
            'influencer_id' => $data['influencer'],
            'campaign_id' => $id,
        ]);
    }

}
