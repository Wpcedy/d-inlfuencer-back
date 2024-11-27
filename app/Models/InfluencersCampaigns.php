<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class InfluencersCampaigns extends Model
{
    public $timestamps = false; // Disable timestamps
    protected $fillable = [
        'influencer_id',
        'campaign_id',
    ];
}