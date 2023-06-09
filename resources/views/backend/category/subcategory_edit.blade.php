@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	<div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">



<!--   ------------ Add SubCategory Page -------- -->


<div class="col-12">

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Modifier sous-catégorie </h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">


 <form method="post" action="{{ route('subcategory.update') }}" >
	 	@csrf

		 <input type="hidden" name="id" value="{{ $subcategory->id }}">	

	<div class="form-group">
		<h5>Choix de la catégorie <span class="text-danger">*</span></h5>
		<div class="controls">
			<select name="category_id" class="form-control"  >
				<option value="" selected="" disabled="">Sélectionner une catégorie</option>
				@foreach($categories as $category)
				<option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': ''}} >{{ $category->category_name_fr }}</option>	
				@endforeach
			</select>
			@error('category_id') 
			<span class="text-danger">{{ $message }}</span>
			@enderror 
		</div>
	</div>


	<div class="form-group">
		<h5>Sous-catégorie Anglais <span class="text-danger">*</span></h5>
		<div class="controls">
			<input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}" >
			@error('subcategory_name_en') 
			<span class="text-danger">{{ $message }}</span>
			@enderror 
	  	</div>
	</div>


	<div class="form-group">
		<h5>Sous-catégorie français <span class="text-danger">*</span></h5>
		<div class="controls">
		<input type="text" name="subcategory_name_fr" class="form-control" value="{{ $subcategory->subcategory_name_fr }}" >
		@error('subcategory_name_fr') 
		<span class="text-danger">{{ $message }}</span>
		@enderror 
	  </div>
	</div> 

	<div class="text-xs-right">
		<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Mise à jour">					 
	</div>
</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>

@endsection