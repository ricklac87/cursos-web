const express = require('express');
const app = express();

app.use(express.urlencoded({extended: true}))

app.get('/', (req, res) => {
	res.send(`
		<form action="/" method="POST">
			<input type="text" name="nome">
			<button>Enviar</button>
		</form>
	`)
})

app.post('/', (req, res) => {
	console.log(req.body)
	res.send(`Foi enviado o nome ${req.body.nome} `)
})

app.listen(3000, () => {
  console.log("URL: http://localhost:3000/")
	console.log("Servidor executando na porta 3000")
})