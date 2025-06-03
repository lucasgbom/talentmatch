    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        .header {
            background-color: #4b1500;
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
            background-color: #2a0d00;
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
            background-color: #3d1200;
        }

        .nav-link.active {
            border-bottom: 3px solid red;
        }

        .content {
            padding: 20px;
            background-color: #f7f7f7;
        }

        h2 {
            margin-bottom: 10px;
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

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
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
    </style>