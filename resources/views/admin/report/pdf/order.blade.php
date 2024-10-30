<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Global reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Table wrapper */
        .table-container {
            padding: 2rem;
            background-color: #F7FAFC;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Table styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
        }

        /* Table header */
        .table thead {
            background: #38A169;
            color: #fff;
            text-align: left;
        }

        .table th, .table td {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.875rem;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Row hover effect */
        .table tbody tr:hover {
            background-color: #F0FFF4;
            transition: background-color 0.3s;
        }

        /* Cell content styling */
        .table td span {
            display: inline-block;
            margin-right: 8px;
            padding: 0.25rem 0.5rem;
            background-color: #EDF2F7;
            color: #2D3748;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 0.75rem;
                font-size: 0.8rem;
            }
            .table th {
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allOrder as $item)
                <tr>
                    <td>{{ $item->invoice_no }}</td>
                    <td>{{ $item->date }}</td>
                    <td>
                        @foreach($item->order_attributes as $data)
                            <span>{{$data->products['name']}}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($item->order_attributes as $data)
                            <span>{{$data->quantity}}</span>
                        @endforeach
                    </td>
                    <td>{{ number_format($item->amount, 2) }} Tk</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
