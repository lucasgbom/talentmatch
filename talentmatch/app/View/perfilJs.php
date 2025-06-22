<script>

  
function opentab(element) {
    let target = element.dataset.target;

    document.querySelectorAll('.tab-page').forEach(tab => tab.classList.remove('active'));
    document.querySelectorAll('.tablink').forEach(tab => tab.classList.remove('active'));

    element.classList.add('active');
    document.getElementById(target).classList.add('active');
}

  function editarFormulario() {
    const campos = document.querySelectorAll('.input-field');
    campos.forEach(campo => {
      campo.disabled = !campo.disabled;
      campo.style.opacity = campo.disabled ? '0.7' : '1'; // Ajusta a opacidade
    });
  }

  const form = document.getElementById('formulario');
  let formularioAlterado = false;



  document.addEventListener('DOMContentLoaded', function() {

    const specials = document.querySelectorAll('.special-input');

    specials.forEach(special => {
      const placehold = special.children[0];
      const fileInput = special.children[1];

      placehold.addEventListener('click', function() {

        fileInput.click()
        fileInput.addEventListener('change', function() {
          const file = this.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
              placehold.src = e.target.result; // muda a imagem no frontend
            }
            reader.readAsDataURL(file);
          }
        })

      });
    });
  });

</script>