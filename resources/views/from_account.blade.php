<from_account>
    <institution_name>{{$from_account->institution_name}}</institution_name>
    <institution_code>{{$from_account->institution_code}}</institution_code>
    <branch>{{$from_account->branch}}</branch>
    <account>{{$from_account->account}}</account>
    <account_name>{{$from_account->account_name}}</account_name>
    @each('reporter::signatory', $from_account->signatories, 'signatory')
</from_account>
