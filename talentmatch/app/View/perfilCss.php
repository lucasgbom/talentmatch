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
    overflow: hidden;
  }

  p {
    word-wrap: break-word;
    white-space: normal;
  }

  a {
    all: unset;
    cursor: pointer;
  }

  .login {
    padding-bottom: 1em;
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
    background-color: rgb(47, 20, 5)
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

  .menu-item .icon {
    filter: invert(1);
    width: 30px;
    height: 30px;
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

  .main-content {
    width: 100%;
    overflow-x: hidden;
    display: grid;
    grid-template-rows: 5fr 1fr 9fr;
    position: relative;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1)), url('../../assets/fundo.jpg');
    box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);
    overflow-y: auto;
  }

  .main-content::-webkit-scrollbar {
    display: none;
  }

  .input-field {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    opacity: 0.7;
    /* Opacidade inicial */
  }

  .input-field[disabled] {
    opacity: 0.3;
    /* Opacidade quando desabilitado */
  }

  .hide {
    display: none;
  }

  .btn-editar {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .btn-editar:hover {
    background-color: #45a049;
  }

  #perf {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
  }

  .thumbnail {
    width: 100%;
    height: auto;
  }

  .open-modal-btn {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 999;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
  }

  .modal-content {
    background-color: rgb(233, 186, 129);
    margin: 5% auto;
    padding: 0;
    border-radius: 8px;

    min-width: 40vw;
    /* Largura mínima */
    min-height: 50vh;
    /* Altura mínima */

    width: fit-content;
    /* Cresce até o conteúdo */
    height: fit-content;
    /* Cresce até o conteúdo */

    max-width: 90%;
    max-height: 90%;

    display: none;
    flex-direction: column;
    position: relative;
    overflow-y: auto;
  }

  .modal-content::-webkit-scrollbar {
    display: none;
  }

  .modal-content.active {
    display: flex;
    z-index: 1000;
  }

  .close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
    color: #371705;
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
    width: 100%;
    height: 100%;
    padding: 20px;
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

  .bot {
    align-self: flex-end;
  }

  .tab-content input,
  .tab-content textarea,
  .tab-content button {
    padding: 10px;
    font-size: 16px;
    resize: none;
  }

  .tab-content header {
    display: flex;
    align-items: center;
    margin-bottom: 2%;
    gap: 3%;
  }

  .tab-content button {
    border-radius: 10px;
    background-color: #371705;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  .tab-content button:hover {
    background-color:rgb(78, 39, 17);   
  }

  .post-container {
    width: 100%;
    height: 100%;
    padding: 3%;
    border: 2px solid #371705;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
  }


  .poster-card {
    display: flex;
    width: 100%;
    height: 100%;
    flex-direction: column;
    padding: 2%;
  }

  .poster-title {
    height: 20%;
    width: auto;
    font-size: medium;
    display: flex;
    align-items: center;
    /* Centraliza verticalmente */
    justify-content: center;
  }

  .btn-projeto {
    padding: 0 !important;
  }

  .post-title {
    font-size: 28px;
    margin-bottom: 10px;
    height: 15%;
    width: 100%;
    color: #333;
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

  .nav-form {
    display: flex;
    flex-direction: column;
  }

  .grid-container {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(auto-fill, 200px);
        gap: 1px;
        max-height: 200px;
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
      }


      .grid-item:hover {
        transform: scale(1.06);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      }

  .projeto {
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

  .informacoes {
    max-width: 100%;
    background: linear-gradient(to right, rgb(42, 22, 10), rgb(55, 23, 5));
    display: flex;
    align-items: center;
    padding: 30px;
    box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);

  }

  .foto_perfil {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 26px;
  }

  .complementoPessoal {
    max-width: 500px;
  }

  .ver-mais {
    color: white;
    cursor: pointer;
    font-weight: bold;
  }

  .close {
    color: red;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
  }

  .tab-menu {
    display: flex;
    background-color: #361200;
  }

  .tab-menu button {
    background-color: #361200;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 20px;
    transition: 0.3s;
    color: white;
    font-size: 16px;
    border-bottom: 3px solid transparent;
  }

  .tab-menu button:hover {
    background-color: rgba(77, 24, 0, 0.69);
  }

  .tab-menu button.active {
    border-bottom: 3px solid #ffffff;
    background-color: rgb(36, 17, 5);
  }

  .tab-page {
    display: none;
    padding: 20px;
    width: 100%;
    height: 100%;
  }

  .tab-page.active {
    display: block;
  }


  .link-perfil {
    height: 100%;
    cursor: pointer;
  }

  .foto-perfil {
    width: 100%;
    height: 15em;
    object-fit: cover;
  }

  .btn-usuario {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
    border: none;
    cursor: pointer;
    width: 80%;
    height: 17em;
    padding: 0px;
  }

  .fotoUsuario {
    height: 2em;
    border-radius: 3px;
  }
</style>