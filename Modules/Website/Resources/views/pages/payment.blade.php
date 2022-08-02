@extends('website::layouts.master')

@section('content')

    <!-- Content -->

    <div class="container mt-70 mb-70">
        <h3 class="section-title w-75 w-md-100 mb-50 mt-15 text-center mx-auto wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Payment Info</h3>
        <div class="contact-form-style mt-80">
            <?php  use App\Helpers\Builder; ?>
            {!! Builder::Form('POST',route('storeInfoPayments'),"multipart/form-data") !!}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="contact-from-area padding-20-row-col">
                                <div class="card-body">
                                    <div class="row">
                                        {!!   Builder::Input('text','organization_name',null,['label_title' => 'admin.Name','use_trans' => true,'is_required' => true]) !!}
                                        {!!   Builder::Input('text','country',null,['col' => 'col-lg-6','label_title' => 'admin.Country','use_trans' => true,'is_required' => true]) !!}
                                        {!!   Builder::Input('text','city',null,['col' => 'col-lg-6','label_title' => 'admin.City','use_trans' => true,'is_required' => true]) !!}
                                        {!!   Builder::Input('text','street',null,['col' => 'col-lg-6','label_title' => 'admin.Street','use_trans' => true,'is_required' => true]) !!}
                                        {!!   Builder::Input('text','postal_code',null,['col' => 'col-lg-6','label_title' => 'admin.Postal code','use_trans' => true,'is_required' => true]) !!}
                                        {!!   Builder::TextArea('description',null,['label_title' => 'admin.Description','use_trans' => true]) !!}
                                        {!!   Builder::FileDropify('logo',['id' => 'logo','label_title' => 'admin.Logo','use_trans' => true,'is_required' => true,'note' => 'Note: The file must be an image of type PNG, JPG and JPEG, the dimensions must be 100 X 100 px, and the maximum image size is 100MB']) !!}
                                    </div><!--end card-body-->
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="contact-from-area padding-20-row-col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        {!!  Builder::Input('email','email',null,['label_title' => 'admin.Email','use_trans' => true,'is_required' => true]) !!}
                                        {!!  Builder::Input('text','name',null,['col' => 'col-lg-6','label_title' => 'admin.Name','use_trans' => true,'is_required' => true]) !!}
                                        {!!  Builder::Input('text','phone',null,['col' => 'col-lg-6','label_title' => 'admin.Phone','use_trans' => true,'is_required' => true]) !!}
                                        {!!  Builder::Input('password','password',null,['col' => 'col-lg-6','label_title' => 'admin.Password','use_trans' => true,'is_required' => true]) !!}
                                        {!!  Builder::Input('password','password_confirmation',null,['col' => 'col-lg-6','label_title' => 'admin.Confirm Password','use_trans' => true,'is_required' => true]) !!}
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div>
                    </div><!--end col-->
                    <div class="col-12 mt-2 mb-5">
                        <button type="submit" class="btn btn-primary">Pay With PayPal</button>
                    </div>
                </div><!--end row-->
            {!! Builder::EndForm() !!}
        </div>

    </div>

    <!-- End Content -->

@endsection




{{-- <div class="row">
    <div class="col-xl-9 col-md-12 mx-auto">
        <div class="contact-from-area padding-20-row-col">
            <form class="contact-form-style mt-80" id="contact-form" action="{{route('sendContactUs')}}" method="POST">
                @csrf
                <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <div class="col-lg-6 col-md-6">
                        <div class="input-style mb-20">
                            <input name="name" placeholder="Name *" type="text">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="input-style mb-20">
                            <input name="email" placeholder="Your Email *" type="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="input-style mb-20">
                            <input name="phone" placeholder="Your Phone *" type="tel">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="input-style mb-20">
                            <input name="subject" placeholder="Subject *" type="text">
                            @error('subject')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 text-center">
                        <div class="textarea-style mb-30">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <button class="submit submit-auto-width" type="submit">Send message</button>
                    </div>
                </div>
            </form>
            <p class="form-messege"></p>
        </div>
    </div>
</div> --}}
