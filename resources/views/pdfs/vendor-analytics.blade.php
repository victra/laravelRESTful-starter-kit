<dir style="padding: 20px 60px; font-family:sans-serif;">
	<table style="width: 100%">
		<tbody>
			<tr>
				<td width="60%">
					<img width="200px" src="{{ public_path() . '/images/ezyedu-blue.jpg'}}">
				</td>
				<td width="40%">
					<h1>Monthly Report</h1>
				</td>
			</tr>
			<tr>
				<td>
					<div style="color: #FF7F50">PERIOD REPORT</div>
					{{date('d/m/Y', strtotime($period['from']))}} - {{date('d/m/Y', strtotime($period['to']))}}
					<br><br>
					<div style="color: #FF7F50">VENDOR NAME</div>
					{{ucwords($vendor['name'])}}
				</td>
				<td>
					<table style="width: 100%">
						<tr>
							<td height="50px">
								<div style="color: #FF7F50">PAGE VIEW</div>
								{{$analytic['vendor']['total_view']}}
							</td>
							<td>
								<div style="color: #FF7F50">BANNERS CLICK</div>
								{{$analytic['feature']['banner']}}
							</td>
						</tr>
						<tr>
							<td height="50px">
								<div style="color: #FF7F50">EVENTS VIEW</div>
								{{$analytic['feature']['event']}}
							</td>
							<td>
								<div style="color: #FF7F50">PEOPLE MESSAGED</div>
								{{$analytic['feature']['message']}}
							</td>
						</tr>
						<tr>
							<td height="50px">
								<div style="color: #FF7F50">IDEAS VIEW</div>
								{{$analytic['feature']['ideas']}}
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>

	<h2>Visitor Data</h2>

	<table style="border-collapse: collapse; width: 100%" class="useit" id="blue">
		<tbody>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Location</th>
			</tr>
	    @if (count($analytic['vendor']['user_views'])>0)
				<?php $no = 1; ?>
				@foreach ($analytic['vendor']['user_views'] as $user_view)
					@if ($user_view['user'])
						<tr>
							<td>{{$no}}</td>
							<td>{{$user_view['user']['name']}}</td>
							<td>{{'@'.$user_view['user']['username']}}</td>
							<td>{{$user_view['user']['email']}}</td>
							<td>{{$user_view['user']['location']}}</td>
						</tr>
					@else
						<tr>
							<td>{{$no}}</td>
							<td colspan="4">Public</td>
						</tr>
					@endforelse
					<?php $no++ ?>
				@endforeach
			@else
        <tr>
          <td colspan="5">Data Not Found</td>
        </tr>
	    @endforelse
		</tbody>
	</table>
</dir>

<style type="text/css">
	table.useit td, th {
	    border: 1px solid #00ace6;
	    padding: 15px;
	    text-align: left;
	}
	table#blue th {
	    background-color: #00ace6;
	    color: white;
	}
</style>