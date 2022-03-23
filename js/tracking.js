class ModalTrigger{constructor(){setTimeout(()=>{this.btnClose=document.querySelector("[close-trigger-body]"),this.btnOpen=document.querySelector("[open-trigger-body]"),this.trigger=document.getElementById("trigger-body"),this.isOpen=!0,this.modal=new ModalCTA,this.handleVisibility(),this.handleTrigger(),this.handleOpenModal()},500)}handleVisibility(){const e=()=>{document.getElementById("whats-cta").classList.add("show"),document.getElementById("cta-trigger").classList.add("show")};window.pageYOffset>300&&e(),window.addEventListener("scroll",()=>window.pageYOffset>300&&e())}handleTrigger(){this.btnClose.addEventListener("click",()=>{this.trigger.style.opacity=0,this.isOpen=!this.isOpen}),this.btnOpen.addEventListener("click",()=>{this.isOpen||(this.trigger.style.opacity=1,this.isOpen=!this.isOpen)})}handleOpenModal(){const e=document.querySelectorAll("[open-modal-cta]");e&&e.forEach(e=>{e.addEventListener("click",()=>{this.modal.open()})})}}class ModalCTA{constructor(){this.self=document.getElementById("modal-cta"),this.closeTriggers=document.querySelectorAll("[modal-close]"),this.handleClose(),this.handleTabs()}open(){this.self.classList.add("open")}handleClose(){this.closeTriggers.forEach(e=>{e.addEventListener("click",e=>{console.log(e.target),"modal-overlay"==e.target.getAttribute("id")&&this.self.classList.remove("open")})}),document.onkeydown=(e=>{this.self.classList.contains("open")&&"Escape"===e.key&&this.self.classList.remove("open")})}handleTabs(){const e=document.querySelectorAll("[modal-tab]"),t=document.querySelectorAll(".modal-content-btns");e[0].classList.add("active"),t[0].classList.add("active"),e.forEach(s=>{s.addEventListener("click",()=>{const i=document.getElementById(s.getAttribute("data-open"));e.forEach(e=>{e.classList.contains("active")&&e.classList.remove("active")}),t.forEach(e=>{e.classList.contains("active")&&e.classList.remove("active")}),s.classList.add("active"),i.classList.add("active")})})}}window.addEventListener("DOMContentLoaded",new ModalTrigger);
new ModalTrigger();

// ativar tracking whatsapp
const btns = document.querySelectorAll('.whats-tracking')
btns ? (
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      ga('gtag_UA_140230513_88.send', 'event', 'WhatsApp', 'Click', 'WhatsApp')

    })
  })
) : false


const trackingPhoneMask = ['(99) 9999-99999', '(99) 99999-9999'];
const trackingPhones    = document.querySelectorAll('.phone-mask');
const inputHandler      = (masks, max, event) => {
    const c = event.target;
    const v = c.value.replace(/\D/g, '');
    const m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}
if (trackingPhones) {
    trackingPhones.forEach(tel => {
        VMasker(tel).maskPattern(trackingPhoneMask[0]);
        tel.addEventListener('input', inputHandler.bind(undefined, trackingPhoneMask, 14), false);
    });
}