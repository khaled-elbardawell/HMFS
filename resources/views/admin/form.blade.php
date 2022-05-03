@extends('layouts.admin.master')

@section('css')
    <link href="{{CustomAsset('admin/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">

@endsection


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Crovex</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">UI Kit</a></li>
                        <li class="breadcrumb-item active">Form Elements</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Elements</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

     <form>
         <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Basic Form</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Text</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-3 col-form-label text-right">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-3 col-form-label text-right">Telephone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-right">Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-right">Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-right">Date and time</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-color-input" class="col-sm-3 col-form-label text-right">Color</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="color" value="#125eff" id="example-color-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Select</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Select</option>
                                            <option>Large select</option>
                                            <option>Small select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Custom Select</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select">
                                            <option selected="">Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-lg" class="col-sm-3 col-form-label text-right">Large</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-sm" class="col-sm-3 col-form-label text-right">Small</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" id="example-text-input-sm">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label text-right">Example select</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="exampleFormControlSelect2" class="col-sm-3 col-form-label text-right">Example multiple select</label>
                                    <div class="col-sm-9">
                                        <select multiple="" class="form-control" id="exampleFormControlSelect2">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlTextarea1" class="col-sm-3 col-form-label text-right">Example textarea</label>

                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-3 col-form-label text-right">Search</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-3 col-form-label text-right">URL</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-3 col-form-label text-right">Date</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-month-input" class="col-sm-3 col-form-label text-right">Month</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="month" value="2011-08" id="example-month-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-week-input" class="col-sm-3 col-form-label text-right">Week</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-time-input" class="col-sm-3 col-form-label text-right">Time</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label text-right">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control form-control-success" id="inputHorizontalSuccess" placeholder="name@example.com">
                                        <div class="form-control-feedback">Success! You've done it.</div>
                                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group row has-warning">
                                    <label for="inputHorizontalWarning" class="col-sm-3 col-form-label text-right">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control form-control-warning" id="inputHorizontalWarning" placeholder="name@example.com">
                                        <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group row has-error">
                                    <label for="inputHorizontalDnger" class="col-sm-3 col-form-label text-right">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control form-control-danger" id="inputHorizontalDnger" placeholder="name@example.com">
                                        <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-gradient-primary">Save</button>
                        <button type="reset" class="btn btn-gradient-danger">Clear</button>
                        <a href="#" class="btn btn-gradient-info">Back</a>
                    </div><!--end card-body-->
                </div><!--end card-->

                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Basic Form</h4>

                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->

                <div class="card">
                    <div class="card-body">
                        <h5 class="mt-0">Checkboxs</h5>
                        <div class="general-label">
                                <div class="form-group row">
                                    <label class="col-md-3 my-2 control-label">Checkboxes</label>
                                    <div class="col-md-9">
                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck02" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck02">Unchecked</label>
                                            </div>
                                        </div>
                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck3">Checked</label>
                                            </div>
                                        </div>
                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheckDisabled" disabled="">
                                                <label class="custom-control-label"> Disabled Unchecked </label>
                                            </div>
                                        </div>
                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheckDisabled"> Disabled Checked </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--end row-->

                                <div class="form-group mb-0 row">
                                    <label class="col-md-3 my-2 control-label">Inline Checkboxes</label>
                                    <div class="col-md-9">

                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck6" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck6">HTML</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck7" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck7">CSS</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck8" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck8">Javascript</label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end row-->
                        </div><!--end general-->
                    </div><!--end card-body-->
                </div><!--end card-->

                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Switches</h4>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                </div>

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <div class="custom-control custom-switch switch-primary">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchPrimary" checked>
                                    <label class="custom-control-label" for="customSwitchPrimary">Primary</label>
                                </div>

                                <div class="custom-control custom-switch switch-secondary">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchSecondary" checked>
                                    <label class="custom-control-label" for="customSwitchSecondary">Secondary</label>
                                </div>

                                <div class="custom-control custom-switch switch-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchSuccess" checked>
                                    <label class="custom-control-label" for="customSwitchSuccess">Success</label>
                                </div>

                                <div class="custom-control custom-switch switch-warning">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchWarning" checked>
                                    <label class="custom-control-label" for="customSwitchWarning">Warning</label>
                                </div>

                                <div class="custom-control custom-switch switch-info">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchInfo" checked>
                                    <label class="custom-control-label" for="customSwitchInfo">Info</label>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="custom-control custom-switch switch-danger">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchDanger" checked>
                                    <label class="custom-control-label" for="customSwitchDanger">Danger</label>
                                </div>

                                <div class="custom-control custom-switch switch-dark">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchDark" checked>
                                    <label class="custom-control-label" for="customSwitchDark">Dark</label>
                                </div>

                                <div class="custom-control custom-switch switch-purple">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchPurple" checked>
                                    <label class="custom-control-label" for="customSwitchPurple">Purple</label>
                                </div>

                                <div class="custom-control custom-switch switch-pink">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchPink" checked>
                                    <label class="custom-control-label" for="customSwitchPink">Pink</label>
                                </div>

                                <div class="custom-control custom-switch switch-blue">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchBlue" checked>
                                    <label class="custom-control-label" for="customSwitchBlue">Blue</label>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->


                    </div><!--end card-body-->
                </div><!--end card-->

                <div class="card">
                    <div class="card-body">
                        <h5 class="mt-0">Radios</h5>
                        <div class="general-label">
                                <div class="form-group row">
                                    <label class="col-md-3 my-2 control-label">Radios</label>
                                    <div class="col-md-9">
                                        <div class="my-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">checked</label>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio4" checked="" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">checked</label>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="radio5" name="radioDisabled" class="custom-control-input" disabled="">
                                                <label class="custom-control-label"> Disabled radio</label>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="radio6" name="radioDisabled" checked="" class="custom-control-input" disabled="">
                                                <label class="custom-control-label"> Disabled selected</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- form-group -->

                                <div class="form-group mb-0 row">
                                    <label class="col-md-3 my-1 control-label">Inline Radios</label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio7" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio7">HTML</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio8" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio8">css</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio9" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio9">Javascript</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--end row-->
                        </div><!--end general-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="mt-0 header-title">File Upload 1</h4>
                         <p class="text-muted mb-3">Your so fresh input file — Default version</p>
                         <input  type="file" id="input-file-now" class="dropify" />
                     </div><!--end card-body-->
                 </div><!--end card-->

                 <div class="card">
                     <div class="card-body">
                         <h4 class="mt-0 header-title">Tinymce wysihtml5</h4>
                         <p class="text-muted mb-3">Bootstrap-wysihtml5 is a javascript
                             plugin that makes it easy to create simple, beautiful wysiwyg editors
                             with the help of wysihtml5 and Twitter Bootstrap.
                         </p>
                         <form method="post">
                             <textarea id="elm1" name="area"></textarea>
                         </form>
                     </div><!--end card-body-->
                 </div><!--end card-->
             </div> <!-- end col -->
        </div><!--end row-->
     </form>
@endsection


@section('js')
    <script src="{{CustomAsset('admin/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{CustomAsset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>

    <!--Wysiwig js-->
    <script src="{{CustomAsset('admin/plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{CustomAsset('admin/assets/pages/jquery.form-editor.init.js')}}"></script>
@endsection
