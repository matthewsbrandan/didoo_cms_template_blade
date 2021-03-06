<section id="download_catalog">
  <img src="{{ $download_catalog->image }}" alt="capa catalogo"/>
  <div class="content">
    <form id="form-download-catalog">
      <h2 class="titulo">{{ $download_catalog->title }}</h2>
      <p class="texto">{{ $download_catalog->subtitle }}</p>
      <div class="form-control" style="{{ $download_catalog->border_color ? 'border-color: '.$download_catalog->border_color.';' : '' }}">
        <input type="text" name="name" id="download_catalog-name" placeholder="Nome" required/>
      </div>
      <div class="form-control" style="{{ $download_catalog->border_color ? 'border-color: '.$download_catalog->border_color.';' : '' }}">
        <input type="email" name="email" id="download_catalog-email" placeholder="Email" required/>
      </div>
      <div class="form-control" style="{{ $download_catalog->border_color ? 'border-color: '.$download_catalog->border_color.';' : '' }}">
        <input type="tel" name="whatsapp" id="download_catalog-whatsapp" placeholder="Whatsapp"/>
      </div>
      <button type="submit" class="botao btn btn-primary btn-uppercase"
        style="
          {{ $download_catalog->button->background ? 'background: '.$download_catalog->button->background.';' : '' }}
          {{ $download_catalog->button->color ? 'color: '.$download_catalog->button->color.';' : '' }}
        "
      >{{ $download_catalog->button->text }}</button>
    </form>
  </div>
</section>