@extends('admin.admin-master')

@section('content')
<div class="content">
    <div class="bg-white border rounded">
        <div class="row no-gutters">
            <div class="col-lg-4 col-xl-3">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="card text-center widget-profile px-0 border-0">
                        <div class="card-img mx-auto rounded-circle">
                            <img src="{{ (!empty($admin->profile_photo_path)) ? url('upload/admin/'.$admin->profile_photo_path) : url('upload/placeholder.jpg') }}" alt="user image">
                        </div>
                        <div class="card-body">
                            <h4 class="py-2 text-dark">{{ auth()->user()->name }}</h4>
                            <p>{{ auth()->user()->email }}</p>
                            <a class="btn btn-primary btn-rounded my-4" href="{{ route('admin.profile.edit') }}">Edit Profile</a>
                        </div>
                    </div>
                    <hr class="w-100">
                    <div class="contact-info pt-4">
                        <h5 class="text-dark mb-1">Contact Information</h5>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                        <p>{{ auth()->user()->email }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
                        <p class="pb-3 social-button">
                            <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                            <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                                <i class="mdi mdi-linkedin"></i>
                            </a>
                            <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                            <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
                                <i class="mdi mdi-skype"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="profile-content-right py-5">
                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="timeline-tab" data-toggle="tab" href="#timeline"
                                role="tab" aria-controls="timeline" aria-selected="true">Timeline</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                                aria-controls="settings" aria-selected="false">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content px-3 px-xl-5" id="myTabContent">
                        <div class="tab-pane fade active show" id="timeline" role="tabpanel"
                            aria-labelledby="timeline-tab">
                            <div class="media mt-5 profile-timeline-media">
                                <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                    <img src="{{ (!empty($admin->profile_photo_path)) ? url('upload/admin/'.$admin->profile_photo_path) : url('upload/placeholder.jpg') }}" alt="Generic placeholder image" width="50">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 text-dark">Larissa Gebhardt</h6>
                                    <span>Designer</span>
                                    <span class="float-right">5 mins ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore
                                        magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris
                                        nisi ut aliquip.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
