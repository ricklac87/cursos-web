
const express = require('express');
const mongoose = require('mongoose');
const app = express();

app.use(express.json());

require('dotenv').config();

const userSchema = new mongoose.Schema();

const Tabela = mongoose.model('users', userSchema);

async function initializeDatabase() {
    try {
        await mongoose.connect(process.env.DB_CLUSTER, {dbName: 'sample_mflix'});
        
        console.log("Conectado à base de dados com Mongoose");
        
        // Start server only after database is connected
        app.listen(3000, () => {
            console.log("URL: http://localhost:3000/");
            console.log("Servidor executando na porta 3000");
        });
        
    } catch (error) {
        console.error("Erro ao conectar à base de dados:", error);
        process.exit(1);
    }
}

app.get('/', async (req, res) => {
    try {
        const query = await Tabela.findOne({ name: "Ned Stark" });
        
        if (query) {
            res.json(query);
        } else {
            res.status(404).json({ message: "User not found" });
        }
        
    } catch (error) {
        console.error("Erro na consulta:", error);
        res.status(500).json({ error: "Internal server error" });
    }
});

// Additional route to get all users (optional)
app.get('/users', async (req, res) => {
    try {
        const query = await Tabela.find({});
        res.json(query);
    } catch (error) {
        console.error("Erro ao buscar usuários:", error);
        res.status(500).json({ error: "Internal server error" });
    }
});

// Handle graceful shutdown
process.on('SIGINT', async () => {
    console.log('Shutting down gracefully...');
    await mongoose.connection.close();
    process.exit(0);
});

// Handle mongoose connection events
mongoose.connection.on('connected', () => {
    console.log('Mongoose connected to MongoDB');
});

mongoose.connection.on('error', (err) => {
    console.error('Mongoose connection error:', err);
});

mongoose.connection.on('disconnected', () => {
    console.log('Mongoose disconnected');
});

// Initialize the database connection and start server
initializeDatabase();