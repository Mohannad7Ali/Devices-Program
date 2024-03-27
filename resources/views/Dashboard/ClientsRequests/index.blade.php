@extends('Dashboard.layouts.master')
@section('css')
@include('Dashboard.layouts.tableCSS')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> طلبات الزبائن / </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">عرض الكل</span>
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




								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap table-hover table-striped" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم الزبون</th>
												<th class="wd-15p border-bottom-0">رقم الهاتف</th>
												<th class="wd-15p border-bottom-0">الموقع</th>
												<th class="wd-15p border-bottom-0">الفئة</th>
												<th class="wd-15p border-bottom-0">الجهاز</th>
                                                <th class="wd-15p border-bottom-0">نوع الطلب</th>
												<th class="wd-15p border-bottom-0">حالة الطلب</th>
                                                <th class="wd-20p border-bottom-0">تاريخ الإضافة</th>
                                                <th class="wd-20p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($requests as $request)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><a href>{{$request->client_name}}</a></td>
                                                <td><a href>{{$request->phone}}</a> </td>
                                                <td><a href>{{$request->location}}</a> </td>
                                                <td><a href>{{$request->category}}</a> </td>
                                                <td><a href>{{$request->device}}</a> </td>
                                                <td><a href>{{$request->request_type}}</a> </td>
                                                <<td>
                                                    <div
                                                        class="dot-label bg-{{$request->status == 1 ? 'success':'danger'}} ml-1"></div>
                                                    {{$request->status == 1 ? "تم تأكبد الطلب":"الطلب غير مؤكد"}}
                                                </td>

                                                <td>{{ $request->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div style="display:flex ; justify-content:space-between">
                                                    <a class="modal-effect btn btn-sm btn-primary" <i class="las la-pen"></i>تأكيد الطلب</a>
                                                    {{--  <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$request->id}}"><i class="las la-trash"></i></a>  --}}
                                                </div>
                                                </td>
                                                {{--  @include('Dashboard.requests.delete')  --}}
                                            @endforeach


										</tbody>
									</table>
								</div>
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
