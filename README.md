[Documentation de Lumen](https://lumen.laravel.com/docs/10.x/installation)

## Exercice

Cette API ne fonctionne pas correctement, vous devrez créer des tests unitaires pour déterminer où se trouve chaque
erreur et ainsi pouvoir les corriger.

### Endpoints

| Methode | Endpoint                   | Description                  |
|---------|----------------------------|------------------------------|
| GET     | /api/todos                 | Récupérer la liste des todos |
| POST    | /api/todos                 | Créer une nouvelle todo      |
| GET     | /api/todos/{uuid}          | Récupérer une todo           |
| PATCH   | /api/todos/{uuid}/complete | Compléter une todo           |
| DELETE  | /api/todos/{uuid}          | Supprimer une todo           |

### Fonctionnement

- Avoir la possibilité de filtrer les todos complété ou non sur la route `/api/todos?completed=1`
- Créer une nouvelle todo avec les bonnes informations envoyées, si la todo est correctement créer renvoyé un code HTTP
  201
- Pouvoir récupérer le détail d'une todo via son UUID, si la todo n'existe pas, retourner un code HTTP 404
- Pouvoir compléter une todo
- Pouvoir supprimer une todo et qu'elle ne figure plus dans le fichier des todos, ainsi que retourner un code HTTP No Content
