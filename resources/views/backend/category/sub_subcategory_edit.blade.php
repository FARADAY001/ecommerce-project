@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->

<div class="container-full">
	<!-- Content Header (Page header) -->


	<!-- Main content -->
	<section class="content">
		<div class="row">

<!--   ------------ Add Sub Sub Category Page -------- -->


        <div class="col-12">

			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Modifier sous-sous-catégorie </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


    <form method="post" action="{{ route('subsubcategory.update') }}" >
            @csrf

	            <input type="hidden" name="id" value="{{ $subsubcategories->id }}">				   

                    <div class="form-group">
                        <h5>Sélectionner une catégorie <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" class="form-control"  >
                                <option value="" selected="" disabled="">Sélectionner la catégorie</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected':'' }} >{{ $category->category_name_fr }}</option>	
                                @endforeach
                            </select>
                            @error('category_id') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror 
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Sélection de sous-catégorie <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subcategory_id" class="form-control"  >
                                <option value="" selected="" disabled="">Sélectionnez une sous-catégorie</option>
                                @foreach($subcategories as $subsub)
                                <option value="{{ $subsub->id }}" {{ $subsub->id == $subsubcategories->subcategory_id ? 'selected':'' }} >{{ $subsub->subcategory_name_fr }}</option>	
                                @endforeach
                            </select>
                            @error('subcategory_id') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Sous-sous-catégorie Anglais <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategories->subsubcategory_name_en }}" >
                            @error('subsubcategory_name_en') 
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Sous-sous-catégorie français<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="subsubcategory_name_fr" class="form-control" value="{{ $subsubcategories->subsubcategory_name_fr }}">
                            @error('subsubcategory_name_fr') 
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