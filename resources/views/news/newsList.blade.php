<div class="row justify-content-center">
     <div class="col-md-12">
         @forelse( $news as $item )
             @if(is_object($item))
                 <div class="card">
                 <div class="media">
                     <img src="{{ $item->image }}" class="mr-3 w-25" alt="">
                     <div class="media-body">
                         <h5 class="mt-0">{{ $item->title }}</h5>
                         {{ $item->shortText }}

{{--                  <div class="card">--}}
{{--                        <div class="card-header">{{ $item->title }}</div>--}}
{{--                        <div class="card-body">--}}
{{--                            <p>{{ $item->shortText }}</p>--}}
                        @guest
                            @if($item->isPrivate)
                                 <a href="{{ route('login') }}">Register or Login to read...</a>
                            @else
                                 <a href="{{ route('news.show', $item->id) }}">Read...</a>
                            @endif
                        @else
                            <a href="{{ route('news.show', $item->id ) }}">Read...</a>
                        @endguest
                         <br>#{{ $item->category }}
                        </div>
                  </div>
                 </div>
             @else
                 <div class="card">
                     <div class="media">
                         <img src="{{ $news->image }}" class="align-self-center mr-3 w-25" alt="">
                         <div class="media-body">
                             <h5 class="mt-0">{{ $news->title }}</h5>
                         @guest
                             @if($news->isPrivate)
                                     {{ $news->shortText }}
                                 <a href="{{ route('login') }}">Register or Login to read...</a>
                             @else
                                 {!! $news->text !!}
                             @endif
                         @else
                             {!! $news->text !!}
                         @endguest
                             <br>#{{ $news->category }}
                     </div>
                 </div>
                 @break
             @endif

         @empty
             <div class="card">
                 <div class="card-header">No news.</div>
             </div>
         @endforelse

         </div>
     </div>
</div>
