<t_person>
    <gender>{{$person->gender}}</gender>
    <first_name>{{$person->first_name}}</first_name>
    <last_name>{{$person->last_name}}</last_name>
    @if (! empty($person->birthdate))
        <birthdate>{{$person->birthdate}}</birthdate>
    @endif
    @switch($person->id_type)
        @case('A')
            <id_number>{{$person->id_number}}</id_number>
            @break
        @case('F')
            <passport_number>{{$person->id_number}}</passport_number>
            <passport_country>{{$person->issue_country}}</passport_country>
            @break
    @endswitch
    @if(! empty($person->identifications))
        <identifications>
            @each('reporter::person_identification', $person->identifications, 'identification')
        </identifications>
    @endif
</t_person>
