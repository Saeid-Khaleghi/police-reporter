<t_from_my_client>
    <from_funds_code>{{ $from->from_fund_code }}</from_funds_code>
    @if($from->is_foreign_currency)
        <from_foreign_currency>
            <foreign_currency_code>{{ $from->from_foreign_currency_code }}</foreign_currency_code>
            <foreign_amount>{{ $from->from_foreign_amount }}</foreign_amount>
        </from_foreign_currency>
    @endif
    @each('reporter::from_account', $from->from_accounts, 'from_account')
    <from_country>{{ $from->from_country }}</from_country>
</t_from_my_client>
