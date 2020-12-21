<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Stats;
use App\Operations\StatsUpdateOperation;
use Illuminate\Http\Request;

class StatsController extends Controller
{
  public function show($id)
  {
    $channel = Channel::where('url', $id)->firstOrFail();
    return view('stats.show', [
      'channel' => $channel,
      'stats' => $channel->stats()->get()
    ]);
  }

  public function update($id)
  {
    $channel = StatsUpdateOperation::run(['channel_url' => $id]);
    return view('stats.show', [
      'channel' => $channel,
      'stats' => $channel->stats()->get()
    ]);
  }
}
