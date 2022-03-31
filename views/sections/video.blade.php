<section 
  id="video"
  style="{{ innerStyle('background-image', $video->wallpaper, null, "url('".$video->wallpaper."')") }}"
>
  <button
    type="button"
    class="btn botao"
    onclick="$(this).hide('slow').next().attr('src','{{ $video->src }}').show('slow');"
    style="{{ innerStyle('background', $video->button->background, '#ffff').' '.innerStyle('color', $video->button->color, '#5e72e4') }}"
  >@include('utils.icons.play')</button>
  <iframe
    src=""
    style="display: none;"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen=""
  ></iframe>
</section>