<script>
  const input = document.getElementById('pagamento');

  input.addEventListener('input', () => {
    let v = input.value.replace(/\D/g, '');
    if (v === '') v = '0';

    v = (parseInt(v, 10) / 100).toLocaleString('pt-BR', {
      style: 'currency',
      currency: 'BRL'
    });

    input.value = v;
  });

  input.addEventListener('focus', () => {
    if (input.value.trim() === '') {
      input.value = 'R$ 0,00';
    }
  });

  input.addEventListener('blur', () => {
    if (input.value === 'R$ 0,00') {
      input.value = '';
    }
  });

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


function openModal(element) {
  document.getElementById("myModal").style.display = "block";  

  const mdls = element.dataset.mdl.split(" ");

  if(element.dataset.mdl == "visualizar editar"){
    edit = document.querySelector("#editar-projeto");
    view = document.querySelector("#visualizar-projeto")

    id = element.dataset.id; titulo =  element.dataset.titulo; descricao = element.dataset.descricao; arquivo = element.dataset.arquivo;
    console.log(id,titulo,descricao)

    edit.querySelector(".id").value = id
    edit.querySelector(".titulo").value = titulo
    edit.querySelector(".descricao").value = descricao
    edit.querySelector(".projeto").src = "../../data/" + arquivo;


    view.querySelector(".titulo").textContent = titulo
    view.querySelector(".descricao").textContent = descricao
    view.querySelector(".projeto").src = "../../data/" + arquivo;

  }

  // Limpa abas e conteúdos
  document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('permit', 'active'));
  document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

  // Ativa abas permitidas
  let firstTab;
  document.querySelectorAll('.tab').forEach(tab => {
    if (mdls.includes(tab.dataset.mdl)) {
      tab.classList.add('permit');
      if (!firstTab) firstTab = tab;
    }
  });

  // Ativa a primeira aba visível
  if (firstTab) {
    firstTab.classList.add('active');
    document.getElementById(firstTab.dataset.target).classList.add('active');
  }
}



  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }
function switchTab(element) {
  const tabId = element.dataset.target;

  // Remove classes 'active' de todas as abas e conteúdos
  document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
  document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

  // Ativa a aba clicada e o conteúdo correspondente
  element.classList.add('active');
  document.getElementById(tabId).classList.add('active');
}

  // Fecha o modal ao clicar fora do conteúdo
  window.onclick = function(event) {
    const modal = document.getElementById("myModal");
    if (event.target === modal) {
      closeModal();
    }
  };

  function match(element){
    matchs = JSON.parse(element.dataset.matchs);
    console.log(matchs);
  }

</script>