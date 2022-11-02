<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice {{ $orders->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js'"></script>
    <script>
        function generatePDF() {
            const element = document.getElementById("pdf")
            html2pdf()
                .from(element)
                .save();
        }
    </script>
</head>

<body>
    <div class="card-header bg-primary">
        <h4 class="text-white">
            <a href="{{ url('orders') }}"><button type="submit"
                    class="btn btn-primary btn-submit-fix float-end">back</button>
            </a>
            <button onclick="generatePDF()">Download</button>


        </h4>
    </div>
    <div class="class" id="pdf">
        <table class="order-details">
            <thead>
                <tr>
                    <th width="50%" colspan="2">
                        <h2 class="text-start">My Ecommerce</h2>
                    </th>
                    <th width="50%" colspan="2" class="text-end company-data">
                        <span>Invoice Id: {{ $orders->id }}</span> <br>
                        <span>Date: {{ date('d/m/Y') }}</span> <br>
                        <span>Zip code : 560077</span> <br>
                        <span>Address: #555, Main road, shivaji nagar, Bangalore, India</span> <br>
                    </th>
                </tr>
                <tr class="bg-blue">
                    <th width="50%" colspan="2">Order Details</th>
                    <th width="50%" colspan="2">User Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Order Id:</td>
                    <td>{{ $orders->id }}</td>

                    <td>Full Name:</td>
                    <td>{{ $orders->firstname }}{{ $orders->lastname }}</td>
                </tr>
                <tr>
                    <td>Tracking Id/No.:</td>
                    <td>{{ $orders->tracking_no }}</td>


                    <td>Email Id:</td>
                    <td>{{ $orders->email }}</td>
                </tr>
                <tr>
                    <td>Ordered Date:</td>
                    <td>{{ $orders->created_at->format('d-m-Y-h:i A') }}</td>

                    <td>Phone:</td>
                    <td>{{ $orders->phone }}</td>
                </tr>
                <tr>
                    <td>Payment Mode:</td>
                    <td>{{ $orders->payment_mode }}</td>

                    <td>Address:</td>
                    <td>{{ $orders->address1 }}</td>
                </tr>
                <tr>
                    <td>Order Status:</td>
                    <td>{{ $orders->status }}</td>

                    <td>Zip code:</td>
                    <td>{{ $orders->zipcode }}</td>
                </tr>
                <tr>
                    <td> State:</td>
                    <td>{{ $orders->state }}</td>

                    <td>Country:</td>
                    <td>{{ $orders->country }}</td>
                </tr>
                <tr>
                    <td> City:</td>
                    <td>{{ $orders->city }}</td>

                    <td>Payment Id:</td>
                    <td>{{ $orders->payment_id }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th class="no-border text-start heading" colspan="5">
                        Order Items
                    </th>
                </tr>
                <tr class="bg-blue">
                    <th>ID</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->orderitems as $item)
                    <tr>
                        <td width="10%">{{ $item->id }}</td>
                        <td>
                            {{ $item->product->name }}
                        </td>
                        <td>
                            <img src="{{ asset($item->product->productImages[0]->image) }}" width="50px"
                                alt="ProductImage">
                        </td>
                        <td width="10%">{{ $item->price }}</td>
                        <td width="10%">{{ $item->qty }}</td>
                        {{-- <td width="15%" class="fw-bold">{{ $orders->total_price }} </td> --}}
                    </tr>

                    {{-- <tr>
                        <td colspan="5" class="total-heading">Total Amount :</td>
                        <td colspan="1" class="total-heading">{{ $orders->total_price }}</td>
                    </tr> --}}
                @endforeach


                <tr>
                    <td colspan="5" class="total-heading">Total Amount :</td>
                    <td colspan="1" class="total-heading">{{ $orders->total_price }}</td>
                </tr>


            </tbody>
        </table>

        <br>
        <p class="text-center">
            Thanks for your partronage
        </p>
    </div>
</body>

</html>
