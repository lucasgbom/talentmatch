<script>
function switchContent(element) {
  const target = element.dataset.target;
  
  const sections = document.querySelectorAll('.content');

  sections.forEach(section => {
    section.classList.remove('shown');

  });
  const selected = document.querySelector(`.${target}`);
  
  if (selected) {
    selected.classList.add('shown');
  }
}

document.querySelectorAll(".seletor").forEach(seletor => {
  seletor.addEventListener("click", event => {
    document.querySelectorAll(".over").forEach(form => {
      form.classList.toggle("open");
    });
  });
});

</script>