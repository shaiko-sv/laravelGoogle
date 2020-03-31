<div>
     @forelse( $news as $item )
          <hr>
          <h3>{{ $item['title'] }}</h3>
          <p>{{ $item['shortText'] }}</p>
          @if(!$item['isPrivate'])
              <a href="{{ route('news.show', $item['id']) }}">Read...</a>
          @else
              <a href="/login">Register or Login to read...</a>
          @endif
     @empty
         <h2>No news.</h2>
     @endforelse

</div>
