<t_from_my_client>
    <from_funds_code>{{ $from->from_fund_code }}</from_funds_code>
    @each('reporter::from_account', $from->from_accounts, 'from_account')
    <from_country>{{ $from->from_country }}</from_country>
</t_from_my_client>

