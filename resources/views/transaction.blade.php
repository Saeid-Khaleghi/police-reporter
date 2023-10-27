<transaction>
    <transactionnumber>{{$tag->reference}}</transactionnumber>
    <transaction_location>{{$tag->location}}</transaction_location>
    <date_transaction>{{$tag->date}}</date_transaction>
    <transmode_code>{{$tag->transmodeCode}}</transmode_code>
    <amount_local>{{$tag->amountLocal}}</amount_local>
    @each('reporter::transaction_from', $tag->transaction_froms, 'from')
    @each('reporter::transaction_to', $tag->transaction_tos, 'to')
</transaction>
