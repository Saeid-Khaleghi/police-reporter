<account_related_person>
    @each('reporter::person', $account_related_person->people, 'person')
    <role>{{$account_related_person->role}}</role>
</account_related_person>
