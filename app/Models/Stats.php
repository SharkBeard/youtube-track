<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function channel()
    {
      return $this->belongsTo(Channel::class);
    }

    public function getViewDeltaPositiveAttribute()
    {
      return $this->view_delta > 0;
    }

    public function getViewDeltaNegativeAttribute()
    {
      return $this->view_delta < 0;
    }

    public function getViewDeltaHtmlAttribute()
    {
      if ($this->view_delta_negative)
        return '<span class="negative">'.$this->view_delta.'</span>';
      elseif ($this->view_delta_positive)
        return '<span class="positive">+'.$this->view_delta.'</span>';
      else return '0';
    }
}
