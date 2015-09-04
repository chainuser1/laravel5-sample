@extends('master')

@section('main')
<div class='container-1'>
    <div class='panel panel-success dialog-panel'>
        <div class='panel-heading'>
            <h3 class="title">{!!$email!!} - You're One Step now, Create Your Profile</h3>
        </div>
        <div class='panel-body'>
            <form class='form-horizontal' role='form'>
                <div class="form-group">
                    <label class='control-label col-md-2 col-md-offset-2' for='id_photo'>Profile Photo</label>
                    <div class="col-md-6">
<!--                        <input type="file" name="prof_pic" id="id_photo" />-->
                        <!-- This wraps the whole cropper -->
                        <div id="image-cropper">
                            <!-- This is where the preview image is displayed -->
                            <div class="cropit-image-preview"></div>

                            <!-- This range input controls zoom -->
                            <!-- You can add additional elements here, e.g. the image icons -->
                            <input type="range" class="cropit-image-zoom-input" />

                            <!-- This is where user selects new image -->
                            <input type="file" class="cropit-image-input" name="prof_pic"/>

                            <!-- The cropit- classes above are needed
                      so cropit can identify these elements -->
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Name</label>
                    <div class='col-md-8'>
                        <div class='col-md-2'>
                            <div class='form-group internal'>
                                <select class='form-control' name='title' id='id_title' disabled='true'>
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
                                <input class='form-control' id='id_middle_name' placeholder='Middle Name' type='text' name='fname'>
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
                                <input class='form-control' id='id_email' disabled='true' placeholder='E-mail' type='text' value="{!!$email!!}" name='email'>
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
                        <textarea class='form-control' id='id_comments' placeholder='About Me' rows='3'></textarea>
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-md-offset-4 col-md-3'>
                        <button class='btn-lg btn-success' type='submit'>Create Profile</button>
                    </div>
                    <div class='col-md-3'>
                        <button class='btn-lg btn-danger' style='float:right' type='submit'>Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection