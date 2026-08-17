# Mini-Koncili — Documentação da API

Base URL: `http://project.test:8000/api`

Todas as rotas (exceto login) exigem o header:
`Authorization: Bearer {token}`

## Autenticação

### POST /login
Autentica o usuário e devolve um token de acesso.

**Body:**
​```json
{ "email": "user@email.com", "password": "senha" }
​```

**Resposta (200):**
​```json
{ "token": "1|abc123..." }
​```

## Vendas (Sales)

### GET /sales
Lista as vendas do usuário autenticado.

**Resposta (200):**
​```json
{ "data": [ { "id": 1, "order_code": "PED-1001", ... } ] }
​```

### GET /sales/{id}
Lista uma venda do usuário autenticado com um id especifico.

**Resposta (200):**
​```json
{ "data": [ { "id": 1, "order_code": "PED-1001", ... } ] }
​```

### POST /sales
Cria uma nova venda.

**Body:** (mesmos campos do exemplo acima)

**Resposta (201):**
​```json
{ "status": true, "message": "Venda criada com sucesso", "data": {...} }
​```

### DELETE /sales/{id}
Remove uma venda do usuário autenticado.

**Resposta (200):**
​```json
{ "message": "Venda Excluida com sucesso"}
​```

## Repasses (Transfer)

### GET /transfer
Lista as tranferencias do usuário autenticado com um id especifico.

**Resposta (200):**
​```json
	{ "id": 2, "user_id": 1, "order_code": "PED-1002", "amount": "224.00", "transfer_date": "2026-08-15T13:49:49.000000Z" }
​```

**Resposta (200):**
### GET /transfer/{id}
Lista as tranferencias do usuário autenticado.

​```json
	{"id": 2, "user_id": 1, "order_code": "PED-1002", "amount": "224.00" "transfer_date": "2026-08-15T13:49:49.000000Z"}
​```

### POST /transfer
Cria uma nova transferencia.

**Body:** (mesmos campos do exemplo acima)

**Resposta (201):**
​```json
    { "id": 2, "user_id": 1, "order_code": "PED-1002", "amount": "224.00", "transfer_date": "2026-08-15T13:49:49.000000Z" }
​```

### DELETE /transfer/{id}
Remove uma trasferencia do usuário autenticado.

**Resposta (200):**
​```json
    { "message": "Trasferencia Excluida com sucesso"}
​```

## Conciliações (Reconciliations)

### GET /reconciliations
Lista as conciliações do usuário autenticado (somente leitura).

**Resposta (200):**
​```json
{
    "data": [
        {
            "id": 3,
            "transfer_id": 2,
            "sale": { "id": 2, "user_id": 1, "order_code": "PED-1002" }
        }
    ]
}
​```
