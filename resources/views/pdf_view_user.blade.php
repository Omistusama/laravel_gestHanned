<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat de Scolarité</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style type="text/css">
            .bodyBody {
                margin: 10px;
                font-size: 1.50em;
            }
            .divHeader {
                text-align: right;
                border: 1px solid;
            }
            .divReturnAddress {
                text-align: right;
                float: right;
            }
            .divSubject {
                clear: both;
                font-weight: bold;
                padding-top: 80px;
            }
            .divAdios {
                float: right;
                padding-top: 50px;
            }
        </style>
  </head>
  <body>
  <img src="{{asset('img/logo_seul.jpg')}}" height="100" alt="Grapefruit slice atop a pile of other slices"/>
  <div class="divReturnAddress">
            Collège privé Hanned <br>
            17 rue de Montigny <br>
            95100 ARGENTEUIL <br>
            Téléphone :01 34 10 72 03 <br>
            E-mail: contact@ecole-hanned.com <br>
        </div>

        <div class="divSubject">
            CERTIFICAT DE SCOLARITÉ 2020/2021
        </div>

        <div class="divContents">
            <p>
                A Argenteuil, le 1er Septembre 2020            
            </p>
            @foreach($eleves as $data)
            <p>
                Je, soussignée, Mme Fazilleau, agissant en qualité de
                directrice de l'établissement Hanned, certifie que l’enfant {{$data->nom_de_famille}} {{$data->prenom_eleve}}
                né(e) le {{$data->date_naiss}} est inscrit(e) en classe de {{$data->nom_de_classe}} dans notre
                établissement et que sa fréquentation est régulière.
            </p>
            @endforeach
        </div>

        <div class="divAdios">
        Fait pour servir et valoir ce que de droit. <br/>
            <!-- Space for signature. -->
            <br/>
            <img src="{{asset('img/collÃ¨ge_tampon.jpg')}}" height="200" alt="Grapefruit slice atop a pile of other slices"/>
            <br/>
            <br/>
            <br/>
            <br/>
        </div>
  </body>
</html>