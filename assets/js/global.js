document.querySelectorAll(".password__i").forEach(icon => {
    const input = icon.previousElementSibling;
    
    icon.addEventListener("click", () => {
        
        if(icon.classList.contains("fa-eye-slash")) {
            icon.classList.add('fa-eye'); 
            icon.classList.remove('fa-eye-slash');
            input.type = "text"; 
        } 
        
        else if (icon.classList.contains("fa-eye")) {
            icon.classList.add('fa-eye-slash');
            icon.classList.remove('fa-eye'); 
            input.type = "password"; 
        }
    });
});
