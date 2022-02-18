@extends('layouts.base')

@section('title', $list['title'])

@section('content')

<h1>
   {{ $list['title'] }}
</h1>

<p>{{ $list['description'] }}</p>   
<p>Status : {{ $list['status'] == 0 ? 'open' : 'done' }}</p>   
<p>Amount : {{ $list['amount'] }}</p>   


@endsection