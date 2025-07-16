import {pessoas} from "./pessoas.js"

const cardsTemplate = document.querySelector("[data-cards-template]")
const cardsContainer = document.querySelector("[data-cards-container]")
const searchBar = document.querySelector("[data-search]")

let usuarios = pessoas.map(usuario => {
    const card = cardsTemplate.content.cloneNode(true).children[0]
    const nomes = card.querySelector("[data-nomes]")
    const sobrenomes = card.querySelector("[data-sobrenomes]")
    nomes.textContent = usuario.name
    sobrenomes.textContent = usuario.lastname
    cardsContainer.append(card)
    return { name: usuario.name, lastname: usuario.lastname , elemento: card }
})

searchBar.addEventListener("input" , e => {
    const valor = e.target.value.toLowerCase()
    usuarios.forEach(pessoa => {
        const visivel = 
            valor.length > 0 && pessoa.name.toLowerCase().includes(valor) ||  
            valor.length > 0 && pessoa.lastname.toLowerCase().includes(valor)
        pessoa.elemento.classList.toggle("hide", !visivel)
    })
})
