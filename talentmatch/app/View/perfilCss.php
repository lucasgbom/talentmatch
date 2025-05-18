<style>
  p{
    word-wrap: break-word; 
    white-space: normal;
  }
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


 .open-modal-btn {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fff;
      margin: 5% auto;
      padding: 0;
      border-radius: 8px;
      width: 60vw;
      height: 80vh;
      display: flex;
      flex-direction: column;
      position: relative;
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
  display: none; /* Oculta completamente */
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
  justify-content: center;
  height: 100%;
  gap: 15px;
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
      background-color: #fff;
    }

    .post-title {
      font-size: 28px;
      margin-bottom: 10px;
      color: #333;
    }

    .post-description {
      font-size: 16px;
      margin-bottom: 20px;
      color: #555;
    }

    .post-video {
      position: relative;
      padding-bottom: 56.25%; /* 16:9 ratio */
      height: 0;
      overflow: hidden;
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

  .projeto{
    background-color: gray;
    width: 100%;
    height: 100%;
  }

  .arquivo{
    display: none;
  }


    </style>