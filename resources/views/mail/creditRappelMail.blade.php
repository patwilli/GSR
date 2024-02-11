<x-mail::message>
    # Rappel de Paiement - Échéance dans 2 jours

    Cher Client,

    Nous souhaitons vous rappeler qu'un paiement important est prévu dans deux jours pour votre crédit. Pour éviter tout
    désagrément et des frais supplémentaires, nous vous encourageons à vous préparer à effectuer ce paiement à temps.

    Détails du crédit :

    Prochaine échéance : {{ $date_echeance }}
    Montant échéance : {{ $montant_echeance }}

    Nous vous rappelons que le paiement en retard peut entraîner des frais supplémentaires et des conséquences sur votre
    crédit.

    Merci de votre collaboration et de votre attention à cette échéance. Nous vous remercions pour votre confiance.

    {{ config('app.name') }}
</x-mail::message>
