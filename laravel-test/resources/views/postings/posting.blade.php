@extends('pages.master')

@section('title', 'Job Postings')

@section('header')
    {{$companyName}} – {{$jobTitle}}
@stop

@section('content')
    {{$jobDescription}}
@stop


