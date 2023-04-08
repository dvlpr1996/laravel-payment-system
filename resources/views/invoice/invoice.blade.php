<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
		<title>Invoice</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
		#customers {
				font-family: Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				width: 100%;
		}

		#customers td,
		#customers th {
				border: 1px solid #ddd;
				padding: 8px;
		}

		#customers tr:nth-child(even) {
				background-color: #f2f2f2;
		}

		#customers th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: center;
				background-color: #04AA6D;
				color: white;
		}

</style>
</head>

<body>

		<h1>
				{{ ucfirst(auth()->user()->fullName() .' Invoice ' .$order->id) }}
		</h1>

		<table id="customers">
				<thead>
						<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Cost</th>
								<th>Quantity</th>
								<th>Total</th>
						</tr>
				</thead>
				<tbody>
						@forelse ($order->products as $key => $value)
								<tr>
										<th>{{ ++$key }}</th>
										<td>{{ $value->title }}</td>
										<td>{{ moneyFormatWithOutUnit($value->price) }}</td>
										<td>{{ $value->pivot->quantity }}</td>
										<td>
												{{ moneyFormatWithOutUnit($value->price * $value->pivot->quantity) }}
										</td>
								</tr>
						@empty
								<tr>
										<td colspan="5">
												No Order Data Found
										</td>
								</tr>
						@endforelse
				</tbody>
		</table>

</body>

</html>
