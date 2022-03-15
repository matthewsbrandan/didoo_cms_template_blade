<section id="schedule">
  <div class="content" id="agendar">
    <h2 class="titulo">{{ $schedule->title }}</h2>
    <p class="subtitulo">{{ $schedule->subtitle }}</p>
    <form id="form-schedule">
      <div class="form-control" style="margin-bottom: 1rem; {{ $schedule->border_color ? 'border-color: '.$schedule->border_color.';' : '' }}">
        <input type="text" name="name" id="schedule-name" placeholder="Nome" required/>
      </div>
      <div class="form-grid">
        <div class="form-control" style="{{ $schedule->border_color ? 'border-color: '.$schedule->border_color.';' : '' }}">
          <input type="email" name="email" id="schedule-email" placeholder="Email" required/>
        </div>
        <div class="form-control" style="{{ $schedule->border_color ? 'border-color: '.$schedule->border_color.';' : '' }}">
          <input type="text" name="whatsapp" id="schedule-whatsapp" placeholder="Whatsapp" required/>
        </div>
        <div class="form-control" style="{{ $schedule->border_color ? 'border-color: '.$schedule->border_color.';' : '' }}">
          <input type="date" name="date" id="schedule-date"/>
        </div>
        <div class="form-control" style="{{ $schedule->border_color ? 'border-color: '.$schedule->border_color.';' : '' }}">
          <input type="time" name="time" id="schedule-time"/>
        </div>
      </div>
      <div class="form-control" style="{{ $schedule->border_color ? 'border-color: '.$schedule->border_color.';' : '' }}">
        <textarea rows="5" name="description" id="schedule-description" placeholder="Descrição"></textarea>
      </div>
      <button type="submit" class="botao btn btn-primary btn-uppercase"
        style="
          {{ $schedule->button->background ? 'background: '.$schedule->button->background.';' : '' }}
          {{ $schedule->button->color ? 'color: '.$schedule->button->color.';' : '' }}
        "
      >Enviar</button>
    </form>
  </div>
</section>