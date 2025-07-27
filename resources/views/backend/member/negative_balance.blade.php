@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header d-flex align-items-center">
				<span class="panel-title">{{ _lang('Members with Negative Balance') }}</span>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="negative_balance_members_table" class="table table-bordered">
						<thead>
							<tr>
								<th>{{ _lang('Member No') }}</th>
								<th>{{ _lang('Name') }}</th>
								<th>{{ _lang('Email') }}</th>
								<th>{{ _lang('Phone') }}</th>
								<th>{{ _lang('Business') }}</th>
								
								<th>{{ _lang('Balance') }}</th>
								{{-- <th class="text-center">{{ _lang('Action') }}</th> --}}
							</tr>
						</thead>
						<tbody>
							@foreach($members as $member)
							<tr>
								<td>{{ $member->member_no }}</td>
								<td>
									<a href="{{ route('members.show', $member->id) }}">
										{{ $member->first_name }} {{ $member->last_name }}
									</a>
								</td>
								<td>{{ $member->email }}</td>
								<td>{{ '+' . $member->country_code . ' ' . $member->mobile }}</td>
								<td>{{ $member->business_name }}</td>
								
								<td>
									@php
										$accounts = get_account_details($member->id);
									@endphp
									@foreach($accounts as $account)
										@php
											$balance = $account->balance - $account->blocked_amount;
										@endphp
										@if($balance < 0)
											<div class="mb-1">
												<span class=" badge-danger">
													
													{{ decimalPlace($balance, currency($account->savings_type->currency->name)) }}
												</span>
											</div>
										@endif
									@endforeach
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				@if(count($members) == 0)
					<div class="alert alert-info text-center">
						<i class="fas fa-info-circle"></i>
						{{ _lang('No members found with negative balance!') }}
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('js-script')
<script>
(function ($) {
	"use strict";

	$('#negative_balance_members_table').DataTable({
		processing: true,
		serverSide: false,  // لو كانت البيانات من قاعدة البيانات مباشرة يمكن جعلها true مع اضافة ajax
		"columns": [
			{ data: 'member_no', name: 'member_no' },
			{ data: 'name', name: 'name' },
			{ data: 'email', name: 'email' },
			{ data: 'phone', name: 'phone' },
			{ data: 'business', name: 'business' },
			
			{ data: 'balance', name: 'balance' },
		],
		responsive: true,
		"bStateSave": true,
		"bAutoWidth": false,
		"ordering": false,
		"language": {
		   "decimal":        "",
		   "emptyTable":     "{{ _lang('No Data Found') }}",
		   "info":           "{{ _lang('Showing') }} _START_ {{ _lang('to') }} _END_ {{ _lang('of') }} _TOTAL_ {{ _lang('Entries') }}",
		   "infoEmpty":      "{{ _lang('Showing 0 To 0 Of 0 Entries') }}",
		   "infoFiltered":   "(filtered from _MAX_ total entries)",
		   "thousands":      ",",
		   "lengthMenu":     "{{ _lang('Show') }} _MENU_ {{ _lang('Entries') }}",
		   "loadingRecords": "{{ _lang('Loading...') }}",
		   "processing":     "{{ _lang('Processing...') }}",
		   "search":         "{{ _lang('Search') }}",
		   "zeroRecords":    "{{ _lang('No matching records found') }}",
		   "paginate": {
			  "first":      "{{ _lang('First') }}",
			  "last":       "{{ _lang('Last') }}",
			  "previous": "<i class='ti-angle-left'></i>",
        	  "next": "<i class='ti-angle-right'></i>",
		  }
		},
		drawCallback: function () {
			$(".dataTables_paginate > .pagination").addClass("pagination-bordered");
		}
	});

})(jQuery);
</script>
@endsection