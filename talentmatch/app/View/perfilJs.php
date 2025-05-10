<script>
  function editarFormulario() {
    const campos = document.querySelectorAll('.input-field');
    campos.forEach(campo => {
      campo.disabled = !campo.disabled;
      campo.style.opacity = campo.disabled ? '0.7' : '1'; // Ajusta a opacidade
    });
  }

  const form = document.getElementById('formulario');
  let formularioAlterado = false;

 
  
document.addEventListener('DOMContentLoaded', function () {
  const specials = document.querySelectorAll('.specialInput');

  specials.forEach(special => {
    const placehold = special.children[0];
    const fileInput = special.children[1];

    placehold.addEventListener('click', function () {

        fileInput.click()
       fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            placehold.src = e.target.result; // muda a imagem no frontend
          }
          reader.readAsDataURL(file);
        }})

    });
  });
});


  function detalhesModal(id, titulo, descricao, arquivo) {
    document.getElementById("detalhesId").value = id;
    document.getElementById("detalhesTitle").value = titulo;
    document.getElementById("detalhesDesc").value = descricao;
    document.getElementById("detalhesFile").src = "../../data/" + arquivo;
  }
//a
  /*function fecharModal() {
    document.getElementById("meuModal").style.display = "none";
  }*/

  // Fecha o modal ao clicar fora do conteúdo
  /*
  window.onclick = function(event) {
    const modal = document.getElementById("meuModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  }
    */

   function viewModal(titulo, descricao, arquivo){
    placehold =  document.querySelector("#viewProjeto").children

    placehold[0].textContent = titulo
        placehold[1].textContent = descricao
            placehold[2].src = arquivo
   }
</script>