<to_account>
    <institution_name>{{$to_account->institution_name}}</institution_name>
    @if(!empty($to_account->swift))
        <swift>{{$to_account->swift}}</swift>
    @else
        <institution_code>n/a</institution_code>
    @endif
    @if($currency_code == 'XOM')
        <non_bank_institution>{{$to_account->non_bank_institution}}</non_bank_institution>
    @endif
    <account>{{$to_account->account}}</account>
    <account_name>{{$to_account->account_name}}</account_name>
</to_account>
