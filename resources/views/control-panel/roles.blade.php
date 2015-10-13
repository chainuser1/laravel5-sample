<h3 class="h3 text-light text-center amersicome center-block  ">Roles</h3>
<div class="row">
@if(isset($users))

    <div class="col-sm-6 col-md-2">
        <div class="thumbnail">
            <p class="text-center text-danger loader-blip">{!!$users!!}</p>
            <div class="caption">
                <h3 class="text-success">Users</h3>
                <p class="text-left">The number indicates all registered accounts (users).</p>
                <!--                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>-->
            </div>
        </div>
    </div>

@endif
@if(isset($admin))

    <div class="col-sm-6 col-md-2">
        <div class="thumbnail">
            <p class="text-center text-danger loader-blip">{!!$admin!!}</p>
            <div class="caption">
                <h3 class="text-success">Administrators</h3>
                <p class="text-left">The number indicates all registered accounts (admin).</p>
                <!--                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>-->
            </div>
        </div>
    </div>
</div>
@endif