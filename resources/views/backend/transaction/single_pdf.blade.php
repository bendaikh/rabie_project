<!DOCTYPE html>
<html>
<head>
    <title>{{ _lang('Transaction Details') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .details th {
            background-color: #f5f5f5;
            width: 30%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>{{ _lang('Transaction Details') }}</h2>
        </div>
        
        <div class="details">
            @if($transaction)
            <table>
                <tr>
                    <th>{{ _lang('Transaction Date') }}</th>
                    <td>{{ $transaction->trans_date }}</td>
                </tr>
                <tr>
                    <th>{{ _lang('Member Name') }}</th>
                    <td>{{ $transaction->member ? $transaction->member->first_name . ' ' . $transaction->member->last_name : 'N/A' }}</td>
                </tr>
                <tr>
                    <th>{{ _lang('Account Number') }}</th>
                    <td>{{ $transaction->account ? $transaction->account->account_number : 'N/A' }}</td>
                </tr>
                <tr>
                    <th>{{ _lang('Amount') }}</th>
                    <td>{{ $transaction->account && $transaction->account->savings_type ? decimalPlace($transaction->amount, currency($transaction->account->savings_type->currency->name)) : $transaction->amount }}</td>
                </tr>
                <tr>
                    <th>{{ _lang('Type') }}</th>
                    <td>{{ $transaction->type }}</td>
                </tr>
                <tr>
                    <th>{{ _lang('DR/CR') }}</th>
                    <td>{{ strtoupper($transaction->dr_cr) }}</td>
                </tr>
                <tr>
                    <th>{{ _lang('Status') }}</th>
                    <td>{{ $transaction->status }}</td>
                </tr>
                @if($transaction->description)
                <tr>
                    <th>{{ _lang('Description') }}</th>
                    <td>{{ $transaction->description }}</td>
                </tr>
                @endif
            </table>
            @else
            <p>{{ _lang('No transaction data available') }}</p>
            @endif
        </div>
    </div>
</body>
</html> 