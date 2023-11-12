<x-mail::message>
  # The user **{{ $formData["name"] }}** sent you a message!

  Email address: **{{ $formData["email"] }}** <br>
  Message: {{ $formData["message"] }}
</x-mail::message>
