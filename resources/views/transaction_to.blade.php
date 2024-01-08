<t_to>
    <to_funds_code>{{ $to->to_fund_code }}</to_funds_code>
    @switch($to->to_fund_code)
        @case('D')
            @each('reporter::to_person', $to->to_people, 'to_person')
            @break
        @case('N')
            @each('reporter::to_account', $to->to_accounts, 'to_account')
    @endswitch
    <to_country>{{ $to->to_country }}</to_country>
</t_to>
