@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) 
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Tables</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Tables</li>
                              <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
      -->

      <!-- Main content -->
      <section class="content">
        <div class="row">

          
          <!-- /.col -->


        <!--  Add Brand page  -->

        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Modifier une categorie</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">


                    <form method="post" action="{{ route('category.update',$category->id) }}" >
                        @csrf

                        <input type="hidden" name="id" value="{{ $category->id }}">
    
                        <div class="form-group">
                            <h5>Nom de la categorie en anglais <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}"> 
                                @error('category_name_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Nom de la categorie en français<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_fr" class="form-control" value="{{$category->category_name_fr}}"> 
                                @error('category_name_fr')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>icone de la categorie <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_icon" class="form-control" value="{{$category->category_icon}}" > 
                                @error('category_icon')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>  

                         
     
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Modifier">
                        </div>
                    </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
                     
           </div>
        
                  
        </div>


        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>


@endsection 