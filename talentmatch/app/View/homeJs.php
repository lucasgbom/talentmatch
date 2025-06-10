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

  document.querySelectorAll(".seletor").forEach(seletor => {
    seletor.addEventListener("click", event => {
      document.querySelectorAll(".over").forEach(form => {
        form.classList.toggle("open");
      });
    });
  });
  // pesquisa
  const inputRange = document.getElementById('inputD');
  const spanDist = document.getElementById('distancia');
  inputRange.addEventListener('input', () => {
    spanDist.textContent = inputRange.value;
  });

  const pagamentoInput = document.getElementById('pagamento');
  if (pagamentoInput) {
    pagamentoInput.addEventListener('input', () => {
      let v = pagamentoInput.value.replace(/\D/g, '');
      if (!v) v = '0';
      v = (parseInt(v, 10) / 100).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
      });
      pagamentoInput.value = v;
    });

    pagamentoInput.addEventListener('focus', () => {
      if (pagamentoInput.value.trim() === '') {
        pagamentoInput.value = 'R$ 0,00';
      }
    });

    pagamentoInput.addEventListener('blur', () => {
      if (pagamentoInput.value === 'R$ 0,00') {
        pagamentoInput.value = '';
      }
    });
  }
  // Pegar a localização pro guest;
  navigator.geolocation.getCurrentPosition(function(position) {
    document.querySelectorAll('.latitude').forEach(function(e) {
      e.value = position.coords.latitude;
    });
    document.querySelectorAll('.longitude').forEach(function(e) {
      e.value = position.coords.longitude;
    });
  });
</script>