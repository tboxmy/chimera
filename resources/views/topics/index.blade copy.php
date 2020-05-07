
<body>
    <div class="topics center sans-serif">
    @php
    $current_topic=-1;
    @endphp
        <h1>Topics</h1>
        @foreach($questions as $question)
        @php 
        $topic_id=$question->topic_id;
        
        @endphp
        @if ($topic_id != $current_topic)
        <div >
            <hr/>
            <header >{{ $topic->name }}</header>
        @endif    
            <div >
                <p >{{ $topic->description }}</p>
                <p ><span >Question:</span> {{ $topic->questions }}</p>
            </div>
            <?php dd($questions); die();
            ?>
        @if ($topic_id != $current_topic)    
        </div>
        @endif
        @php 
            $topic_id=$current_topic;
        @endphp
        @endforeach

    </div>
</body>