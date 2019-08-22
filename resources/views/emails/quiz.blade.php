<p>Имя: {{ $data['name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
@if($data['phone'])
    <p>Телефон: {{ $data['phone'] }}</p>
@endif
<p>---------------------------------</p>
<p>Тип сайта: {{ $data['type'] }}</p>
<p>Этап работы: {{ $data['stage'] }}</p>
<p>Функционал: {{ $data['functional'] }}</p>
