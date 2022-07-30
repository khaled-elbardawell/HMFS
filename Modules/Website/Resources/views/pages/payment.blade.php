@extends('website::layouts.master')

@section('content')

    <!-- Content -->

    <div class="container mt-70 mb-70">
        <?php  use App\Helpers\Builder; ?>
        {!! Builder::Form('POST',route('storeInfoPayments'),"multipart/form-data") !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Organization Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            {!!   Builder::Input('text','organization_name',null,['label_title' => 'admin.Name','use_trans' => true,'is_required' => true]) !!}
                            {!!   Builder::Input('text','country',null,['col' => 'col-lg-6','label_title' => 'admin.Country','use_trans' => true,'is_required' => true]) !!}
                            {!!   Builder::Input('text','city',null,['col' => 'col-lg-6','label_title' => 'admin.City','use_trans' => true,'is_required' => true]) !!}
                            {!!   Builder::Input('text','street',null,['col' => 'col-lg-6','label_title' => 'admin.Street','use_trans' => true,'is_required' => true]) !!}
                            {!!   Builder::Input('text','postal_code',null,['col' => 'col-lg-6','label_title' => 'admin.Postal code','use_trans' => true,'is_required' => true]) !!}
                            {!!   Builder::TextArea('description',null,['label_title' => 'admin.Description','use_trans' => true]) !!}
                            {!!   Builder::FileDropify('logo',['id' => 'logo','label_title' => 'admin.Logo','use_trans' => true,'is_required' => true,'note' => 'Note: The file must be an image of type PNG, JPG and JPEG, the dimensions must be 100 X 20 px, and the maximum image size is 100MB']) !!}
                            {!!   Builder::SwitchCheckBox('organization_status',true,['id' => 'organization_status','label_title' => 'admin.Status','use_trans' => true]) !!}
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <strong>Owner Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                {!!  Builder::Input('email','email',null,['label_title' => 'admin.Email','use_trans' => true,'is_required' => true]) !!}
                                {!!  Builder::Input('text','name',null,['col' => 'col-lg-6','label_title' => 'admin.Name','use_trans' => true,'is_required' => true]) !!}
                                {!!  Builder::Input('text','phone',null,['col' => 'col-lg-6','label_title' => 'admin.Phone','use_trans' => true,'is_required' => true]) !!}
                                {!!  Builder::Input('password','password',null,['col' => 'col-lg-6','label_title' => 'admin.Password','use_trans' => true,'is_required' => true]) !!}
                                {!!  Builder::Input('password','password_confirmation',null,['col' => 'col-lg-6','label_title' => 'admin.Confirm Password','use_trans' => true,'is_required' => true]) !!}
                                {!!  Builder::TextArea('bio',null,['rows' => 5 ,'label_title' => 'admin.Bio','use_trans' => true]) !!}
                                {!!  Builder::SwitchCheckBox('status',false,['id' => 'customSwitchSuccess','label_title' => 'admin.Status','use_trans' => true]) !!}
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div class="col-12 mt-2 mb-5">
                    <button type="submit" class="btn btn-gradient-primary">Send</button>
            </div>
            </div><!--end row-->
        {!! Builder::EndForm() !!}
    </div>

    <!-- End Content -->

@endsection
