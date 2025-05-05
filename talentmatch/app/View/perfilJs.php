<script>
        function editarFormulario() {
            // Seleciona todos os campos de entrada
            const campos = document.querySelectorAll('.input-field');
            
            // Alterna entre habilitar/desabilitar os campos
            campos.forEach(campo => {
                campo.disabled = !campo.disabled;
                campo.style.opacity = campo.disabled ? '0.7' : '1'; // Ajusta a opacidade
            });
        }

        const form = document.getElementById('formulario');
  let formularioAlterado = false;

  // Marca como alterado se algum campo mudar
  form.addEventListener('input', () => {
    document.getElementById("salvar").type = "submit"
  });

  const fileInput = document.querySelector('#foto');
    const profilePic = document.querySelector('#perf');

    fileInput.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          profilePic.src = e.target.result;  // muda a imagem no frontend
        }
        reader.readAsDataURL(file);
      }
    });


    
function abrirModal(index) {
    const projetos = <?= json_encode(array_map(function($projeto) {
        return [
            'id' => $projeto->getId(),
            'titulo' => $projeto->getTitulo(),
            'descricao' => $projeto->getDescricao(),
            'idArtista' => $projeto->getIdArtista(),
            'arquivoCaminho' => $projeto->getArquivoCaminho()
        ];
    }, $projetos)) ?>;
    const projeto = projetos[index];

    if (projeto) {
        document.getElementById("progTitle").textContent = projeto.titulo;
        document.getElementById("progDesc").textContent = projeto.descricao;
        document.getElementById("progFile").src = "../../data/" + projeto.arquivoCaminho;

        document.getElementById("setted").style.display = "flex";
        document.getElementById("unsetted").style.display = "none";
    } else {
        document.getElementById("setted").style.display = "none";
        document.getElementById("unsetted").style.display = "flex";
    }

    document.getElementById("meuModal").style.display = "flex";
}
    
  function fecharModal() {
    document.getElementById("meuModal").style.display = "none";
  }

  // Fecha o modal ao clicar fora do conteúdo
  window.onclick = function(event) {
    const modal = document.getElementById("meuModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  }
    </script>