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

  .nav-input{
        all: unset;          /* Remove TODOS os estilos padrões (o jeito mais limpo) */
  cursor: pointer;     /* Opcional: pra manter o cursor de clique */
  display: block;      /* Se quiser que ele se comporte como uma div */
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
    border: 1px solid #3ea6ff;
    color: #3ea6ff;
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
    height: 100%;
    object-fit: contain;
  }

  .main-content {
    width: 100%;
    overflow-x: hidden;
    display: flex;
    flex-direction: column;
    position: relative;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1)), url('fundo.jpg');
    box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);
    overflow-y: auto;
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
  }

  .modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 0;
    border-radius: 8px;
    width: 60vw;
    height: 80vh;
    display: none;
    flex-direction: column;
    position: relative;
  }

  .modal-content.active {
    display: flex;
  }

  .close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
  }

  .tabs {
    display: flex;
    border-bottom: 1px solid #ccc;
  }

  .tab {
    padding: 10px 20px;
    cursor: pointer;
    background: none;
    border: none;
    font-weight: bold;
    outline: none;
    display: none;
    /* Oculta completamente */
  }

  .tab.permit {
    display: inline-block;
    opacity: 1;
    pointer-events: auto;
  }


  .tab.active {
    border-bottom: 2px solid #007BFF;
    color: #007BFF;
  }

  .tab-content {
    display: none;
    flex-grow: 1;
    padding: 20px;
    margin: 10px;
    box-sizing: border-box;
    overflow-y: auto;
  }

  .tab-content.active {
    display: block;
  }

  /* Estilo do formulário na Aba 1 */
  /* Estilo do formulário em qualquer aba */
  .tab-content form {
    display: flex;
    flex-direction: column;
    height: 100%;
    box-sizing: border-box;
    overflow: auto;
  }

  .tab-content #map{
    height: 100%;
  }

  .tab-content input,
  .tab-content textarea,
  .tab-content button {
    padding: 10px;
    font-size: 16px;
    resize: none;
  }

  .tab-content button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  .tab-content button:hover {
    background-color: #0056b3;
  }

  .post-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    overflow-y: auto;
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
  .nav-form{
  display: flex;
  flex-direction: column;
  }

  .grid-container {
        display: grid;
        width: 90%;
        grid-template-columns: repeat(auto-fill, 200px);
        gap: 10px;
        max-height: 200px;
        overflow-y: auto;
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
   
      background: linear-gradient(to right,rgb(42, 22, 10), rgb(55, 23, 5));


            display: flex;
            align-items: center;
            padding: 30px;
                box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);

        }

        .foto_perfil {
            height: 150px;
            border-radius: 50%;
            margin-right: 100px;
        }

        .complementoPessoal {
            max-width: 500px;
        }

        .descricao {
            margin-top: 10px;
        }

        .ver-mais {
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
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
            background-color:rgba(77, 24, 0, 0.69);
        }

        .tab-menu button.active {
            border-bottom: 3px solid red;
            background-color: #222;
        }

        .tab-page {
            display: none;
            padding: 20px;
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
  .fotoUsuario{
    height: 2em;
  }
   </style>