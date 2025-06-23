<script>
    const wrapper = document.getElementById('myModal');

    function openModal(element) {
        let target = element.dataset.modal;

        const modal = document.getElementById(target);
        const view = document.querySelector(`#visualizar-${target}`);
        const view_tab = modal.querySelector('.visualizar');

        modal.classList.add('active');
        wrapper.style.display = "flex";


        view.classList.add('active');
        view_tab.classList.add('active', 'permit');

        if (target == 'projeto') {
            id = element.dataset.id;
            titulo = element.dataset.titulo;
            descricao = element.dataset.descricao;
            arquivo = element.dataset.arquivo;
            usuario = JSON.parse(element.dataset.usuario); // array do json_encode
            view.querySelector(".titulo").textContent = titulo
            view.querySelector(".descricao").textContent = descricao
            view.querySelector(".projeto").src = "../../data/" + arquivo;
            // relacionado ao usuario
            if (usuario['fotoPerfil']) {
                view.querySelector(".fotoUsuario").src = "../../data/" + usuario['fotoPerfil'];
            }
            view.querySelector(".nomeUsuario").textContent = usuario['nome'];
            view.querySelector(".linkUsuario").href = "perfil.php?id=" + usuario['id']; // link pro perfil usando Id
        }
        if (target == 'post') {
            id = element.dataset.id;
            idU = element.dataset.id_usuario;
            usuario = JSON.parse(element.dataset.usuario); // array do json_encode, usuario do post
            titulo = element.dataset.titulo;
            descricao = element.dataset.descricao;
            data = element.dataset.data_;
            habilidade = element.dataset.habilidade;
            pagamento = element.dataset.pagamento;
            aceito = element.dataset.aceito;
            view.querySelector(".postI").value = id;
            view.querySelector(".userI").value = idU;

            view.querySelector(".titulo").textContent = titulo
            view.querySelector(".descricao").textContent = descricao
            view.querySelector(".data").textContent = data
            view.querySelector(".pagamento").textContent = pagamento
            view.querySelector(".habilidade").textContent = habilidade
            // usuario do post
            if (usuario['fotoPerfil']) {
                view.querySelector(".fotoUsuario").src = "../../data/" + usuario['fotoPerfil'];
            }
            view.querySelector(".nomeUsuario").textContent = usuario['nome'];
            view.querySelector(".linkUsuario").href = "perfil.php?id=" + usuario['id']; // link pro perfil usando Id
            // Se o usuario tiver aceito tal post aparecera aceito e desabilitará o botão
            if (aceito == true){
                view.querySelector(".match").textContent = "Aceito";
                view.querySelector(".match").classList.add("disabled");
            }
            else{
                view.querySelector(".match").textContent = "Match";
                view.querySelector(".match").classList.remove("disabled");
            }
        }
    }



    function closeModal() {
        wrapper.style.display = "none";

        Array.from(wrapper.children).forEach(child => {
            child.classList.remove('active');
        });
    }


    // Fecha o modal ao clicar fora do conteúdo
    window.onclick = function(event) {
        const modal = document.getElementById("myModal");
        if (event.target === modal) {
            closeModal();
        }
    };
    // Fecha o modal ao clicar fora do conteúdo
</script>