@extends('master')

@section('main')
<div class='container-1'>
    <div class='panel panel-success dialog-panel'>
        <div class='panel-heading'>
            <h3 class="title">{!!$email!!} - You're One Step now, Create Your Profile</h3>
        </div>
        <div class='panel-body'>
            <form class='form-horizontal' role='form' enctype="multipart/form-data" method="post" action="{!!URL::to('profile/store')!!}" id="form_id">
                <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                <div class="form-group">
                    <label class='control-label col-md-2 col-md-offset-2' for='id_photo'>Profile Photo</label>
                    <div class="col-md-6">
                            <input type="file" class="cropit-image-input" name="prof_pic"/>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Name</label>
                    <div class='col-md-8'>
                        <div class='col-md-2'>
                            <div class='form-group internal'>
                                <select class='form-control' name='title' id='id_title'>
                                    <option>Mr</option>
                                    <option>Ms</option>
                                    <option>Mrs</option>
                                    <option>Miss</option>
                                    <option>Dr</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-md-3 indent-small'>
                            <div class='form-group internal'>
                                <input class='form-control' id='id_first_name' placeholder='First Name' type='text' name='fname'>
                            </div>
                        </div>
                        <div class='col-md-3 indent-small'>
                            <div class='form-group internal'>
                                <input class='form-control' id='id_middle_name' placeholder='Middle Name' type='text' name='mname'>
                            </div>
                        </div>
                        <div class='col-md-3 indent-small'>
                            <div class='form-group internal'>
                                <input class='form-control' id='id_last_name' placeholder='Last Name' type='text' name='lname'>
                            </div>
                        </div>
                    </div>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Birth date</label>
                    <div class="col-md-4 indent-small">
                    <div class="col-md-6">
                        <div class='form-group internal'>
                            <input class='form-control' id='id_birthday' placeholder='When you were born?' type='text' name='birthday'>
                        </div>
                    </div>
                </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Contact</label>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <div class='col-md-11'>
                                <input class='form-control disabled' id='id_email'  placeholder='E-mail' type='text' value="{!!$email!!}" name='email'/>
                            </div>
                        </div>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id='id_address' placeholder='Address' type='text' name='address'>
                            </div>
                        </div>
                    </div>
                </div>



                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_comments'>About Yourself</label>
                    <div class='col-md-6'>
                        <textarea class='form-control input-lg' id='id_comments' placeholder='About Me' rows='3' name="about_me"></textarea>
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-md-offset-4 col-md-3'>
                        <button class='btn-lg btn-success' type='submit'>Create Profile</button>
                    </div>
                    <div class='col-md-3'>
                        <button class='btn-lg btn-danger' style='float:right' type='reset'>Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection