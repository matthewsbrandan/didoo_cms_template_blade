<header
  id="main-header"
  style="
    {{ $header->background ? 'background: '.$header->background.';':'' }}
  "
>
  <nav class="nav">
    <a href="{{ route('home') }}" class="logo">
      <img src="{{ $header->logo }}"/>
    </a>
    <button
      type="button"
      class="toggle-menu"
      onclick="toggleMainMenu($(this), $(this).next())"
      style="
        {{ $header->link_color ? 'color: '.$header->link_color.';': '' }}
      "
    >@include('utils.icons.menu')</button>
    <ul
      class="horizontal-list"
      style="
        {{ $header->background ? 'background: '.$header->background.' !important;':'' }}
        {{ $header->link_color ? 'color: '.$header->link_color.';': '' }}
      "
    >
      @include('layout.header-list',[
        'header_list_config' => (object)[
          'schedule_type' => 'button'
        ]
      ])
    </ul>
  </nav>
  <script>
    function toggleMainMenu(elem, target){
      if(target.hasClass('show')) elem.html(`@include('utils.icons.menu')`);
      else elem.html(`@include('utils.icons.close')`);
      target.toggleClass('show');
      $('#main-header').toggleClass('show');
    }
    function toggleActiveMainMenu(target = null){
      $('#main-header .horizontal-list li').removeClass('active');
      if(target) target.addClass('active');
  
      $('#main-header .toggle-menu').click();
    }
  </script>
</header>