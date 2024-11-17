const form__register = document.querySelector("#form__register");
form__register.addEventListener("submit", (event) => {
    event.preventDefault();
    
    const formData = new FormData(form__register);
    const data = Object.fromEntries(formData);
    
   //altere pra porta que estiver usando
    axios.post("http://localhost:8000/client/to/register", {
        first__name: data.register__first__name, 
        last__name: data.register__last__name,
        email: data.register__email,
        password: data.register__password
    }).then(response => {
        const dataResponse = response.data;
        
   
        if (dataResponse.register === true) {
            alert("Cadastro realizado com sucesso!!");
            
        } else {
            alert("Erro no cadastro: " + dataResponse.message);
            console.log(dataResponse); 
        }
    }).catch(err => {
        alert("Erro: " + err); 
        console.error(err);  
    });
});
