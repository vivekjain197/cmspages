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
							Pages
							</h4>
                        </div>
                        <div class="panel-body">
                            <div class="clearfix"></div><br>
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
                            &nbsp;
                            <a href="/admin/pages/create" class="btn btn-success">Add New</a>
                            <br>&nbsp;
                            <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($records as $row){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->title;?></td>
                                        <td><?php echo $row->slug;?></td>
                                        <td>
											<a href="<?php echo url('/admin/pages/edit/'.$row->id);?>">
                                            <button class="btn btn-success"> <i class="fa fa-edit"></i></button></a>
											<a href="<?php echo url('/admin/pages/delete/'.$row->id);?>">
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            {{-- {{ $records->links("pagination::bootstrap-4") }} <br>Total {{ $records->total() }} records. --}}
                        </div>
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