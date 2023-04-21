@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%" alt=""><br><br>

                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Modifier mon profil</a>
                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Changer mot de passe</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Déconnexion</a>

                </ul>
            </div> <!--- col md 2 --->

            <div class="col-md-2">
                
            </div> <!--- col md 2 --->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">Salut ...</span>
                        <strong>{{ Auth::user()->name}}</strong>
                        actualiser votre profil
                    </h3>

                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Nom <span>*</span>
                                </label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Adresse email <span>*</span>
                                </label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Téléphone <span></span>
                                </label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone}}" >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Image <span></span>
                                </label>
                                <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control" >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Mise à jour</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!--- col md 2 --->

        </div><!--- end row --->
    </div>
</div>

@endsection
