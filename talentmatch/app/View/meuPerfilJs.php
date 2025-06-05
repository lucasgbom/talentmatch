<!-- Modal usuario e tabs-->
<script>
    let descricaoCompleta = "<?= $usuario->getBiografia() ?>";

    function showTab(tab) {
        const tabs = ['inicio', 'posts', 'projetos', 'sobre'];
        tabs.forEach(t => {
            document.getElementById(t).style.display = t === tab ? 'block' : 'none';
            document.querySelector(`.nav-link[onclick*="${t}"]`).classList.toggle('active', t === tab);
        });
    }

    function openModal(tipo, img = null) {
        
        const modal = document.getElementById('modal');
        const title = document.getElementById('modal-title');
        const body = document.getElementById('modal-body');

        if (tipo === 'perfil') {
            title.textContent = 'Editar Perfil';
            body.innerHTML = `
                    <label>Nome:</label><br>
                    <input type="text" id="input-nome" value="${document.getElementById('profile-name').textContent}" style="width: 100%; margin-bottom: 10px;"><br>
                    <label>Imagem do Perfil (URL):</label><br>
                    <input type="text" id="input-imagem" value="${document.getElementById('profile-pic').src}" style="width: 100%; margin-bottom: 10px;"><br>
                `;
        } else if (tipo === 'descricao') {
            title.textContent = 'Editar Descrição';
            body.innerHTML = `
                    <label>Descrição:</label><br>
                    <textarea id="editarDescricao" style="width: 100%; height: 80px;">${descricaoCompleta}</textarea>
                `;
        } else if (tipo === 'projeto') {
            title.textContent = 'Postar Projeto';
            body.innerHTML = `
                    <img src="${img.src}" style="width: 100%; border-radius: 8px; margin-bottom: 10px;">
                    <label>Descrição:</label><br>
                    <textarea style="width: 100%; height: 60px;" placeholder="Descreva seu projeto..."></textarea>
                `;
        }
        document.querySelector('.modal-content').style.display = 'flex';
        modal.setAttribute('data-tipo', tipo);
        modal.style.display = 'flex';
    }

    function saveModal() {
        const modal = document.getElementById('modal');
        const tipo = modal.getAttribute('data-tipo');

        if (tipo === 'perfil') {
            const novoNome = document.getElementById('input-nome').value;
            const novaImagem = document.getElementById('input-imagem').value;

            document.getElementById('profile-name').textContent = novoNome;
            document.getElementById('profile-pic').src = novaImagem;
        } else if (tipo === 'descricao') {
            const novaDescricao = document.getElementById('editarDescricao').value;
            descricaoCompleta = novaDescricao;
            renderizarDescricao();
        }

        closeModal();
        alert('Alterações salvas com sucesso!');
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    function renderizarDescricao() {
        const descricaoCurta = descricaoCompleta.substring(0, 50) + '... ';
        const mais = '<strong style="color: blue; cursor: pointer;" onclick="abrirDescricaoCompleta()">mais</strong>';
        document.getElementById('descricao').innerHTML = descricaoCurta + mais;
    }

    function abrirDescricaoCompleta() {
        document.getElementById('descricao-completa-texto').innerText = descricaoCompleta;
        document.getElementById('modal-descricao').style.display = 'flex';
    }

    function fecharDescricao() {
        document.getElementById('modal-descricao').style.display = 'none';
    }

    function editarDescricao() {
        fecharDescricao();
        openModal('descricao');
    }

    renderizarDescricao();
</script> 
<!-- Modal post projeto -->
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






    const wrapper = document.getElementById('myModal');

    function openModalItem(element) {
        setTimeout(() => {
            map.invalidateSize();
        }, 1);
        let target = element.dataset.modal;
        const modal = document.getElementById(target);
        modal.classList.add('active');

        const create = document.querySelector(`#criar-${target}`);
        const create_tab = modal.querySelector('.criar');

        const view = document.querySelector(`#visualizar-${target}`);
        const view_tab = modal.querySelector('.visualizar');

        const edit = document.querySelector(`#editar-${target}`);
        const edit_tab = modal.querySelector('.editar');

        wrapper.style.display = "block";

        tab = element.dataset.tb


        document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('permit', 'active'));
        document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

        switch (tab) {
            case 'criar':
                create.classList.add('active');
                create_tab.classList.add('active', 'permit');
                break;
            case 'visualizar':
                view.classList.add('active');
                view_tab.classList.add('active', 'permit');
                edit_tab.classList.add('permit');

                if (target == 'projeto') {
                    id = element.dataset.id;
                    titulo = element.dataset.titulo;
                    descricao = element.dataset.descricao;
                    arquivo = element.dataset.arquivo;


                    edit.querySelector(".id").value = id
                    edit.querySelector(".titulo").value = titulo
                    edit.querySelector(".descricao").value = descricao
                    edit.querySelector(".projeto").src = "../../data/" + arquivo;

                    view.querySelector(".titulo").textContent = titulo
                    view.querySelector(".descricao").textContent = descricao
                    view.querySelector(".projeto").src = "../../data/" + arquivo;
                }

                if (target == 'post') {
                    id = element.dataset.id;
                    titulo = element.dataset.titulo;
                    descricao = element.dataset.descricao;
                    data = element.dataset.data_;
                    habilidade = element.dataset.habilidade;
                    pagamento = element.dataset.pagamento;
                    console.log(id, titulo, descricao, data, habilidade, pagamento);

                    view.querySelector(".titulo").textContent = titulo
                    view.querySelector(".descricao").textContent = descricao
                    view.querySelector(".data").textContent = data
                    view.querySelector(".pagamento").textContent = pagamento
                    view.querySelector(".habilidade").textContent = habilidade

                    match(element);
                }
                break;
        }

    }


    function closeModalItem() {
        wrapper.style.display = "none";

        Array.from(wrapper.children).forEach(child => {
            child.classList.remove('active');
        });
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

    function match(element) {
        matchs = JSON.parse(element.dataset.matchs);

        matchs.forEach(match => {
            document.getElementById("editar-post").insertAdjacentHTML('beforeend', `
    <form action="perfil.php" method="get" class="profile">
      <input type="hidden" name="id" value="${match.id}">
      <button type="submit">${match.id}</button>
    </form>
  `);
        });
    }
</script>