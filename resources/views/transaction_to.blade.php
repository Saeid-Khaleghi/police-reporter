<t_to>
    <to_funds_code>{{ $to->to_fund_code }}</to_funds_code>
    @each('reporter::to_account', $to->to_accounts, 'to_account')
    <to_country>{{ $to->to_country }}</to_country>
</t_to>
