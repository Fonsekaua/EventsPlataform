

    <form action="../config/api/registerClient.php" class="form__client" id="form__register" method="POST">
    <h1>re<span>g</span>ister</h1>
        <label class="label__client">
            <small>
                Nome:
            </small>
            <i class="client__i fa-solid fa-user"></i>
            <input type="text" class="input__client" required name="register__first__name" placeholder="Digite seu nome...">
        </label>
        <label class="label__client">
            <small>
            Last name:
            </small>
            <i class="client__i fa-solid fa-user"></i>
            <input type="text" class="input__client" required name="register__last__name" placeholder="Digite seu sobrenome..."> 
        </label>
        <label class="label__client">
            <small>
                Email:  
            </small>
            <i class="client__i fa-solid fa-envelope"></i>
            <input type="email" class="input__client" required name="register__email" placeholder="Digite seu email..."> 
        </label>
        <label class="label__client">
            <small>
                Password:
            </small>
            <i class="client__i fa-solid fa-lock"></i>
            <input type="password" class="input__client" required name="register__password" placeholder="Crie sua senha...">
            <i class="password__i fa-solid fa-eye-slash"></i>
        </label>
        <button type="submit" class="button__client" id="button__register">
           To Register
        </button>
        <a href="/client/login">Já Possui conta? Faça login</a>

    </form>