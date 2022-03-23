<?php
$configuracoes   = get_option('tracking_dados_registro');
$phoneWhatsApp   = $configuracoes['tracking_phone_whatsapp'];
$messageWhatsApp = $configuracoes['tracking_message_whatsapp']; 
?>
<!-- Modal CTA trigger -->
<div id="cta-trigger" class="show-icon">
  <div id="trigger-body">
    <button close-trigger-body>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="7.68" height="7.75"><defs><filter id="a" x="1886.13" y="580.125" width="7.68" height="7.75" filterUnits="userSpaceOnUse"><feFlood result="flood" flood-color="#342d1f"/><feComposite result="composite" operator="in" in2="SourceGraphic"/><feBlend result="blend" in2="SourceGraphic"/></filter></defs><g transform="translate(-1886.13 -580.125)" fill="none" filter="url(#a)"><path id="b" data-name="CLOSE copy" d="M1893.03 580.487l.45.437-6.57 6.359-.45-.439zm-6.57.657l.45-.439 6.57 6.359-.45.44z" stroke="inherit" filter="none" fill="inherit" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" fill-rule="evenodd"/></g><use transform="translate(-1886.13 -580.125)" xlink:href="#b" stroke="#c00d0e" filter="none" fill="none"/></svg>
    </button>
    <hgroup>
      <strong>Olá!</strong>
      <p>Gostaria de receber uma ligação?</p>
      <button open-modal-cta>Sim</button>
    </hgroup>
  </div>
  <button open-trigger-body>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20"><image data-name="phone" width="20" height="20" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAA6UlEQVQ4jaWVgQ2CMBBFv8YFWIEVdARXYAVXcAUcAUbAEWAEGQFG0BHOfNImzaVHzfmTkiZ3fT161+tBROBUHZat6fLTH7AlzD8AJgAzgB6M0DFayas7OiO8WQYPkLDKsK1eoCUXsN+xzd6kXEXkrdKy0OZNypSJ9Ll9nRHWmaKpt0viBI4K1kWbB9YpGM+ysoA03IPT+AOMalKfODmLyJBxjr/C83ll7K3eNEa1J31eJiyNUNdUSVlYCrSi0FpCUZtJi4XNQt0Te94DwKXkGxssm6N1I3gDOAgtKn0CmtCWuJBt3drEFoAvywDAFCx16PwAAAAASUVORK5CYII="/></svg>
  </button>
</div>

<!-- Modal CTA -->
<div id="modal-cta">
  <div id="modal-overlay" modal-close>
    <div id="modal-container">
      <div class="flex">
        <button modal-tab data-open="me-ligue-agora">Me ligue agora</button>
        <button modal-tab data-open="me-ligue-depois">Me ligue depois</button>
        <button modal-tab data-open="deixe-uma-mensagem">Deixe uma mensagem</button>
      </div>
      <div class="modal-content-btns" id="me-ligue-agora">
        <h2>Nós te ligamos!</h2>
        <p>Informe seu telefone que entraremos em contato o mais rápido possível.</p>
        <form method="post" action="">
          <input type="hidden" name="Formulário" value="Me ligue agora" >

          <label class="">
            <input type="text" name="Nome" placeholder="Informe seu nome" required>
          </label>
          <label class="">
            <input type="text" name="Telefone" placeholder="Informe seu telefone" class="phone-mask" pattern=".{14,}"  required>
          </label>
          <button type="submit" class="btn-submit title-min">Enviar</button>
        </form>
        <small>Você já é a <span>5</span> pessoa a solicitar uma ligação.</small>
      </div>
      <div class="modal-content-btns" id="me-ligue-depois">
        <p>Gostaria de agendar e receber uma chamada em outro horário?</p>
        <form method="post" action="">
          <input type="hidden" name="Formulário" value="Me ligue depois" >

          <label class="half">
            <input type="date" name="Data" class="date-input" max="2100-12-31" required>
          </label>
          <label class="half">
            <input type="time" name="Horário" class="time-input" placeholder="Informe um horário" required>
          </label>
          <label class="icon-user">
            <input type="text" name="Nome" placeholder="Informe seu nome" required>
          </label>
          <label class="icon-phone">
            <input type="text" name="Telefone" placeholder="Informe seu telefone" class="phone-mask" pattern=".{14,}"  required>
          </label>
          <button type="submit" class="btn-submit title-min">Enviar</button>
        </form>
        <small>Você já é a <span>5</span> pessoa a solicitar uma ligação.</small>
      </div>
      <div class="modal-content-btns" id="deixe-uma-mensagem">
        <p>Deixe sua mensagem! Entraremos em contato o mais rápido possível.</p>
        <form method="post" action="">
          <input type="hidden" name="Formulário" value="Deixe uma mensagem" >
          <label>
            <textarea name="Mensagem" placeholder="Deixe sua mensagem" required></textarea>
          </label>
          <label class="icon-user">
            <input type="text" name="Nome" placeholder="Informe seu nome" required>
          </label>
          <label class="icon-phone">
            <input type="text" name="Telefone" placeholder="Informe seu telefone" class="phone-mask" pattern=".{14,}"  required>
          </label>
          <button type="submit" class="btn-submit">Enviar</button>
        </form>
        <small>Você já é a <span>3</span> pessoa a deixar uma mensagem.</small>
      </div>
    </div>
  </div>
</div>

<!-- Mobile CTA -->

<div id="mobile-cta">

  <div class="wrap">
      <div class="column-whats">
        <a id="btn-whatsapp" href="https://wa.me/<?=$phoneWhatsApp;?>?text=<?=$messageWhatsApp;?>" data-toggle="modal" data-target="#exampleModal" title="Contato via WhatsApp" target="_blank" ><svg height="56.693px" id="Layer_1" style="enable-background:new 0 0 56.693 56.693;" version="1.1" viewBox="0 0 56.693 56.693" width="30px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#FFFFFF"><style type="text/css">
                .st0{fill-rule:evenodd;clip-rule:evenodd;}
                </style><g><path class="st0" d="M46.3802,10.7138c-4.6512-4.6565-10.8365-7.222-17.4266-7.2247c-13.5785,0-24.63,11.0506-24.6353,24.6333   c-0.0019,4.342,1.1325,8.58,3.2884,12.3159l-3.495,12.7657l13.0595-3.4257c3.5982,1.9626,7.6495,2.9971,11.7726,2.9985h0.01   c0.0008,0-0.0006,0,0.0002,0c13.5771,0,24.6293-11.0517,24.635-24.6347C53.5914,21.5595,51.0313,15.3701,46.3802,10.7138z    M28.9537,48.6163h-0.0083c-3.674-0.0014-7.2777-0.9886-10.4215-2.8541l-0.7476-0.4437l-7.7497,2.0328l2.0686-7.5558   l-0.4869-0.7748c-2.0496-3.26-3.1321-7.028-3.1305-10.8969c0.0044-11.2894,9.19-20.474,20.4842-20.474   c5.469,0.0017,10.6101,2.1344,14.476,6.0047c3.8658,3.8703,5.9936,9.0148,5.9914,14.4859   C49.4248,39.4307,40.2395,48.6163,28.9537,48.6163z"/><path class="st0" d="M40.1851,33.281c-0.6155-0.3081-3.6419-1.797-4.2061-2.0026c-0.5642-0.2054-0.9746-0.3081-1.3849,0.3081   c-0.4103,0.6161-1.59,2.0027-1.9491,2.4136c-0.359,0.4106-0.7182,0.4623-1.3336,0.1539c-0.6155-0.3081-2.5989-0.958-4.95-3.0551   c-1.83-1.6323-3.0653-3.6479-3.4245-4.2643c-0.359-0.6161-0.0382-0.9492,0.27-1.2562c0.2769-0.2759,0.6156-0.7189,0.9234-1.0784   c0.3077-0.3593,0.4103-0.6163,0.6155-1.0268c0.2052-0.4109,0.1027-0.7704-0.0513-1.0784   c-0.1539-0.3081-1.3849-3.3379-1.8978-4.5706c-0.4998-1.2001-1.0072-1.0375-1.3851-1.0566   c-0.3585-0.0179-0.7694-0.0216-1.1797-0.0216s-1.0773,0.1541-1.6414,0.7702c-0.5642,0.6163-2.1545,2.1056-2.1545,5.1351   c0,3.0299,2.2057,5.9569,2.5135,6.3676c0.3077,0.411,4.3405,6.6282,10.5153,9.2945c1.4686,0.6343,2.6152,1.013,3.5091,1.2966   c1.4746,0.4686,2.8165,0.4024,3.8771,0.2439c1.1827-0.1767,3.6419-1.489,4.1548-2.9267c0.513-1.438,0.513-2.6706,0.359-2.9272   C41.211,33.7433,40.8006,33.5892,40.1851,33.281z"/></g>
              </svg></a>
      </div>
      <div class="column-ligar">
          <a id="btn-ligar" href="tel:<?=$phoneWhatsApp;?>" title="Telefone fixo">Ligar</a>
      </div>
      <div>
          <button id="btn-open-modal" title="Entre em contato" open-modal-cta>Entre em contato</button>
      </div>
  </div>
</div>

<!-- Whats CTA -->
<a id="whats-cta" href="https://wa.me/<?=$phoneWhatsApp;?>?text=<?=$messageWhatsApp;?>" data-toggle="modal" data-target="#exampleModal" title="Contato via WhatsApp"  class="show-icon" target="_blank"><svg height="56.693px" id="Layer_1" style="enable-background:new 0 0 56.693 56.693;" version="1.1" viewBox="0 0 56.693 56.693" width="30px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#FFFFFF"><style type="text/css">
                .st0{fill-rule:evenodd;clip-rule:evenodd;}
                </style><g><path class="st0" d="M46.3802,10.7138c-4.6512-4.6565-10.8365-7.222-17.4266-7.2247c-13.5785,0-24.63,11.0506-24.6353,24.6333   c-0.0019,4.342,1.1325,8.58,3.2884,12.3159l-3.495,12.7657l13.0595-3.4257c3.5982,1.9626,7.6495,2.9971,11.7726,2.9985h0.01   c0.0008,0-0.0006,0,0.0002,0c13.5771,0,24.6293-11.0517,24.635-24.6347C53.5914,21.5595,51.0313,15.3701,46.3802,10.7138z    M28.9537,48.6163h-0.0083c-3.674-0.0014-7.2777-0.9886-10.4215-2.8541l-0.7476-0.4437l-7.7497,2.0328l2.0686-7.5558   l-0.4869-0.7748c-2.0496-3.26-3.1321-7.028-3.1305-10.8969c0.0044-11.2894,9.19-20.474,20.4842-20.474   c5.469,0.0017,10.6101,2.1344,14.476,6.0047c3.8658,3.8703,5.9936,9.0148,5.9914,14.4859   C49.4248,39.4307,40.2395,48.6163,28.9537,48.6163z"/><path class="st0" d="M40.1851,33.281c-0.6155-0.3081-3.6419-1.797-4.2061-2.0026c-0.5642-0.2054-0.9746-0.3081-1.3849,0.3081   c-0.4103,0.6161-1.59,2.0027-1.9491,2.4136c-0.359,0.4106-0.7182,0.4623-1.3336,0.1539c-0.6155-0.3081-2.5989-0.958-4.95-3.0551   c-1.83-1.6323-3.0653-3.6479-3.4245-4.2643c-0.359-0.6161-0.0382-0.9492,0.27-1.2562c0.2769-0.2759,0.6156-0.7189,0.9234-1.0784   c0.3077-0.3593,0.4103-0.6163,0.6155-1.0268c0.2052-0.4109,0.1027-0.7704-0.0513-1.0784   c-0.1539-0.3081-1.3849-3.3379-1.8978-4.5706c-0.4998-1.2001-1.0072-1.0375-1.3851-1.0566   c-0.3585-0.0179-0.7694-0.0216-1.1797-0.0216s-1.0773,0.1541-1.6414,0.7702c-0.5642,0.6163-2.1545,2.1056-2.1545,5.1351   c0,3.0299,2.2057,5.9569,2.5135,6.3676c0.3077,0.411,4.3405,6.6282,10.5153,9.2945c1.4686,0.6343,2.6152,1.013,3.5091,1.2966   c1.4746,0.4686,2.8165,0.4024,3.8771,0.2439c1.1827-0.1767,3.6419-1.489,4.1548-2.9267c0.513-1.438,0.513-2.6706,0.359-2.9272   C41.211,33.7433,40.8006,33.5892,40.1851,33.281z"/></g>
              </svg></a>