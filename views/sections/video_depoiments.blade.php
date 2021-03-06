<section id="video_depoiments">
  <div class="content">
    <h2 class="titulo">{{ $video_depoiments->title }}</h2>
    <p class="subtitulo">{{ $video_depoiments->substitle }}</p>
    <div class="wrapper-depoiments depoiment-filled">
      <div class="container-depoiments" id="container-depoiments">
        @foreach($video_depoiments->depoiments as $depoiment)
          @if(!in_array($depoiment->link,['#','']))
            <div
              class="container-depoiment-item"
              style="{{ innerStyle('background-image', $depoiment->wallpaper, null, "url('".$depoiment->wallpaper."')") }}"
            >
              <button
                type="button"
                class="btn botao"
                style="{{ innerStyle('background', $video_depoiments->button->color).' '.innerStyle('color', $video_depoiments->button->background) }}"
                onclick="$(this).hide('slow').next().attr('src','{{ $depoiment->link }}').show('slow');"
              >@include('utils.icons.play')</button>
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
      <button
        type="button"
        class="btn btn-left botao"
        style="{{ innerStyle('color', $video_depoiments->button->color).' '.innerStyle('background', $video_depoiments->button->background) }}"
        onclick="handleScrollNextOrPrevItem(false, 'container-depoiments', (15 + (2 * .6)) * 16)"
      >@include('utils.icons.chevron_left')</button>
      <button
        type="button"
        class="btn btn-right botao"
        style="{{ innerStyle('color', $video_depoiments->button->color).' '.innerStyle('background', $video_depoiments->button->background) }}"
        onclick="handleScrollNextOrPrevItem(true, 'container-depoiments', (15 + (2 * .6)) * 16)"
      >@include('utils.icons.chevron_right')</button>
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