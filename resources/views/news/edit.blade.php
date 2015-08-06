@extends('news.news')
@section('admin-only')
<?php $title="Edit This News";?>
<?php $action=URL::to('/')."/news/update";?>
@include('news.shared_form')
@stop