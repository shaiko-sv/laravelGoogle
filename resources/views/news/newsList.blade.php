<div class="row justify-content-center">
     <div class="col-md-8">
         @forelse( $news as $item )
             @if(is_array($item))
                  <div class="card">
                        <div class="card-header">{{ $item['title'] }}</div>
                        <div class="card-body">
                            <p>{{ $item['shortText'] }}</p>
                        @guest
                            @if($item['isPrivate'])
                                 <a href="{{ route('login') }}">Register or Login to read...</a>
                            @else
                                 <a href="{{ route('news.show', $item['id']) }}">Read...</a>
                            @endif
                        @else
                            <a href="{{ route('news.show', $item['id']) }}">Read...</a>
                        @endguest
                        </div>
                  </div>
             @else
                 <div class="card">

                     <div class="card-header">{{ $news['title'] }}</div>
                     <div class="card-body">
                         @guest
                             @if($news['isPrivate'])
                                 <p>{{ $news['shortText'] }}</p>
                                 <a href="{{ route('login') }}">Register or Login to read...</a>
                             @else
                                 <p>{!! $news['text'] !!}</p>
                             @endif
                         @else
                             <p>{!! $news['text'] !!}</p>
                         @endguest
                     </div>
                 </div>
                 @break
             @endif

         @empty
              <h2>No news.</h2>
         @endforelse

         </div>
     </div>
</div>
