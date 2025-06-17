<script>
    const wrapper = document.getElementById('myModal');

    function openModal(element) {

        let target = element.dataset.modal;
        const modal = document.getElementById(target);
        console.log(target);
        modal.classList.add('active');



        const view = document.querySelector(`#visualizar-${target}`);
        const view_tab = modal.querySelector('.visualizar');



        wrapper.style.display = "block";


        view.classList.add('active');
        view_tab.classList.add('active', 'permit');

        if (target == 'projeto') {
            id = element.dataset.id;
            titulo = element.dataset.titulo;
            descricao = element.dataset.descricao;
            arquivo = element.dataset.arquivo;

            view.querySelector(".titulo").textContent = titulo
            view.querySelector(".descricao").textContent = descricao
            view.querySelector(".projeto").src = "../../data/" + arquivo;
        }
        if (target == 'post') {
            id = element.dataset.id;
            idU = element.dataset.usuario;
            titulo = element.dataset.titulo;
            descricao = element.dataset.descricao;
            data = element.dataset.data_;
            habilidade = element.dataset.habilidade;
            pagamento = element.dataset.pagamento;

            console.log(id, idU, titulo, descricao, data, habilidade, pagamento);

            view.querySelector(".postI").value = id;
            view.querySelector(".userI").value = idU;

            view.querySelector(".titulo").textContent = titulo
            view.querySelector(".descricao").textContent = descricao
            view.querySelector(".data").textContent = data
            view.querySelector(".pagamento").textContent = pagamento
            view.querySelector(".habilidade").textContent = habilidade

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