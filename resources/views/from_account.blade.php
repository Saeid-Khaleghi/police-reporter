<from_account>
    <institution_name>{{$from_account->institution_name}}</institution_name>
    <institution_code>{{$from_account->institution_code}}</institution_code>
    <non_bank_institution>{{$from_account->non_bank_institution}}</non_bank_institution>
    <branch>{{$from_account->branch}}</branch>
    <account>{{$from_account->account}}</account>
    <account_name>{{$from_account->account_name}}</account_name>
    <related_persons>
        @each('reporter::account_related_person', $from_account->related_persons, 'account_related_person')
    </related_persons>
</from_account>
