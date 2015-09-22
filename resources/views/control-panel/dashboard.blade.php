<h3 class="h3 text-light text-center amersicome center-block  ">DashBoard  </h3>
@if(isset($no_of_users))
<div class="row">
    <div class="col-sm-6 col-md-2">
        <div class="thumbnail">
            <p class="text-center text-danger loader-blip">{!!$no_of_users!!}</p>
            <div class="caption">
                <h3 class="text-success">Registered Accounts</h3>
                <p class="text-left">The number indicates all registered accounts (except yours).</p>
<!--                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>-->
            </div>
        </div>
    </div>
</div>
@endif