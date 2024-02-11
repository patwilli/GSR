<x-mail::message>
    # Cher {{ $username }},

    Votre mot de passe a été réinitialisé avec succès. Voici votre nouveau mot de passe :

    {{ $password }}

    Nous vous recommandons de vous connecter à votre compte dès que possible et de changer votre mot de passe pour des
    raisons de sécurité.

    Merci,
    L'équipe SR-PADME
    {{ config('app.name') }}
</x-mail::message>
