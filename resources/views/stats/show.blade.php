@extends('layouts.app')

@section('content')
<div class="container bg-white">
  <div class="py-3">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h1>Channel Views from {{ $channel->url }}</h1>
    <p class="lead">Recent Views</p>
  </div>
  <div class="text-center">
    <ul>
      @foreach ($stats as $statblock)
        <li>
          <strong>{{ $statblock->capture_date }} : </strong>
          {{ $statblock->view_count }}
          ( {!! $statblock->view_delta_html !!} )
        </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
