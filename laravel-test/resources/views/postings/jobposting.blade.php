@extends('pages.master')

@section('title', 'Job Postings')

@section('header')
    {{$companyName}} – {{$jobTitle}}
@stop

@section('content')
    {{$jobDescription}}

    @if(isset($contacts) && count($contacts))
        <h2>Contact us:</h2>
        <ul>
            @foreach($contacts as $contact)
                <li>{{$contact}}</li>
            @endforeach
        </ul>
    @else
        <h2>NO CONTACT INFORMATION</h2>
    @endif
@stop


