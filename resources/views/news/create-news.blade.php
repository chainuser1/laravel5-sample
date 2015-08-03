@extends('news.news')
@section('admin-only')
    <div class="modal-emerald" style="z-index: 1790; margin-top: 7em;">

            <div class="modal-header">
                <h3 class="title">Add news</h3>
            </div>
            <div class="modal-body ">
                <div class="form-group col-sm-10 center">
                    <p class="alert"></p>
                    <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                    <input type="text" name="title" id="title" class="input-lg form-control" style="max-width: 700px;" placeholder="Enter the title of your news"/><br>
                    <label class="" for="content">Content</label>
                    <textarea class="form-control input-lg" name="content" rows="7" id="content" style="max-width: 700px;max-height: 400px;"></textarea><br>
                    <label>Date Published: </label><br>
                    <input type="text" class="input-lg datetimepicker" id="created_at" name="created_at" value="{!!Carbon::now()!!}"/><br>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button class="btn btn-lg btn-success">Add News and Leave</button>
                    &nbsp;&nbsp;<input type="reset" class="btn btn-lg btn-warning" value="Reset"/>
                </div>
        </div>
    </div>
@stop