<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ _lang('Rapport de Membre') }}</title>
    <style>
        @font-face {
            font-family: 'Cairo';
            src: url({{ storage_path('fonts/Cairo-Regular.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@700&display=swap');
        
        :root {
            --primary-color: #2a4d69;
            --secondary-color: #4b86b4;
            --accent-color: #d98328;
            --text-color: #333;
            --light-bg: #f7f9fc;
            --border-radius: 6px;
            --box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', 'Cairo', sans-serif;
            color: var(--text-color);
            line-height: 1.4;
            font-size: 11px;
            margin: 0;
            padding: 15px;
            background-color: white;
        }
        
        .container {
            max-width: 100%;
            margin: 0 auto;
            background-color: white;
            padding: 15px;
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color), var(--accent-color));
        }
        
        .header {
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .header-left {
            text-align: left;
        }
        
        .header-center h2 {
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }
        
        .header-center p {
            color: #666;
            margin-top: 5px;
            font-size: 10px;
        }
        
        .header-right {
            text-align: right;
        }
        
        .logo {
            max-height: 50px;
        }
        
        .section {
            margin-bottom: 15px;
            background-color: var(--light-bg);
            border-radius: var(--border-radius);
            padding: 12px;
            box-shadow: var(--box-shadow);
        }
        
        .section-title {
            color: var(--primary-color);
            font-size: 14px;
            margin-top: 0;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid var(--secondary-color);
            display: inline-block;
            font-weight: 600;
        }
        
        .compact-layout {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .member-info-section {
            flex: 1;
            min-width: 300px;
        }
        
        .account-section {
            flex: 1;
            min-width: 300px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
            font-size: 10px;
        }
        
        th, td {
            padding: 6px 8px;
            text-align: left;
        }
        
        th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            white-space: nowrap;
            font-size: 10px;
        }
        
        td {
            border-bottom: 1px solid #eaeaea;
        }
        
        tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.02);
        }
        
        .member-info td, .member-info th {
            padding: 5px 8px;
        }
        
        .member-info th {
            background-color: transparent;
            color: var(--primary-color);
            font-weight: 600;
            width: 100px;
            padding-left: 0;
        }
        
        .member-info td {
            border: none;
        }
        
        .amount-cr {
            color: #27ae60;
            font-weight: 500;
        }
        
        .amount-dr {
            color: #e74c3c;
            font-weight: 500;
        }
        
        .status-badge {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: 500;
            text-transform: uppercase;
        }
        
        .status-completed {
            background-color: rgba(46, 204, 113, 0.15);
            color: #27ae60;
        }
        
        .status-pending {
            background-color: rgba(243, 156, 18, 0.15);
            color: #f39c12;
        }
        
        .status-failed {
            background-color: rgba(231, 76, 60, 0.15);
            color: #e74c3c;
        }
        
        .transaction-section {
            margin-top: 15px;
        }
        
        .footer {
            text-align: center;
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
            color: #666;
            font-size: 9px;
        }
        
        .footer p {
            margin: 2px 0;
        }
        
        @media print {
            body {
                padding: 0;
                margin: 0;
                max-width: 100%;
            }
            
            .container {
                padding: 10px;
                max-width: 100%;
            }
            
            .section {
                box-shadow: none;
                page-break-inside: avoid;
            }
        }
        
        .arabic-text {
            font-family: 'Cairo', sans-serif;
            letter-spacing: 0;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <img class="logo" src="{{ smart_asset('backend/images/company-logo.png')}}" alt="Logo" >
            </div>
            <div class="header-center">
                <h2>{{ _lang('Rapport de Membre') }}</h2>
                <p>Date: {{ date('d/m/Y') }}</p>
            </div>
            <div class="header-right">
                <strong>Réf: </strong>MEM-{{ $member->member_no }}<br>
                <strong>Date d'inscription: </strong>{{ date('d/m/Y', strtotime($member->created_at)) }}
            </div>
        </div>

        <div class="compact-layout">
            <div class="member-info-section section">
                <h3 class="section-title">{{ _lang('Informations du Membre') }}</h3>f
                <table class="member-info">
                    <tr>
                        <th>{{ _lang('N° Adhérent') }}</th>
                        <td>{{ $member->member_no }}</td>
                        <th>{{ _lang('Statut') }}</th>
                        <td><span class="status-badge status-completed">Actif</span></td>
                    </tr>
                    <tr>
                        <th>{{ _lang('Nom') }}</th>
                        <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                        <th>{{ _lang('Email') }}</th>
                        <td>{{ $member->email }}</td>
                    </tr>
                    <tr>
                        <th>{{ _lang('Téléphone') }}</th>
                        <td colspan="3">{{ $member->phone ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <div class="account-section section">
                <h3 class="section-title">{{ _lang('Aperçu du Compte') }}</h3>
                <table>
                    <thead>
                        <tr>
                            <th>{{ _lang('N° Compte') }}</th>
                            <th>{{ _lang('Type') }}</th>
                            <th>{{ _lang('Devise') }}</th>
                            <th>{{ _lang('Solde') }}</th>
                            <th>{{ _lang('Bloqué') }}</th>
                            <th>{{ _lang('Disponible') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(get_account_details($member->id) as $account)
                        <tr>
                            <td>{{ $account->account_number }}</td>
                            <td>{{ $account->savings_type->name }}</td>
                            <td>{{ $account->savings_type->currency->name }}</td>
                            <td class="amount-cr">{{ decimalPlace($account->balance, currency($account->savings_type->currency->name)) }}</td>
                            <td class="amount-dr">{{ decimalPlace($account->blocked_amount, currency($account->savings_type->currency->name)) }}</td>
                            <td><strong>{{ decimalPlace($account->balance - $account->blocked_amount, currency($account->savings_type->currency->name)) }}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="transaction-section section">
            <h3 class="section-title">{{ _lang('Historique des Transactions') }}</h3>
            <table>
                <thead>
                    <tr>
                        <th>{{ _lang('Date') }}</th>
                        <th>{{ _lang('Réf') }}</th>
                        <th>{{ _lang('Type') }}</th>
                        <th>{{ _lang('Montant') }}</th>
                        <th>{{ _lang('Statut') }}</th>
                        <th>{{ _lang('Notes') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($transaction->created_at)) }}</td>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->type}}</td>
                        <td class="{{ $transaction->dr_cr == 'cr' ? 'amount-cr' : 'amount-dr' }}">
                            {{ $transaction->dr_cr == 'cr' 
                                ? decimalPlace($transaction->amount, )  .' DH'
                                : '-' . decimalPlace($transaction->amount, ) .' DH'
                            }}
                        </td>
                       
                       
                        <td>{{ $transaction->description ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Ce rapport a été généré automatiquement le {{ date('d/m/Y à H:i:s') }} | Pour toute demande: {{ get_option('phone') ?? '+XXX XXX XXX XXX' }} | {{ get_option('email') ?? 'support@example.com' }}</p>
            <p>&copy; {{ date('Y') }} {{ get_option('company_name') ?? 'Votre Institution Financière' }} - Tous droits réservés</p>
        </div>
    </div>
</body>
</html>