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
</script>