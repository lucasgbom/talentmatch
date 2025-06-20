<script>
    let descricaoCompleta = "<?= $usuario->getBiografia() ?>";


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

    function editarFormulario() {
        const campos = document.querySelectorAll('.input-field');

        campos.forEach(campo => {
            campo.disabled = !campo.disabled;
            campo.style.opacity = campo.disabled ? '0.7' : '1'; // Ajusta a opacidade
        });
    }

    const form = document.getElementById('formulario');
    let formularioAlterado = false;



    //inputs que mudam na hora
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
    //inputs que mudam na hora



    const wrapper = document.getElementById('myModal');

    function openModal(element) {
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


    function closeModal() {
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
    // Fecha o modal ao clicar fora do conteúdo


    //sei lá
    function match(element) {
        matchs = JSON.parse(element.dataset.matchs);
        console.log(matchs)
        matchs.forEach(match => {

            document.getElementById("editar-post").insertAdjacentHTML('beforeend', `
                <form action="perfil.php" method="get" class="profile">
                <input type="hidden" name="id" value="${match.idUsuario}">
                <button type="submit">${match.idUsuario}</button>
                </form>
            `);
        });
    }



    //formatar o campo do real
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
    //formatar o campo do real

    const inputData = document.getElementById('dataI');
    const hoje = new Date();
    const ano = hoje.getFullYear();
    const mes = String(hoje.getMonth() + 1).padStart(2, '0');
    const dia = String(hoje.getDate()).padStart(2, '0');
    const dataAtual = `${ano}-${mes}-${dia}`;

    inputData.min = dataAtual;
</script>