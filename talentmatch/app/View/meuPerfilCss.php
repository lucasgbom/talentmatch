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
        font-family: Arial, sans-serif;
        color: #fff;
        display: grid;
        height: 100vh;
        width: 100vw;
        grid-template-columns: 2fr 12fr;
        overflow: hidden;
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

      .tab-content::-webkit-scrollbar {
    display: none;
  }


      .login {
        padding-bottom: 1em;
      }

      .login-btn{
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

      .btn-editar, .btn-salvar{
        margin-top: 10px;
        padding: 8px 12px;
        border: 1px solid  rgb(80, 40, 18);
        color: rgb(80, 40, 18);
        border-radius: 20px;
        font-size: 14px;
        text-align: center;
        display: inline-block;
        cursor: pointer;
        text-decoration: none;
        background-color: transparent;
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
      .header {
        background-color: rgb(80, 40, 18);
        color: white;
        padding: 20px;
        display: flex;
        align-items: center;
      }

      .profile-pic {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 20px;
        background: #ccc;
        object-fit: cover;
      }

      .profile-info h1 {
        font-size: 28px;
        margin-bottom: 5px;
      }

      .profile-info p {
        font-size: 14px;
        opacity: 0.8;
      }

      .profile{
    display: flex;
    align-items: center;
    margin-bottom: 2%;
    width: 100%;
    background-color:rgb(239, 210, 174);
      }
  .profile a{
    color: #371705;
  }


      .navbar {
        display: flex;
        background-color: rgb(55, 23, 5);
      }

      .nav-link {
        padding: 15px 20px;
        color: white;
        text-decoration: none;
        flex: 1;
        text-align: center;
        border-bottom: 3px solid transparent;
        transition: background 0.3s, border-bottom 0.3s;
      }

      .nav-link:hover {
        background-color: rgb(47, 20, 5)
      }

      .nav-link.active {
        background-color: rgb(47, 20, 5)
      }

      .btn {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 15px;
        background: #4b1500;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
      }

      .btn:hover {
        background: #3d1200;
      }


      .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 10px;
      }

      .gallery img {
        width: 100%;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.2s;
      }

      .gallery img:hover {
        transform: scale(1.05);
      }




      p {
        word-wrap: break-word;
        white-space: normal;
      }

      .place {
        border: 1px solid rgb(233, 186, 129);
        padding: 0 !important;
      }


      .input-field {
        background-color: rgb(239, 210, 174);
        padding: 10px;
        border: none;
        border-radius: 5px;
        opacity: 1;
      }

      .input-field:focus {
  outline: none; /* Tira o contorno azul padrão */
        box-shadow: inset 1px 1px 3px rgba(0, 0, 0, 0.2);
}
      .hide {
        display: none;
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
    top: 1%;
    right: 2%;
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
        height: 200px;
      }

     

      .tab-content input,
      .tab-content textarea{
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

      .tab-content form {
        display: flex;
        flex-direction: column;
        height: 100%;
        box-sizing: border-box;
        overflow: auto;
        gap: 5px;
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
    align-items: center; /* Centraliza verticalmente */
    justify-content: center;
    color: #371705;
  }

  .btn-projeto {
    padding: 0px !important;
  }

   .thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
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

      .create-btn {
        columns: 1 1;
      }

#mapU{
  width: 100%;
  height: 300px;
}

      .projeto {
        width: 100%;
        height: 100%;
        padding: 0 !important;
      }

      .arquivo {
        display: none;
      }


      body,
      html {
        user-select: none;
        caret-color: transparent;
      }

      input,
      textarea {
        user-select: text;
        caret-color: auto;
      }

      .informacoes {
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgb(42, 22, 10), rgb(55, 23, 5));
        display: flex;
        align-items: center;
        padding: 30px;
        box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);
      }

      .foto_perfil {
        height: 150px;
        border-radius: 50%;
        margin-right: 26px;
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

      .input-field.disabled {
        pointer-events: none;
        opacity: 0.5;
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

      .content {
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1)), url('../../assets/fundo.jpg');
        box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);
        overflow-y: auto;
      }

      .content::-webkit-scrollbar {
        display: none;
      }

      .main-content {
    width: 100%;
    overflow-x: hidden;
    display: grid;
    grid-template-rows: 5fr 9fr;
    position: relative;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.1)), url('../../assets/fundo.jpg');
    box-shadow: inset 8px 0 10px -4px rgba(0, 0, 0, 0.3);
    overflow-y: auto;
  }

  .main-content::-webkit-scrollbar {
    display: none;
  }

      .content.shown {
        display: grid !important;
        grid-template-rows: 1fr 7fr;
      }

      .perfil,
      .meus-projetos,
      .meus-posts {
        position: absolute;
        width: 100%;
        height: 100%;
        display: none;
        flex-direction: column;
        padding: 20px;
      }

      .infor {
        background-color:rgb(233, 186, 129);
        padding: 2%;
        border-radius: 20px;
        overflow: hidden;
        display: grid;
        grid-template-columns: auto 1fr;
        grid-template-rows: auto 10%;
        place-items: center;
        min-width: 60vw;
    /* Largura mínima */
    min-height: 50vh;
    /* Altura mínima */

    width: fit-content;
    /* Cresce até o conteúdo */
    height: fit-content;
    /* Cresce até o conteúdo */

    max-width: 90%;
    max-height: 90%;
        position: relative;
        color:   rgb(55, 23, 5);
      }

      .i1 {
        border-right: 1px solid  rgb(55, 23, 5);
        padding: 4%;
        padding-right: 10px;
        width: fit-content;
        height: 100%;
      }

      .i2 {
        padding: 4%;
        padding-left: 20px ;
        width: 100%;
        height: 100%;
      }


      .bot {
        height: 100%;
        width: 100%;
        grid-column: 1 / span 2; /* Ocupa as duas colunas */
        grid-row: 2;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;  
        gap: 10px;
          }

      .gradiente-texto {
        display: inline-block;
        background: linear-gradient(to right, #B97E30, #FBE793);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        margin-bottom: 2%;
        font-size: 300%;
      }

      .icon {
        width: 60%;
      }

      
      .btn-post{
        font-size: x-large;
        font-weight: bold;
      }

      .menu-item .icon {
        filter: invert(1);
        width: 30px;
        height: 30px;
      }
    </style>