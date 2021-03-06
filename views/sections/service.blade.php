<section id="service">
  <div class="content" id="servicos">
    <h2 class="titulo">{{ $service->title }}</h2>
    <p class="subtitulo subtitle">{{ $service->subtitle }}</p>
    <div class="container-services">
      @foreach($service->services as $item)
        <div class="service">
          <img src="{{ $item->image }}" alt="{{ $item->title }}"/>
          <strong>{{ $item->title }}</strong>
          <p class="texto">{{ $item->description }}</p>
          <a
            href="{{ $item->button->link }}"
            class="botao btn btn-primary btn-uppercase"
            target="_blank"
            style="
              {{ $item->button->background ? 'background: '.$item->button->background.';' : '' }}
              {{ $item->button->color ? 'color: '.$item->button->color.';' : '' }}
            "
          >{{ $item->button->text }}</a>
        </div>
      @endforeach
    </div>
  </div>
</section>