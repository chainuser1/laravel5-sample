@extends('news.news')
@section('admin-only')
<?php $title="Edit This News";?>
<?php $action="/news/update";?>
@include('news.shared_form')
@endsection