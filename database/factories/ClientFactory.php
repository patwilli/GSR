<?php

namespace Database\Factories;

use App\Models\Client;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected  $model = Client::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName($gender = 'male' | 'female'),
            'sexe' => $this->faker->randomElement(['Masculin', 'Féminin']),
            'age' => $this->faker->randomElement([25, 30, 45, 70]),
            'telephone' => $this->faker->randomElement([69297288, 51677480]),
            'email' =>
            $this->faker->randomElement([
                'patricesossavi@gmail.com',
                'assoudelphy@gmail.com',
                'emmanuelpatrice193@gmail.com',
                'a.kenneth.1000@gmail.com',
            ]),
            'adresse' => $this->faker->randomElement([
                "Lokossa, quartier Gbêdjromèdé, près de la rivière Ouémé, maison en terre battue avec un toit de chaume.",
                "Parakou, von de la Gare Routière, en face du restaurant Le Voyageur, immeuble de trois étages.",
                "Cotonou, quartier Haie Vive, von de la Solidarité, appartement B7 au premier étage.",
                "Bohicon, quartier Adja-Ouèrè, à côté du marché Dantokpa, maison colorée aux motifs traditionnels.",
                "Natitingou, quartier Gbago, rue des Palmiers, maison en pisé avec une cour intérieure.",
                "Ouidah, zone de Zoungbomey, près de la forêt sacrée de Kpasse, cabane en bois au toit de palmes.",
                "Porto-Novo, quartier Tokpota, à proximité de la Mairie, maison en briques avec un petit jardin potager.",
                "Cotonou, quartier Fidjrosse, sur la plage de la Rive Gauche, bungalow avec vue sur la lagune.",
                "Allada, quartier Agongointo, près de la route nationale, maison moderne avec une grande véranda.",
                "Cotonou, von du Stade de l'Amitié, à côté du complexe sportif, immeuble de style contemporain.",
                "Dassa-Zoumè, quartier Gounrourou, rue des Artisans, maison en banco avec des décorations en argile.",
                "Parakou, quartier Goudron, près de la station-service Total, maison à deux étages avec un balcon.",
                "Bohicon, quartier Zongo, à côté du marché Dantokpa, maison à étages avec des volets en bois sculptés.",
                "Cotonou, quartier Jonquet, von de la Plage, villa coloniale avec des jardins paysagers.",
                "Natitingou, quartier Wori, près du musée ethnographique, maison traditionnelle avec des fresques murales.",
                "Porto-Novo, quartier Gbegamey, à côté du marché de la Poterie, maison à la façade colorée.",
                "Cotonou, quartier Agla, près du marché Dantokpa, immeuble de bureaux avec des vitres teintées.",
                "Abomey-Calavi, quartier Akassato, à proximité de l'Université, appartement C3 au troisième étage.",
                "Bohicon, quartier Wari-Maro, à côté du terrain de football, maison en bois sur pilotis.",
                "Ouidah, quartier Hwékanmè, près du musée historique, maison blanche avec des frises sculptées.",
            ]),
        ];
    }
}
