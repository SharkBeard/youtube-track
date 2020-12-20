<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Stats;
use Illuminate\Http\Request;

class StatsController extends Controller
{
  public function show($id)
  {
    $channel = Channel::findOrFail($id);
    return view('stats.show', [
      'channel' => $channel,
      'stats' => $channel->stats()->get()
    ]);
  }
}
