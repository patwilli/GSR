<x-mail::message>
    # Rappel de Paiement - Date d'échéance aujourd'hui

    Cher Client,

    Nous vous rappelons qu'aujourd'hui est la date d'échéance de votre paiement. Il est crucial de compléter le paiement
    dès que possible pour éviter tout retard et des frais supplémentaires.

    Détails du crédit :

    Prochaine échéance : {{ $date_echeance }}
    Montant échéance : {{ $montant_echeance }}

    Un paiement ponctuel garantit que votre compte reste en règle et prévient toute perturbation de nos services.

    Nous vous remercions pour votre collaboration et votre promptitude à compléter ce paiement.
    {{ config('app.name') }}
</x-mail::message>
