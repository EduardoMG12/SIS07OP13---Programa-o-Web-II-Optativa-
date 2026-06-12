<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim Digital</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #e8d5b5 0%, #f5e6d3 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .card { background: white; border-radius: 20px; padding: 40px; max-width: 520px; width: 100%; box-shadow: 0 10px 40px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #5a3e2b; font-size: 1.8em; margin-bottom: 5px; }
        .subtitle { text-align: center; color: #8b7355; font-size: 0.9em; margin-bottom: 25px; }
        label { display: block; font-size: 0.85em; font-weight: 600; color: #5a3e2b; margin-bottom: 5px; }
        input, select { width: 100%; padding: 12px 15px; border: 2px solid #e8ddd0; border-radius: 10px; font-size: 1em; transition: 0.3s; background: #fcf9f5; margin-bottom: 18px; }
        input:focus { outline: none; border-color: #c4a882; box-shadow: 0 0 0 3px rgba(196,168,130,0.2); }
        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .notas-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        button { width: 100%; padding: 14px; background: linear-gradient(135deg, #8b6914, #a67c2e); color: white; border: none; border-radius: 10px; font-size: 1.1em; font-weight: 600; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        button:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(139,105,20,0.3); }
    </style>
</head>
<body>
    <div class="card">
        <h1>📚 Boletim Digital</h1>
        <p class="subtitle">Preencha os dados do aluno para gerar o boletim</p>
        <form action="processar.php" method="POST">
            <label for="nome">Nome do Aluno</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: João da Silva" required>

            <div class="row">
                <div>
                    <label for="curso">Curso</label>
                    <input type="text" id="curso" name="curso" placeholder="Ex: ADS" required>
                </div>
                <div>
                    <label for="ano">Ano</label>
                    <select id="ano" name="ano" required>
                        <option value="">Selecione</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                </div>
            </div>

            <label style="margin-top: 5px;">Notas Bimestrais</label>
            <div class="notas-grid">
                <div>
                    <label for="nota1">1º Bimestre</label>
                    <input type="number" id="nota1" name="nota1" step="0.1" min="0" max="10" placeholder="0.0" required>
                </div>
                <div>
                    <label for="nota2">2º Bimestre</label>
                    <input type="number" id="nota2" name="nota2" step="0.1" min="0" max="10" placeholder="0.0" required>
                </div>
                <div>
                    <label for="nota3">3º Bimestre</label>
                    <input type="number" id="nota3" name="nota3" step="0.1" min="0" max="10" placeholder="0.0" required>
                </div>
                <div>
                    <label for="nota4">4º Bimestre</label>
                    <input type="number" id="nota4" name="nota4" step="0.1" min="0" max="10" placeholder="0.0" required>
                </div>
            </div>

            <button type="submit">Gerar Boletim</button>
        </form>
    </div>
</body>
</html>
