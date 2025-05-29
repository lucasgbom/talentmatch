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
      display: flex;
    }

    /* SIDEBAR */
    .sidebar {
      width: 240px;
      background-color: #0f0f0f;
      padding: 20px 10px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      overflow-y: auto;
      scrollbar-width: none;     /* Firefox */
      -ms-overflow-style: none;  /* IE and Edge */
    }

    .sidebar::-webkit-scrollbar {
      display: none;       /* Chrome, Safari and Opera */

    }
    .logo {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
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
      margin-left: 260px;
      padding: 20px;
      width: calc(100% - 260px);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .grid-posts,.grid-projetos,.grid-usuarios{
        width: 600px;
        height: 600px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }
  
    .posts,.projetos,.usuarios{
        position: absolute;
            width: 100%;
            height: 100%;
        display: none;
        flex-direction: column;
    }


    .shown{display: flex;}

    /* INPUT DE PESQUISA */
    .search-bar {
      margin-bottom: 20px;
      display: flex;
    }

    .search-bar input {
      width: 100%;
      padding: 10px 15px;
      border-radius: 30px;
      border: none;
      background-color: #2a2a2a;
      color: #fff;
      font-size: 14px;
      outline: none;
    }

    /* POSTERS */
   

    .poster-card {
      background-color: #242424;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s;
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