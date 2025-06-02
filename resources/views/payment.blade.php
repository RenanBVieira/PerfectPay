<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagamento - PerfectPay</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="text-center">Pagamento</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/processar-pagamento">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome do Cliente</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>

                            <div class="mb-3">
                                <label for="value" class="form-label">Valor do Pagamento (R$)</label>
                                <input type="number" class="form-control" id="value" name="value" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="billingType" class="form-label">Forma de Pagamento</label>
                                <select class="form-select" id="billingType" name="billingType">
                                    <option value="BOLETO">Boleto</option>
                                    <option value="CREDIT_CARD">Cartão de Crédito</option>
                                    <option value="PIX">Pix</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Finalizar Pagamento</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
