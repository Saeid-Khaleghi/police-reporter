<t_person>
    <gender>M</gender>
    <first_name>{{$person->first_name}}</first_name>
    <last_name>{{$person->last_name}}</last_name>
    @if (! empty($person->birthdate))
        <birthdate>{{$person->birthdate}}</birthdate>
    @endif
    @if (! empty($person->id_number))
        <id_number>{{$person->id_number}}</id_number>
    @endif
    @if(! empty($person->identification))
        <identification>
            <type>{{$person->identification->type}}</type>
            <number>{{$person->identification->number}}</number>
            <issue_country>{{$person->identification->issue_country}}</issue_country>
            @if (! empty($person->identification->expiry_date))
                <expiry_date>{{$person->identification->expiry_date}}</expiry_date>
            @endif
        </identification>
    @endif
</t_person>
