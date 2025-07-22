import styled from 'styled-components'

const Titulo = styled("h1")`               
  color: blue;
  font-size: 2rem;
  font-family: sans-serif;
  font-weight: bold;
`;


export default function App() {

  return (
    <div>
      <Titulo>TITULO AZUL</Titulo> 
    </div>
  )

}