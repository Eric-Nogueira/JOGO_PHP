const page = document.getElementById('gitHub');
const toggle = document.getElementById('toggleGitHub');

function TogglePage(){
    if(page.style.display !== "table"){
    page.style.display = "table";
    toggle.style.color = "#FFF";
    toggle.textContent = "Voltar";
    }

    else {
    page.style.display = "none";
    toggle.style.color = "#333";
    toggle.textContent = "GitHub";
    }

}