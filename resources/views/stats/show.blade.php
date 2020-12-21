@extends('layouts.app')

@section('content')
<div class="container bg-white">
  <div class="py-3">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h1>Channel Subs on {{ $channel->url }}</h1>
    <p class="lead">Recent Subscription Count</p>
  </div>
  <div class="text-center">
    <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Subscriptions</th>
          <th scope="col">Change</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($stats as $statblock)
        <tr>
          <td><strong>{{ $statblock->capture_date }}</strong></td>
          <td>{{ $statblock->view_count }}</td>
          <td>( {!! $statblock->view_delta_html !!} )</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
