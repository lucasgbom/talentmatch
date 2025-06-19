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



      .content {
    background-color: #F6D9B5;

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




      .input-field {
        background-color: #f0f0f0;
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
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
      }

      .modal-content {
        background-color: #fff;
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

      .tab-content form {
        display: flex;
        flex-direction: column;
        height: 100%;
        box-sizing: border-box;
        overflow: auto;
      }

      .tab-content #map {
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
        max-width: 80%;
        max-height: 80%;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        display: flex;
        flex-direction: column;
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
        width: 90%;
        grid-template-columns: repeat(auto-fill, 200px);
        gap: 10px;
        max-height: 200px;
        overflow-y: auto;
      }

      .grid-item {
        background-color: #ddd;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        height: 200px;
        width: 200px;
      }

      .create-btn {
        columns: 1 1;
      }



      .projeto {
        background-color: gray;
        width: 100%;
        height: 100%;
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
      /*
      Estilo Mapa
      */
      #informacoes-tab{
        margin-right: 20em;
        display: flex;
        gap: 2px; 
        align-items: flex-start;
      }
      #mapU{
        height: 15em;
        width: 350p;
      }
    </style>
    </style>