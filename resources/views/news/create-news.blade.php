@extends('news.news')
@section('admin-only')

    <div class="panel fancybox-skin" style="z-index: 1790; margin-top: 7em;">
        <div class="panel-heading">
            <h3 class="h2">Add news</h3>
        </div>
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{!!$error!!}</p>
        @endforeach
        {!!Form::open(['url'=>'/news/store','class'=>'form-horizontal','method'=>'post'])!!}
        <div class="panel-body">
            {
            <div class="form-group col-sm-10 center">
                <input type="text" name="title" class="input-lg form-control" style="max-width: 700px;" placeholder="Enter the title of your news"/><br>
                <label class="" for="content">
                    Content
                </label>
                <textarea class="form-control input-lg" name="content" rows="7" id="content" style="max-width: 700px;max-height: 400px;"></textarea><br>
                <label>Date Published: </label><br>
                <input type="text" class="input-lg datetimepicker"  name="created_at" value="{!!Carbon::now()!!}"/><br>
            </div>
        </div>
         <div class="panel-footer">
                <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-primary" value="Create News"/>
                    &nbsp;&nbsp;<input type="reset" class="btn btn-lg btn-danger" value="Reset"/>
                </div>
         </div>
        {!!Form::close()!!}

    </div>
@stop