const button = document.querySelector("#button__login")
const box__info = document.querySelector("#box__info")
button.addEventListener("click",(event)=>{
    event.preventDefault();
    const input__login__email = document.querySelector("#input__login__email")
    const input__login__password = document.querySelector("#input__login__password")
   
    axios.post("http://localhost:8000/actions/api/login.php",{
        email: input__login__email.value,
        password: input__login__password.value
    }).then(response => {
        const data = response.data
        const message = data.message
        box__info.innerHTML = message
        if(data.login === true){
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
        alert(err)
    })
})