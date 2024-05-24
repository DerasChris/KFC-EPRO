<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Orden</title>
    <style>
        .profile-pic {
            position: fixed;
            top: 10px;
            right: 10px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content {
            margin-top: 70px; 
            padding: 20px;
            text-align: center;
        }
        .label{
            width: max-content;
            margin: 40px auto;
            display: grid;
            grid-template-areas: "input";
        }
        .input{
            grid-area: input;
            width: 250px;
            border-radius: 10px;
            border: 1px solid gray;
            padding: .7rem 1.5rem;
        }
        .label_name{
            grid-area: input;
            z-index: 100;
            width: max-content;
            margin-left: 1rem;
            padding: 0 .5rem;
            align-self: center;
            height: 100%;
            display: flex;
            align-items: center;
            transition: transform .2s;
            transform-origin: center left;
        }
        .input:where(:focus, 
        :not(:placeholder-shown)) + .label_name{
            transform: translateY(-50%) scale(.7);
            background-color: white;
        }
        .input:focus {
            outline: none; /* Quitar el borde por defecto */
            border-color: red; /* Color del borde rojo */
        }
        .btnEmpezar{
            background-color: red;
            color: white;
            border-radius: 10px;
            padding: .7rem 1.5rem;
            border-color: #ff0000;
        }
    </style>
</head>
<body>
    <div >
        <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/logo_perfil.png?alt=media&token=1423fcc4-21f0-4375-8970-bd24befdb36e" alt="Foto de perfil" class="profile-pic">
    </div>
    <div class="content">
        <summary>ORDEN #</summary>
        <div style="margin-top: 40px">
            <summary>Su mesa es la #</summary>
        </div>
        <div>
            <label class="label">
                <input type="text" placeholder="" class="input">
                <span class="label_name">Ingresa tu nombre</span>
            </label>
        </div>
        <div>
            <input type="button" class = "btnEmpezar" value="Empezar">
        </div>
    </div>
    
</body>
</html>