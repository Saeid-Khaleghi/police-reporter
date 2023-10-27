<reportdata>
<transactions>
    @foreach($tags as $tag)
        @include('reporter::' . $tag->getType())
    @endforeach
</transactions>
</reportdata>
