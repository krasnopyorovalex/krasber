<p>Имя: {{ $data['name'] }}</p>
<p>Телефон: {{ $data['phone'] }}</p>
<p>Email: {{ $data['email'] }}</p>
@if ($data['message'])
<p>Дополнительная информация: {{ $data['message'] }}</p>
@endif