<t_person>
    <gender>{{$person->gender}}</gender>
    <first_name>{{$person->first_name}}</first_name>
    <last_name>{{$person->last_name}}</last_name>
    @if (! empty($person->birthdate))
        <birthdate>{{$person->birthdate}}</birthdate>
    @endif
    @if(! empty($person->identification))
        @switch($person->identification->type)
            @case('A')
                <id_number>{{$person->identification->number}}</id_number>
                @break
            @case('F')
                <passport_number>{{$person->passport_number}}</passport_number>
                <passport_country>{{$person->passport_country}}</passport_country>
                @break
        @endswitch
        <identification>
            <type>{{$person->identification->type}}</type>
            <number>{{$person->identification->number}}</number>
            @if (! empty($person->identification->expiry_date))
                <expiry_date>{{$person->identification->expiry_date}}</expiry_date>
            @endif
            <issue_country>{{$person->identification->issue_country}}</issue_country>
        </identification>
    @endif
</t_person>
