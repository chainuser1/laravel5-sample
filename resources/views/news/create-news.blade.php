@extends('news.news')
@section('admin-only')
<?php $title="Add News";?>
<?php $action="/news/store"; ?>
@include('news.shared_form')
@stop