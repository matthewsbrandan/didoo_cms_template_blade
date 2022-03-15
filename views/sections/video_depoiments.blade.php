<section id="video_depoiments">
  <div class="content">
    <h2 class="titulo">{{ $video_depoiments->title }}</h2>
    <p class="subtitulo">{{ $video_depoiments->substitle }}</p>
    <div class="container-depoiments">
      @foreach($video_depoiments->depoiments as $depoiment)
        @if(!in_array($depoiment->link,['#','']))
          <div
            class="container-depoiment-item"
            style="{{ innerStyle('background-image', $depoiment->wallpaper, null, "url('".$depoiment->wallpaper."')") }}"
          >
            <button type="button" class="btn" onclick="$(this).hide('slow').next().attr('src','{{ $depoiment->link }}').show('slow');">
              <img src="{{ asset('images/seta2.png') }}" alt="play"/>
            </button>
            <iframe
              src=""
              style="display: none;"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen=""
            ></iframe>
          </div>
        @endif
      @endforeach
    </div>
    <a
      href="{{ $video_depoiments->button->link }}"
      target="_blank"
      class="botao btn btn-primary btn-uppercase"
      style="
        {{ $video_depoiments->button->background ? 'background: '.$video_depoiments->button->background.';' : '' }}
        {{ $video_depoiments->button->color ? 'color: '.$video_depoiments->button->color.';' : '' }}
      "
    >{{ $video_depoiments->button->text }}</a>
  </div>
</section>