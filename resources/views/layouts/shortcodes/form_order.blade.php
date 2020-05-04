<div class="order__service-form">
    <div class="wrap">
        <div class="desc">
            <div class="as__h1">Заказать услугу</div>
            <p>Оставьте свою заявку и наш менеджер свяжется с Вами.</p>
        </div>
        @include('layouts.forms.order_service', ['services' => $services, 'postfix' => '_content'])
    </div>
</div>