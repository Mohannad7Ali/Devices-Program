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
@include('Dashboard.layouts.messages_alert')


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
                                                <th class="wd-15p border-bottom-0">نوع الطلب</th>
                                                <th class="wd-15p border-bottom-0">حالة الطلب</th>
                                                <th class="wd-15p border-bottom-0">حالة الموعد</th>
                                                <th class="wd-20p border-bottom-0">تاريخ الإضافة</th>
												<th class="wd-15p border-bottom-0">اسم الزبون</th>
												<th class="wd-15p border-bottom-0">رقم الهاتف</th>
												<th class="wd-15p border-bottom-0">الموقع</th>
												<th class="wd-15p border-bottom-0">الفئة المطلوبة</th>
												<th class="wd-15p border-bottom-0">الجهاز المطلوب</th>
                                                <th class="wd-15p border-bottom-0">تاريخ تلبية الخدمة</th>
                                                <th class="wd-15p border-bottom-0">وقت تلبية الخدمة</th>
                                                <th class="wd-20p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($requests as $request)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if ($request->request_type_value == 1)
                                                        <span class="text-success">{{ $request->request_type }}</span>
                                                    @endif
                                                    @if($request->request_type_value == 2)
                                                        <span class="text-danger">{{ $request->request_type }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dot-label bg-{{$request->status == 1 ? 'success':'danger'}} ml-1"></div>
                                                    {{$request->request_status == 1 ? "تم تأكبد الطلب":"الطلب غير مؤكد"}}
                                                </td>
                                                <td>
                                                    <div class="dot-label bg-{{$request->client_accept == 1 ? 'success':'danger'}} ml-1"></div>
                                                    {{$request->client_accept == 1 ? "تم قبول الموعد" : "الموعد غير مقبول"}}
                                                </td>
                                                <td>{{ $request->created_at->diffForHumans() }}</td>
                                                <td><a href>{{$request->client_name}}</a></td>
                                                <td><a href>{{$request->phone}}</a> </td>
                                                <td><a href>{{$request->location}}</a> </td>
                                                <td><a href>{{$request->category}}</a> </td>
                                                <td><a href>{{$request->date}}</a> </td>
                                                <td><a href>{{$request->time}}</a> </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">العمليات<i class="fas fa-caret-down mr-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <a class="dropdown-item" href="{{route('requests.edit',$request->id)}}"><i style="color: #0ba360"0 class="text-success ti-user"></i>&nbsp;&nbsp; تأكيد الطلب </a>
                                                            <a class="dropdown-item" href="{{route('show_invoice',$request->id)}}"><i style="color: #0ba360"0 class="text-success ti-user"></i>&nbsp;&nbsp; عرض الفاتورة  </a>
                                                            <a class="dropdown-item" href="{{route('change_appointment',$request->id)}}"><i style="color: #0ba360"0 class="text-success ti-user"></i>&nbsp;&nbsp; تغيير الموعد </a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$request->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                    @include('Dashboard.ClientsRequests.delete')

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
