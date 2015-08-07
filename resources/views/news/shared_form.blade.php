<div class="modal-emerald" style="z-index: 1790; margin-top: 7em;">

    <div class="modal-header">
        <h3 class="title">{!!$title!!}</h3>
    </div>
    <div class="modal-body ">
        <div class="form-group col-sm-10 center">

            <input type="hidden" value="{!!$action!!}" name="action"/>
            <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
            @if(isset($story))
            <input type="text" name="title"  class="input-lg form-control"
                   value="{!!$story->title!!}"    placeholder="Enter the title of your news"/><br>
            <label class="" for="content">Content</label>
            <textarea class="form-control input-lg text-justify" name="content" rows="7"  style="max-width: 700px;max-height: 400px;" value="">{!!str_replace('<br>','\n',$story->content)!!}</textarea><br>
            <label>Date Published: </label><br>
            <input type="text" class="input-lg datetimepicker"  name="created_at" value="{!!$story->created_at!!}"/><br>
            @else
            <input type="text" name="title" id="title" class="input-lg form-control"
                     placeholder="Enter the title of your news"/><br>
            <label class="" for="content">Content</label>
            <textarea class="form-control input-lg text-justify" name="content" rows="7"  style="max-width: 700px;max-height: 400px;"></textarea><br>
            <label>Date Published: </label><br>
            <input type="text" class="input-lg datetimepicker" id="created_at" name="created_at" /><br>

            @endif
        </div>
    </div>
    <div class="modal-footer">
        <div class="form-group">
            <button class="btn btn-lg btn-success">Save Your News</button>
            &nbsp;&nbsp;<input type="reset" class="btn btn-lg btn-warning" value="Reset"/>
        </div>
    </div>
</div>