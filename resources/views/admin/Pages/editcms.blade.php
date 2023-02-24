@extends('layouts.admin')
@section('content')
<div class="sidebar-bg"></div>
		<div id="content" class="content">
			<div class="row">
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">
							Edit
							</h4>
						</div>
						<div>
							<div class="clearfix"></div><br>
							@if ($message = Session::get('success'))
								<div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>	
									<strong>{{ $message }}</strong>
								</div>
							@endif
							@if ($message = Session::get('error'))
								<div class="alert alert-danger alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>	
									<strong>{{ $message }}</strong>
								</div>
							@endif
						</div>
                        <div class="panel-body">
                            {{ Form::model($cmspage, array('url'=>url('admin/pages/update/'.$cmspage->id), 'method' => 'POST','class'=>'register-form','files'=>true,'id'=>'post_member')) }}
						
							<div class="row">
								<div class="form-group col-md-12">
									<label>Title</label>
									{{ Form::text('title', old('title') , array('class'=>'form-control'))}}
									<span class='error_controlx'><?php if ($errors->has('title')){
										echo $errors->first('title');
									}?></span>
								</div>
								<div class="form-group col-md-12">
									<label>Pages</label>
									<select class="form-control" name="parent_id" id="parent_id">
										<option value="">--Select--</option>
										@foreach ($dropdownpages as $dropdownpage)
											<option  
											@if(isset($dropdownpage->id) && $dropdownpage->id == $cmspage->id)
												selected = 'selected'
											@endif
												value="{{ $dropdownpage->id }}">{{ $dropdownpage->title }}</option>
											@if(count($dropdownpage->subpages))
												@include('admin.Pages.sub_pages',['subages' => $dropdownpage->subpages,'parent' => $dropdownpage->title,'cmspage'=>$cmspage])
											@endif
										@endforeach
									</select>
									<span class='error_controlx'><?php if ($errors->has('parent_id')){
										echo $errors->first('parent_id');
									}?></span>
								</div>
								<div class="form-group col-md-12">
									<label>Short Description</label>
									{{ Form::textarea('short_description', old('short_description') , array('class'=>'form-control ckeditor'))}}
									<span class='error_controlx'><?php if ($errors->has('short_description')){
										echo $errors->first('short_description');
									}?></span>
								</div>
								<div class="form-group col-md-12">
									<label>Long Description</label>
									{{ Form::textarea('long_description', old('long_description') , array('class'=>'form-control ckeditor'))}}
									<span class='error_controlx'><?php if ($errors->has('long_description')){
										echo $errors->first('long_description');
									}?></span>
								</div>
								<div class="form-group">
									<button class="btn btn-dark btn-lg btn-block btn-block1 mt-15" name="submit" type="submit" style="float:left; margin-left:15px; margin-right:18px; width:100px;">Submit</button>
								</div>
							</div>
						{!! Form::close() !!}
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-10 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
		<!-- begin theme-panel -->
        <!-- end theme-panel -->
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
@endsection