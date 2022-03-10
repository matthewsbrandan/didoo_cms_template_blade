$('#form-schedule').on('submit', handleShedule);

async function handleShedule(event){
  event.preventDefault();
  let phone = schedule.whatsapp;

  let name = $('#schedule-name').val();
  let email = $('#schedule-email').val();
  let whatsapp = $('#schedule-whatsapp').val();
  let message = $('#schedule-description').val();
  let date = $('#schedule-date').val();
  let hour = $('#schedule-time').val();
  let page_id = schedule.page_id;
  let page_owner_id = schedule.page_owner_id;

  let dataSendMessage = {
    name, email, message,
    page_id, page_owner_id
  };

  let outhers = {};
  let outhersMessage = '';
  if(whatsapp) dataSendMessage['phone'] = whatsapp;
  if(date){
    let date_broken = date.split('-');
    if(date_broken.length === 3){
      let date = new Date(
        Number(date_broken[0]), 
        Number(date_broken[1]), 
        Number(date_broken[2])
      );
      let date_formatted = new Intl.DateTimeFormat('pt-BR').format(date);
      outhers = { date: date_formatted };
      outhersMessage = `${date_formatted} `;
    }
  }
  if(hour){
    if(outhers) outhers['hour'] = hour;
    else outhers = { hour };
    outhersMessage+=hour;
  }
  if(outhers){
    dataSendMessage['outhers'] = outhers;
    dataSendMessage['message'] = `${message}<br/><br/>Agendado para:<br/>${outhersMessage}`;
  }

  let userMessage = ` *NOME:* ${name} \n\n*E-MAIL:* ${email}\n\n*DATA:* ${date}\n\n*HORÁRIO:* ${hour}\n\n*MENSAGEM:* \n\n ${message}`;
  userMessage = window.encodeURIComponent(userMessage);

  try{
    const data = await $.ajax({
      url: schedule.url,
      data: dataSendMessage,
      headers: {"access-token": schedule.token},
      method: "POST"
    });

    if(data.result){
      handleSendToWhatsapp(phone,userMessage);
      alert('Enviado com sucesso');
      handleClearFormContact();
    }else handleSendToWhatsapp(phone,userMessage, true);
  }catch(err){
    console.log(err);
    handleSendToWhatsapp(phone,userMessage, true);
  }
}
function handleSendToWhatsapp(phone, text, confirm = false){
  if(confirm && !window.confirm('Não foi possível armazenar sua mensagem. Deseja enviar mesmo assim?')) return;
  
  window.open(`https://api.whatsapp.com/send?phone=${phone}&text=${text}`);
  return;
}
function handleClearFormContact(){
  $('#schedule-name').val('');
  $('#schedule-email').val('');
  $('#schedule-whatsapp').val('');
  $('#schedule-date').val('');
  $('#schedule-time').val('');
  $('#schedule-description').val('');
}
