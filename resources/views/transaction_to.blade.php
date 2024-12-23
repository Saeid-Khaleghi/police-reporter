<t_to>
    <to_funds_code>{{ $to->to_fund_code }}</to_funds_code>
    @if($to->is_foreign_currency)
        <to_foreign_currency>
            <foreign_currency_code>{{ $to->to_foreign_currency_code }}</foreign_currency_code>
            <foreign_amount>{{ $to->to_foreign_amount }}</foreign_amount>
        </to_foreign_currency>
    @endif
    @switch($to->to_fund_code)
        @case('D')
            @include('reporter::to_person', ['to_person' => $to->to_person])
            @break
        @case('N')
            @include('reporter::to_account', ['to_account' => $to->to_account, 'currency_code' => $to->to_foreign_currency_code])
    @endswitch
    <to_country>{{ $to->to_country }}</to_country>
</t_to>
