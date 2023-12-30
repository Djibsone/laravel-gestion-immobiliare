<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été faite pour le bien <a href="{{ route('biens.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>.

- Prenom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Téléphone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

- Message : <br/>
{{ $data['message'] }}

</x-mail::message>
