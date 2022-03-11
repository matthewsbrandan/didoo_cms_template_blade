function loadGallery(){
  let url = cms_gallery.url;
  $.ajax({
    url,
    headers: {"access-token": cms_gallery.token},
    method: "GET"
  }).done(data => {
    if(data.result){
      $('#container-gallery').html('');

      let images = data.response.images;
      if(images.length === 0) $('#container-gallery').html(`
        <p class="text-loading">Nenhuma imagem encontrada!</p>
      `);
      else images.forEach(image => {
        $('#container-gallery').append(
          renderImageFromGallery(image)
        );
      });
    }
  }).fail(err => {
    $('#container-products').html(`
      <p class="text-loading">Houve um erro ao carregar a galeria!</p>
    `);
  });;
}
function renderImageFromGallery(image){
  return `
    <img src="${image.name}" alt="${image.alt}" class="gallery-image"/>
  `;
}
$(function(){ loadGallery(); });