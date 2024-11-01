const button = document.querySelector("#button__register")
const box__info = document.querySelector("#box__info")


button.addEventListener("click",(event)=>{
    event.preventDefault();
 const input__register__name = document.querySelector("#input__register__name").value
const input__register__email = document.querySelector("#input__register__email").value
const input__register__password = document.querySelector("#input__register__password").value
    
    axios.post("http://localhost:8000/actions/api/register.php",{
        name: input__register__name,
        email: input__register__email,
        password: input__register__password 

    }).then(response => {
        const data = response.data
        const message = data.message
        box__info.innerHTML = message
        if(data.register === true){
            box__info.classList.toggle('sucess')
            setTimeout(() => {
                box__info.classList.toggle("sucess");
            }, 5000);
            
        }
        else{
            box__info.classList.toggle('error')
            setTimeout(() => {
                box__info.classList.toggle("error");
            }, 5000);
            
            
        }
    }).catch(err =>{
        alert("alert do catch: "+ err)
    })
})