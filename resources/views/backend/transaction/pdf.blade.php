<!DOCTYPE html>
<html>
<head>
    <title>{{ _lang('All Transactions') }}</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 12px;
        }
        th {
            background-color: #f5f5f5;
        }
        .amount-dr {
            color: #dc3545;
        }
        .amount-cr {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>{{ _lang('All Transactions') }}</h2>
            <p>{{ _lang('Generated on') }}: {{ date('Y-m-d H:i:s') }}</p>
        </div>
        
        @if($transactions && $transactions->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>{{ _lang('Date') }}</th>
                    <th>{{ _lang('Member') }}</th>
                    <th>{{ _lang('Account') }}</th>
                    <th>{{ _lang('Type') }}</th>
                    <th>{{ _lang('Amount') }}</th>
                    <th>{{ _lang('DR/CR') }}</th>
                    <th>{{ _lang('Status') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    @if($transaction)
                    <tr>
                        <td></td>
                        <!-- <td>{{ $transaction->trans_date }}</td> -->
                        <td>{{ $transaction->member ? $transaction->member->first_name . ' ' . $transaction->member->last_name : 'N/A' }}</td>
                        <td>{{ $transaction->account ? $transaction->account->account_number : 'N/A' }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td class="amount-{{ $transaction->dr_cr }}">
                            {{ $transaction->account && $transaction->account->savings_type ? decimalPlace($transaction->amount, currency($transaction->account->savings_type->currency->name)) : $transaction->amount }}
                        </td>
                        <td>{{ strtoupper($transaction->dr_cr) }}</td>
                        <td>{{ $transaction->status }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @else
        <p>{{ _lang('No transactions found') }}</p>
        @endif
    </div>
</body>
</html> 