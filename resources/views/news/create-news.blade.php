@extends('news.news')
@section('admin-only')
<?php $action="/news/store"; ?>
@include('news.shared_form')
@stop