<style>

  html, body{
    height: 100%;
    width: 100%;
  }
        .input-field {
            background-color: #f0f0f0;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            opacity: 0.7; /* Opacidade inicial */
        }

        .input-field[disabled] {
            opacity: 0.3; /* Opacidade quando desabilitado */
        }

        .hide{display: none;}

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

        #perf{width: 100px;
        height: 100px;
    border-radius: 50%;
    object-fit: cover;}




   
    .btn-abrir {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      margin: 50px;
    }

    /* Fundo escuro do modal */
    .modal {
      display: none; /* escondido por padrão */
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
    }

    /* Conteúdo do modal */
    .modal-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      width: 300px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      animation: fadeIn 0.3s ease-in-out;
      display: none;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    /* Botão de fechar */
    .close-btn {
      background-color: #e74c3c;
      color: white;
      border: none;
      padding: 8px 16px;
      margin-top: 10px;
      border-radius: 5px;
      cursor: pointer;
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

  video{
  width: 640px;
  height: 360px;
}

    </style>