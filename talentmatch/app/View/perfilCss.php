<style>

  html, body{
    height: 100%;
    width: 100%;
    margin: 0;
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


    #criarProjeto{

      
    }


     /* Fundo escuro com blur */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(5px);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.3s ease;
    }

    
    .modal-overlay.active {
      opacity: 1;
      pointer-events: auto;
    }

    /* Estilo do modal */
    .modal {
      background: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      transform: scale(0.95);
      opacity: 0;
      transition: all 0.3s ease;
    }

    .modal-overlay.active .modal {
      transform: scale(1);
      opacity: 1;
    }

    .open-btn {
      margin: 2rem;
      padding: 1rem 2rem;
      font-size: 1rem;
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