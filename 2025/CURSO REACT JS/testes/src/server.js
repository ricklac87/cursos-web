const express = require('express')
const app = express()

app.use(
  express.urlencoded({
    extended: true,
  }),
)

app.use(express.json())

app.get('/', (req, res) => {
  return res.json({message: "Mensagem"})
})

app.listen(3000, () => {
  console.log(`Servidor rodando`);
});