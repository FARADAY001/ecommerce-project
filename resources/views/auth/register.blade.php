@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">S'identifier</h4>
	<p class="">Bonjour, Bienvenue sur votre compte.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Connexion avec Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Connexion avec twitter</a>
	</div>

	<form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login')}}">
        @csrf

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Adresse e-mail <span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Mot de passe <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" >
		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Souvenez-vous de moi !
		  	</label>
		  	<a href="{{route('password.request')}}" class="forgot-password pull-right">Mot de passe oublié ?</a>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Se connecter</button>
	</form>		
    
    
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Créer un nouveau compte</h4>
	<p class="text title-tag-line">Créez votre compte.</p>


	<form method="POST" action="{{ route('register') }}">
        @csrf

		
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Nom <span>*</span></label>
		    <input type="text" id="name" name="name" class="form-control unicase-form-control text-input" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

        <div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Adresse email <span>*</span></label>
	    	<input type="email" id="email" class="form-control unicase-form-control text-input"  >
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
	  	</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">N° de téléphone <span>*</span></label>
		    <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input" >
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Mot de passe  <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirmer mot de passe <span>*</span></label>
		    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" >
		</div>

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">S'enregistrer</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

        @include('frontend.body.brands')

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection