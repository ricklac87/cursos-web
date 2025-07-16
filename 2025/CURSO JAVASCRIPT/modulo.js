class America {
    static paises = ["Brasil", "EUA", "Argentina", "Cuba"]   
    
    static Adicionar = (novo) => {
        this.paises.push(novo)
    }

    static Remover = (novo) => {
        this.paises.pop()
    }

    static ApagarTudo = (novo) => {
        this.paises = []
    }
}

export {America}