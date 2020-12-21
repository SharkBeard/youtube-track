<?php
namespace App\Operations;

use App\Models\Channel;
use App\Models\Stats;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class StatsUpdateOperation extends Operation
{
  protected $channel_url;

  function process() 
  {
    $channel = Channel::where('url', $this->channel_url)->firstOrFail();
    $stats = $this->getStats($channel->url);
    $delta = $this->getDelta(Carbon::yesterday(), $stats['view_count'], $channel);

    $today = Stats::updateOrCreate([
      'capture_date' => Carbon::today(),
      'channel_id' => $channel->id
    ], [
      'view_count' => $stats['view_count'],
      'view_delta' => $delta,
    ]);
    return Channel::where('url', $this->channel_url)->firstOrFail();
  }

  function getStats($name)
  {
    $response = Http::get("http://youtube.com/$name/about");
    if (!$response->ok()) { throw new \Exception(); }
    return ['view_count' => rand(123456, 150000)];
  }

  function getDelta($date, $views, $channel)
  {
    $delta = 0;
    $yesterday = $channel->stats()->where('capture_date', $date)->first();
    if ($yesterday) $delta = $views - $yesterday->view_count;

    return $delta;
  }
}
