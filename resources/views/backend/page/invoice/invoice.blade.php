
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="6">
						<table>
							<tr>
								<td class="title">
									<img src="{{asset('invoiceImage/invoice.jpg')}}" alt="Stwoo" style="width: 80%; max-width: 150px" />
								</td>

								<td>

									Invoice Number #:{{$saledeteils->first()->invoice_number}}<br />
									Date: {{$saledeteils->first()->created_at->format('Y-m-d')}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td width='150'>
									Shihab Shoping Mall <br>
                                    Email:shihab@gmail.com <br>
                                    Phone: 01796382625 <br>
								</td>

								<td>
									Client Name :   {{$saledeteils->first()->client_name}}<br />
								   Client Phone : {{$saledeteils->first()->clientPhNo}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
                <tr height='20'>
                </tr>

				<tr class="heading">
					<td>Product Name</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Total</td>
					<td>Discount %</td>
					<td>Grand Total</td>
				</tr>
                @php
                $total=0;
                $discount=0;
                @endphp
                @foreach ($saledeteils as $saledeteils )
				<tr class="item">
                    <td>{{$saledeteils->product_name}}</td>
					<td>{{$saledeteils->sale_price}}</td>
					<td>{{$saledeteils->quantity}}</td>
					<td>{{$saledeteils->total}}</td>
					<td>{{$saledeteils->discount}}</td>
					<td>{{$saledeteils->grand_total}}</td>
				</tr>
                @php
                    $total += $saledeteils->sale_price*$saledeteils->quantity;
                    $discount +=$saledeteils->discount;

                @endphp
                @endforeach
                <tr>
                    <td height='30'></td>
                </tr>
				<tr class="total" >
					<td></td>
					<td colspan="5" > Total : {{ $total}} </td>
				</tr>
                <tr class="total" >
					<td></td>
					<td colspan="5" >Discount : {{$discount}} % </td>
				</tr>
                <tr class="total" >
                    <tr class="heading">
                        <td></td>
                        <td colspan="5">
                              Grand Total : {{ceil($result=$total-(($total*$discount)/100))}}
                        </td>
                    </tr>

				</tr>
			</table>
		</div>
	</body>
</html>
