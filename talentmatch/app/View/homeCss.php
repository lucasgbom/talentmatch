    <style>
      a {
        text-decoration: none;
        color: white;
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #181818;
        color: #fff;
        display: grid;
        height: 100vh;
        width: 100vw;
        grid-template-columns: 2fr 12fr;
        overflow: hidden;
      }

      .sidebar {
        width: 100%;
        background-color: #0f0f0f;
        padding: 20px 10px;
        height: 100%;
        display: flex;
        flex-direction: column;
        top: 0;
        left: 0;
        overflow: hidden;
        scrollbar-width: none;
        -ms-overflow-style: none;
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

      .logo strong {
        line-height: 1;
      }

      .logo img {
        width: 30px;
        margin-right: 10px;
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
        background: #272727;
      }

      .menu-item span {
        margin-left: 15px;
        font-size: 14px;
      }

      .section {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #333;
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

      h4 {
        margin: 10px 0;
        font-size: 12px;
        color: #aaa;
        text-transform: uppercase;
      }

      /* CONTEÚDO PRINCIPAL */
      .main-content {
        width: 100%;
        overflow-y: auto;
        overflow-x: hidden;
        display: flex;
        flex-direction: column;
        position: relative;
      }

      .grid-posts,
      .grid-projetos,
      .grid-usuarios {
        width: 600px;
        height: 600px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
      }

      .posts,
      .projetos,
      .usuarios {
        position: absolute;
        width: 100%;
        height: 100%;
        display: none;
        flex-direction: column;
      }


      .shown {
        display: grid;
        grid-template-rows: 1fr 7fr;
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

      .search-bar input {
        width: 100%;
        height: 100%;
        border: none;
        background-color: #2a2a2a;
      }

      .type {
        z-index: 199;
        color: white;
        border-radius: 30px 0 0 30px;
      }

      .seletor {
        z-index: 200;
      }

      .search {
        z-index: 200;
        border-radius: 0 30px 30px 0;
      }

      .over {
        display: none;
        position: absolute;
        width: 100%;
        height: 200px;
        top: 50%;
        border-radius: 0 0 30px 30px;
        background-color: #2a2a2a;
        flex-direction: column;
        padding-top: 50px;
      }

      .open {
        display: flex;
      }

      .poster-card {
        max-height: 20em;
        background-color: #242424;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s;
      }

      .poster-content video {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 6px;
      }

      .poster-card:hover {
        transform: scale(1.05);
      }

      .poster-content {
        padding: 10px;
      }

      .poster-title {
        font-size: 14px;
        margin: 10px 0 5px;
        font-weight: bold;
      }

      .poster-desc {
        font-size: 12px;
        color: #ccc;
      }
    </style>