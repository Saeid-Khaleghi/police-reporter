<identification>
    <type>{{$identification->type}}</type>
    <number>{{$identification->number}}</number>
    @if (! empty($identification->expiry_date))
        <expiry_date>{{$identification->expiry_date}}</expiry_date>
    @endif
    <issue_country>{{$identification->issue_country}}</issue_country>
</identification>