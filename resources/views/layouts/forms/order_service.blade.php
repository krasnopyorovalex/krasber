<div class="form__box">
    <form action="{{ route('order.service.send') }}" id="order__service-form{{ $postfix ?? '' }}" class="order__service" method="post" onsubmit="yaCounter45495162.reachGoal('USLUGA'); return true">
        @csrf
        <div class="services__list-block single__block">
            <select name="service" id="service__field{{ $postfix ?? '' }}">
                @foreach ($services as $service)
                    <optgroup label="{{ $service->menu_name }}">
                        @if ($service->services->count())
                            @foreach ($service->services as $subService)
                                <option value="{{ $subService->menu_name }}"{{ check_equal_path($subService->alias) ? ' selected' : '' }}>{{ $subService->menu_name }}</option>
                            @endforeach
                        @endif
                    </optgroup>
                @endforeach
            </select>
            <i class="select__arrow"></i>
        </div>
        <div class="single__block">
            <input type="text" name="name" placeholder="Ваше имя" autocomplete="off" required minlength="3">
        </div>
        <div class="single__block">
            <input type="text" name="phone" placeholder="" autocomplete="off" required>
        </div>
        <div class="single__block">
            <input type="email" name="email" placeholder="Email" autocomplete="off" required>
        </div>
        <div class="single__block submit__block">
            <button type="submit" class="btn">Отправить</button>
        </div>
        <div class="single__block agree__block">
            <input type="checkbox" name="agree" id="i_agree{{ $postfix ?? '' }}" value="1" checked>
            <label for="i_agree{{ $postfix ?? '' }}">Оставляя заявку, Вы соглашаетесь на <a href="{{ route('page.show', ['alias' => 'personal-data']) }}" target="_blank" title="Перейти на страницу описания">обработку персональных данных</a></label>
            <p class="error">Согласитесь на обработку персональных данных</p>
        </div>
    </form>
    <!-- /.order__service -->
</div>
