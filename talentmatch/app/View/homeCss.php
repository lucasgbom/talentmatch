<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    margin: 0;
    color: #fff;
    display: grid;
    height: 100vh;
    width: 100vw;
    grid-template-columns: 2fr 12fr;
  }

  a {
    text-decoration: none;
    color: white;
  }

  .match.disabled {
    pointer-events: none;
    opacity: 0.5;
  }


  .sidebar {
    width: 100%;
    background-color: rgb(55, 23, 5);
    padding: 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
    top: 0;
    left: 0;
    overflow: hidden;
    scrollbar-width: none;
    -ms-overflow-style: none;
  }

  .nav-input {
    all: unset;
    /* Remove TODOS os estilos padrões (o jeito mais limpo) */
    cursor: pointer;
    /* Opcional: pra manter o cursor de clique */
    display: block;
    /* Se quiser que ele se comporte como uma div */
    width: 100%;
  }

  .menu-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s;
  }

  .menu-item:hover,
  .menu-item.active {
    background-color: rgb(47, 20, 5);
  }

  .menu-item span {
    margin-left: 15px;
    font-size: 14px;
  }

  .section {
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid;
    border-image: linear-gradient(to right, #B97E30, #FBE793) 1;
    border-right: 0;
    border-left: 0;
    border-bottom: 0;
  }

  .login {
    padding-bottom: 1em;
  }

  .login-btn {
    margin-top: 10px;
    padding: 8px 12px;
    border: 1px solid #FBE793;
    color: #FBE793;
    border-radius: 20px;
    font-size: 14px;
    text-align: center;
    display: inline-block;
    cursor: pointer;
    text-decoration: none;
  }

  .sidebar::-webkit-scrollbar {
    display: none;
  }

  .logo {
    display: flex;
    align-items: center;
    height: 60px;
  }

  .logo img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
  }



  .content {
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1)), url('../../assets/fundo.jpg');
    box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);
    overflow-y: auto;
  }

  .content::-webkit-scrollbar {
    display: none;
  }



  h4 {
    margin: 10px 0;
    font-size: 12px;
    color: #aaa;
    text-transform: uppercase;
  }

  /* CONTEÚDO PRINCIPAL */
  .main-content {
    width: 100%;
    overflow-x: hidden;
    display: grid;
    grid-template-rows: 5fr 8fr;
    position: relative;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1)), url('../../assets/fundo.jpg');
    box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);
    overflow-y: auto;
  }

  .grid-posts,
  .grid-projetos {
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: repeat(auto-fit, 200px);
    max-height: 200px;
    gap: 1px;
  }

  .grid-usuarios {
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: repeat(auto-fit, 150px);
    max-height: 200px;
    gap: 1px;
  }

  .grid-item {
    background-color: rgb(233, 186, 129);
    padding: 20px;
    text-align: center;
    height: 200px;
    width: 200px;
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 5px;
    overflow: hidden;
    color: #371705;
  }


  .grid-usuarios .grid-item {
    background-color: rgb(233, 186, 129);
    padding: 20px;
    text-align: center;
    height: 200px;
    width: 150px;
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .grid-item:hover {
    transform: scale(1.06);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  }

  .create-btn {
    columns: 1 1;
  }

  .posts,
  .projetos,
  .usuarios {
    position: absolute;
    width: 100%;
    height: 100%;
    display: none;
    flex-direction: column;
    padding: 20px;
  }

  main {
    padding: 2% 5% 0 5%;
  }

  .shown {
    display: grid;
    grid-template-rows: 1fr 7fr;
  }

  .gradiente-texto {
    display: inline-block;
    background: linear-gradient(to right, #B97E30, #FBE793);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
    margin-bottom: 2%;
    font-size: 400%;
  }


  /* INPUT DE PESQUISA */
  .search-bar {
    height: 6vh;
    width: 80%;
    position: relative;
    justify-self: center;
    display: grid;
    grid-template-columns: 10fr 1fr 1fr;
    margin-top: 3vh;
  }

  .input {
    width: 100%;
    height: 100%;
    border: none;
    outline: none;
    box-shadow: none;
    background-color: rgb(233, 186, 129);
    padding: 15px;
  }

  .input:hover {
    border: solid 1px #F6D9B5;
  }

  .search,
  .seletor,
  .type {
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
  }

  .type {
    z-index: 199;
    border-radius: 30px 0 0 30px;
  }

  .seletor {
    z-index: 200;
    display: flex;
    /* Flexbox para alinhar conteúdo */
    justify-content: center;
    /* Centraliza horizontalmente */
    align-items: center;
  }

  .search {
    z-index: 200;
    border-radius: 0 30px 30px 0;
    border: none;
    display: flex;
    /* Flexbox para alinhar conteúdo */
    justify-content: center;
    /* Centraliza horizontalmente */
    align-items: center;
  }

  .search img,
  .seletor img {
    height: auto;
    width: 45%;
    display: block;
  }

  .over {
    display: flex;
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 2%;
    background-color: rgb(233, 186, 129);
    border-radius: 30px;
    flex-direction: row;
    align-items: flex-end;
    justify-content: center;
    transition: all 0.3s ease;
    gap: 20px;
    overflow: hidden;
  }

  .over.open {
    height: 250%;
  }

  .over .icon {
    width: 30px;
    height: 30px;
  }

  .menu-item .icon {
    filter: invert(1);
    width: 30px;
    height: 30px;
  }

  label {
    display: flex;
    align-items: center;
  }


.btn-post{
  font-size: x-large;
  font-weight: bold;
}
  .match {
    width: 20%;
    position: absolute;
    right: 0;
    bottom: 0;
  }

  .open-modal-btn {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }

  .close-btn {
    position: absolute;
    top: 2%;
    right: 2%;
    font-size: 24px;
    cursor: pointer;
    color: #371705;
  }

  .modal {
    display: none;
    position: absolute;
    z-index: 999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .modal-content {
    background-color: rgb(233, 186, 129);
    margin: 5% auto;
    padding: 0;
    border-radius: 8px;
    width: 40vw;
    height: 60vh;
    display: none;
    flex-direction: column;
    position: relative;
  }

  .modal-content.active {
    display: flex;
    z-index: 1000;
  }



  .tabs {
    display: flex;
    border-bottom: 1px solid #371705;
  }

  .tab {
    padding: 10px 20px;
    cursor: pointer;
    background: none;
    border: none;
    font-weight: bold;
    outline: none;
    display: none;
  }

  .tab.permit {
    display: inline-block;
    opacity: 1;
    pointer-events: auto;
  }

  .tab.active {
    border-bottom: 2px solid #371705;
    color: #371705;
  }

  .tab-content {
    display: none;
    flex-grow: 1;
    padding: 20px;
    margin: 10px;
    box-sizing: border-box;
    overflow-y: auto;
    color: #371705;
  }

  .tab-content.active {
    display: block;
  }

  .tab-content #map {
    height: 100%;
  }

  .tab-content button:hover {
    background-color: #0056b3;
  }

  .post-title {
    font-size: 28px;
    margin-bottom: 10px;
    color: #333;
    height: auto;
  }

  .post-description {
    font-size: 16px;
    margin-bottom: 20px;
    color: #555;
    height: auto;
  }

  .post-video {
    position: relative;
    padding-bottom: 56.25%;
    /* 16:9 ratio */
    height: 0;
    border-radius: 8px;
  }

  .post-video iframe,
  .post-video video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
  }



  .projeto {
    background-color: gray;
    width: 100%;
    height: 100%;
  }

  .arquivo {
    display: none;
  }

  input,
  textarea {
    user-select: text;
    caret-color: auto;
  }

  /*
      Estilo Mapa
      */
  #informacoes-tab {
    margin-right: 20em;
    display: flex;
    gap: 2px;
    align-items: flex-start;
  }

  #mapU {
    height: 15em;
    width: 350p;
  }

  /*
        Projeto
      */
  .thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .btn-projeto {
    padding: 0px
  }

  /*
        Usuario
  */
  .poster-card {
    display: flex;
    width: 100%;
    height: 100%;
    flex-direction: column;
    padding: 2%;
  }

  .btn-usuario {
    display: flex;
    width: 100%;
    height: 100%;
    flex-direction: column;
    padding: 0 !important;
    margin: 0;
  }


  .poster-title {
    height: 20%;
    width: auto;
    font-size: medium;
    display: flex;
    align-items: center; /* Centraliza verticalmente */
    justify-content: center;
    color: #371705;
  }

  .link-perfil {
    height: 100%;
    cursor: pointer;
  }

  .user-title {
    height: 15%;
    width: auto;
    font-size: medium;
    display: flex;
    align-items: center;
    /* Centraliza verticalmente */
    justify-content: center;
  }

  .foto-perfil {
    width: auto;
    height: 85%;
    object-fit: cover;
    padding: 2% 2% 0 2%;
    margin: 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    background-color: rgb(246, 196, 136);
  }

  .fotoUsuario {
    height: 2em;
  }
</style>