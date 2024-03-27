@extends('Dashboard.layouts.master')
@section('css')
@include('Dashboard.layouts.tableCSS')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">فئات الأجهزة / </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">عرض الكل</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')


				<!-- row -->
				<div class="row">


					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                                        اضافة فئة أجهزة جديدة
                                        </button>

								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap table-hover table-striped" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم الفئة</th>
												<th class="wd-15p border-bottom-0">الوصف</th>
                                                <th class="wd-20p border-bottom-0">تاريخ الإضافة</th>
                                                <th class="wd-20p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($categories as $category)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><a href={{ route('categories.show' , $category->id)}}>{{ $category->name }}</a></td>
                                                <td><a href={{ route('categories.show' , $category->id) }}>{{ $category->description }}</a> </td>
                                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$category->id}}"><i class="las la-pen"></i></a>
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$category->id}}"><i class="las la-trash"></i></a>
                                                </td>

                                                @include('Dashboard.Categories.edit')
                                                @include('Dashboard.Categories.delete')
                                            @endforeach


										</tbody>
									</table>
								</div>
                                @include('Dashboard.Categories.add')
							</div>
						</div>
					</div>
					<!--/div-->




				</div>


			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')
            @include('Dashboard.layouts.tableJS')
@endsection
