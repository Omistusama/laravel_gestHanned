<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes Eleves</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>Nom de Famille</td>
        <td>Prénom</td>
        <td>Classe</td>
        <td>Date de Naissance</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($eleves as $data)
        <tr>
            <td>{{$data->nom_de_famille}}</td>
            <td>{{$data->prenom_eleve}}</td>
            <td>{{$data->nom_de_classe}}</td>
            <td>{{$data->date_naiss}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>