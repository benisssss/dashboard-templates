const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));

new bootstrap.Popover(document.body, {
  selector: '[data-bs-toggle="popover"]'
});
