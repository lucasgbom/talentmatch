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



  document.addEventListener('DOMContentLoaded', function() {
    const specials = document.querySelectorAll('.specialInput');

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
 
  var view = null;
  var edit = null;

  document.addEventListener('DOMContentLoaded', function() {
    view = document.querySelector("#visualizarProjeto");
    edit = document.querySelector("#editarProjeto");
  });
    
 
  function visualizarModal(id,titulo,descricao,arquivo){

    view.dataset.id = id
    view.dataset.titulo = titulo
    view.dataset.descricao = descricao
    view.dataset.arquivo = arquivo

    view.querySelector(".titulo").textContent = titulo
    view.querySelector(".descricao").textContent = descricao
    view.querySelector(".arquivo").src = "../../data/" + arquivo

  }

  function editarModal() {
    id = view.dataset.id
    titulo = view.dataset.titulo
    descricao = view.dataset.descricao
    arquivo = view.dataset.arquivo

    console.log(id,arquivo,descricao,titulo)

    edit.querySelector(".id").value = id
    edit.querySelector(".titulo").value = titulo
    edit.querySelector(".descricao").value = descricao
    edit.querySelector(".arquivo").src = "../../data/" + arquivo

  }


 



</script>